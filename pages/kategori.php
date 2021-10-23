<div id="label-page">
    <h3>Tampil Data kategori</h3>
</div>
<div id="content">

    <p id="tombol-tambah-container"><a href="index.php?p=kategori-input" class="tombol">Tambah kategori</a>
        <a target="_blank" href="pages/cetak_kategori.php"><img src="print.png" height="50px" height="50px"></a>
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
            <th>Kode kategori</th>
            <th>Nama Kategori</th>
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

            echo "Hasil Pencarian dengan Kata Kunci : " . $_POST['pencarian'];
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
            if ($pencarian != "") {
                $sql = "SELECT * FROM tbkategori 
                        WHERE kode_kategori LIKE '%$pencarian%'
						OR nama_kategori LIKE '%$pencarian%'
						ORDER BY id DESC";

                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM tbkategori   ORDER BY id  DESC LIMIT $posisi, $batas ";
                $queryJml = "SELECT * FROM tbkategori";
                $no = $posisi * 1;
            }
        } else {
            $query = "SELECT * FROM tbkategori  ORDER BY id DESC LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbkategori";
            $no = $posisi * 1;
        }

        //$sql="SELECT * FROM tbkategori ORDER BY idkategori DESC";
        $q_tampil_kategori = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_kategori) > 0) {
            while ($r_tampil_kategori = mysqli_fetch_array($q_tampil_kategori)) {
                // var_dump($r_tampil_kategori);
                // exit();
                
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_kategori['kode_kategori']; ?></td>
                    <td><?php echo $r_tampil_kategori['nama_kategori']; ?></td>
                    <td>
                        <div class="tombol-opsi-container"><a href="index.php?p=kategori-edit&id=<?php echo $r_tampil_kategori['id']; ?>" class="tombol btn btn-warning">Edit</a></div>
                        <div class="tombol-opsi-container"><a href="proses/kategori-hapus.php?id=<?php echo $r_tampil_kategori['id']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol btn btn-danger">Hapus</a></div>
                    </td>
                </tr>
        <?php $nomor++;
            }
        } else {            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
        } ?>
    </table>
    <?php
    if (isset($_POST['pencarian'])) {
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
                    echo "<a href=\"?p=kategori&hal=$i\">$i</a>";
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