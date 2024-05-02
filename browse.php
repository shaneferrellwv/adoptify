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
    <style>
        /* Add your CSS styles here */
        .card-img-top {
            width: 100%; /* Make the image responsive to the container width */
            height: 350px; /* Fixed height for all images */
            object-fit: cover; /* Cover the container without stretching the image */
            object-position: center; /* Center the image within the element's box */
        }
        /* Further styling for cards to ensure consistent look */
        .card {
            display: flex;
            flex-direction: column; /* Stack the card content vertically */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
        }
        .card-text {
            height: 20px; /* Adjust this value as needed */
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.05); /* Slightly increase the size of the card */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Add a shadow to the card */
        }
        .card-body {
            flex-grow: 1; /* Allow the card body to fill the space and push the footer down */
        }
        .card-link-custom { 
            text-decoration: none !important;
            color: black; 
        }
        .card-link-custom:hover .card-title, .card-link-custom:hover .card-text {
            text-decoration: none !important;
            color: black;
        }
        .search-form {
            margin-bottom: 20px; /* Add a margin to the bottom of the search form */
        }
    </style>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <div class="container mt-5">
        <h1>Browse Pets</h1>
        <form action="browse.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search pets by name">
            <input type="submit" value="Search">
        </form>
            <div class="row card-deck">
                <?php 
                $search = isset($_GET['search']) ? $_GET['search'] : null;
                $pets = selectAllPets($search);
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
    <br>
    <?php include('theme/footer.php'); ?>
</body>
</html>