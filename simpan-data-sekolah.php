<?php
	session_start();
	include "koneksi.php";

	if($_SESSION['level']=='admin'){
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kordinat = $_POST['kordinat'];

		$tambah = mysqli_query($koneksi,"INSERT into tb_sekolah values ('','$nama','$alamat','$kordinat')");
		if ($tambah) {
			header("location:data-sekolah.php?pesan=berhasil");
		} else {
			header("location:data-sekolah.php?pesan=gagal");
		}
	}else{
		echo "Maaf, Anda tidak boleh mengakses halaman ini. Silahkan kembali ke <a href='index.php'>Beranda</a>";
	}
?>