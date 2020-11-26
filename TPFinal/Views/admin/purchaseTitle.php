<div class="content-chico">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Admin/showCinemaListPurchaseTitle " method="GET">
                <!--Cambiar logo -->
                <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Seleccionar Fechas de intervalo</h1>
            

        
                <label for="dateInicial" >Ingrese Fecha Inicial</label>
                
                <!--I N P U T-->
                <input type="date" name="dateInicial" id= "dateInicial" min="2001-03-09" class="form-control" placeholder="Ingrese Fecha" required>

                <label for="dateFinal" >Ingrese Fecha Final</label>

                <input type="date" name="dateFinal" id= "dateFinal" min="2001-03-09"  class="form-control" placeholder="Ingrese Fecha" required>
                <br>
                <select id="inputState" name="id_movie" class="form-control">
               
                <option value="" disabled selected> Seleccione una pelicula </option>
                    <?php foreach($arrayAmostrar as $value){ ?>
                        <option value="<?php echo $value["title"];?>"> <?php echo $value["title"];?></option>

                    <?php } ?>
                    </select>
                <br>
  
                <button class="btn btn-lg btn-success btn-block" type="submit">Confirmar</button>
    </form>

    <div class="col">

        <a href="<?php echo FRONT_ROOT?>Admin/showOPAdminsView" class="form-signin"><button class="btn btn-lg btn-primary btn-block" type="submit">Cancelar</button></a>

    </div>     

</div>