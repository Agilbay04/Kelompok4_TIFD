<?php require_once "assets/includes/header.php";?>
<?php $_SESSION['current_page'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";?>

    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4"> Selamat datang di website kami </h1>
                <h2 class="my-4"> Registrasi </h2>
                <form action="assets/includes/register_plg.php" method="post" enctype="multipart/form-data" id="formRegister">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group my-4">
                                <label for="namaUser"> Nama : </label>
                                <input type="text" name="namaUser" id="namaUser" class="form-control" placeholder="Enter your name ...." value="<?php if(isset($_SESSION['namaUserRegister'])){echo $_SESSION['namaUserRegister'];}?>">
                                <div class="valid-feedback" id="validName"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidName"></div>
                            </div>
                            <div class="form-group my-4">
                                <label for="alamatUser"> Alamat : </label>
                                <textarea name="alamatUser" id="alamatUser" class="form-control w-100" placeholder="Enter your address ...."><?php if(isset($_SESSION['alamatUserRegister'])){echo $_SESSION['alamatUserRegister'];}?></textarea>
                                <div class="valid-feedback" id="validAddress"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidAddress"></div>
                            </div>
                            <div class="form-group my-4">
                                <label for="notelpUser"> No. Handphone : </label>
                                <input type="text" name="notelpUser" id="notelpUser" class="form-control" placeholder="Enter your phone number ...." value="<?php if(isset($_SESSION['notelpUserRegister'])) echo $_SESSION['notelpUserRegister'];?>">
                                <div class="valid-feedback" id="validPhoneNum"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidPhoneNum"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group my-4">
                                <label for="emailUser"> Email : </label>
                                <input type="email" name="emailUser" id="emailUser" class="form-control" placeholder="Enter your email ...." value="<?php if(isset($_SESSION['emailUserRegister'])) echo $_SESSION['emailUserRegister'];?>">
                                <div class="valid-feedback" id="validEmail"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidEmail"></div>
                            </div>
                            <div class="form-group my-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="passwordUser"> Password : </label>
                                        <input type="password" name="passwordUser" id="passwordUser" class="form-control" placeholder="Enter your password ....">
                                        <div class="valid-feedback" id="validPassword"> Bagus! </div>
                                        <div class="invalid-feedback" id="invalidPassword"></div>
                                    </div>
                                    <div class="col-6">
                                        <label for="confPasswordUser"> Confirm Password : </label>
                                        <input type="password" name="confPasswordUser" id="confPasswordUser" class="form-control" placeholder="Enter your password ....">
                                        <div class="valid-feedback" id="validConfirmPassword"> Bagus! </div>
                                        <div class="invalid-feedback" id="invalidConfirmPassword"></div>
                                    </div>
                                </div>
                                <small id="passwordHelper" class="form-text text-muted">
                                    Password harus lebih panjang dari 8 karakter dan tidak boleh melebihi 20 karakter.
                                </small>
                            </div>
                            <div class="form-group my-4">
                                <label for="selectGender"> Jenis Kelamin anda : </label>
                                <select class="form-control" name="selectGender" id="selectGender">
                                    <option value=""> Pilih berikut </option>
                                    <option value="Laki-Laki"> Laki - Laki </option>
                                    <option value="Perempuan"> Perempuan </option>
                                </select>
                                <div class="valid-feedback" id="validSelectGender"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidSelectGender"></div>
                            </div>
                            <div class="from-group my-4">
                                <label for="fotoProfilUser"> Foto Profil : </label>
                                <input type="file" name="fotoProfilUser" id="fotoProfilUser" class="form-control-file">
                                <div class="valid-feedback" id="validFotoProfile"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidFotoProfile"></div>
                                <small id="fileHelper" class="form-text text-muted">
                                    Ukuran file tidak boleh melebihi 500kb dan harus bertipe .jpg .jpeg .png
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="agreeTermsRegister" id="agreeTermsRegister" class="custom-control-input">
                                <label for="agreeTermsRegister" class="custom-control-label"> You agree with our <a href=""> Terms & Agreement </a> </label>
                                <div class="valid-feedback" id="validAgreement"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidAgreement"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-primary" name="registerUser"> Register </button>
                </form>
                <a href="" class="my-2 d-inline-block text-decoration-none"> Sudah memiliki akun ? Klik disini. </a>
            </div>
        </div>
    </div>
    <!-- Container End -->

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php"?>
<?php require_once "assets/includes/footer_javascript.php"?>
<script src="assets/javascript/script_register.js"></script>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<?php require_once "assets/includes/footer_close.php"?>
