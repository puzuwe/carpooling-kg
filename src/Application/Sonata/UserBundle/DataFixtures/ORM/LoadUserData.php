<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Almaz
 * Date: 03.10.13
 * Time: 19:19
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Sonata\UserBundle\DataFixture\ORM;


use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername("admin");
        $userAdmin->setEmail('admin@school.kg');
        $userAdmin->setPlainPassword('password');
        $userAdmin->setSuperAdmin(true);
        $userAdmin->setEnabled(true);

        $manager->persist($userAdmin);
        $manager->flush();
    }
}