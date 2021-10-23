<div id="label-page">
  <h3>Tampil Data buku</h3>
</div>
<div id="content">

  <p id="tombol-tambah-container"><a href="index.php?p=buku-input" class="tombol">Tambah buku</a>
    <a target="_blank" href="pages/cetak_buku.php"><img src="print.png" height="50px" height="50px"></a>
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
      <th>Kode Buku</th>
      <th>judul buku</th>
      <th>Kategori</th>
      <th>Pengarang</th>
      <th>penerbit</th>
      <th>Status</th>
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
        $sql = "SELECT tbbuku.*, k.nama_kategori, pen.nama_penulis, per.nama_penerbit FROM tbbuku 
                        LEFT JOIN tbkategori k ON k.id = tbbuku.kategori
                        LEFT JOIN tbpenulis pen ON pen.id = tbbuku.pengarang
                        LEFT JOIN tbpenerbit per ON per.id = tbbuku.penerbit
                        WHERE judulbuku LIKE '%$pencarian%'
						OR kode_buku LIKE '%$pencarian%'
						OR nama_penulis LIKE '%$pencarian%'
						OR nama_penerbit LIKE '%$pencarian%'
						OR nama_kategori LIKE '%$pencarian%'
						ORDER BY waktu_dibuat DESC";

        $query = $sql;
        $queryJml = $sql;
      } else {
        $query = "SELECT tbbuku.*, k.nama_kategori, pen.nama_penulis, per.nama_penerbit FROM tbbuku 
                        LEFT JOIN tbkategori k ON k.id = tbbuku.kategori
                        LEFT JOIN tbpenulis pen ON pen.id = tbbuku.pengarang
                        LEFT JOIN tbpenerbit per ON per.id = tbbuku.penerbit
                        ORDER BY waktu_dibuat  DESC LIMIT $posisi, $batas ";
        $queryJml = "SELECT * FROM tbbuku";
        $no = $posisi * 1;
      }
    } else {
      $query = "SELECT tbbuku.*, k.nama_kategori, pen.nama_penulis, per.nama_penerbit FROM tbbuku 
                        LEFT JOIN tbkategori k ON k.id = tbbuku.kategori
                        LEFT JOIN tbpenulis pen ON pen.id = tbbuku.pengarang
                        LEFT JOIN tbpenerbit per ON per.id = tbbuku.penerbit
                        ORDER BY waktu_dibuat DESC LIMIT $posisi, $batas";
      $queryJml = "SELECT * FROM tbbuku";
      $no = $posisi * 1;
    }

    //$sql="SELECT * FROM tbbuku ORDER BY id DESC";
    $q_tampil_buku = mysqli_query($db, $query);
    // var_dump($query);
    // exit();
    if (mysqli_num_rows($q_tampil_buku) > 0) {
      while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {

    ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $r_tampil_buku['kode_buku']; ?></td>
          <td><?php echo $r_tampil_buku['judulbuku']; ?></td>

          <td><?php echo $r_tampil_buku['nama_kategori']; ?></td>
          <td><?php echo $r_tampil_buku['nama_penulis']; ?></td>
          <td><?php echo $r_tampil_buku['nama_penerbit']; ?></td>
          <td>
            <?php if ($r_tampil_buku['status'] == 0) : ?>
              Tersedia
            <?php else : ?>
              Dipinjam
            <?php endif; ?>
          </td>
          <td>
            <div class="tombol-opsi-container"><a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['id']; ?>" class="tombol btn btn-warning">Edit</a></div>
            <div class="tombol-opsi-container"><a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['id']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol btn btn-danger">Hapus</a></div>
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