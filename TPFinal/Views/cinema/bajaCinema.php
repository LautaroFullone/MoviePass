<div class="content-login">
<form class="form-signin" action= "<?php echo FRONT_ROOT?>Cinema/Remove" method="POST">
        <!--Cambiar logo -->
        <img class="mb-4" src="Views/img/logo.jpg"  title="Logo "alt="Logo del sistema" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Cine</h1>
        <!--Sacando el sr-only te muestra el titulo(LABEL)-->
        <!-- L A B E L -->
        <label for="name" class="sr-only">Ingrese Nombre </label>
        <!--I N P U T-->
        <input type="text" id="name" class="form-control" placeholder="Nombre cine " name="name" required autofocus>
    <!-- B O T O N -->
         <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
 </form>
