<?php
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'admin')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}

$query = $conn->prepare("SELECT * FROM users WHERE role = 'seller' OR role = 'user'");
$query->execute();

?>