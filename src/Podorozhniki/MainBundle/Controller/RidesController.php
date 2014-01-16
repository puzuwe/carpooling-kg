<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 04.11.13
 * Time: 11:32
 */

namespace Podorozhniki\MainBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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

    public function getRidesAjaxAction(){
        $response = new Response();
        $start = $this->getRequest()->request->get('start');
        $end = $this->getRequest()->request->get('end');
        $routes = $this->getDoctrine()->getRepository('PodorozhnikiMainBundle:Ride')->findRouteLike($start,$end);
        $serializer = $this->get('jms_serializer');
        $response->setContent($serializer->serialize(array(
            'data' => start,
        ),'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function getGoodDealsAction(){
        $rides = $this->getDoctrine()->getRepository('PodorozhnikiMainBundle:Ride')->findGoodDeals();
        return $this->render('PodorozhnikiMainBundle:Rides:goodDeals.html.twig',array('rides'=>$rides));
    }
} 