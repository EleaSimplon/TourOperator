<?php

    include '../Process/Autoload.php';

    require_once("../Process/Connexion.php");

    include 'Header.php';

    $destination = new DestinationManager($pdo);
    $allDestinations = $destination->getListGroupByName();

    $tourOp = new TourOperatorManager($pdo);
    $allTourOp = $tourOp->getList();

    /* IF FORM 1 */

    if (isset($_POST['link'])){

        $newTourOp = new TourOperator(['name'=>$_POST['name'], 'grade'=>$_POST['grade'], 'link'=>$_POST['link'], 'is_premium'=>$_POST['premium']]);
        $tourOp->add($newTourOp);
    }

    /* IF FORM 2 */

    if (isset($_POST['to'])){

        $newDestination = new Destination(['location'=>$_POST['location'], 'id_tour_operator'=>$_POST['to'], 'price'=>$_POST['price'], 'img'=>$_POST['image'], 'description'=>$_POST['description']]);
        $operator = new TourOperator(['id'=>$_POST['to']]);
        $destination->add($newDestination, $operator);
    
    }

    /* IF FORM 3 */

    if (isset($_POST['price2'])){

        $newDestination = new Destination(['location'=>$_POST['location'], 'id_tour_operator'=>$_POST['to2'], 'price'=>$_POST['price2']]);
        $operator = new TourOperator(['id'=>$_POST['to2']]);
        $destination->add($newDestination, $operator);
    
    }
    

?>

<!-- FORM 1 CREATE TO-->
<div class="container forms-admin">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="/IMG/to.png" border="0">
                        <h2 class="text-center">Create a new TO :</h2>

                        <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="Admin.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" name="name" placeholder="TO Name" class="form-control"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" placeholder="Grade" class="form-control"  type="number" name="grade" min="0" max="5" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="link" placeholder="Link" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="number" name="premium" min="0" max="1" placeholder="Premium" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM 2 CREATE DESTI -->
        <div class="col-lg-4 col-md-6 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="/IMG/laptop.png" border="0">
                        <h2 class="text-center">Create a new destination :</h2>

                        <form id="register-form2" role="form" autocomplete="off" class="form" action="Admin.php" method="post">
                            <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" class="form-control" type="text" name="location" placeholder="Location" required>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="sel1" name="to">
                                        <option selected="true" disabled="disabled">Choose a TO</option>
                                        <?php foreach ($allTourOp as $rowTourop){ ?>
                                            <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="description" placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="price" placeholder="Price $" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="image" placeholder="/IMG/" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM 3 CREATE ALL -->
        <div class="col-lg-4 col-md-6 col-sm-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img src="/IMG/trip.png" border="0">
                        <h2 class="text-center">Create a new Trip :</h2>

                        <form id="register-form3" role="form" action="Admin.php" method="post" class="form">
                            <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-control" id="sel1" name="location">
                                            <option selected="true" disabled="disabled">Choose a location</option>
                                            <?php foreach ($allDestinations as $rowDestination) { ?>

                                                <option value="<?=$rowDestination->getLocation()?>"><?=$rowDestination->getLocation()?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="sel1" name="to2">
                                        <option selected="true" disabled="disabled">Choose a TO</option>
                                        <?php foreach ($allTourOp as $rowTourop){ ?>
                                            <option value="<?=$rowTourop->getId()?>"><?=$rowTourop->getName()?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="forgetAnswer" class="form-control" type="text" name="price2" placeholder="Price $" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"type="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

    include 'Footer.php';

?>