<!-- //______________________________#check email function______________________________ -->

<?php
    include_once 'process.php';
    if(isset($_POST['reset'])){
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          $_SESSION['status'] = $_POST['email'];
          if(isemail($email) > 0)//check email
          {
            header('Location:resetp.php');
          }
          else{
            echo "<script> alert('email not found')</script>"; 
          }
        }
        else
        {
          echo "<script> alert('email is incorrect')</script>";
        }
}
?>

<!-- //______________________________#html forget page source______________________________ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="shortcut icon" type="image" href="../image/logo.svg">
  <title>check email</title>
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
                <h2>Check Email</h2>
              </div>
            </div>
          </div>
          <div class="content-form">
            <div class="y-style">
              <form method="POST">
                <p>
                  <lable>Email</lable>
                  <ion-icon name="mail-outline" class="forget-email-icon"></ion-icon>
                  <input type="email" name="email" placeholder="Enter email" required="">
                </p>
                  <p><button type="submit" name="reset">Submit</button></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <script src="../js/scripts.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>