<?php

    session_start();
    
    require_once "connection.php";

    if(isset($_POST['saveUpdateProfile']))
    {
        //Menyimpan data kedalam variabel
        $id_user = $_SESSION['ID_USER'];
        $namaUser = htmlspecialchars(stripcslashes($_POST['namaUserProfile']));
        $genderUser = htmlspecialchars(stripcslashes($_POST['genderUserProfile']));
        $alamatUser = htmlspecialchars(stripcslashes($_POST['alamatUserProfile']));
        $notelpUser = htmlspecialchars(stripcslashes($_POST['notelpUserProfile']));

        //Query
        $query = "update user set nama_user = '".$namaUser."', jenis_kelamin = '".$genderUser."', alamat_user = '".$alamatUser."', no_hp_user = '".$notelpUser."' where id_user = ".$id_user;

        //Jalankan Query
        if(mysqli_query($conn, $query))
        {
            header("Location: ../../dashboard_plg.php?successupdate=true");
        }else
        {
            header("Location: ../../dashboard_plg.php?error=failed");
        }


    }else if(isset($_POST['cancelUpdateProfile']))
    {
        header("Location: ../../dashboard_plg.php");
    }else
    {
        header("Location: ../../index.php?accessdenied=true");
    }

?>