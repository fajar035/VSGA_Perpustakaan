<?php

$id = $_GET['id'];
$q_tampil_transaksi = mysqli_query($db, "SELECT * FROM tbtransaksi WHERE id_transaksi='$id'");
$r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi);
?>
<div id="label-page">
  <h3>Edit Data transaksi</h3>
</div>
<div id="content">
  <form action="proses/transaksi-peminjaman-edit-proses.php" method="post" enctype="multipart/form-data">
    <table id="tabel-input">
      <input type="text" name="id_transaksi" value="<?php echo $id ?>" hidden class="isian-formulir isian-formulir-border warna-formulir-disabled">
      <tr>
        <td class="label-formulir">Kode transaksi</td>
        <td class="isian-formulir"><input type="text" name="kode_transaksi" value="<?php echo $r_tampil_transaksi['kode_transaksi']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
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
                // var_dump($anggota);
                // exit();
            ?>
                <option <?php if ($r_tampil_transaksi['idanggota'] == $anggota['id']) {
                          echo "selected";
                        } ?> value="<?= $anggota['id'] ?>"><?= $anggota['kode_anggota'] ?> - <?= $anggota['nama'] ?>
                </option>
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
            $idBuku = $r_tampil_transaksi['idbuku'];
            $query = "SELECT * FROM tbbuku WHERE id = $idBuku OR status = 0 ORDER BY id DESC ";
            $q_tampil_buku = mysqli_query($db, $query);
            if (mysqli_num_rows($q_tampil_buku) > 0) :
              while ($buku = mysqli_fetch_array($q_tampil_buku)) :
                // var_dump($buku);
                // exit();
            ?>
                <option <?php if ($r_tampil_transaksi['idbuku'] == $buku['id']) {
                          echo "selected";
                        } ?> value="<?= $buku['id'] ?>"><?= $buku['kode_buku'] ?> - <?= $buku['judulbuku'] ?></option>
              <?php endwhile;
            else : ?>
              <option disabled value=""> Buku Kosong</option>
            <?php endif; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label-formulir">Waktu Pinjam</td>
        <td class="isian-formulir">
          <input type="date" required value="<?php echo $r_tampil_transaksi['tglpinjam']; ?>" name="tglpinjam" va class="isian-formulir isian-formulir-border">
        </td>
        <input type="text" hidden required value="<?php echo $r_tampil_transaksi['idbuku']; ?>" name="bukusebelumnya" va class="isian-formulir isian-formulir-border">
      </tr>
      <tr>
        <td class="label-formulir"></td>
        <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
      </tr>
    </table>
  </form>
</div>