<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 28.11.13
 * Time: 11:16
 */

namespace Application\Sonata\UserBundle\DataFixture\ORM;


use Application\Sonata\UserBundle\Entity\Review;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadReviewData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $review_information = [
            ['body' => 'В начале ноября произошло интересное событие, совершенно не замеченное, но для некоторых разработчиков оно может стать критическим.',
                'published' => new \DateTime('2013-12-12 24:12:22'),
                'likes' => true,
                'user' => $this->getReference('user-0'),
                'reviewer' => $this->getReference('user-1')
            ],
            ['body' => 'Издание в твердом переплете, 368 страниц. Но какое это чтение! Автор — Сергей Павлович в настоящее время отбывает наказание в одной из тюрем Беларуси и его',
                'published' => new \DateTime('2013-12-12 12:45:00'),
                'likes' => true,
                'user' => $this->getReference('user-0'),
                'reviewer' => $this->getReference('user-1')
            ],
            ['body' => 'Издание в твердом переплете, 368 страниц. Но какое это чтение! Автор — Сергей Павлович в настоящее время отбывает наказание в одной из тюрем Беларуси и его',
                'published' => new \DateTime('2013-11-30 08:00:00'),
                'likes' => true,
                'user' => $this->getReference('user-1'),
                'reviewer' => $this->getReference('user-0')
            ]
        ];

        foreach ($review_information as $info) {
            $review = new Review();
            $review->setBody($info['body']);
            $review->setPublished($info['published']);
            $review->setLikes($info['likes']);
            $review->setUser($info['user']);
            $review->addReviewer($info['reviewer']);
            $manager->persist($review);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 4;
    }
}