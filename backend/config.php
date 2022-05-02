<?php
session_start();
$host='localhost';
$db = 'binhub';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$db";
    $conn = new PDO($dsn,$username,$password);
  } catch (Exception $error) {
    die('can not connect to database reason :'.$error->getMessage());
  }
?>