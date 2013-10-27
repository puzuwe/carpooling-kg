<?php

namespace Podorozhniki\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PodorozhnikiMainBundle:Default:index.html.twig');
    }
}
