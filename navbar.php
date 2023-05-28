<?php
// Initialize the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:white;">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" aria-current="page" href="index.php">
                <img src="https://cdn-icons-png.flaticon.com/256/753/753774.png" height="35" alt="Controller" loading="lazy" style="margin-left: 5px; margin-right: 10px;">RENTME
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01" style="flex-grow:0;">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="shop.php">
                            <img src="https://cdn-icons-png.flaticon.com/256/2611/2611162.png" height="25" alt="Shop" style="margin-left: 820px; margin-right: 8px;">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <img src="https://cdn-icons-png.flaticon.com/256/10764/10764637.png" height="25" alt="Cart" style="margin-left: 5px; margin-right: 8px;">Cart</a>
                    </li>
                    <?php
                    // check if user is logged in
                    if (isset($_SESSION['loggedin'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="https://cdn-icons-png.flaticon.com/256/2102/2102647.png" height="25" alt="Account" style="margin-left: 5px; margin-right: 8px;">Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="profile.php">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="https://cdn-icons-png.flaticon.com/256/2102/2102647.png" height="25" alt="Account" style="margin-left: 5px; margin-right: 8px;">Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="login.php">Login</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="register.php">Register</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>