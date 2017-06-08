<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Lid;
use AppBundle\Entity\Strip;
use AppBundle\Service\UseStrip;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Strip controller.
 *
 * @Route("strip")
 */
class StripController extends Controller
{
    /**
     * Lists all strip entities.
     *
     * @Route("/", name="strip_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $strips = $em->getRepository('AppBundle:Strip')->findAll();

        return $this->render('strip/index.html.twig', array(
            'strips' => $strips,
        ));
    }

    /**
     * Creates a new strip entity.
     *
     * @Route("/new/{id}", defaults={"id" = 1}, name="strip_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $leden = $em->getRepository('AppBundle:Lid')->findAll();


        //$form = $this->createForm();
        $form = $this->createFormBuilder()
            ->add('lid', EntityType::Class,[
                'class' => 'AppBundle:Lid',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('l')->orderBy('l.voornaam', 'ASC');
                },
                'choice_label' => 'voornaamAchternaam',
                'label' => 'Voor wie?',
                'data' => $em->getReference("AppBundle:Lid", $id),
                'attr' => ['class'=>'input-lg']
            ])
            ->add('amount', IntegerType::class,[
                'label' => 'Hoeveel strippen toevoegen?',
                'attr' => ['class'=>'input-lg'],
                'data' => 10
            ])
            ->add('price', MoneyType::class,[
                'divisor' => 100,
                'label' => 'Wat is de prijs per strip?',
                'attr' => ['class'=>'input-lg']
            ])
            ->add('save', SubmitType::class, array(
                'label' => 'Toevoegen',
                'attr' => ['class'=>'btn-block btn-primary btn-lg']

            ))
            ->getForm();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            //get data form form
            $form_data = $form->getData();

            //get entity
            $em = $this->getDoctrine()->getManager();

            //insert
            for($i = 0; $i < $form_data['amount']; $i++ ):
                $theStrip = new Strip();
                $theStrip->setLid($form_data['lid']);
                $theStrip->setPurchasedAt(new \DateTime('now'));
                $theStrip->setPrice($form_data['price']);
                $em->persist($theStrip);
                $em->flush();
            endfor;

            // add flash
            $this->addFlash(
                'success',
                'Success! Er zijn '.$form_data['amount'].' strippen toegevoegd voor '.$form_data['lid']
            );
            return $this->redirectToRoute('lid_index');
        }

        return $this->render('strip/new.html.twig', array(
            //'strip' => $strip,
            'form' => $form->createView(),
            'leden' => $leden
        ));
    }

    /**
     * Finds and displays a strip entity.
     *
     * @Route("/{id}", name="strip_show")
     * @Method("GET")
     */
    public function showAction(Strip $strip)
    {
        $deleteForm = $this->createDeleteForm($strip);

        return $this->render('strip/show.html.twig', array(
            'strip' => $strip,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing strip entity.
     *
     * @Route("/{id}/edit", name="strip_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Strip $strip)
    {
        $deleteForm = $this->createDeleteForm($strip);
        $editForm = $this->createForm('AppBundle\Form\StripType', $strip);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('strip_edit', array('id' => $strip->getId()));
        }

        return $this->render('strip/edit.html.twig', array(
            'strip' => $strip,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a strip entity.
     *
     * @Route("/{id}", name="strip_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Strip $strip)
    {
        $form = $this->createDeleteForm($strip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($strip);
            $em->flush();
        }

        return $this->redirectToRoute('lid_index');
    }

    /**
     * Creates a form to delete a strip entity.
     *
     * @param Strip $strip The strip entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Strip $strip)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('strip_delete', array('id' => $strip->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     *
     *
     * @Route("/usestrip/{id}", name="strip_gebruiken", defaults={"id"=0})
     * @Method("GET")
     */
    public function stripGebruiken(UseStrip $useStrip, Strip $strip)
    {

        if($useStrip->useStripOfUser( $strip ))
        {
            $this->addFlash(
                'success',
                'Success! 1 strip gebruikt voor '.$strip->getLid()
            );
        }
        else
        {
            $this->addFlash(
                'warning',
                'Actie kon niet worden uitgevoerd'
            );
        }


        return $this->redirectToRoute("lid_index");
    }


    /**
     *
     *
     * @Route("/restorestrip/{id}", name="strip_herstellen")
     * @Method("GET")
     */
    public function stripHerstellen(UseStrip $useStrip, Strip $strip)
    {

        if($useStrip->restoreStrip( $strip ))
        {
            $this->addFlash(
                'success',
                'Strip hersteld voor '.$strip->getLid()
            );
        }
        else
        {
            $this->addFlash(
                'warning',
                'Actie kon niet worden uitgevoerd'
            );
        }


        return $this->redirectToRoute("lid_index");
    }

}
