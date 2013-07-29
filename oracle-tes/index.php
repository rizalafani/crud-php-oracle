<?php
	echo "<h2>Oracle Connection</h2><br />";
	$koneksi = oci_connect('rizal','admin','localhost/xe') or die('connection failed !');
	if(!empty($koneksi)){
		echo "koneksi sukses !<br /><br />";
		if(isset($_GET['modul'])){			
			switch($_GET['modul']){
				case 'getdata':
					$statement = oci_parse($koneksi,"select nim,nama,nvl(alamat,0)as alamat from mahasiswa") or die('statement error');
					oci_execute($statement) or die('execute error');
					include 'table.php';
					break;
				case 'add':
					$nim = "";
					$nama = "";
					$alamat = "";
					$status = "BARU";
					include 'form.php';
					break;
				case 'edit':
					$statement = oci_parse($koneksi,"select nim,nama,nvl(alamat,0)as alamat from mahasiswa where nim = '".$_GET['nim']."'") or die('statement error');
					oci_execute($statement) or die('execute error');
					while($row = oci_fetch_array($statement)){
						$nim = $row['NIM'];
						$nama = $row['NAMA'];
						$alamat = $row['ALAMAT'];
					}
					$status = "LAMA";
					include 'form.php';
					break;
				case 'save':
					if($_POST){
						if($_POST['status'] == "BARU"){
							$statement = oci_parse($koneksi,"insert into mahasiswa (nim,nama,alamat) values ('".$_POST['nim']."','".$_POST['nama']."','".$_POST['alamat']."')") or die('statement error');
						}else{
							$statement = oci_parse($koneksi,"update mahasiswa set nama = '".$_POST['nama']."', alamat = '".$_POST['alamat']."' where nim = '".$_POST['nim']."'") or die('statement error');
						}
						$res = oci_execute($statement) or die('execute error');
						if($res){
							header('location:index.php?modul=getdata');
							exit(0);
						}else{
							echo "<h2>Hapus data gagal !!</h2>";
						}
					}else{
						echo "<h2>No Action Here !</h2>";
					}					
					break;
				case 'delete':
					$statement = oci_parse($koneksi,"delete from mahasiswa where nim = '".$_GET['nim']."'") or die('statement error');
					$res = oci_execute($statement) or die('execute error');
					if($res){
						header('location:index.php?modul=getdata');
					}else{
						echo "<h2>Hapus data gagal !!</h2>";
					}
					break;
				default :
					$statement = oci_parse($koneksi,"select nim,nama,nvl(alamat,0)as alamat from mahasiswa") or die('statement error');
					oci_execute($statement) or die('execute error');
					include 'table.php';
					break;
			}
		}else{
			$statement = oci_parse($koneksi,"select nim,nama,nvl(alamat,0)as alamat from mahasiswa") or die('statement error');
			oci_execute($statement) or die('execute error');
			include 'table.php';
		}
		if(isset($statement)){
			oci_free_statement($statement);
		}
		oci_close($koneksi);
	}else{
		echo "koneksi gagal !<br />";
	}
?>