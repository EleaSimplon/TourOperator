<?php

include 'Process/Autoload.php';

require_once("Process/Connexion.php");

include 'View/Header.php';

?>



    
<!-- ***************************** TEXT INDEX *********************************** -->
    
    <main>
        <div id="about" class="about">
            <!-- <img src="/IMG/gif.gif"> -->
            <h1>About Us</h1>     
            <p>When it comes to arranging your holiday, you can click on our website, pop into one of our stores, use the ComparOperator app or call our contact centre.</p>
            <p>While you’re away, our 24/7 ComparOperator Experience Centre means our global team of Travel Experts are on hand to help whenever you need us, while the TUI app lets you control your holiday from the palm of your hand.</p>
            <p>We’re committed to protecting the planet, too, by actively looking out for the environment, local people and wildlife in the places you love to visit.</p> 
        </div>
         

    </main>

<!-- ***************************** POC BANNER CARDS *********************************** -->
			
	<h1>Check out our sales !</h1>	
    <section class="pt-5 pb-5">
        <div class="container">
            <div id="sales" class="row">
                <div class="col-6">
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-light mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="btn btn-light mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="/IMG/morocco.jpg">
                                            <div class="card-body">
                                                <h3 class="card-title">Morocco / North Africa</h3>
                                                <h4>7 days</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <img style="height: 4rem; width: 4rem"  src="/IMG/sales.png">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="/IMG/fuji.jpg">
                                            <div class="card-body">
                                                <h3 class="card-title">Fuji / Japan</h3>
                                                <h4>20 days</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <img style="height: 4rem; width: 4rem"  src="/IMG/sale.png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="" src="/IMG/istan.jpg">
                                            <div class="card-body">
                                                <h3 class="card-title">Istanbul / Turkish</h3>
                                                <h4>12 days</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <img style="height: 4rem; width: 4rem"  src="/IMG/sales.png">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="/IMG/canyon.jpg">
                                            <div class="card-body">
                                                <h3 class="card-title">Grand Canyon / USA</h3>
                                                <h4>28 days</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <img style="height: 4rem; width: 4rem"  src="/IMG/sale.png">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="/IMG/agra.jpg">
                                            <div class="card-body">
                                                <h3 class="card-title">Agra / India</h3>
                                                <h4>24 days</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <img style="height: 4rem; width: 4rem"  src="/IMG/sale.png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="/IMG/sydney.jpg">
                                            <div class="card-body">
                                                <h3 class="card-title">Sydney / Australia</h3>
                                                <h4>24 days</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <img style="height: 4rem; width: 4rem"  src="/IMG/sales.png">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ***************************** CARDS BOOK *********************************** -->

    <h1>Book now !</h1>

    <ul id="book">

        <?php

        $destination = new DestinationManager($pdo);
        $allDestinations = $destination->getListGroupByName();

        foreach ($allDestinations as $rowDestination){
            ?>
            <li class="booking-card" style="background-image:url(<?=$rowDestination->getImg()?>)">
                <div class="book-container">
                    <div class="content">
                    <a href='/View/ListTo.php?destination=<?=$rowDestination->getLocation()?>'><button class="btn">Book</button></a>
                    </div>
                </div>
                <div class="informations-container">
                    <h2 class="title"><?=$rowDestination->getLocation()?></h2>
                    <p class="sub-title"><?=$rowDestination->getDescription()?></p>
                    <div class="more-information">
                        <div class="info-and-date-container">
                            <div class="box info">
                                <svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z" />
                                </svg>
                                <p>From <?=$rowDestination->getPrice()." $"?></p>
                            </div>
                            <div class="box date">
                                <svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" />
                                </svg>
                                <p>Samedi 1er février 2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        <?php
        }
        ?>
  
    </ul>  


 


<!-- ***************************** BACK TO TOP BTN *********************************** -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>



<?php

    include 'View/Footer.php';

?>