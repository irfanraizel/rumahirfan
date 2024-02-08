<?php
function url_dasar()
{
    // $_SERVER['SERVER_NAME'] : alamat website, misalkan websiteku.com
    // $_SERVER['SCRIPT_NAME'] : directory website, websiteku.com/about/ $_SERVER['SCRIPT_NAME']:about
    $url_dasar = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}
// ambil gambar
function ambil_gambar($id_tulisan)
{
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['isi'];

    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1]; // ../gambar/filename.jpg
    $gambar = str_replace("../gambar/", url_dasar() . "/gambar/", $gambar);
    return $gambar;
}

// ambil kutipan
function ambil_kutipan($id_tulisan)
{
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['kutipan'];

    return $text;
}

// ambil judul
function ambil_judul($id_tulisan)
{
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['judul'];

    return $text;
}

// ambil isi
function ambil_isi($id_tulisan)
{
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = strip_tags($r1['isi']);

    return $text;
}

// bersihkan judul
function bersihkan_judul($judul)
{
    $judul_baru = strtolower($judul);
    $judul_baru = preg_replace("/[^a-zA-Z0-9\s]/", "", $judul_baru);
    $judul_baru = str_replace(" ", "-", $judul_baru);

    return $judul_baru;
}

// buat link halaman
function buat_link_halaman($id)
{
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = bersihkan_judul($r1['judul']);

    return url_dasar() . "/halaman.php/$id/$judul";
}

function dapatkan_id()
{
    $id = "";
    if (isset($_SERVER['PATH_INFO'])) {
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/", "", $id);
    }
    return $id;
}


function set_isi($isi)
{
    $isi = str_replace("../gambar/", url_dasar() . "/gambar/", $isi);
    return $isi;
}


function maximum_kata($isi, $maximum)
{
    $array_isi = explode(" ", $isi);
    $array_isi = array_slice($array_isi, 0, $maximum);
    $isi1 = implode(" ", $array_isi);
    return $isi1;
}

function tutors_foto($id)
{
    global $koneksi;
    $sql1 = "SELECT * FROM tutors WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $foto = $r1['foto'];

    if ($foto) {
        return $foto;
    } else {
        return 'tutors_default_picture.png';
    }
}

function buat_link_tutors($id)
{
    global $koneksi;
    $sql1 = "SELECT * FROM tutors WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = bersihkan_judul($r1['nama']);

    return url_dasar() . "/tutors.php/$id/$nama";
}

function partners_foto($id)
{
    global $koneksi;
    $sql1 = "SELECT * FROM partners WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $foto = $r1['foto'];

    if ($foto) {
        return $foto;
    } else {
        return 'partners_default_logo.png';
    }
}

function buat_link_partners($id)
{
    global $koneksi;
    $sql1 = "SELECT * FROM partners WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = bersihkan_judul($r1['nama']);

    return url_dasar() . "/partners.php/$id/$nama";
}

function ambil_isi_info($id, $kolom)
{
    global $koneksi;
    $sql1 = "SELECT $kolom FROM info WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    return $r1[$kolom];
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function kirim_email($email_penerima, $nama_penerima, $judul_email, $isi_email)
{
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'irfanraizel@gmail.com';
    $mail->Password = 'xndxrhxtobvfigkh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('irfanraizel@gmail.com');

    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);

    $mail->Subject = $judul_email;
    $mail->Body = $isi_email;

    $mail->send();

    echo "<script>alert('sukses sent');</script>";
}
