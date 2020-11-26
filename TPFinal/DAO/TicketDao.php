<?php
    namespace DAO;
    use Models\Ticket as Ticket;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class TicketDao
    {
        private $tableName = "tickets";
        private $connection;

        public function add($idFuncion,$idPurchase){
                
            try{
                $query = " insert into  $this->tableName (id_function,id_purchase) VALUES (:id_function,:id_purchase);";
                
                $parameters["id_function"] = $idFuncion;
                $parameters["id_purchase"] = $idPurchase;

                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        #trae DAtos de un ticket de una compra especifica (IDPURCHASE)
        public function getTicketsPurchase($idPurchase){
            try
            {
                $query= "select f.functionsHour,
                DATE_FORMAT(f.functionDate, '%Y-%m-%d') as functionDate,
                r.roomName,
                c.cinemaName,
                m.title
         from tickets as t
         join functions as f
         on t.id_function = f.id_function
         join rooms as r
         on f.id_room=r.id_room
         join cinemas as c
         on c.id_cine = r.id_cine
         join movies as m
         on f.id_movie = m.id_movie
         join purchases as p
         on p.id_purchase =t.id_purchase
         where t.id_purchase =2;
         ";

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
    }




?>