<?php
	include ('connection/connect_to_oracle.php');
	$id = $_GET['id'];
	$query = "update pertanyaan set status = '2' where id_pertanyaan = '$id' ";
	$berhasil = mysql_query($query);
	//echo $_GET['id'];
	if ($berhasil)
	{
		header("Location:konfirmasi.php?status_delpertanyaan=ok");
	}
	else 
	{
		header("Location:konfirmasi.php?status_delpertanyaan=gagal");
	}
?>