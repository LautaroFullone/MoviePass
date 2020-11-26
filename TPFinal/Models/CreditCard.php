<?php

namespace Models;

class CreditCard {


    private $cardHolder;
    private $expiration;
    private $numberCC;
    private $id_company;

    public function __construct($cardHolder,$numberCC,$expiration,$company)
    {
        $this->cardHolder =$cardHolder;
        $this->numberCC =$numberCC;
        $this->expiration=$expiration;
        $this->id_company=$company;
    }




    /**
     * Get the value of cardHolder
     */ 
    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    /**
     * Set the value of cardHolder
     *
     * @return  self
     */ 
    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;

        return $this;
    }

    /**
     * Get the value of expiration
     */ 
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set the value of expiration
     *
     * @return  self
     */ 
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get the value of numberCC
     */ 
    public function getNumberCC()
    {
        return $this->numberCC;
    }

    /**
     * Set the value of numberCC
     *
     * @return  self
     */ 
    public function setNumberCC($numberCC)
    {
        $this->numberCC = $numberCC;

        return $this;
    }

    /**
     * Get the value of id_company
     */ 
    public function getId_company()
    {
        return $this->id_company;
    }

    /**
     * Set the value of id_company
     *
     * @return  self
     */ 
    public function setId_company($id_company)
    {
        $this->id_company = $id_company;

        return $this;
    }
}


?>