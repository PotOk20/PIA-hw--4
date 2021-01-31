<?php

$db_servername = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "films";
$conn = mysqli_connect($db_servername, $db_user, $db_pass, $db_name);




$db = new PDO('mysql:host=localhost; dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$mysqli = new mysqli("localhost", "root", "", "films");


if(!$conn){
    die("Failed to connect: " . mysqli_connect_error());
}

if (mysqli_connect_errno()){
    printf("Failed to connect: %s\n", mysqli_connect_error());
    exit();
}

?>