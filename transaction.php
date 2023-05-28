<?php

include_once "connection.php";
include_once "helper.php";

session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
}

$total = 0;
$discounted_price = 0;

// get latest transaksi that has status = 1, then get payment
$sql = "SELECT * FROM transaksi WHERE id_customer = :id_customer ORDER BY id_transaksi DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id_customer' => $_SESSION['id']]);
$transaksi = $stmt->fetch();

if ($transaksi == false || $transaksi['status'] != 1) {
    if (empty($_SESSION['cart'])) {
        header("Location: index.php");
        exit();
    }

    $cart = $_SESSION['cart'];
    foreach ($cart as $item) {
        $total += $item['harga'];
    }

    $original_price = $total;
    $discount_percentage = 10;

    $discount_amount = ($original_price / 100) * $discount_percentage;
    $discounted_price = $original_price - $discount_amount;

    // insert all from cart to peminjaman table
    $sql = "INSERT INTO peminjaman (id_customer, tgl_pinjam, tgl_kembali) VALUES (:id_customer, :tgl_pinjam, :tgl_kembali)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_customer' => $_SESSION['id'], 'tgl_pinjam' => date('Y-m-d'), 'tgl_kembali' => date('Y-m-d', strtotime('+14 days'))]);

    // get kd_peminjaman
    $sql = "SELECT kd_peminjaman FROM peminjaman WHERE id_customer = :id_customer ORDER BY kd_peminjaman DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_customer' => $_SESSION['id']]);
    $kd_peminjaman = $stmt->fetch()['kd_peminjaman'];

    // insert all from cart to dipinjam_game table
    foreach ($cart as $item) {
        $sql = "INSERT INTO dipinjam_game (kd_peminjaman, kd_game) VALUES (:kd_peminjaman, :id_game)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['kd_peminjaman' => $kd_peminjaman, 'id_game' => $item['id']]);
    }

    // empty cart
    unset($_SESSION['cart']);
    $_SESSION['cart'] = array();

    // insert into transaksi table
    $sql = "INSERT INTO transaksi (id_customer, kd_peminjaman, tgl_transaksi, status) VALUES (:id_customer, :kd_peminjaman, :tgl_transaksi, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_customer' => $_SESSION['id'], 'kd_peminjaman' => $kd_peminjaman, 'tgl_transaksi' => date('Y-m-d'), 'status' => 1]);

    // get id_transaksi
    $sql = "SELECT id_transaksi FROM transaksi WHERE id_customer = :id_customer ORDER BY id_transaksi DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_customer' => $_SESSION['id']]);
    $id_transaksi = $stmt->fetch()['id_transaksi'];

    // insert into payment table
    $sql = "INSERT INTO payment (id_transaksi, paymentTotal, subTotal, diskon) VALUES (:id_transaksi, :payment_total, :sub_total, :diskon)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_transaksi' => $id_transaksi, 'payment_total' => $discounted_price, 'sub_total' => $total, 'diskon' => $discount_amount]);
} else {
    // get id_transaksi
    $id_transaksi = $transaksi['id_transaksi'];
    // get payment with id_transaksi
    $sql = "SELECT * FROM payment WHERE id_transaksi = :id_transaksi";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_transaksi' => $id_transaksi]);
    $payment = $stmt->fetch();
    $total = $payment['subTotal'];
    $discounted_price = $payment['paymentTotal'];
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
    <!-- Navbar -->
    <?php include_once "navbar.php" ?>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">


    <!DOCTYPE html>
    <html>
    <!-- Transaction -->
    <div class="scaled-down" style="height: 50px;">
        <div class="col-md-12">
            <h1 style="color: #31241E; text-align: center;">TRANSACTION</h1>
        </div>
    </div>
    </div>

    <table class="table table-borderless container" style="margin-top: 10px; width:fit-content; background-color:#D1C8C1;">
        <tr>
            <th>Total :</th>
            <td><?= "<td>" . rupiah($total) . "</td>"; ?></td>
        </tr>
        <tr>
            <th>Discount :</th>
            <td></td>
            <td>10%</td>
        </tr>
        <tr>
            <th>Payment Total :</th>
            <td><?= "<td>" . rupiah($discounted_price) . "</td>"; ?></td>
        </tr>
    </table>

    <!-- Payment Method -->
    <div class="container" style="height: 50px; margin-top:20px;">
        <div class="col-md-12">
            <h2 style="color: #31241E; text-align: center;">PAYMENT METHOD</h2>
        </div>
    </div>
    </div>

    <table class="table table-borderless container" style="margin-top: 10px; width:fit-content; background-color:#D1C8C1;">
        <tr>
            <th>Transfer</th>
        </tr>
        <tr>
            <th>Bank :</th>
            <td>
                <form action="payment.php" method="POST" id="transaction-form">
                    <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                    <select style="background-color:transparent; border:none;" name="payment_method" required>
                        <option value="1" selected>BCA 4958749573</option>
                        <option value="2">BNI 1369957984</option>
                        <option value="3">MANDIRI 1260007111155</option>
                        <option value="4">BRI 678501028883537</option>
                    </select>
                </form>
            </td>
        </tr>
    </table>

    <!--Button-->
    <div style="text-align:right">
        <div class="container">
            <div class="row">
                <div class="text-left">
                    <button class="btn btn-primary btn-lg active btn-rounded" type="submit" form="transaction-form" aria-pressed="true" style="margin-top: 20px; margin-right: -20px; background-color: #D1C8C1;">CHECK OUT</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<?php include_once "scripts.php" ?>

</html>