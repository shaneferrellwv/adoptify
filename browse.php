#!/usr/local/bin/php

<?php
include('includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Browse Pets</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <h1>Browse Pets</h1>
        <div class="container mt-5">
            <div class="row">
                <?php $pets = selectAllPets();
                foreach ($pets as $pet) { ?>
                    <div class="col-md-4 mb-4">
                        <a href="pet.php?id=<?php echo $pet['petid']; ?>" class="card-link-custom">
                            <div class="card">
                                <img src="<?php echo $pet['image_url']; ?>" class="card-img-top" alt="Pet">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $pet['name']; ?></h5>
                                    <p class="card-text"><?php echo $pet['description']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>