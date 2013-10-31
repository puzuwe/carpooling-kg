<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 31.10.13
 * Time: 20:54
 */

namespace Podorozhniki\MainBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Podorozhniki\MainBundle\Entity\Currency;

class LoadCurrencyData implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $currencies = array("Сом","Доллар","Лира");
        foreach($currencies as $c){
            $currency = new Currency();
            $currency->setName($c);
            $manager->persist($currency);
        }
    }
}