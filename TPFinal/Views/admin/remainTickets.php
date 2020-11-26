<?php $user = $_SESSION["logged"]["id_user"]?>
<?php if ($msgError){
require_once(VIEWS_PATH . "errorView.php");}?>


<div class="content-xxl">

    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
            <h2>Entradas vendidas</h2>
            <div class="row">
                             <div class="col"> 
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">
                                <h5>Entradas vendidas</h5>
                            </div>
                            <div class="col">
                                <h5>Entradas remanentes</h5>
                            </div>
                        </div>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <!-- ACA VA EL FOREARCH --> 
            <?php foreach ($funciones as $movie){
            ?>
                    <form action="<?php echo FRONT_ROOT?>User/showListCards"  class="list-group-item list-group-item-info ">
                        <div class="row">
                            <div class="col"> <em><h4><font color ="black">"
                            <?php echo $movie["title"]?>"</font></h4></em>

                            </div>
                        </div>
                        <div class="row">
                             <div class="col"> 
                                <!-- Cine -->
                                  <h4><font color ="black"> <?php echo $movie["cinemaName"] ?></h4> 
                            </div>
                            <div class="col">
                                <!-- Sala -->
                                <h5><?php echo $movie["roomName"] ?></font></h5>
                            </div>
                            <div class="col">
                                <!-- Fecha -->
                                <h5><?php echo $movie["functionDate"] ?></h5>
                            </div>
                            <div class="col">
                                <!-- Horario -->
                                <h5><?php echo $movie["functionsHour"] ?></h5> 
                           </div>
                            <div class="col">
                                <!-- Input Cantidad entradas -->
                                <h5> <font color="green"> <?php echo $movie["Cantidad"]?></font></h5>
                            </div>
                            <div class="col">
                                <!-- Input Cantidad entradas -->
                                <h5><font color="red"> <?php echo ($movie["seatsCapacity"] - $movie["Cantidad"])?></font></h5>
                            </div>
                        </div>
                    </form>
                    <?php }?>
           
        </a>
        <form action="<?php echo FRONT_ROOT?>Admin/showOPAdminsView">
            <button type="sumbit"  class="btn btn-lg btn-primary btn-block" >VOLVER</button>
        </form>
    </div>
    </div>

    