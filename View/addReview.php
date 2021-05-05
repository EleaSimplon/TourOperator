<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");

    $reviewManager = new ReviewManager($pdo);

    $tourOp = new TourOperator(['id'=>intval($_POST['idTO'])]);

    $newReview = new Review(['message'=>$_POST['message'], 'author'=>$_POST['author']]);
    $reviewManager->add($newReview, $tourOp);

    $reviews = $reviewManager->getList($tourOp);

?>

    <div class="box-review" id="<?=$tourOp->getId()?>">

    <?php foreach ($reviews as $review) { ?>
        
        <div>
            <h3><?=$review->getAuthor()?> :</h3>
            <p><?=$review->getMessage()?></p>
        </div>

<?php } ?>
    

    </div>
