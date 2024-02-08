<?php require("inc_header.php") ?>
<?php
$sukses = '';
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";

// Delete
$op = (isset($_GET['op'])) ? $_GET['op'] : "";
if ($op == "delete") {
    $sql1 = "DELETE FROM members WHERE id='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {      
        $sukses = "Berhasil Hapus Data";
    }
}

?>
<h1>Admin Members</h1>
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
        <input type="submit" name="cari" value="Cari Members" class="btn btn-secondary">
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-2">Email</th>
            <th>Nama</th>
            <th class="col-2">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqltambahan = '';
        $perhalaman = 4;
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            for ($x = 0; $x < count($array_katakunci); $x++) {
                $sqlcari[] = "(nama_lengkap LIKE '%" . $array_katakunci[$x] . "%' OR email LIKE '%" . $array_katakunci[$x] . "%')";
            }
            $sqltambahan = " WHERE " . implode(" OR ", $sqlcari);
        }
        $sql1 = "SELECT * FROM members $sqltambahan";
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
                <td><?php echo $r1['email'] ?></td>
                <td><?php echo $r1['nama_lengkap'] ?></td>
                <td>
                    <?php  if($r1['status'] == 1){
                        ?>
                        <span class="badge badge-success" style="background-color: #378805;">Aktif</span>
                        <?php
                    }else {
                        ?>
                        <span class="badge badge-light" style="background-color: #bbbbbb;">Belum Aktif</span>
                        <?php
                    } ?>
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
                <a href="members.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>
<?php require("inc_footer.php") ?>