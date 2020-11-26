<div class="content-login">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Cinema/Add" method="POST">
            <!--Cambiar logo -->
            <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Cine</h1>
            <!--Sacando el sr-only te muestra el titulo(LABEL)-->
            <!-- L A B E L -->
            <label for="name" class="sr-only">Ingrese Nombre </label>
            <!--I N P U T-->
            <input type="text" id="name" class="form-control" placeholder="Nombre cine " name="name"   required minlength="3"required autofocus> <br>
            <!-- L A B E L -->
            <label for="address" class="sr-only">Ingrese Direccion</label>
            <!--I N P U T-->
            <input type="text" id="address" class="form-control" placeholder="Direccion"  name="address" required minlength="3" required> <br>
            <!-- L A B E L -->
            <label for="capacity" class="sr-only">Ingrese Capacidad</label>
            <!--I N P U T-->
            <input type="number" id="capacity" class="form-control" placeholder="Capacidad"  min="0"  title ="Minimo 0"name="capacity" required>
            <!-- L A B E L -->
            <label for="aper" class="">Horario Apertura</label>
             <!--I N P U T-->
            <br><input type="time" id="aper" class="form-control" name="aper" required>
            <!-- L A B E L -->
            <label for="cierre" class="">Horario Cierre</label>
            <!--I N P U T-->
            <input type="time" id="cierre" class="form-control"  name="cierre" required>
            <br>

        <!-- B O T O N -->
             <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
     </form>
     <form action="<?php echo FRONT_ROOT ?>Admin/showOPAdminsView" class="form-signin">
            <button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button>
        </form>
</div>




















