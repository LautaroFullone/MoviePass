<?php
    namespace Models;

    class Ticket
    {
        private $id;
        private $idFunction;
        private $qr;

        public function __construct($id="",$idFunction="", $qr="")
        {   
                $this->id=$id;
                $this->idFunction=$cinemaidFunctionName;
                $this->qr=$qr;
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
         * @return self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

       

        /**
         * Get the value of idFunction
         */ 
        public function getIdFunction()
        {
                return $this->idFunction;
        }

        /**
         * Set the value of idFunction
         *
         * @return self
         */ 
        public function setIdFunction($idFunction)
        {
                $this->idFunction = $idFunction;

                return $this;
        }

        /**
         * Get the value of qr
         */ 
        public function getQr()
        {
                return $this->qr;
        }

        /**
         * Set the value of qr
         *
         * @return self
         */ 
        public function setQr($qr)
        {
                $this->qr = $qr;

                return $this;
        }
    }
?>