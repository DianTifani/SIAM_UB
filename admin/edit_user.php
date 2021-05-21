<?php include('../koneksi/koneksi.php');?>
<?php 
	session_start();
	if(isset($_GET['data'])){
		$id_admin = $_GET['data'];
		$_SESSION['id_admin']=$id_admin;
		//get data mahasiswa
		$sql_m = "select `nama`, `email`, `username`,`password`,`level` 
		from `admin` where `id_admin` = '$id_admin'";
		$query_m = mysqli_query($koneksi,$sql_m);
		while($data_m = mysqli_fetch_row($query_m)){
			$nama= $data_m[0];
			$email = $data_m[1];
			$username= $data_m[2];
			$password = $data_m[3];
			$level= $data_m[4];
		}
		
		 
	}
?>
<?php include("includes/head.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/sidebar.php") ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="user.php">Data User</a></li>
              <li class="breadcrumb-item active">Edit Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data User</h3>
        <div class="card-tools">
          <a href="user.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
	  </br></br>
		<div class="col-sm-10">
			<?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
			<?php if($_GET['notif']=="editkosong"){?>
				<div class="alert alert-danger" role="alert">
					Maaf data 
					<?php echo $_GET['jenis'];?> wajib di isi
				</div>
			<?php }?>
			<?php }?>
		</div>

        <form class="form-horizontal" action="konfirmasi_edit_user.php" method="post">
	        <div class="card-body">
				<div class="form-group row">
					<label for="judul" class="col-sm-12 col-form-label">
						<span class="text-info">
							<i class="fas fa-user-circle"></i> 
							<u> Data User</u>
						</span>
					</label>
			   </div>
				<div class="form-group row">
					<label for="nama" class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-7">
					  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-7">
					  <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-3 col-form-label">Username</label>
					<div class="col-sm-7">
					  <input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-3 col-form-label">Password</label>
					<div class="col-sm-7">
					  <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="level" class="col-sm-3 col-form-label">Level</label>
					<div class="col-sm-7">
					  <input type="text" class="form-control" id="level" name="level" value="<?php echo $level;?>">
					</div>
				</div>
	        </div>
	        <!-- /.card-body -->
	        <div class="card-footer">
	          <div class="col-sm-10">
	            <button type="submit" class="btn btn-info float-right">
	            <i class="fas fa-save"></i> Simpan</button>
	          </div>  
	        </div>
	        <!-- /.card-footer -->
	</form> 
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

</div>
<!-- ./wrapper -->

<?php include("includes/script.php") ?>
</body>
</html>
