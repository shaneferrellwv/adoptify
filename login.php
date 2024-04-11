#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    if(isset($_POST['btnLogIn'])):
        $username = $_POST['username'];
        $password = $_POST['password'];
        logInUser($username, $password);
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Log In</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h1>Log In</h1>
                <form action="" method="post" class="register">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <br>
                        </div>
                    </div>
                    <button name="btnLogIn" class="btn btn-primary">Log In</button>
                </form>
                <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>