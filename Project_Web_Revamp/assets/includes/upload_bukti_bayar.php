<?php

    require_once "connection.php";
    
    session_start();

    if(isset($_POST['btnUploadBuktiBayar']))
    {
        //Menyimpan data kedalam variabel
        $id_user = $_SESSION['ID_USER'];
        $id_transaksi = $_POST['idTransaksiUser'];
        $file = $_FILES['buktiTransferUser'];

        //Handle foto bukti bayar
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $tmpName = $file['tmp_name'];

        //Mengecek apakah file sukses di upload
        switch($fileError)
        {
            case 1 :
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&error=fileexceed");
                exit();
            break;

            case 2 :
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&error=filemaxexceed");
                exit();
            break;

            case 3 :
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&error=partialupload");
                exit();
            break;

            case 4 :
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&error=nofile");
                exit();
            break;

            case 6 :
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&error=notempdir");
                exit();
            break;

            case 7 :
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."error=failedtowrite");
                exit();
            break;

            default:
            break;
        };

        //Mengecek apakah ukuran file melewati batas
        if($fileSize > 512000)
        {
            header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&error=fileoverload");
        }

        //Mengambil ekstensi gambar
        $fileExt = explode('.',$fileName);
        $fileExt = strtolower(end($fileExt));

        //Membuat nama file baru
        $newFileName = uniqid();
        $newFileName .= '.'.$fileExt;

        //Membuat query 
        $query = "insert into bukti_bayar values('','".$id_transaksi."','".$id_user."','".$newFileName."')";

        $result = mysqli_query($conn,$query);

        if($result)
        {
            //Membuat query untuk update
            $update_query = "update transaksi set STATUS_TRANSAKSI = '1' where ID_TRANSAKSI = '".$id_transaksi."'";

            $result_update = mysqli_query($conn,$update_query);

            if($result_update)
            {
                //Mengupload gambar
                move_uploaded_file($tmpName, '../images/user_bukti_bayar/'.$newFileName);
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&successupload=true");    
            }else
            {
                header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&systemerror=true");
            }

        }else
        {
            header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi."&systemerror=true'");
        }

    }else
    {
        header("Location: ../../dashboard_plg.php?accessdenied=true");
    }

?>