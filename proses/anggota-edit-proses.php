<?php
include'../koneksi.php';

$id_anggota=$_POST['id_anggota'];
$kode_anggota=$_POST['kode_anggota'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$file = $_FILES['foto']['name'];
$ext = pathinfo($file, PATHINFO_EXTENSION);
$foto = md5($file) . "." . $ext;



If(isset($_POST['simpan'])){


	if ($file == '') {

		// JIka foto tidak dirubah
		$sqlNa = "SELECT * FROM tbanggota WHERE id = '$id_anggota'";
		$dataNa = mysqli_query($db, $sqlNa);
		if (mysqli_num_rows($dataNa) > 0) {
			while ($r_tampil_anggota = mysqli_fetch_array($dataNa)) {
				$foto =  $r_tampil_anggota['foto'];
			}
		}
	} else {
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

	// echo $foto;

	$sql = "UPDATE `tbanggota` SET `nama` = '$nama', `jeniskelamin` = '$jenis_kelamin', `alamat` = '$alamat', `foto` = '$foto' WHERE `tbanggota`.`id` = '$id_anggota'";

	echo $sql;

	if ($db->query($sql) == TRUE) {
		echo "ok";
		header("location:../index.php?p=anggota&status=1");
	} else {
		echo "up";
		header("location:../index.php?p=anggota&status=2");
	}
}
?>
