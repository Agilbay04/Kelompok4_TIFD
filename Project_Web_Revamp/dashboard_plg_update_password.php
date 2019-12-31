<?php require_once "assets/includes/header_dashboard_plg.php"; ?>


    <div class="container p-2">
        <h1 class="text-center"> Ubah Password </h1>
        <div class="row justify-content-center my-4">    
            <form action="assets/includes/func_update_pass.php" method="post" id="formResetPassword" class="col-lg-4">
                <div class="form-group">
                    <label for="resetPassword"> Masukkan Password Baru : </label>
                    <input type="password" name="resetPassword" id="resetPassword" class="form-control" placeholder="Masukkan Password Baru ...">
                    <div class="valid-feedback" id="validResetPassword"> Bagus! </div>
                    <div class="invalid-feedback" id="invalidResetPassword"></div>
                </div>
                <div class="form-group">
                    <label for="confirmResetPassword"> Konfirmasi Password Baru : </label>
                    <input type="password" name="confirmResetPassword" id="confirmResetPassword" class="form-control" placeholder="Konfirmasi Password Baru ...">
                    <div class="valid-feedback" id="validConfResetPassword"> Bagus! </div>
                    <div class="invalid-feedback" id="invalidConfResetPassword"></div>
                </div>
                <button type="submit" class="btn btn-block btn-outline-primary" name="resetPass"> Ubah Password </button>
                <button type="submit" class="btn btn-block btn-outline-secondary" name="cancelResetPass"> Batal Ubah </button>
            </form>
        </div>
    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<?php require_once "assets/includes/footer_close.php"?>