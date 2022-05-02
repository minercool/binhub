<?php

$query = $conn->query("SELECT cards.*,username FROM cards,users WHERE (cards.seller = users.id) ORDER BY cards.id DESC");

?>