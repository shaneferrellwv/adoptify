#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    if (isset($_POST['btnUpdate'])) :
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
    <title>Shelter Profile Page</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class='container-fluid'>
        <h2>Update Pet</h2>
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
                <button name="btnUpdate" class="btn btn-primary">Update Pet</button>
                </form>  
            </div>
        </div>
    </div>
</body>
</html>