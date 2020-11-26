
  <div class="content-grande">
  
  <form class="form-signin">
  
         <div class="row">
            <div class="col">
                <h4> La compra se realizo con exito</h4>
                <label for="sala" >Nombre de la sala</label>
                <!--I N P U T-->
                <input type="text" id="sala" class="form-control"   value="<?php echo $function[0]['roomName'];?>" readonly>
            </div>
        </div>
        
        <div class="row">
             <div class="col">
                     <label for="Capacidad" >Pelicula</label>
                     <!--I N P U T-->
                     <input type="text" id="Capacidad" class="form-control"   value="<?php echo $function[0]['title'];?>" readonly>
             </div>

             <div class="col">
                <label for="precio" >Fecha</label>
                <!--I N P U T-->
                <input type="text" id="precio" class="form-control"   value="<?php echo $function[0]['functionDate'] ;?>" readonly>
             </div>

             <div class="col">
                <label for="hora" >Hora</label>
                 <!--I N P U T-->
                 <input type="text" id="hora" class="form-control"   value="<?php echo $function[0]['functionsHour'] ;?>" readonly>
             </div>
         </div>

         <div class="row">
             <div class="col">
                 <label for="idCine" >Nombre del Cine</label>
                 <!--I N P U T-->
                 <input type="text" id="idCine" class="form-control"   value="<?php echo $function[0]['cinemaName'];?>" readonly>
            </div>

            <div class="col">

            <label for="idCine" >Total a Pagar</label>
                 <!--I N P U T-->
                 <input type="text" id="idCine" class="form-control"   value="<?php echo $total;?>" readonly>
            </div>
        </div>
        
     </form>
    <div class="row">
        <div class="col">
            <form action="<?php echo FRONT_ROOT?>User/showPrincipalView" >
                <a class="form-signin"><button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button></a>
            </form> 
        </div>
    </div>


