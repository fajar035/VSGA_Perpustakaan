<div id="label-page">
    <h3>Tampil Peminjaman</h3>
</div>
<div id="content">

    <p id="tombol-tambah-container"><a href="index.php?p=transaksi-peminjaman-input" class="tombol">Tambah Transaksi</a>
        <a target="_blank" href="pages/cetak_transaksi_peminjaman.php"><img src="print.png" height="50px" height="50px"></a>
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
            <th>Kode Transaksi</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
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
                $sql = "SELECT tbtransaksi.*, b.status, b.judulbuku, a.nama FROM tbtransaksi 
                        LEFT JOIN tbanggota a ON a.id = tbtransaksi.idanggota  
                        LEFT JOIN tbbuku b ON b.id = tbtransaksi.idbuku 
                        WHERE b.status = 1 AND tbtransaksi.status_peminjaman = 1 AND
                        (a.nama LIKE '%$pencarian%'
                        OR b.judulbuku LIKE '%$pencarian%'
						OR kode_transaksi LIKE '%$pencarian%')
						ORDER BY id_transaksi DESC";

                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT tbtransaksi.*, b.status, b.judulbuku, a.nama FROM tbtransaksi   
                          LEFT JOIN tbanggota a ON a.id = tbtransaksi.idanggota  
                          LEFT JOIN tbbuku b ON b.id = tbtransaksi.idbuku 
                          WHERE b.status = 1 AND  tbtransaksi.status_peminjaman = 1
                          ORDER BY id_transaksi  DESC LIMIT $posisi, $batas ";
                $queryJml = "SELECT * FROM tbtransaksi LEFT JOIN tbbuku b ON b.id = tbtransaksi.idbuku
                    WHERE b.status = 1 and  tbtransaksi.status_peminjaman = 1";
                $no = $posisi * 1;
            }
        } else {
            $query = "SELECT tbtransaksi.*, b.status, b.judulbuku, a.nama FROM tbtransaksi 
                    LEFT JOIN tbanggota a ON a.id = tbtransaksi.idanggota  
                    LEFT JOIN tbbuku b ON b.id = tbtransaksi.idbuku
                    WHERE b.status = 1 AND  tbtransaksi.status_peminjaman = 1
                     ORDER BY id_transaksi DESC LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbtransaksi LEFT JOIN tbbuku b ON b.id = tbtransaksi.idbuku
                    WHERE b.status = 1 and  tbtransaksi.status_peminjaman = 1";
            $no = $posisi * 1;
        }

        $q_tampil_kategori = mysqli_query($db, $query);
        // var_dump($query);
        // exit();
        if (mysqli_num_rows($q_tampil_kategori) > 0) {
            while ($r_tampil_kategori = mysqli_fetch_array($q_tampil_kategori)) {

        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_kategori['kode_transaksi']; ?></td>
                    <td><?php echo $r_tampil_kategori['nama']; ?></td>
                    <td><?php echo $r_tampil_kategori['judulbuku']; ?></td>
                    <td><?php echo $r_tampil_kategori['tglpinjam']; ?></td>
                    <td>
                        <div class="tombol-opsi-container"><a href="index.php?p=transaksi-peminjaman-edit&id=<?php echo $r_tampil_kategori['id_transaksi']; ?>" class="tombol btn btn-warning">Edit</a></div>
                        <div class="tombol-opsi-container"><a href="proses/transaksi-peminjaman-kembali-proses.php?id=<?php echo $r_tampil_kategori['id_transaksi']; ?>" onclick="return confirm ('Apakah Anda Yakin buku sudah dikembalikan?')" class="tombol btn btn-info">Kembalikan</a></div>
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
                    echo "<a href=\"?p=buku&hal=$i\">$i</a>";
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