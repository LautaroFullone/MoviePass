<?php
namespace Controllers;

use Models\Genre as Genre;
use DAO\GenreDAO as G_DAO;

class GenreController 
{
    private $genreDao;

    public function __construct()
    {
        $this->genreDao = new G_DAO();

    }

    public function showPrincipalView ($msgError = "")
    {
        require_once(USER_VIEWS . "board.php");
    }


    public function GetAll ()
    {
        try
        {
            return $this->genreDao->retrieveAPIJson();
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showPrincipalView();
        }
       
    }
}