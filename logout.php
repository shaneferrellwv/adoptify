#!/usr/local/bin/php

<?php
    include('includes/functions.php');
    logOut();

    $_SESSION = array();
    session_destroy();
    header("Location: home.php");
?>