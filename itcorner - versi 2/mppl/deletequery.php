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
		header("location:home.php?aksi=artikel&status=hapus");
		echo "makanna";
		exit();
	}
	elseif($_GET['aksi'] == 'pertanyaan')
	{
		$kode = $_GET['id'];

		if(mysql_query("select j.id_jawaban from jawaban as j, pertanyaan as p where j.id_jawaban='$kode' AND j.id_jawaban=p.id_jawaban"))
		{
			$row = mysql_query("delete from jawaban where id_jawaban='$kode'");
		}
		$row = mysql_query("delete from pertanyaan where id_pertanyaan='$kode'");
		header("location:home.php?aksi=pertanyaan&status=hapus");
		echo "uwaw";
		exit();
	}
	elseif($_GET['aksi'] == 'komentar')
	{
		$kode = $_GET['id'];
		$kode_artikel = $_GET['id_artikel'];
		echo $kode;
		$row = mysql_query("delete from komentar where id_komentar='$kode';");
		if(mysql_query("SELECT jumlah_komentar FROM artikel WHERE id_artikel='".$kode_artikel."'"))
		{
			$row = mysql_query("SELECT jumlah_komentar FROM artikel WHERE id_artikel='".$kode_artikel."'"); 
			$result = mysql_fetch_array($row);
			$jml = $result[0];
		}
        echo $jml;
        $jml = $jml-1;
        echo 'after jml++' . $jml;
		$que = mysql_query("update artikel set jumlah_komentar=".$jml." where id_artikel='".$kode_artikel."'");
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
		$kode_pertanyaan = $_GET['id_pertanyaan'];
		$row = mysql_query("delete from jawaban where id_jawaban='$kode';");
		if(mysql_query("SELECT jumlah_jawaban FROM pertanyaan WHERE id_pertanyaan='".$kode_pertanyaan."'"))
		{
			$row = mysql_query("SELECT jumlah_jawaban FROM pertanyaan WHERE id_pertanyaan='".$kode_pertanyaan."'"); 
			$result = mysql_fetch_array($row);
			$jml = $result[0];
		}
		echo $jml;
        $jml = $jml-1;
        echo 'after jml++' . $jml;
        $que = mysql_query("update pertanyaan set jumlah_jawaban=".$jml." where id_pertanyaan='".$kode_pertanyaan."'");
		if(isset($redirect))
		{
		    header("Location:". $redirect . "&status=hapus");
		}
		exit();
	}
?>