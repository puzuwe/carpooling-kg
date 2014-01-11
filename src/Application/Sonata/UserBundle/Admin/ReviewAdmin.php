<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 11.01.14
 * Time: 17:35
 */

namespace Application\Sonata\UserBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReviewAdmin extends Admin {

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('id')
            //->add('user.firstname')
            ->add('likes')
            ->add('body')
            ->add('published');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id')
            ->add('user.firstname')
            ->add('likes')
            ->add('body')
            ->add('published')
            ->add('reviewer');
    }
} 