<?php
    namespace DAO;

    use Models\Cinema as Cinema;
    use DAO\Connection as Connection;
    use \Exception as Exception;


    class CinemaDao
    {        
        private $tableName = "cinemas";
        private $connection;

        public function __construct()
        {
            
        }

        public function Add(Cinema $cine)
        {
            try{
                $query = " insert into  $this->tableName (cinemaName, cinemaAddress, capacity, aperHour, closeHour ) VALUES (:cinemaName, :cinemaAddress, :capacity, :aperHour, :closeHour);";
                
                $parameters["cinemaName"] = $cine->getName();
                $parameters["cinemaAddress"] = $cine->getAddress();
                $parameters["capacity"] = $cine->getCapacity();
                $parameters["aperHour"] = $cine->getAperHour();
                $parameters["closeHour"] = $cine->getCloseHour();
    

                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
               
            }
        }

       
      
        public function GetAll()
        {
            try
            {
                $cinemaList = array();
                $query = "select * from $this->tableName ";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                foreach($result as $value)
                {
                    $cinema = new Cinema();
                    $cinema->setId($value["id_cine"]);
                    $cinema->setName($value["cinemaName"]);
                    $cinema->setAddress($value["cinemaAddress"]);
                    $cinema->setCapacity($value["capacity"]);
                    $cinema->setAperHour($value["aperHour"]);
                    $cinema->setCloseHour($value["closeHour"]);

                    array_push($cinemaList, $cinema);
                }

                return $cinemaList;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        
        public function GetOneAsociative ($id)
        {
            try
            {
                $query = "select 
                $this->tableName.id_cine,
                $this->tableName.cinemaName,
                $this->tableName.cinemaAddress,
                $this->tableName.capacity,
                DATE_FORMAT($this->tableName.aperHour, '%H:%i:%s'),
                DATE_FORMAT($this->tableName.closeHour, '%H:%i:%s'), 
                from $this->tableName 
                where $this->tableName.id_cine = :id_cine";

                $parameters["id_cine"] = $id;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        
        public function GetOne ($id)
        {
            try
            {
                $query = "select * from $this->tableName where id_cine = $id";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                foreach ($result as $value)
                {
                    $cinema = new Cinema();
                    $cinema->setId($value["id_cine"]);
                    $cinema->setName($value["cinemaName"]);
                    $cinema->setAddress($value["cinemaAddress"]);
                    $cinema->setCapacity($value["capacity"]);
                    $cinema->setAperHour($value["aperHour"]);
                    $cinema->setCloseHour($value["closeHour"]);
                }

                return $cinema;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        public function Modify ($id, $name, $address, $capacity, $aperHour, $closeHour)
        {
            try
            {
            $query = "update $this->tableName set cinemaName = :cinemaName, cinemaAddress = :cinemaAddress, capacity = :capacity, aperHour = :aperHour, closeHour = :closeHour where id_cine = :id_cine;";
            
            $parameters["id_cine"] = $id;
            $parameters["cinemaName"] = $name;
            $parameters["cinemaAddress"] = $address;
            $parameters["capacity"] = $capacity;
            $parameters["aperHour"] = $aperHour;
            $parameters["closeHour"] = $closeHour;
            


                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }


        public function Remove($id)
        {
            try
            {
                $query = "delete from $this->tableName where id_cine = :id_cine;";

                $parameters["id_cine"] = $id;
                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

    }
?>
