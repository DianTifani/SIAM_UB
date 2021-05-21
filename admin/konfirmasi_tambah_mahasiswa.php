<?php 
    include('../koneksi/koneksi.php');
            session_start();
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $kode_jurusan = $_POST['jurusan'];
            
            $_SESSION['nim']=$nim;
            $_SESSION['nama']=$nama;
            $_SESSION['jurusan']=$kode_jurusan;

        if(empty($nim)){
        header("Location:tambah_mahasiswa.php?notif=tambahkosong&jenis=nim");
        }else if(empty($nama)){
         header("Location:tambah_mahasiswa.php?notif=tambahkosong&jenis=nama");
        }else if(empty($kode_jurusan)){
        header("Location:tambah_mahasiswa.php?notif=tambahkosong&data=jurusan");
        }else{
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $nim.".jpg";
            $direktori = 'foto/'.$nama_file;
            if(move_uploaded_file($lokasi_file,$direktori)){
                $sql = "insert into `mahasiswa` 
                (`nim`, `nama`, `kode_jurusan`, `foto`) 
                values ('$nim', '$nama', '$kode_jurusan', '$nama_file')";
                mysqli_query($koneksi,$sql);
                }else{
                $sql = "insert into `mahasiswa` (`nim`, `nama`, `kode_jurusan`) 
                values ('$nim', '$nama', '$kode_jurusan')";
                mysqli_query($koneksi,$sql);
            }
            if(isset($_POST['hobi'])){
            foreach($_POST['hobi'] as $kode_hobi){
                $sql_i = "insert into `hobi_mahasiswa` (`nim`, `kode_hobi`) 
                values ('$nim', '$kode_hobi')";
                mysqli_query($koneksi,$sql_i);
            }
            }
            unset($_SESSION['nim']);
            unset($_SESSION['nama']);
            unset($_SESSION['jurusan']);
            header("Location:mahasiswa.php?notif=tambahberhasil");
            }
?>
