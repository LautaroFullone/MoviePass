<?php
namespace Controllers;

Use Models\Admin as Admin;
Use Models\Cinema as Cinema;
Use DAO\UserDao as U_DAO;
use DAO\PurchaseDao as P_DAO;
use DAO\CinemaDao as C_DAO;
use DAO\FunctionDao as F_DAO;



class AdminController
{
    private $userDao;
    private $purchaseDao;
    private $cinemaDao;
    private $functionDao;

    public function __construct()
    {
            $this->userDao= new U_DAO();
            $this->purchaseDao= new P_DAO();
            $this->cinemaDao = new C_DAO();
            $this->functionDao = new F_DAO();
    }


    public function showPrincipalView ($msgError = "")
    {
        require_once(ADMIN_VIEWS . "eleccion.php");
    }
    
    public function showOPAdminsView($msgError = "")
    {
        require_once(ADMIN_VIEWS . "boardAdmin.php");
    }
    public function showOPUsersView($msgError = "")
    {
        require_once(USER_VIEWS . "board.php");
    }

    public function showCinemaListPurchase()
    {
        try
        {
            $arrayC= $this->cinemaDao->GetAll();
            if($arrayC)
                require_once(PURCHASE_VIEWS . "eleccion-cinema.php");
            else
            {
                $msgError = array( "description" => "No hay cines cargados para ver las estadisticas",
                "type" => 3);
                $this->showOPAdminsView($msgError);
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
                "type" => 1);
                $this->showOPAdminsView($msgError);
        }
    }
    public function showCinemaListPurchaseTitle ($dateInicial,$dateFinal, $title)
    {
        try
        {   
            $salesList=$this->purchaseDao->getTotalTitleMovie($title,$dateInicial,$dateFinal);
            //Esta query no trae el nombre del Cine, trae un 0
            if($salesList)
            {
                $sale = round($salesList[0]["total"],2); //saca decimales de la variable y desa solo 2
                require_once(PURCHASE_VIEWS ."salesList.php");
            }
            else
            {
                $msgError = array( "description" => "No hay ventas en ese período de tiempo",
                "type" => 3);
                $this->showOPAdminsView($msgError);
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            $this->showOPAdminsView($msgError);
        }
    }

    public function showFormVentas($idCinema)
    {
        require_once(PURCHASE_VIEWS . "form-ventas.php");
    }

    public function showFormVentasTitle()
    {
        try
        {
            
            $arrayAmostrar = $this->functionDao->getAllTitlesWithFunctions();
            if($arrayAmostrar)
                require_once(ADMIN_VIEWS . "purchaseTitle.php");
            else
            {
                $msgError = array( "description" => "No hay funciones cargadas para generar la busqueda",
                "type" => 3);
                $this->showOPAdminsView($msgError);
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            $this->showOPAdminsView($msgError);
        }
    }
    public function showRemainTickets ($msgError = "")
    {  
        try
        {
            $flag = 0;
            $funciones=$this->functionDao->getCantTicketsFunctions();
            if (!$funciones)
            {
                $msgError = array( "description" => "No hay funciones por el momento para consultar la venta",
                "type" => 3);
                $flag = 1;
                $this->showOPAdminsView($msgError);
            }
            if ($flag == 0)
                require_once(ADMIN_VIEWS . "remainTickets.php");
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            $this->showOPAdminsView($msgError);
        }
    }

    public function showPurcharses($dateInicial,$dateFinal,$idCinema)
    {
        try
        {
            $salesList=$this->purchaseDao->getPurcharseCinema($dateInicial,$dateFinal,$idCinema);
            if($salesList)
            {
                $sale = round($salesList[0]["total"],2); //saca decimales de la variable y desa solo 2
                require_once(PURCHASE_VIEWS ."salesList.php");
            }
            else
            {
                $msgError = array( "description" => "No hay ventas para mostrar del cine seleccionado",
                "type" => 3);
                $this->showOPAdminsView($msgError);
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            $this->showOPAdminsView($msgError);
        }
    }

    public function loginForm ($msgError = "")
    {
        require_once(ADMIN_VIEWS . "adminLogIn.php");
    }

}
?>