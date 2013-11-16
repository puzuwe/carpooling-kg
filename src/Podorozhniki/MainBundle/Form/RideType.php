<?php

namespace Podorozhniki\MainBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RideType extends AbstractType
{
    protected $user;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */


    public function __construct(\FOS\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('who',null,array('multiple'=>false,'expanded'=>true,'attr'=>array('data-toggle'=>"buttons","class"=>"btn-group")))
            ->add('departure', null, array('attr' => array('autocomplete' => 'on','onblur'=>'setMarkerFromName("departure","a")')))
            ->add('destination', null, array('attr' => array('autocomplete' => 'on', 'onblur' => 'setMarkerFromName("destination","b")')))
            ->add('distance',null,array('attr'=>array('readonly'=>'readonly')))
            ->add('departuretime', 'datetime', array('input' => 'datetime', 'widget' => 'single_text'))
            ->add('departureanytime')
            ->add('numberofseats')

            ->add('currency',null,array('multiple'=>false,'expanded'=>true,'attr'=>array('data-toggle'=>"buttons","class"=>"btn-group")))
            ->add('oneseatcost')
            ->add('returndate', 'datetime', array('input' => 'datetime', 'widget' => 'single_text'))
            ->add('returnanytime')
            ->add('departurelongitude','hidden')
            ->add('departurelatitude','hidden')
            ->add('destinationlongitude','hidden')
            ->add('destinationlatitude','hidden')
            ->add('user', 'entity', array('class' => 'ApplicationSonataUserBundle:User', 'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')->where('u.id=:id')->setParameter('id', $this->user->getId());
                }, 'attr' => array('class' => 'invisible'), 'label_attr' => array('class' => 'invisible')))
            ->add('Add', 'submit');

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
