<?php
	session_start();
	include ('connection/connect_to_oracle.php');

	if(!empty($_GET['location']))
	{
	    $redirect = $_GET['location'];
	    //echo $redirect;
	}
	else
	{
	   $redirect = NULL;
	}
	//Cek apakah halaman login sebelumnya menyimpan lokasi halaman terakhir
	//if($_GET['aksi'] == 'komentar')
	//{
	if($_GET['id'] != '')
	{
	    $id = $_GET['id'];
	    echo $id;
	}
	else
	{
	   $id = NULL;
	   echo "wkkw";
	}

	if($_GET['aksi'] == 'komentar')
	{
		if(empty(trim($_POST['komentar'])))
		{
			if(isset($redirect))
			  {
			    header("Location:". $redirect . "&status=gagal");
			  }
			  exit();
		}
		else
		{
			$komen = $_POST['komentar'];
			$komen1 = nl2br($komen);
			$query = mysql_query("insert into komentar (id_artikel,isi_komentar,nama,username) values('".$id."','".$komen1."','".$_SESSION['nama']."','".$_SESSION['username']."')");
			if(mysql_query("SELECT jumlah_komentar FROM artikel WHERE id_artikel='".$id."'"))
			{
				$row = mysql_query("SELECT jumlah_komentar FROM artikel WHERE id_artikel='".$id."'"); 
				$result = mysql_fetch_array($row);
				$jml = $result[0];
			}
            echo $jml;
            $jml = $jml+1;
            echo 'after jml++' . $jml;
			$que = mysql_query("update artikel set jumlah_komentar=".$jml." where id_artikel='".$id."'");
			if(isset($redirect))
			{
			  header("Location:". $redirect . "&status=berhasil");
			}
			exit();
		}
	}
	elseif($_GET['aksi'] == 'jawab')
	{
		if(empty(trim($_POST['jawaban'])))
		{
			if(isset($redirect))
			  {
			    header("Location:". $redirect . "&status=gagal");
			  }
			  exit();
		}
		else
		{
			$jawab = $_POST['jawaban'];
			$jawab1 = nl2br($jawab);
			$query = mysql_query("insert into jawaban (id_pertanyaan,isi_jawaban,nama,username) values('".$id."','".$jawab1."','".$_SESSION['nama']."','".$_SESSION['username']."')");
			if(mysql_query("SELECT jumlah_jawaban FROM pertanyaan WHERE id_pertanyaan='".$id."'"))
			{
				$row = mysql_query("SELECT jumlah_jawaban FROM pertanyaan WHERE id_pertanyaan='".$id."'"); 
				$result = mysql_fetch_array($row);
				$jml = $result[0];
			}
			echo $jml;
            $jml = $jml+1;
            echo 'after jml++' . $jml;
            $que = mysql_query("update pertanyaan set jumlah_jawaban=".$jml." where id_pertanyaan='".$id."'");
			//echo "sampe sini beneran";
			if(isset($redirect))
			{
			  header("Location:". $redirect . "&status=berhasil");
			}
			exit();
		}
	}
?>