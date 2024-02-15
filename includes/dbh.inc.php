<?php

$host = "localhost";
$dbname="myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

// connect to database code
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Connection failed! You messed up bro" . $e->getMessage());
}