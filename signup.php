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
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f5f5f5;
        }
        #form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: center;
            padding-top: 60px; /* Adjust this if your header is taller or shorter */
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 50px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
            background: white;
            margin: auto;
            display: flex;
            flex-direction: column;
        }
        .form-control, select.form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            margin-bottom: 10px; /* Adds spacing between form fields */
            font-size: 16px; /* Larger font size if needed */
            box-sizing: border-box; /* Ensures padding doesn't affect width */
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
            display: block; /* Makes it a block element */
            width: 100%; /* Makes the button expand to the full width of the card */
            box-sizing: border-box; /* Ensures padding doesn't affect width */
            margin-top: 10px; /* Adds some space above the button */
            border-radius: 4px; /* Match the border radius if you have one */
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div id="form-wrapper">
        <div class="card">
            <h1>Register</h1>
            <form action="" method="post" class="register">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div>
                    <label for="usertype">I am: </label>
                    <select name="usertype" id="usertype" class="form-control">
                        <option value="adopter">Adopter</option>
                        <option value="shelter">Shelter</option>
                    </select>
                </div>
                <button name="btnRegister" class="btn btn-primary">Register</button>
            </form>
            <a href="login.php">Cancel</a>
        </div>
    </div>
    <br>
    <?php include('theme/footer.php'); ?>
</body>
</html>
