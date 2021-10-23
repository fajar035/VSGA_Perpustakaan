<?php
include'../koneksi.php';
$idbuku=$_GET['id'];

$sql = "DELETE FROM `tbbuku` WHERE `tbbuku`.`id` = '$idbuku'";
echo $sql;
if ($db->query($sql) == TRUE) {
    // echo "ok";
    header("location:../index.php?p=buku&status=1");
} else {
    echo "up";
    header("location:../index.php?p=buku&status=2");
}
