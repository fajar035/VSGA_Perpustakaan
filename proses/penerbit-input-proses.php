<?php

include '../koneksi.php';
$kode_penerbit = $_POST['kode_penerbit'];
$nama_penerbit = $_POST['nama_penerbit'];


// Save data
if (isset($_POST['simpan'])) {

    // Insert into database
    $sql = "INSERT INTO `tbpenerbit` 
	(`kode_penerbit`,`nama_penerbit`) 
	VALUES 
	('$kode_penerbit','$nama_penerbit')";
    echo $sql;

    if ($db->query($sql) == TRUE) {
        // echo "ok";
        header("location:../index.php?p=penerbit&status=1");
    } else {
        // echo "up";
        header("location:../index.php?p=penerbit&status=2");
    }
}
