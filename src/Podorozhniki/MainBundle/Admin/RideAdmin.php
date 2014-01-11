<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 11.01.14
 * Time: 15:49
 */

namespace Podorozhniki\MainBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RideAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user.username')
            ->add('departure')
            ->add('destination');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('user.username',null,array('label'=>'Username'))
            ->add('user.firstname',null,array('label'=>'Firstname'))
            ->add('user.lastname',null,array('label'=>'Lastname'))
            ->add('departure')
            ->add('destination')
            ->add('departureanytime')
            ->add('departuretime')
            ->add('numberofseats')
            ->add('distance')
            ->add('returnanytime')
            ->add('returndate')
            ->add('price',null,array('label'=>'Price'));
    }
} 