#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    $pet = (isset($_GET['PetID'])) ? deletePet($_GET['PetID']) : exit();
?>