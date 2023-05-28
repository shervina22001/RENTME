<?php

include_once "connection.php";
include_once "helper.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Congrats!</h5>
                    <button type="button" class="btn btn-brown btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-black" data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <?php include_once "navbar.php" ?>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">

    <!-- Backgroud -->
    <div class="scaled-down" style="height: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: #31241E; text-align: center;">CART</h1>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <a href="remove_all_from_cart.php" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete All</a>
            </div>
        </div>
    </div>

    <table class="table container" style="margin-top: 10px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                <th scope="col">Borrowed</th>
                <th scope="col">Returned</th>
                <th scope="col">Action</th>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right;">Total</td>
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                } else {
                    $cart = [];
                }
                foreach ($cart as $item) {
                    $total += $item['harga'];
                }
                echo "<td>" . rupiah($total) . "</td>";
                ?>
            </tr>
        </tfoot>
        </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($cart as $item) :
            ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $item['nama'] ?></td>
                    <td><?= rupiah($item['harga']) ?></td>
                    <td><?= date('d-m-Y') ?></td>
                    <td><?= date('d-m-Y', strtotime('+14 days')) ?></td>
                    <td>
                        <a href="remove_from_cart.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!--Button-->
    <div style="text-align:right">
        <div class="container">
            <div class="row">
                <div class="text-left">
                    <a href="transaction.php" class="btn btn-primary btn-lg active btn-rounded" role="button" aria-pressed="true" style="margin-top: 20px; margin-right: -20px; background-color: #D1C8C1;">CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<?php include_once "scripts.php" ?>

<script>
    const myModal = new mdb.Modal(document.getElementById('modal'))
    if (window.location.search == '?action=removed') {
        document.querySelector('.modal-body').innerHTML = 'Item removed from cart'
        myModal.show()
    } else if (window.location.search == '?action=removed-all') {
        document.querySelector('.modal-body').innerHTML = 'All items removed from cart'
        myModal.show()
    }
</script>

</html>