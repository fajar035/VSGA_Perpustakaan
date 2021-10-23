<?php
include'../koneksi.php';
$id_anggota=$_GET['id'];

$sql = "DELETE FROM `tbanggota` WHERE `tbanggota`.`id` = '$id_anggota'";

if ($db->query($sql) == TRUE) {
    header("location:../index.php?p=anggota&status=1");
} else {
    header("location:../index.php?p=anggota&status=2");
}
?>