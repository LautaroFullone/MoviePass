<?php

namespace Models;

class Room{

    private $id;
    private $name;
    private $seatsCapacity;
    private $ticketValue;
    private $idCinema;

 

    public function __construct($name="",$seatsCapacity="",$ticketValue="",$idCinema="")
    {   
        $this->name=$name;
        $this->seatsCapacity=$seatsCapacity;
        $this->ticketValue=$ticketValue;
        $this->idCinema=$idCinema;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of seatsCapacity
     */ 
    public function getSeatsCapacity()
    {
        return $this->seatsCapacity;
    }

    /**
     * Set the value of seatsCapacity
     *
     * @return  self
     */ 
    public function setSeatsCapacity($seatsCapacity)
    {
        $this->seatsCapacity = $seatsCapacity;

        return $this;
    }

    /**
     * Get the value of ticketValue
     */ 
    public function getTicketValue()
    {
        return $this->ticketValue;
    }

    /**
     * Set the value of ticketValue
     *
     * @return  self
     */ 
    public function setTicketValue($ticketValue)
    {
        $this->ticketValue = $ticketValue;

        return $this;
    }

    /**
     * Get the value of idCinema
     */ 
    public function getIdCinema()
    {
        return $this->idCinema;
    }

    /**
     * Set the value of idCinema
     *
     * @return  self
     */ 
    public function setIdCinema($idCinema)
    {
        $this->idCinema = $idCinema;

        return $this;
    }
}
