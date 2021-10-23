<?php
$query = mysqli_query($db, "SELECT max(id) as total FROM tbkategori");
$data = mysqli_fetch_array($query);
$kodena = $data['total'];
$huruf = "KT";
$kodena = $huruf . sprintf("%03s", $kodena);
?>

<div id="label-page">
    <h3>Tambah Data kategori</h3>
</div>
<div id="content">
    <form action="proses/kategori-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">Kode kategori</td>
                <td class="isian-formulir"><input type="text" readonly value="<?php echo $kodena ?>" name="kode_kategori" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama kategori <span style="color:red;">*</span></td>
                <td class="isian-formulir"><input required type="text" name="nama_kategori" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>