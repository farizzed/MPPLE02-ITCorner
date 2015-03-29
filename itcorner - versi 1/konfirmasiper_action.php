<?php
	include ('connection/connect_to_oracle.php');
	$id = $_GET['id'];
	$query = "update pertanyaan set status = '1' where id_pertanyaan = '$id' ";
	$berhasil = mysql_query($query);
	//echo $_GET['id'];
	if ($berhasil)
	{
		header("Location:konfirmasi.php?status_pertanyaan=ok");
	}
	else 
	{
		header("Location:konfirmasi.php?status_pertanyaan=gagal");
	}
?>