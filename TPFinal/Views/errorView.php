<?php if ($msgError){
    switch ($msgError["type"]){
        case 1:?>
<div class="alert alert-danger"  align="center"role="alert">
  <h3><?php echo $msgError["description"]; ?></h3>
</div>
        <?php break;
    case 2:?>
<div class="alert alert-success"  align="center"role="alert">
  <h3><?php echo $msgError["description"]; ?></h3>
</div>
    <?php break;
    case 3:?>
<div class="alert alert-warning"  align="center"role="alert">
  <h3><?php echo $msgError["description"]; ?></h3>
</div>
    <?php  break;}}?>