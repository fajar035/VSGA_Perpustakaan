<?php
$query = mysqli_query($db, "SELECT max(id) as total FROM tbbuku");
$data = mysqli_fetch_array($query);
$kodena = $data['total'];
$huruf = "NK";
$kodena = $huruf . sprintf("%03s", $kodena);
?>
<div id="label-page">
  <h3>Tambah Data buku</h3>
</div>
<div id="content">
  <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
    <table id="tabel-input">

      <tr>
        <td class="label-formulir">Kode buku</td>
        <td class="isian-formulir"><input type="text" readonly value="<?php echo $kodena ?>" name="kode_buku" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
      </tr>
      <tr>
        <td class="label-formulir">judul buku <span style="color:red;">*</span></td>
        <td class="isian-formulir"><input required type="text" name="judulbuku" class="isian-formulir isian-formulir-border"></td>
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
                <option value="<?= $kat['id'] ?>"><?= $kat['kode_kategori'] ?> - <?= $kat['nama_kategori'] ?></option>
              <?php endwhile;
            else : ?>
              <option value="">kosong</option>
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
              while ($kat = mysqli_fetch_array($q_tampil_penerbit)) :
                // var_dump($kat);
                // exit();
            ?>
                <option value="<?= $kat['id'] ?>"><?= $kat['kode_penerbit'] ?> - <?= $kat['nama_penerbit'] ?></option>
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
              while ($kat = mysqli_fetch_array($q_tampil_penulis)) :
                // var_dump($kat);
                // exit();
            ?>
                <option value="<?= $kat['id'] ?>"><?= $kat['kode_penulis'] ?> - <?= $kat['nama_penulis'] ?></option>
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