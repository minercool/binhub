<?php
if (!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'seller')) {
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$id = $_SESSION['id'];

$query1 = $conn->prepare("SELECT count(id) AS nbr FROM tickets WHERE user_id = '$id'");
$query1->execute();
$result1 = $query1->fetch();

$query2 = $conn->prepare("SELECT count(id) AS nbr FROM cards WHERE status = 'sold' AND seller = '$id'");
$query2->execute();
$result2 = $query2->fetch();

$query3 = $conn->prepare("SELECT balance FROM balance WHERE seller_id = '$id'");
$query3->execute();
$result3 = $query3->fetch();

?>