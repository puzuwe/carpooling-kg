<?php

namespace Podorozhniki\MainBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Podorozhniki\MainBundle\Entity\Ride;
use Podorozhniki\MainBundle\Form\RideType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserRidesController extends FOSRestController
{

    public function getRidesAction($userId)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $paginator = $this->get('knp_paginator');

        if( !is_object($this->getUser()) || ( is_object($this->getUser()) &&$this->getUser()->getId()!=$userId)){
            throw new AccessDeniedException("У вас нет доступ к этому ресурсу!");
        }
            $rides = $em->getRepository("PodorozhnikiMainBundle:Ride")->PaginateFindAllByUser($paginator,$this->getRequest(),5,$this->getUser());
            return $this->render("PodorozhnikiMainBundle:UserRides:getRides.html.twig", array("rides" => $rides));
    }

    public function getRideAction($userId, $id)
    {
        $ride = $this->getDoctrine()->getRepository("PodorozhnikiMainBundle:Ride")->find($id);
        return $this->render("PodorozhnikiMainBundle:UserRides:getRide.html.twig", array("ride" => $ride));
    }

    public function postRideAction($userId, Request $request)
    {
        $ride = new Ride();
        $form = $this->createForm(new RideType($this->getUser()), $ride);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ride);
            $em->flush();

            return $this->redirect($this->generateUrl("podorozhniki_main_homepage"));
        }
        return new Response("PodorozhnikiMainBundle:UserRides:postRides.html.twig", array("form" => $form->createView()));

    }

    public function newRideAction($userId)
    {
        if (is_object($this->getUser()) && $userId == $this->getUser()->getId()) {
            $ride = new Ride();
            $form = $this->createForm(new RideType($this->getUser()), $ride, array('action' => $this->generateUrl('post_user_ride', array('userId' => $userId)), 'method' => 'post'));
            return $this->render("PodorozhnikiMainBundle:UserRides:newRide.html.twig", array("form" => $form->createView()));
        } else {
            return $this->redirect($this->generateUrl("podorozhniki_main_homepage"));
        }

    }

}
