<?php
session_start();

include 'myconnection.php';

if (!isset($_SESSION['cart'])) {
 header('Location: home1.php');
}

$cart = unserialize(serialize($_SESSION['cart']));
$total_item = 0;
$total_bayar = 0;

for ($i=0; $i<count($cart); $i++) { 
 $total_item += $cart[$i]['pembelian'];
 $total_bayar += $cart[$i]['pembelian'] * $cart[$i]['harga'];
}

// proses penyimpanan data
$query = mysqli_query($conn, "INSERT INTO transaksi (jumlah, total, tanggal) VALUES ('$total_item', '$total_bayar', '" . date('Y-m-d') . "')");

$kode_transaksi = mysqli_insert_id($connect);

for ($i=0; $i<count($cart); $i++) { 
 $kode_menu = $cart[$i]['kode_menu'];
 $pembelian = $cart[$i]['pembelian'];

 $query = mysqli_query($conn, "INSERT INTO detail_transaksi (kode_transaksi, kode_menu, pembelian) VALUES ('$kode_transaksi', '$kode_menu', '$pembelian')");
}

// unset session
unset($_SESSION['cart']);
$_SESSION['pesan'] = "Pembelian sedang diproses, terimakasih.";
header('Location: index.php');