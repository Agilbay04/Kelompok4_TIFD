<?php

    require_once "assets/includes/connection.php";

    session_start();

    if(isset($_SESSION['ID_USER']))
    {
        $id = $_SESSION['ID_USER'];
        $get_user = "select * from user where id_user = ".$id."";

    }else
    {
        header("Location: index.php?accessdenied=true");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rizquina Laptop</title>
    <link rel="stylesheet" href="assets/style/bootstrap.css">
    <link rel="stylesheet" href="assets/style/custom.css"></title>
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="index.php" class="navbar-brand font-weight-bold"> Rizquina Laptop </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapsePlg" aria-controls="navbarCollapsePlg" aria-expanded="false" aria-label="Nav Toggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapsePlg">
                <ul class="navbar-nav ml-auto">
                    <li class="navbar-item" id="linkHeaderHomeProfile">
                        <a href="index.php" class="nav-link"> Home </a>
                    </li>
                    <li class="nav-item" id="linkHeaderProfileUser">
                        <a href="dashboard_plg.php" class="nav-link"> Profile </a>
                    </li>
                    <li class="nav-item" id="linkHeaderCatalogProfile">
                        <a href="catalog.php" class="nav-link"> Catalog </a>
                    </li>
                    <li class="nav-item" id="linkHeaderProfileKeranjang">
                        <a href="shop_cart.php" class="nav-link"> Keranjang </a>
                    </li>
                    <li class="nav-item" id="linkHeaderProfileCheckout">
                        <a href="checkout_plg.php" class="nav-link"> Transaksi </a>
                    </li>
                    <li class="nav-item" id="linkHeaderProfileHistori">
                        <a href="history_buy.php" class="nav-link"> Riwayat Transaksi </a>
                    </li>
                    <li class="nav-item">
                        <a href="assets/includes/logout_plg.php" class="nav-link"> Sign Out </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

