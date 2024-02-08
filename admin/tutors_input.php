<?php require("inc_header.php");
?>
<?php
$nama = "";
$isi = "";
$foto = "";
$foto_name = "";
$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "SELECT * FROM tutors WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1["nama"];
    $isi = $r1["isi"];
    $foto = $r1["foto"];

    if ($isi == '') {
        $error = "Data tidak ditemukan";
    }
}

// submit form
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $isi = $_POST['isi'];

    if ($nama == '' || $isi == '') {
        $error = "Silahkan Masukkan semua data nama dan isi.";
    }
    // Array ( [foto] => Array ( [name] => REDJADI.jpg [full_path] => REDJADI.jpg [type] => image/jpeg [tmp_name] => H:\PROGRAM\xampp\tmp\phpFAAC.tmp [error] => 0 [size] => 187058 ) )
    //print_r($_FILES);
    if($_FILES['foto']['name']){
        $foto_name = $_FILES['foto']['name'];
        $foto_file = $_FILES['foto']['tmp_name'];
        $detail_file = pathinfo($foto_name);
        $foto_ekstensi = $detail_file['extension'];
        //Array ( [dirname] => . [basename] => adi.jpg [extension] => jpg [filename] => adi )
        $ekstensi = ["jpg", "jpeg", "png", "gif"];
        if(!in_array($foto_ekstensi, $ekstensi)) {
            $error = "Ekstensi File yang diperbolehkan adalah jpg, jpeg, png, gif";
        }
    }

    if (empty($error)) {
        if($foto_name) {
            $direktori = "../gambar";
            @unlink($direktori."/$foto"); //delete foto ketika update/replace dengan foto baru
            $foto_name = "tutors_".time()."_".$foto_name;
            move_uploaded_file($foto_file, $direktori."/".$foto_name);

            $foto = $foto_name;
        }
        else {
            $foto_name = $foto; // memasukkan data dari data yang sebelumnya ada
        }

        if ($id != "") {
            $sql1 = "UPDATE tutors SET nama='$nama',foto='$foto_name',isi='$isi',tgl_isi=now() WHERE id='$id'";
        } else {
            $sql1 = "INSERT INTO tutors(nama, foto, isi) VALUES('$nama','$foto_name','$isi')";
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
<h1>Admin Input Data Tutors</h1>
<div class="mb-3 row nav-item">
    <a href="tutors.php" class="nav-link">
        << Kembali ke Admin Tutors</a>
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

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <?php  
                if($foto) {
                    echo "<img src='../gambar/$foto' style='max-height:100px; max-width:100px;'/>";
                }
            ?>
            <input type="file" class="form-control" name="foto" id="foto">
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