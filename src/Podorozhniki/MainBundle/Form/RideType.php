<?php

namespace Podorozhniki\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RideType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('departure')
            ->add('destination')
            ->add('departuretime')
            ->add('departureanytime')
            ->add('numberofseats')
            ->add('oneseatcost')
            ->add('returndate')
            ->add('returnanytime')
            ->add('who')
            ->add('user')
            ->add('Add','submit');
        //$builder->setAttributes(array('class'=>'form-horizontal'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Podorozhniki\MainBundle\Entity\Ride'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'podorozhniki_mainbundle_ride';
    }
}
