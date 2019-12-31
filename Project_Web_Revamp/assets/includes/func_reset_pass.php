<?php

    require_once  "connection.php";

    if(isset($_POST['resetPass']))
    {
        //Menyimpan data kedalam variabel
        $token = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tokenUser']));
        $passwordUser = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['resetPassword']));
        $hashedPassword = password_hash($passwordUser, PASSWORD_BCRYPT);

        //Query
        $query = "update user set password_user = '".$hashedPassword."' where token_user = '".$token."'";
        //Query Hapus Token
        $query_token = "update user set token_user = '' where token_user = '".$token."'";

        //Eksekusi query
        if(mysqli_query($conn, $query))
        {

            if(mysqli_query($conn, $query_token))
            {
                header("Location: ../../index.php?resetpassword=success");
            }else
            {
                header("Location: ../../index.php?resetpassword=fail");
            }

        }else
        {
            echo "Lah kok error";
            print_r($result);
        };



    }else
    {
        header("Location: ../../index.php?access=error");
    }

?>