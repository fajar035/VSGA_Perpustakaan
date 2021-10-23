<?php

include '../koneksi.php';
$kode_kategori = $_POST['kode_kategori'];
$nama_kategori = $_POST['nama_kategori'];


// Save data
if (isset($_POST['simpan'])) {

    // Insert into database
    $sql = "INSERT INTO `tbkategori` 
	(`kode_kategori`,`nama_kategori`) 
	VALUES 
	('$kode_kategori','$nama_kategori')";
    echo $sql;

    if ($db->query($sql) == TRUE) {
        // echo "ok";
        header("location:../index.php?p=kategori&status=1");
    } else {
        // echo "up";
        header("location:../index.php?p=kategori&status=2");
    }
}
