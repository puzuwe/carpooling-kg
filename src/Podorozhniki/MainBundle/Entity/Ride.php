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
    /**
     * @var \Podorozhniki\MainBundle\Entity\Currency
     */
    private $currency;


    /**
     * Set currency
     *
     * @param \Podorozhniki\MainBundle\Entity\Currency $currency
     * @return Ride
     */
    public function setCurrency(\Podorozhniki\MainBundle\Entity\Currency $currency)
    {
        $this->currency = $currency;
    
        return $this;
    }

    /**
     * Get currency
     *
     * @return \Podorozhniki\MainBundle\Entity\Currency 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @var float
     */
    private $departurelatitude;

    /**
     * @var float
     */
    private $departurelongitude;

    /**
     * @var float
     */
    private $destinationlatitude;

    /**
     * @var float
     */
    private $destinationlongitude;


    /**
     * Set departurelatitude
     *
     * @param float $departurelatitude
     * @return Ride
     */
    public function setDeparturelatitude($departurelatitude)
    {
        $this->departurelatitude = $departurelatitude;
    
        return $this;
    }

    /**
     * Get departurelatitude
     *
     * @return float 
     */
    public function getDeparturelatitude()
    {
        return $this->departurelatitude;
    }

    /**
     * Set departurelongitude
     *
     * @param float $departurelongitude
     * @return Ride
     */
    public function setDeparturelongitude($departurelongitude)
    {
        $this->departurelongitude = $departurelongitude;
    
        return $this;
    }

    /**
     * Get departurelongitude
     *
     * @return float 
     */
    public function getDeparturelongitude()
    {
        return $this->departurelongitude;
    }

    /**
     * Set destinationlatitude
     *
     * @param float $destinationlatitude
     * @return Ride
     */
    public function setDestinationlatitude($destinationlatitude)
    {
        $this->destinationlatitude = $destinationlatitude;
    
        return $this;
    }

    /**
     * Get destinationlatitude
     *
     * @return float 
     */
    public function getDestinationlatitude()
    {
        return $this->destinationlatitude;
    }

    /**
     * Set destinationlongitude
     *
     * @param float $destinationlongitude
     * @return Ride
     */
    public function setDestinationlongitude($destinationlongitude)
    {
        $this->destinationlongitude = $destinationlongitude;
    
        return $this;
    }

    /**
     * Get destinationlongitude
     *
     * @return float 
     */
    public function getDestinationlongitude()
    {
        return $this->destinationlongitude;
    }
    /**
     * @var string
     */
    private $distance;


    /**
     * Set distance
     *
     * @param string $distance
     * @return Ride
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    
        return $this;
    }

    /**
     * Get distance
     *
     * @return string 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @var string
     */
    private $route;


    /**
     * Set route
     *
     * @param string $route
     * @return Ride
     */
    public function setRoute($route)
    {
        $this->route = $route;
    
        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }
}