<?php

include '../koneksi.php';

$id_penerbit    = $_POST['id_penerbit'];
$nama_penerbit  = $_POST['nama_penerbit'];
$kode_penerbit   = $_POST['kode_penerbit'];



if (isset($_POST['simpan'])) {

    $sql = "UPDATE `tbpenerbit` SET `nama_penerbit` = '$nama_penerbit', `kode_penerbit` = '$kode_penerbit' WHERE `tbpenerbit`.`id` = '$id_penerbit'";

    echo $sql;

    if ($db->query($sql) == TRUE) {
        echo "ok";
        header("location:../index.php?p=penerbit&status=1");
    } else {
        echo "up";
        header("location:../index.php?p=penerbit&status=2");
    }
}
