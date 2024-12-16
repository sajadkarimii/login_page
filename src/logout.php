<!-- //______________________________#html logout function______________________________ -->

<?php
    
    include_once 'process.php';

    //______________________________#check cookie function_____________________________ -->

   
    if (isset($_COOKIE["csrf-token"]))
    {

      if($_COOKIE["csrf-token"] != "")//check cookie to authenticate user
      {
        $user = find_user_with_coockie($_COOKIE["csrf-token"]);
        echo "<script>alert('hello {$user} ')</script>";
      }

    }else{
      header('location:login.php?error=unathorized');
    }

    //______________________________#check logout function_____________________________

    if(isset($_POST['logout']))
    {
      cookie_handler("",0,"");
      setcookie("remember", "false", time() + (864)*100000, "/"); // expire remember me cookie 
      header('location:login.php');
    }
?>
<!-- //______________________________#html logout page source______________________________ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="shortcut icon" type="image" href="../image/logo.svg">
  <title>logout</title>
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
              <h2>Welcome 

<!-- //______________________________#check username with cookie _____________________________  -->
        
<?php   
    if (isset($_COOKIE["csrf-token"]))
    {
      if($_COOKIE["csrf-token"] != "")
      {
        echo find_user_with_coockie($_COOKIE["csrf-token"]);
      }
         
     }
?>

         </h2>
              <p>We can help you grow</p>
            </div>
          </div>
        </div>
        <div class="content-form">
          <div class="y-style">
            <form method="POST">
              <p><button type="submit" name="logout">logout</button></p>
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
