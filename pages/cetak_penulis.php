<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data penulis</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>Kode penulis</th>
            <th>Nama penulis</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbpenulis ORDER BY id DESC";
        $q_tampil_penulis = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_penulis) > 0) {
            while ($r_tampil_penulis = mysqli_fetch_array($q_tampil_penulis)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_penulis['kode_penulis']; ?></td>
                    <td><?php echo $r_tampil_penulis['nama_penulis']; ?></td>
                </tr>
        <?php $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>