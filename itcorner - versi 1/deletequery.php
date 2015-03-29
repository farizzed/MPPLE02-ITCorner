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

	if($_GET['aksi'] == 'artikel')
	{
		$kode = $_GET['id'];

		if(mysql_query("select k.id_artikel from komentar as k, artikel as a where k.id_artikel='$kode' AND a.id_artikel=k.id_komentar"))
		{
			$row = mysql_query("delete from komentar where id_artikel='$kode'");
		}
		$row = mysql_query("delete from artikel where id_artikel='$kode'");
		header("location:home.php?aksi=artikel&status=berhasil");
		echo "makanna";
		exit();
	}
	elseif($_GET['aksi'] == 'pertanyaan')
	{
		$kode = $_GET['id'];

		if(mysql_query("select k.id_artikel from jawaban as k, artikel as a where k.id_jawaban='$kode' AND a.id_jawaban=k.id_jawaban"))
		{
			$row = mysql_query("delete from jawaban where id_jawaban='$kode'");
		}
		$row = mysql_query("delete from pertanyaan where id_pertanyaan='$kode'");
		header("location:home.php?aksi=pertanyaan&status=berhasil");
		echo "uwaw";
		exit();
	}
	elseif($_GET['aksi'] == 'komentar')
	{
		$kode = $_GET['id'];
		$row = mysql_query("delete from komentar where id_komentar='.$kode.';");
		if(isset($redirect))
		{
			echo "mwawanna";
		    header("Location:". $redirect . "&status=hapus");
		}
		exit();
	}
	elseif($_GET['aksi'] == 'jawaban')
	{
		$kode = $_GET['id'];
		$row = mysql_query("delete from jawaban where id_jawaban='$kode';");
		if(isset($redirect))
		{
		    header("Location:". $redirect . "&status=hapus");
		}
		exit();
	}
?>