<?php require("inc_header.php") ?>
<?php
$sukses = '';
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";

// Delete
$op = (isset($_GET['op'])) ? $_GET['op'] : "";
if ($op == "delete") {
    $id = $_GET['id'];
    $sql1 = "SELECT foto FROM partners WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    @unlink("../gambar/".$r1['foto']);


    $sql1 = "DELETE FROM partners WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {      
        $sukses = "Berhasil Hapus Data";
    }
}

?>
<h1>Admin Partners</h1>
<p>
    <a href="partners_input.php">
        <input type="button" class="btn btn-primary" value="Buat Partners Baru">
    </a>
</p>
<?php
if ($sukses) {
?>
    <div class="alert alert-success" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form class="row g-3" method="get" action="">
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="Masukkan kata kunci" name="katakunci" value="<?php echo $katakunci ?>">
    </div>
    <div class="col-auto">
        <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary">
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-2">Foto</th>
            <th>Nama</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqltambahan = '';
        $perhalaman = 4;
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            for ($x = 0; $x < count($array_katakunci); $x++) {
                $sqlcari[] = "(nama LIKE '%" . $array_katakunci[$x] . "%' OR isi LIKE '%" . $array_katakunci[$x] . "%')";
            }
            $sqltambahan = " WHERE " . implode(" OR ", $sqlcari);
        }
        $sql1 = "SELECT * FROM partners $sqltambahan";
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $mulai = ($page > 1) ? ($page * $perhalaman) - $perhalaman : 0;
        $q1 = mysqli_query($koneksi, $sql1);
        $total = mysqli_num_rows($q1);
        $pages = ceil($total / $perhalaman);
        $nomor = $mulai + 1;
        $sql1 = $sql1 . " ORDER BY id DESC LIMIT $mulai,$perhalaman";

        $q1 = mysqli_query($koneksi, $sql1);
        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><img src="../gambar/<?php echo partners_foto($r1['id'])?>" style="max-height:100px;max-width:100px;"/></td>
                <td><?php echo $r1['nama'] ?></td>
                <td>
                    <a href="partners_input.php?id=<?php echo $r1['id'] ?>">
                        <span class="badge text-bg-warning">Edit</span>
                    </a>
                    <a href="partners.php?op=delete&id=<?php echo $r1['id'] ?>" onclick="return confirm('Apakah Yakin Menghapus Data?')">
                        <span class="badge text-bg-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<nav aria-label="Page Navigation Example" class="nav justify-content-center">
    <ul class="pagination">
        <?php
        $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <li class="page-item">
                <a href="partners.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>
<?php require("inc_footer.php") ?>