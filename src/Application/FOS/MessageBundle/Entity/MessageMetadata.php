<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 17.11.13
 * Time: 4:09
 */

namespace Application\FOS\MessageBundle\Entity;

use FOS\MessageBundle\Entity\MessageMetadata as BaseMessageMetadata;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;

/**
 * @ORM\Entity
 */
class MessageMetadata extends  BaseMessageMetadata{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *  targetEntity="Application\FOS\MessageBundle\Entity\Message",
     *  inversedBy="metadata"
     * )
     */
    protected $message;

    /**
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\UserBundle\Entity\User"
     * )
     * @var ParticipantInterface
     */
    protected $participant;
} 