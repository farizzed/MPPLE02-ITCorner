<?php
$host = "localhost";
$username = "root";
$password = "";
$namadatabase = "it-corner";
$koneksi = mysql_connect($host,$username,$password) or die("Koneksi Tidak Ada".mysql_error());
mysql_selectdb($namadatabase,$koneksi) or die("Database Error ".mysql_error());

