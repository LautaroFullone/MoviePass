<div class="content-chico">
    <form class="form-signin" action= "<?php echo FRONT_ROOT?>Admin/showOPAdminsView " method="GET">
                <!--Cambiar logo -->
                <img class="mb-4" src="https://cdn.discordapp.com/attachments/699330820523163761/766036137641902160/logo72.jpeg"  title="Logo "alt="Logo del sistema" width="72" height="72">
                <h2 >Estadisticas <strong> <?php echo $salesList[0]["cinemaName"]?></strong></h2>
                <?php if (isset($title)){?> <h2> <?php echo $title; }?>
                <h3>Periodo</h3>
                <p><strong><em>[<?php echo $dateInicial;?>]</em></strong> & <strong><em>[<?php echo $dateFinal;?>]</em></strong></p>
                <h3>Total de Ventas</h3>
       
                <h4><font color="green"> $ <?php echo $sale?></font></h4>
                
               
                <br>
            <!-- B O T O N -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">VOLVER</button>
    </form>

</div>