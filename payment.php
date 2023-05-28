<?php

include_once "connection.php";

$id_transaksi = $_POST['id_transaksi'];
$payment_method = $_POST['payment_method'];
$status = 2;

// update tabel transaksi dengan payment method
$sql = "UPDATE transaksi SET metode_transaksi = :metode_transaksi, status = :status  WHERE id_transaksi = :id_transaksi";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':metode_transaksi', $payment_method);
$stmt->bindParam(':id_transaksi', $id_transaksi);
$stmt->bindParam(':status', $status);
$stmt->execute();

// redirect ke index.php dengan pesan sukses
header("Location: index.php?action=payment-success");