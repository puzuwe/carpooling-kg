<?php

namespace Podorozhniki\MainBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Podorozhniki\MainBundle\Entity\Ride;
use Podorozhniki\MainBundle\Form\RideType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RidesController extends FOSRestController
{

    public function getRidesAction($userId)
    {
        if($userId==0){
            $rides = $this->getDoctrine()
                ->getRepository("PodorozhnikiMainBundle:Ride")
                ->findAll();
            return new Response($this->renderView("PodorozhnikiMainBundle:Rides:getRides.html.twig",array("rides"=>$rides)));
        }
        else{
            $user = $this->getDoctrine()
                ->getRepository("ApplicationSonataUserBundle:User")->find($userId);
            return new Response($this->renderView("PodorozhnikiMainBundle:Rides:getRides.html.twig",array("rides"=>$user->getRides())));
        }
    }
    public function getRideAction($userId, $id)
    {
        $ride = $this->getDoctrine()->getRepository("PodorozhnikiMainBundle:Ride")->find($id);
        return new Response($this->renderView("PodorozhnikiMainBundle:Rides:getRide.html.twig",array("ride"=>$ride)));
    }

    public function postRideAction($userId, Request $request)
    {
        $ride = new Ride();
        $form = $this->createForm(new RideType($this->getUser()),$ride);
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($ride);
            $em->flush();

           return $this->redirect($this->generateUrl("podorozhniki_main_homepage"));
       }
       return new Response("PodorozhnikiMainBundle:Rides:postRides.html.twig",array("form"=>$form->createView()));

    }

    public function newRideAction($userId)
    {

        $ride = new Ride();
        $form = $this->createForm(new RideType($this->getUser()),$ride,array('action'=>$this->generateUrl('post_user_ride',array('userId'=>$userId)),'method'=>'post'));
        return $this->render("PodorozhnikiMainBundle:Rides:newRide.html.twig",array("form"=>$form->createView()));

    }

}
