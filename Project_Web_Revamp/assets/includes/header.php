<?php
    session_start();
    require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Rizquina Laptop </title>
    <link rel="stylesheet" href="assets/style/bootstrap.css">
    <link rel="stylesheet" href="assets/style/custom.css">
</head>
<body class="bg-light">
    
    <!-- Bismillah -->
    <!-- Sinau Elene Dungane -->

    <!-- Nav Start -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand font-weight-bold"> Rizquina Laptop </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle Nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="linkHeaderHome">
                        <a href="index.php"  class="nav-link"> Home </a>
                    </li>
                    <li class="nav-item" id="linkHeaderAbout">
                        <a href="about.php" class="nav-link"> About </a>
                    </li>
                    <li class="nav-item" id="linkHeaderBlog">
                        <a href="blog.php" class="nav-link"> Blog </a>
                    </li>
                    <li class="nav-item" id="linkHeaderCatalog">
                        <a href="catalog.php" class="nav-link"> Catalog </a>
                    </li>
                    <hr class="bg-light d-block d-md-none w-100">
                    <?php
                    
                        if(!isset($_SESSION['login']))
                        {
                            echo "<li class='nav-item'>";
                                echo "<a href='#modalLogin' class='nav-link' role='button' data-toggle='modal'> Login </a>";
                            echo "</li>";
                            echo "<li class='nav-item' id='linkHeaderRegister'>";
                                echo "<a href='register.php' class='nav-link'> Register </a>";
                            echo "</li>";
                        }else
                        {
                            echo "<li class='nav-item active dropdown'>";
                                echo "<a href='#' class='nav-link text-decoration-none dropdown-toggle' id='dropdownMenuPelanggan' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Selamat Datang, ".$_SESSION['NAMA_USER']." </a>";
                                echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuPelanggan'>";
                                    echo "<a class='dropdown-item' href='dashboard_plg.php'> Dashboard </a>";
                                    echo "<a class='dropdown-item' href='shop_cart.php'> Keranjang </a>";
                                    echo "<hr>";
                                    echo "<a class='dropdown-item' href='assets/includes/logout_plg.php'> Logout </a>";
                                echo "</div>";
                            echo "</li>";
                        }
                    
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav End -->