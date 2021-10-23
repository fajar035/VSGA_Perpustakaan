<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data penerbit</h3>
</div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>Kode penerbit</th>
            <th>Nama penerbit</th>
        </tr>

        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbpenerbit ORDER BY id DESC";
        $q_tampil_penerbit = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_penerbit) > 0) {
            while ($r_tampil_penerbit = mysqli_fetch_array($q_tampil_penerbit)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_penerbit['kode_penerbit']; ?></td>
                    <td><?php echo $r_tampil_penerbit['nama_penerbit']; ?></td>
                </tr>
        <?php $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>