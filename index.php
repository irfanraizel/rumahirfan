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
<?php 
require_once("inc_header.php");
?>
        <!-- untuk home -->
        <section id="home">
            <?php  ?>
            <img src="<?php echo ambil_gambar(20)?>" />
            <div class="kolom">
                <p class="deskripsi"><?php echo ambil_kutipan(20) ?></p>
                <h2><?php echo ambil_judul(20)?></h2>
                <p><?php echo ambil_isi(20) ?></p>
                <p><a href="<?php echo buat_link_halaman(20) ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom">
                <p class="deskripsi"><?php echo ambil_kutipan(19) ?></p>
                <h2><?php echo ambil_judul(19)?></h2>
                <p><?php echo ambil_isi(19) ?></p>
                <p><a href="<?php echo buat_link_halaman(19) ?>" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
            </div>
            <img src="<?php echo ambil_gambar(19)?>" style="width: 626px;"/>
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
                    <div class="kartu-tutor">
                        <img src="https://dfu1k3y1rami2.cloudfront.net/wp-content/uploads/2014/07/26195109/2020_cb.jpg" />
                        <p>Jason Lee Scott</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://images.ctfassets.net/1wryd5vd9xez/4DxzhQY7WFsbtTkoYntq23/a4a04701649e92a929010a6a860b66bf/https___cdn-images-1.medium.com_max_2000_1_Y6l_FDhxOI1AhjL56dHh8g.jpeg" />
                        <p>John Doe</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://images.fastcompany.net/image/upload/w_596,c_limit,q_auto:best,f_auto/fc/3021752-inline-i-1-why-square-designed-its-new-offices-to-work-like-a-city.jpg" />
                        <p>Michael Dell</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://blogs-images.forbes.com/jackkelly/files/2019/06/Jack-Kelly_avatar_1559658819-400x400.jpg" />
                        <p>Bruce Wills</p>
                    </div>
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
                    <div class="kartu-partner">
                        <img src="https://www.designevo.com/res/templates/thumb_small/black-wheat-and-mortarboard.png" />
                    </div>
                    <div class="kartu-partner">
                        <img src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-63.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img src="https://www.designevo.com/res/templates/thumb_small/encircled-branches-and-book.png" />
                    </div>
                    <div class="kartu-partner">
                        <img src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg" />
                    </div>
                </div>
            </div>
        </section>
<?php 
require_once("inc_footer.php");
?>