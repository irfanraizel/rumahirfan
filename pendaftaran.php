<?php require_once('inc_header.php') ?>
<h3>Pendaftaran</h3>
<?php
$email = '';
$nama_lengkap = '';
$err = '';
$sukses = '';

if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if ($email == '' or $nama_lengkap == '' or $password == '' or $konfirmasi_password == '') {
        $err .= "<li>Silahkan Masukkan Semua Data.</li>";
    }

    // Cek Email pendaftar
    if ($email != '') {
        $sql1 = "SELECT email FROM members WHERE email = '$email'";
        $q1 = mysqli_query($koneksi, $sql1);
        $n1 = mysqli_num_rows($q1);

        if ($n1 > 0) {
            $err .= "<li>Email yang kamu masukkan sudah terdaftar.</li>";
        }

        // Validasi Email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err .= "<li>Email tidak valid</li>";
        }
    }
    // cek password & konfirmasi password
    if ($password != $konfirmasi_password) {
        $err .= "<li>Password & Konfirmasi Password tidak sesuai</li>";
    } else if (strlen($password) < 6) {
        $err .= "<li>Panjang karakter minimal 6</li>";
    }

    if (empty($err)) {
        $status = md5(rand(0,1000));
        $judul_email = "Halaman Konfirmasi Pendaftaran";
        $isi_email = "Akun yang kamu miliki dengan email <b>$email</b> telah siap digunakan";
        $isi_email .= "Sebelumnya silahkan melakukan aktivasi email di link dibawah ini.";
        $isi_email .= url_dasar()."/verifikasi.php?email=$email&kode=$status";

        kirim_email($email, $nama_lengkap, $judul_email, $isi_email);

        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql1 = "INSERT INTO members(email, nama_lengkap, password, status) VALUES('$email', '$nama_lengkap', '$password', '$status')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Proses Berhasil. Silahkan cek email untuk verifikasi";
        }

    }
}
?>
<?php if ($err) {
    echo "<div class='error'><ul>$err</ul></div>";
} ?>
<?php if ($sukses) {
    echo "<div class='sukses'>$sukses</div>";
} ?>
<form action="" method="post">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
                <input type="text" name="email" class="input" value="<?php echo $email ?>">
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap ?>">
            </td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td>
                <input type="password" name="password" class="input">
            </td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td>
                <input type="password" name="konfirmasi_password" class="input">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="Daftar" class="tbl-biru">
            </td>
        </tr>
    </table>
</form>

<?php require_once('inc_footer.php') ?>