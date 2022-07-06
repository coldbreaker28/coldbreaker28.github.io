<?php
    include "inc_headerhome1.php";
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
    </div>
    <div class="container">
        <p style="text-align: center;">
            <b><button onclick="window.location.href='pemesanan.php'" 
                class="btn btn-sm btn-secondary">ORDER NOW</button>
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
                            <div class="col-lg-8">
                                <div class="modal-body">
                                
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $row["nama"];?></h2>
                                    <p class="item-intro text-muted"></p>
                                    <img class="img-fluid d-block mx-auto" src="img/<?php echo $row['foto'];?>" alt="..." />
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Harga:</strong>  Rp. 
                                            <?php echo $row["harga"];?>
                                        </li>
                                        <li>
                                            <strong>Stok:</strong>
                                            <?php echo $row["stok"];?>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Close
                                    </button>
                                
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