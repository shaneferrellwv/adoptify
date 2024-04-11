<?php

// create mysqli connection
$hostname = "mysql.cise.ufl.edu";
$username = "shaneferrell";
$password = "ctrlaltdefeat";
$database = "adoptify";

$mysqli = new mysqli($hostname, $username, $password, $database);

// check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

?>