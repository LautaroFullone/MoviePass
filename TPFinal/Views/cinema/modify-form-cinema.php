<div class="content-grande">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Cinema/Modify" method="POST">
            <!--Cambiar logo -->
            <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Cine</h1>
            <!--Sacando el sr-only te muestra el titulo(LABEL)-->
            <!--I N P U T-->
            <input type="text" id="id" class="sr-only" value="<?php echo $movie->getId()?>" name="id">
            <!-- L A B E L -->
            <label for="name" class="">Ingrese Nuevo Nombre </label>
            <!--I N P U T-->
            <input type="text" id="name" class="form-control" value="<?php echo $movie->getName()?>" name="name" required autofocus required minlength="3">
            <!-- L A B E L -->
            <label for="address" class="">Ingrese Nueva Direccion</label>
            <!--I N P U T-->
            <input type="text" id="address" class="form-control" value="<?php echo $movie->getAddress()?>"  name="address" required  minlength="5" required>
            <!-- L A B E L -->
            <label for="capacity" class="">Ingrese Nueva Capacidad</label>
            <!--I N P U T-->
            <input type="number"  id="capacity" class="form-control" value="<?php echo $movie->getCapacity()?>"  name="capacity" min="0" required>
            <label for="capacity" class="">Ingrese Nuevo Horario Apertura</label>
            <!--I N P U T-->
            <input type="time"  id="aperHour" class="form-control" value="<?php echo $movie->getAperHour()?>"  name="aperHour" min="0" max="500" required>
            <label for="capacity" class="">Ingrese Nuevo Horario Cierre</label>
            <!--I N P U T-->
            <input type="time"  id="closeHour" class="form-control" value="<?php echo $movie->getCloseHour()?>"  name="closeHour" min="0" max="500" required>
<br>
        <!-- B O T O N -->
             <button class="btn btn-lg btn-warning btn-block" type="submit">Modificar</button>

      
        <a class="btn btn-lg btn-primary btn-block" href="<?php echo FRONT_ROOT ?>Cinema/showCinemaListAdmin" >VOLVER</a>
  

     </form>
     
</div>