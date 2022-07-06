<?php
    include "inc_headerhome2.php";
?>
<section class="page-section bg-light" id="portfolio">
<div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Menu</h2>
                    <h3 class="section-subheading text-muted">Menyajikan hidangan dengan kualitas terbaik adalah prioritas kami</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <?php
                            include 'myconnection.php';
                            $no = 0;
                            $query = "SELECT * FROM menu";
                            $result = mysqli_query($connect, $query);

                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                                    $no++;
                            ?>
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo $row['kode'];?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="img/<?php echo $row['foto'];?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $row["nama"];?></div>
                                <div class="portfolio-caption-subheading text-muted"></div>
                            </div>
                        </div>
                        <?php
                                }
                            }else{
                                echo "0 result";
                            }
                            ?>
                    </div>
                </div>
            </div>
        <div class="container">
        <p style="text-align: center;">
            <b><button onclick="window.location.href='home2.php'" 
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
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <?php
                                include 'myconnection.php';
                                $no = 0;
                                $query = "SELECT * FROM menu";
                                $result = mysqli_query($connect, $query);

                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
                                        $no++;
                                ?>
        <div class="portfolio-modal modal fade" id="<?php echo $row['kode'];?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="modal-body">
                                
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $row["nama"];?></h2>
                                    <p class="item-intro text-muted">Kode : <?php echo $row["kode"];?></p>
                                    <img class="img-fluid d-block mx-auto" src="img/<?php echo $row['foto'];?>" alt="..." />
                                    
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Harga:</strong>
                                            <?php echo $row["harga"];?>
                                        </li>
                                        <li>
                                            <strong>Stok:</strong>
                                            <?php echo $row["stok"];?>
                                        </li>
                                    </ul>
                                    <td>
                                        <a href="home2b.php?kode=<?php echo $row['kode'];?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="delete.php?kode=<?php echo $row['kode'];?>" class="btn btn-sm btn-danger alert_notif">Hapus</a>
                                    </td>
                                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                                }
                                }else{
                                    echo "0 result";
                                }
                                ?>
        <!-- Bootstrap core JS-->
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