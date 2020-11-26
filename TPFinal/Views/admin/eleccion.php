<?php if (isset($msgError)){
require_once(VIEWS_PATH . "errorView.php");}?>
<div class="content-grande">

<div class="form-signin">
    <form action="<?php echo FRONT_ROOT?>Admin/showOPAdminsView" >
        <button  class="btn btn-lg btn-primary btn-block" type="submit">Operaciones como Admin</button>
    </form>

    <form action="<?php echo FRONT_ROOT?>Admin/showOPUsersView">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Operaciones como Cliente</button>
    </form>
        
<?php
?>