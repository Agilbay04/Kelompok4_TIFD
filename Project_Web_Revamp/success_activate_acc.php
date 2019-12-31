<?php 
    require_once "assets/includes/header.php";
    $_SESSION['current_page'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";
?>

    <div class="container p-2">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center"> Akun anda telah di aktivasi </h1>
            </div>
            <div class="col-lg-12">
                <p class="lead text-center"> Klik tombol dibawah ini untuk kembali ke halaman utama. </p>
            </div>
            <div class="col-lg-3">
                <a href="index.php" class="btn btn-block btn-primary py-2 my-2" role="button"> Klik Disini </a>
            </div>
        </div>

    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<?php require_once "assets/includes/footer_close.php"?>