<?php
$id_buku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE id='$id_buku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);
?>
<div id="label-page">
    <h3>Edit Data buku</h3>
</div>
<div id="content">
    <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <input type="text" name="id_buku" value="<?php echo $id_buku ?>" hidden class="isian-formulir isian-formulir-border warna-formulir-disabled">
            <tr>
                <td class="label-formulir">Kode buku</td>
                <td class="isian-formulir"><input type="text" name="kode_buku" value="<?php echo $r_tampil_buku['kode_buku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">judul buku <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="judulbuku" value="<?php echo $r_tampil_buku['judulbuku']; ?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            </tr>
            <tr>
                <td class="label-formulir">Kategori <span style="color:red;">*</span></td>
                <td class="isian-formulir">
                    <select name="kategori" class="isian-formulir isian-formulir-border" id="">
                        <?php
                        $query = "SELECT * FROM tbkategori ORDER BY id DESC";
                        $q_tampil_kategori = mysqli_query($db, $query);
                        if (mysqli_num_rows($q_tampil_kategori) > 0) :
                            while ($kat = mysqli_fetch_array($q_tampil_kategori)) :
                                // var_dump($kat);
                                // exit();
                        ?>
                                <option <?php if ($r_tampil_buku['kategori'] == $kat['id']) {
                                            echo "selected";
                                        } ?> value="<?= $kat['id'] ?>"><?= $kat['kode_kategori'] ?> - <?= $kat['nama_kategori'] ?></option>
                            <?php endwhile;
                        else : ?>
                            <option disabled value=""> Kategori Kosong</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">penerbit <span style="color:red;">*</span></td>
                <td class="isian-formulir">
                    <select name="penerbit" class="isian-formulir isian-formulir-border" id="">
                        <?php
                        $query = "SELECT * FROM tbpenerbit ORDER BY id DESC";
                        $q_tampil_penerbit = mysqli_query($db, $query);
                        if (mysqli_num_rows($q_tampil_penerbit) > 0) :
                            while ($penerbit = mysqli_fetch_array($q_tampil_penerbit)) :
                                // var_dump($penerbit);
                                // exit();
                        ?>
                                <option <?php if ($r_tampil_buku['penerbit'] == $penerbit['id']) {
                                            echo "selected";
                                        } ?> value="<?= $penerbit['id'] ?>"><?= $penerbit['kode_penerbit'] ?> - <?= $penerbit['nama_penerbit'] ?></option>
                            <?php endwhile;
                        else : ?>
                            <option disabled value=""> penerbit Kosong</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">penulis/pengarang <span style="color:red;">*</span></td>
                <td class="isian-formulir">
                    <select name="pengarang" class="isian-formulir isian-formulir-border" id="">
                        <?php
                        $query = "SELECT * FROM tbpenulis ORDER BY id DESC";
                        $q_tampil_penulis = mysqli_query($db, $query);
                        if (mysqli_num_rows($q_tampil_penulis) > 0) :
                            while ($penulis = mysqli_fetch_array($q_tampil_penulis)) :
                                // var_dump($penulis);
                                // exit();
                        ?>
                                <option <?php if ($r_tampil_buku['pengarang'] == $penulis['id']) {
                                            echo "selected";
                                        } ?> value="<?= $penulis['id'] ?>"><?= $penulis['kode_penulis'] ?> - <?= $penulis['nama_penulis'] ?></option>
                            <?php endwhile;
                        else : ?>
                            <option disabled value=""> Penulis Kosong</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>