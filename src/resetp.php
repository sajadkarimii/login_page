
<!-- //______________________________#reset password function_____________________________ -->

<?php 
    include_once 'process.php';
    $status = $_SESSION['status'];
    if(isset($_POST['submit'])){
      $pass = $_POST['password'];
      $cpass = $_POST['rpassword'];
        if ($pass == $cpass and strlen($pass)>5) {
          $chpass = md5($_POST['rpassword']);
          if(resetp($chpass,$status)){ //update password in database
              header('Location:login.php');
          }
          else
          {
            echo "<script> alert('something wrong...')</script>"; 
          }
        } 
        else {
          echo "<script> alert(' password wrong ')</script>"; 
          header('Location:resetp.php');
        }
    }
?>

<!-- //______________________________#html reset password page source______________________________ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="shortcut icon" type="image" href="../image/logo.svg">
  <title>reset password</title>
</head>
<body>
<div id="page" class="site login-show">
    <div class="container">
      <div class="wrapper">
        <div class="login">
          <div class="content-heading">
            <div class="y-style">
              <div class="logo"><a href="#">He<span>llo</span></a></div>
              <div class="welcome">
                <h2>Change Your Password</h2>
              </div>
            </div>
          </div>
          <div class="content-form">
            <div class="y-style">
              <form method="POST">
                <p>
                  <lable>Password</lable>
                  <input type="password" name="password" id="reset_password" placeholder="Enter password" minlength="6" required="">
                  <ion-icon name="lock-closed-outline" class="forget-lock-icon"></ion-icon>
                  <img src="../image/eye-close.png" id="eyeicon_reset_password" class="f-img">
                </p>
                <p>
                  <lable>Confirm password</lable>
                  <input type="password" name="rpassword" id="reset_password_confirm" placeholder="Enter confirm password" minlength="6" required="">
                  <ion-icon name="lock-closed-outline" class="forget-lock-icon2"></ion-icon>
                  <p><button type="submit" name="submit">Submit</button>
                  <img src="../image/eye-close.png" id="eyeicon_reset_password_confirm" class="fr-img">
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <script src="../js/script_reset_pswd_page.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>