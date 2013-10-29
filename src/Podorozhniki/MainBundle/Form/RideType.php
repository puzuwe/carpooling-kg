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
            ->add('who')
            ->add('departure', null, array('attr' => array('autocomplete' => 'on')))
            ->add('destination', null, array('attr' => array('autocomplete' => 'on', 'onblur' => 'calcRoute()')))
            ->add('departuretime', 'datetime', array('input' => 'datetime', 'widget' => 'single_text'))
            ->add('departureanytime')
            ->add('numberofseats')
            ->add('oneseatcost')
            ->add('returndate', 'datetime', array('input' => 'datetime', 'widget' => 'single_text'))
            ->add('returnanytime')
            //->add('user','hidden',array('data'=>$this->user))
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
