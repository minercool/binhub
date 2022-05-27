<?php
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true)){
    header('Location: ../../frontend/login.php');
}

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
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users 
    WHERE ((bank LIKE '$bank') AND (alpha2 = '$country') AND (brand = '$brand') AND (price = '$price') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    "); 
    $query->execute();
    //header('Location: findCcv.php');

}elseif(($bank != NULL) && ($country == NULL) && ($brand == NULL) && ($price == NULL)){
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank LIKE '$bank') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
    $query->execute();
    //header('Location: findCcv.php');

}elseif(($bank == NULL) && ($country != NULL) && ($brand == NULL) && ($price == NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((alpha2 = '$country') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: findCcv.php');

}elseif(($bank == NULL) && ($country == NULL) && ($brand != NULL) && ($price == NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((brand = '$brand') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
   // header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country == NULL) && ($brand == NULL) && ($price != NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((price = '$price') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
   // header('Location: ../../frontend/user/findCcv.php');

//////////
}elseif(($bank != NULL) && ($country != NULL) && ($brand == NULL) && ($price == NULL)){
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank LIKE '$bank') AND (alpha2 = '$country') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
   // header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank != NULL) && ($country == NULL) && ($brand != NULL) && ($price == NULL)){
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank LIKE '$bank') AND (brand = '$brand') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank != NULL) && ($country == NULL) && ($brand == NULL) && ($price != NULL)){
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank LIKE '$bank') AND (price = '$price')  AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

/////////
}elseif(($bank == NULL) && ($country != NULL) && ($brand != NULL) && ($price == NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((alpha2 = '$country') AND (brand = '$brand') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country != NULL) && ($brand == NULL) && ($price != NULL)){
        $query = $conn->prepare("SELECT cards.*,username
        FROM cards,users
        WHERE ((alpha2 = '$country') AND (price = '$price') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
        ORDER BY cards.id DESC
        ");
         $query->execute();
        //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country != NULL) && ($brand != NULL) && ($price != NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((alpha2 = '$country') AND (brand = '$brand') AND (price = '$price') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank == NULL) && ($country == NULL) && ($brand != NULL) && ($price != NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((brand = '$brand') AND (price = '$price') AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

/////
}elseif(($bank == NULL) && ($country != NULL) && ($brand != NULL) && ($price != NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((alpha2 = '$country') AND(brand = '$brand') AND (price = '$price')  AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

}elseif(($bank != NULL) && ($country != NULL) && ($brand != NULL) && ($price == NULL)){
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((bank LIKE '$bank') && (alpha2 = '$country') && (brand = '$brand')  AND (cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');
    
}elseif(($bank == NULL) && ($country == NULL) && ($brand == NULL) && ($price == NULL)){
    $query = $conn->prepare("SELECT cards.*,username
    FROM cards,users
    WHERE ((cards.seller = users.id) AND (cards.status = 'unsold'))
    ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: findCcv.php');

}else{
    $bank = $bank . "%";
    $query = $conn->prepare("SELECT cards.*,username
     FROM cards,users
    WHERE (
        (bank LIKE '$bank' OR '$bank' IS NULL) OR 
        (alpha2 = '$country' OR '$country' IS NULL) OR 
        (brand = '$brand' OR '$brand' IS NULL) OR 
        (price = '$price' OR '$price' IS NULL) AND
        (cards.seller = users.id) AND (cards.status = 'unsold')
        )
        ORDER BY cards.id DESC
    ");
     $query->execute();
    //header('Location: ../../frontend/user/findCcv.php');

}
