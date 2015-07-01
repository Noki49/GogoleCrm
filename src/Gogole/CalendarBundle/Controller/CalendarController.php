<?php

namespace Gogole\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gogole\CalendarBundle\Entity\Event;
use Symfony\Component\HttpFoundation\Request;

use Gogole\UserBundle\Entity\User;

class CalendarController extends Controller
{

    public function calendarAction( Request $request )
    {
    	$em = $this->getDoctrine()->getManager();
    	$repoCalendar = $em->getRepository('GogoleCalendarBundle:Event');
    	$allEvent = $repoCalendar->findAll();

    	$event = new Event();
    	$formBuilder = $this->get('form.factory')->createBuilder('form', $event);
    	$formBuilder
    		->add('title')
    		->add('description')
    		->add('start')
    		->add('end')
    		->add('Envoyer', 'submit', array('attr' => array('class' => 'btn btn-default')));
    	$form = $formBuilder->getForm();
    	$form->handleRequest($request);

    	if ($form->isValid())
    	{
    		$em->persist($event);
    		$em->flush();
    	}

    	return $this->render('GogoleCalendarBundle:Calendar:calendar.html.twig', array(
    		'form'     => $form->createView(),
    		'allEvent' => $allEvent,
    	));
    }
}
