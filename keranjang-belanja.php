<?php
    include "inc_headerhome1.php";
?>
<section class="page-section bg-light" id="portfolio">
            <div class="container">
            <?php
if (isset($_GET['kode'])) {
    $kode=$_GET['kode'];
    include 'myconnection.php';
    $sql= "SELECT * from menu where kode='$kode'";
    $query = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($query);
}else {
    $kode="";
    $jumlah=0;
}

if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}

switch($aksi){	
    case "tambah_produk":
    $itemArray = array($kode=>array('kode'=>$kode,'nama'=>$nama,'harga'=>$harga,'stok'=>$stok));
    if(!empty($_SESSION["keranjang_belanja"])) {
        if(in_array($row['kode'],array_keys($_SESSION["keranjang_belanja"]))) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($row['kode'] == $k) {
                    $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
        }
    } else {
        $_SESSION["keranjang_belanja"] = $itemArray;
    }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                    if($_GET["kode"] == $k)
                        unset($_SESSION["keranjang_belanja"][$k]);
                        $_SESSION["sukses"] = 'Data Berhasil Dihapus';
                    if(empty($_SESSION["keranjang_belanja"]))
                        unset($_SESSION["keranjang_belanja"]);
            }
        }
    break;

    case "update":

        $kode = $_GET ["kode"];
        $jumlah = $_GET ["jumlah"];

        $query = "INSERT INTO transaksi (kode, jumlah) VALUES (kode = '$kode', jumlah = '$jumlah')";
        $sql = mysqli_connect($connect, $query);

        if($sql){
            header ("Location: keranjang-belanja.php");
        }
    break;
}
?>
<div class="row">
    <h2  style="margin-bottom:30px;">Keranjang Belanja</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th width="40%">Nama</th>
            <th>Harga</th>
            <th width="10%">QTY</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no=0;
            if(!empty($_SESSION["keranjang_belanja"])):
            foreach ($_SESSION["keranjang_belanja"] as $item):
        ?>
         <form method="get">
            <input type="hidden" name="kode[]" class="kode" value="<?php echo $item["kode"]; ?>"/>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $item["kode"]; ?></td>
                <td><?php echo $item["nama"]; ?></td>
                <td>Rp. <?php echo number_format($item["harga"],0,',','.');?> </td>
                <td>
                <input type="text" name="jumlah" >
                </td>
                <td>
                        <a href="keranjang-belanja.php?kode=<?php echo $item['kode']; ?>&aksi=update" class="btn btn-sm btn-danger alert_notif" role="button">Update</a>
                    
                    <a href="keranjang-belanja.php?kode=<?php echo $item['kode']; ?>&aksi=hapus" class="btn btn-sm btn-danger alert_notif" role="button">Delete</a>
                </td>
            </tr>
            </form>
        <?php 
            endforeach;
            endif;
        ?>
        </tbody>
    </table>
</div>
            </div>
            <div class="container">
        <p style="text-align: center;">
            <b><button onclick="window.location.href='home1.php'" 
                class="btn btn-sm btn-secondary">ADD MENU</button>
            </b>
        </p>
    </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
            <div class="text-center">
                    <h2 class="section-heading text-uppercase">NANA'Z COFFEE TEAM</h2>
                    <h3 class="section-subheading text-muted">Sukses berawal dari mimpi, usaha, dan berdoa.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpeg" alt="..." />
                            <h4>Nadhif Adyatma Zain</h4>
                            <p class="text-muted">Owner</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpeg" alt="..." />
                            <h4>Anza Aminulloh T. H.</h4>
                            <p class="text-muted">Owner</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
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

