<?php

namespace GC\FactureBundle\Controller;

use GC\FactureBundle\Entity\Clients2;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Clients2 controller.
 *
 * @Route("clients2")
 */
class Clients2Controller extends Controller
{
    /**
     * Lists all clients2 entities.
     *
     * @Route("/", name="clients2_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients2s = $em->getRepository('GCFactureBundle:Clients2')->findAll();

        return $this->render('clients2/index.html.twig', array(
            'clients2s' => $clients2s,
        ));
    }

    /**
     * Creates a new clients2 entity.
     *
     * @Route("/new", name="clients2_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $clients2 = new Clients2();
        $form = $this->createForm('GC\FactureBundle\Form\Clients2Type', $clients2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clients2);
            $em->flush($clients2);

            return $this->redirectToRoute('clients2_show', array('id' => $clients2->getId()));
        }

        return $this->render('clients2/new.html.twig', array(
            'clients2' => $clients2,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a clients2 entity.
     *
     * @Route("/{id}", name="clients2_show")
     * @Method("GET")
     */
    public function showAction(Clients2 $clients2)
    {
        $deleteForm = $this->createDeleteForm($clients2);

        return $this->render('clients2/show.html.twig', array(
            'clients2' => $clients2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing clients2 entity.
     *
     * @Route("/{id}/edit", name="clients2_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Clients2 $clients2)
    {
        $deleteForm = $this->createDeleteForm($clients2);
        $editForm = $this->createForm('GC\FactureBundle\Form\Clients2Type', $clients2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clients2_edit', array('id' => $clients2->getId()));
        }

        return $this->render('clients2/edit.html.twig', array(
            'clients2' => $clients2,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a clients2 entity.
     *
     * @Route("/{id}", name="clients2_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Clients2 $clients2)
    {
        $form = $this->createDeleteForm($clients2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clients2);
            $em->flush($clients2);
        }

        return $this->redirectToRoute('clients2_index');
    }

    /**
     * Creates a form to delete a clients2 entity.
     *
     * @param Clients2 $clients2 The clients2 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Clients2 $clients2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clients2_delete', array('id' => $clients2->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
