<?php

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 */
class Review
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $published;

    /**
     * @var boolean
     */
    private $likes;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reviewer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reviewer = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set body
     *
     * @param string $body
     * @return Review
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set published
     *
     * @param \DateTime $published
     * @return Review
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return \DateTime 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set likes
     *
     * @param boolean $likes
     * @return Review
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    
        return $this;
    }

    /**
     * Get likes
     *
     * @return boolean 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Review
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add reviewer
     *
     * @param \Application\Sonata\UserBundle\Entity\User $reviewer
     * @return Review
     */
    public function addReviewer(\Application\Sonata\UserBundle\Entity\User $reviewer)
    {
        $this->reviewer[] = $reviewer;
    
        return $this;
    }

    /**
     * Remove reviewer
     *
     * @param \Application\Sonata\UserBundle\Entity\User $reviewer
     */
    public function removeReviewer(\Application\Sonata\UserBundle\Entity\User $reviewer)
    {
        $this->reviewer->removeElement($reviewer);
    }

    /**
     * Get reviewer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }
}
