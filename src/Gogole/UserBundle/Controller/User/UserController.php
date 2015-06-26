<?php

namespace Gogole\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function connectionAction()
    {
        return $this->render('GogoleUserBundle:Layout:layout.html.twig', array());
    }
}
