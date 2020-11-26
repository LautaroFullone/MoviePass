<?php

namespace Controllers;

use Models\Discount as Discount;
use Models\Cinema as Cine;
use DAO\CinemaDao as C_DAO;



class CinemaController
{
    private $cinemaDao;

    public function __construct()
    {
        $this->cinemaDao = new C_DAO();
    }

    public function repeatedName ($name, $address)
    {
        try
        {
            $array = $this->cinemaDao->GetAll();
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
                "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
        }
        if ($array)
        {
            foreach ($array as $cine)
            {
                if ($cine->getName() == $name || $cine->getAddress() == $address)
                    return true;
            }
        }
        return false;
    }

    public function showCinemaListAdmin()
    {
        try
        {
            $arrayC= $this->cinemaDao->GetAll();
            if($arrayC)
                require_once(ADMIN_VIEWS . "cinemaListAdmin.php");
            else
            {
                if(!isset($msgError))
                    $msgError = array( "description" => "No hay cines para listar",
                    "type" => 3);
                require_once(ADMIN_VIEWS . "boardAdmin.php");
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
                "type" => 1);
            require_once(ADMIN_VIEWS . "boardAdmin.php");
        }
    }
    public function showCinemaForm()
    {
        require_once(CINEMA_VIEWS. "cinema-form.php");
    }

    public function showCinemaDelete(){
        require_once(CINEMA_VIEWS . "bajaCinema.php");
    }
    
    public function showCinemas_user()
    {
        try
        {
            $cines = $this->cinemaDao->GetALL();
            if($cines)
                require_once(CINEMA_VIEWS . "cinemaList.php");
            else
            {
                $msgError = array( "description" => "No hay cines para listar",
                "type" => 3);
                require_once(USER_VIEWS . "board.php");
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
                "type" => 1);
                require_once(USER_VIEWS . "board.php");
        }
        
        

    }
    public function showCinemaModify($id){
        try
        {
            $movie = $this->cinemaDao->GetOne($id);
            require_once(CINEMA_VIEWS . "modify-form-cinema.php");
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
                "type" => 1);
                require_once(ADMIN_VIEWS . "boardAdmin.php");
        }
    }

    public function Add ($name, $address, $capacity, $aper, $cierre)
    {
        try
        {
            if(!$this->repeatedName($name, $address))
            {
                $cine = new Cine($name, $address, $capacity, $aper, $cierre);
                $this->cinemaDao->Add($cine);
                $msgError = array( "description" => "El cine se agregó con éxito",
                "type" => 2);
            }
            else
            {
                $msgError = array( "description" => "El cine no se ha agregado. Los datos se encuentran repetidos. Intente nuevamente",
                "type" => 3);
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
                "type" => 1); 
        } 
        $this->showCinemaListAdmin($msgError);
    }

    public function getLastId()
    {
        try
        {
            $array = $this->cinemaDao->GetAll();
            if ($array)
            {
                return count($array)+1;
            }
            else return 1;
        }
        catch (\PDOException $ex)
        {
            throw $ex;
        }
    }

    public function Remove ($id)
    {
        try 
        {
            $this->cinemaDao->Remove($id);
            $msgError = array( "description" => "El cine ha sido eliminado",
                "type" => 2);
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
                "type" => 1);
        } 
            $this->showCinemaListAdmin($msgError);
    
        
    }

    public function Modify($id, $name, $address, $capacity, $aperHour, $closeHour)
    {
        try
        {
            $this->cinemaDao->Modify($id, $name, $address, $capacity,$aperHour, $closeHour);
            $msgError = array( "description" => "El cine se ha modificado con éxito",
                "type" => 2);
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
                "type" => 1);
        } 
        $this->showCinemaListAdmin($msgError);
        
    }
}
?>