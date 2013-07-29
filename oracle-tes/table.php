<html>
	<head>
		<title>Tabel Data</title>
	</head>
	<body>
		<table border="1" style="border-collapse:collapse; width:40%">
			<tr bgcolor="gray">
				<th>NIM</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
				<th>ACTION</th>
			</tr>
			<?php while($row = oci_fetch_array($statement,OCI_BOTH)){ ?>
			<tr>
				<td><?php echo $row['NIM']; ?></td>
				<td><?php echo $row['NAMA']; ?></td>
				<td><?php echo $row['ALAMAT']; ?></td>
				<td align="center">
					<a href="index.php?modul=edit&nim=<?php echo $row['NIM']; ?>">Edit</a> 
					|| 
					<a href="index.php?modul=delete&nim=<?php echo $row['NIM']; ?>" onclick="return confirm('yakin hapus data ini ?')">Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		<div style="margin-top:10px;"><a href="index.php?modul=add">Tambah Data</a></div>
	</body>
</html>