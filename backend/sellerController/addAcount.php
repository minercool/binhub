<?php
require_once '../config.php';
if(!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'seller')){
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$bin = $_POST['bin'];
$url = 'https://lookup.binlist.net';
$request_url = $url . '/' . substr($bin, 0, 6);
$curl = curl_init($request_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

$result = json_decode($response);
if ($result) {
    $brand = $result->scheme;
    $type = $result->type;
    $country = $result->country->alpha2;
    $bank = $result->bank->name;
    if ($brand != null && $type != null && $country != null && $bank != null) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $exp_month = $_POST['exp-month'];
        $exp_year = $_POST['exp-year'];
        $exp = strval($exp_month)."/".strval($exp_year);
        $phone = $_POST['phone'];
        $ssn = $_POST['ssn'];
        $ccv = $_POST['ccv'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip-code'];
        $id = $_SESSION['id'];
        $price = 2;
        $query = $conn->prepare("INSERT INTO cards VALUES('','$firstname','$lastname','$bin','$email','$type','$country','$address','$city','$state','$zip_code','$brand','$bank','$exp','$ssn','$ccv','$dob','$id','$price')");
        if($query->execute()){
            header("Location: ../../frontend/seller/addAccount.php");
        }else{
            echo $query->errorInfo();
        }
    } else {
        echo 'null';
    }
} else {
    echo "error";
}
