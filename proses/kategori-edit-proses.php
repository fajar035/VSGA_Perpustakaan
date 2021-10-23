<?php

include '../koneksi.php';

$id_kategori    = $_POST['id_kategori'];
$nama_kategori  = $_POST['nama_kategori'];
$kode_kategori   = $_POST['kode_kategori'];



if (isset($_POST['simpan'])) {

    $sql = "UPDATE `tbkategori` SET `nama_kategori` = '$nama_kategori', `kode_kategori` = '$kode_kategori' WHERE `tbkategori`.`id` = '$id_kategori'";

    echo $sql;

    if ($db->query($sql) == TRUE) {
        echo "ok";
        header("location:../index.php?p=kategori&status=1");
    } else {
        echo "up";
        header("location:../index.php?p=kategori&status=2");
    }
}
