<?php
$server = "localhost";
$email = "root";
$password = "";
$db_name = "konser";

$conn = mysqli_connect($server, $email, $password, $db_name);

if (!$conn) {
    die("Gagal terhubung ke database " . mysqli_connect_error());
}