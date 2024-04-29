#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    if(isset($_POST['btnLogIn'])):
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (logInUser($username, $password)) {
            header("Location: home.php");
            exit();
        }
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Log In</title>
    <?php include('theme/scripts.php'); ?>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f5f5f5; /* Adjust the color to match your design */
        }
        #form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100% - 280px); /* Adjust based on the height of your header */
            padding-top: 60px; /* Adjust based on the height of your header */
        }
        .card {
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
            background: white;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }
        form {
            display: flex;
            flex-direction: column; /* Makes the form elements stack vertically */
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div id="form-wrapper">
    <div class="card">
        <h1>Log In</h1>
        <form method="post" class="register">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
                <br>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <br>
            </div>
            <button name="btnLogIn" class="btn btn-primary">Log In</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </div>
    </div>
    <br>
    <?php include('theme/footer.php'); ?>
</body>
</html>
