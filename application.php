#!/usr/local/bin/php

<?php
    include('includes/functions.php');

    if (isset($_POST['btnApprove'])) :
        approveApplication($_POST['applicationid'], $_POST['feedback']);
    endif;

    if (isset($_POST['btnReject'])) :
        rejectApplication($_POST['applicationid'], $_POST['feedback']);
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Application Details</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>

    <?php
        $app = selectApplication($_GET['id']);
        $pet = selectPet($app['petid']);
    ?>

    <div class='container-fluid'>

        <div class="container mt-5">
            <h2>Pet Details</h2>
            <div class="centered-container">
                <div class="pet-details-card">
                    <div class="pet-details-content">
                        <!-- Information container -->
                        <div class="pet-info">
                            <h5 class="card-title"><?php echo $pet['name']; ?></h5>
                            <p class="card-text">Age: <?php echo $pet['age']; ?></p>
                            <p class="card-text">Species: <?php echo $pet['species']; ?></p>
                            <p class="card-text">Breed: <?php echo $pet['breed']; ?></p>
                            <p class="card-text">Characteristic: <?php echo $pet['description']; ?></p>
                            <p class="card-text">Health: <?php echo $pet['age']; ?></p>
                        </div>
                        <!-- Image container -->
                        <div class="pet-image">
                            <img src="<?php echo $pet['image_url']; ?>" class="card-img-top" alt="Pet" 
                                style="max-width:300px;max-height:500px;width:auto;height:auto;">
                        </div>
                    </div>
                </div>
        </div>
            <h2>Application Details</h2>
            <div class="card">
                <div class="card-body">

                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <input type="hidden" name="applicationid" id="applicationid" value="<?php echo $app['applicationid']; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name"> Adopter's Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $app['name']; ?>" readonly>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="numPets">Number of Pets in Household</label>
                                <input type="number" name="numPets" id="numPets" class="form-control" value="<?php echo $app['number_of_pets']; ?>" min="0" readonly>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="species">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $app['phone']; ?>" readonly>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $app['email']; ?>" readonly>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="info">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo $app['address']; ?>" readonly>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="info">Visit Date</label>
                                <input type="date" id="visit" name="visit" class="form-control" value="<?php echo $app['visit']; ?>" readonly>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="info">Additional Information</label>
                                <textarea name="info" id="info" class="form-control" readonly><?php echo $app['info']; ?></textarea>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="feedback">Feedback</label>
                                <textarea name="feedback" id="feeback" class="form-control"><?php echo $app['feedback']; ?></textarea>
                                <br>
                            </div>
                        </div>
                        <button name="btnApprove" class="btn btn-success">Approve</button>
                        <button name="btnReject" class="btn btn-danger">Reject</button>
                    </form> 
                </div>
            </div>
            <br>
        </div>
    </div>
    <?php include('theme/footer.php'); ?>
</body>
</html>