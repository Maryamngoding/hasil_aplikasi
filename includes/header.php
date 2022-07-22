  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.php" class="logo">
                          <img src="assets/images/logo.png" alt="" height="50px">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
                          <li class="scroll-to-section"><a href="tentang.php">Tentang</a></li>
                          <?php
                            if($_SESSION['level']=='penumpang'){
                          ?>
                          <li class="scroll-to-section"><a href="pergi.php">Pergi</a></li>
                          <?php
                            }elseif($_SESSION['level']=='driver'){
                          ?>
                          <li class="scroll-to-section"><a href="antar.php">Antar</a></li>
                          <?php
                            }elseif($_SESSION['level']=='admin'){
                          ?>
                          <li class="scroll-to-section"><a href="data-sekolah.php">Data Sekolah</a></li>
                          <?php
                            }else{
                              echo "<li class='scroll-to-section'><a href='login.php'>Masuk</a></li>";
                            }
                          ?>

                          <?php
                            if (isset($_SESSION['username'])) {
                          ?>
                          <li><a href="logout.php">Keluar</a></li>
                          <li><a href="lengkapi-profil.php"><?= $_SESSION['username'] ?></a></li>
                          <?php
                            } else {
                          ?> 
                          <li><a href="#daftar-penumpang">Daftar</a></li>
                          <?php } ?> 
                      </ul>      
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>