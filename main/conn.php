<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$db = "master_aset_it";

$conn = new mysqli($servername, $username, $password, $db);

if(!$conn) {
    die("Connection failed:" + mysqli_connect_error());
}

// echo "Connected successfully";
?>