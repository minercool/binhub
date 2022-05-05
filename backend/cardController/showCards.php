<?php

$query = $conn->prepare("SELECT cards.*,username FROM cards,users WHERE (cards.seller = users.id) ORDER BY cards.id DESC");
$query->execute();

?>