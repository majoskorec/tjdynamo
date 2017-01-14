<?php

namespace Dynamo\Bundle\ColonizationBundle\Controller;

use Dynamo\Bundle\ColonizationBundle\Entity\Colonization;
use Dynamo\Bundle\ColonizationBundle\Form\Type\ColonizationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class ColonizationController
 * @package Dynamo\Bundle\ColonizationBundle\Controller
 * @Route("/kolonizator")
 */
class ColonizationController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     * @return Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $colonizations = $em->getRepository(Colonization::class)->findBy([], ["dateFrom" => "DESC"]);

        return $this->render('DynamoColonizationBundle:Colonization:index.html.twig', [
            'colonizations' => $colonizations,
        ]);
    }

    /**
     * @Route("/pridaj")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction(Request $request)
    {
        $colonization = new Colonization();
        $form = $this->createForm(ColonizationType::class, $colonization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($colonization);
            $em->flush();
            $this->addFlash('success', $this->getTranslator()->trans("colonization.created"));
            return $this->redirectToRoute('dynamo_colonization_colonization_show', ['id' => $colonization->getId()]);
        }

        return $this->render('DynamoColonizationBundle:Colonization:new.html.twig', [
            'colonization' => $colonization,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     * @param Colonization $colonization
     * @return Response
     */
    public function showAction(Colonization $colonization)
    {
        $deleteForm = $this->createDeleteForm($colonization);

        return $this->render('DynamoColonizationBundle:Colonization:show.html.twig', [
            'colonization' => $colonization,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * @Route("/{id}/zmen")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Colonization $colonization
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, Colonization $colonization)
    {
        $deleteForm = $this->createDeleteForm($colonization);
        $editForm = $this->createForm(ColonizationType::class, $colonization);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", $this->getTranslator()->trans("colonization.changed"));
            return $this->redirectToRoute('dynamo_colonization_colonization_show', ['id' => $colonization->getId()]);
        }

        return $this->render('DynamoColonizationBundle:Colonization:edit.html.twig', [
            'colonization' => $colonization,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Colonization $colonization
     * @Route("/{id}")
     * @Method("DELETE")
     * @return Response
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, Colonization $colonization)
    {
        $form = $this->createDeleteForm($colonization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($colonization);
            $em->flush();
            $this->addFlash('success', $this->getTranslator()->trans("colonization.deleted"));
        }

        return $this->redirectToRoute('dynamo_colonization_colonization_index');
    }

    /**
     * @param Colonization $colonization
     * @return Form
     */
    private function createDeleteForm(Colonization $colonization)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dynamo_colonization_colonization_delete', ['id' => $colonization->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @return TranslatorInterface
     */
    private function getTranslator()
    {
        return $this->get("translator");
    }
}
