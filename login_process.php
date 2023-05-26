<?php

include_once "connection.php";
include_once "helper.php";

// Retrieve the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the email is already registered
$sql = "SELECT * FROM customer WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if (!$user) {
    echo "<script>alert('Email not registered!');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit();
    }

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if the password is correct
if (!password_verify($password, $user['password'])) {
    echo "<script>alert('Wrong password!');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit();
    }


// Store data in session variables
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $user['id_customer'];

// Redirect to the home page
echo "<script>window.location.href='index.php';</script>";
exit();
