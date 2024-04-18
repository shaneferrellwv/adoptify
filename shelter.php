#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    if (isset($_POST['btnInsert'])) :
        $target_path = "uploads/" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) :
            insertPet($_POST['name'], $_POST['age'], $_POST['species'], $_POST['breed'], $_POST['description'], $target_path, $_SESSION['user']['id']);
        else:
            echo "Sorry, there was an error uploading your file.";
        endif;
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Shelter Profile</title>
    <?php include('theme/scripts.php'); ?>
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
                                echo "<td><button class='btn btn-primary'>View Details</button></td>";
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
                    <form action="" method="post" class="form" enctype="multipart/form-data">
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
                            <textarea name="description" id="description" class="form-control" value=""></textarea>
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
                    <button name="btnInsert" class="btn btn-primary">Insert Record</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>