#!/usr/local/bin/php

<?php
include('includes/functions.php');
if (isset($_POST['btnSubmit'])) :
    insertApplication($_POST['name'], $_POST['numPets'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['visit'], $_POST['info'], $_GET['id'],  $_SESSION['user']['id']);
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Pet Details</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    
    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Pet Details</h2>
            <?php
                $pet = selectPet($_GET['id']);
            ?>
            
            <div class="card">
                <img src="<?php echo $pet['image_url']; ?>" class="card-img-top" alt="Pet" 
                     style="max-width:300px;max-height:500px;width:auto;height:auto;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pet['name']; ?></h5>
                    <p class="card-text"><?php echo $pet['age']; ?></p>
                    <p class="card-text"><?php echo $pet['species']; ?></p>
                    <p class="card-text"><?php echo $pet['breed']; ?></p>
                    <p class="card-text"><?php echo $pet['description']; ?></p>
                </div>
            </div>
        </div>
        
        <div class="container mt-5">
            <h2>Adoption Application</h2>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name"> Adopter's Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="numPets">Number of Pets in Household</label>
                                <input type="number" name="numPets" id="numPets" class="form-control" value="" min="0">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="species">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="info">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="info">Visit Date</label>
                                <input type="date" id="visit" name="visit" class="form-control" >
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="info">Additional Information</label>
                                <textarea name="info" id="info" class="form-control"></textarea>
                                <br>
                            </div>
                        </div>
                        <button name="btnSubmit" class="btn btn-primary">Submit Application</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>