<?php

namespace Gogole\GestionStockBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Gogole\GestionStockBundle\Entity\stockManager;
use Gogole\GestionStockBundle\Form\stockManagerType;

/**
 * stockManager controller.
 *
 * @Route("/stockmanager")
 */
class stockManagerController extends Controller
{

    /**
     * Lists all stockManager entities.
     *
     * @Route("/", name="stockmanager")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GogoleGestionStockBundle:stockManager')->findAll();

    	$boutonDelete = array();
    	foreach($entities as $produits)
    	{
	       $boutonDelete[$produits->getId()]= $this->createDeleteForm($produits->getId())->createView();
	    }

        return array(
            'entities' => $entities,
	        'boutonDelete' => $boutonDelete,
        );
    }
    /**
     * Creates a new stockManager entity.
     *
     * @Route("/", name="stockmanager_create")
     * @Method("POST")
     * @Template("GogoleGestionStockBundle:stockManager:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new stockManager();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
		    $entity->setMarge($entity->getPv() - $entity->getPa());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('stockmanager', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a stockManager entity.
     *
     * @param stockManager $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(stockManager $entity)
    {
        $form = $this->createForm(new stockManagerType(), $entity, array(
            'action' => $this->generateUrl('stockmanager_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new stockManager entity.
     *
     * @Route("/new", name="stockmanager_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new stockManager();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a stockManager entity.
     *
     * @Route("/{id}", name="stockmanager_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GogoleGestionStockBundle:stockManager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find stockManager entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing stockManager entity.
     *
     * @Route("/{id}/edit", name="stockmanager_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GogoleGestionStockBundle:stockManager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find stockManager entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a stockManager entity.
    *
    * @param stockManager $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(stockManager $entity)
    {
        $form = $this->createForm(new stockManagerType(), $entity, array(
            'action' => $this->generateUrl('stockmanager_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing stockManager entity.
     *
     * @Route("/{id}", name="stockmanager_update")
     * @Method("PUT")
     * @Template("GogoleGestionStockBundle:stockManager:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GogoleGestionStockBundle:stockManager')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find stockManager entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
		$entity->setMarge($entity->getPv() - $entity->getPa());
            $em->flush();

            return $this->redirect($this->generateUrl('stockmanager', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a stockManager entity.
     *
     * @Route("/{id}", name="stockmanager_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GogoleGestionStockBundle:stockManager')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find stockManager entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('stockmanager'));
    }

    /**
     * Creates a form to delete a stockManager entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stockmanager_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
