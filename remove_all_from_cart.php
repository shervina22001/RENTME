<?php

session_start();

unset($_SESSION['cart']);

$_SESSION['cart'] = array();

header('Location: cart.php?action=removed-all');