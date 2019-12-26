<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'connection.php';
$sql = mysqli_query($conn, $sql = "select transaksi.ID_TRANSAKSI, transaksi.ID_USER, transaksi.TANGGAL_TRANSAKSI, transaksi.STATUS_TRANSAKSI, detail_transaksi.JUMLAH_BELI, user.NAMA_USER,laptop.ID_LAPTOP, laptop.NAMA_LAPTOP,\n"

. "laptop.GAMBAR_LAPTOP, det_laptop.ID_DET_LAPTOP, det_laptop.HARGA_JUAL from transaksi inner join detail_transaksi on transaksi.ID_TRANSAKSI = detail_transaksi.ID_TRANSAKSI \n"

. "inner join det_laptop on detail_transaksi.ID_DET_LAPTOP = det_laptop.ID_DET_LAPTOP inner join laptop on det_laptop.ID_LAPTOP = laptop.ID_LAPTOP inner join user on transaksi.ID_USER = user.ID_USER");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Data Transaksi</h1>
    <h3>RIZQUINA Laptop</h3>
    <p><b>Alamat: </b>Jl. Mastrip</p>
    <hr>
    <p class="tgl">Tanggal: '.date("Y-m-d H:i:s").'</p>
    <table class="tbl1" border="1" width="100%" cellpadding="10" cellspacing="0">
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">ID Transaksi</th>
            <th class="text-center">Nama Pelanggan</th>
            <th class="text-center">Nama Laptop</th>
            <th class="text-center">Gambar Laptop</th>
            <th class="text-center">Jumlah Beli</th>
            <th class="text-center">Total</th>
            <th class="text-center">Status Transaksi</th>
            <th class="text-center">Tanggal Transaksi</th>
        </tr>';
        $i = 1; 
        while($row = mysqli_fetch_assoc($sql)) { 
        $tgl = date('d-m-Y', strtotime($row['TANGGAL_TRANSAKSI'])); // Ubah format tanggal jadi dd-mm-yyyy                     
        $html .= '<tr>
            <td class="text-center">'.$i .'</td>
            <td class="text-center">'.$row["ID_TRANSAKSI"].'</td>
            <td class="text-center">'.$row["NAMA_USER"].'</td>
            <td class="text-center">'.$row["NAMA_LAPTOP"].'</td>
            <td class="text-center"><img src="img/'.$row["GAMBAR_LAPTOP"].'" alt="gambar" width="50"></td>
            <td class="text-center">'.$row["JUMLAH_BELI"].'</td>
            <td class="text-center">Rp.'. number_format($row["JUMLAH_BELI"] * $row["HARGA_JUAL"]).'</td>';
            $trn = $row["STATUS_TRANSAKSI"];
            if($trn == 0){
                $trn ="BELUM BAYAR";
            } else {
                $trn ="SUDAH BAYAR";
            }
            $html .= '<td class="text-center">'.$trn.'</td>
            <td class="text-center">'.$row["TANGGAL_TRANSAKSI"].'</td>
        </tr>';
        $i++;
        }
    $html .= '</table>
        <hr>
        <table width="80%" border="0" align="center" cellspacing="0" cellpadding="2">
            <tr class="ttd">
            <td width="60%">&nbsp;</td>
            <td>Jember, '.date("d-m-Y").'</td>	
            </tr>
            <tr class="ttd">
            <td>&nbsp;</td>
            <td>Pemilik Toko</td>	
            </tr>
            <tr class="ttd">
            <td>&nbsp;</td>
            <td>RIZQUINA Laptop</td>	
            </tr>
            <tr class="ttd">
            <td>&nbsp;</td>
            <td>&nbsp;</td>	
            </tr>
            <tr class="ttd">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr class="ttd">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr class="ttd">
            <td>&nbsp;</td>
            <td>Bpk. Andreanto</td>
            </tr>
        </table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('rekap-transaksi.pdf', \Mpdf\Output\Destination::INLINE);

?>

