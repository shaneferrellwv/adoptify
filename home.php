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
</head>
<body>
    <?php include('theme/header.php'); ?>
    <h1>Home Page</h1>
    <br>
    <a href="login.php">Log In</a>
    <br>
    <a href="signup.php">Sign Up</a>
    <br>
    <a href="browse.php">Browse Pets</a>
    <br>
    <a href="shelter.php">Shelter Home</a>
    <br>
    <a href="logout.php">Log Out</a>
</body>
</html>