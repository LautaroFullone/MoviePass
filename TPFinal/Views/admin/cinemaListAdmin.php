<?php if (isset($msgError)){
require_once(VIEWS_PATH . "errorView.php");}?>

<div class="cartelera-content">
    <div class="table-responsive-lg">
        <table class="table table-hover" >
           <thead>
                <tr>
                    <th  colspan=2 ><h1 class="text-center ">Cines</h1> </th>
                </tr>
             </thead>
                        <?php foreach($arrayC as $cine) { ?> 
                <tr>
                    <td>
                        <h2 class="text-center">  <?php echo $cine->getName(); ?></h2>
                    </td>
                    <td>    
                        <div class="row">
                            <div class="col">
                                    <ul>
                                    
                                    <li> <h3> Direccion </h3><p><strong><?php echo $cine->getAddress(); ?></p></strong> </li> 
                                    <li> <h3>Capacidad Maxima : </h3> <p ><strong><?php echo $cine->getCapacity(); ?></p></strong></li>
                                    <!-- Agregar cosas -->
                                    </ul>
                            </div>
                            <div class="col">
                                    <ul>
                                    <li><h3 > Horario Apertura </h3><p ><strong><?php echo $cine->getAperHour(); ?></p></strong></li>
                                    <li><h3 > Horario Cierre </h3><p ><strong><?php echo $cine->getCloseHour(); ?></p></strong></li>
                                    </ul>
                            </div>
                        </div>  
                        

                       <div class="row">
                           <div class="col">
                           <!-- Formulario -->
                                    <button class="btn btn-lg btn-danger btn-block" value="<?php echo $cine->getId(); ?>" data-toggle="modal" data-target="#borrarCine<?php echo $cine->getId()?>">Eliminar</button> 
                                    
                            </div>
                            <div class="col">
                            <!-- Formulario -->
                                <form action="<?php FRONT_ROOT?>showCinemaModify" method="GET">
                                    <input type="hidden" value="<?php echo $cine->getId(); ?>" name="id">
                                    <button class="btn btn-lg btn-warning btn-block" type="submit">Modificar</button>

                                </form>    
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
                          <!-- Formulario -->
                                <form action="<?php echo FRONT_ROOT?>Room/index" method="GET">
                                <input type="hidden" value="<?php echo $cine->getId();?>" name="idCinema">
                                    <button class="btn btn-lg btn-success btn-block" type="submit">Seleccionar</button>
                                </form>    
                          </div>
                      </div>
                              
                     </td>                
                </tr>   

                    <!-- MODAL -->             
                    <div class="modal fade" id="borrarCine<?php echo $cine->getId()?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cierresesionLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cierresesionLabel">Eliminar Cine</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿ Esta seguro que quiere <font color="red"> eliminar</font> el cine?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            
                                <form action="<?php FRONT_ROOT?>Remove" method="GET">
                                    <input type="hidden" value="<?php echo $cine->getId(); ?>" name="id">
                                        <!--<button type="sumbit" class="btn btn-primary">Aceptar</button>-->
                                        <button type="sumbit" class="btn btn-primary">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                 <?php } ?>  
                 <tr>
                <td colspan=2 >
                <div class="row">
                        
                    <a class="btn btn-lg btn-primary btn-block" href="<?php echo FRONT_ROOT ?>Admin/showOPAdminsView" >VOLVER</a>
                 </div>
    </div>  </td>
                 </tr>  
        </table>
</div>




