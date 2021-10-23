<?php
$query = mysqli_query($db, "SELECT max(id) as total FROM tbanggota");
$data = mysqli_fetch_array($query);
$kodena = $data['total'];
$huruf = "ANG";
$kodena = $huruf . sprintf("%03s", $kodena);
?>

<div id="label-page">
	<h3>Input Data Anggota</h3>
</div>
<div id="content">
	<form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
		<label for="">Tanda yang memiliki <span style="color:red;">*</span> wajib diisi </label>
		<table id="tabel-input">
			<tr>
				<td class="label-formulir">FOTO</td>
				<td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">ID Anggota</td>
				<td class="isian-formulir"><input type="text" readonly value="<?php echo $kodena ?>" name="kode_anggota" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
			</tr>
			<tr>
				<td class="label-formulir">Nama <span style="color:red;">*</span></td>
				<td class="isian-formulir"><input type="text" required name="nama" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Jenis Kelamin <span style="color:red;">*</span></td>
				<td class="isian-formulir"><input type="radio" required name="jenis_kelamin" value="Pria">Pria</label></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="radio" required name="jenis_kelamin" value="Wanita">Wanita</td>
			</tr>
			<tr>
				<td class="label-formulir">Alamat</td>
				<td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"></textarea></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
			</tr>
		</table>
	</form>
</div>