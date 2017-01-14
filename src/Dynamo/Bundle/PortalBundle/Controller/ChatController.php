<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 6.1.2017
 * Time: 20:44
 */

namespace Dynamo\Bundle\PortalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ChatController
 * @package Dynamo\Bundle\PortalBundle\Controller
 */
class ChatController extends Controller
{
    /**
     * @Route("/debata")
     */
    public function indexAction()
    {
        return $this->render("DynamoPortalBundle:Chat:index.html.twig");
    }
}