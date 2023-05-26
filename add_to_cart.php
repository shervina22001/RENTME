<?php

include_once "connection.php";

session_start();

$game_id = $_GET['id'];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$query = "SELECT * FROM game WHERE kd_game = '$game_id'";
$result = $pdo->query($query)->fetch(PDO::FETCH_ASSOC);

if (!isset($cart[$game_id])) {
  $cart[$game_id] = array(
    'id' => $result['kd_game'],
    'nama' => $result['nama_game'],
    'harga' => $result['harga_game'],
    'img' => $result['img_game']
  );
}

$_SESSION['cart'] = $cart;

header('Location: shop.php?action=added');
