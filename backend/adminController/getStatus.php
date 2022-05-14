<?php
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role']))){
    session_destroy();
    header('Location: ../../frontend/login.php');
}

$id = $_SESSION['id'];

$query1 = $conn->prepare("SELECT COUNT(id) AS nbr FROM users WHERE role = 'user'");
$query1->execute();
$result1 = $query1->fetch();

$query2 = $conn->prepare("SELECT COUNT(id) AS nbr FROM users WHERE role = 'seller'");
$query2->execute();
$result2 = $query2->fetch();

$query3 = $conn->prepare("SELECT COUNT(id) AS nbr FROM cards WHERE status = 'unsold'");
$query3->execute();
$result3 = $query3->fetch();

$query4 = $conn->prepare("SELECT balance  FROM balance WHERE seller_id = '$id'");
$query4->execute();
$result4 = $query4->fetch();



?>