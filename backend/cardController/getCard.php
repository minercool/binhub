<?php
$bank = $_POST['bank'];
$country = $_POST['country'];
$brand = $_POST['brand'];
$price = $_POST['price'];

$arr = array(
    "bank" => $bank,
    "country" => $country,
    "brand" => $brand,
    "price" => $price
);

$array = array($bank,$country,$brand,$price);

if($bank != NULL && $country != NULL && $brand != NULL && $price != NULL){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users 
    WHERE ((bank = '$bank') AND (country = '$country') AND (brand = '$brand') AND (price = '$price') AND (cards.seller = users.id))
    "); 
    //header('Location: findCcv.php');

}elseif(($bank != NULL) && ($country == NULL) && ($brand == NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank = '$bank') AND (cards.seller = users.id))
    ");
    //header('Location: findCcv.php');

}elseif(($bank == NULL) && ($country != NULL) && ($brand == NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((country = '$country') AND (cards.seller = users.id))
    ");
    //header('Location: findCcv.php');

}elseif(($bank == NULL) && ($country == NULL) && ($brand != NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((brand = '$brand') AND (cards.seller = users.id))
    ");
   // header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country == NULL) && ($brand == NULL) && ($price != NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((price = '$price') AND (cards.seller = users.id))
    ");
   // header('Location: ../../frontend/user/findCcv.php');

//////////
}elseif(($bank != NULL) && ($country != NULL) && ($brand == NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank = '$bank') AND (country = '$country') AND (cards.seller = users.id))
    ");
   // header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank != NULL) && ($country == NULL) && ($brand != NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank = '$bank') AND (brand = '$brand') AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank != NULL) && ($country == NULL) && ($brand == NULL) && ($price != NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank = '$bank') AND (price = '$price')  AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');

/////////
}elseif(($bank == NULL) && ($country != NULL) && ($brand != NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((country = '$country') AND (brand = '$brand') AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country != NULL) && ($brand == NULL) && ($price != NULL)){
        $query = $conn->query("SELECT cards.*,username
        FROM cards,users
        WHERE ((country = '$country') AND (price = '$price') AND (cards.seller = users.id))
        ");
        //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country != NULL) && ($brand != NULL) && ($price != NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((country = '$country') AND (brand = '$brand') AND (price = '$price') AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country == NULL) && ($brand != NULL) && ($price != NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((brand = '$brand') AND (price = '$price') AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');

/////
}elseif(($bank == NULL) && ($country != NULL) && ($brand != NULL) && ($price != NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((country = '$country') AND(brand = '$brand') AND (price = '$price')  AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank != NULL) && ($country != NULL) && ($brand != NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank = '$bank') && (country = '$country') && (brand = '$brand')  AND (cards.seller = users.id))
    ");
    //header('Location: ../../frontend/user/findCcv.php');
    
}elseif(($bank == NULL) && ($country == NULL) && ($brand == NULL) && ($price == NULL)){
    $query = $conn->query("SELECT cards.*,username
    FROM cards,users
    WHERE (cards.seller = users.id)
    ");
    //header('Location: findCcv.php');

}else{
    $query = $conn->query("SELECT cards.*,username
     FROM cards,users
    WHERE (
        (bank = '$bank' OR '$bank' IS NULL) OR 
        (country = '$country' OR '$country' IS NULL) OR 
        (brand = '$brand' OR '$brand' IS NULL) OR 
        (price = '$price' OR '$price' IS NULL) AND
        (cards.seller = users.id)
        )
    ");
    //header('Location: ../../frontend/user/findCcv.php');

}




?>