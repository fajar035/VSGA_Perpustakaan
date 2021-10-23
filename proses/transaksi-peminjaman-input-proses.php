<?php

include '../koneksi.php';
$kode_transaksi = $_POST['kode_transaksi'];
$idanggota      = $_POST['idanggota'];
$idbuku         = $_POST['idbuku'];
$tglpinjam      = $_POST['tglpinjam'];
$status_peminjaman = 1;


// var_dump($_POST);
// // Save data
if (isset($_POST['simpan'])) {

    // Insert into database
    $sql = "INSERT INTO `tbtransaksi` 
	(`kode_transaksi`,`idanggota`,`idbuku`,`tglpinjam`, `status_peminjaman`) 
	VALUES 
	('$kode_transaksi','$idanggota','$idbuku','$tglpinjam', '$status_peminjaman')";
    echo $sql;

    if ($db->query($sql) == TRUE) {
        $updateBuku = "UPDATE `tbbuku` SET `status` = '$status_peminjaman' WHERE `tbbuku`.`id` = '$idbuku'";
        if ($db->query($updateBuku)) {
            // echo $updateBuku;
            echo "ok";
            header("location:../index.php?p=transaksi-peminjaman&status=1");
        }
    } else {
        echo "up";
        header("location:../index.php?p=transaksi-peminjaman&status=2");
    }
}
