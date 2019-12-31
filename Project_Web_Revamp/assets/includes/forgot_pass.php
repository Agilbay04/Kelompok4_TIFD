<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "../PHPMailer/src/Exception.php";
    require_once "../PHPMailer/src/PHPMailer.php";
    require_once "../PHPMailer/src/SMTP.php";

    require_once "connection.php";


    if(isset($_POST['lupaPassword']))
    {
        //Menyimpan data kedalam variabel
        $emailUser = htmlspecialchars(stripcslashes($_POST['lupaPasswordUser']));
        //Membuat token untuk lupa password
        $tokenUser = uniqid();
        //Query
        $query_update = "update user set token_user = '".$tokenUser."' where email_user = '".$emailUser."'";
        $query_search = "select * from user where email_user = '".$emailUser."'";
        $result = mysqli_query($conn,$query_search);

        //Url
        $url_reset_password = "http://".$_SERVER['HTTP_HOST']."/main/Git/Kelompok4_TIFD/Project_Web_Revamp/reset_pass.php?token=".$tokenUser;

        if(mysqli_num_rows($result) > 0)
        {

            if(mysqli_query($conn, $query_update))
            {

                //Inisiasi Mailer
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
                    $mail->Subject = "Reset Password";
                    $mail->Body = "<h1> Pelanggan yang terhormat. </h1>
                                   <p> Anda meminta sebuah link untuk reset password anda di website kami. </p>
                                   <p> Apabila anda merasa tidak memintanya, harap abaikan email ini. </p>
                                   <p> <a href='".$url_reset_password."'> Reset Password </a> </p>                    
                                   ";
                    $mail->AltBody = "Alternativ Load";

                    //Mengirim Email
                    $mail->send();

                    //Redirect home
                    header("Location: ../../index.php?resetpass=true");

                }catch(Exception $e)
                {
                    echo $mail->ErrorInfo;
                }

            }else
            {
                header("Location: ../../index.php?errorprocess=true");
            }

        }else
        {
            header("Location: ../../index.php?usernotfound=true");
        }


    }else
    {
        header("Location: ../../index.php?error=accessdenied");
    }

?>