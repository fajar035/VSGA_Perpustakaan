<?php
$query = mysqli_query($db, "SELECT max(id) as total FROM tbpenerbit");
$data = mysqli_fetch_array($query);
$kodena = $data['total'];
$huruf = "PNR";
$kodena = $huruf . sprintf("%03s", $kodena);
?>


<div id="label-page">
    <h3>Tambah Data penerbit</h3>
</div>
<div id="content">
    <form action="proses/penerbit-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">Kode penerbit</td>
                <td class="isian-formulir"><input type="text" readonly value="<?php echo $kodena ?>" name="kode_penerbit" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama penerbit <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="nama_penerbit" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>