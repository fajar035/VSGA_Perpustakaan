<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Pengembalian</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>Kode Transaksi</th>
            <th>Judul Buku</th>
            <th>Nama</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT tbtransaksi.*, b.status, b.judulbuku, a.nama FROM tbtransaksi   
                          LEFT JOIN tbanggota a ON a.id = tbtransaksi.idanggota  
                          LEFT JOIN tbbuku b ON b.id = tbtransaksi.idbuku 
                          WHERE b.status = 0 AND  tbtransaksi.status_peminjaman = 0
                          ORDER BY id_transaksi";
        $q_tampil_peminjam = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_peminjam) > 0) {
            while ($r_tampil_peminjam = mysqli_fetch_array($q_tampil_peminjam)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_peminjam['kode_transaksi']; ?></td>
                    <td><?php echo $r_tampil_peminjam['judulbuku']; ?></td>
                    <td><?php echo $r_tampil_peminjam['nama']; ?></td>
                    <td><?php echo $r_tampil_peminjam['tglpinjam']; ?></td>
                    <td><?php echo $r_tampil_peminjam['tglkembali']; ?></td>
                </tr>
        <?php $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>