<?php
	include ('connection/connect_to_oracle.php');
	session_start();
	$username = $_SESSION['username'];
	echo $_SESSION['username'];

	if($_POST['judul'] == '')
	{
		header("Location:tambah_artikel.php?status=kosong");
	}
	elseif($_POST['isi'] == '')
	{
		header("Location:tambah_artikel.php?status=kosong");
	}
	else
	{
		$isi = nl2br($_POST['isi']);
		if (mysql_query("insert into artikel (username,judul_artikel,isi_artikel,kategori_artikel,status) values ('$username','$_POST[judul]','$isi','$_POST[kategori]','0')"))
		{
			header("Location:home.php?status=ok");	
		}
		else
		{
		
			header("Location:tambah_artikel.php?status=gagal");
		}
	}
