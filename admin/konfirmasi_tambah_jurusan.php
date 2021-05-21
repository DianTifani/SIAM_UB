<?php 
include('../koneksi/koneksi.php');
$jurusan = $_POST['jurusan'];
if(empty($jurusan)){
	header("Location:tambah_jurusan.php?notif=tambahkosong");
}else{
	$sql = "insert into `jurusan` (`jurusan`) 
	values ('$jurusan')";
	mysqli_query($koneksi,$sql);
header("Location:jurusan.php?notif=tambahberhasil");	
}
?>
