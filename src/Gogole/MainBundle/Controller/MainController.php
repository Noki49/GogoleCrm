<?php

namespace Gogole\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('GogoleMainBundle:Mainview:index.html.twig', array());
    }
}
