<?php
require_once('../config.php');
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$id = $_GET['id'];
$query = $conn->prepare("UPDATE users SET active = 'yes' WHERE id = '$id'");
if($query->execute()){
header('Location: ../../frontend/admin/users.php');
}else{
    echo 'internal error';
}

?>