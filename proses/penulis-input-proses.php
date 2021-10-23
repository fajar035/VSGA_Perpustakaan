<?php

include '../koneksi.php';
$kode_penulis = $_POST['kode_penulis'];
$nama_penulis = $_POST['nama_penulis'];


// Save data
if (isset($_POST['simpan'])) {

    // Insert into database
    $sql = "INSERT INTO `tbpenulis` 
	(`kode_penulis`,`nama_penulis`) 
	VALUES 
	('$kode_penulis','$nama_penulis')";
    echo $sql;

    if ($db->query($sql) == TRUE) {
        echo "ok";
        header("location:../index.php?p=penulis&status=1");
    } else {
        echo "up";
        header("location:../index.php?p=penulis&status=2");
    }
}
