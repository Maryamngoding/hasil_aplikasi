<?php
	include "koneksi.php";

	if(isset($_POST['daftar'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$konfirmasi = $_POST['konfirmasi'];
		if ($password <> $konfirmasi) {
			echo "<font color='red'>Konfirmasi Password tidak cocok!</font>";
		} else {
			$daftar = mysqli_query($koneksi,"INSERT into tb_penumpang values ('','$username','$email','$nama','','','','','')");
			$user = mysqli_query($koneksi,"INSERT into tb_user values ('','$username','$email','$password','penumpang','','aktif')");
			if ($daftar) {
				header("location:login.php");
			} else {
				header("location:index.php?pesan=gagal#daftar-penumpang");
			}
		}
	}
?>