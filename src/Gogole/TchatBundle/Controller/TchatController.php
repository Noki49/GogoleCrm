<?php

namespace Gogole\TchatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gogole\TchatBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;

use Gogole\UserBundle\Entity\User;

class TchatController extends Controller
{
    public function tchatAction( Request $request)
    {		   
        $em = $this->getDoctrine()->getManager();
		$repoMessage = $em->getRepository('GogoleTchatBundle:Message');
		$allMessage = $repoMessage->findAll();

		// donne le nombre de message de la BDD
		$max = count($allMessage);

		$user = $this->container->get('security.context')->getToken()->getUser();   

		$message = new Message($user);

		if ($user == "anon."){

			return $this->render('GogoleMainBundle:Main:connexion.html.twig');

        }

		// création du formulaire
		$formBuilder = $this->get('form.factory')->createBuilder('form', $message);
		$formBuilder
			->add('message')
			->add('Envoyer', 'submit', array('attr' => array('class' => 'btn btn-default')));
		$form = $formBuilder->getForm();
		$form->handleRequest($request);

		// Si formulaire est complet
		if($form->isValid())
		{
			// s'il y a plus de dix message stocké dans la BDD
			// supprime le message le plus anciens
			if($max >= 10)
			{
				$delMessage = $repoMessage->findBy(
					array(),
					array('createdAt' => 'asc'),
					1,
					0);
				foreach($delMessage as $deleMessage)
				{
					$em->remove($deleMessage);
				}
				
			}
		
			$em->persist($message);
			$em->flush();
			
		}

		return $this->render('GogoleTchatBundle:Tchat:index.html.twig', array(
			'form'       => $form->createView(),
			'allMessage' => $allMessage,
		));
    }
}
