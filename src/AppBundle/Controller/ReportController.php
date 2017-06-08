<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Report controller.
 *
 * @Route("report")
 */
class ReportController extends Controller
{
    /**
     * @Route("/", name="report_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $strips = $em->getRepository("AppBundle:Strip")->showAllUsedStrips();

        return $this->render('Report/index.html.twig', array(
            'strips'=>$strips
        ));
    }

    /**
     * @Route("/show", name="report_show")
     */
    public function showAction()
    {
        return $this->render('Report/show.html.twig', array(
            // ...
        ));
    }

}
