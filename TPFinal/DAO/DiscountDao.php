<?php
    namespace DAO;

    use Models\Discount as Discount;
    use DAO\Connection as Connection;
    use \Exception as Exception;


    class DiscountDao
    {
        private $tableName = "discounts";
        private $tableDiscountsXCinema = "discountsXcinema";
        private $connection;

        public function __construct()
        {
            
        }

        public function Add(Discount $discount)
        {
            try{
                $query = " insert into  $this->tableName (percentage, descript, minCant) VALUES (:percentage, :descript, :minCant);";
                
                $parameters["percentage"] = $discount->getPercentage();
                $parameters["descript"] = $discount->getDescript();
                $parameters["minCant"] = $discount->getMinCant();

    
                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);    
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function GetAll($idCinema) 
        {
            try
            {
                $query = "select distinct d.id_discount as 'id_discount',
                                d.percentage as 'percentage',
                                d.descript as 'descript',
                                d.minCant as 'minCant'
                            from $this->tableName d
                            inner join $this->tableDiscountsXCinema dxc
                            on dxc.id_cine = $idCinema;";

            
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function retrieveLastIdDiscount()
        {
            try{
                $query = "select max(id_discount) as 'id_discount' from $this->tableName";
                
                $this->connection = Connection :: GetInstance();
                
                $result =$this->connection->Execute($query);
                
                return $result[0];
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function addDiscountPerCinema($idDiscount, $idCinema)
        {
            try{
                $query = " insert into  $this->tableDiscountsXCinema (id_cine, id_discount) VALUES (:id_cine, :id_discount);";
                
                $parameters["id_cine"] = $idCinema;
                $parameters["id_discount"] = $idDiscount;
    
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