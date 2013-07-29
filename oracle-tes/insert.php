<?php
	$koneksi = oci_connect('rizal','admin','localhost/xe') or die('connection failed !');
	$nim = 167;
	$nama = 'Nur Layla';
	$alamat = 'Wonosobo';
	$query = "INSERT INTO MAHASISWA (NIM,NAMA,ALAMAT) VALUES ('".$nim."','".$nama."','".$alamat."')";
	$statement = oci_parse($koneksi,$query) or die('statement error');
	
	echo $r = oci_execute($statement,OCI_DEFAULT) or die('execute error');
	echo "<hr />";
	echo $res = oci_commit($koneksi) or die("error commit");
	echo "<hr />";
	oci_free_statement($statement);
	oci_close($koneksi);
?>