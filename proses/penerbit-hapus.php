<?php
include '../koneksi.php';
$idpenerbit = $_GET['id'];

$sql = "DELETE FROM `tbpenerbit` WHERE `tbpenerbit`.`id` = '$idpenerbit'";
echo $sql;
if ($db->query($sql) == TRUE) {
    // echo "ok";
    header("location:../index.php?p=penerbit&status=1");
} else {
    echo "up";
    header("location:../index.php?p=penerbit&status=2");
}
