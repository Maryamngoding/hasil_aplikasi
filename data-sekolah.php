<?php
	session_start();
  error_reporting(0);
	include "koneksi.php";

  if ($_SESSION['email'] and $_SESSION['level']=='admin') {
    $profil = mysqli_query($koneksi, "SELECT * from tb_user where email='$_SESSION[email]'");
    $rprofil = mysqli_fetch_array($profil);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

  	<?php include "includes/head.php" ?>

  </head>

<body>
  <?php echo $tujuan['tujuan']; ?>


  <!-- ***** Header Area Start ***** -->
	<?php include "includes/header.php" ?>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h2>DATA SEKOLAH</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mt-5">Data Sekolah</h3>
            <?php
              if (empty($_GET['pesan2'])){
                echo "";
              } elseif($_GET['pesan2']=='gagal') {
                echo "<h6 align='center'><font color='red'>Data gagal dihapus!</font></h6>";
              } else {
                echo "<h6 align='center'><font color='green'>Data berhasil dihapus!</font></h6>";
              }
            ?>
        <table class="table table-responsive mt-4" width="100%">
          <tr>
            <th>#</th>
            <th>Nama Sekolah</th>
            <th>Alamat</th>
            <th>Kordinat</th>
            <th>Aksi</th>
          </tr>
          <?php
            $qsekolah = mysqli_query($koneksi,"SELECT * from tb_sekolah order by id_sekolah DESC");
            $no = 1;
            while($rsekolah = mysqli_fetch_array($qsekolah)){
          ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $rsekolah['nama_sekolah'] ?></td>
            <td><?= $rsekolah['alamat'] ?></td>
            <td><?= $rsekolah['kordinat'] ?></td>
            <td>
              <a href="data-sekolah.php?aksi=ubah&idsek=<?= $rsekolah['id_sekolah'] ?>" class="btn btn-primary btn-sm">Ubah</a>
              <a href="hapus-data-sekolah.php?idsek=<?= $rsekolah['id_sekolah'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
          <?php $no++; } ?>
        </table>
      </div>

      <?php 
        if($_GET['aksi']==''){
      ?>
      <div class="col-lg-4">
        <form method="POST" action="simpan-data-sekolah.php">
          <h3 class="mt-5 mb-4">Tambah Data Sekolah</h3>
            <?php
              if (empty($_GET['pesan'])){
                echo "";
              } elseif($_GET['pesan']=='gagal') {
                echo "<h6 align='center'><font color='red'>Data gagal dimasukkan!</font></h6>";
              } else {
                echo "<h6 align='center'><font color='green'>Data berhasil dimasukkan!</font></h6>";
              }
            ?>
          <label>Nama Sekolah</label>
          <input type="text" name="nama" class="form-control" required=""><br>
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" required=""><br>
          <label>Kordinat</label>
          <input type="text" name="kordinat" class="form-control" required=""><br>
          <input type="submit" name="tambah" value="TAMBAH" class="btn btn-primary">
        </form>
      </div>
      <?php 
        } elseif ($_GET['aksi']=='ubah') {
          $gid = $_GET['idsek'];
          $tampil = mysqli_query($koneksi,"SELECT * from tb_sekolah where id_sekolah='$gid'");
          $rtampil = mysqli_fetch_array($tampil);
      ?>
      <div class="col-lg-4">
        <form method="POST" action="ubah-data-sekolah.php">
          <h3 class="mt-5 mb-4">Ubah Data Sekolah</h3>
            <?php
              if (empty($_GET['pesan'])){
                echo "";
              } elseif($_GET['pesan']=='gagal') {
                echo "<h6 align='center'><font color='red'>Data gagal diubah!</font></h6>";
              } else {
                echo "<h6 align='center'><font color='green'>Data berhasil diubah!</font></h6>";
              }
            ?>
          <input type="hidden" name="id" class="form-control" value="<?= $rtampil['id_sekolah'] ?>" required="">
          <label>Nama Sekolah</label>
          <input type="text" name="nama" class="form-control" value="<?= $rtampil['nama_sekolah'] ?>" required=""><br>
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?= $rtampil['alamat'] ?>" required=""><br>
          <label>Kordinat</label>
          <input type="text" name="kordinat" class="form-control" value="<?= $rtampil['kordinat'] ?>" required=""><br>
          <input type="submit" name="tambah" value="UBAH" class="btn btn-primary">
        </form>
      </div>
      <?php 
        }
      ?>
    </div>
  </div>

  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <h4>go<em>SKUL</em> Memudahkan pengantaran Anda ke Sekolah</h4>
        </div>
        <div class="col-lg-7">
          <div class="buttons">
            <div class="green-button">
              <a href="tentang.php">Selengkapnya</a>
            </div>
            <div class="orange-button">
              <a href="kontak.php">Kontak Kami</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="partners">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/client-01.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/client-01.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/client-01.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/client-01.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/client-01.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/client-01.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 Mexant Co., Ltd. All Rights Reserved. 
          
          <br>Designed by <a title="CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var interleaveOffset = 0.5;

      var swiperOptions = {
        loop: true,
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        on: {
          progress: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }      
          },
          touchStart: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },
          setTransition: function(speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          }
        }
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
  </body>
</html>
<?php
  }else{
    header("location:.");
  }
?>