<?php
	session_start();
	error_reporting(0);
	include "koneksi.php";
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

  <!-- ***** Main Banner Area Start ***** -->
  <div class="swiper-container" id="top">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="slide-inner" style="background-image:url(assets/images/slide-01.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2>go<em>SKUL</em> Pergi sekolah <em>tanpa masalah</em></h2>
                  <div class="div-dec"></div>
                  <p>Anda ingin pergi sekolah tanpa masalah?<br>Gunakan aplikasi goSKUL, kami siap mengantar Anda!</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="#daftar-penumpang">Daftar Akun</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
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

  <section class="calculator" id="daftar-penumpang">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="left-image">
            <img src="assets/images/calculator-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>Penumpang atau Driver</h6>
            <h4>Daftarkan Diri Anda!</h4>
            <?php
            	if (empty($_GET['pesan'])){
            		echo "";
            	} else {
            		echo "<h6 align='center'><font color='red'>Pendaftaran Gagal!</font></h6>";
            	}
            ?>
          </div>
          <form id="calculate" action="daftar-proses.php" method="post">
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <label for="name">Nama Lengkap</label>
                  <input type="name" name="nama" id="name" placeholder="" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="email">Username</label>
                  <input type="text" name="username" id="username" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="subject">Password</label>
                  <input type="password" name="password" id="subject" placeholder="" minlength="8" required="">
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="subject">Konfirmasi Password</label>
                  <input type="password" name="konfirmasi" id="subject" placeholder="" minlength="8" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" name="daftar" id="form-submit" class="orange-button">Daftar</button>
                </fieldset>
              </div>
            </div>
          </form>
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