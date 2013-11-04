<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 04.11.13
 * Time: 11:32
 */

namespace Podorozhniki\MainBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;

class RidesController extends FOSRestController
{

    public function getRidesAction()
    {
       $paginator = $this->get("knp_paginator");
       $rides = $this->getDoctrine()->getRepository("PodorozhnikiMainBundle:Ride")->PaginateFindAll($paginator,$this->getRequest(),5);
        return $this->render("PodorozhnikiMainBundle:Rides:getRides.html.twig",array('rides'=>$rides));
    }

    public function getRideAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ride = $em->getRepository("PodorozhnikiMainBundle:Ride")->find($id);
        return $this->render("PodorozhnikiMainBundle:Rides:getRide.html.twig",array("ride"=>$ride));
    }
} 