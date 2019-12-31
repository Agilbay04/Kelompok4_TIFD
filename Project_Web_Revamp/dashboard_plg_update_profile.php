<?php require_once "assets/includes/header_dashboard_plg.php"?>
<?php
    //Mengambil data user
    $query = mysqli_query($conn, $get_user);

    //Memeriksa apakah query berjalan
    if($query)
    {
        //Memeriksa apakah data lebih dari 0
        if(mysqli_num_rows($query) > 0)
        {
            //Mengambil data user
            $fetch = mysqli_fetch_assoc($query);

        }else
        {
            header();
        }
    }else
    {
        header();
    }

?>

    <div class="container">
        <div class="row my-2">
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <img src="assets/images/user_images/<?php echo $fetch['FOTO_PROFIL_USER'];?>" alt="" class="rounded w-100 image-object-fit">
            </div>
            <div class="col-lg-8">
                <h3 class="my-2"> Profile User </h3>
                <form method="post" id="formProfileUpdateUser" action="assets/includes/update_profile_user.php">
                    <div class="form-group">
                        <label for="namaUserProfile" class="font-weight-bold"> Nama User  </label>
                        <input type="text" name="namaUserProfile" id="namaUserProfile" class="form-control" value="<?php echo $fetch['NAMA_USER'];?>" placeholder="Enter your name ...." >
                        <div class="valid-feedback" id="validUpdateNama">Bagus!</div>
                        <div class="invalid-feedback" id="invalidUpdateNama"></div>
                    </div>
                    <div class="form-group">
                        <label for="alamatUserProfile" class="font-weight-bold"> Alamat User </label>
                        <textarea name="alamatUserProfile" id="alamatUserProfile" class="form-control" ><?php echo $fetch['ALAMAT_USER'];?></textarea>
                        <div class="valid-feedback" id="validUpdateAlamat">Bagus!</div>
                        <div class="invalid-feedback" id="invalidUpdateAlamat"></div>
                    </div>
                    <div class="form-group">
                        <label for="notelpUserProfile" class="font-weight-bold"> No. Handphone </label>
                        <input type="text" name="notelpUserProfile" id="notelpUserProfile" class="form-control" value="<?php echo $fetch['NO_HP_USER'];?>" placeholder="Enter your phone number...." >
                        <div class="valid-feedback" id="validUpdateNotelp">Bagus!</div>
                        <div class="invalid-feedback" id="invalidUpdateNotelp"></div>
                    </div>
                    <div class="form-group">
                        <label for="emailUserProfile" class="font-weight-bold"> Email User </label>
                        <input type="text" name="emailUserProfile" id="emailUserProfile" class="form-control" value="<?php echo $fetch['EMAIL_USER'];?>" placeholder="Enter your email...." disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggalDaftarUser" class="font-weight-bold"> Tanggal Terdaftar </label>
                        <input type="text" name="tanggalDaftarUser" id="tanggalDaftarUser" class="form-control" value="<?php echo $fetch['TANGGAL_DAFTAR'];?>" placeholder="Enter your date here..." disabled>
                    </div>
                    <div class="row">
                        <div class="col-lg-auto col-sm-6">
                            <button class="btn btn-block mb-4 btn-primary" name="saveUpdateProfile"> Simpan Perubahan </button>
                        </div>
                        <div class="col-lg-auto col-sm-6">
                            <button class="btn btn-block mb-4 btn-outline-secondary" name="cancelUpdateProfile"> Batal Merubah </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_dashboard_profile_update.js"></script>
<?php require_once "assets/includes/footer_close.php"?>