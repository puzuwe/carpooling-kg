<?php
/**
 * Created by PhpStorm.
 * User: Almaz
 * Date: 17.11.13
 * Time: 3:57
 */

namespace Application\FOS\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\MessageBundle\Entity\Message as BaseMessage;
use FOS\MessageBundle\Model\ParticipantInterface;
use FOS\MessageBundle\Model\ThreadInterface;

/**
 * @ORM\Entity
 */
class Message extends BaseMessage
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *  targetEntity="Application\FOS\MessageBundle\Entity\Thread",
     *  inversedBy="messages"
     * )
     * @var ThreadInterface
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\UserBundle\Entity\User"
     * )
     * @var ParticipantInterface
     */
    protected $sender;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Application\FOS\MessageBundle\Entity\MessageMetadata",
     *  mappedBy="message",
     *  cascade={"all"}
     * )
     * @var MessageMetadata
     */
    protected $metadata;
} 