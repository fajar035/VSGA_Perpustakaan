<?php
include '../koneksi.php';
$kode_anggota = $_POST['kode_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = "0";
$file = $_FILES['foto']['name'];
$ext = pathinfo($file, PATHINFO_EXTENSION);


// Save data
if (isset($_POST['simpan'])) {


	if ($file !== '') {
		$foto = '';
	}else{
		// Upload file
		$namaFile = $_FILES['foto']['name'];
		$namaSementara = $_FILES['foto']['tmp_name'];
		$ext = pathinfo($namaFile, PATHINFO_EXTENSION);
		$fileName = md5($namaFile) . "." . $ext;;

		// Path folder location
		$dirUpload = "../images/picture/";
		// Upload folder
		$terupload = move_uploaded_file($namaSementara, $dirUpload . $fileName);

		if ($terupload) {
			echo "Upload berhasil!<br/>";
			echo "Link: <a href='" . $dirUpload . $namaFile . "'>" . $fileName . "</a>";
			$foto = md5($file) . "." . $ext;
		} else {
			echo "Upload Gagal!";
		}
	}
	


	// Insert into database
	$sql = "INSERT INTO `tbanggota` 
	(`kode_anggota`,`nama`, `jeniskelamin`, `alamat`, `status`, `foto`) 
	VALUES 
	('$kode_anggota','$nama', '$jenis_kelamin', '$alamat', '$status', '$foto')";
	echo $sql;

	if ($db->query($sql) == TRUE) {
		header("location:../index.php?p=anggota&status=1");
	} else {
		header("location:../index.php?p=anggota&status=2");
	}
}
?>
