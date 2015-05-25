<?php
	session_start();
	include ('connection/connect_to_oracle.php');

	$tujuan = $_POST['user'];
	$subyek = $_POST['subyek'];
	$isi = $_POST['isi'];
	$location = $_POST['location'];
	echo $location;

	$query = mysql_query("insert into pesan (username,subyek,isi_pesan,username_sender) values('".$tujuan."','".$subyek."','".$isi."','".$_SESSION['username']."')");
	if($location == '/mppl/pesan.php')
	{
		header("Location:".$location."?status=terkirim");
	}
	else
	{
		header("Location:".$location."&status=terkirim");
	}
	
?>