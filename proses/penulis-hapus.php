<?php
include '../koneksi.php';
$idpenulis = $_GET['id'];

$sql = "DELETE FROM `tbpenulis` WHERE `tbpenulis`.`id` = '$idpenulis'";
echo $sql;
if ($db->query($sql) == TRUE) {
    // echo "ok";
    header("location:../index.php?p=penulis&status=1");
} else {
    echo "up";
    header("location:../index.php?p=penulis&status=2");
}
