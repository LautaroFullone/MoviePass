<?php 
 $user =$_SESSION["logged"];
 if (isset($msgError)){
    require_once(VIEWS_PATH . "errorView.php");}
?>


<br>
    <div class="row">
        <div class="col">  </div>
        <div class="col">
            <button class="btn btn-lg btn-primary btn-block"   data-toggle="modal" data-target="#cargaTarjeta" type="button">Cargar Nueva  Tarjeta</button>
        </div>
        <div class="col">  </div>
    </div>
    
<?php if(isset($cardsList)) { 
            
?>

 <?php foreach ($cardsList as $card) { ?>
    <div class="content-chico">
   
        <form action="<?php echo FRONT_ROOT?>User/removeCreditCard" method="post" class="form-signin">
            
            <div class="row">
                <div class="col">
                    <label for="num">Titular</label>
                    <input type="text" class="form-control" value="<?php echo $card["cardHolder"]?>" readonly>
                </div>
                <div class="col">
                    <label for="num">Fecha de Expiracion</label>
                    <input type="text" class="form-control" value="<?php echo $card["expiration"]?>"readonly>

                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <label for="num">Numero de Tarjeta</label>
                    <input type="text" class="form-control" value="<?php echo $card["numberCC"]?>"readonly>
                </div>
                <div class="col">
                    <label for="com">Compania </label>
                    <input type="text" id="com" class="form-control" value="<?php echo $card["companyName"]?>"readonly>
                  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                <input type="number"  class="sr-only"  name="idCreditCard"value="<?php echo $card["id_creditCard"]?>"readonly>
                <input type="number" name ="idUser" value= "<?php echo $idUser; ?>" class="sr-only">
                <button type="submit" class="btn btn-lg btn-danger btn-block"> Eliminar</button>
                <!--btn btn-lg btn-danger btn-block -->
                </div>
            </div>
        </form>
     </div>
    <?php } ?>
<?php } ?>

<br>
<div class="row">
    <div class="col">  </div>
    <div class="col">
        <form action="<?php echo FRONT_ROOT?>User/showPrincipalView">
            <button type="sumbit"  class="btn btn-lg btn-primary btn-block" >VOLVER</button>
        </form>
    </div>
    <div class="col">  </div>
</div>
    
    

<!-- MODAL-->

<div class="modal fade" id="cargaTarjeta"  tabindex="-1" aria-labelledby="cierresesionLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" >Cargar Tarjeta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="content-grande">
                        <div class="card">
                            <h5 class="card-header">
                                <a class="list-group-item list-group-item-action active">
                                    <h5>Complete el Formulario</h5>
                                </a>
                            </h5>
                        <div class="card-body">
                            <form  method="post" action="<?php echo FRONT_ROOT?>User/addOnlyTarjeta">
                                <h5 class="card-title">Titular de la tarjeta</h5>
                                <input class="form-control" type="text" name="cardHolder"   minlength="6" required>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Numero de la tajeta</h5>           
                                            <th> <input class="form-control" type="number" name="numberCC1"  min="0" max="9999999999999999" pattern="[0-9]{16}" title="Deben ser [16 NUMEROS] "required></th>
                                    </div>
                                    <div class="col">  
                                        <h5 class="card-title">Fecha de expiracion</h5>
                                        <input class="form-control" type="date" name="expiration" min=<?php echo date("Y-m-d")?> required>
                                    </div>
                                </div>
                            <br>
                            <h5 class="card-title">Compania</h5> 
                            <?php foreach($companiesList as $companie){?>

                                <input type="radio" name="company" value="<?php echo $companie["id_company"];?>"  id="<?php echo $companie["id_company"];?>" required>
                                <label for="<?php echo $companie["id_company"];?>"> <?php echo $companie["companyName"];?> </label>

                            <?php } ?>
            
                            
                            <br>
                                <input type="number" id="idUser"  class="sr-only" name="idUser" value="<?php echo  $user["id_user"]?>"  readonly>
                                
                                <button  class="btn btn-lg btn-success btn-block" type="submit"> Agregar Tarjeta </button>
                            </form>
                        </div>
                </div> 
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        