<?php

namespace Application\FOS\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ApplicationFOSMessageBundle:Default:index.html.twig', array('name' => $name));
    }
}
