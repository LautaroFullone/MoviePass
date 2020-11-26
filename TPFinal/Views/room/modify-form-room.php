<div class="content-grande">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Room/Modify" method="POST">
            <!--Cambiar logo -->
            <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Sala ID: <?php echo $id ?></h1>
            <!--Sacando el sr-only te muestra el titulo(LABEL)-->
            <!--I N P U T-->
            <label for="id" class="">Id Sala </label>
            <input type="number" id="id" class="sr-only" value="<?php echo $room->getId()?>" name="id" readonly>
            <!-- L A B E L -->
            <label for="name" class="">Ingrese Nuevo Nombre </label>
            <!--I N P U T-->
            <input type="text" id="name" class="form-control" value="<?php echo $room->getName()?>" name="name" required autofocus required minlength="3">
            <!-- L A B E L -->
            <label for="cap" class="">Ingrese Nueva Capacidad</label>
            <!--I N P U T-->
            <input type="number" id="cap" class="form-control" value="<?php echo $room->getSeatsCapacity()?>"  name="capacity" min="1" max="300"  required>
            <!-- L A B E L -->
            <label for="price" class="">Ingrese Nuevo Precio </label>
            <!--I N P U T-->
            <input type="number"  id="price" class="sr-only" value="<?php echo $room->getTicketValue()?>"  name="price" min="0" max="500" required>
            <label for="idCine">idCine</label>
            <input type="number"  id="idCine" class="form-control" value="<?php echo $room->getIdCinema()?>"  name="idCine" readonly>
            <input type="number" id="cap" class="sr-only" value="<?php echo $room->getSeatsCapacity()?>"  name="capacityAnterior" readonly>

<br>
        <!-- B O T O N -->
             <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar</button>


       
  

     </form>
     
</div>