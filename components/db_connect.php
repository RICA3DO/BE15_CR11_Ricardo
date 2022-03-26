<?php 

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "be15_cr11_petadoption_ricardo";


$connect = mysqli_connect($localhost, $username, $password, $dbname);


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
};