<?php

    session_start();

    require_once "connection.php";

    if(isset($_POST['loginPelanggan']))
    {
        //Mengetahui halaman saat ini
        $curPage = $_SESSION['current_page'];

        //Menyimpan data dalam variabel
        $emailPelanggan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['emailLogin']));
        $passwordPelanggan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['passwordLogin']));

        //Query
        $select_query = "select * from user where email_user = '".$emailPelanggan."'";
        $result = mysqli_query($conn, $select_query);

        //Proses Login
        if($result)
        {
            //Mengecek apakah ada data ditemukan
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);

                if(password_verify($passwordPelanggan, $row['PASSWORD_USER']))
                {
                    if($row['STATUS_AKTIVASI'] == 0)
                    {
                        header("Location: ".$curPage."?activestatus=false");
                    }else
                    {
                        //Memberikan status login berhasil
                        $_SESSION['login'] = true;
                        print_r($row);
                        $_SESSION['ID_USER'] = $row['ID_USER'];
                        $_SESSION['NAMA_USER'] = $row['NAMA_USER'];
                        $_SESSION['JENIS_KELAMIN'] = $row['JENIS_KELAMIN'];
                        $_SESSION['ALAMAT_USER'] = $row['ALAMAT_USER'];
                        $_SESSION['NO_HP_USER'] = $row['NO_HP_USER'];
                        $_SESSION['TANGGAL_DAFTAR'] = $row['TANGGAL_DAFTAR'];
                        $_SESSION['EMAIL_USER'] = $row['EMAIL_USER'];
                        $_SESSION['FOTO_PROFIL_USER']= $row['FOTO_PROFIL_USER'];
                        $_SESSION['HAK_AKSES_USER'] = $row['HAK_AKSES_USER'];

                        //Apabila ingat saya atau remember me dicentang
                        if(isset($_POST['checkRememberMe']))
                        {
                            //Menyimpan session login kedalam cookie
                            setcookie('logEmailPelanggan', $row['EMAIL_USER'], time() + 60);
                        }

                        header("Location: ".$curPage."?login=success");
                    }

                }else
                {
                    header("Location: ".$curPage."?wrongpassword=true");
                }

            }else
            {
                header("Location: ".$curPage."?usernotfound=true");
            }   

        }else
        {
            header("Location: ".$curPage."?errorlogin=system");
        }


    }else
    {
        header("Location: ".$curPage."?error=access");
    }

?>