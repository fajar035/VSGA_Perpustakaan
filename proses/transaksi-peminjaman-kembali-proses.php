<?php

include '../koneksi.php';

$id_transaksi    = $_GET['id'];
$status_peminjaman   = 0;
$tglkembali = date('Y-m-d');


$query = mysqli_query($db, "SELECT * FROM tbtransaksi t
                            LEFT JOIN tbbuku b ON b.id = t.idbuku
                            WHERE id_transaksi = '$id_transaksi' 
");
$data = mysqli_fetch_array($query);
$idbuku = $data['id'];
// echo $idbuku;

$sql = "UPDATE `tbtransaksi` SET `status_peminjaman` = '$status_peminjaman' , `tglkembali` = '$tglkembali' WHERE `tbtransaksi`.`id_transaksi` = '$id_transaksi'";

// echo $sql;
if ($db->query($sql) == TRUE) {
    echo "ok";
    $updateBuku = "UPDATE `tbbuku` SET `status` = '0' WHERE `tbbuku`.`id` = '$idbuku'";
    if ($db->query($updateBuku)) {
        echo "ok 1";
        header("location:../index.php?p=transaksi-peminjaman&status=1");
    }else{
        echo "up 1";
        header("location:../index.php?p=transaksi-peminjaman&status=2");
    }
} else {
    echo "up";
    header("location:../index.php?p=transaksi-peminjaman&status=2");
}
