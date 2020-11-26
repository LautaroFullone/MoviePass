<?php
namespace Controllers;

use Models\Movie as Movie;
use DAO\MovieDao as M_DAO;
use DAO\GenreDAO as G_DAO;
use DAO\FunctionDao as F_DAO;

class MoviesController
{
    private $moviesDao;
    private $genreDao;
    private $functionDao;

    public function __construct()
    {
        $this->moviesDao = new M_DAO();
        $this->genreDao = new G_DAO();
        $this->functionDao=new F_DAO();
        try
        {
            $genresXmovie = $this->genreDao->GetGenresXmovies();
            if (!$genresXmovie)
                $this->setGenresToMovies();
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
        }
        
    }

    public function showSearchMovieView($msgError = "")
    {
        try
        {
            $pelisDates = $this->fechasPelis();
            //$genres = $this->genreDao->GetAll();
            require_once(VIEWS_PATH . "searchMovie.php");
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "login-form.php");
        }
    }

    public function showFunctionView(){ //COMPRAR ENTRADAS
        try{
            $moviesList = array();
            $array = $this->moviesDao->getFunctionNoRepeat(); 
            $moviesList = $this->verifyFucntions($array);

            if ($moviesList)
            {
                for($i = 0; $i < count($moviesList); $i++)
                {
                    $moviesList[$i]["adult"] = $this->changeAdult($moviesList[$i]["adult"]);
                    $moviesList[$i]["original_language"] = $this->changeLanguage($moviesList[$i]["original_language"]);
                }
                require_once(USER_VIEWS . "functionsView.php");
            }
            else
            {
                $msgError = array( "description" => "No hay funciones por el momento",
                "type" => 3);
                require_once(USER_VIEWS . "board.php");
            }
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            require_once(USER_VIEWS . "board.php");
        }
    }

    public function showMoviesListView() //CARTELERA
    {
        try
        {    
            $moviesList = array();
            $array = $this->moviesDao->getMoviesFunctions();
            $moviesList=$this->verifyFucntions($array);

            if ($moviesList){
                for($i = 0; $i < count($moviesList); $i++)
                {
                    $moviesList[$i]["adult"] = $this->changeAdult($moviesList[$i]["adult"]);
                    $moviesList[$i]["original_language"] = $this->changeLanguage($moviesList[$i]["original_language"]);
                }
                require_once(USER_VIEWS . "functionsView.php");
            }
            else
            {      
                $msgError = array( "description" => "No hay funciones por el momento",
                    "type" => 3);     
                require_once(USER_VIEWS . "login-form.php");
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "login-form.php");
        }
    }

    public function showOnlyMovie($moviesList)
    {
        try
        {
            $genreRepo = $this->genreDao->GetAll();
            require_once(USER_VIEWS. "moviesView.php");
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            require_once(USER_VIEWS . "login-form.php");
        }
    }

    public function showMoviesSearch($moviesList)
    {
        require_once(USER_VIEWS. "movieViewSearch.php");
    }


    public function searchMovieTitle ($title)
    {
        try
        {
            $movie = $this->moviesDao->GetWithFunction($title);
            if ($movie)
            {
                    $movie[0]["adult"] = $this->changeAdult($movie[0]["adult"]);
                    $movie[0]["original_language"] = $this->changeLanguage($movie[0]["original_language"]);
                    $this->showMoviesSearch($movie);  
            }
            
            else
            {
                $msgError = array( "description" => "No se encontraron peliculas con ese titulo",
                    "type" => 1); 
                $this->showSearchMovieView($msgError);
                
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showSearchMovieView($msgError);
        }
    }


    public function searchMovieGenre($genre_id)
    {
        try
        {
            $moviesList = $this->moviesDao->GetWithFunctionGenres($genre_id);
            if (!empty($moviesList))
            {
                for($i = 0; $i < count($moviesList); $i++)
                {
                    $moviesList[$i]["adult"] = $this->changeAdult($moviesList[$i]["adult"]);
                    $moviesList[$i]["original_language"] = $this->changeLanguage($moviesList[$i]["original_language"]);
                }
                $this->showMoviesSearch($moviesList);
            } 
            else
            {
                $msgError = array( "description" => "No se encontraron peliculas con ese género",
                "type" => 1); 
                $this->showSearchMovieView($msgError);    
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showSearchMovieView($msgError);
        }
       

    }

    public function searchMovieDate($date){ //año - mes - dia

        try{
            $moviesList = $this->moviesDao->GetMoviesfunctionDate($date);        

            if ($moviesList)
            {
                for($i = 0; $i < count($moviesList); $i++)
                {
                    $moviesList[$i]["adult"] = $this->changeAdult($moviesList[$i]["adult"]);
                    $moviesList[$i]["original_language"] = $this->changeLanguage($moviesList[$i]["original_language"]);
                }
                $this->showMoviesSearch($moviesList);
            }
            else
            {
                $msgError = array( "description" => "No se encontraron peliculas en esa fecha",
                "type" => 1); 
                $this->showSearchMovieView($msgError);
                
            }
        }
        catch(\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(VIEWS_PATH . "errorView.php");
            $this->showSearchMovieView($msgError);
        }
       
    } 
    public function fechasPelis()
    {
        try
        {
            $moviesList = $this->moviesDao->GetAll();
            $dates= array();

            foreach($moviesList as $movie){ 
                $date = $movie->getRelease_date();
                $fecha = explode('-', $date);
                $años = array_shift($fecha);
                
                array_push($dates,$años);
            }
            $nonRepeat = array_unique($dates);
            return $nonRepeat;
        }
        catch (\PDOException $ex)
        {
           throw $ex;
        }
    }

    public function setGenresToMovies()
    {
        try
        {
            $movies = $this->moviesDao->retrieveAPIJson();

            foreach($movies as $value)
            {
                $movie = $this->moviesDao->GetOneName($value["title"]);
                
                foreach($value["genre_ids"] as $id)
                {   
                    foreach($movie as $aux)
                        $this->genreDao->addGenreToMovie($aux["id_movie"], $id);
                }
            }
        }
        catch (\PDOException $ex)
        {
            $msgError = array( "description" => "Error de conexión con la base de datos. Intente nuevamente",
            "type" => 1);
            require_once(USER_VIEWS . "login-form.php");
        }
    } 

    

    public function verifyLogin($msgError ="")
    {
        if(isset($_SESSION["logged"]))
             require_once(USER_VIEWS ."board.php");
        else 
        require_once(USER_VIEWS ."login-form.php");
    }

    public function verifyFucntions($arrayF)
    {
        if ($arrayF)
        {
            $arrayNuevo= array();
            array_push($arrayNuevo ,array_shift($arrayF));
            $flag = false;


            foreach($arrayF as $value)
            {
                foreach($arrayNuevo as $aux)
                {
                    if($aux["title"] == $value["title"])
                        $flag = true;
                }
                if($flag == false)
                    array_push($arrayNuevo,$value);

                $flag= false;
            }
            return $arrayNuevo;
        }
        else return false;
    }
   public function changeLanguage ($language)
    {
        switch ($language)
        {
            case "en": return "English";
                break;
            case "ja": return "Japones";
                break;
            case "ko": return "Coreano";
                break;
            case "it": return "Italiano";
                break;
            case "es": return "Español";
                break;
            }
    }

public function changeAdult ($adult)
{
    if ($adult)
    return "+18";
    else return "ATP";
}
    
}

?>