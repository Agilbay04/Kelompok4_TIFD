<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "../PHPMailer/src/Exception.php";
    require_once "../PHPMailer/src/PHPMailer.php";
    require_once "../PHPMailer/src/SMTP.php";

    require_once "connection.php";

    session_start();

    if(isset($_POST['registerUser']))
    {

        //Menyimpan data dari form kedalam variabel
        $namaUser = htmlspecialchars($_POST['namaUser']);
        $jkUser = htmlspecialchars($_POST['jkUser']);
        $alamatUser = htmlspecialchars($_POST['alamatUser']);
        $notelpUser = htmlspecialchars($_POST['notelpUser']);
        $emailUser = htmlspecialchars(strtolower(stripcslashes($_POST['emailUser'])));
        $passwordUser = htmlspecialchars(strtolower(stripcslashes($_POST['passwordUser'])));
        $fileUser = $_FILES['fotoProfilUser'];
        $tokenUser = uniqid();
        $url_aktivasi_akun = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/aktivasi_acc.php?token=".$tokenUser;

        //Simpan Session untuk mengisi ulang form jika user gagal mendaftar
        $_SESSION['namaUserRegister'] = $namaUser;
        $_SESSION['jkUserRegister'] = $jkUser;
        $_SESSION['alamatUserRegister'] = $alamatUser;
        $_SESSION['notelpUserRegister'] = $notelpUser;
        $_SESSION['emailUserRegister'] = $emailUser;
        $_SESSION['passwordUserRegister'] = $passwordUser;

        //Query
        $sql_select = "select * from user where email_user = '".$emailUser."'";
        $select_query = mysqli_query($conn, $sql_select);


        //Enkripsi Password
        $passwordEncrypt = password_hash($passwordUser, PASSWORD_BCRYPT);

        //Handle Foto Profile
        $fileName = $fileUser['name'];
        $fileSize = $fileUser['size'];
        $fileError = $fileUser['error'];
        $tmpName = $fileUser['tmp_name'];

        //Mengecek apakah file sukses di upload
        switch($fileError)
        {
            case 1 :
                header("Location: ../../register.php?error=fileexceed");
                exit();
            break;

            case 2 :
                header("Location: ../../register.php?error=filemaxexceed");
                exit();
            break;

            case 3 :
                header("Location: ../../register.php?error=partialupload");
                exit();
            break;

            case 4 :
                header("Location: ../../register.php?error=nofile");
                exit();
            break;

            case 6 :
                header("Location: ../../register.php?error=notempdir");
                exit();
            break;

            case 7 :
                header("Location: ../../register.php?error=failedtowrite");
                exit();
            break;

            default:
            break;
        };

        //Mengecek apakah ukuran file melewati batas
        if($fileSize > 512000)
        {
            header("Location: ../../register.php?error=fileoverload");
        }

        //Mengambil ekstensi gambar
        $ekstensiGambar = explode('.',$fileName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        //Membuat nama baru
        $fileNameNew = uniqid();
        $fileNameNew .= '.'.$ekstensiGambar;

        //Mengecek apakah user sudah terdaftar
        if(mysqli_num_rows($select_query) > 0)
        {
            header("Location: ../../register.php?error=usernameexist");
        }else
        {
            //Menginsert kedalam database
<<<<<<< HEAD
            $sql_insert = "insert into user values('','".$namaUser."','".$jkUser."','".$alamatUser."','".$notelpUser."',
=======
            $sql_insert = "insert into user values('','".$namaUser."','".$alamatUser."','".$notelpUser."',
>>>>>>> parent of 74200a1... Melakukan perubahan
            '".$emailUser."','".$passwordEncrypt."','".$fileNameNew."','".$tokenUser."',2,'".date("Y-m-d")."',0)";
            
            //Mengosongkan session jika user berhasil mendaftar
            $_SESSION['namaUserRegister'] = "";
            $_SESSION['jkUserRegister'] = "";
            $_SESSION['alamatUserRegister'] = "";
            $_SESSION['notelpUserRegister'] = "";
            $_SESSION['emailUserRegister'] = "";
            $_SESSION['passwordUserRegister'] = "";


            if(mysqli_query($conn, $sql_insert))
            {

                $mail = new PHPMailer(true);

                try
                {

                    //Konfigurasi Server
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "tugasbagoes98@gmail.com";
                    $mail->Password = "unownihsan";
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;

                    //Penerima
                    $mail->setFrom('tugasbagoes98@gmail.com','Admin');
                    $mail->addAddress($emailUser, 'Pengguna');
                    $mail->addReplyTo('noreply@rizquinastore.com','No-Reply');

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = "Aktivasi Akun";
                    $mail->Body = "<h1> Pelanggan yang terhormat. </h1>
                                   <p> Anda telah mendaftar kedalam website kami. </p>
                                   <p> Apabila anda merasa tidak melakukannya, harap abaikan email ini. </p>
                                   <p> <a href='".$url_aktivasi_akun."'> Aktivasi Akun </a> </p>                    
                                   ";
                    $mail->AltBody = "Alternative";

                    //Mengirim Email
                    if($mail->send())
                    {
                        //Mengupload Gambar
                        move_uploaded_file($tmpName, '../images/user_images/'.$fileNameNew);
                        header("Location: ../../register.php?successregister=true");
                    }else
                    {
                        header("Location: ../../register.php?error=failedtoregister");
                    }

                }catch(Exception $e)
                {
                    echo $mail->ErrorInfo;
                }
                
            }else
            {
                header("Location: ../../register.php?error=systemerror");
            }

        }

    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>