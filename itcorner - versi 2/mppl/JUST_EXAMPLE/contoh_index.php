<?php
	include ('connection/connect_to_oracle.php');
	
	//echo $_PHP_SELF;
	// SELECT
	//$rows = $db->query("select * from mahasiswa")->fetchAll();
	//$rows = $db->query("select * from users");
	//$rows = $rows->fetchAll();
/*
	foreach((array)$rows as $row) {
		$nrp = $row['NRP'];
		$nama_mhs = $row['NAMA_MHS'];
		$alamat = $row['ALAMAT_MHS'];
		$telepon = $row['NO_TELP'];
		echo "<table border='1'><tr>";
				echo "<td>".$nrp."</td>";
				echo "<td>".$nama_mhs."</td>";
				echo "<td>".$alamat."</td>";
				echo "<td>".$telepon."</td>";
		echo "</tr></table>";
	}
	*/
	//INSERT UPDATE
	//$db->exec("insert into mahasiswa values('5111100121','ask','sdsd','sds',08080)");
	//$db->exec("insert into users values('ardian','ardian')");
	
	// DELETE
	//$db->exec("delete from users where username='askary'");
?>