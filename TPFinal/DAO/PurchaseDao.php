<?php
    namespace DAO;

    use Models\Pucharse as Pucharse;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class PurchaseDao
    {
        private $tableName = "purchases";
        private $connection;

        public function __construct()
        {
              
        }

        public function add($total,$idCreditCard,$date){
                
            try{
                $query = " insert into $this->tableName (total, id_creditCard, purchaseDate) VALUES (:total,:id_creditCard ,:purchaseDate );
                ";
                $parameters["total"] = $total;
                $parameters["id_creditCard"] = $idCreditCard;
                $parameters["purchaseDate"] = $date;

                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        #trae La id de la Ultima compra HECHA
        public function getLastPurchaseID(){
                
            try{
                $query = "select id_purchase from $this->tableName order by id_purchase desc limit 1 ;";
               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        #trae DAtos  de una compra especifica (IDPURCHASE)
        public function getPurchaseInfo($idPurchase){
                
            try{
                $query = "select p.total,
                p.purchaseDate as Fecha,
                u.mail,
                u.userName as Usuario
                from $this->tableName as p
                inner join tickets
                on tickets.id_purchase = p.id_purchase
                inner join creditcards as c
                on p.id_creditCard= c.id_creditCard
                inner join users as u
                on u.id_user = c.id_user
                where p.id_purchase = $idPurchase;";
               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        #trae DAtos de todas las compras hechas por un usuario (IDUSER)
        public function getAllPurchase($idUser){

            try{
                $query="select   p.purchaseDate as FechaCompra,
                            DATE_FORMAT(f.functionDate, '%Y-%m-%d') as FechaFuncion,
                        r.roomName,
                        c.cinemaName,
                        m.title,
                        f.functionsHour,
                        t.id_ticket
                from purchases as p 
                join tickets as t
                on p.id_purchase = t.id_purchase
                join functions as f
                on t.id_function = f.id_function
                    join rooms as r
                    on f.id_room=r.id_room
                    join cinemas as c
                    on c.id_cine = r.id_cine
                    join movies as m
                    on f.id_movie = m.id_movie
                join creditcards as cc
                on cc.id_creditCard = p.id_creditCard
                join users as u
                on u.id_user=cc.id_user
                where u.id_user = $idUser;";
               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
            
        }

        public function getOrderTitlePurchases($idUser){

            try{
                $query="select   p.purchaseDate as FechaCompra,
                            DATE_FORMAT(f.functionDate, '%Y-%m-%d') as FechaFuncion,
                        r.roomName,
                        c.cinemaName,
                        m.title,
                        f.functionsHour,
                        t.id_ticket
                from purchases as p 
                join tickets as t
                on p.id_purchase = t.id_purchase
                join functions as f
                on t.id_function = f.id_function
                    join rooms as r
                    on f.id_room=r.id_room
                    join cinemas as c
                    on c.id_cine = r.id_cine
                    join movies as m
                    on f.id_movie = m.id_movie
                join creditcards as cc
                on cc.id_creditCard = p.id_creditCard
                join users as u
                on u.id_user=cc.id_user
                where u.id_user = $idUser
                order by m.title;";
               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
            
        }

        public function getOrderDatePurchases($idUser){

            try{
                $query="select   p.purchaseDate as FechaCompra,
                            DATE_FORMAT(f.functionDate, '%Y-%m-%d') as FechaFuncion,
                        r.roomName,
                        c.cinemaName,
                        m.title,
                        f.functionsHour,
                        t.id_ticket
                from purchases as p 
                join tickets as t
                on p.id_purchase = t.id_purchase
                join functions as f
                on t.id_function = f.id_function
                    join rooms as r
                    on f.id_room=r.id_room
                    join cinemas as c
                    on c.id_cine = r.id_cine
                    join movies as m
                    on f.id_movie = m.id_movie
                join creditcards as cc
                on cc.id_creditCard = p.id_creditCard
                join users as u
                on u.id_user=cc.id_user
                where u.id_user = $idUser
                order by FechaFuncion desc;";
               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
            
        }

        public function getPurcharseCinema($dateInicial,$dateFinal,$idCinema)
        {
                try{
                $query="select
                sum(td.total) as total,
                td.cinemaName
                from (select 
                        total,
                        c.cinemaName as cinemaName
                        from purchases p
                        join tickets t
                        on t.id_purchase = p.id_purchase
                        join functions as f
                        on f.id_function = t.id_function
                        join rooms as r
                        on f.id_room = r.id_room
                        join cinemas as c
                        on c.id_cine = r.id_cine
                        where c.id_cine = :idCinema and p.purchaseDate BETWEEN :dateInicial and :dateFinal
                        group by p.id_purchase) td";
                
                        $parameters["idCinema"]= $idCinema;
                        $parameters["dateInicial"]= $dateInicial;
                        $parameters["dateFinal"]= $dateFinal;
               
                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query,$parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function getTotalTitleMovie ($title, $fechaInicial, $fechaFinal)
        {
            try{
                $query = "select
                sum(td.total) as total,
                td.title,
                td.cinemaName
                from (select 
                        total,
                        m.title as title,
                        c.cinemaName as cinemaName
                        from purchases p
                        join tickets t
                        on t.id_purchase = p.id_purchase
                        join functions as f
                        on f.id_function = t.id_function
                        join rooms as r
                        on f.id_room = r.id_room
                        join cinemas as c
                        on c.id_cine = r.id_cine
                        join movies as m
                        on f.id_movie = m.id_movie
                        where m.title = :title  and p.purchaseDate BETWEEN :dateInicial and :dateFinal
                        group by p.id_purchase) td;";

                $parameters["title"] = $title;
                $parameters["dateInicial"] = $fechaInicial;
                $parameters["dateFinal"] = $fechaFinal;

                $this->connection = Connection :: GetInstance();
                return $this->connection->Execute($query,$parameters);


            }
            catch(\PDOException $ex)
            {
                throw $ex;
            }
        }
        

    }



?>