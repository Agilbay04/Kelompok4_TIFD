<?php

    require_once "connection.php";

    session_start();

    if(isset($_POST['resetPass']))
    {

        //Menyimpan data kedalam variabel
        $id_user = $_SESSION['ID_USER'];
        $passwordBaru = $_POST['resetPassword'];
        
        //Mengenkripsi password
        $passwordEncrypt = password_hash($passwordBaru, PASSWORD_BCRYPT);

        //Query untuk ubah password
        $query = "update user set password_user = '".$passwordEncrypt."' where id_user = ".$id_user;

        //Menjalankan query
        if(mysqli_query($conn, $query))
        {
            header("Location: ../../dashboard_plg.php?updatepass=true");
        }else
        {
            header("Location: ../../dashboard_plg.php?error=failed");
        }

    }else if(isset($_POST['cancelResetPass']))
    {
        header("Location: ../../dashboard_plg.php");
    }else
    {
        header("Location: ../../index.php?accessdenied-true"); 
    }

?>