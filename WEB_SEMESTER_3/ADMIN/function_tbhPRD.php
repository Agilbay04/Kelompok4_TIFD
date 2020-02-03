<?php
    require 'connection.php';

    if(isset($_POST['simpan']))
    {
        $nama       = htmlspecialchars($_POST["nama"]);
        $fotoPRD    = upload();
        $processor  = htmlspecialchars($_POST["processor"]);
        $ram        = htmlspecialchars($_POST["ram"]);
        $harddisk   = htmlspecialchars($_POST["harddisk"]);
        $vga        = htmlspecialchars($_POST["vga"]);
        $layar      = htmlspecialchars($_POST["layar"]);
        $sound      = htmlspecialchars($_POST["sound"]);
        $stok       = 0;
        // $tanggal    = date("Y-m-d H:i:s");

        if(!$fotoPRD) {
            return false;
        }
            // insert data ke database
            $insert_sql = "INSERT INTO laptop VALUES('','".$fotoPRD."','".$nama."','".$processor."','".$ram."','".$harddisk."','".$vga."','".$layar."','".$sound."','')";            
            $var = mysqli_query($conn, $insert_sql);
            var_dump($insert_sql);
            if($var == true)
            {
                header("Location: data_produk.php?message=success");
            }else
            {
                header("Location: tambah_produk.php?message=failed");
            }       
    } else 
    {
        header("Location: tambah_produk.php");
    }
    
    // function upload foto profil admin
    function upload() {
        $namaFile   = $_FILES['fotoPRD']['name'];
        $ukuranFile = $_FILES['fotoPRD']['size'];
        $error      = $_FILES['fotoPRD']['error'];
        $tmpName    = $_FILES['fotoPRD']['tmp_name'];
    
        // cek apakah tidak ada gambar yang di upload
        if($error === 4){
            header("Location: tambah_produk.php?upload=nothing");
        } else
        {
            header("Location: tambah_produk.php?upload=right");
        }
    
        // cek apakah itu upload gambar atau bukan
        $ekstensiGambarValid  = ['jpg', 'jpeg', 'png', 'svg'];
        $ekstensiGambar       = explode('.', $namaFile);
        $ekstensiGambar       = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang anda upload bukan Gambar');
                </script>";
            return false;
            }
    
        // cek jika ukuran gambar terlalu besar
        if($ukuranFile > 1000000) {
            echo "<script>
                    alert('Ukuran Gambar terlalu besar, maksimal 1 Mb');
                </script>";
            return false;
        }
    
        // lolos pengecekan, gambar siap upload
        // generate nama baru
        $namaFileBaru  = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    } 
?>
