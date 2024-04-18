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
    <style>
        /* Add some custom styles to align items with flexbox */
        .card-custom {
            display: flex;
            align-items: center;
            justify-content: start;
        }
        .card-img-container {
            flex: 0 0 auto; /* Do not grow or shrink */
        }
        .card-body {
            flex: 1; /* Take up remaining space */
            padding-left: 20px; /* Add some spacing between image and text */
        }
        .card-img-top {
            max-width: 300px; /* Maximum width for the image */
            max-height: 300px; /* Maximum height for the image */
            width: auto; /* Maintain aspect ratio */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px; /* Add some space between the image and the details */
        }
        .info-container {
            padding-left: 100px;
        }
        .centered-container {
            display: flex;
            justify-content: center; /* This centers the card horizontally */
            margin-top: 20px;
        }

        .pet-details-card {
            width: 100%; /* You may want to set a max-width here */
            /*border: 1px solid #ccc; /* This adds a border like the application form */
            /*box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* This adds a shadow similar to the form */
            /*margin-bottom: 20px;
            padding: 20px; /* This adds some padding inside the card */
        }

        .pet-details-content {
            display: flex;
            justify-content: space-around; /* This will space out the image and details */
            align-items: center;
        }

        .pet-info {
            flex-basis: 50%; /* Adjust this as necessary to give more space to text or image */
        }

        .pet-image {
            flex-basis: 50%; /* Adjust this as necessary */
            text-align: right; /* This centers the image within its flex item */
        }

        .pet-image img {
            max-width: 300px;
            max-height: 500px;
            width: auto;
            height: auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .pet-details-content {
                flex-direction: column; /* Stack image and details on smaller screens */
            }

            .pet-info, .pet-image {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include('theme/header.php'); ?>

        <div class="container mt-5">
        <?php $pet = selectPet($_GET['id']); ?>
        
        <h2>Pet Details</h2>
        <br><br>
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
        
    </div>
        
        <div class="container mt-5">
            <h2>Adoption Application</h2>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name"> Adopter's Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="" required>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="numPets">Number of Pets in Household</label>
                                <input type="number" name="numPets" id="numPets" class="form-control" value="" min="0" required>
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
                                <input type="text" name="email" id="email" class="form-control" value="" required>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="info">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="" required>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label for="info">Visit Date</label>
                                <input type="date" id="visit" name="visit" class="form-control" required>
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
    <br>
    <?php include('theme/footer.php'); ?>
</body>
</html>