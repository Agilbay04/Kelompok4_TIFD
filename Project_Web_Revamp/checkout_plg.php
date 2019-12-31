<?php 

require_once "assets/includes/header_dashboard_plg.php";

//Format Rupiah
function rupiah($value)
{
    $hasil = "Rp. ".number_format($value,2,',','.');
    return $hasil;
}

?>



    <div class="container">
        <h1 class="my-4"> Checkout Anda </h1>
        <hr style="border: 2px solid black;">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th> No </th>
                    <th> Nama Barang </th>
                    <th> Harga </th>
                    <th> Jumlah Beli </th>
                    <th> Total </th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if(isset($_SESSION['daftar_laptop']))
                    {
                        $total_belanja = 0;
                        for($i = 0; $i < count($_SESSION['daftar_laptop']); $i++)
                        {
                            $query = "select * from laptop inner join det_laptop on laptop.ID_LAPTOP = det_laptop.ID_LAPTOP where laptop.ID_LAPTOP = ".$_SESSION['daftar_laptop'][$i];
                                
                            //Menjalankan query
                            $result = mysqli_query($conn,$query);
                    
                            $row = mysqli_fetch_assoc($result);
                            
                            $total_belanja += $row['HARGA_JUAL'];

                            ?>
                                <tr class="text-center">
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo $row['NAMA_LAPTOP'];?></td>
                                    <td><?php echo rupiah($row['HARGA_JUAL']);?></td>
                                    <td> Kosong Dulu </td>
                                    <td><?php echo rupiah($total_belanja); ?></td>
                                </tr>
                            <?php
                    
                        }
                    }else
                    {
                        ?>
                            <tr>
                                <td class="text-center font-weight-bold" colspan="5">
                                    Tidak ada barang
                                </td>
                            </tr>
                        <?php
                    }
                
                ?>
            </tbody>
        </table>
        <hr style="border: 2px solid black;">
        <div class="row my-4">
            <div class="col-lg-9">
                <h5 class="text-right"> Grand Total </h5>
            </div>
            <div class="col-lg-3">
               <?php
                    if(isset($_SESSION['daftar_laptop']))
                    {
                        ?>
                            <h5 class="text-center"><?php echo rupiah($total_belanja);?></h5>
                        <?php
                    }else
                    {
                        ?>
                             <h5 class="text-center"><?php echo rupiah("0");?></h5>
                        <?php
                    }
               ?>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-8 align-self-center">
                <h4 class="text-center"> Harap periksa kembali belanjaan anda </h4>
            </div>
            <div class="col-lg-4">
                <a href="shop_cart.php" class="btn btn-outline-danger px-4 py-3 mr-4"> Kembali </a>
                <a href="assets/includes/checkout_cart.php?click=true" class="btn btn-success px-2 py-3"> Bayar Sekarang </a>
            </div>
        </div>
    </div>


<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_checkout.js"></script>
<?php require_once "assets/includes/footer_close.php"?>