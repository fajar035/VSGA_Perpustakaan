<div id="label-page">
    <h3>Tampil Data penulis</h3>
</div>
<div id="content">

    <p id="tombol-tambah-container"><a href="index.php?p=penulis-input" class="tombol">Tambah penulis</a>
        <a target="_blank" href="pages/cetak_penulis.php"><img src="print.png" height="50px" height="50px"></a>
    <FORM CLASS="form-inline" METHOD="POST">
        <div align="right">
            <form method=post>
                <input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol">
            </form>
    </FORM>

    </p>
    <br>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</td>
            <th>Kode penulis</th>
            <th>Nama penulis</th>
            <th id="label-opsi">Opsi</th>
        </tr>



        <?php
        $batas = 5;
        extract($_GET);
        if (empty($hal)) {
            $posisi = 0;
            $hal = 1;
            $nomor = 1;
        } else {
            $posisi = ($hal - 1) * $batas;
            $nomor = $posisi + 1;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
            if ($pencarian != "") {
                $sql = "SELECT * FROM tbpenulis 
                        WHERE kode_penulis LIKE '%$pencarian%'
						OR nama_penulis LIKE '%$pencarian%'
						ORDER BY id DESC";

                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM tbpenulis   ORDER BY id  DESC LIMIT $posisi, $batas ";
                $queryJml = "SELECT * FROM tbpenulis";
                $no = $posisi * 1;
            }
        } else {
            $query = "SELECT * FROM tbpenulis  ORDER BY id DESC LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbpenulis";
            $no = $posisi * 1;
        }

        //$sql="SELECT * FROM tbpenulis ORDER BY idpenulis DESC";
        $q_tampil_penulis = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_penulis) > 0) {
            while ($r_tampil_penulis = mysqli_fetch_array($q_tampil_penulis)) {
                // var_dump($r_tampil_penulis);
                // exit();

        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_penulis['kode_penulis']; ?></td>
                    <td><?php echo $r_tampil_penulis['nama_penulis']; ?></td>
                    <td>
                        <div class="tombol-opsi-container"><a href="index.php?p=penulis-edit&id=<?php echo $r_tampil_penulis['id']; ?>" class="tombol btn btn-warning">Edit</a></div>
                        <div class="tombol-opsi-container"><a href="proses/penulis-hapus.php?id=<?php echo $r_tampil_penulis['id']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol btn btn-danger">Hapus</a></div>
                    </td>
                </tr>
        <?php $nomor++;
            }
        } else {
            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
        } ?>
    </table>
    <?php
    if (isset($_POST['pencarian'])) {

        echo "Hasil Pencarian dengan Kata Kunci : " . $_POST['pencarian'];
        if ($_POST['pencarian'] != '') {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Data Hasil Pencarian: <b>$jml</b>";
            echo "</div>";
        }
    } else { ?>
        <div style="float: left;">
            <?php
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Jumlah Data : <b>$jml</b>";
            ?>
        </div>
        <div class="pagination">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i = 1; $i <= $jml_hal; $i++) {
                if ($i != $hal) {
                    echo "<a href=\"?p=penulis&hal=$i\">$i</a>";
                } else {
                    echo "<a class=\"active\">$i</a>";
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>