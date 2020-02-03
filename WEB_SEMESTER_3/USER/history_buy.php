<?php
    require_once "assets/includes/header_dashboard_plg.php";

    require_once "assets/includes/connection.php";

    //Format Rupiah
    function rupiah($value)
    {
        $hasil = "Rp. ".number_format($value,2,',','.');
        return $hasil;
    }

    //Format Transaksi
    function penjualanFormat($value)
    {
        
        if(strlen($value) == 1)
        {
            return "PNJ00".$value;
        }else if(strlen($value) == 2)
        {
            return "PNJ0".$value;
        }else if(strlen($value) == 3)
        {
            return "PNJ".$value;
        }
    }

    //Format mengubah status
    function convertStatus($value)
    {
        if($value == 0)
        {
            return "Belum Dibayar";
        }else if($value == 1)
        {
            return "Menunggu Verifikasi";
        }else if($value == 2)
        {
            return "Sudah Terverifikasi";
        }else if($value == 3)
        {
            return "Pesanan Berhasil";
        }
    }

    function convertStatusGaransi($value)
    {
        if($value == 0)
        {
            return "Tidak ada garansi";
        }else
        {
            return "Bergaransi";
        }
    }

    //Mengecek apakah ada duplikasi ID
    $late_id = '';

    //Function Duplikasi
    function setLateId($value)
    {
        $GLOBALS['late_id'] = $value;
    }

    function getLateId()
    {
        return $GLOBALS['late_id'];
    }


    //Membuat query
    $query_sudah_dibayar = "select transaksi.ID_TRANSAKSI, transaksi.TANGGAL_TRANSAKSI, transaksi.STATUS_TRANSAKSI,
    user.ID_USER,user.NAMA_USER, detail_transaksi.ID_DETAIL_TRANSAKSI, detail_transaksi.JUMLAH_BELI, laptop.ID_LAPTOP, laptop.NAMA_LAPTOP,det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI, det_laptop.LAMA_GARANSI,
    det_laptop.HARGA_JUAL
    from transaksi inner join detail_transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI
    inner join user on transaksi.ID_USER = user.ID_USER inner join det_laptop on detail_transaksi.ID_DET_LAPTOP = det_laptop.ID_DET_LAPTOP inner join laptop on det_laptop.ID_LAPTOP = laptop.ID_LAPTOP
    where user.ID_USER = ".$_SESSION['ID_USER']." and transaksi.STATUS_TRANSAKSI = 2 ORDER BY transaksi.ID_TRANSAKSI ASC";

    $query_menunggu_verifikasi = "select transaksi.ID_TRANSAKSI, transaksi.TANGGAL_TRANSAKSI, transaksi.STATUS_TRANSAKSI,
    user.ID_USER,user.NAMA_USER, detail_transaksi.ID_DETAIL_TRANSAKSI, detail_transaksi.JUMLAH_BELI, laptop.ID_LAPTOP, laptop.NAMA_LAPTOP,det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI, det_laptop.LAMA_GARANSI,
    det_laptop.HARGA_JUAL
    from transaksi inner join detail_transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI
    inner join user on transaksi.ID_USER = user.ID_USER inner join det_laptop on detail_transaksi.ID_DET_LAPTOP = det_laptop.ID_DET_LAPTOP inner join laptop on det_laptop.ID_LAPTOP = laptop.ID_LAPTOP
    where user.ID_USER = ".$_SESSION['ID_USER']." and transaksi.STATUS_TRANSAKSI = 1 ORDER BY transaksi.ID_TRANSAKSI ASC";
    
    $query_belum_dibayar = "select transaksi.ID_TRANSAKSI, transaksi.TANGGAL_TRANSAKSI, transaksi.STATUS_TRANSAKSI,
    user.ID_USER,user.NAMA_USER, detail_transaksi.ID_DETAIL_TRANSAKSI, detail_transaksi.JUMLAH_BELI, laptop.ID_LAPTOP, laptop.NAMA_LAPTOP,det_laptop.HARGA_JUAL, det_laptop.STATUS_GARANSI, det_laptop.LAMA_GARANSI,
    det_laptop.HARGA_JUAL
    from transaksi inner join detail_transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI
    inner join user on transaksi.ID_USER = user.ID_USER inner join det_laptop on detail_transaksi.ID_DET_LAPTOP = det_laptop.ID_DET_LAPTOP inner join laptop on det_laptop.ID_LAPTOP = laptop.ID_LAPTOP
    where user.ID_USER = ".$_SESSION['ID_USER']." and transaksi.STATUS_TRANSAKSI = 0 ORDER BY transaksi.ID_TRANSAKSI ASC";

    //Menjalankan query
    $run_query_verified = mysqli_query($conn,$query_sudah_dibayar);
    $run_query_not_verified = mysqli_query($conn,$query_belum_dibayar);
    $run_query_pending = mysqli_query($conn,$query_menunggu_verifikasi);

    if($run_query_verified && $run_query_not_verified && $run_query_pending)
    {
        if((mysqli_num_rows($run_query_verified) > 0) || (mysqli_num_rows($run_query_not_verified) > 0) || (mysqli_num_rows($run_query_pending) > 0))
        {
            ?>
                <div class="container">
                    <h1 class="my-4"> Histori Transaksi </h1>
                    <hr style="border: 1px solid black;">
                    <h3 class="my-4"> Transaksi sudah dibayar </h3>
                    <?php
                        if(mysqli_num_rows($run_query_verified) > 0)
                        {
                            ?>
                                <?php
                                $total_bayar = 0;
                                    while($row = mysqli_fetch_assoc($run_query_verified))
                                    {
                                        
                                        $number;
                                        if($row['ID_TRANSAKSI'] == getLateId())
                                        {
                                            $total_bayar += $row['HARGA_JUAL'];
                                            ?>
                                                <script>
                                                    var parentBody = document.getElementById("tableBody<?php echo $row['ID_TRANSAKSI'];?>");
                                                    var childRow = document.createElement("tr");

                                                    parentBody.insertBefore(childRow, parentBody.getElementsByTagName("tr")[<?php echo $number;?>]);

                                                    appendNoTransaksi(childRow);
                                                    appendKodeTransaksi(childRow);
                                                    appendTanggalTransaksi(childRow);
                                                    appendNamaLaptop(childRow);
                                                    appendJumlahBeli(childRow);
                                                    appendHarga(childRow);
                                                    appendHargaTotal(childRow);
                                                    alterHarga();


                                                   function appendNoTransaksi(value)
                                                   {
                                                        var childTableDataNoTransaksi = document.createElement("td");
                                                        value.appendChild(childTableDataNoTransaksi)
                                                        childTableDataNoTransaksi.innerText = "<?php echo $number+1;?>";
                                                   }

                                                   function appendKodeTransaksi(value)
                                                   {
                                                        var childTableDataKodePenjualan = document.createElement("td");
                                                        value.appendChild(childTableDataKodePenjualan);
                                                        childTableDataKodePenjualan.innerText = "<?php echo penjualanFormat($row['ID_TRANSAKSI']);?>";   
                                                   }

                                                   function appendTanggalTransaksi(value)
                                                   {
                                                       var childTableDataTanggalTransaksi = document.createElement("td");
                                                       value.appendChild(childTableDataTanggalTransaksi);
                                                       childTableDataTanggalTransaksi.innerText = "<?php echo $row['TANGGAL_TRANSAKSI'];?>";

                                                   }

                                                   function appendNamaLaptop(value)
                                                   {
                                                       var childTableDataNamaLaptop = document.createElement("td");
                                                       value.appendChild(childTableDataNamaLaptop);
                                                       childTableDataNamaLaptop.innerText = "<?php echo $row['NAMA_LAPTOP'];?>";
                                                   }

                                                   function appendJumlahBeli(value)
                                                   {
                                                       var childTableDataJumlahBeli = document.createElement("td");
                                                       value.appendChild(childTableDataJumlahBeli);
                                                       childTableDataJumlahBeli.innerText = "<?php echo $row['JUMLAH_BELI'];?>";
                                                   }

                                                   function appendHarga(value)
                                                   {
                                                       var childTableDataHarga = document.createElement("td");
                                                       value.appendChild(childTableDataHarga);
                                                       childTableDataHarga.innerText = "<?php echo rupiah($row['HARGA_JUAL']);?>";
                                                   }

                                                   function appendHargaTotal(value)
                                                   {
                                                       var childTableDataHargaTotal = document.createElement("td");
                                                       value.appendChild(childTableDataHargaTotal);
                                                       childTableDataHargaTotal.innerText = "<?php echo rupiah($total_bayar);?>";
                                                   }

                                                   function alterHarga()
                                                   {
                                                       var totalHarga = document.getElementById("totalBayarBody<?php echo $row['ID_TRANSAKSI'];?>");
                                                       totalHarga.innerText = "<?php echo rupiah($total_bayar);?>";
                                                   }
                                                </script>
                                            <?php
                                            $number++;    
                                        }else
                                        {
                                        
                                            $number = 1;
                                            $total_bayar = $row['HARGA_JUAL'];
                                            setLateId($row['ID_TRANSAKSI']);
                                            ?>
                                                <table class="table table-bordered table-striped table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th> No. </th>
                                                            <th> Kode Transaksi </th>
                                                            <th> Tanggal </th>
                                                            <th> Nama Laptop </th>
                                                            <th> Jumlah Beli </th>
                                                            <th> Harga </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableBody<?php echo $row['ID_TRANSAKSI']?>">
                                                        <tr>
                                                            <td> <?php echo $number;?> </td>
                                                            <td> <?php echo penjualanFormat($row['ID_TRANSAKSI']);?> </td>
                                                            <td> <?php echo $row['TANGGAL_TRANSAKSI'];?> </td>
                                                            <td> <?php echo $row['NAMA_LAPTOP'];?> </td>
                                                            <td> <?php echo $row['JUMLAH_BELI'];?> </td>
                                                            <td> <?php echo rupiah($row['HARGA_JUAL']);?> </td>
                                                            <td> <?php echo rupiah($total_bayar);?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"></td>
                                                            <td class="text-center font-weight-bold">
                                                                Grand Total :
                                                            </td>
                                                            <td id="totalBayarBody<?php echo $row['ID_TRANSAKSI'];?>"class="text-center font-weight-bold">
                                                                <?php echo rupiah($total_bayar);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"></td>
                                                            <td class="text-center font-weight-bold">
                                                                Status Transaksi :
                                                            </td>
                                                            <td class="text-center font-weight-bold">
                                                                <?php echo convertStatus($row['STATUS_TRANSAKSI']);?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php
                                        }
                                    }
                                ?>
                            <?php
                        }else
                        {
                            ?>
                                <h5 class="my-4 text-center px-2 py-4 bg-dark text-light w-25 mx-auto rounded"> Tidak ada transaksi </h5>
                            <?php
                        }
                    ?>
                    <hr style="border: 1px solid black;">
                    <h3 class="my-4"> Transaksi Menunggu Verifikasi </h3>
                    <?php
                        if(mysqli_num_rows($run_query_pending) > 0)
                        {
                            ?>
                                <?php
                                $total_bayar = 0;
                                    while($row = mysqli_fetch_assoc($run_query_pending))
                                    {
                                        
                                        $number;
                                        if($row['ID_TRANSAKSI'] == getLateId())
                                        {
                                            $total_bayar += $row['HARGA_JUAL'];
                                            ?>
                                                <script>
                                                    var parentBody = document.getElementById("tableBody<?php echo $row['ID_TRANSAKSI'];?>");
                                                    var childRow = document.createElement("tr");

                                                    parentBody.insertBefore(childRow, parentBody.getElementsByTagName("tr")[<?php echo $number;?>]);

                                                    appendNoTransaksi(childRow);
                                                    appendKodeTransaksi(childRow);
                                                    appendTanggalTransaksi(childRow);
                                                    appendNamaLaptop(childRow);
                                                    appendJumlahBeli(childRow);
                                                    appendHarga(childRow);
                                                    appendHargaTotal(childRow);
                                                    alterHarga();


                                                   function appendNoTransaksi(value)
                                                   {
                                                        var childTableDataNoTransaksi = document.createElement("td");
                                                        value.appendChild(childTableDataNoTransaksi)
                                                        childTableDataNoTransaksi.innerText = "<?php echo $number+1;?>";
                                                   }

                                                   function appendKodeTransaksi(value)
                                                   {
                                                        var childTableDataKodePenjualan = document.createElement("td");
                                                        value.appendChild(childTableDataKodePenjualan);
                                                        childTableDataKodePenjualan.innerText = "<?php echo penjualanFormat($row['ID_TRANSAKSI']);?>";   
                                                   }

                                                   function appendTanggalTransaksi(value)
                                                   {
                                                       var childTableDataTanggalTransaksi = document.createElement("td");
                                                       value.appendChild(childTableDataTanggalTransaksi);
                                                       childTableDataTanggalTransaksi.innerText = "<?php echo $row['TANGGAL_TRANSAKSI'];?>";

                                                   }

                                                   function appendNamaLaptop(value)
                                                   {
                                                       var childTableDataNamaLaptop = document.createElement("td");
                                                       value.appendChild(childTableDataNamaLaptop);
                                                       childTableDataNamaLaptop.innerText = "<?php echo $row['NAMA_LAPTOP'];?>";
                                                   }

                                                   function appendJumlahBeli(value)
                                                   {
                                                       var childTableDataJumlahBeli = document.createElement("td");
                                                       value.appendChild(childTableDataJumlahBeli);
                                                       childTableDataJumlahBeli.innerText = "<?php echo $row['JUMLAH_BELI'];?>";
                                                   }

                                                   function appendHarga(value)
                                                   {
                                                       var childTableDataHarga = document.createElement("td");
                                                       value.appendChild(childTableDataHarga);
                                                       childTableDataHarga.innerText = "<?php echo rupiah($row['HARGA_JUAL']);?>";
                                                   }

                                                   function appendHargaTotal(value)
                                                   {
                                                       var childTableDataHargaTotal = document.createElement("td");
                                                       value.appendChild(childTableDataHargaTotal);
                                                       childTableDataHargaTotal.innerText = "<?php echo rupiah($total_bayar);?>";
                                                   }

                                                   function alterHarga()
                                                   {
                                                       var totalHarga = document.getElementById("totalBayarBody<?php echo $row['ID_TRANSAKSI'];?>");
                                                       totalHarga.innerText = "<?php echo rupiah($total_bayar);?>";
                                                   }
                                                </script>
                                            <?php
                                            $number++;
                                        }else
                                        {
                                        
                                            $number = 1;
                                            $total_bayar = $row['HARGA_JUAL'];
                                            setLateId($row['ID_TRANSAKSI']);
                                            ?>
                                                <table class="table table-bordered table-striped table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th> No. </th>
                                                            <th> Kode Transaksi </th>
                                                            <th> Tanggal </th>
                                                            <th> Nama Laptop </th>
                                                            <th> Jumlah Beli </th>
                                                            <th> Harga </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableBody<?php echo $row['ID_TRANSAKSI']?>">
                                                        <tr>
                                                            <td> <?php echo $number;?> </td>
                                                            <td> <?php echo penjualanFormat($row['ID_TRANSAKSI']);?> </td>
                                                            <td> <?php echo $row['TANGGAL_TRANSAKSI'];?> </td>
                                                            <td> <?php echo $row['NAMA_LAPTOP'];?> </td>
                                                            <td> <?php echo $row['JUMLAH_BELI'];?> </td>
                                                            <td> <?php echo rupiah($row['HARGA_JUAL']);?> </td>
                                                            <td> <?php echo rupiah($total_bayar);?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"></td>
                                                            <td class="text-center font-weight-bold">
                                                                Grand Total :
                                                            </td>
                                                            <td id="totalBayarBody<?php echo $row['ID_TRANSAKSI'];?>"class="text-center font-weight-bold">
                                                                <?php echo rupiah($total_bayar);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"></td>
                                                            <td class="text-center font-weight-bold">
                                                                Status Transaksi :
                                                            </td>
                                                            <td class="text-center font-weight-bold">
                                                                <?php echo convertStatus($row['STATUS_TRANSAKSI']);?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php
                                        }
                                    }
                                ?>
                            <?php
                        }else
                        {
                            ?>
                                <h5 class="my-4 text-center px-2 py-4 bg-dark text-light w-25 mx-auto rounded"> Tidak ada transaksi </h5>
                            <?php
                        }
                    ?>
                    <hr style="border: 1px solid black;">
                    <h3 class="my-4"> Transaksi belum dibayar </h3>
                    <?php
                        if(mysqli_num_rows($run_query_not_verified) > 0)
                        {
                            ?>
                                <?php
                                $total_bayar = 0;
                                    while($row = mysqli_fetch_assoc($run_query_not_verified))
                                    {
                                        
                                        $number;
                                        if($row['ID_TRANSAKSI'] == getLateId())
                                        {
                                            $total_bayar += $row['HARGA_JUAL'];
                                            ?>
                                                <script>
                                                    var parentBody = document.getElementById("tableBody<?php echo $row['ID_TRANSAKSI'];?>");
                                                    var childRow = document.createElement("tr");

                                                    parentBody.insertBefore(childRow, parentBody.getElementsByTagName("tr")[<?php echo $number;?>]);

                                                    appendNoTransaksi(childRow);
                                                    appendKodeTransaksi(childRow);
                                                    appendTanggalTransaksi(childRow);
                                                    appendNamaLaptop(childRow);
                                                    appendJumlahBeli(childRow);
                                                    appendHarga(childRow);
                                                    appendHargaTotal(childRow);
                                                    alterHarga();


                                                   function appendNoTransaksi(value)
                                                   {
                                                        var childTableDataNoTransaksi = document.createElement("td");
                                                        value.appendChild(childTableDataNoTransaksi)
                                                        childTableDataNoTransaksi.innerText = "<?php echo $number+1;?>";
                                                   }

                                                   function appendKodeTransaksi(value)
                                                   {
                                                        var childTableDataKodePenjualan = document.createElement("td");
                                                        value.appendChild(childTableDataKodePenjualan);
                                                        childTableDataKodePenjualan.innerText = "<?php echo penjualanFormat($row['ID_TRANSAKSI']);?>";   
                                                   }

                                                   function appendTanggalTransaksi(value)
                                                   {
                                                       var childTableDataTanggalTransaksi = document.createElement("td");
                                                       value.appendChild(childTableDataTanggalTransaksi);
                                                       childTableDataTanggalTransaksi.innerText = "<?php echo $row['TANGGAL_TRANSAKSI'];?>";

                                                   }

                                                   function appendNamaLaptop(value)
                                                   {
                                                       var childTableDataNamaLaptop = document.createElement("td");
                                                       value.appendChild(childTableDataNamaLaptop);
                                                       childTableDataNamaLaptop.innerText = "<?php echo $row['NAMA_LAPTOP'];?>";
                                                   }

                                                   function appendJumlahBeli(value)
                                                   {
                                                       var childTableDataJumlahBeli = document.createElement("td");
                                                       value.appendChild(childTableDataJumlahBeli);
                                                       childTableDataJumlahBeli.innerText = "<?php echo $row['JUMLAH_BELI'];?>";
                                                   }

                                                   function appendHarga(value)
                                                   {
                                                       var childTableDataHarga = document.createElement("td");
                                                       value.appendChild(childTableDataHarga);
                                                       childTableDataHarga.innerText = "<?php echo rupiah($row['HARGA_JUAL']);?>";
                                                   }

                                                   function appendHargaTotal(value)
                                                   {
                                                       var childTableDataHargaTotal = document.createElement("td");
                                                       value.appendChild(childTableDataHargaTotal);
                                                       childTableDataHargaTotal.innerText = "<?php echo rupiah($total_bayar);?>";
                                                   }

                                                   function alterHarga()
                                                   {
                                                       var totalHarga = document.getElementById("totalBayarBody<?php echo $row['ID_TRANSAKSI'];?>");
                                                       totalHarga.innerText = "<?php echo rupiah($total_bayar);?>";
                                                   }

                                                </script>
                                            <?php
                                            $number++;
                                        }else
                                        {
                                            $number = 1;
                                            $total_bayar = $row['HARGA_JUAL'];
                                            setLateId($row['ID_TRANSAKSI']);
                                            ?>
                                                <table class="table table-bordered table-striped table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th> No. </th>
                                                            <th> Kode Transaksi </th>
                                                            <th> Tanggal </th>
                                                            <th> Nama Laptop </th>
                                                            <th> Jumlah Beli </th>
                                                            <th> Harga </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableBody<?php echo $row['ID_TRANSAKSI']?>">
                                                        <tr>
                                                            <td> <?php echo $number;?> </td>
                                                            <td> <?php echo penjualanFormat($row['ID_TRANSAKSI']);?> </td>
                                                            <td> <?php echo $row['TANGGAL_TRANSAKSI'];?> </td>
                                                            <td> <?php echo $row['NAMA_LAPTOP'];?> </td>
                                                            <td> <?php echo $row['JUMLAH_BELI'];?> </td>
                                                            <td> <?php echo rupiah($row['HARGA_JUAL']);?> </td>
                                                            <td> <?php echo rupiah($total_bayar);?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"></td>
                                                            <td class="text-center font-weight-bold">
                                                                Grand Total :
                                                            </td>
                                                            <td id="totalBayarBody<?php echo $row['ID_TRANSAKSI'];?>"class="text-center font-weight-bold">
                                                                <?php echo rupiah($total_bayar);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"></td>
                                                            <td class="text-center font-weight-bold">
                                                                Status Transaksi :
                                                            </td>
                                                            <td class="text-center font-weight-bold">
                                                                <?php echo convertStatus($row['STATUS_TRANSAKSI']);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"></td>
                                                            <td class="text-center">
                                                                <a href="payment_plg.php?payment=true&idtransaksi=<?php echo $row['ID_TRANSAKSI'];?>" class="btn btn-outline-success"> Bayar Sekarang </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php
                                        }
                                    }
                                ?>
                            <?php
                        }else
                        {
                            ?>
                                <h5 class="my-4 text-center px-2 py-4 bg-dark text-light w-25 mx-auto rounded"> Tidak ada transaksi </h5>
                            <?php
                        }
                    ?>
                </div>                
            <?php

        }else
        {
            ?>
                <div class="container">
                    <h1 class="text-center my-4"> Tidak ada histori transaksi </h1>
                </div>
            <?php
        }
    }else
    {
        header("Location: dashboard_plg.php?systemerror=true");
    }

?>

<?php require_once "assets/includes/footer.php";?>
<?php require_once "assets/includes/footer_modal.php";?>
<?php require_once "assets/includes/footer_javascript.php";?>
<script src="assets/javascript/script_login_plg.js"></script>
<script src="assets/javascript/script_error_catch.js"></script>
<script src="assets/javascript/script_history_transaksi.js"></script>
<?php require_once "assets/includes/footer_close.php"?>