<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 28.11.13
 * Time: 10:57
 */

namespace Podorozhniki\MainBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Podorozhniki\MainBundle\Entity\Who;

class LoadWhoData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $types = ['Driver','Passenger'];
        $counter = 0;
        foreach($types as $type){
            $who = new Who();
            $who->setName($type);
            $manager->persist($who);
            $manager->flush();
            $this->setReference('who-'.$counter++,$who);
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}