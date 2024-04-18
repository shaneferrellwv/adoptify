#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptify - Adopter Profile</title>
    <?php include('theme/scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class='container-fluid'>

        <div class="container mt-5">


            <h2>My Applications</h2>
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
                    $myApplications = selectSubmittedApplications($_SESSION['user']['id']);
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
    <br>
    <?php include('theme/footer.php'); ?>
</body>
</html>