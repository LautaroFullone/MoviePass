<?php foreach ($functions as $function){?> 
  
  <div class="content-grande">
  
  <form class="form-signin">
  
         <div class="row">
             <div class="col">
            
                 <label for="sala" >Nombre de la sala</label>
                 <!--I N P U T-->
                 <input type="text" id="sala" class="form-control"   value="<?php echo $function['Sala'];?>" readonly>
             </div>
             <div class="col">
             <label for="idSala" >ID Funcion</label>
                 <!--I N P U T-->
                 <input type="number" id="idSala" class="form-control"   value="<?php echo $function['ID Funcion'];?>" readonly>

             </div>
         </div>
        
         <div class="row">
             <div class="col">
                     <label for="Capacidad" >Pelicula</label>
                     <!--I N P U T-->
                     <input type="text" id="Capacidad" class="form-control"   value="<?php echo $function['titulo'];?>" readonly>
             </div>
             <div class="col">
             <label for="precio" >Fecha</label>
                 <!--I N P U T-->
                 <input type="text" id="precio" class="form-control"   value="<?php echo $function['Fecha'] ;?>" readonly>

             </div>
             <div class="col">
             <label for="hora" >Hora</label>
                 <!--I N P U T-->
                 <input type="text" id="hora" class="form-control"   value="<?php echo $function['Hora'] ;?>" readonly>

             </div>
         </div>
         <div class="row">
             <div class="col">
                 <label for="idCine" >Nombre del Cine</label>
                 <!--I N P U T-->
                 <input type="text" id="idCine" class="form-control"   value="<?php echo $function['Nombre Cine'];?>" readonly>
            </div>
        </div>

     </form>
     </div>
     <?php } ?>  


<div class="row">
<form action="<?php echo FRONT_ROOT?>Room/index" class="content-grande">
<input type="number"  class="sr-only"  name="id" value="<?php echo $idCinema;?>">
<a class="form-signin"><button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button></a>
</form>
</div>