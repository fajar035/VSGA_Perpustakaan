<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data kategori</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbkategori ORDER BY id DESC";
        $q_tampil_kategori = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_kategori) > 0) {
            while ($r_tampil_kategori = mysqli_fetch_array($q_tampil_kategori)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_kategori['kode_kategori']; ?></td>
                    <td><?php echo $r_tampil_kategori['nama_kategori']; ?></td>
                </tr>
        <?php $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>