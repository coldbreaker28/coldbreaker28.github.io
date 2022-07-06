<?php
    $target_path = "img/";

    $target_path = $target_path . basename(
    $_FILES['myfoto']['name']);
 
    if(move_uploaded_file($_FILES['myfoto']['tmp_name'], $target_path)){
        echo "the file " . basename($_FILES['myfoto']['name']) . "has been uploaded";
    }else{
        echo "There was an error uploading the file, please try again!! ";
    } 
    
    include "myconnection.php";

    $kode = $_POST["mykode"];
    $name = $_POST["mynama"];
    $kode_kategori = $_POST["kategori"];
    $harga = $_POST["myharga"];
    $stok = $_POST["mystok"];
    $foto = $_FILES["myfoto"]['name'];

    $query = "INSERT INTO menu(kode,nama,kode_kategori,harga,stok,foto)
            VALUES('$kode','$name','$kode_kategori','$harga','$stok','$foto')";
    
    if(mysqli_query($connect, $query)){
        header("location: home2a.php");
    }else{
        echo "Data baru gagal ditambahkan <br>". mysqli_error($connect);
    }

    mysqli_close($connect);
?>