<?php
$id = $_GET['id'];
$q_tampil_kategori = mysqli_query($db, "SELECT * FROM tbkategori WHERE id='$id'");
$r_tampil_kategori = mysqli_fetch_array($q_tampil_kategori);
?>
<div id="label-page">
    <h3>Edit Data kategori</h3>
</div>
<div id="content">
    <form action="proses/kategori-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <input type="text" name="id_kategori" value="<?php echo $id ?>" hidden class="isian-formulir isian-formulir-border warna-formulir-disabled">
            <tr>
                <td class="label-formulir">Kode Kategori</td>
                <td class="isian-formulir"><input type="text" name="kode_kategori" value="<?php echo $r_tampil_kategori['kode_kategori']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Kategori <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="nama_kategori" value="<?php echo $r_tampil_kategori['nama_kategori']; ?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>