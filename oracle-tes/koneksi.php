<?php
	echo "<h2>Oracle Connection</h2><br />";
	$username = "rizal"; //sesuaikan dengan username ente
	$password = "admin"; //sesuaikan dengan password ente
	$host = "localhost/xe"; //sesuaikan dengan host database ente
	$koneksi = oci_connect($username,$password,$host) or die('connection failed !');
	if(!empty($koneksi)){
		echo "koneksi sukses !<br /><br />";
	}else{
		echo "koneksi gagal !<br />";
	}
?>