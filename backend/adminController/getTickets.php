<?php
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$query = $conn->prepare("SELECT tickets.id,tickets.title,tickets.status,tickets.user_id,users.username FROM tickets,users WHERE tickets.user_id = users.id ORDER BY tickets.id DESC");
$query->execute();

?>