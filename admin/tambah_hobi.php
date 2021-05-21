<?php 
		session_start();	
		if(!isset($_SESSION['id_admin'])){
			header("Location:profil.php");
		}else{
	?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Hobi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="hobi.php">Hobi</a></li>
              <li class="breadcrumb-item active">Tambah Hobi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Hobi</h3>
        <div class="card-tools">
          <a href="hobi.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <br>
      <div class="col-sm-10")
        <?php if(!empty($_GET['notif'])){?>
          <?php if($_GET['notif']=="tambahkosong"){?>
      <div class="alert alert-danger" role="alert">
      Maaf data hobi wajib di isi</div>
        <?php }?>
          <?php }?>
      </div>


  <form class="form-horizontal" method="post" action="konfirmasi_tambah_hobi.php">
       <div class="card-body">
          <div class="form-group row">
            <label for="hobi" 
            class="col-sm-3 col-form-label">Hobi</label>
            <div class="col-sm-7">
              <input type="text"  name="hobi" 
             class="form-control" id="hobi" value="">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-info 
            float-right"><i class="fas fa-plus"></i> Tambah</button>
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
<?php
		}
	?>
