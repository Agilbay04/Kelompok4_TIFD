<?php

    session_start();

    if(isset($_GET['click']))
    {
        if(isset($_SESSION['daftar_laptop']))
        {
            //Menghapus isi dari cart
            unset($_SESSION['daftar_laptop']);

            //Mengecek apakah berhasil dihapus
            if(isset($_SESSION['daftar_laptop']))
            {   
                header("Location: ../../catalog.php?errorsystem=true");
            }else
            {
                header("Location: ../../shop_cart.php?emptylist=true");
            }
        }else
        {
            header("Location: ../../catalog.php?emptylaptop=true");
        }
    }else
    {
        header("Location: ../../catalog.php?accessdenied=true");
    }

?>