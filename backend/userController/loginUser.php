<?php
require_once '../config.php';

$email = $_POST['email'];
$password = $_POST['password'];
$query = $conn->query("SELECT * FROM users WHERE email LIKE '$email'");
$result = $query->fetch();
if($result){
    if(password_verify($password, $result['password'])){
        $_SESSION['logged'] = true;
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];
        header("Location: ../../frontend/user/index.php");
    }else{
        $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
       Wrong email or password.
      </div><br>';
    header("Location: ../../frontend/login.php");
    
    }
}else{
    $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
       Wrong email or password.
      </div><br>';
    header("Location: ../../frontend/login.php");
    
}
