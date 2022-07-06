<?php
  session_start();
  if(isset($_SESSION['username'])){
    header("location: home1.php");
  }
  include "myconnection.php";
  
  error_reporting(0);

  if(isset($_POST['login'])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    
    $query = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
    $result = mysqli_query($connect, $query);
       
    if ($result->num_rows>0) {
      $row = mysqli_fetch_assoc($result);
      if($row['level'] == "admin"){
        $_SESSION['username']= $row['username'];
        header("Location:home2a.php");
    }
    else if($row['level'] == ""){
      $_SESSION['username']= $row['username'];
        header("Location:home1.php");
    }
    }else {
      echo "<script>alert('Username atau Password salah.')</script>";
    }
  }
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/uas.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <!--Menyisipkan Javascript-->
    <script src="js/uas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<body style="background-color: white;">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navlogo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </nav>
      <?php
        echo $_SESSION['error']
      ?>
    <div class="container">
      <br><br><br>
    <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="signup.php">Sign Up</a></li>
        <li class="tab active"><a href="index.php">Log In</a></li>
      </ul>
                
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
            <span class="req"></span>
            </label>
            <input name="username" placeholder="Username*" value="<?php echo $username;?>" type="text" required>
          </div>
          
          <div class="field-wrap">
            <label>
              <span class="req"></span>
            </label>
            <input id="pass" name="password" placeholder="password*" value="<?php echo $_POST['password'];?>" type="password" required>
            <div class="input-group-append">
              <span id="mybutton" onclick="change()" class="input-group-text">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg>
              </span>
            </div>
          </div>
                  
          <button class="button button-block" name="login" >Log In</button>
          
          </form>

        </div>
        <script>
          function change(){
            var x = document.getElementById('pass').type;
            if (x == 'password'){
              document.getElementById('pass').type = 'text';
              document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
            }
        </script>
        <script src="forpassword.js"></script>
      </div><!-- tab-content -->
      
</div> <!-- /form -->
</div>
    
</body>
</html>