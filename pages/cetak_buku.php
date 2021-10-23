<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data buku</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>Kode buku</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Status</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT tbbuku.*, k.nama_kategori, pen.nama_penulis, per.nama_penerbit FROM tbbuku 
                        LEFT JOIN tbkategori k ON k.id = tbbuku.kategori
                        LEFT JOIN tbpenulis pen ON pen.id = tbbuku.pengarang
                        LEFT JOIN tbpenerbit per ON per.id = tbbuku.penerbit
                        ORDER BY waktu_dibuat DESC";
        $q_tampil_buku = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_buku) > 0) {
            while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
                    $foto = "admin-no-photo.jpg";
                else
                    $foto = $r_tampil_buku['foto'];
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_buku['kode_buku']; ?></td>
                    <td><?php echo $r_tampil_buku['judulbuku']; ?></td>
                    <td><?php echo $r_tampil_buku['nama_kategori']; ?></td>
                    <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                    <td><?php echo $r_tampil_buku['penerbit']; ?></td>
                    <td>
                        <?php if ($r_tampil_buku['status'] == 0) : ?>
                            Tersedia
                        <?php else : ?>
                            Dipinjam
                        <?php endif; ?>
                    </td>
                </tr>
        <?php $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>