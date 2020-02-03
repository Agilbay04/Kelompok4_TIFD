<?php require_once "assets/includes/header.php";?>
<?php $_SESSION['current_page'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";?>

    <!-- Header Start -->
    <header class="py-5 px-5 header-about mb-4">
        <!-- Container Start -->
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <h1 class="display-4 text-white text-shadow-black mb-4"> Rizquina Laptop </h1>
                    <p class="lead text-white text-shadow-black w-50 text-justify">
                        Solusi untuk masalah laptop anda, melayani servis laptop, jual beli laptop bekas,
                        jual beli aksesoris laptop, dan lainnya.
                    </p>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </header>
    <!-- Header End -->
    <!-- Page Content Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5">
                <h2> Layanan Jasa Kami </h2>
                <hr>
                <p class="text-justify">
                    Kami pihak <strong>Rizquina Laptop</strong> menyediakan jasa dan layanan
                    servis laptop, jual beli laptop bekas, jual beli aksesoris laptop, rental kamera,
                    rental playstation, dan servis barang elektronik. <strong> Rizquina Laptop </strong>
                    memberikan solusi kepada anda apabila memiliki permasalahan mengenai laptop seperti
                    laptop hang, laptop sering mengalami <em>blue screen</em>, keyboard laptop tidak merespon,
                    dan permasalahan lainnya.
                </p>
                <p class="text-justify">
                    <strong> Rizuina Laptop </strong> juga bersedia membeli laptop bekas anda dengan harga yang sesuai
                    karena bagi kami selalu ada peluang dalam setiap barang, apabila anda membutuhkan aksesoris laptop
                    baik bekas maupun baru, kami memiliki persediaan. Kami juga menyediakan jasa <em>upgrade</em>
                    laptop anda seperti tambah <em>RAM</em> atau memasang <em>Hardisk</em> baru.
                </p>
            </div>
            <div class="col-md-4 mb-5" id="kontak">
                <h2> Kontak Kami </h2>
                <hr>
                <address>
                    <strong> Rizquina Laptop </strong>
                    <br>
                    <p class="m-0 w-75 text-justify">
                        Jl. Mastrip, Krajan Timur, Kec. Sumbersari,
                        Kabupaten Jember, Jawa Timur 68121
                    </p>
                    <br>
                    <p> Contact Person : <strong>+6282584541237</strong> </p>
                    <p> WhatsApp : <strong>+628254541237</strong> </p>
                    <p> Instagram : <strong>@rizquina_laptop_official</strong> </p>
                    <p> Facebook : <strong>Rizquina Laptop</strong> </p>
                </address>
            </div>
        </div>
        <hr class="w-100">
        <!-- Jasa Layanan Start -->
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <img src="assets/images/laptop_service.jpg" alt="Service Image" class="card-img-top mb-2">
                    <div class="card-body">
                        <h4 class="card-title"> Service Laptop </h4>
                        <p class="card-text text-justify">
                            Kami menyediakan jasa servis laptop di toko kami.
                            Kami mengedepankan kepuasan konsumen dengan memberikan pelayanan terbaik.
                            Seluruh permasalahan laptop siap kami tangani.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#kontak" class="btn btn-block btn-outline-primary" role="button"> Kontak Kami </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <img src="assets/images/laptop_trading.jpg" alt="Service Image" class="card-img-top mb-2">
                    <div class="card-body">
                        <h4 class="card-title"> Jual Beli Laptop Bekas </h4>
                        <p class="card-text text-justify">
                            Kami menyediakan jasa jual beli laptop bekas di toko kami.
                            Anda mau ganti laptop tapi bingung dengan laptop lama anda ?
                            Jangan khawatir ada kami yang siap memberikan penawaran terbaik.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#kontak" class="btn btn-block btn-outline-primary" role="button"> Kontak Kami </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <img src="assets/images/laptop_accesory.jpg" alt="Service Image" class="card-img-top mb-2">
                    <div class="card-body">
                        <h4 class="card-title"> Jual Aksesoris Laptop </h4>
                        <p class="card-text text-justify">
                            Kami menyediakan jasa jual beli aksesoris laptop di toko kami.
                            Baik keyboard, mouse, headset dan segala jenis dari berbagai merk. 
                            Kami juga menyediakan RAM dan Harddisk.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#kontak" class="btn btn-block btn-outline-primary" role="button"> Kontak Kami </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jasa Layanan End -->
    </div>
    <!-- Page Content End -->

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_about.js"></script>
<?php require_once "assets/includes/footer_close.php"?>