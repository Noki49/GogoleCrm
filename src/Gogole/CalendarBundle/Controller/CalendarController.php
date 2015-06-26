<?php

namespace Gogole\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BladeTester\CalendarBundle\Entity\Event as BaseEvent;

class CalendarController extends Controller
{
    public function indexAction()
    {
        return $this->render('GogoleCalendarBundle:Calendar:index.html.twig', array());
    }
}
