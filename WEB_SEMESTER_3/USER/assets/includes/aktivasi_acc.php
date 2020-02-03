<?php

    require_once "connection.php";

    if(isset($_GET['token']))
    {

        //Menyimpan data kedalam variabel
        $tokenUser = $_GET['token'];
        
        //Query
        $query_aktivasi = "update user set status_aktivasi = 1 where token_user = '".$tokenUser."'";
        $query_hapus_token = "update user set token_user = '' where token_user = '".$tokenUser."'";

        //Mengaktifkan akun
        if(mysqli_query($conn, $query_aktivasi))
        {
            //Menghapus token aktivasi
            if(mysqli_query($conn, $query_hapus_token))
            {
                header("Location: ../../success_activate_acc.php?success=true");
            }else
            {
                header("Location: ../../index.php?error=failedtoreset");
            }
        }else
        {
            header("Location: ../../index.php?error=failedtoactivate");
        }


    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>