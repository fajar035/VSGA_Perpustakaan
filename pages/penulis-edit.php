<?php
$id = $_GET['id'];
$q_tampil_penulis = mysqli_query($db, "SELECT * FROM tbpenulis WHERE id='$id'");
$r_tampil_penulis = mysqli_fetch_array($q_tampil_penulis);
?>
<div id="label-page">
    <h3>Edit Data penulis</h3>
</div>
<div id="content">
    <form action="proses/penulis-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <input type="text" name="id_penulis" value="<?php echo $id ?>" hidden class="isian-formulir isian-formulir-border warna-formulir-disabled">
            <tr>
                <td class="label-formulir">Kode penulis</td>
                <td class="isian-formulir"><input type="text" name="kode_penulis" value="<?php echo $r_tampil_penulis['kode_penulis']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama penulis <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="nama_penulis" value="<?php echo $r_tampil_penulis['nama_penulis']; ?>" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>