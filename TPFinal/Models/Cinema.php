<?php
namespace Models;

class Cinema {

    private $id;
    private $name;
    private $address;
    private $capacity;
    private $aperHour;
    private $closeHour;

    public function __construct($name = "", $address = "", $capacity = "", $aperHour = "", $closeHour = "")
    {
        $this->name = $name;       
        $this->address = $address;        
        $this->capacity = $capacity;   
        $this->aperHour = $aperHour;
        $this->closeHour = $closeHour;
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
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of capacity
     */ 
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @return  self
     */ 
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
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
     * Get the value of aperHour
     */ 
    public function getAperHour()
    {
        return $this->aperHour;
    }

    /**
     * Set the value of aperHour
     *
     * @return  self
     */ 
    public function setAperHour($aperHour)
    {
        $this->aperHour = $aperHour;

        return $this;
    }

    /**
     * Get the value of closeHour
     */ 
    public function getCloseHour()
    {
        return $this->closeHour;
    }

    /**
     * Set the value of closeHour
     *
     * @return  self
     */ 
    public function setCloseHour($closeHour)
    {
        $this->closeHour = $closeHour;

        return $this;
    }
}


?>