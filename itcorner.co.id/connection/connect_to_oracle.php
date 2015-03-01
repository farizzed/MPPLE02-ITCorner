<?php

	$db_username = "tutorial_fp"; // username
	$db_password = "tutorial_fp"; // password
	$db_name = "oci:tutorial_fp=XE"; // interface_yang_digunakan:nama database:sid
	$db = new PDO($db_name,$db_username,$db_password); // instansiasi object database

?>