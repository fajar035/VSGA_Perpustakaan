<?php
$query = mysqli_query($db, "SELECT max(id) as total FROM tbpenulis");
$data = mysqli_fetch_array($query);
$kodena = $data['total'];
$huruf = "PEN";
$kodena = $huruf . sprintf("%03s", $kodena);
?>

<div id="label-page">
    <h3>Tambah Data penulis</h3>
</div>
<div id="content">
    <form action="proses/penulis-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">Kode penulis</td>
                <td class="isian-formulir"><input type="text" readonly value="<?php echo $kodena ?>" name="kode_penulis" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama penulis <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="nama_penulis" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>