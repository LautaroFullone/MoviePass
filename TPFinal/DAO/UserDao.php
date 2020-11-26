<?php

namespace DAO;

use Models\User as User;
use DAO\Connection as Connection;
use \Exception as Exception;

class UserDao
{
    private $tableName = "users";
    private $connection;

    public function __construct()
    {
        
    }

    public function Add(User $user)
        {
            
            try{
                
                $query = " insert into  $this->tableName (firstName, lastName, userName, pass, mail, dni, birthDate, id_userType ) VALUES (:firstName, :lastName, :userName, :pass, :mail, :dni, :birthDate, :id_userType);";
                
                $parameters["firstName"] = $user->getFirstName();
                $parameters["lastName"] = $user->getLastName();
                $parameters["userName"] = $user->getUserName();
                $parameters["pass"] = $user->getPass();
                $parameters["mail"] = $user->getMail();
                $parameters["dni"] = $user->getDni();
                $parameters["birthDate"] = $user->getBirthDate();
                $parameters["id_userType"] = $user->getUserType();
                    

                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
    
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }
        /**
         * Devuelve un array asociativo con los usuarios cargados al sistema. 
         */

        public function GetAll()
        {
            try
            {
                $query = "select * from $this->tableName ";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function modifyUserType($id_userType, $id_user)
        {
            try
            {
                $query = "update $this->tableName set id_userType = :id_userType where id_user = :id_user;";

                $parameters["id_userType"] = $id_userType;
                $parameters["id_user"] = $id_user;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query,$parameters);

                
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function GetUsersType()
        {
            try
            {
                $query = "select * from userTypes ";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function setAdmin($idUser)
        {
            try
            {
                $query = "select * from userTypes ";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        /**
         * Devuelve un array asociativo con el usuario buscado. 
         */

        public function GetOne ($idUser)
        {
            try
            {
                $query = "select * from $this->tableName where id_user = $idUser";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function GetOneMail ($mail)
        {
            try
            {
                //,cast(aes_decrypt(pass,'llave') as char(50))as clave
                $query = "select *  from $this->tableName where mail = :mail;";
                $parameters["mail"] = $mail;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function Modify($firstname,$lastName,$userName,$mail,$id_user)
        {
            try
            {
            $query = "update $this->tableName set firstname = :firstname, lastName = :lastName, userName = :userName, mail = :mail where id_user = :id_user;";
            
            $parameters["firstname"] = $firstname;
            $parameters["lastName"] = $lastName;
            $parameters["userName"] = $userName;
            $parameters["mail"] = $mail;
            $parameters["id_user"] = $id_user;


                $this->connection = Connection :: GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function Remove($userName)
        {
            try
            {
                $query = "delete from $this->tableName where userName = :userName;";

                $parameters["userName"] = $userName;
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