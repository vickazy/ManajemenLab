  <body> 
        <nav class="navbar navbar-dark bg-inverse navbar-full" id="nav-main">
        <img class="navbar-brand" src="<?php echo base_url();?>assets/images/logomanivlab.png">
        <ul class="nav navbar-nav">
        
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>gb">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>inventaris">Inventaris</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>managelab">Management Lab</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>penjadwalan">Scheduling</a>
            </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">	History</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Komputer</a>
                    <a class="dropdown-item" href="<?php echo base_url();?>history">Non-Komputer</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>eticketing">E-Ticketing</a>
            </li>
        </ul>

    </nav>      
    <section id="carousel">
        <div id="carousel-home" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-home" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="<?php echo base_url();?>assets/images/slide1.jpg" alt="slide1">
                    
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url();?>assets/images/slide2.jpg" alt="slide2">
                    
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
 </body>