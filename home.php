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
            height: auto; /* Change from a fixed height to auto to maintain aspect ratio */
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
        .carousel-item .row {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <div class="container mt-5">
    
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="card-title">Adopt a Pet</h2>
                            <p class="card-text">Looking for an animal friend? Your new best friend is just a few clicks away.</p>
                            <a href="browse.php" class="btn btn-primary">Browse Pets</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="card-title">List a Pet</h2>
                            <p class="card-text">Looking to find a loving home for one of your pets? List your pet for adoption now.</p>
                            <a href="shelter.php" class="btn btn-primary">List My Pet</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <?php
                $pets = getPetCarousel();
                $grouped_pets = array_chunk($pets, 3);

                // Ensure each group has three items by filling in with placeholders if necessary
                foreach ($grouped_pets as &$group) {
                    while (count($group) < 3) {
                        // Add a placeholder
                        $group[] = [
                            'image_url' => 'path/to/placeholder-image.jpg', // Path to a placeholder image
                            'name' => 'Unavailable', // Placeholder name
                            'description' => 'No additional info' // Placeholder description
                        ];
                    }
                }
                unset($group); // Break the reference with the last element
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
                                        <?php if ($pet['name'] !== 'Unavailable'): ?>
                                            <img src="<?php echo htmlspecialchars($pet['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($pet['name']); ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars($pet['name']); ?></h5>
                                                <p class="card-text"><?php echo htmlspecialchars($pet['description']); ?></p>
                                            </div>
                                        <?php else: ?>
                                            <!-- Placeholder content can go here, if you want it to be visible, or leave it empty to just preserve space -->
                                            <div class="card-body">
                                                <h5 class="card-title">&nbsp;</h5>
                                                <p class="card-text">&nbsp;</p>
                                            </div>
                                        <?php endif; ?>
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