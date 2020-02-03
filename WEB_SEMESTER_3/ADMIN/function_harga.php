<?php
    session_start();
    require 'connection.php';
    if(isset($_POST['simpan']))
    {
        $id         = htmlspecialchars($_POST["laptop"]);
        $beli       = htmlspecialchars($_POST["beli"]);
        $jual       = htmlspecialchars($_POST["jual"]);
        $garansi    = htmlspecialchars($_POST["garansi"]);
        $lama       = htmlspecialchars($_POST["lama"]);
        $tanggal    = date("Y-m-d");
            
            $insert_sql = "INSERT INTO det_laptop VALUES('','".$id."','".$beli."','".$jual."','','".$garansi."','".$lama."',1)";
            $var = mysqli_query($conn, $insert_sql);
            if($var)
            {
                header("Location: data_produk.php?result=success");
            }else
            {
                header("Location: harga_laptop.php?result=failed");
                var_dump($insert_sql);
            }    
    } else 
    {
        header("Location: harga_laptop.php");
    } 
?>
