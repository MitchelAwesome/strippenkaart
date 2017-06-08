<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lid;
use AppBundle\Entity\Strip;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lid controller.
 *
 * @Route("lid")
 */
class LidController extends Controller
{
    /**
     * Lists all lid entities.
     *
     * @Route("/", name="lid_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lids = $em->getRepository('AppBundle:Lid')->findAll();

        //$lids['total_strips'] = $em->getRepository('AppBundle:Strip')->findActiveStripsOfUser($lids);

        return $this->render('lid/index.html.twig', array(
            'lids' => $lids,
        ));
    }

    /**
     * Creates a new lid entity.
     *
     * @Route("/new", name="lid_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lid = new Lid();
        $lid->setGeslacht('m');
        $form = $this->createForm('AppBundle\Form\LidType', $lid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lid);
            $em->flush();

            return $this->redirectToRoute('lid_show', array('id' => $lid->getId()));
        }

        return $this->render('lid/new.html.twig', array(
            'lid' => $lid,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lid entity.
     *
     * @Route("/{id}", name="lid_show")
     * @Method("GET")
     */
    public function showAction(Lid $lid, EntityManager $em)
    {

        $deleteForm = $this->createDeleteForm($lid);


        return $this->render('lid/show.html.twig', array(
            'lid' => $lid,
            //'active_tickets' => $activeTickets,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lid entity.
     *
     * @Route("/{id}/edit", name="lid_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lid $lid)
    {
        $deleteForm = $this->createDeleteForm($lid);
        $editForm = $this->createForm('AppBundle\Form\LidType', $lid);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lid_edit', array('id' => $lid->getId()));
        }

        return $this->render('lid/edit.html.twig', array(
            'lid' => $lid,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lid entity.
     *
     * @Route("/{id}", name="lid_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lid $lid)
    {
        $form = $this->createDeleteForm($lid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lid);
            $em->flush();
        }

        return $this->redirectToRoute('lid_index');
    }

    /**
     * Creates a form to delete a lid entity.
     *
     * @param Lid $lid The lid entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lid $lid)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lid_delete', array('id' => $lid->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
