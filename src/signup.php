
<!-- //______________________________#register function______________________________ -->

<?php

use function PHPSTORM_META\type;

    include_once 'process.php';
      if(isset($_POST['signup']))
      {
        $pass = $_POST['password'];
        $cpass = $_POST['rpassword'];
        if ($pass == $cpass and strlen($pass)>5) 
        {
            $fname = $_POST['fullname'];
            $user = $_POST['username'];
            $chpass = md5($_POST['password']);
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
              if(register($fname,$user,$chpass,$email))
              {
                header('location:login.php');
              }
              else
              {
                echo "<script> alert('somthing wrong')</script>"; 
              }
            }
            else
            {
              echo "<script> alert('email is incorrect')</script>";
            }
        } 
        else 
        {
            echo "<script> alert(' password wrong ')</script>"; 
        }
    }
?>

<!-- //______________________________#html signup page source______________________________ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="shortcut icon" type="image" href="../image/logo.svg">
  <title>signup</title>
</head>
<body>
    <div id="page" class="site signup-show">
    <div class="container">
      <div class="wrapper">
      <div class="signup">
        <div class="content-heading">
          <div class="y-style">
            <div class="logo"><a href="#">He<span>llo</span></a></div>
            <div class="welcome">
              <h2>Sign Up<br>Now</h2>
            </div>
          </div>
        </div>
        <div class="content-form">
          <div class="y-style">
            <form method="POST">
              <p>
                <lable>Full Name</lable>
                <ion-icon name="person-outline" class="register-full-icon"></ion-icon>
                <input type="text" name="fullname" placeholder="Enter your name">
              </p>
              <p>
                <lable>Username</lable>
                <ion-icon name="person-outline" class="register-user-icon"></ion-icon>
                <input type="text" name="username" placeholder="Enter your name">
              </p>
              <p>
                <lable>Email</lable>
                <ion-icon name="mail-outline" class="register-email-icon"></ion-icon>
                <input type="email" name="email" placeholder="Enter your email">
              </p>
              <p>
                <lable>Password</lable>
                <ion-icon name="lock-closed-outline" class="register-lock-icon"></ion-icon>
                <input type="password" name="password" placeholder="Enter password" id="password2" minlength="6" required="">
                <img src="../image/eye-close.png" id="eyeicon2" class="p-img">
                <lable>Confirm password</lable>
                <ion-icon name="lock-closed-outline" class="register-lock-icon2"></ion-icon>
                <input type="password" name="rpassword" placeholder="Enter password" id="password3" minlength="6" required="">
                <img src="../image/eye-close.png" id="eyeicon3" class="pf-img">
              </p>
              <p class="check">
                <input type="checkbox" id="terms">
                <lable for="terms">I agree to all statments included <a href="https://policies.google.com/terms">Terms of Use</a></lable>
              </p>
              <p><button type="submit" name="signup">Sign Up</button></p>
            </form>
            <div class="social">
              <p><span>Or sign up with</span></p>
              <ul>
                <li><a href="#" class="google"><ion-icon name="logo-google"></ion-icon></a></li>
                <li><a href="#"class="facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="#"class="twitter"><ion-icon name="logo-twitter"></ion-icon></a></li>
              </ul>
            </div>
            <div class="afterform">
              <p>Alery have an account?</p>
              <a href="login.php" class="t-login">Login here</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="../js/scripts.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" ></script>
</body>
</html>
