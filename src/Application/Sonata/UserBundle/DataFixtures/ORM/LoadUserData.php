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
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@school.kg',
                'plain_password' => 'password',
                'super_admin' => true,
                'enabled' => true,
                'firstname' => 'Администратор',
                'lastname' => 'Турдалиев',
                'reference' => 'admin'
            ],
            [
                'username' => 'nursultan',
                'email' => 'nursultan2010@gmail.com',
                'plain_password' => 'nursultan',
                'super_admin' => false,
                'enabled' => true,
                'firstname' => 'Нурсултан',
                'lastname' => 'Турдалиев',
                'reference' => 'user-0'
            ],
            [
                'username' => 'nurali',
                'email' => 'nurali@gmail.com',
                'plain_password' => 'nurali',
                'super_admin' => false,
                'enabled' => true,
                'firstname' => 'Нурали',
                'lastname' => 'Турдалиев',
                'reference' => 'user-1'
            ]
        ];

        foreach ($users as $user) {
            $userAdmin = new User();
            $userAdmin->setUsername($user['username']);
            $userAdmin->setEmail($user['email']);
            $userAdmin->setPlainPassword($user['plain_password']);

            $userAdmin->setSuperAdmin($user['super_admin']);
            $userAdmin->setEnabled($user['enabled']);
            $userAdmin->setFirstname($user['firstname']);
            $userAdmin->setLastname($user['lastname']);
            $manager->persist($userAdmin);
            $manager->flush();
            $this->setReference($user['reference'], $userAdmin);
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}