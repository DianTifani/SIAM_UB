<?php 
	include('../koneksi/koneksi.php');
	session_start();
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);;
		$level = $_POST['level'];
		$_SESSION['nama']=$nama;
		$_SESSION['email']=$email;
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['level']=$level;
	if(empty($nama)){
		header("Location:tambah_user.php?data=".$nama."&notif=tambahkosong&jenis=nama");
	}else if(empty($email)){
		header("Location:tambah_user.php?data=".$email."&notif=tambahkosong&jenis=email");
	}else if(empty($username)){
		header("Location:tambah_user.php?data=".$username."&notif=tambahkosong&jenis=username");
	}else if(empty($password)){
		header("Location:tambah_user.php?data=".$password."&notif=tambahkosong&jenis=password");
	}else if(empty($level)){
		header("Location:tambah_user.php?data=".$level."&notif=tambahkosong&jenis=level");
	}else{
		$sql = "insert into `admin` (`nama`,`email`,`username`,`password`,`level`) 
		values ('$nama','$email','$username','$password','$level')";
		mysqli_query($koneksi,$sql);
	header("Location:user.php?notif=tambahberhasil");
		unset($_SESSION['nama']);
		unset($_SESSION['email']);
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		unset($_SESSION['level']);
		header("Location:user.php?notif=tambahberhasil");
	}
?>
