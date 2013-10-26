<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 24.10.13
 * Time: 16:33
 */

namespace Application\Podorozhniki\MainBundle\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends  ContainerAware{

    public function topMenu(FactoryInterface $factory, array $options){


        $menu = $factory->createItem("top",array('childrenAttributes'=>array('class'=>'nav navbar-nav')));
        $translator = $this->container->get('translator');

        $menu_attributes = array('uri'=>'#',
            'attributes'=>array('class'=>'dropdown'),
            'linkAttributes'=>array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'),
            'childrenAttributes'=>array('class'=>'dropdown-menu'));

        $routes = $menu->addChild($translator->trans('routes.routes'),$menu_attributes);

        $routes->addChild($translator->trans('routes.all'),array('uri'=>'/'));
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
        return $menu;
    }

} 