<?php
	include ('connection/connect_to_oracle.php');
	session_start();
	$username = $_SESSION['username'];

	if($_POST['judul'] == '')
	{
		header("Location:tambah_pertanyaan.php?status=kosong");
	}
	elseif($_POST['isi'] == '')
	{
		header("Location:tambah_pertanyaan.php?status=kosong");
	}
	else
	{
		if (mysql_query("insert into pertanyaan (username,judul_pertanyaan,isi_pertanyaan,kategori_pertanyaan,status) values ('$username','$_POST[judul]','$_POST[isi]','$_POST[kategori]','0')"))
		{
			header("Location:home.php?status=ok");	
		}
		else
		{
			header("Location:tambah_pertanyaan.php?status=gagal");
		}
	}

		
