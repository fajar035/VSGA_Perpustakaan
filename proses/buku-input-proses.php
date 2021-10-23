<?php

include '../koneksi.php';
$kode_buku = $_POST['kode_buku'];
$judulbuku = $_POST['judulbuku'];
$kategori = $_POST['kategori'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$status = 0;


// Save data
if (isset($_POST['simpan'])) {

	// Insert into database
	$sql = "INSERT INTO `tbbuku` 
	(`kode_buku`,`judulbuku`, `kategori`, `pengarang`, `penerbit`) 
	VALUES 
	('$kode_buku','$judulbuku', '$kategori', '$pengarang', '$penerbit')";
	echo $sql;

	if ($db->query($sql) == TRUE) {
		// echo "ok";
		header("location:../index.php?p=buku&status=1");
	} else {
		// echo "up";
		header("location:../index.php?p=buku&status=2");
	}
}
