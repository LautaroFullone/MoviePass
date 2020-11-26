<?php foreach ($arrayR as $room){?> 
  
                 <div class="content-login">
                 <form class="form-signin">
                        <div class="row">
                            <div class="col">
                           
                                <label for="sala" >Nombre de la sala</label>
                                <!--I N P U T-->
                                <input type="text" id="sala" class="form-control"   value="<?php echo $room->getName();?>" readonly>
                            </div>
                            <div class="col">
                            <label for="idSala" >ID Sala</label>
                                <!--I N P U T-->
                                <input type="number" id="idSala" class="form-control"   value="<?php echo $room->getId();?>" readonly>

                            </div>
                        </div>
                       
                        <div class="row">

                            <div class="col">
                                <label for="Capacidad" >Capacidad</label>
                                <input type="number" id="Capacidad" class="form-control"   value="<?php echo $room->getSeatsCapacity();?>" readonly>
                            </div>

                            <div class="col">
                                <label for="precio" >Precio</label>
                                <input type="text" id="precio" class="form-control"   value="<?php echo $room->getTicketValue();?>" readonly>
                            </div>
                        </div>
                        
                                <label for="idCine" >Nombre del Cine al que pertenece</label>
                                <!--I N P U T-->
                                <input type="text" id="idCine" class="form-control"   value="<?php echo $nombre[0];?>" readonly>

   
                    </form>

                    <div class="row">
                            <div class="col">
                               <!-- <div class="form-signin">
                                    <button class="btn btn-lg btn-danger btn-block"data-toggle="modal" data-target="#borrarSala"> Eliminar</button>
                                </div> -->
                                    <form class="form-signin" action="<?php echo FRONT_ROOT?>Room/Remove">
                                        <input type="number"  class="sr-only"  name="id" value="<?php echo $room->getId();?>">
                                        <input type="number"  class="sr-only"  name="idCinema" value="<?php echo $room->getIdCinema();?>">
                                    <button class="btn btn-lg btn-danger btn-block" type="submit">Eliminar</button>
                                </form>
                            </div>
                            <div class="col">
                                <form class="form-signin" action="<?php echo FRONT_ROOT?>Room/showModifyRoom">
                                    <input type="number"  class="sr-only"  name="id" value="<?php echo $room->getId();?>">
                                    <button class="btn btn-lg btn-warning btn-block" type="submit"> Modificar</button>
                                </form>
                            </div>
                    </div>
                   
                  
                 </div>
                      <!-- MODAL -->             
                      <div class="modal fade" id="borrarSala" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cierresesionLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cierresesionLabel">Eliminar Sala</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿ Esta seguro que quiere <font color="red"> eliminar</font> esta Sala?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <form  action="<?php echo FRONT_ROOT?>Room/Remove">
                                                <input type="number"  class="sr-only"  name="id" value="<?php echo $room->getId();?>">
                                                <input type="number"  class="sr-only"  name="idCinema" value="<?php echo $room->getIdCinema();?>">
                                                <button type="sumbit" class="btn btn-primary">Aceptar</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
        <?php } ?>             
       
    

<div class="row">
    <form action="<?php echo FRONT_ROOT?> Room/index" class="form-signin">
    <input type="number"  class="sr-only"  name="id" value="<?php echo $idCinema;?>">
        <a class="form-signin"><button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button></a>
    </form>
</div>