#!/usr/local/bin/php

<?php
    include('includes/functions.php');

    if (isset($_POST['btnInsert'])) :
        $target_path = "uploads/";
        $file_name = $_FILES["image"]["name"];
        if ($file_name) {
            $target_path .= basename($file_name);
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            $target_path .= "media/logo.png";
        }
        insertPet($_POST['name'], $_POST['age'], $_POST['species'], $_POST['breed'], $_POST['description'], $target_path, $_SESSION['user']['id']);
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Shelter Profile</title>
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
    <div class='container-fluid'>

        <div class="container mt-5">
            <h2>Your Pets for Adoption</h2>
            <div class="row">
                <?php $myPets = selectMyPets($_SESSION['user']['id']);
                foreach ($myPets as $pet) { ?>
                    <div class="col-md-4 mb-4">
                        <a href="update.php?id=<?php echo $pet['petid']; ?>" class="card-link-custom">
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

        <div class="container mt-5">
            <h2>Review Applications</h2>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pet</th>
                                <th>Submission</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $myApplications = selectMyApplications($_SESSION['user']['id']);
                            foreach ($myApplications as $app) {
                                $pet = selectPet($app['petid']);
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($pet['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($app['createdat']) . "</td>";
                                echo "<td>" . htmlspecialchars($app['status']) . "</td>";
                                echo "<td><a href='application.php?id=" . $app['applicationid'] . "'><button name='btnDetails' class='btn btn-primary'>View Details</button></a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="container mt-5">
            <h2>List a Pet</h2>
            <div class="card">
                <div class="card-body">
                    <form method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" class="form-control" value="" min="0">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="species">Species</label>
                            <select name="species" id="species" class="form-control">
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                                <option value="bird">Bird</option>
                            </select>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label for="breed">Breed</label>
                            <input type="text" name="breed" id="breed" class="form-control" value="">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image">
                            <br>
                        </div>
                    </div>
                    <button name="btnInsert" class="btn btn-primary">List My Pet</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include('theme/footer.php'); ?>
</body>
</html>