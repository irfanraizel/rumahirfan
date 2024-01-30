<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "rumahirfan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi) {
    die("Gagal!");
}