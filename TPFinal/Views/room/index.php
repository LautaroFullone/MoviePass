<?php if (isset($msgError)){
require_once(VIEWS_PATH . "errorView.php");}?>


<div class="content-xxl">
   <font color="white"> <h1 class="text-center" > Cine - <?php echo $nombre;?></h1></font>
  
    <div class="row">   
        <div class="col">

            <div class="content-chico">
                <form class="form-signin" action= "<?php echo FRONT_ROOT?>Room/Add" method="POST">
                        <h1 class="h3 mb-3 font-weight-normal">Agregar Sala</h1>
                            <!--Sacando el sr-only te muestra el titulo(LABEL)-->

                            <!-- L A B E L -->
                            <label for="name" >Ingrese Nombre de la Sala</label>
                            <!--I N P U T-->
                            <input type="text" id="name" class="form-control" placeholder="Nombre Sala " name="name"   required minlength="3"required autofocus>
                            <!-- L A B E L -->
                            <label for="capacity" >Capacidad de la sala </label>
                            <!--I N P U T-->
                            <input type="number"  min="1" max="300" id="capacity" class="form-control" placeholder="Capacidad de la sala"  name="capacity"  required>
                            <!-- L A B E L -->
                            <label for="Valor" >Ingrese Valor </label>
                            <!--I N P U T-->
                            <input type="number" id="Valor" class="form-control" placeholder="Valor"  min="0" name="price" required>
                            <!-- ID cinema -->
                            <input type="number" id="idCinema" class="sr-only"  name="idCinema"   value="<?php echo $idCinema?>" required autofocus>
                            <br>
                            <label for="" >    </label>
                        <!-- B O T O N -->
                            <button class="btn btn-lg btn-success btn-block" type="submit">Agregar</button>
                </form>
            </div>

        </div>

        
        <div class="col">
            <div class="content-chico">
                <form action="<?php echo FRONT_ROOT?> Room/showDateForm" method= "POST" class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Agregar Función</h1>
                <!-- L A B E L -->
                <br><br>
                <label for="date" >Ingrese Fecha </label>
                <!--I N P U T-->
                <input type="date" id="date" class="form-control" placeholder="Fecha"  min=<?php echo date("Y-m-d")?> name="date" required>
                
                <label for="time" >Seleccione Sala </label>
                <!--I N P U T-->
                <select id="inputState" name="room" class="form-control" required>
                    <option value="" disabled selected> Seleccione Sala </option>
                    <?php foreach($arrayR as $value){
                        ?>
                        <option value="<?php echo $value->getId();?>"> <?php echo $value->getName();?> </option>
                    <?php } ?>
                </select>
                <br><br>
                        
                <input type="number" id="idCinema" class="sr-only"  name="idCinema"   value="<?php echo $idCinema ?>" required autofocus>
                    <!-- B O T O N -->
                    <button class="btn btn-lg btn-success btn-block" type="submit">Agregar</button>
                </form>
            </div> 
        </div>
            

    </div>
    <div class="row">
        <div class="col">
         <div class="content-chico">
                <form action="<?php echo FRONT_ROOT?>Room/showRoomsListAdmin" class="form-signin"> 
                    <!-- PASO EL ID DEL CINE -->
                    <input type="number" id="idCinema" class="sr-only"  name="idCinema"   value="<?php echo $idCinema ?>" required autofocus>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Listar Salas</button>
                    </form>
         </div>
        </div>

        <div class="col">
            <div class="content-chico">
                    <form action="<?php echo FRONT_ROOT?>Room/showFunctionsList" class="form-signin">
                    <input type="number" id="idCinema" class="sr-only"  name="idCinema"   value="<?php echo $idCinema ?>" required autofocus> 
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Listar Funciones</button>
                    </form>
             </div>
        </div>
    </div>
    <div class="row">

    <a href="<?php echo FRONT_ROOT?>Cinema/showCinemaListAdmin" class="form-signin"><button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button></a>

    </div>     
   
</div>

           