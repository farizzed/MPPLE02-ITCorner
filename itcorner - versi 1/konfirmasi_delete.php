<?php
	include ('connection/connect_to_oracle.php');
	$id = $_GET['id'];
	$query = "update artikel set status = '2' where id_artikel = '$id' ";
	$berhasil = mysql_query($query);
	//echo $_GET['id'];
	if ($berhasil)
	{
		header("Location:konfirmasi.php?status_delartikel=ok");
	}
	else 
	{
		header("Location:konfirmasi.php?status_delartikel=gagal");
	}
?>