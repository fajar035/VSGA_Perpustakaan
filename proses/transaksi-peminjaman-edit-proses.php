<?php

include '../koneksi.php';

$id_transaksi    = $_POST['id_transaksi'];
$kode_transaksi  = $_POST['kode_transaksi'];
$idanggota   = $_POST['idanggota'];
$bukusebelumnya   = $_POST['bukusebelumnya'];
$idbuku   = $_POST['idbuku'];
$tglpinjam   = $_POST['tglpinjam'];

echo $bukusebelumnya;
echo "<br>";

if (isset($_POST['simpan'])) {

    $sql = "UPDATE `tbtransaksi` SET `kode_transaksi` = '$kode_transaksi', `idanggota` = '$idanggota',  `idbuku` = '$idbuku' , `tglpinjam` = '$tglpinjam' WHERE `tbtransaksi`.`id_transaksi` = '$id_transaksi'";

    // echo $sql;
    if ($db->query($sql) == TRUE) {
        echo "ok";

        if ($bukusebelumnya != $idbuku) {
            $updateBukuLama = "UPDATE `tbbuku` SET `status` = '0' WHERE `tbbuku`.`id` = '$bukusebelumnya'";
            if ($db->query($updateBukuLama) == TRUE) {
                $updateBukuBaru = "UPDATE `tbbuku` SET `status` = '1' WHERE `tbbuku`.`id` = '$idbuku'";
                if ($db->query($updateBukuBaru) == TRUE) {
                    echo "ok 2";
                    header("location:../index.php?p=transaksi-peminjaman&status=1");
                } else {
                    echo "up 2";
                    header("location:../index.php?p=transaksi-peminjaman&status=2");
                }
                echo "ok 1";
            } else {
                echo "up 1";
                header("location:../index.php?p=transaksi-peminjaman&status=2");
            }
        }

        header("location:../index.php?p=transaksi-peminjaman&status=1");
    } else {
        echo "up";
        header("location:../index.php?p=transaksi-peminjaman&status=2");
    }
}
