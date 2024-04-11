#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    if(isset($_POST['btnRegister'])):
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];
        createUser($username, $password, $usertype);
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Sign Up</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h1>Register</h1>
                <form action="" method="post" class="register">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="usertype">I am: </label>
                            <select name="usertype" id="usertype" class="form-control">
                                <option value="adopter">adopter</option>
                                <option value="shelter">shelter</option>
                            </select>
                        </div>
                    </div>
                    <button name="btnRegister" class="btn btn-primary">Register</button> <a href="login.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>