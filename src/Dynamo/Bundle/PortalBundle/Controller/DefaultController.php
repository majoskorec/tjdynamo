<?php

namespace Dynamo\Bundle\PortalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Dynamo\Bundle\PortalBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction()
    {
        return $this->redirectToRoute("dynamo_portal_default_twopercent");
    }

    /**
     * @Route("/dve-percenta")
     */
    public function twoPercentAction()
    {
        return $this->render('DynamoPortalBundle:Default:two-percent.html.twig');
    }
}
