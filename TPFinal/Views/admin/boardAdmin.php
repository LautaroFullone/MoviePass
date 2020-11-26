<?php if (isset($msgError)){
require_once(VIEWS_PATH . "errorView.php");}?>
    
<div class="content-chico">
  
        <h1 class="text-center">Gestion de Cines</h1>
        <div class="row">

            <div class="col">
                <form action="<?php echo FRONT_ROOT?>Cinema/showCinemaForm" class="form-signin">
                 <button  class="btn btn-lg btn-success btn-block" type="submit">Alta cine</button>
                </form>
            </div>
          
            <div class="col">
                <form action="<?php echo FRONT_ROOT?>Cinema/showCinemaListAdmin" class="form-signin">
                    <button  class="btn btn-lg btn-success btn-block" type="submit">Listar Cines</button>
                </form>
            </div>
        </div>   

        <h1 class="text-center">Gestion de Usuarios</h1>
        <div class="row">  
            <div class="col">
                <form action="<?php echo FRONT_ROOT?>User/viewSetAdmin" class="form-signin">
                    <button  class="btn btn-lg btn-success btn-block" type="submit">Modificar Usuarios</button>
                </form>
            </div>
        </div>
        
        <h1 class="text-center">Gestion Contable</h1>
        <div class="row">
            <div class="col">
                <form  class="form-signin">
                    <a  class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#consultar">Consultar Ventas</a>
                </form>
            </div>
            <div class="col">
                <form action="<?php echo FRONT_ROOT?>Admin/showRemainTickets" class="form-signin">
                    <button  class="btn btn-lg btn-success btn-block" type="submit">Tickets Vendidos</button>
                </form>
            </div>
        </div>
</div>  
<br>
       
 
<div class="centerbutton">
    <form action= "<?php echo FRONT_ROOT?>Admin/showPrincipalView" class="form-signin">
        <button type="submit" class="btn btn-lg btn-primary btn-block">VOLVER</button>
    </form>
</div>
<!-- MODAL -->
<div id="consultar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cierresesionLabel">Gestion Contable Ventas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿ Que criterio quiere consultar?
            </div>
            <div class="modal-footer">
                    <form action="<?php FRONT_ROOT?>showCinemaListPurchase" method="GET">
                        <button type="sumbit" class="btn btn-primary">Cines</button>
                </form>
            
                <form action="<?php FRONT_ROOT?>showFormVentasTitle" method="GET">
                        <button type="sumbit" class="btn btn-primary">Peliculas</button>
                </form>
            </div>
        </div>
    </div>
</div>


