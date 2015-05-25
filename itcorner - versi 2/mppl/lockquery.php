<?php
	include ('connection/connect_to_oracle.php');
	session_start();

	if($_GET['location'] != '')
	{
	    $redirect = $_GET['location'];
	    //echo $redirect;
	}
	else
	{
	   $redirect = NULL;
	}

	if($_GET['aksi'] == 'kunci_artikel')
	{
		$kode = $_GET['id'];

		$row = mysql_query("update artikel set kunci='ya' where id_artikel=".$kode."");
		if(isset($redirect))
		{
			echo "mwawanna";
		    header("Location:". $redirect . "&status=kunci");
		}
		exit();
	}
	else if($_GET['aksi'] == 'lepas_artikel')
	{
		$kode = $_GET['id'];

		$row = mysql_query("update artikel set kunci='tidak' where id_artikel=".$kode."");
		if(isset($redirect))
		{
			echo "mwawanna";
		    header("Location:". $redirect . "&status=lepas");
		}
		exit();
	}
	else if($_GET['aksi'] == 'kunci_pertanyaan')
	{
		$kode = $_GET['id'];

		$row = mysql_query("update pertanyaan set kunci='ya' where id_pertanyaan=".$kode."");
		if(isset($redirect))
		{
			echo "mwawanna";
		    header("Location:". $redirect . "&status=kunci");
		}
		exit();
	}
	else if($_GET['aksi'] == 'lepas_pertanyaan')
	{
		$kode = $_GET['id'];

		$row = mysql_query("update pertanyaan set kunci='tidak' where id_pertanyaan=".$kode."");
		if(isset($redirect))
		{
			echo "mwawanna";
		    header("Location:". $redirect . "&status=lepas");
		}
		exit();
	}
?>