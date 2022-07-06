<?php
    include "inc_headerhome2.php";
?>
<section class="page-section bg-light" id="portfolio">
            <div class="container">
            <form action="proses_input.php" enctype="multipart/form-data" method="post">
            <table>
            <tr>
                    <td>Kode: </td>
                    <td><input type="text" name="mykode"> </td>
                </tr>
                <tr>
                    <td>Nama: </td>
                    <td><input type="text" name="mynama"> </td>
                </tr>
                <tr>
                    <td>kategori: </td>
                    <td><select name="kategori" id="kategori" aria-label="Default select example">
                    <option selected>Pilih Kategori</option>
                    <?php 
                        include 'myconnection.php';
                        $query = "SELECT * FROM kategori";
                        $result = mysqli_query($connect,$query);

                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $row['kode']; ?>"><?php echo $row['nama'];?></option>
                                <?php
                            }
                        }else{
                            echo "0 result";
                        }
                    ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Harga: </td>
                    <td>
                        <input name="myharga" type="text"></input>
                    </td>
                </tr>
                <tr>
                    <td>Stok: </td>
                    <td>
                        <input name="mystok" type="text"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="myfoto"><br><br>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="send" value="tambah"> </td>
                </tr>
            </table>
        </form>
            </div>
            <div class="container">
        <p style="text-align: center;">
            <b><button onclick="window.location.href='home2a.php'" 
                class="btn btn-sm btn-secondary">EDIT MENU</button>
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