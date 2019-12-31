<?php 
    require_once "assets/includes/header.php";
    

    //Pagination
    //Mengetahui apakah terdapat halaman atau tidak
    if(isset($_GET['halaman']))
    {
        $halaman = $_GET['halaman'];
    }else
    {
        $halaman = 1;
    }

    //Menentukan batas data yang tampil dalam 1 halaman
    $batas = 6;

    //Menentukan dari data ke berapa mulai ditampilkan
    $batas_mulai = ($halaman - 1) * $batas;

    //Mengambil data laptop dari database
    //Mengambil data laptop dari database dan dibatas
    $query_select_limit = "select laptop.ID_LAPTOP, laptop.NAMA_LAPTOP, laptop.GAMBAR_LAPTOP, laptop.PROCESSOR,
    laptop.RAM, laptop.HARDDISK, laptop.VGA, det_laptop.ID_DET_LAPTOP, det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI,
    det_laptop.LAMA_GARANSI, det_laptop.stok_detail from laptop inner join det_laptop on laptop.ID_LAPTOP = det_laptop.ID_LAPTOP LIMIT ".$batas_mulai.",".$batas;

    //Mengambil semua data laptop dari database
    $query_select_total = "select laptop.ID_LAPTOP, laptop.NAMA_LAPTOP, laptop.GAMBAR_LAPTOP, laptop.PROCESSOR,
    laptop.RAM, laptop.HARDDISK, laptop.VGA, det_laptop.ID_DET_LAPTOP, det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI,
    det_laptop.LAMA_GARANSI, det_laptop.stok_detail from laptop inner join det_laptop on laptop.ID_LAPTOP = det_laptop.ID_LAPTOP";

    //Menjalankan query total
    $do_total_query = mysqli_query($conn,$query_select_total);

    //Menentukan jumlah halaman
    $total_halaman = ceil(mysqli_num_rows($do_total_query) / $batas);

    //Menjalankan query
    if($do_query = mysqli_query($conn,$query_select_limit))
    {
        
    }else
    {
        // header("Location: index.php?systemerror=true");
    }

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }

?>


    <div class="container">
        <div class="row">
           
            <!-- Product Menu -->
            <div class="col-lg-12">
                <div class="carousel slide my-4" id="carouselHeader" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#carouselHeader" data-slide-to="0"></li>
                            <li data-target="#carouselHeader" data-slide-to="1"></li>
                            <li data-target="#carouselHeader" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-item active carousel-background-medium-one">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="text-shadow-black"> Servis Laptop harga terjangkau ?</h3>
                                <h4 class="text-shadow-black"> Hanya disini, yuk daftar! </h4>
                            </div>
                        </div>
                        <div class="carousel-item carousel-background-medium-two">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="text-shadow-black"> Bingung cari laptop dengan budget mu ? </h3>
                                <h4 class="text-shadow-black"> Jangan khawatir kami solusinya! </h4>
                            </div>
                        </div>
                        <div class="carousel-item carousel-background-medium-three">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="text-shadow-black"> Cari laptop bekas tapi berkualitas ? </h3>
                                <h4 class="text-shadow-black"> Yuk daftar dan mampir ke toko kita! </h4>
                            </div>
                        </div>
                        <a href="#carouselHeader" class="carousel-control-prev" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"> Previous </span>
                        </a>
                        <a href="#carouselHeader" class="carousel-control-next" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"> Next </span>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php
                    
                        while($row = mysqli_fetch_assoc($do_query))
                        {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-16 mb-4">
                                <div class="card h-100">
                                    <a href="">
                                        <img src="assets/images/laptop_img.jpg" alt="card-img" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href=""><?php echo $row['NAMA_LAPTOP'];?></a>
                                        </h4>
                                        <h5> <?php echo rupiah($row['HARGA_JUAL']);?> </h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> Processor : <?php echo $row['PROCESSOR'];?> </li>
                                        <li class="list-group-item"> RAM : <?php echo $row['RAM'];?> </li>
                                        <li class="list-group-item"> VGA Card : <?php echo $row['VGA'];?> </li>
                                    </ul>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-12 my-2">
                                                <a href="detail_product.php?laptop=<?php echo $row['ID_DET_LAPTOP'];?>" class="btn btn-block btn-primary" role="button"> Read More </a>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <?php 
                                                
                                                    if($row['stok_detail'] > 0)
                                                    {
                                                        ?>
                                                            <a href="assets/includes/add_to_cart.php?laptop=<?php echo $row['ID_DET_LAPTOP'];?>" class="btn btn-block btn-outline-secondary" role="button"> Add to cart </a>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                            <a href="assets/includes/add_to_cart.php?laptop=<?php echo $row['ID_DET_LAPTOP'];?>" class="btn btn-block btn-danger disabled" role="button"> Sold Out </a>
                                                        <?php
                                                    }
                                                
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    
                    ?>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <ul class="pagination my-2 col-lg-12 justify-content-center">
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
                                    <h1 class="col-lg-12 text-center">Mohon maaf, halaman yang anda akses tidak tersedia</h1>
                                    <p class="col-lg-8 text-center">Silahkan kembali menggunakan <a href="catalog.php">link</a> berikut ini</p>
                                </div>
                            <?php
                        }
                
                ?>
            </ul>
        </div>
    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_catalog.js"></script>
<?php require_once "assets/includes/footer_close.php"?>