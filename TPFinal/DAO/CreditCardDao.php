<?php
  namespace DAO;

  use Models\CreditCard as CreditCard;

  use DAO\Connection as Connection;
  use \Exception as Exception;


  class CreditCardDao
  {      
    private $tableName = "creditCards";
    private $connection;

    public function __construct()
    {
          
    }

    public function Add(CreditCard $tarjeta,$idUser)
    {
        try{
            $query = " insert into  $this->tableName (cardHolder ,expiration,numberCC,id_company,id_user) VALUES (:cardHolder, :expiration, AES_ENCRYPT(:numberCC,'". ENCRYPT_KEY ."'), :id_company, :id_user);";

            $parameters["cardHolder"] = $tarjeta->getCardHolder();
            $parameters["expiration"] = $tarjeta->getExpiration();
            $parameters["numberCC"] = $tarjeta->getNumberCC();
            $parameters["id_company"] = $tarjeta->getId_company();
            $parameters["id_user"] = $idUser;
         
            $this->connection = Connection :: GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
    }

    public function GetAll($id_user)
    {
        //cast(aes_decrypt(pass,"llave") as char(50))
        try
            {
                $query= "select $this->tableName.id_creditCard,
                            $this->tableName.cardHolder,
                            $this->tableName.expiration,
                            cast(aes_decrypt($this->tableName.numberCC,'". ENCRYPT_KEY ."') as char(50)) as numberCC,
                            $this->tableName.id_user,
                            companies.companyName
                        from $this->tableName
                        INNER join companies
                        on companies.id_company= $this->tableName.id_company
                        where $this->tableName.id_user= $id_user;";

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
    }
    public function getNumber_Company($idUser){
        try
        {
            $query= "select cast(aes_decrypt(cc.numberCC,'". ENCRYPT_KEY ."') as char(50)) as numberCC,
                    cc.id_creditCard,
                    cc.cardHolder,
                    cc.expiration,
                    com.companyName
            from $this->tableName as cc
            inner join companies as com
            on com.id_company = cc.id_company
            where cc.id_user =$idUser;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            return $result;
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
    }

    public function getCompanies(){
        try
        {
            $query= "select * from companies;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            return $result;
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
    }

    public function removeCard($idCreditCard){
        try
        {
            $query= "delete from $this->tableName where $this->tableName.id_creditCard = :id_creditCard;";
            $parameters["id_creditCard"] = $idCreditCard;
            
            $this->connection = Connection::GetInstance();
            

            $this->connection->ExecuteNonQuery($query, $parameters);

        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }

    }



  }



  ?>