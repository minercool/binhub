<?php
if (!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'seller')) {
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$id = $_SESSION['id'];
$query = $conn->prepare("SELECT * FROM cards WHERE status ='sold' AND seller = '$id'");
if(!$query->execute()){
    echo '<h1>Internal error</h1>';
}

?>