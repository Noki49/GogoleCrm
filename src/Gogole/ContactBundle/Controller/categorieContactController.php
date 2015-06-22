<?php

namespace Gogole\ContactBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Gogole\ContactBundle\Entity\categorieContact;
use Gogole\ContactBundle\Form\categorieContactType;

/**
 * categorieContact controller.
 *
 * @Route("/categoriecontact")
 */
class categorieContactController extends Controller
{

    /**
     * Lists all categorieContact entities.
     *
     * @Route("/", name="categoriecontact")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GogoleContactBundle:categorieContact')->findAll();

	// on ajoute le bouton delete pour les fins de ligne dans le tableau direct
	$boutonDelete=array();
	foreach($entities as $catContact)
	{
		$boutonDelete[$catContact->getId()] = $this->createDeleteForm($catContact->getId())->createView();
	}

        return array(
            	'entities' => $entities,
		'boutonDelete' => $boutonDelete,
        );
    }
    /**
     * Creates a new categorieContact entity.
     *
     * @Route("/", name="categoriecontact_create")
     * @Method("POST")
     * @Template("GogoleContactBundle:categorieContact:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new categorieContact();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('categoriecontact', array()));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a categorieContact entity.
     *
     * @param categorieContact $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(categorieContact $entity)
    {
        $form = $this->createForm(new categorieContactType(), $entity, array(
            'action' => $this->generateUrl('categoriecontact_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new categorieContact entity.
     *
     * @Route("/nouveau", name="categoriecontact_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new categorieContact();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a categorieContact entity.
     *
     * @Route("/{id}", name="categoriecontact_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GogoleContactBundle:categorieContact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find categorieContact entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing categorieContact entity.
     *
     * @Route("/{id}/editer", name="categoriecontact_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GogoleContactBundle:categorieContact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find categorieContact entity.');
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
    * Creates a form to edit a categorieContact entity.
    *
    * @param categorieContact $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(categorieContact $entity)
    {
        $form = $this->createForm(new categorieContactType(), $entity, array(
            'action' => $this->generateUrl('categoriecontact_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing categorieContact entity.
     *
     * @Route("/{id}", name="categoriecontact_update")
     * @Method("PUT")
     * @Template("GogoleContactBundle:categorieContact:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GogoleContactBundle:categorieContact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find categorieContact entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('categoriecontact', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a categorieContact entity.
     *
     * @Route("/{id}", name="categoriecontact_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GogoleContactBundle:categorieContact')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find categorieContact entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('categoriecontact'));
    }

    /**
     * Creates a form to delete a categorieContact entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriecontact_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
