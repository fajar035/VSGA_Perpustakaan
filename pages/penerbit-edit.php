<?php
$id = $_GET['id'];
$q_tampil_penerbit = mysqli_query($db, "SELECT * FROM tbpenerbit WHERE id='$id'");
$r_tampil_penerbit = mysqli_fetch_array($q_tampil_penerbit);
?>
<div id="label-page">
    <h3>Edit Data penerbit</h3>
</div>
<div id="content">
    <form action="proses/penerbit-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <input type="text" name="id_penerbit" value="<?php echo $id ?>" hidden class="isian-formulir isian-formulir-border warna-formulir-disabled">
            <tr>
                <td class="label-formulir">Kode penerbit</td>
                <td class="isian-formulir"><input type="text" name="kode_penerbit" value="<?php echo $r_tampil_penerbit['kode_penerbit']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama penerbit <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="nama_penerbit" value="<?php echo $r_tampil_penerbit['nama_penerbit']; ?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>