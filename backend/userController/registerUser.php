<?php
require_once '../config.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

if(isset($username) && isset($email) && isset($password) && isset($password)){
    $result = $conn->prepare("SELECT * FROM users WHERE email LIKE '$email'");
    $query->execute();
    if($result->fetch() == 0){
        $result = $conn->query("INSERT INTO users VALUES('','$username','$email','$hash')");
        if($result){
            $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400">
            Registred seccessfully!
            </div><br>';
            header('Location: ../../frontend/login.php');
        }
    }else{
        $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
       Email already exist.
      </div><br>';
      header('Location: ../../frontend/create-account.php');
    }
    
}



?>