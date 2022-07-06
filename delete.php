<?php
    session_start();

    include "myconnection.php";

    $kode = $_GET['kode'];

    $query = "DELETE FROM menu WHERE kode = '$kode'";

    if(mysqli_query($connect, $query)){
        header('Location:home2a.php');
        $_SESSION["sukses"] = 'Data Berhasil Dihapus';
    } else {
        echo "Data gagal dihapus <br>". mysqli_error($connect);
    }
    mysqli_close($connect);
?>