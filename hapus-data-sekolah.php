<?php
	session_start();
	include "koneksi.php";

 	if($_SESSION['level']=='admin'){
       	$gid = $_GET['idsek'];
        $hapus = mysqli_query($koneksi,"DELETE from tb_sekolah where id_sekolah='$gid'");
     	if ($hapus) {
            header("location:data-sekolah.php?pesan2=berhasil");
        } else {
            header("location:data-sekolah.php?pesan2=gagal");
        }
    }