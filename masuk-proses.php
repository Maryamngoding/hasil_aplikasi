<?php
	session_start();
	include "koneksi.php";

	if (isset($_POST['masuk'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = mysqli_query($koneksi, "SELECT * from tb_penumpang where email='$email'");
		$user2 = mysqli_fetch_array($user);

		$cekuser = mysqli_query($koneksi, "SELECT * from tb_user where email='$email' and password='$password'");
		$cekuser2 = mysqli_fetch_array($cekuser);
		$cekjml = mysqli_num_rows($cekuser);

		if ($cekjml == 0) {
			header("location:login.php?pesan=gagal");
		} else {
			$_SESSION['email'] = $email;
			$_SESSION['id_penumpang'] = $user2['id_penumpang'];
			$_SESSION['username'] = $cekuser2['username'];
			$_SESSION['id_user'] = $cekuser2['id_user'];
			$_SESSION['nama'] = $user2['nama_penumpang'];
			$_SESSION['level'] = $cekuser2['level'];

			header("location:.");
		}
	}
?>