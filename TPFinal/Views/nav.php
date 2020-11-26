<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <!-- BIENVENIDO -->
  <strong> <a class="navbar-brand" href="<?php echo FRONT_ROOT ;?>">Los supervivientes</a> </strong>  
  <span class="navbar-brand">Bienvenido</span>
 

  <div class="collapse navbar-collapse" >
    <ul class="navbar-nav mr-auto">
       <!-- LISTADO -->
      <li class="nav-item ">
        <a class="nav-link" href= "<?php echo FRONT_ROOT?>Movies/showMoviesListView">Cartelera</a>
      </li>
      <!-- LISTADO -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo FRONT_ROOT?>Movies/showSearchMovieView">Buscar película</a>
      </li>
    </ul>
    <a class="nav-link" href="<?php echo FRONT_ROOT?>User/showLoginView">Menu Principal</a>
    <a class="nav-link" data-toggle="modal" data-target="#cierresesion"  href="#">Cerrar Sesion</a>

   



  </div>
</nav>
<!-- Modal de cierre de sesion-->



<div class="modal fade" id="cierresesion" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cierresesionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cierresesionLabel">Cerrar Sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿ Esta seguro que quiere cerrar sesion?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form action="<?php echo FRONT_ROOT?>User/showLogOutView">
          <button type="sumbit" class="btn btn-primary">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>