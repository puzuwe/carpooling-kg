<?php

namespace Podorozhniki\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ride
 */
class Ride
{
    /**
     * @var string
     */
    private $departure;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var \DateTime
     */
    private $departuretime;

    /**
     * @var boolean
     */
    private $departureanytime;

    /**
     * @var integer
     */
    private $numberofseats;

    /**
     * @var float
     */
    private $oneseatcost;

    /**
     * @var \DateTime
     */
    private $returndate;

    /**
     * @var boolean
     */
    private $returnanytime;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Podorozhniki\MainBundle\Entity\Who
     */
    private $who;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $user;


    /**
     * Set departure
     *
     * @param string $departure
     * @return Ride
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    
        return $this;
    }

    /**
     * Get departure
     *
     * @return string 
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Ride
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    
        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set departuretime
     *
     * @param \DateTime $departuretime
     * @return Ride
     */
    public function setDeparturetime($departuretime)
    {
        $this->departuretime = $departuretime;
    
        return $this;
    }

    /**
     * Get departuretime
     *
     * @return \DateTime 
     */
    public function getDeparturetime()
    {
        return $this->departuretime;
    }

    /**
     * Set departureanytime
     *
     * @param boolean $departureanytime
     * @return Ride
     */
    public function setDepartureanytime($departureanytime)
    {
        $this->departureanytime = $departureanytime;
    
        return $this;
    }

    /**
     * Get departureanytime
     *
     * @return boolean 
     */
    public function getDepartureanytime()
    {
        return $this->departureanytime;
    }

    /**
     * Set numberofseats
     *
     * @param integer $numberofseats
     * @return Ride
     */
    public function setNumberofseats($numberofseats)
    {
        $this->numberofseats = $numberofseats;
    
        return $this;
    }

    /**
     * Get numberofseats
     *
     * @return integer 
     */
    public function getNumberofseats()
    {
        return $this->numberofseats;
    }

    /**
     * Set oneseatcost
     *
     * @param float $oneseatcost
     * @return Ride
     */
    public function setOneseatcost($oneseatcost)
    {
        $this->oneseatcost = $oneseatcost;
    
        return $this;
    }

    /**
     * Get oneseatcost
     *
     * @return float 
     */
    public function getOneseatcost()
    {
        return $this->oneseatcost;
    }

    /**
     * Set returndate
     *
     * @param \DateTime $returndate
     * @return Ride
     */
    public function setReturndate($returndate)
    {
        $this->returndate = $returndate;
    
        return $this;
    }

    /**
     * Get returndate
     *
     * @return \DateTime 
     */
    public function getReturndate()
    {
        return $this->returndate;
    }

    /**
     * Set returnanytime
     *
     * @param boolean $returnanytime
     * @return Ride
     */
    public function setReturnanytime($returnanytime)
    {
        $this->returnanytime = $returnanytime;
    
        return $this;
    }

    /**
     * Get returnanytime
     *
     * @return boolean 
     */
    public function getReturnanytime()
    {
        return $this->returnanytime;
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
     * Set who
     *
     * @param \Podorozhniki\MainBundle\Entity\Who $who
     * @return Ride
     */
    public function setWho(\Podorozhniki\MainBundle\Entity\Who $who = null)
    {
        $this->who = $who;
    
        return $this;
    }

    /**
     * Get who
     *
     * @return \Podorozhniki\MainBundle\Entity\Who 
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Ride
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
}
