<?php
//http://localhost/rumahirfan/halaman.php/20/belajar-dimana-saja-kapan-saja
//print_r($_SERVER);
require_once("inc/inc_fungsi.php");
require_once("inc/inc_koneksi.php");
$id = dapatkan_id();

$sql1 = "SELECT * FROM halaman WHERE  id='$id'";
$q1 = mysqli_query($koneksi, $sql1);
require_once("inc_header.php");

require_once("inc_footer.php");
?>