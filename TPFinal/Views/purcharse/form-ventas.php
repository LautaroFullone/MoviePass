<div class="content-chico">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Admin/showPurcharses " method="GET">
                <!--Cambiar logo -->
                <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Seleccionar Fechas de intervalo</h1>
            

        
                <label for="dateInicial" >Ingrese Fecha Inicial</label>
                
                <!--I N P U T-->
                <input type="date" name="dateInicial" id= "dateInicial" min="2001-03-09" class="form-control" placeholder="Ingrese Fecha" required>

                <label for="dateFinal" >Ingrese Fecha Final</label>

                <input type="date" name="dateFinal" id= "dateFinal" min="2001-03-09"  class="form-control" placeholder="Ingrese Fecha" required>
                <input type="number" class="sr-only" name="IdCinema" value="<?php echo $idCinema;?>">
                <br>
  
                <button class="btn btn-lg btn-success btn-block" type="submit">Confirmar</button>
    </form>

    <div class="row">
        <div class="col">
        <form class="form-signin" action= "<?php echo FRONT_ROOT?>Admin/showOPAdminsView " method="GET">
            <button class="btn btn-lg btn-danger btn-block" type="submit">Cancelar</button>
        </div>
    </div>     

</div>