<?php
  session_start();
  if(isset($_SESSION['user_login'])){
    header('location:dashboard.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <title>CDRRMO - Login</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="svg">
            <img src="img/login.svg" alt="">
        </div>
        <div class="login">
            <form action="login_process.php" method="post">
                <img src="img/adminlogo.png" alt="">
                <h3 class="title">Login</h3>
                <div class="txt-field">
                
                <input type="text" name="username" id="username" >
                <span></span>         
            <label>Username</label>
        </div>
        <div class="txt-field">
            
            <input type="password" name="password" id="password" >
            <span></span>
            <label>Password</label>
            </div>
            <div class="forgotpass">Forgot Password?</div>
            <input type="submit" value="Login" name="login" id="login">
        <!-- <div class="reg">
            Not registered? <a href="#">Register Here</a>
        </div> -->

        <div class="wrapper">
            <div class="icon facebook">
                <div class="tooltip">Facebook</div>
                <span><a href="https://www.facebook.com/profile.php?id=100013206180116"><i class="fa-brands fa-facebook-f"></a></i></span>
            </div>
            <div class="icon gmail">
                <div class="tooltip">Gmail</div>
                <span><a href="cdrrmo_sccp@yahoo.com"><i class="fa-solid fa-envelope"></i></a></span>
            </div>
            <div class="icon twitter">
                <div class="tooltip">Twitter</div>
                <span><i class="fa-brands fa-twitter"></i></span>
            </div>
        </div>
            </form>
        </div>
    </div>
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h6><i class='icon fa fa-warning'></i> Error!</h6>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
</body>
</html>