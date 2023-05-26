<?php

include_once "connection.php";
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
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Item has been added to cart!</p>
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
        <div class="col-md-12">
            <h1 style="color: #31241E; margin-top: 30px; text-align: center;">GAME COLLECTION</h1>
        </div>
    </div>
    </div>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E;">

    <!-- Main Layout -->
    <div class="container">
        <?php
        $query = "SELECT * FROM game";
        $result = $pdo->query($query);

        ?>
        <?php if ($result->rowCount() == 0) : ?>
            <h1 style='text-align: center; margin-top: 50px;'>No games found</h1>
        <?php else : ?>
            <div class="row">
                <?php
                // jumlah item per halaman
                $item_per_page = 4;
                // halaman saat ini, diambl dari $_GET['page'], default = 1
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                // error handling: jika current_page < 1, maka current_page = 1
                if ($current_page < 1) {
                    $current_page = 1;
                }
                // jumlah total page = jumlah semua data / jumlah item per page, dibulatkan ke atas
                $total_page = ceil($result->rowCount() / $item_per_page);
                // error handling: jika current_page > total_page, maka current_page = total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                }
                // offset = jumlah item per page * (current_page - 1)
                $offset = ($current_page - 1) * $item_per_page;
                // ambil data dari database sesuai offset dan jumlah item per page
                $games = $pdo->query("SELECT * FROM game LIMIT $item_per_page OFFSET $offset")->fetchAll();
                // mengambil masing-masing game dari array $games, lalu menampilkannya
                foreach ($games as $game) :
                ?>
                    <!--Section: Products-->
                    <div class="col-lg-3">
                        <div class="card">
                            <img src="img/<?= $game['img_game']; ?>" class="card-img-top" alt="<?= $game['nama_game']; ?>" style="object-fit:contain;">
                            <div class="card-body">
                                <h6 class="mb-3" style="text-align:center"><?= rupiah($game['harga_game']); ?></h6>
                                <div class="text-center">
                                    <!-- add to cart -->
                                    <a href="add_to_cart.php?id=<?= $game['kd_game']; ?>" class="btn btn-brown" style="background-color: #D1C8C1;">ADD TO CART</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <!--Section: Products-->

        <!-- Pagination -->
        <nav class="my-4">
            <ul class="pagination pagination-circle justify-content-center">
                <?php
                // jika current_page > 1, maka tombol Previous ditampilkan
                if ($current_page > 1) :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="shop.php?page=<?= $current_page - 1; ?>">Previous</a>
                    </li>
                <?php endif ?>
                <?php
                // menampilkan nomor-nomor halaman
                for ($i = 1; $i <= $total_page; $i++) :
                ?>
                    <?php
                    // tambahkan class active jika current_page = $i
                    if ($i == $current_page) :
                    ?>
                        <li class="page-item active"><a class="page-link" href="shop.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php continue ?>
                    <?php endif ?>
                    <li class="page-item"><a class="page-link" href="shop.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor ?>
                <?php
                // jika current_page < total_page, maka tombol Next ditampilkan
                if ($current_page < $total_page) :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="shop.php?page=<?= $current_page + 1; ?>">Next</a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    </main>

</body>

<?php include_once "scripts.php" ?>

<script>
    const myModal = new mdb.Modal(document.getElementById('modal'))
    if (window.location.search == '?action=added') {
        // show modal
        myModal.show()
    }
</script>

</html>