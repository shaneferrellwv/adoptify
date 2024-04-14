#!/usr/local/bin/php

<?php
include('includes/functions.php');
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
                <img src="<?php echo $pet['image_url']; ?>" class="card-img-top" alt="Pet">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pet['name']; ?></h5>
                    <p class="card-text"><?php echo $pet['age']; ?></p>
                    <p class="card-text"><?php echo $pet['species']; ?></p>
                    <p class="card-text"><?php echo $pet['breed']; ?></p>
                    <p class="card-text"><?php echo $pet['description']; ?></p>
                </div>
            </div>

        </div>
    </div>


    <h2>Adoption Application</h2>

    
</body>
</html>