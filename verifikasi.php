<?php require("inc_header.php") ?>
<?php
$err = '';
$sukses = '';

if (!isset($_GET['email']) or !isset($_GET['kode'])) {
    $err = "Data yang diperlukan untuk verfikasi tidak tersedia.";
} else {
    $email = $_GET['email'];
    $kode = $_GET['kode'];

    $sql1 = "SELECT * FROM members WHERE email='$email'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);

    if ($r1['status' == $kode]) {
        $sql2 = "UPDATE members SET status = '1' WHERE email = '$email'";
        mysqli_query($koneksi, $sql2);
        $sukses = "Akun telah aktif. Silahkan Login";
    } else {
        $err = "Kode tidak valid";
    }
}
?>
<h3>Halaman Verifikasi</h3>
<?php if ($err) {
    echo "<div class='error'>$err;</div>";
} ?>
<?php if ($sukses) {
    echo "<div class='sukses'>$sukses;</div>";
} ?>
<?php require("inc_footer.php") ?>