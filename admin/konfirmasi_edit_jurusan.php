<?php 
session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['kode_jurusan'])){
  $kode_jurusan = $_SESSION['kode_jurusan'];
  $jurusan = $_POST['jurusan'];
 
   if(empty($jurusan)){
 	    header("Location:edit_jurusan.php?data=".$kode_jurusan."&notif=editkosong");
  }else{
	$sql = "update `jurusan` set `jurusan`='$jurusan' 
	where `kode_jurusan`='$kode_jurusan'";
	mysqli_query($koneksi,$sql);
	header("Location:jurusan.php?notif=editberhasil");
  }
}
?>
