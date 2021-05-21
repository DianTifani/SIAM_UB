	<?php 
		session_start();	
		if(isset($_SESSION['id_admin'])){
			header("Location:profil.php");
		}else{
	?>
	<!DOCTYPE html>
	<html>
	<head>
	  <?php include("includes/head.php") ?>
	</head>
	<body class="hold-transition login-page">	
	<div class="login-box">
	  <div class="login-logo">
	    <a href="index.php"><b>Admin</b>SIAM</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
	    <div class="card-body login-card-body">
	      <p class="login-box-msg">Sign in to start your session</p>
		  
				<?php if(!empty($_GET['gagal'])){?>
				<?php if($_GET['gagal']=="userKosong"){?>
						<span class="text-danger">
							Maaf Username Tidak Boleh Kosong
						</span>
					<?php } else if($_GET['gagal']=="passKosong"){?>
						<span class="text-danger">
							Maaf Password Tidak Boleh Kosong
						</span>
				<?php } else if($_GET['gagal']=="userpassSalah") {?>
						<span class="text-danger">
							Maaf Username dan Password Anda Salah
						</span>
					<?php }?>
				<?php }?>	
        

	    <form action="konfirmasi_login.php" method="post">
        <div class="input-group mb-3">
	          <input type="text" class="form-control"
          placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
	            </div>
          </div>
	        </div>
	        <div class="input-group mb-3">
	          <input type="password" class="form-control" 
	          placeholder="Password" name="password">
          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-lock"></span>
	            </div>
          </div>
	        </div>
	        <div class="row">
	          <div class="col-8">
	          </div>
	          <!-- /.col -->
	          <div class="col-4">
	            <button type="submit" name="login" value="Login"
	            class="btn btn-primary btn-block">Sign In</button>
	          </div>
          <!-- /.col -->
	        </div>
	      </form>
      <!-- /.social-auth-links -->
	    </div>
	    <!-- /.login-card-body -->
	  </div>
	</div>
	<!-- /.login-box -->
	 
	<!-- jQuery -->
<?php include("includes/script.php") ?>
	 
	</body>
	</html>
	<?php
		}
	?>

