<?php
	session_start();
	include "koneksi.php";

	$gakun = $_GET['akun'];
	if($_GET['akun']=='driver'){
		$ganti = mysqli_query($koneksi,"UPDATE tb_user set level='$gakun' where id_user='$_SESSION[id_user]'");
		header("location:.");
	}elseif($_GET['akun']=='penumpang'){
		$ganti = mysqli_query($koneksi,"UPDATE tb_user set level='$gakun' where id_user='$_SESSION[id_user]'");
		header("location:.");
	}else{
		header("location:.");
	}
?>