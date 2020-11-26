<?php
  namespace DAO;

  use Models\Functions as Funct;
  use DAO\Connection as Connection;
  use \Exception as Exception;


  class FunctionDao
  {        
    private $tableName = "functions";
    private $connection;

    public function __construct()
    {
          
    }
    
    public function Add(Funct $function)
    {
        try{
            $query = " insert into  $this->tableName (id_room,id_movie,occupiedSeats,functionDate,functionsHour ) VALUES (:id_room, :id_movie, :occupiedSeats, :functionDate,:functionsHour);";
            
            $parameters["id_room"] = $function->getIdRoom();
            $parameters["id_movie"] = $function->getIdMovie();
            $parameters["occupiedSeats"] = $function->getOccupiedSeats();
            $parameters["functionDate"] = $function->getDate();
            $parameters["functionsHour"]=$function->getHour();


            $this->connection = Connection :: GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
     }

     public function getAllTitlesWithFunctions ()
     {
         try
         {
            $query ="select distinct
                    movies.title 
                    from $this->tableName
                    inner join rooms
                    on $this->tableName.id_room = rooms.id_room
                    inner join cinemas
                    on rooms.id_cine = cinemas.id_cine
                    inner join movies
                    on $this->tableName.id_movie = movies.id_movie;";

            $this->connection = Connection :: GetInstance();
            $result =$this->connection->Execute($query);
            return $result;

         }
         catch(\PDOException $ex)
         {
             throw $ex;
         }
     }

     public function getCantTicketsFunctions()
     {
      
        try{
            $query = "  select 
                            functions.id_function,
                            ifnull(count(id_ticket),0) as Cantidad,
                            rooms.seatsCapacity,
                            cinemas.cinemaName,
                            rooms.roomName,
                            DATE_FORMAT(functions.functionDate, '%Y-%m-%d') as functionDate,
                            functions.functionsHour,
                            movies.title
                        from tickets
                        right join functions
                        on functions.id_function = tickets.id_function
                        inner join rooms
                        on rooms.id_room= functions.id_room
                        inner join cinemas
                        on cinemas.id_cine = rooms.id_cine
                        inner join movies
                        on functions.id_movie = movies.id_movie
                        group by functions.id_function
                        order by functionDate;";
            
            $this->connection = Connection :: GetInstance();
            return $this->connection->Execute($query);
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
     }

     
     public function getFunctionsMovie($idMovie)
     {
      try
      {
          $query ="select c.cinemaName,
          f.id_function,
          r.roomName,
          r.id_room as 'room',
          DATE_FORMAT(f.functionDate, '%Y-%m-%d') as functionDate,
          f.functionsHour 
          from $this->tableName as f
          inner join rooms as r
          on f.id_room = r.id_room
          inner join cinemas as c
          on c.id_cine = r.id_cine
          where f.id_movie = $idMovie;";

          $this->connection = Connection::GetInstance();

          $result = $this->connection->Execute($query);

          return $result;
      }
      catch (\PDOException $ex)
      {
          throw $ex;
      }
     }


     public function GetMovieDataForFunction ($idFunction,$cantidad)
     {
        try
        {
            $query ="select 
            DATE_FORMAT(functions.functionDate, '%Y-%m-%d') as functionDate,
            functions.functionsHour,
            movies.title as title,
            rooms.roomName as roomName,
            cinemas.cinemaName as cinemaName,
            tickets.id_ticket
            from $this->tableName
            inner join movies
            on functions.id_movie = movies.id_movie
            inner join rooms
            on rooms.id_room = functions.id_room
            inner join cinemas
            on cinemas.id_cine = rooms.id_cine
            inner join tickets
            on tickets.id_function = functions.id_function
            where functions.id_function = :id_function
            order by tickets.id_ticket desc
            limit $cantidad;";

            $parameters ["id_function"] = $idFunction;

  
            $this->connection = Connection::GetInstance();
  
            $result = $this->connection->Execute($query, $parameters);
  
            return $result;
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
     }

}



?>