<?php 
session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['nim'])){
	$nim = $_SESSION['nim'];
	$nama = $_POST['nama'];
	$kode_jurusan = $_POST['jurusan'];

 	
if(empty($nim)){
header("Location: edit_mahasiswa.php?data=".$nim."&notif=editkosong&jenis=nim");
}else if(empty($nama)){
header("Location:edit_mahasiswa.php?data=".$nim."&notif=editkosong&jenis=nama");
}else if(empty($kode_jurusan)){
header("Location: edit _mahasiswa.php?data=".$nim."&notif=editkosong&jenis=jurusan");
}else{
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $nim.".jpg";
	$direktori = 'foto/'.$nama_file;
	if(move_uploaded_file($lokasi_file,$direktori)){
		$sql = "update `mahasiswa` set `nama`='$nama', 
		`kode_jurusan`='$kode_jurusan', `foto`='$nama_file'
		where `nim` = '$nim'";
		mysqli_query($koneksi,$sql);
	}else{
		$sql = "update `mahasiswa` set `nama`='$nama', 
		`kode_jurusan`='$kode_jurusan'
		where `nim` = '$nim'";
		mysqli_query($koneksi,$sql);
	}
	//hapus hobi
	$sql_d = "delete from `hobi_mahasiswa` where `nim`='$nim'";
	mysqli_query($koneksi,$sql_d);
	//tambah hobi
	if(isset($_POST['hobi'])){
	  foreach($_POST['hobi'] as $kode_hobi){
	    $sql_i = "insert into `hobi_mahasiswa` 
            (`nim`, `kode_hobi`) 
	     values ('$nim', '$kode_hobi')";
	     mysqli_query($koneksi,$sql_i);
	  }
	}
	unset($_SESSION['nim']);
	header("Location:mahasiswa.php?notif=editberhasil");
   }
}
?>

