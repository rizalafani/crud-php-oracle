<html>
	<head>
		<title>Tabel Data</title>
	</head>
	<body>
		<table border="0" style="width:25%">
		<form method="POST" action="index.php?modul=save">
			<tr>
				<td>NIM : </td>
				<td><input type="text" name="nim" value="<?php echo $nim; ?>" style="width:30%;" <?php if($status=="LAMA"){ echo "readonly"; } ?>></td>
			</tr>
			<tr>
				<td>NAMA : </td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>" style="width:80%;"></td>
			</tr>
			<tr>
				<td>ALAMAT :</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>" style="width:100%;"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="status" value="<?php echo $status; ?>"></td>
				<td><input type="submit" value="Simpan" name="btnSimpan"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="index.php?modul=getdata">Kembali ke halaman index</a></td>
			</tr>
		</form>
		</table>
	</body>
</html>