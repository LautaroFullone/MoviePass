<?php 
namespace Controllers;

use Models\Room as Room;
use Models\Functions as Functions;
use DAO\RoomDao as R_DAO;
use DAO\MovieDao as M_DAO;
use DAO\CinemaDao as C_DAO;
use \Datetime as Datetime;

class RoomController{

    private $roomDao;
   

    public function __construct()
    {
        $this->roomDao = new R_DAO();
    }

    public function index($idCinema, $msgError = ""){
        
        try
        {
            $arrayR= $this->roomDao->GetAll($idCinema);
            $nombrea = $this->roomDao->GetnameCinema($idCinema);
            $nombre=$nombrea[0];
            $arrayR=$this->roomDao->GetAll($idCinema);
            require_once(ROOM_VIEWS. "index.php");
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(ADMIN_VIEWS . "boardAdmin.php");
        }

    }

    public function showDateForm($date,$idRoom,$idCinema)
    {   
        $movie= new M_DAO();
        try
        {
            $tienesalas= $this->roomDao->roomsExists($idCinema);

            foreach($tienesalas as $value)
            {
                if($value["Cantidad Salas"] == 0)
                {
                    $msgError = array( "description" => "No se encontraron salas en el cine",
                    "type" => 1);
                    $this->index($idCinema,$msgError);
                }
                else{
                    $cineDao = new C_DAO();
                    $arrayR=$this->roomDao->GetAll($idCinema);
                    $cine = $cineDao->GetOne($idCinema);
                    $arrayNoFunctions= $movie->GetMoviesNotFunction($date);//trae las peliculas que no estan en funcion en un dia determinado
                    $arrayFunction=$movie->GetMoviesfunction($date,$idRoom);//trae las peliculas que si estan en funcion en un dia determinado
                    $arrayAmostrar=$this->verifiMoviesNoRepeat($arrayNoFunctions,$arrayFunction,$date,$idCinema,$idRoom);
                    require_once(FUNCTION_VIEWS . "dateForm.php");
                }
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            $this->index($idCinema, $msgError);
        }
    }
    
    

    public function showModifyRoom($id){
        try
        {
            $room = $this->roomDao->GetOne($id);
            require_once(ROOM_VIEWS . "modify-form-room.php");
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showRoomsListAdmin($id);
        }
    }

    public function showRoomsListAdmin($idCinema, $msgError = "")
    {
        try
        {
            $arrayR= $this->roomDao->GetAll($idCinema);
            $nombre= $this->roomDao->GetnameCinema($idCinema);
            
            $cantidad=$this->roomDao->countRooms($idCinema);

                foreach($cantidad as $value)
                {
                    if($value["cantidad"] > 0)
                        require_once(ROOM_VIEWS . "roomsListAdmin.php");
                    else 
                    {
                        $msgError = array( "description" => "No se encontraron salas en el cine",
                        "type" => 3);
                        $this->index($idCinema, $msgError);
                    }
                } 
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->index($idCinema, $msgError);
        }

    }

    public function showFunctionsList ($idCinema)
    {
        try
        {
            $functions = $this->roomDao->getFunctionsCinema($idCinema);   
            if ($functions)
            require_once(FUNCTION_VIEWS . "listFunctionsCinema.php");
            else
            {
                $msgError = array( "description" => "No hay funciones para listar",
                "type" => 3);
                $this->index($idCinema, $msgError);
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->index($idCinema, $msgError);
        }
    }

    public function verifyRoomName($arraySalas, $name)
    {   
        foreach($arraySalas as $room)
        {
            if($room->getName() == $name)
                return true;
        }
        return false;
    }
  
    public function add($name,$capacity,$price,$idCinema){

        try
        {
            $capacidadCine=$this->roomDao->getCinemaCapacity($idCinema);

            $sumCantsalas = $this->roomDao->getRoomCapacity($idCinema);
            $salasCine = $this->roomDao->GetAll($idCinema);

            $capRooms=$sumCantsalas[0];
           if (!$this->verifyRoomName($salasCine, $name))
           {
            
                foreach($capacidadCine as $value){
                    $capRooms["capEnUso"]=$capRooms["capEnUso"]+$capacity;

                    if($value["capacity"] >= ($capRooms["capEnUso"]))
                    {

                        $room = new Room($name,$capacity,$price,$idCinema);
                        $this->roomDao->Add($room);
                        $msgError = array( "description" => "La sala se agrego con Exito al cine",
                                    "type" => 2);       
                    }
                    else
                    {
                        $msgError = array( "description" => "Se ha superado la capacidad del cine,vuelva a intentarlo.",
                                "type" => 3);
                        
                    }
                }
            }
            else
            {
                $msgError = array( "description" => "El nombre de la sala se encuentra en uso. Intente nuevamente",
                                "type" => 3);
            }
            $this->index($idCinema, $msgError);
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->index($idCinema, $msgError);
        }
    
 
    }
    
    public function Modify($id,$name,$capacity,$ticketValue,$idCinema,$capacityAnterior)
    {
        try
        {
            $capacidadCine=$this->roomDao->getCinemaCapacity($idCinema);

            $sumCantsalas = $this->roomDao->getRoomCapacity($idCinema);

            $capRooms=$sumCantsalas[0];
            $msgError ="";
            
            foreach($capacidadCine as $value){
            $capRooms["capEnUso"]=$capRooms["capEnUso"]+$capacity-$capacityAnterior;

                if($value["capacity"] >= ($capRooms["capEnUso"]))
                {
                $this->roomDao->Modify($id, $name, $capacity, $ticketValue,$idCinema);
                        $msgError = array( "description" => "La sala se ha modificado exitosamente",
                            "type" => 2);
                }else
                {
                    $msgError = array( "description" => "Se ha superado la capacidad del cine, vuelva a intentarlo",
                            "type" => 3);
                }
            }
            $this->showRoomsListAdmin($idCinema, $msgError);
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->index($idCinema, $msgError);
        }

    }

    public function Remove($id,$idCinema)
    {
        try
        {
            $this->roomDao->Remove($id);
            $cantidad=$this->roomDao->countRooms($idCinema);

            foreach($cantidad as $value){ //Dato escalar, es decir es un unico dato
                if($value["cantidad"] > 0)
                    $this->showRoomsListAdmin($idCinema);
                else {
                    $msgError = array( "description" =>"Ha eliminado todas las salas del cine",
                    "type" => 3);
                    $this->index($idCinema, $msgError);
                }
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. El cine no se ha agregado. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->index($idCinema, $msgError);
        }
    }

    public function verifiMoviesNoRepeat($arraysinfunciones,$arrayconfunciones,$date,$idCinema,$idRoom)
    {
       
        $array=array();

      foreach($arrayconfunciones as $elemento) 
      {  
            if($elemento["fecha"] == $date)
            {
                if($elemento["id_cine"] == $idCinema && $elemento["id_room"] == $idRoom )
                {
                        $array["title"]=$elemento["title"];
                        $array["id_movie"]=$elemento["id_movie"];
                        array_push($arraysinfunciones,$array);
                }
            }
      }

      
      return $arraysinfunciones;
    }

    
}

?>