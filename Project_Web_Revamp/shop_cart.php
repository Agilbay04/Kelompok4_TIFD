<?php
    require_once "assets/includes/header_dashboard_plg.php";

    require_once "assets/includes/connection.php";

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }
?>

        <div class="container">
            <h1 class="my-2"> Keranjang </h1>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> No. </th>
                                <th> Gambar Laptop </th>
                                <th> Nama Laptop </th>
                                <th> Processor </th>
                                <th> VGA </th>
                                <th> RAM </th>
                                <th> Harddisk </th>
                                <th> Harga </th>
                                <th> Total </th>
                                <!-- <td colspan="3"> Jumlah </td>
                                <th> Action </th> -->
                            </tr>
                        </thead>              
                        <tbody>
                            <?php
                            
                                if(isset($_SESSION['daftar_laptop']))
                                {
                                    $total_belanja = 0;
                                    for($i = 0; $i < count($_SESSION['daftar_laptop']); $i++)
                                    {
                                        //Membuat query untuk mengambil data laptop
                                        $query = "select * from laptop inner join det_laptop on laptop.ID_LAPTOP = det_laptop.ID_LAPTOP where laptop.ID_LAPTOP = ".$_SESSION['daftar_laptop'][$i];
                                
                                        //Menjalankan query
                                        $result = mysqli_query($conn,$query);
                                
                                        $row = mysqli_fetch_assoc($result);
                                        
                                        $total_belanja += $row['HARGA_JUAL'];

                                        ?>
                                            <tr class="text-center" id="">
                                                <td><?php echo $i+1;?></td>
                                                <td>
                                                    <img src="assets/includes/images/"<?php echo $row['GAMBAR_LAPTOP']; ?> alt="Gambar laptop">
                                                </td>
                                                <td><?php echo $row['NAMA_LAPTOP'];?></td>
                                                <td><?php echo $row['PROCESSOR'];?></td>
                                                <td><?php echo $row['VGA'];?></td>
                                                <td><?php echo $row['RAM'];?></td>
                                                <td><?php echo $row['HARDDISK'];?></td>
                                                <td><?php echo rupiah($row['HARGA_JUAL']);?></td>
                                                <td><?php echo rupiah($total_belanja); ?></td>
                                                <!-- <td colspan="3">
                                                    <button class="btn btn-outline-dark" onclick="decreaseQtyBeli(this)">
                                                        <span>&laquo;</span>
                                                    </button>
                                                    <span class="mx-2" id="valueLaptop<?php echo $row['ID_LAPTOP'];?>">1</span>
                                                    <button class="btn btn-outline-dark" onclick="increaseQtyBeli(this)">
                                                        <span>&raquo;</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-danger" onclick="theAjax()">
                                                        <span>&times;</span>
                                                    </button>
                                                </td> -->
                                            </tr>
                                        <?php
                                
                                    }
                                    ?>
                                        <tr>
                                            <th colspan="7" class="text-right"> Grand Total : </th>
                                            <th colspan="2" class="text-center"><?php echo rupiah($total_belanja);?></th>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                            </td> 
                                            <td class="text-center">
                                                <a href="assets/includes/clean_cart.php?click=true" class="btn btn-outline-danger"> Bersihkan </a>
                                            </td>
                                            <td class="text-center">
                                            <a href="checkout_plg.php" class="btn btn-success"> Checkout </a>
                                            </td>
                                        </tr>                                    
                                    <?php
                                }else
                                {
                                    echo "<td colspan='11' class='text-center'> Keranjang anda kosong </td>";
                                }

                            ?>
                        </tbody>      
                    </table>
                </div>
            </div>
        </div>

    

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_cart.js"></script>
<?php require_once "assets/includes/footer_close.php"?>