<?php
    include "inc_headerhome1.php";
?>
<section class="page-section bg-light" id="portfolio">
    <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            DATA PEMESANAN
          </div>
            <table class="table table-bordered mt-3" id="myTable">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Kasir</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Menu</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Aksi</th>
              </tr>
              <?php
              include "myconnection.php";
              $no = 0;
              $subtotal=0;
              $total=0;
              $query = "SELECT a.name,m.nama,t.tanggal, t.jumlah, m.harga, t.kode
                                FROM transaksi t 
                                INNER JOIN admin a ON 
                                    a.id = t.id_admin
                                INNER JOIN menu m ON
                                    m.kode = t.kode_menu";
              $result = mysqli_query($connect, $query);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $no++;
                  $subtotal = $row["jumlah"]*$row["harga"];
                  $total+=$subtotal;
              ?>
                  <tr>
                    <td><?php echo "$no"; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["tanggal"]; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["jumlah"]; ?></td>
                    <td><?php echo $row["harga"]; ?></td>
                    <td><?php echo $subtotal ?></td>
                    <td><a href="hapus.php?kode=<?php echo $row['kode'];?>" class="btn btn-sm btn-danger alert_notif">Delete</a></td>
                  </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="6">TOTAL</td>
                    <td><?php echo $total ?></td>
                </tr>
                <tr>
                    
                </tr>
                  
              <?php
                
              } else {
                echo "0 result";
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <a href="cetak.php" class="btn btn-sm btn-secondary">Cetak Struk</a></td>
    </div><br>
    <div class="container">
        <a href="deleteall.php?kode=<?php echo $row['kode'];?>" class="btn btn-sm btn-danger alert_notif">Delete All</a>
    </div>
    <div class="container">
        <p style="text-align: center;">
            <b><button onclick="window.location.href='home1.php'" 
                class="btn btn-sm btn-secondary">HOME</button>
            </b>
        </p>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
    
    <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses  -->
    <?php if(@$_SESSION['sukses']){ ?>
        <script>
            Swal.fire({            
                icon: 'success',                   
                title: 'Sukses',    
                text: 'data berhasil dihapus',                        
                timer: 3000,                                
                showConfirmButton: false
            })
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>


    <!-- di bawah ini adalah script untuk konfirmasi hapus data dengan sweet alert  -->
    <script>
        $('.alert_notif').on('click',function(){
            var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin hapus data?",            
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"
            
            }).then(result => {
                //jika klik ya maka arahkan ke proses.php
                if(result.isConfirmed){
                    window.location.href = getLink
                }
            })
            return false;
        });
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<?php
    include "inc_footer.php";
?>