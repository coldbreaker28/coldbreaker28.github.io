<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "coffeshop";
    
    $connect = mysqli_connect($hostname, $username, $password, $database);
    if(!$connect){
        die("Koneksi gagal");
    }
?>