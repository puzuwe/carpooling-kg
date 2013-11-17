<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 24.10.13
 * Time: 16:33
 */

namespace Podorozhniki\MainBundle\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends  ContainerAware{


    /**
     * @backupGlobals disabled
     */
    public function topMenu(FactoryInterface $factory, array $options){


        $menu = $factory->createItem("top",array('childrenAttributes'=>array('class'=>'nav navbar-nav')));
        $translator = $this->container->get('translator');

        $menu_attributes = array('uri'=>'/',
            'attributes'=>array('class'=>'dropdown'),
            'linkAttributes'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
            'childrenAttributes'=>array('class'=>'dropdown-menu'));

        //$menu->addChild($translator->trans('main.homePage'),$menu_attributes);
        $routes = $menu->addChild($translator->trans('routes.routes'),$menu_attributes);

        $routes->addChild($translator->trans('routes.all'),array('route'=>'get_rides'));
        $routes->addChild($translator->trans('routes.nearest'),array('uri'=>'/'));
        $routes->addChild($translator->trans('routes.popular'),array('uri'=>'/'));

        $events = $menu->addChild($translator->trans('events.events'),$menu_attributes);
        $events->addChild($translator->trans('events.all'),array('uri'=>'/'));
        $events->addChild($translator->trans('events.addedByMe'),array('uri'=>'/'));
        $events->addChild($translator->trans('events.addEvent'),array('uri'=>'/'));

        $places = $menu->addChild($translator->trans('places.places'),$menu_attributes);
        $places->addChild($translator->trans('places.favorite'),array('uri'=>'/'));
        $places->addChild($translator->trans('places.all'),array('uri'=>'/'));
        $places->addChild($translator->trans('places.addedByMe'),array('uri'=>'/'));
        $places->addChild($translator->trans('places.addPublic'),array('uri'=>'/'));
        $menu->addChild($translator->trans("search"),array('uri'=>'/'));
        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options){
        $user = $this->container->get('security.context')->getToken()->getUser();
        $provider = $this->container->get('fos_message.provider');
        $unreadMessages = $provider->getNbUnreadMessages();
        $menu = $factory->createItem("userMenu",array('childrenAttributes'=>array('class'=>"nav nav-pills")));
        $translator = $this->container->get("translator");
        $menu->addChild($translator->trans("routes.my"),array('route'=>'get_user_rides','routeParameters'=>array('userId'=>$user->getId())));
        $menu->addChild($translator->trans("messages.my") . $unreadMessages,array("route"=>'fos_message_inbox' ));
        $menu->addChild($translator->trans("calendar"),array("uri"=>"/"));
        //$menu->addChild($translator->trans("search"),array("uri"=>"/"));
        return $menu;
    }

} 