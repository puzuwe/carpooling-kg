<?php

namespace Application\Podorozhniki\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationPodorozhnikiMainBundle:Default:index.html.twig');
    }
}
