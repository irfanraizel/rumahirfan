<?php
require_once("inc_header.php");
?>
<!-- untuk home -->
<section id="home">
    <?php  ?>
    <img src="<?php echo ambil_gambar(20) ?>" />
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan(20) ?></p>
        <h2><?php echo ambil_judul(20) ?></h2>
        <p><?php echo maximum_kata(ambil_isi(20), 30) . " . . ." ?></p>
        <p><a href="<?php echo buat_link_halaman(20) ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
    </div>
</section>

<!-- untuk courses -->
<section id="courses">
    <div class="kolom">
        <p class="deskripsi"><?php echo ambil_kutipan(19) ?></p>
        <h2><?php echo ambil_judul(19) ?></h2>
        <p><?php echo maximum_kata(ambil_isi(19), 30) . " . . ." ?></p>
        <p><a href="<?php echo buat_link_halaman(19) ?>" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
    </div>
    <img src="<?php echo ambil_gambar(19) ?>" style="width: 626px;" />
</section>

<!-- untuk tutors -->
<section id="tutors">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Tutors</p>
            <h2>Tutors</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
        </div>

        <div class="tutor-list">
            <?php
            $sql1 = "SELECT * FROM tutors ORDER BY id DESC";
            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
            ?>
                <div class="kartu-tutor">
                    <a href="<?php echo buat_link_tutors($r1['id']) ?>" >
                        <img src="<?php echo url_dasar() . "/gambar/" . tutors_foto($r1['id']) ?>" />
                        <p><?php echo $r1['nama'] ?></p>
                    </a>
                </div>
            <?php
            };
            ?>
        </div>
    </div>
</section>

<!-- untuk partners -->
<section id="partners">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Partners</p>
            <h2>Partners</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
        </div>

        <div class="partner-list">
            <?php
            $sql1 = "SELECT * FROM partners ORDER BY id ASC";
            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
            ?>
                <div class="kartu-partner">
                    <a href="<?php echo buat_link_partners($r1['id']) ?>" style="display:flex; justify-content:center;align-items:center; margin:20px">
                        <img src="<?php echo url_dasar() . "/gambar/" . partners_foto($r1['id']) ?>" />
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
require_once("inc_footer.php");
?>