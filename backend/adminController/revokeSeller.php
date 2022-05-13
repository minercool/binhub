<?php
require_once('../config.php');
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$id = $_GET['id'];
$query = $conn->prepare("UPDATE users SET role = 'user' WHERE id = '$id'");
if($query->execute()){
    $query = $conn->prepare("DELETE FROM balance WHERE seller_id = '$id'");
    if($query->execute()){
        header('Location: ../../frontend/admin/sellers.php');
    }else{
        echo '<h1>Internal error</h1>';
    }
}else{
    echo 'internal error';
}

?>