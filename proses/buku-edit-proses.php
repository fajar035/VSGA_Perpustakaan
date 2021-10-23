<?php

include'../koneksi.php';

$id_buku    = $_POST['id_buku'];
$kode_buku    = $_POST['kode_buku'];
$judulbuku  = $_POST['judulbuku'];
$kategori   = $_POST['kategori'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];



If(isset($_POST['simpan'])){

	$sql = "UPDATE `tbbuku` SET `judulbuku` = '$judulbuku', `pengarang` = '$pengarang', `kategori` = '$kategori', `penerbit` = '$penerbit' WHERE `tbbuku`.`id` = '$id_buku'";

	echo $sql;

	if ($db->query($sql) == TRUE) {
        header("location:../index.php?p=buku&status=1");
	} else {
		header("location:../index.php?p=buku&status=2");
	}
}
