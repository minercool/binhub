<?php
require_once '../config.php';

if(isset($_SESSION['id']) && $_SESSION['id'] != null){
    $id = $_SESSION['id'];
    $password = $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = $conn->query("UPDATE users SET password = '$password' WHERE id LIKE '$id'");
    if($query){
        header('Location: ../../frontend/login.php');
        unset($_SESSION['code']);
    }   
}else{
    header('Location: ../../frontend/forgot-password.php');
}
?>
