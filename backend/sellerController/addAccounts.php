<?php
set_time_limit(1000);
require_once '../config.php';
if (!(isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || !(isset($_SESSION['role'])) || ($_SESSION['role'] != 'seller')) {
    session_destroy();
    header('Location: ../../frontend/login.php');
}
$text =  $_POST['text'];
$id = $_SESSION['id'];
$url = 'https://lookup.binlist.net';

foreach (explode("\n", $text) as $line) {
    $line = trim($line);
    if (empty($line)) {
        continue;
    }

    [
        $bin, $exp_month, $exp_year, $cvv,
        $firstname, $lastname,
        $address, $zip_code, $city, $state,
        $phone, $email
    ] = explode('|', $line);
    $exp = strval($exp_month) . "/" . strval($exp_year);
    $short_bin = substr($bin, 0, 6);
    $request_url = $url . '/' . $short_bin;
    sleep(2.5);
    $curl = curl_init($request_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response);
    if ($result) {
        $brand = $result->scheme;
        $type = $result->type;
        $country = $result->country->name;
        $alpha2 = $result->country->alpha2;
        if (!isset($result->bank->name)) {
            $bank = "UNKOWN";
        } else {
            $bank = $result->bank->name;
        }
        if ($brand != null && $type != null && $country != null && $bank != null) {
            $price = 2;
            $query = $conn->prepare("INSERT INTO cards VALUES('','$firstname','$lastname','$bin','$email','$type','$country','$alpha2','$address','$city','$state','$zip_code','$brand','$bank','$exp','','$cvv','','$id','$price','unsold')");
            $query->execute();
        } else {
            echo 'null';
        }
    } else {
        $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
        One or many cards are invalid but we added the valid ones.
       </div><br>';
    }
}
if ($_SESSION['alert'] == null) {
    $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
    Added successfully.
    </div><br>';
}
header('Location: ../../frontend/seller/addAccounts.php');
