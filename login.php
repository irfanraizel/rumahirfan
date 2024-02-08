<?php require("inc_header.php") ?>
<h3>Login Members</h3>
<?php
$email = '';
$password = '';
$err = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    var_dump($password);

    if ($email == '' or $password = '') {
        $err .= "<li>Silahkan masukkan semua data</li>";
    } else {
        // $sql1 = "SELECT * FROM members WHERE email='$email'";
        // $q1 = mysqli_query($koneksi, $sql1);
        // $r1 = mysqli_fetch_array($q1);
        // $n1 = mysqli_num_rows($q1);
        // var_dump($r1['password']);
        // if($password == $r1['password']) {
        //     $pass = "SAMA";
        // } else {
        //     $pass = "ORASAMACUY";
        // }
        $sql1 = "SELECT * FROM members WHERE email='$email'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $n1 = mysqli_num_rows($q1);

        if ($n1 > 0) {
            // Memverifikasi password
            if (password_verify($password, $r1['password'])) {
                $pass = "SAMA";
            } else {
                $pass = "ORASAMACUY";
            }
        } else {
            // Email tidak ditemukan
            $pass = "Email tidak ditemukan";
        }


        //$verifikasiPassword = password_verify($password, $r1['password']);

        // if ($r1['status'] != 1 && $n1 > 0) {
        //     $err .= "<li>Akun belum aktif, silahkan verifikasi</li>";
        // } else if ( $password != $r1['password'] && $n1 > 0 &&  $r1['status'] == 1) {
        //     $err .= "<li>Password tidak sesuai.</li>";
        // } else if ($n1 < 1) {
        //     $err .= "<li>Akun tidak ditemukan</li>";
        // }

        // if (empty($err)) {
        //     header("location:rahasia.php");
        //     exit();
        // }
        var_dump($pass);
    }

    // print_r($r1['password']);
}
?>
<?php if ($err) {
    echo "<div class='error'><ul class='pesan'>$err</ul></div>";
} ?>
</?php if($alert) { //echo $alert; }?>
<form action="" method="post">
    <table>
        <tr>
            <td class="label">Email</td>
            <td><input type="text" name="email" class="input" value="<?= $email ?>"></td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" class="input"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login" value="Login" class="tbl-biru"></input></td>
        </tr>
    </table>
</form>

<?php require("inc_footer.php") ?>