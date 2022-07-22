<?php
	session_start();
	include "koneksi.php";

	if(isset($_POST['simpan'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$nohp = $_POST['nohp'];
		$tl = $_POST['tl'];
		$tgl = $_POST['tgl'];
		$alamat = $_POST['alamat'];

		$user = mysqli_query($koneksi, "SELECT * from tb_penumpang where email='$email'");
		$user2 = mysqli_fetch_array($user);
		$cekuser = mysqli_query($koneksi, "SELECT * from tb_user where email='$email' and password='$password'");
		$cekuser2 = mysqli_fetch_array($cekuser);

		$update = mysqli_query($koneksi,"UPDATE tb_penumpang set username='$username', email='$email', nama_penumpang='$nama', tempat_lahir='$tl', tgl_lahir='$tgl', alamat='$alamat', nohp='$nohp' where id_penumpang='$_SESSION[id_penumpang]'");
		$user = mysqli_query($koneksi,"UPDATE tb_user set username='$username', email='$email' where id_user='$_SESSION[id_user]'");
		if ($update) {
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $cekuser2['username'];
			$_SESSION['nama'] = $user2['nama_penumpang'];
			$_SESSION['level'] = $cekuser2['level'];
			header("location:lengkapi-profil.php?pesan=berhasil");
		} else {
			header("location:lengkapi-profil.php?pesan=gagal");
		}
	}
?>