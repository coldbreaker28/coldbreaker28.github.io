<?php 
include "myconnection.php";
$no = 1;
$query ="INSERT INTO transaksi (id_admin, tanggal, kode_menu, jumlah) VALUES ( '$_GET[id]','$_GET[tanggal]', '$_GET[kode]','$_GET[jumlah]')";
$sql = "UPDATE menu SET stok= stok-{$_GET['jumlah']} WHERE kode = '{$_GET['kode']}' ";
mysqli_query($connect, $sql);
$result = mysqli_query($connect, $query);
if($result){
    header ("Location: pemesanan.php");
}               
?>