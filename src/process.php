<?php

session_start();

//______________________________#include database config______________________________

include('config.php');

//______________________________#check is user exist______________________________


function isUserExists($username)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    return $stmt->rowCount();
}

//______________________________#check is email exist______________________________

function isemail($email)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    return $stmt->rowCount();
}

//______________________________#login function______________________________

function login($username, $password)
{
    global $pdo;
    if (!isUserExists($username)) {
        echo "<script> alert('account is not exist')</script>";
        return false;
    }
    $sql = "SELECT * FROM users WHERE username = :username and password = :password ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username,':password'=>$password]);
    if($stmt->rowCount() == 1)
    {
        echo "<script> alert(' Success ')</script>"; 
        return true;
    }
    else
    {
        echo "<script> alert('password wrong')</script>"; 
        return false;
    }
}
    
//______________________________#signup function______________________________

function register($fname,$username, $password,$email)
{
    global $pdo;
    if (isUserExists($username) or isemail($email)) {
        echo "<script> alert(' you alreedy have an account')</script>"; 
        
        return false;
    }
    $sql = "INSERT INTO users (fname , username , password , email,cookie) VALUES (:fname ,:username , :password,:email,:cookie)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':fname' => $fname,':username' => $username, ':password' => $password , ':email' => $email , ':cookie' => '']);
    echo "<script> alert('success')</script>"; 
    return true;
}

//______________________________#forget password function______________________________

function resetp($password,$email)
{
    global $pdo;
    $sql = "UPDATE users SET password= :password WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":password", $password);
    $stmt->bindValue(":email", $email);
    $stmt->execute(); 
    return true;
}

function cookie_handler($csrf_token,$time,$user){// make a csrf token to save it in db & add it to http header
    if($csrf_token == "null"){
        $str = rand();
        $csrf_token = md5($str);
        save_cookie($csrf_token,$user);
        setcookie("csrf-token", $csrf_token, time() + ($time), "/"); 
    }
    else{
    save_cookie($csrf_token,$user);
    setcookie("csrf-token", $csrf_token, time() + ($time), "/"); 
    }
}              

function save_cookie($csrf_token,$user)
{
    global $pdo;
    $sql = "UPDATE users SET cookie= :cookie WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":cookie", $csrf_token);
    $stmt->bindValue(":username", $user);
    $stmt->execute(); 
}

function find_user_with_coockie($csrf_token)
{
    
    global $pdo;
    $sql = "SELECT username FROM users Where cookie = '{$csrf_token}' " ;
    $res = $pdo->query($sql);
    
    while ($row = $res->fetch()) 
    {
        return $row['username']; 
    }
    
    unset($pdo);
  
}

?>