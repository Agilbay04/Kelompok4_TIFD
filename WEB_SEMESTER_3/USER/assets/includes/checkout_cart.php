<?php

    session_start();

    require_once "connection.php";


    if(isset($_GET['click']))
    {
        if(isset($_SESSION['daftar_laptop']))
        {
            //Menyimpan jumlah laptop yang dibeli
            $total_laptop = count($_SESSION['daftar_laptop']);

            //Query
            //Mengambil transaksi terakhir
            $query_get_latest_transaksi = "select * from transaksi order by id_transaksi desc limit 1";

            //Menjalankan query
            $query_get_latest_do = mysqli_query($conn, $query_get_latest_transaksi);

            
            if(mysqli_num_rows($query_get_latest_do) > 0)
            {
                while($row = mysqli_fetch_assoc($query_get_latest_do))
                {
                    $id_transaksi = $row['ID_TRANSAKSI'] + 1;
                    //Membuat Query
                    $query_insert_transaksi = "insert into transaksi values('".$id_transaksi."', '".$_SESSION['ID_USER']."','".date('Y-m-d')."',0)";
                    //Menjalankan query
                    $run_query_insert = mysqli_query($conn,$query_insert_transaksi);
                    if($run_query_insert)
                    {
                        for($i = 0; $i < $total_laptop; $i++)
                        {
                            //Membuat query untuk insert laptop
                            $query_insert_laptop = "insert into detail_transaksi values('','".$id_transaksi."','".$_SESSION['daftar_laptop'][$i]."','1')";
                            
                            $run_query = mysqli_query($conn,$query_insert_laptop);

                        }
                        //Menghapus isi dari cart
                        unset($_SESSION['daftar_laptop']);

                        //Mengisi nilai pembayaran
                        $_SESSION['amount'] = $_GET['amount'];
                        
                        header("Location: ../../payment_plg.php?payment=true&idtransaksi=".$id_transaksi);
                    }else
                    {
                        header("Location: ../../checkout_plg.php?systemerror=true");
                    }
                }
            }else
            {
                $id_transaksi = 1;
                //Membuat Query
                $query_insert_transaksi = "insert into transaksi values('".$id_transaksi."', '".$_SESSION['ID_USER']."','".date('Y-m-d')."',0)";
                //Menjalankan query
                $run_query_insert = mysqli_query($conn,$query_insert_transaksi);
                if($run_query_insert)
                {
                    for($i = 0; $i < $total_laptop; $i++)
                    {
                        //Membuat query untuk insert laptop
                        $query_insert_laptop = "insert into detail_transaksi values('','".$id_transaksi."','".$_SESSION['daftar_laptop'][$i]."','1')";
                        
                        $run_query = mysqli_query($conn,$query_insert_laptop);

                    }
                    header("Location: ../../payment_plg.php?successbuy=true&idtransaksi=".$id_transaksi);
                }else
                {
                    header("Location: ../../checkout_plg.php?systemerror=true");
                }

            }

        }else
        {
            header("Location: ../../shop_cart.php?emptylaptop=true");
        }
    }else
    {
        header("Location: ../../dashboard_plg.php?accessdenied=true");
    }


?>