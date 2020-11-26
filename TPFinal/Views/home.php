
<div class="row">
    <div class="col">
        <div class="content-grande">
            <h1>Proximos estrenos</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h5><?php echo $pelis[6]->getTitle();?></h5>
                    <div class="content-hieght">
                            <img src="<?php echo"https://image.tmdb.org/t/p/w200". $pelis[6]->getPoster_path(); ?>" alt="Imagn"     height="100%" width="100%" >
                        </div>
                    </div>
                    <div class="carousel-item">
                    <h5><?php echo $pelis[10]->getTitle();?></h5>
                    <div class="content-hieght">
                                <img src="<?php echo"https://image.tmdb.org/t/p/w200". $pelis[10]->getPoster_path(); ?>" alt="Imagn"     height="100%" width="100%" >
                        </div>
                    </div>
                    <div class="carousel-item">
                    <h5><?php echo $pelis[16]->getTitle();?></h5>
                    <div class="content-hieght">
                                <img src="<?php echo"https://image.tmdb.org/t/p/w200". $pelis[16]->getPoster_path(); ?>" alt="Imagn"     height="100%" width="100%" >
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

</div>  
<div class="row">
    <div class="content-grande">
     
            <h2> <p class="mt-5 mb-3 ">&copy;<strong> Los supervivientes</strong> -2020</p></h2>
        
    </div>
</div>
            


