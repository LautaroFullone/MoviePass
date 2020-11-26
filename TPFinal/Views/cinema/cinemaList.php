  
    <div class="content-xxl">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
            <h2>Listado de Cines</h2>
            <div class="row">
                            <div class="col">
                                <!-- Nombre -->
                                <h3>Nombre</h3>
                            </div>
                            <div class="col">
                                <!-- adress -->
                                <h3>Direccion</h3>
                            </div>
                         </div>
        </a><?php foreach($cines as $value) {?>
        <a href="#" class="list-group-item list-group-item-action">
            
                                    <!-- Funcion -->
                    <form action="<?php echo FRONT_ROOT?>User/setAdmin"  class="list-group-item list-group-item-info ">
                        <div class="row">
                            <div class="col">
                                <!-- Nombre -->
                                <h4><?php echo $value->getName();  ?></h4>
                            </div>
                            <div class="col">
                                <!-- adress -->
                                <h5><?php echo$value->getAddress(); ?></h5>
                            </div>
                         </div>
                        </form>
            
        </a><?php } ?>
        <form action="<?php echo FRONT_ROOT?>User/showPrincipalView">
        <button type="sumbit"  class="btn btn-lg btn-primary btn-block" >VOLVER</button>
        </form>
    </div>
<div>