<?php require("inc_header.php");
?>
<?php
$judul = "";
$isi = "";
$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "SELECT * FROM info WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = $r1["judul"];
    $isi = $r1["isi"];

    if ($isi == '') {
        $error = "Data tidak ditemukan";
    }
}

// submit form
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if ($judul == '' || $isi == '') {
        $error = "Silahkan Masukkan semua data judul dan isi.";
    }

    if (empty($error)) {
        if ($id != "") {
            $sql1 = "UPDATE info SET judul='$judul',isi='$isi',tgl_isi=now() WHERE id='$id'";
        } else {
            $sql1 = "INSERT INTO info(judul, isi) VALUES('$judul', '$isi')";
        }

        $q1 = mysqli_query($koneksi, $sql1);
        
        if ($q1) {
            $sukses = "Sukses Memasukkan Data";
        } else {
            $error = "Gagal Memasukkan Data";
        }
    }
}
?>
<h1>Info Admin Input Data</h1>
<div class="mb-3 row nav-item">
    <a href="info.php" class="nav-link">
        << Kembali ke Info Admin</a>
</div>

<?php
if ($error) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
?>

<?php
if ($sukses) {
?>
    <div class="alert alert-success" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php require("inc_footer.php") ?>