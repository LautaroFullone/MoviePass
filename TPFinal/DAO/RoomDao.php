<?php
   namespace DAO;

   use Models\Room as Room;
   use DAO\Connection as Connection;
   use \Exception as Exception;

   class RoomDao
   {        
       private $tableName = "rooms";
       private $connection;

       public function __construct()
       {
           
       }


       public function getFunctionsRoom($idRoom, $fecha) //devuelve las funciones de una sala en un dia determinado
       {
        $fecha = "'".$fecha."'";
        try{
            $query = "select 
                        functions.functionsHour
                    from functions
                    where functions.id_room = $idRoom and functions.functionDate =$fecha;";

            $this->connection = Connection :: GetInstance();
            $result = $this->connection->Execute($query);
            return $result;

        }
        catch (\PDOException $ex)
    {
        throw $ex;
    }
       }
        public function roomsExists($idCinema)
        {
            try{
                $query = "select
                    ifnull(count(rooms.id_room),0) as 'Cantidad Salas'
                    from rooms
                    where rooms.id_cine = $idCinema";

                $this->connection = Connection :: GetInstance();
                $result = $this->connection->Execute($query);
                
                return $result;

            }
            catch (\PDOException $ex)
             {
                throw $ex;
             }

        }


       /**Trae las funciones de un cine en particular */
       public function getFunctionsCinema ($idCine)
       {
        try{
            $query ="select 
            movies.title as titulo,
            functions.id_function as 'ID Funcion',
            $this->tableName.roomName as 'Sala',
            DATE_FORMAT( functions.functionDate, '%Y-%m-%d') as 'Fecha', 
            functions.functionsHour as 'Hora',
            cinemas.cinemaName as 'Nombre Cine',
            rooms.id_cine as 'id_cine'
             from functions
            inner join $this->tableName
            on functions.id_room = $this->tableName.id_room
            inner join movies
            on functions.id_movie = movies.id_movie
            inner join cinemas
            on $this->tableName.id_cine = cinemas.id_cine
            where cinemas.id_cine = $idCine";

            
            $this->connection = Connection :: GetInstance();
            $result = $this->connection->Execute($query);
            return $result;
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }

       }
       public function getRoomCapacity($idCine){
        try{
            $query ="select ifnull(sum($this->tableName.seatsCapacity),0) as capEnUso from  $this->tableName where $this->tableName.id_cine = $idCine;";
            $parameters["id_cine"] = $idCine;


            $this->connection = Connection :: GetInstance();
            return $this->connection->Execute($query, $parameters);
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
       }
    
    public function getCinemaCapacity($idCine){
     try{
         $query ="select cinemas.capacity from cinemas where cinemas.id_cine = $idCine;";

         $parameters["id_cine"] = $idCine;

         $this->connection = Connection :: GetInstance();
         return $this->connection->Execute($query, $parameters);
     }
     catch (\PDOException $ex)
     {
         throw $ex;
     }
    }
       public function Add(Room $room)
       {
           try{
               $query = " insert into  $this->tableName (roomName, seatsCapacity, ticketValue, id_cine ) VALUES (:roomName, :seatsCapacity, :ticketValue, :id_cine);";
               
               $parameters["roomName"] = $room->getName();
               $parameters["seatsCapacity"] = $room->getSeatsCapacity();
               $parameters["ticketValue"] = $room->getTicketValue();
               $parameters["id_cine"] = $room->getIdCinema();
   

               $this->connection = Connection :: GetInstance();
               $this->connection->ExecuteNonQuery($query, $parameters);
           }
           catch (\PDOException $ex)
           {
               throw $ex;
           }
       }
        /*
        Trae todas las salas de un cine especifico
        */ 
       public function GetAll($id)
        {
            try
            {
                $roomsList = array();
                $query = "select * from $this->tableName where id_cine = $id";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                foreach($result as $value)
                {
                    $room = new Room();
                    $room->setId($value["id_room"]);
                    $room->setname($value["roomName"]);
                    $room->setSeatsCapacity($value["seatsCapacity"]);
                    $room->setTicketValue($value["ticketValue"]);
                    $room->setIdCinema($value["id_cine"]);
                    

                    array_push($roomsList, $room);
                }

                return $roomsList;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        public function getOne($id){
            try
            {
               
                $query = "select * from $this->tableName where id_room = $id";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                
               foreach($result as $value){
                    $room = new Room();
                    $room->setId($value["id_room"]);
                    $room->setname($value["roomName"]);
                    $room->setSeatsCapacity($value["seatsCapacity"]);
                    $room->setTicketValue($value["ticketValue"]);
                    $room->setIdCinema($value["id_cine"]);
               }

            

                return $room;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }

        }

        public function GetnameCinema($id)
        {
            try
            {
                $roomsList = array();
                $query ="select cinemas.cinemaName from cinemas where cinemas.id_cine=$id;";
                
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query);
                
                $nombre = $result[0];

                return $nombre;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

       public function Modify($id, $name, $seatsCapacity, $ticketValue,$idCine)
        {
            try
            {
            $query = "update $this->tableName set roomName = :roomName, seatsCapacity = :seatsCapacity, ticketValue = :ticketValue where id_room = :id_room;";
            
            $parameters["id_room"] = $id;
            $parameters["roomName"] = $name;
            $parameters["seatsCapacity"] = $seatsCapacity;
            $parameters["ticketValue"] = $ticketValue;


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
                $query = "delete from $this->tableName where id_room = $id;";

                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function countRooms($idCinema)
        {
            try
            {
                $query = "select count(id_room) as cantidad from $this->tableName where $this->tableName.id_cine =:id_cine";

                $parameters["id_cine"] = $idCinema;
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }   
        }
        public function getPriceRoom($idFunction)
        {
            try
            {
                $query = "select $this->tableName.ticketValue as Precio
                from $this->tableName
                inner join functions 
                on functions.id_room = $this->tableName.id_room
                where functions.id_function =$idFunction";

               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }   
        }

    }
?>
