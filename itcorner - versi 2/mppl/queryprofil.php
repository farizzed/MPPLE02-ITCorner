<?php
include ('connection/connect_to_oracle.php');
session_start();

echo $_POST['asal'];
echo $_POST['tanggal'];
echo $_POST['bio'];

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

if(!empty($_POST['tanggal']))
{
	$lahir = $_POST['tanggal'];
	$day = substr($lahir, 0, 2);
	$coba = substr($lahir, 3, 2);
	$yeartime = substr($lahir, 6);
	$tanggal_lahir = $yeartime . '-' . $coba . '-' . $day;
	echo $tanggal_lahir;
}

if($_POST['asal'] == '')
{
	$asal = 'NULL';
	$case = 1;
}

if($_POST['tanggal'] == '')
{
	$tanggal = 'NULL';
	echo $tanggal;
	$case = 2;
}
else if($_POST['asal'] == '' && $_POST['tanggal'] == '')
{
	$asal = 'NULL';
	$tanggal = 'NULL';
	$case = 3;
}
else if($_POST['bio'] == '' && $_POST['tanggal'] == '')
{
	$bio = 'NULL';
	$tanggal = 'NULL';
	$case = 4;
}

if($_POST['bio'] == '')
{
	$bio = 'NULL';
	$case = 5;
}
else if($_POST['bio'] == '' && $_POST['asal'] == '')
{
	$bio = 'NULL';
	$asal = 'NULL';
	$case = 6;
}

if($_POST['asal'] == '' && $_POST['tanggal'] == '' && $_POST['bio'] == '')
{
	$bio = 'NULL';
	$asal = 'NULL';
	$tanggal = 'NULL';
	$case = 7;
}

echo $case;

if($case == 1)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal=".$asal.", tanggal_lahir='".$tanggal_lahir."', deskripsi='".$_POST['bio']."' WHERE username='".$_SESSION['username']."'");

}
else if($case == 2)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal='".$_POST['asal']."', tanggal_lahir=".$tanggal.", deskripsi='".$_POST['bio']."' WHERE username='".$_SESSION['username']."'");
}
else if($case == 3)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal=".$asal.", tanggal_lahir=".$tanggal.", deskripsi='".$_POST['bio']."' WHERE username='".$_SESSION['username']."'");
}
else if($case == 4)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal='".$_POST['asal']."', tanggal_lahir=".$tanggal.", deskripsi=".$bio." WHERE username='".$_SESSION['username']."'");
}
else if($case == 5)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal='".$_POST['asal']."', tanggal_lahir='".$tanggal_lahir."', deskripsi=".$bio." WHERE username='".$_SESSION['username']."'");
}
else if($case == 6)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal=".$asal.", tanggal_lahir='".$tanggal_lahir."', deskripsi=".$bio." WHERE username='".$_SESSION['username']."'");
}
else if($case == 7)
{
	$query = mysql_query("UPDATE user SET tempat_tinggal=".$asal.", tanggal_lahir=".$tanggal.", deskripsi=".$bio." WHERE username='".$_SESSION['username']."'");
}
else
{
	$query = mysql_query("UPDATE user SET tempat_tinggal='".$_POST['asal']."', tanggal_lahir='".$tanggal_lahir."', deskripsi='".$_POST['bio']."' WHERE username='".$_SESSION['username']."'");
}

if($redirect)
{
	header("Location:". $redirect);
}
else
{
	header("Location: profil.php?user=".$_SESSION['username']."&status=berhasil");
}
exit();

?>