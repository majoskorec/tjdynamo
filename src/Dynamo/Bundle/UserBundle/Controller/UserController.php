<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 6.1.2017
 * Time: 21:27
 */

namespace Dynamo\Bundle\UserBundle\Controller;

use Dynamo\Bundle\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package Dynamo\Bundle\UserBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @Route("/clenovia")
     * @return Response
     */
    public function listAction()
    {
        $members = $this->getDoctrine()
            ->getManager()
            ->getRepository(User::class)
            ->findBy([], ['memberFrom' => 'ASC']);
        return $this->render("DynamoUserBundle:User:list.html.twig", ['members' => $members]);
    }

    /**
     * @param int $id
     * @Route("/clen/{id}", requirements={"id": "\d+"})
     * @return Response
     */
    public function detailAction($id)
    {
        $user = $this->getDoctrine()
            ->getManager()
            ->getRepository(User::class)
            ->find($id);
        if (!$user) {
            $this->addFlash('error', sprintf('Užívateľ s ID %s neexistuje!', $id));
            return $this->redirectToRoute("dynamo_user_user_list");
        }
        return $this->render("DynamoUserBundle:User:detail.html.twig", ['user' => $user]);
    }
}