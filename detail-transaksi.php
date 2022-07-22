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


  <!-- ***** Header Area Start ***** -->
	<?php include "includes/header.php" ?>
  <!-- ***** Header Area End ***** -->

<?php
    if(isset($_POST['proses'])){
      $tujuan = $_POST['tujuan'];
      $anda = $_POST['saatini'];
      $jarak = $_POST['jarak'];
      $biaya = $jarak * 5000;
      $tgl = date("Y-m-d");

      $proses = mysqli_query($koneksi,"INSERT into tb_transaksi values ('','$tgl','$tujuan','$anda','baru','$jarak','$biaya','menunggu','$_SESSION[id_penumpang]')");
      if($proses){
        echo "";
      }else{
        header("location:pergi.php?pesan=gagal");
      }
    }
?>

  <!-- ***** Main Banner Area Start ***** -->
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h2>MENUNGGU DRIVER...</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  $qtujuan = mysqli_query($koneksi,"SELECT * from tb_sekolah where id_sekolah='$tujuan'");
  $rtujuan = mysqli_fetch_array($qtujuan);

  $qtrx = mysqli_query($koneksi,"SELECT * from tb_transaksi where id_transaksi='$tujuan'");
  $rtrx = mysqli_fetch_array($qtrx);
?>
  <div class="container">
    <div class="row">
      <a href="#" class="btn btn-primary btn-lg mt-4">
        Menunggu persetujuan driver
      </a>
      <div class="col-md-8 mt-5">
        <table border="0" width="100%">
          <tr>
            <td><h4>Tanggal Transaksi</h4></td>
            <td><h4>: <?php echo $tgl; ?></h4></td>
          </tr>
          <tr>
            <td><h4>Tujuan</h4></td>
            <td><h4>: <?php echo $rtujuan['nama_sekolah']; ?></h4></td>
          </tr>
          <tr>
            <td><h4>Posisi Anda</h4></td>
            <td><h4>: <?php echo $anda; ?></h4></td>
          </tr>
          <tr>
            <td><h4>Jarak</h4></td>
            <td><h4>: <?php echo $jarak; ?> km</h4></td>
          </tr>
        </table>
      </div>
      <div class="col-md-4 mt-5">
        <h5>Total biaya :</h5>
        <h1><font color="red">Rp <?php echo number_format($biaya); ?></font></h1>
      </div>
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