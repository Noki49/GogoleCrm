<?php

namespace Gogole\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GogoleCalendarBundle:Calendar:calendar.html.twig', array('name' => $name));
    }
}
