<?php 

include_once 'process.php'; //include process functions

//______________________________#check if user authenticate ______________________________

if (isset($_SERVER["QUERY_STRING"]))
{
    if ($_SERVER["QUERY_STRING"] == "error=unathorized")
    {
        echo("<script>alert('you should login first')</script>");
    }
}

//______________________________#remember_me expires and redirect to logout.php______________________________ 

if (isset($_COOKIE["remember"]) ){
    setcookie("remember", "false", time() + (0)); 
    header('location:logout.php');
  
}

//______________________________#check user in database______________________________ 

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // hash password
    if(login($user,$pass)) //check password
    {
        cookie_handler("null",86400,$user); // add cookie in header for this user and save it
        if(isset($_POST['remember'])){  
          setcookie("remember", "true", time() + (864)*100000); 
        }
        header('location:logout.php');
    }
}
?>

<!-- //______________________________#html login page source______________________________ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="shortcut icon" type="image" href="../image/logo.svg">
  <title>login</title>
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
                <h2>Welcome<br>Back!</h2>
              </div>
            </div>
          </div>
          <div class="content-form">
            <div class="y-style">
              <form method="POST">
                <p>
                  <lable>Username</lable>
                  <ion-icon name="person-outline" class="user-icon"></ion-icon>
                  <input type="username" name="username" placeholder="Enter username" required="">
                </p>
                <p>
                <lable>Password</lable>
                <ion-icon name="lock-closed-outline" class="lock-icon"></ion-icon>
                <input type="password" name="password" placeholder="Enter password" id="password_login" minlength="6" required="">
                <img src="../image/eye-close.png" id="eyeicon1" class="l-img">
              </p>
                <p class="check">
                  <input type="checkbox" name="remember" id="remember">
                  <lable for="remember">Remember me</lable>
                </p>
                <p class="forgot"><a href='forget.php'>Forgot password</a></p>
                <p><button type="login" name="login">Login</button></p>
              </form>
              <div class="afterform">
                <p>Don't have an account?</p>
                <a href="signup.php" class="t-signup">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <script src="../js/script_login_page.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" ></script>
</body>
</html>
