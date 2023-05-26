<?php

// logout the user
session_start();

// unset all session variables
unset($_SESSION['loggedin']);
unset($_SESSION['id']);

// destroy the session
session_destroy();

// redirect to login page
header('Location: login.php');