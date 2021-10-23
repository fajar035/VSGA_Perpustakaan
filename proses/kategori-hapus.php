<?php
include '../koneksi.php';
$idkategori = $_GET['id'];

$sql = "DELETE FROM `tbkategori` WHERE `tbkategori`.`id` = '$idkategori'";
echo $sql;
if ($db->query($sql) == TRUE) {
    // echo "ok";
    header("location:../index.php?p=kategori&status=1");
} else {
    echo "up";
    header("location:../index.php?p=kategori&status=2");
}
