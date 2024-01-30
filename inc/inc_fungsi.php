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
function ambil_kutipan($id_tulisan) {
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['kutipan'];

    return $text;
}

// ambil judul
function ambil_judul($id_tulisan) {
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1['judul'];

    return $text;
}

// ambil isi
function ambil_isi($id_tulisan) {
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id_tulisan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $text =strip_tags($r1['isi']);

    return $text;
}

// bersihkan judul
function bersihkan_judul($judul){
    $judul_baru = strtolower($judul);
    $judul_baru = preg_replace("/[^a-zA-Z0-9\s]/", "", $judul_baru);
    $judul_baru = str_replace(" ","-", $judul_baru);

    return $judul_baru;
}

// buat link halaman
function buat_link_halaman($id){
    global $koneksi;
    $sql1 = "SELECT * FROM halaman WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul =bersihkan_judul($r1['judul']);

    return url_dasar()."/halaman.php/$id/$judul";
}

function dapatkan_id(){
    $id = "";
    if(isset($_SERVER['PATH_INFO'])){
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/", "", $id);
    }
    return $id;
}