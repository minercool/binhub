<?php
require_once('../config.php');
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$id = $_GET['id'];
$answer = $_POST['answer'];

$query = $conn->prepare("UPDATE tickets SET status = 'closed', answer = '$answer' WHERE id = $id");
if($query->execute()){
    header('Location: ../../frontend/admin/tickets.php');
}else{
    echo "internal error";
}
?>