<br>
<div class="row">
    <div class="col">  </div>

    <div class="col">
        <form action="<?php echo FRONT_ROOT?>User/showPrincipalView">
            <button type="sumbit"  class="btn btn-lg btn-primary btn-block" >VOLVER</button> 
        </form>
    </div>

    <div class="col">  </div>`
</div>

<div class="content-xxl">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
            <div class="row">
                <div class="col">
                    <form action="<?php echo FRONT_ROOT;?>User/showOrderTitlePurchases">
                    <input type="text" value= "<?php echo $idUser;?>" name ="idUser" class="sr-only" >
                    <button type="sumbit"  class="btn btn-lg btn-light btn-block" >Ordenar por titulo</button>
                    </form>
                </div>
                <div class="col"><h1>Listado de Tickets</h1></div>
                
                <div class="col">
                <form action="<?php echo FRONT_ROOT;?>User/showOrderDatePurchases">
                <input type="text" value= "<?php echo $idUser;?>" name ="idUser" class="sr-only" >
                <button type="sumbit"  class="btn btn-lg btn-light btn-block" >Ordenar por fecha</button>
                </form>
                </div>
            </div>
            
            <br>
            <font color="black">
            <div class="row">
                <div class="col">
                <h3>ID ticket</h3>
                </div>
                <div class="col">
                    <h3>Fecha de compra</h3>
                </div>
                <div class="col">
                    <h3>Cine</h3>
                </div>
                <div class="col">
                    <h3>Sala</h3>
                </div>
                <div class="col">
                <h3>Fecha Funcion</h3> 
                </div>
                <div class="col">
                <h3>Horario Funcion</h3> 
                </div>
                
            </div>
            <div class="row">
                <div class="col">
                <h3><em>"Nombre Pelicula"</em></h3>
                </div>
            </div>
            </font>
        </a>
        <?php foreach($purchaseList as $pucharse) {?>
            <a href="#" class="list-group-item list-group-item-action">
                <br>
                <form action="<?php echo FRONT_ROOT?>User/setAdmin"  class="list-group-item list-group-item-info ">
                    <div class="row">
                        <div class="col">
                            <h3> <strong><?php echo $pucharse["id_ticket"];?></strong></h3>
                        </div>
                        <div class="col">
                            <h3><?php echo $pucharse["FechaCompra"];?></h3>
                        </div>
                        <div class="col">
                            <h3><?php echo $pucharse["cinemaName"];?></h3>
                        </div>
                        <div class="col">
                            <h3><?php echo $pucharse["roomName"];?></h3>
                        </div>
                        <div class="col">
                        <h3><?php echo $pucharse["FechaFuncion"];?></h3> 
                        </div>
                        <div class="col">
                        <h3><?php echo $pucharse["functionsHour"];?></h3> 
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <font color="red">
                                <h3><em>"<?php echo $pucharse["title"];?>"</em></h3>
                            </font>
                        </div>
                    </div>
                </form>
                
            </a>       
        <?php } ?>
    </div>
</div>

    <br>
    
<div>