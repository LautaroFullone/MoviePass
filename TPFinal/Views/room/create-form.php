
<div class="content-chico">
        <form class="form-signin" action= "<?php echo FRONT_ROOT?>Room/Add" method="POST">
                    <!--Cambiar logo -->
                    <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Agregar Sala</h1>
                    <!--Sacando el sr-only te muestra el titulo(LABEL)-->

                    <!-- L A B E L -->
                    <label for="name" class="sr-only">Ingrese Nombre de la Sala</label>
                    <!--I N P U T-->
                    <input type="text" id="name" class="form-control" placeholder="Nombre Sala " name="name"   required minlength="3"required autofocus>
                    <!-- L A B E L -->
                    <label for="capacity" class="sr-only">Capacidad de la sala </label>
                    <!--I N P U T-->
                    <input type="number"  min="1" max="300" id="capacity" class="form-control" placeholder="Capacidad de la sala"  name="capacity"  required>
                    <!-- L A B E L -->
                    <label for="Valor" class="sr-only">Ingrese Valor </label>
                    <!--I N P U T-->
                    <input type="number" id="Valor" class="form-control" placeholder="Valor"  min="0" max="500" name="price" required>
                    <!-- ID cinema -->
                    <input type="number" id="idCinema" class="sr-only"  name="idCinema"   value="<?php echo $idCine ?>" required autofocus>


                <!-- B O T O N -->
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form>
        
</div>