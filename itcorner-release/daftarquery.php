<?php
	include ('connection/connect_to_oracle.php');
	session_start();

	//Cek apakah halaman login sebelumnya menyimpan lokasi halaman terakhir
	if($_POST['location'] != '')
	{
	  if($_POST['location'] == "/mppl/index.php")
	  {
	   $redirect = "/mppl/home.php";
	   echo $redirect;
	  }
	  else
	  {
	    $redirect = $_POST['location'];
	  }
	}
	else
	{
	   $redirect = NULL;
	}

	if ($_POST['captcha'] == "3JYP4" )
	{
		if ($_POST['password'] == $_POST['password1'])
		{
			if (mysql_query("insert into user values('$_POST[username]','$_POST[nama]','$_POST[password]','$_POST[email]','user')"))
			{
				$nama = $_POST['nama'];
			    $_SESSION['nama'] = $nama;
			    $_SESSION['username'] = $_POST['username'];
			  	if(isset($redirect))
			  	{
			  	  header("Location:". $redirect);
			  	}
			  	exit();
			}
			else
			{
				$url = 'daftar.php?status=gagal';
			  	if(isset($redirect))
			  	{
			  	   $url .= '&location=' . urlencode($redirect);
			  	}
			  	header("Location: " . $url);
			  	exit();
			}
		}
		elseif($_POST['username'] == '' || $_POST['password'] == '' || $_POST['password1'] == '' || $_POST['email'] == '' || $_POST['nama'] == '')
		{
			$url = 'daftar.php?status=kosong';
			if(isset($redirect))
			{
			   $url .= '&location=' . urlencode($redirect);
			}
			header("Location: " . $url);
			exit();
		}
		else
		{
			$url = 'daftar.php?status=beda';
			if(isset($redirect))
			{
			   $url .= '&location=' . urlencode($redirect);
			}
			header("Location: " . $url);
			exit();
		}
	}
	elseif($_POST['captcha'] == '')
	{
		$url = 'daftar.php?status=kosong';
		if(isset($redirect))
		{
		   $url .= '&location=' . urlencode($redirect);
		}
		echo $url;
		header("Location: " . $url);
		exit();
	}
	else
	{
		$url = 'daftar.php?status=captcha';
		if(isset($redirect))
		{
		   $url .= '&location=' . urlencode($redirect);
		}
		header("Location: " . $url);
		exit();
	}

?>