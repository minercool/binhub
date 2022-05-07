<?php
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$id = $_GET['id'];
$query = $conn->prepare("SELECT tickets.*,users.username FROM tickets,users WHERE tickets.id = '$id' AND tickets.user_id = users.id");
$query->execute();

?>