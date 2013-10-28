<?php

namespace Podorozhniki\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Who
 */
class Who
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rides;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rides = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return Who
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * Add rides
     *
     * @param \Podorozhniki\MainBundle\Entity\Ride $rides
     * @return Who
     */
    public function addRide(\Podorozhniki\MainBundle\Entity\Ride $rides)
    {
        $this->rides[] = $rides;
    
        return $this;
    }

    /**
     * Remove rides
     *
     * @param \Podorozhniki\MainBundle\Entity\Ride $rides
     */
    public function removeRide(\Podorozhniki\MainBundle\Entity\Ride $rides)
    {
        $this->rides->removeElement($rides);
    }

    /**
     * Get rides
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRides()
    {
        return $this->rides;
    }

    public function __ToString()
    {
        return $this->getName();
    }
}