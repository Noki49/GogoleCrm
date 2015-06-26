<?php

namespace Gogole\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {	

        return $this->render('GogoleMainBundle:Main:index.html.twig', array());

    }

    public function planningAction()
    {
    	return $this->render('GogoleMainBundle:Main:planning.html.twig', array());
    }
}
