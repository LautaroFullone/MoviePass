<?php if (isset($msgError)){
require_once(VIEWS_PATH . "errorView.php");}?>

<br>
<div class="row">
    <div class="col">  </div>
    <div class="col"><h1 class="text-center">Buscador Pelicula</h1></div>
    <div class="col">  </div>
</div> 
<div class="row">
    <div class="col">
        <div class="content-login">
            <form action= "<?php echo FRONT_ROOT?>Movies/searchMovieTitle" method="GET">
                    <h2 class="text-center">Por Titulo</h2>
                    <label for="titleSearch">Ingrese Titulo de la Pelicula</label>
                    <input type= "text"id="titleSearch"  class="form-control" name="title" placeholder="Titulo Película" required>
                <br>
                <button class="btn btn-lg btn-info " type="submit">Buscar</button>
            </form>
        </div>
    </div>


    <div class="col">
        <div class="content-login">
            <form action= "<?php echo FRONT_ROOT?>Movies/searchMovieGenre" method="POST">
                <div>
                    <h2 class="text-center">Por Genero</h2>
                    <div class="form-group col-md-12">
                            <label for="inputState">Seleccione Genero </label>
                            <select id="inputState" name="nameGenre" class="form-control">
                            <option value="" disabled selected> Seleccione uno </option>
                            <?php
                            foreach($genres as $genre)
                            {?>
                                <option value="<?php echo $genre["id_genre"];?>"  > <?php echo $genre["genreName"];?></option>
                            <?php } ?>

                            </select>
                </div>
                </div>
                <button class="btn btn-lg btn-info " type="submit">Buscar</button>
            </form>
        </div>
    </div>     

    <div class="col">
        <div class="content-login">
            <form action= "<?php echo FRONT_ROOT?>Movies/searchMovieDate" method="GET">
                <div>
                    <h2 class="text-center">Por Fecha</h2
                    <label for="titleSearch">Ingrese Fecha</label>
                    <input type="date" id="date" class="form-control" placeholder="Fecha"  min=<?php echo date("Y-m-d")?> name="date" required>
                    
                </div><br>
                <button class="btn btn-lg btn-info " type="submit">Buscar</button>
            </form>
        </div>
    </div>
</div>