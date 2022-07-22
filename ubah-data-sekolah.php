<?php
	session_start();
	include "koneksi.php";

	if($_SESSION['level']=='admin'){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kordinat = $_POST['kordinat'];

		$ubah = mysqli_query($koneksi,"UPDATE tb_sekolah set nama_sekolah='$nama', alamat='$alamat', kordinat='$kordinat' where id_sekolah='$id'");
		if ($ubah) {
			header("location:data-sekolah.php?pesan=berhasil&aksi=ubah");
		} else {
			header("location:data-sekolah.php?pesan=gagal&aksi=ubah");
		}
	}else{
		echo "Maaf, Anda tidak boleh mengakses halaman ini. Silahkan kembali ke <a href='index.php'>Beranda</a>";
	}
?>