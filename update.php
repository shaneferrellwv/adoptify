#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    if (isset($_POST['btnUpdate'])) :
        updatePet($_POST['name'], $_POST['age'], $_POST['species'], $_POST['breed'], $_POST['description'], $_GET['id']);
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

                <?php
                    $pet = selectPet($_GET['id']);
                ?>

                <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $pet['name']; ?>">
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="<?php echo $pet['age']; ?>" min="0">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="species">Species</label>
                        <select name="species" id="species" class="form-control">
                            <option value="dog" <?php echo ($pet['species'] == 'dog') ? 'selected' : ''; ?>>dog</option>
                            <option value="cat" <?php echo ($pet['species'] == 'cat') ? 'selected' : ''; ?>>cat</option>
                            <option value="bird" <?php echo ($pet['species'] == 'bird') ? 'selected' : ''; ?>>bird</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label for="breed">Breed</label>
                        <input type="text" name="breed" id="breed" class="form-control" value="<?php echo $pet['breed']; ?>">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"><?php echo $pet['description']; ?></textarea>
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