<?php 
    require_once "assets/includes/header.php";

    // require_once "assets/includes/connection.php";

    if(isset($_GET['laptop']))
    {
        $id_laptop = $_GET['laptop'];
    }else
    {
        header("Location: catalog.php?systemerror=true");
    }

    //Membuat query untuk mengambil data dari database
    $query = "select laptop.NAMA_LAPTOP, laptop.GAMBAR_LAPTOP, laptop.PROCESSOR, laptop.RAM, laptop.HARDDISK, laptop.VGA,
    laptop.UKURAN_LAYAR, laptop.SOUND_CARD, det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI, det_laptop.LAMA_GARANSI, det_laptop.stok_detail from laptop inner join det_laptop
    on laptop.ID_LAPTOP = det_laptop.ID_LAPTOP where det_laptop.ID_DET_LAPTOP = '".$id_laptop."'";

    // Menjalankan query
    $query_run = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($query_run) > 0)
    {
        
    }else
    {
        header("Location: catalog.php?systemerror=laptopnotfound");
    }

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }  

?>


    <div class="container pb-4">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4"> Catalog </h1>
                <div class="list-group">
                    <a href="#" class="list-group-item"> Asus </a>
                    <a href="#" class="list-group-item"> Lenovo </a>
                    <a href="#" class="list-group-item"> Acer </a>
                </div>
            </div>
            <div class="col-lg-9">
                <?php
                    
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                        ?>
                        
                        <div class="card mt-4">
                            <img src="assets/images/slider_medium_001.jpg" alt="header_image" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title"> <?php echo $row['NAMA_LAPTOP'];?> </h3>
                                <h4 class="text-info"> <?php echo rupiah($row['HARGA_JUAL']);?> </h4>
                                <p class="card-text">
                                    <?php
                                    
                                        if($row['STATUS_GARANSI'] == 0)
                                        {
                                            echo "Laptop ".$row['NAMA_LAPTOP'].", tidak bergaransi dengan spesifikasi : ";
                                        }else
                                        {
                                            echo "Laptop ".$row['NAMA_LAPTOP'].", bergaransi selama ".$row['LAMA_GARANSI']." dengan spesifikasi : ";
                                        }
                                    
                                    ?>
                                </p>
                                <div class="row">
                                    <div class="col-lg-4">        
                                        <ul>
                                            <li> Processor : <?php echo $row['PROCESSOR'];?> </li>
                                            <li> RAM : <?php echo $row['RAM'];?> </li>
                                            <li> VGA Card : <?php echo $row['VGA']?> </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul>
                                            <li> Harddisk : <?php echo $row['HARDDISK'];?> </li>
                                            <li> Ukuran Layar : <?php echo $row['UKURAN_LAYAR']; ?> </li>
                                            <li> Sound Card : <?php echo $row['SOUND_CARD'];?> </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                                
                                        if($row['stok_detail'] > 0)
                                        {
                                            ?>
                                                <a href="assets/includes/add_to_cart.php?laptop=<?php echo $id_laptop;?>" class="btn btn-primary px-4 py-2"> Add to Cart </a>
                                                <a href="catalog.php" class="btn btn-outline-secondary px-4 py-2"> Kembali </a>
                                            <?php
                                        }else
                                        {
                                            ?>
                                                <a href="assets/includes/add_to_cart.php?laptop=<?php echo $id_laptop;?>" class="btn btn-danger px-4 py-2 disabled"> Sold Out </a>
                                                <a href="catalog.php" class="btn btn-outline-secondary px-4 py-2"> Kembali </a>
                                            <?php
                                        }
                                
                                ?>
                            </div>
                        </div>
                        
                        <?php
                    }

                ?>
            </div>
        </div>
    </div>


<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_catalog.js"></script>
<?php require_once "assets/includes/footer_close.php"?>