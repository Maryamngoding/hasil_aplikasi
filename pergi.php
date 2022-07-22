<?php
	session_start();
  error_reporting(0);
	include "koneksi.php";

  if ($_SESSION['username'] and $_SESSION['level']=='penumpang') {
    $profil = mysqli_query($koneksi, "SELECT * from tb_penumpang where username='$_SESSION[username]'");
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
            <h2>BERANGKAT</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <?php
        if (empty($_GET['pesan'])){
         echo "";
        } elseif ($_GET['pesan']=='gagal') {
          echo "<h6 align='center'><font color='red'>Transaksi gagal dilakukan!</font></h6>";
        } else {
          echo "<h6 align='center'><font color='green'>Profil anda berhasil diperbarui!</font></h6>";
        }
      ?>
      <form method="POST" action="detail-transaksi.php">
      <div class="col-md-6 mt-5">
        <fieldset class="mb-3">
          <label>Lokasi Tujuan</label>
          <select name="tujuan" class="form-control">
            <option>Pilih tujuan</option>
            <?php
              $qtujuan = mysqli_query($koneksi,"SELECT * FROM tb_sekolah");
              while($rtujuan = mysqli_fetch_array($qtujuan)){
            ?>
            <option value="<?= $rtujuan['id_sekolah'] ?>"><?= $rtujuan['nama_sekolah'] ?></option>
            <?php } ?>
          </select>
        </fieldset>
        <fieldset class="mb-3">
          <label>Lokasi Anda</label>
          <input type="text" name="saatini" class="form-control" required="">
        </fieldset>
      </div>
      <div class="col-md-6 mt-5">
        <fieldset class="mb-3">
          <label>Jarak</label>
          <input type="text" name="jarak" class="form-control" required="">
        </fieldset>
        <fieldset>
          <input type="submit" name="proses" class="btn btn-success" value="PROSES">
        </fieldset>
      </div>
      </form>
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