<?php 
include('../koneksi/koneksi.php');
$hobi = $_POST['hobi'];
if(empty($hobi)){
	header("Location:tambah_hobi.php?notif=tambahkosong");
}else{
	$sql = "insert into `hobi` (`hobi`) 
	values ('$hobi')";
	mysqli_query($koneksi,$sql);
header("Location:hobi.php?notif=tambahberhasil");	
}
?>
