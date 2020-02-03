<?php 

    require_once "assets/includes/header.php";

    $_SESSION['current_page'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";


    //Pagination
    //Mengetahui apakah terdapat halaman atau tidak
    if(isset($_GET['halaman']))
    {
        $halaman = $_GET['halaman'];
    }else
    {
        $halaman = 1;
    }

    //Menentukan batas data yang akan ditampilkan
    $batas = 3;

    //Menentukan dari data ke berapa mulai ditampilkan
    $batas_mulai = ($halaman - 1) * $batas;

    //Mengambil data postingan dari database
    //Mengambil data postingan dari database dengan batas
    $query_limit = "select * from posting inner join user on posting.ID_USER = user.ID_USER limit $batas_mulai,$batas";
    //Mengambil seluruh data postingan dari database
    $query_total = "select * from posting";

    //Menjalankan query total postingan
    $total_query = mysqli_query($conn,$query_total);

    //Menjalankan query postingan terbatas
    $total_halaman = ceil(mysqli_num_rows($total_query) / $batas);

    //Mengubah tanggal format 2019-12-30 menjadi 2019 Desember 30
    function convertTanggal($value)
    {
        $rawFirst = explode('-',$value);

        switch($rawFirst[1])
        {
            case 1 :
                return $rawFirst[2]." Januari ".$rawFirst[0];
            break;

            case 2 :
                return $rawFirst[2]." Februari ".$rawFirst[0];
            break;

            case 3 :
                return $rawFirst[2]." Maret ".$rawFirst[0];
            break;

            case 4 :
                return $rawFirst[2]." April ".$rawFirst[0];
            break;

            case 5 :
                return $rawFirst[2]." Mei ".$rawFirst[0];
            break;

            case 6 :
                return $rawFirst[2]." Juni ".$rawFirst[0];
            break;

            case 7 :
                return $rawFirst[2]." Juli ".$rawFirst[0];
            break;

            case 8 :
                return $rawFirst[2]." Agustus ".$rawFirst[0];
            break;

            case 9 :
                return $rawFirst[2]." September ".$rawFirst[0];
            break;

            case 10 :
                return $rawFirst[2]." Oktober ".$rawFirst[0];
            break;

            case 11 :
                return $rawFirst[2]." November ".$rawFirst[0];
            break;

            case 12 :
                return $rawFirst[2]." Desember ".$rawFirst[0];
            break;

        }

    }

    //Menjalankan query
    if($do_query = mysqli_query($conn,$query_limit))
    {

    }else
    {

    }


?>

    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries -->
            <div class="col-md-8">
                <h1 class="my-4">
                    Selamat datang di blog kami
                    <small>
                        Selamat menikmati
                    </small>
                </h1>
                <?php
                
                    if(mysqli_num_rows($do_query) > 0)
                    {
                        while($row = mysqli_fetch_assoc($do_query))
                        {
                            ?>
                                <div class="card mb-4">
                                    <img src="assets/images/slider-001.jpg" alt="Post Image" class="card-img-top">
                                    <div class="card-body">
                                        <h2 class="card-title"> <?php echo $row['JUDUL_POSTING'];?> </h2>
                                        <p class="card-text text-justify">
                                            <?php
                                            
                                                if(strlen($row['ISI_POSTING']) > 225)
                                                {
                                                    echo substr($row['ISI_POSTING'],0,225)." ...";
                                                }else
                                                {
                                                    echo $row['ISI_POSTING'];
                                                }

                                            ?>
                                        </p>
                                        <a href="detail_post.php?posting=<?php echo $row['ID_POSTING'];?>" class="btn btn-outline-primary"> Read More </a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Oleh <a href=""><?php echo $row['NAMA_USER']?></a>, <?php echo convertTanggal($row['TANGGAL_POSTING']) ;?>.
                                    </div>
                                </div>
                            <?php
                        }

                        ?>
                            <!-- Pagination -->
                            <ul class="pagination justify-content-center mb-4">
                            <?php

                                if($halaman >= 1 && $halaman <= $total_halaman)
                                {

                                    if($halaman == 1)
                                    {
                                        ?>
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link" aria-label="previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        <?php
                                    }else
                                    {
                                        ?>
                                            <li class="page-item">
                                                <a href="?halaman=<?php echo $halaman - 1;?>" class="page-link" aria-label="previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        <?php
                                    }

                                    for($i = 1; $i <= $total_halaman; $i++)
                                    {
                                        if($i == $halaman)
                                        {
                                            ?> <li class="page-item active"><a href="?halaman=<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li><?php
                                        }else
                                        {
                                            ?> <li class="page-item"><a href="?halaman=<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li><?php
                                        }
                                    }

                                    if($halaman == $total_halaman)
                                    {
                                        ?>
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link" aria-label="next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        <?php
                                    }else
                                    {
                                        ?>
                                            <li class="page-item">
                                                <a href="?halaman=<?php echo $halaman+1;?>" class="page-link" aria-label="next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        <?php
                                    }

                                }else
                                {
                                    ?>
                                        <div class="row justify-content-center">
                                            <h1 class="col-lg-12 text-center">Mohon maaf, konten yang anda akses tidak tersedia</h1>
                                            <p class="col-lg-8 text-center">Silahkan kembali menggunakan <a href="blog.php">link</a> berikut ini</p>
                                        </div>
                                    <?php
                                }

                            ?>
                            </ul>
                        <?php
                    }else
                    {
                        ?>
                            <div class="row justify-content-center">
                                <h1 class="col-lg-12 text-center my-4">Mohon maaf, halaman yang anda akses tidak tersedia</h1>
                                <p class="col-lg-8 text-center my-4">Silahkan kembali menggunakan <a href="index.php">link</a> berikut ini</p>
                            </div>
                        <?php
                    }
                
                ?>
                
            </div>
            <!-- Sidebar Widgets -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Search </h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for ...">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary"> Go! </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Category Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Category </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href=""> Bisnis </a>
                                    </li>
                                    <li>
                                        <a href=""> Komputer </a>
                                    </li>
                                    <li>
                                        <a href=""> Gadget </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href=""> Laptop </a>
                                    </li>
                                    <li>
                                        <a href=""> Keyboard </a>
                                    </li>
                                    <li>
                                        <a href=""> Graphic Card</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Widget -->
                <div class="card my-4">
                    <h5 class="card-header"> Sidebar Widget </h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your e-mail ...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary"> Subscribe </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End --> 

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_blog.js"></script>
<?php require_once "assets/includes/footer_close.php"?>