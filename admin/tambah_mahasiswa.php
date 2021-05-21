
<?php 
session_start();
include('../koneksi/koneksi.php');
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
            <h3><i class="fas fa-plus"></i> Tambah Mahasiwa</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
              <li class="breadcrumb-item active">Tambah Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Mahasiswa</h3>
        <div class="card-tools">
          <a href="mahasiswa.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      </br>
            <div class="col-sm-10">
              <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
                  <?php if($_GET['notif']=="tambahkosong"){?>
                  <div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
                  <?php }?>
              <?php }?>
            </div>

      </div>
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="konfirmasi_tambah_mahasiswa.php">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data Mahasiswa</u></span></label>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nim" id="nim" 
              value="<?php if(!empty($_SESSION['nim'])){ echo $_SESSION['nim'];} ?>">

            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" 
              value="<?php if(!empty($_SESSION['nama'])){  echo $_SESSION['nama'];} ?>">

            </div>
          </div>
          <div class="form-group row">
            <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
            <div class="col-sm-7">
              <select class="form-control" id="jurusan" name="jurusan">
                <option value="0">- Pilih Jurusan -</option>
                <?php
                    $sql_j = "select `kode_jurusan`, `jurusan` from `jurusan` 
                              order by `kode_jurusan`";
                    $query_j = mysqli_query($koneksi,$sql_j);
                    while($data_j = mysqli_fetch_row($query_j)){
                    $kode_jurusan = $data_j[0];
                    $jurusan = $data_j[1];
                    ?>
                    <option value="<?php echo $kode_jurusan;?>"
                    <?php if(!empty($_SESSION['jurusan'])){
                    if($kode_jurusan==$_SESSION['jurusan']){?> 
                    selected="selected" <?php }}?>>
                    <?php echo $jurusan;?><?php }?>>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">Hobi</label>
            <div class="col-sm-7">
            <?php 
                $sql_h = "select `kode_hobi`, `hobi` from `hobi` order by `kode_hobi`";
                $query_h = mysqli_query($koneksi,$sql_h);
                $jum_hobi = mysqli_num_rows($query_h);
                while($data_h = mysqli_fetch_row($query_h)){
                $kode_hobi = $data_h[0];
                $hobi = $data_h[1];
                ?>
                <input type="checkbox"  name="hobi[]" 
                value="<?php echo $kode_hobi; ?>"/> 
                <?php echo $hobi; ?></br>
                <?php }?>

            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
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