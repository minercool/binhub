<?php
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true)){
    header('Location: ../../frontend/login.php');
}
$query = $conn->prepare("SELECT cards.*,username FROM cards,users WHERE (cards.seller = users.id AND cards.status = 'unsold') ORDER BY cards.id DESC");
$query->execute();

?>