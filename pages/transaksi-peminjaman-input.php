<?php
$query = mysqli_query($db, "SELECT max(id_transaksi) as total FROM tbtransaksi");
$data = mysqli_fetch_array($query);
$kodena = $data['total'];
$huruf = "TRK";
$kodena = $huruf . sprintf("%03s", $kodena);
?>


<div id="label-page">
    <h3>Tambah Data transaksi</h3>
</div>
<div id="content">
    <form action="proses/transaksi-peminjaman-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">Kode transaksi</td>
                <td class="isian-formulir"><input type="text" readonly value="<?php echo $kodena ?>" name="kode_transaksi" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Anggota <span style="color:red;">*</span></td>
                <td class="isian-formulir">
                    <select name="idanggota" class="isian-formulir isian-formulir-border" id="">
                        <?php
                        $query = "SELECT * FROM tbanggota ORDER BY id DESC";
                        $q_tampil_anggota = mysqli_query($db, $query);
                        if (mysqli_num_rows($q_tampil_anggota) > 0) :
                            while ($anggota = mysqli_fetch_array($q_tampil_anggota)) :
                        ?>
                                <option value="<?= $anggota['id'] ?>"><?= $anggota['kode_anggota'] ?> - <?= $anggota['nama'] ?></option>
                            <?php endwhile;
                        else : ?>
                            <option disabled value=""> Anggota Kosong</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Judul Buku <span style="color:red;">*</span></td>
                <td class="isian-formulir">
                    <select name="idbuku" class="isian-formulir isian-formulir-border" id="">
                        <?php
                        $query = "SELECT * FROM tbbuku WHERE status = 0 ORDER BY id DESC ";
                        $q_tampil_buku = mysqli_query($db, $query);
                        if (mysqli_num_rows($q_tampil_buku) > 0) :
                            while ($buku = mysqli_fetch_array($q_tampil_buku)) :
                                // var_dump($buku);
                                // exit();
                        ?>
                                <option value="<?= $buku['id'] ?>"><?= $buku['kode_buku'] ?> - <?= $buku['judulbuku'] ?></option>
                            <?php endwhile;
                        else : ?>
                            <option disabled value=""> Buku Kosong</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Waktu Pinjam</td>
                <td class="isian-formulir"><input type="date" required name="tglpinjam" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>