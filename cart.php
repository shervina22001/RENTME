<?php

include_once "helper.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>RENTME</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <style>
        .navbar-brand {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>

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
                $cart = $_SESSION['cart'];
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