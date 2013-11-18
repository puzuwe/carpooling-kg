<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 27.10.13
 * Time: 14:02
 */

namespace Application\Sonata\UserBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends FOSRestController
{

    public function getUserAction($id)
    {
        $paginator = $this->get('knp_paginator');
        $user = $this->getDoctrine()->getRepository("ApplicationSonataUserBundle:User")->find($id);
        if ($user){
            $rides = $this->getDoctrine()->getRepository("PodorozhnikiMainBundle:Ride")->PaginateFindAllByUser($paginator,$this->getRequest(),5,$user);
            return $this->render("ApplicationSonataUserBundle:Users:getUser.html.twig", array("user" => $user,"rides"=>$rides));
        }
        else
            throw new NotFoundHttpException();
    }
} 