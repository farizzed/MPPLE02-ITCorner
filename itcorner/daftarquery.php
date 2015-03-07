<?php
	include ('connection/connect_to_oracle.php');
	
if ($_POST['captcha'] == "3JYCP" )
{
	if ($_POST['password'] == $_POST['password1'])
	{
		if (mysql_query("insert into user values('$_POST[username]','$_POST[nama]','$_POST[password]','$_POST[email]','user')"))
		{

			header("Location:daftar.php?status=ok");	
		}
		else
		{
		
			header("Location:daftar.php?status=gagal");
		}
	}
	else
	{
		header("Location:daftar.php?status=beda");
	}
}
else
{
	header("Location:daftar.php?status=captcha");
}

?>