<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");

    include 'Header.php';

?>


<?php

 $test = new DestinationManager($pdo);

    if (isset($_GET['destination'])) {

       $arrayDestination = $test->getDestinationByLocation($_GET['destination']);
        echo "<h1>".$_GET['destination']."</h1>";
         
       foreach ($arrayDestination as $destination){ 
           $to =  $test->getDestibyTo($destination);
           ?>

                       
            <div class="card mb-3" style="width: 800px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?=$destination->getImg()?>" class="card-img-top" style="width: 17rem;">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                     <!-- PREMIUM -->
                     <?php if ($to->isIsPremium()==1){?>
                        <a target="_blank" href="<?= $to->getLink()?>">
                            <img border="0" alt="badg" src="/IMG/badge.png" width="100" height="100">
                        </a>
                    <?php ; }?>
                        <h5 class="card-title"><?=$to->getName()?></h5>
                        <p class="card-text"><?=$destination->getDescription()?></p>
                        <h4 class="card-text"><?=$destination->getPrice().' $'?></h4>
                        <p class="card-text"><?=$to->getGrade().'⭐'?></p>
                    </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-comment" data-idTour="<?=$to->getId()?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">                                  Comments 💬
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Comments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- AJAX POUR LES COMS DANS JS ET GETREVIEW -->
                    </div>
                    <div class="modal-footer">
                    <img src="/IMG/note.png" style="width:9rem">
                        <!-- <h5>Write your comment...</h5> -->
                        <form action="" method="">
                        <div class="labels">
                            <label>* Name</label>
                            <input id="input-author" type="text" name="author" placeholder="Pierre" required>
                        </div>
                        <div class="labels">
                            <label>* Comment</label>
                            <input id="input-message" type="textarea" name="comment" placeholder="Your comment" required>
                        </div>
                        <div class="labels">
                            <label>* Note</label>
                            <input id="input-note" type="number" name="note" min="0" max="5" required>
                        </div>
                        <button class="btn btn-dark btn-form-review" id='submit' type="button">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>

       <?php }
    } ?>




<?php

    include 'Footer.php';

?>