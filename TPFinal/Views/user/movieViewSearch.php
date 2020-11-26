<?php if (isset($msgError)){
require_once(VIEWS_PATH . "errorView.php");}?>

<div class="cartelera-content">
    <div class="table-responsive-lg">
        <table class="table table-hover" >
            <thead>
                
            <div class="row">
                        <div class="col"> </div>
                        
                        <div class="col"> <h1 class="text-center ">Cartelera</h1> </div>
                        
                        <div class="col">
                            <form class="form-signin" action= "<?php echo FRONT_ROOT?>User/verifyLogin" method="POST">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button>
                            </form>
                        </div>  
                </div>  
            </thead>
            <tr>
                <?php foreach ($moviesList as $movie){
                 ?>
                <!-- Fotito facherita -->
                <td>    <div class="imagen-cartelera">
                    <img width= "100%" height="100%" src="<?php echo"https://image.tmdb.org/t/p/w200".$movie["poster_path"]?>">
                </div>
                </td>
                <!-- contenido -->
                <td>
                    <h2 class="text-center"><u><?php echo $movie["title"];?></u></h2>
                    <h5>Sinopsis</h5>
                    <ul>
                            <!-- S I N O P S I S-->
                           
                            <li> <p ><?php echo $movie["overview"];?></p> </li></ul> 
                            <!-- A D U L T-->
                            <h5>Adult</h5><ul>
                            <li> <p> <?php echo $movie["adult"];?></p>   </li></ul> 
                            <!-- L E N G U A J E -->
                            <h5>Lenguaje</h5><ul>
                            <li><p> <?php echo $movie["original_language"];?></p> </li></ul> 
                            
                            <div class="row">
                                <div class="col">
                                    
                                <h5>Generos</h5><li>
                                     <!--G E N E R O-->
                                        <ul class="list-group list-group-horizontal ">
                                            <?php
                                            $result = $this->genreDao->getGenresForMovie($movie["id_movie"]);
                                            foreach($result as $value)
                                            {?>
                                            <li class="none"> <?php echo $value["genreName"];?></li>
                                            <li class="none"> <strong>|</strong> </li>
                                            <?php }?>
                                        </ul> </li>
                                        <br>
                                  
                                </div>
                               
                    </div>
                    <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <form action="<?php echo FRONT_ROOT?>Function/showFunctionList" method="POST">
                                            <input type="number" class="sr-only" name="idMovie" value ="<?php echo $movie["id_movie"];?>"readonly>
                                            <input type="text" class="sr-only" name="movieTitle" value ="<?php echo $movie["title"];?>"readonly>

                                            <button type="sumbit" class="btn btn-lg btn-success btn-block" >Seleccionar</button>
                                    </form>
                                </div>
                                <div class="col"></div>
                            </div>
                </td>

                </tr>
                <?php } ?>
        </table>
    </div>
</div>

<?php


?>