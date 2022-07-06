<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home page</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logonav.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <div class="row">
      <?php
              include "myconnection.php";
              $query = "SELECT a.name,t.tanggal,t.kode
                                FROM transaksi t 
                                INNER JOIN admin a ON 
                                    a.id = t.id_admin";
              $result = mysqli_query($connect, $query);

              if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result)
              ?>
        <div class="col-12 text-center mb-2">
              <h1 style="font-size:60px;font-weight:700;">NANA'Z COFFEE SHOP</h1>
        </div>
        <div class="col-7">
            <h3 class="mb-0" style="text-transform: uppercase;">NO. PESANAN : <?php echo $row["kode"]; ?></h3>
            <h3 class="mb-0" style="text-transform: uppercase;">KASIR : <?php echo $row["name"]; ?></h3>
            <h3 class="mb-0" style="text-transform: uppercase;">TANGGAL : <?php echo $row["tanggal"]; ?></h3>
        </div>
        <?php
          }
        ?>
        <div class="col-12 bg-secondary border my-3"></div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-1 text-center"><h3 style="font-weight:700;">QTY</h3></div>
                <div class="col"><h3 style="font-weight:700;">PRODUK</h3></div>
                <div class="col text-center"><h3 style="font-weight:700;">HARGA</h3></div>
                <div class="col text-right"><h3 style="font-weight:700;">SUBTOTAL</h3></div>
            </div>
        </div>
        <?php
              include "myconnection.php";
              $no = 0;
              $subtotal=0;
              $total=0;
              $query = "SELECT m.nama, t.jumlah, m.harga
                                FROM transaksi t 
                                INNER JOIN menu m ON
                                    m.kode = t.kode_menu";
              $result = mysqli_query($connect, $query);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $no++;
                  $subtotal = $row["jumlah"]*$row["harga"];
                  $total+=$subtotal;
                
              ?>
        <div class="col-12 mb-2">
            <div class="row">
                <div class="col-1 text-center"><h3><?php echo $row['jumlah'] ?></h3></div>
                <div class="col"><h3><?php echo $row['nama'] ?></h3></div>
                <div class="col text-center"><h3>Rp. <?php echo $row['harga'] ?></h3></div>
                <div class="col text-right"><h3>Rp. <?php echo $subtotal ?></h3></div>
            </div>
        </div>
        <?php }?>
        <div class="col-12 bg-secondary border my-3"></div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col text-right"><h3 style="font-weight:700;">TOTAL</h3></div>
                <div class="col"><h3></h3></div>
                <div class="col text-center"></h3></div>
                <div class="col text-right"><h3>Rp. <?php echo $total ?></h3></div>
            </div>
        </div>
        <?php }?>
            <script>
            window.print();
        </script>
      </div><!-- end row -->   
    </body>
</html>