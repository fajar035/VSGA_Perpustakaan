<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
	if( isset($_POST['submit']))
	{
			$user	= isset($_POST['user']) ? $_POST['user'] : "";
			$pass	= isset($_POST['pass']) ? $_POST['pass'] : "";
			$password = md5($pass);
			$query =  "SELECT * FROM admin WHERE username = '$user' AND password = '$password'";
			$qry	= mysqli_query($db,$query);
			$sesi	= mysqli_num_rows($qry);
			if ($sesi == 1)
			{
				$data_admin = mysqli_fetch_array($qry);
				$_SESSION['nama'] 	= $data_admin['nm_admin'];
				$_SESSION['id_admin'] 	= $data_admin['idadmin'];
				$_SESSION['sesi'] 		= $data_admin['sesi'];

				echo "<script> alert('Berhasil Login') </script>";
				// echo "<meta http-equiv='refresh' content=0; url=index.php?user=$sesi>";
				header("Location: index.php?user=$sesi");
				// var_dump($data_admmin);
				// var_dump($_SESSION);
			}
			else
			{
				echo "<script> alert('Username atau password salah') </script>";
				header("Location: login.php?error=1");
				// echo "<meta http-equiv='refresh' content=0; url=login.php>";
				//silahkan isi dengan kode pada modul
			}
		
		
	}
	else
	{
	  include "login.php";
	}
?>
