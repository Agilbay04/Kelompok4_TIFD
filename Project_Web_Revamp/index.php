<?php require_once "assets/includes/header.php";?>
<?php $_SESSION['current_page'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].""; ?>

    <!-- Header Start -->
    <header>
        <div class="carousel slide" id="carouselHeader" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#carouselHeader" data-slide-to="0"></li>
                    <li data-target="#carouselHeader" data-slide-to="1"></li>
                    <li data-target="#carouselHeader" data-slide-to="2"></li>
                </ol>
                <div class="carousel-item active carousel-background-one">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-shadow-black"> Servis Laptop harga terjangkau ?</h3>
                        <h4 class="text-shadow-black"> Hanya disini, yuk daftar! </h4>
                    </div>
                </div>
                <div class="carousel-item carousel-background-two">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-shadow-black"> Bingung cari laptop yang sesuai dengan budget mu ? </h3>
                        <h4 class="text-shadow-black"> Jangan khawatir kami solusinya! </h4>
                    </div>
                </div>
                <div class="carousel-item carousel-background-three">
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
    </header>
    <!-- Header End --> 
    <!-- Container Start -->
    <div class="container">
        <h1 class="my-4"> Selamat datang di web kami </h1>
        <h2 class="my-4"> Jasa yang kami tawarkan </h2>
        <!-- Marketing Icon Start -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/laptop_service.jpg" alt="Service Laptop" class="card-img-top mb-2">
                    <div class="card-body">
                        <h4 class="card-title"> Service Laptop </h4>
                        <p class="card-text text-justify">
                            Kami menyediakan jasa servis laptop di toko kami.
                            Kami mengedepankan kepuasan konsumen dengan memberikan pelayanan terbaik.
                            Seluruh permasalahan laptop siap kami tangani.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="about.php#kontak" class="btn btn-block btn-outline-success" role="button"> Kontak Kami </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/laptop_trading.jpg" alt="FJB Laptop Bekas" class="card-img-top mb-2">
                    <div class="card-body">
                        <h4 class="card-title"> Jual Beli Laptop Bekas </h4>
                        <p class="card-text text-justify">
                            Kami menyediakan jasa jual beli laptop bekas di toko kami.
                            Anda mau ganti laptop tapi bingung dengan laptop lama anda ?
                            Jangan khawatir ada kami yang siap memberikan penawaran terbaik.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="about.php#kontak" class="btn btn-block btn-outline-success" role="button"> Kontak Kami </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/laptop_accesory.jpg" alt="Aksesoris Laptop" class="card-img-top mb-2">
                    <div class="card-body">
                        <h4 class="card-title"> Jual Aksesoris Laptop </h4>
                        <p class="card-text text-justify">
                            Kami menyediakan jasa jual beli aksesoris laptop di toko kami.
                            Baik keyboard, mouse, headset dan segala jenis dari berbagai merk. 
                            Kami juga menyediakan RAM dan Harddisk.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="about.php#kontak" class="btn btn-block btn-outline-success" role="button"> Kontak Kami </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Marketing Icon End -->
        <!-- Best Selling Product Start -->
        <h2 class="my-4"> Produk kami hari ini </h2>
        <div class="row">
            <?php
            
                $query = "select * from laptop inner join det_laptop on laptop.ID_LAPTOP = det_laptop.ID_LAPTOP limit 6";

                $result = mysqli_query($conn,$query);

                if($result)
                {

                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-2">
                                        <img src="assets/images/laptop_img.jpg" alt="Gambar Laptop" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title"> <?php echo $row['NAMA_LAPTOP'];?> </h4>
                                            <ul>
                                                <li> RAM : <?php echo $row['RAM'];?> </li>
                                                <li> Harddisk : <?php echo $row['HARDDISK'];?> </li>
                                                <li> Processor : <?php echo $row['PROCESSOR'];?> </li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="detail_product.php?laptop=<?php echo $row['ID_DET_LAPTOP'];?>" class="btn btn-primary btn-block" role="button"> Read More </a>
                                                </div>
                                                <div class="col-6">
                                                    <?php
                                                    
                                                        if($row['stok_detail'] > 0)
                                                        {
                                                            ?>
                                                                <a href="assets/includes/add_to_cart.php?laptop=<?php echo $row['ID_DET_LAPTOP'];?>" class="btn btn-outline-secondary btn-block" role="button"> Add to Cart </a>
                                                            <?php
                                                        }else
                                                        {
                                                            ?>
                                                                <a href="#" class="btn btn-danger disabled"> Sold Out </a>
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
                    }else
                    {
                        header("Location: index.php?laptop=notfound");
                    }

                }else
                {
                    header("Location: index.php?systemerror=true");
                }
            
            ?>
        </div>
        <!-- Best Selling Product End -->
        <!-- Store Little Info Start -->
        <div class="row">
            <div class="col-lg-6">
                <h2 class="my-4"> Mengenai Kami </h2>
                <p> Selain layanan diatas, kami juga menyediakan : </p>
                <ul>
                    <li> Rental Kamera </li>
                    <li> Rental PlayStation 2 & 4 </li>
                    <li> Percetakan </li>
                    <li> Servis Barang Elektronik </li>
                </ul>
                <p class="text-justify">
                    Jangan lupa berkunjung ke toko kami di Jalan Mastrip, Krajan Timur,
                    Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121. Sebelah utara Politeknik Negeri Jember.
                </p>
            </div>
            <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.407515058592!2d113.72122251424452!3d-8.16163309412542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69550887e2e0f%3A0x792c6ac3f050072f!2sRizquina%20Laptop!5e0!3m2!1sid!2sid!4v1574066888478!5m2!1sid!2sid" class="w-100 h-100" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
        <!-- Store Little Info End -->
        <hr class="w-100">
        <!-- CTA Start -->
        <div class="row mb-2">
            <div class="col-lg-6">
                <h3> Jangan lupa kontak kami juga ya! </h3>
            </div>
            <div class="col-lg-6">
                <a href="about.php#kontak" class="btn btn-block btn-secondary"> Kontak Kami </a>
            </div>
        </div>
        <!-- CTA End -->
    </div>
    <!-- Container End -->

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_home.js"></script>
<?php require_once "assets/includes/footer_close.php"?>