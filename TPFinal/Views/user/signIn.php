<div class="user-register">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>User/signIn" method="POST">
            <!--Cambiar logo -->
            <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg" title="Logo "alt="Logo del sistema" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Registrarse</h1>
            <!--Sacando el sr-only te muestra el titulo(LABEL)-->
            <!-- L A B E L -->
            <div class="row">
                <div class="col">
                    <label for="nombreUser" >Nombre</label>
                    <!--I N P U T-->
                    <input type="text" id="nombreUser" class="form-control" placeholder="Nombre " name="firstName" required minlength="3" required autofocus>
                </div>
                <div class="col">
                    <label for="apellidoUser" >Apellido</label>
                    <!--I N P U T-->
                    <input type="text" id="apellidoUser" class="form-control" placeholder="Apellido " name="lastName"  required minlength="3"required >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="dniUser" >Dni</label>
                    <!--I N P U T-->
                    <input type="text" id="dniUser" class="form-control" placeholder="Dni " name="dni" required pattern="[0-9]{8}" title="Debe poner 8 números "required>
                </div>
                <div class="col">
                <label for="birthDateUser" >Fecha de nacimiento</label>
                    <!--I N P U T-->
                    <input type="date" id="birthDateUser" class="form-control" placeholder="Fecha de nacimiento " name="birthDate"  max= "<?php echo date("Y-m-d");?>" min="1930-1-1"required >

                </div>
            </div>

            <div class="row">
                <div class="col">
                <label for="inputEmail"> Email </label>
                <input type = "mail" id="inputEmail" class="form-control" placeholder="Email" name= "mail" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
            <label for="inputUserName" >Nombre Usuario</label>
            <!--I N P U T-->
            <input type="text" id="inputUserName" class="form-control" placeholder="UserName"  name="userName" required minlength="3" required>
            </div>
            <div class="col">
            <label for="inputPassword">Contraseña</label>
            <!--I N P U T-->
            <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña"  name="pass" required minlength="6" required>
            <input type="number" id="userType" class="sr-only" value = "2"  name="id_userType"  required>
            </div>
            </div>
            <!-- B O T O N -->
             <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
             
     </form>
  
     
    <p class="mt-5 mb-3 ">&copy;<strong> Los supervivientes</strong> -2020</p>
    
</div>

