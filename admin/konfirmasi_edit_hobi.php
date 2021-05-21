<?php 
session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['kode_hobi'])){
  $kode_hobi = $_SESSION['kode_hobi'];
  $hobi = $_POST['hobi'];
 
   if(empty($hobi)){
 	    header("Location:edit_hobi.php?data=".$kode_hobi."&notif=editkosong");
  }else{
	$sql = "update `hobi` set `hobi`='$hobi' where `kode_hobi`='$kode_hobi'";
	mysqli_query($koneksi,$sql);
	header("Location:hobi.php?notif=editberhasil");
  }
}
?>
