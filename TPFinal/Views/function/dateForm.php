<div class="content-chico">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Function/Add" method="GET">

        <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Agregar Funcion</h1>
    
        <label for="movi" >Ingrese Pelicula</label>

        <select id="inputState" name="id_movie" class="form-control">
            <option value="" disabled selected> Seleccione una pelicula </option>

            <?php foreach($arrayAmostrar as $value){ ?>
                <option value="<?php echo $value["id_movie"];?>"> <?php echo $value["title"];?></option>
            <?php } ?>
        </select>

        <input type="number" id="id_room" class="sr-only"  name="id_room"   value="<?php echo $idRoom?>" readonly>
        <input type="number" id="seatsOcupped" class="sr-only"  name="seatsOcupped"   value="0" readonly>
        <input type="text" id="date" class="sr-only"  name="date" value="<?php echo $date;?>" readonly>  
        
        <br>
        <label>Horario de la Funcion</label>        
        <input type="time" id="hour" class="form-control"  name="hour"  min="<?php echo $cine->getAperHour();?>" max="<?php echo $cine->getCloseHour()?>" value= ""required>
        <input type="number" id="idCinema" class="sr-only" name="idCinema" value="<?php echo $idCinema;?>" readonly>
        <br>
        <button class="btn btn-lg btn-success btn-block" type="submit">Agregar</button>
    </form>

    <div class="row">
        <div class="col">
            <form class="form-signin" action= "<?php echo FRONT_ROOT?>Room/index" method="GET">
                <input type="number" id="id" class="sr-only" name="idCinema" value="<?php echo $idCinema;?>" readonly>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Cancelar</button>
            </form>
        </div>
    </div>     

</div>

