<?php 
 $user =$_SESSION["logged"];
   
?>


<?php if($cardsList) { ?>
<div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
            <h2>Listado de Tarjetas </h2>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <?php foreach($cardsList as $card) { ?>
          
                    <form action="<?php echo FRONT_ROOT?>Ticket/purchaseProcess"  class="list-group-item list-group-item-info ">
                        <div class="row">
                             <div class="col"> 
                                <!-- Numbero -->
                                  <h4><font color ="black">Numero Tarjeta  </h4> 
                                  <h5><?php echo $card["numberCC"]?></h5>
                            </div>
                            <div class="col">
                                <!-- compania -->
                                <h4>Compania </h4>
                                <h5></font> <?php echo $card["companyName"]?></h5>

                            </div>
                            <div class="col">
                                <input type="number" class="sr-only" value="<?php echo $cantidad;?>" name="cantidad">
                                <input type="number" class="sr-only" value="<?php echo $idFuncion;?>" name="idFuncion">
                                <input type="number" class="sr-only" value="<?php echo $card["id_creditCard"];?>" name="idCreditCard">
                                <input type="date" class="sr-only" value="<?php echo date("Y-m-d");?>" name="date">
                                <input type="date" class="sr-only" value="<?php echo $dateFunction;?>" name="dateFunction">
                                <button type="sumbit" class="btn btn-lg btn-success btn-block" >Comprar</button>
                            </div>
                        </div>
                    </form>
            <?php } ?>
         
                  
           
        </a>
        <form action="<?php echo FRONT_ROOT?>">
        <button type="sumbit"  class="btn btn-lg btn-primary btn-block" >VOLVER</button>
        </form>
    </div>
   <?php } else{ ?>
                <div class="content-grande">
                    <div class="row">
                    <div class="col">
                        <font color="red"> <h1>No Hay tarjetas cargadas</h1>
                        <p>Carge alguna tarjeta</p></font>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col"><form class="form-signin" action= "<?php echo FRONT_ROOT?>User/showPrincipalView" method="POST">
                            <button type="sumbit"  class="btn btn-lg btn-primary btn-block" >VOLVER</button>
                            </form>  
                        </div>

                        
                        <div class="col"> <form class="form-signin" action= "<?php echo FRONT_ROOT?>User/showCards" method="POST">
                            <input type="number" class="sr-only" value="<?php echo $user["id_user"];?>" name="idUser">
                            
                            <button type="sumbit"  class="btn btn-lg btn-success btn-block" >Agregar tarjeta</button>
                            </form>
                         </div>

                    
                    </div>
                
                </div>

            <?php } ?>


           
