#!/usr/local/bin/php

<?php
    include('includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Home</title>
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
            height: 100%; /* Make sure all cards are the same height */
            display: flex;
            flex-direction: column; /* Stack the card content vertically */
        }
        .card-body {
            flex-grow: 1; /* Allow the card body to fill the space and push the footer down */
        }
    </style>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <div class="container mt-5">
            <h1>Home Page</h1>
            <br>
            <a href="login.php">Log In</a>
            <br>
            <a href="signup.php">Sign Up</a>
            <br>
            <a href="browse.php">Browse Pets</a>
            <br>
            <a href="profile.php">Adopter Home</a>
            <br>
            <a href="shelter.php">Shelter Home</a>
            <br>
            <a href="logout.php">Log Out</a>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="card-title">Adopt a Pet</h2>
                            <p class="card-text">Looking for an animal friend? Your new best friend is just a few clicks away.</p>
                            <a href="#" class="btn btn-primary">Browse Pets</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="card-title">List a Pet</h2>
                            <p class="card-text">Looking to find a loving home for one of your pets? List your pet for adoption now.</p>
                            <a href="#" class="btn btn-primary">List My Pet</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <?php
                $pets = getPetCarousel();
                $grouped_pets = array_chunk($pets, 3);
            ?>

            <div class="row">
                <div id="petsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($grouped_pets as $index => $group): ?>
                        <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
                            <div class="row">
                            <?php foreach ($group as $pet): ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="<?php echo htmlspecialchars($pet['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($pet['name']); ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($pet['name']); ?></h5>
                                            <p class="card-text"><?php echo htmlspecialchars($pet['description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    <?php include('theme/footer.php'); ?>
</body>
</html>