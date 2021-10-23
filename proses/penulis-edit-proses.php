<?php

include '../koneksi.php';

$id_penulis    = $_POST['id_penulis'];
$nama_penulis  = $_POST['nama_penulis'];
$kode_penulis   = $_POST['kode_penulis'];



if (isset($_POST['simpan'])) {

    $sql = "UPDATE `tbpenulis` SET `nama_penulis` = '$nama_penulis', `kode_penulis` = '$kode_penulis' WHERE `tbpenulis`.`id` = '$id_penulis'";

    echo $sql;

    if ($db->query($sql) == TRUE) {
        echo "ok";
        header("location:../index.php?p=penulis&status=1");
    } else {
        echo "up";
        header("location:../index.php?p=penulis&status=2");
    }
}
