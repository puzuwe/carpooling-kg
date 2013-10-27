<?php

namespace Podorozhniki\MainBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
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

}
