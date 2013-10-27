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

class UsersController extends FOSRestController {

    public function getUserAction($id)
    {
        $user = $this->getDoctrine()->getRepository("ApplicationSonataUserBundle:User")->find($id);

        return new Response("ApplicationSonataUserBundle:Users:getUser.html.twig",array("user"=>$user));
    }
} 