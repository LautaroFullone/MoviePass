<?php

namespace DAO;

use Models\Genre as Genre;

class GenreDAO
{
    private $tableName = "genres";
    private $tableGenresXMovies = "genresXmovies";
    private $connection;

        public function __construct()
        {
            if(!$this->GetAll())
                $this->Add(); # Se hace solo una vez y listorti
        }

        public function Add ()
        {
            $genreList = $this->retrieveAPIArray();
            
            try{
                foreach ( $genreList as $value)
                {
                    $query = " insert into  $this->tableName (id_genre, genreName ) VALUES (:id_genre, :genreName);";
                    
                    $parameters["id_genre"] = $value->getId();
                    $parameters["genreName"] = $value->getName();
                
        
                    $this->connection = Connection :: GetInstance();
                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function GetGenresXmovies()
        {
            try
            {
                $query = "select * from $this->tableGenresXMovies;";

                $this->connection = Connection :: GetInstance();
                $result = $this->connection->Execute($query);
                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function addGenreToMovie ($idMovie, $idGenre) #es el ID del JSON de la API, no el ID de la bdd que nosotros creamos
        {
            try
            {
            
            $query = "insert into genresXmovies (id_movie, id_genre) value (:id_movie, :id_genre);";

            $parameters["id_movie"] = $idMovie;
            $parameters["id_genre"] = $idGenre;

            $this->connection = Connection :: GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);

                }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
        }

        public function getGenresForMovie($idMovie)
        {
            try
            {
                $query = "select 
                            genres.id_genre,
                            genres.genreName
                        from $this->tableName
                        inner join genresXmovies
                        on genresXmovies.id_genre = $this->tableName.id_genre
                        where genresXmovies.id_movie = :id_movie;";

                $parameters["id_movie"] = $idMovie;
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query,$parameters);

                return $result;
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }  
        }


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

        public function GetOneName ($genreRepo,$id)
        {
            
            try
            {
                $query = "select * from $this->tableName where id_genre = $id";
                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);
                
                foreach ($result as $value)
                    return $value["genreName"];
                
            }
            catch (\PDOException $ex)
            {
                throw $ex;
            }
            
        }


        public function retrieveAPIArray()
        {
            $apiContent = file_get_contents(URL_GENRES);
            $genreList = array();
            if ($apiContent)
            {
                $jsonDecode = json_decode($apiContent, true);

                foreach($jsonDecode["genres"] as $value)
                {
                        $genre = new Genre();
                        $genre->setId($value["id"]);
                        $genre->setName($value["name"]);

                        array_push($genreList, $genre);
                }
            }
            return $genreList;
        }

        public function retrieveAPIJson()
        {
            $apiContent = file_get_contents(URL_GENRES);
            if ($apiContent)
            {
                $jsonDecode = json_decode($apiContent, true);
                return $jsonDecode["genres"];
            }
        }

}


?>