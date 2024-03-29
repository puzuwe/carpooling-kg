<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 31.10.13
 * Time: 20:54
 */

namespace Podorozhniki\MainBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Podorozhniki\MainBundle\Entity\Currency;

class LoadCurrencyData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $currencies = array("Сом","Доллар");
        $counter = 0;
        foreach($currencies as $c){
            $currency = new Currency();
            $currency->setName($c);
            $manager->persist($currency);
            $manager->flush();

            $this->setReference('currency-'.$counter++,$currency);
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }
}