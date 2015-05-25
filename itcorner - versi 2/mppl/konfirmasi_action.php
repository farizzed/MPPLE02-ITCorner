<?php
	include ('connection/connect_to_oracle.php');
	$id = $_GET['id'];
	$query = "update artikel set status = '1' where id_artikel = '$id' ";
	$berhasil = mysql_query($query);
	//echo $_GET['id'];
	if ($berhasil)
	{
		header("Location:konfirmasi.php?status_artikel=ok");
	}
	else 
	{
		header("Location:konfirmasi.php?status_artikel=gagal");
	}
?>