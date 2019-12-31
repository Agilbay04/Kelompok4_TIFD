<?php

    require_once "assets/includes/header_dashboard_plg.php";

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }

    if(isset($_GET['payment']) && isset($_GET['idtransaksi']))
    {
        //Menyimpan data kedalam variabel
        $id_transaksi = $_GET['idtransaksi'];

        //Mencari apakah transaksi benar atau tidak
        //Membuat query
        $query = "select * from transaksi where ID_TRANSAKSI = ".$id_transaksi;

        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0)
        {

            //Membuat query untuk menentukan jumlah pembayaran
            $query_sum = "select sum(det_laptop.HARGA_JUAL) as total_bayar from det_laptop 
                      inner join detail_transaksi on det_laptop.ID_DET_LAPTOP = detail_transaksi.ID_DET_LAPTOP 
                      inner join transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI 
                      where transaksi.ID_TRANSAKSI = ".$id_transaksi;

            $result = mysqli_query($conn,$query_sum);


            ?>
            
            <div class="container">
                <h1 class="my-4"> Pembayaran </h1>
                <hr style="border: 2px solid black;">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="my-4 text-justify">
                            Anda dapat melakukan pembayaran dengan melakukan transfer sebesar
                            <strong><?php $row = mysqli_fetch_assoc($result); echo rupiah($row['total_bayar']);?></strong> ke salah satu nomor rekening
                            berikut : 
                        </h4>
                        <ul>
                            <li>
                                <h4> Bank BCA : 751-8389-4564 </h4>
                            </li>
                            <li>
                                <h4> Bank BRI : 788-8939-8765 </h4>
                            </li>
                            <li>
                                <h4> Bank Mandiri : 089-6554-03839 </h4>
                            </li>
                        </ul>
                        <h4 class="my-4 text-justify">
                            Setelah anda melakukan transfer, harap upload bukti transaksi kedalam
                            form berikut ini.
                        </h4>
                        <form action="assets/includes/upload_bukti_bayar.php" method="post" enctype="multipart/form-data" id="formBuktiBayar">
                            <div class="form-group my-4">
                                <label for=""></label>
                                <input type="file" name="buktiTransferUser" id="buktiTransferUser" class="form-control">
                                <div class="valid-feedback" id="validBuktiBayar"> Bagus! </div>
                                <div class="invalid-feedback" id="invalidBuktiBayar"></div>
                                <small id="fileHelper" class="form-text text-muted">
                                Ukuran file tidak boleh melebihi 500kb dan harus bertipe .jpg / .jpeg / .png
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="idTransaksiUser" value="<?php echo $id_transaksi;?>">
                            </div>
                            <div class="form-group my-4">
                                <button type="submit" class="btn btn-primary px-4 py-2" name="btnUploadBuktiBayar"> Unggah </button>
                            </div>
                        </form>
                        <button class="btn btn-outline-secondary px-4 py-2 my-4"> Tampilkan Bukti Bayar </button>
                    </div>
                </div>
            </div>
            
            <?php
        }else
        {
            header("Location: checkout_plg.php?paymenterror=notfound");
        }

    }else
    {
        header("Location: checkout_plg.php?paymenterror=notfound");
    }


?>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_checkout.js"></script>
<script src="assets/javascript/script_payment_plg.js"></script>
<?php require_once "assets/includes/footer_close.php"?>