<?php 
      session_start();
      include('../koneksi/koneksi.php');
      if(isset($_GET['data'])){
        $nim = $_GET['data'];
        $_SESSION['nim']=$nim;
        //get data mahasiswa
        $sql_m = "select `nama`, `kode_jurusan`, `foto` 
        from `mahasiswa` where `nim` = '$nim'";
        $query_m = mysqli_query($koneksi,$sql_m);
        while($data_m = mysqli_fetch_row($query_m)){
          $nama= $data_m[0];
          $kd_jur = $data_m[1];
          $foto = $data_m[2];
        }
        //get hobi
        $sql_h = "select `kode_hobi` from `hobi_mahasiswa` 
              where `nim`='$nim'";
        $query_h = mysqli_query($koneksi,$sql_h);
        $array_hobi = array();
        while($data_h = mysqli_fetch_row($query_h)){
          $hobi= $data_h[0];
          $array_hobi[] = $hobi;
        } 
      }
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
            <h3><i class="fas fa-edit"></i> Edit Data Mahasiswa</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
              <li class="breadcrumb-item active">Edit Data Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Maasiswa</h3>
        <div class="card-tools">
          <a href="mahasiswa.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      </br></br>
      <div class="col-sm-10">
        <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
        <?php if($_GET['notif']=="editkosong"){?>
      <div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis'];?> wajib di isi</div>
        <?php }?>
        <?php }?>
      </div>

      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="konfirmasi_edit_mahasiswa.php">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data Mahasiswa</u></span></label>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $nim;?>" readonly="readonly"> 
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
            <div class="col-sm-7">
              <select class="form-control" id="jurusan" name="jurusan">
                <option value="0">- Pilih Jurusan -</option>
                <?php
                      $sql_j = "select `kode_jurusan`, `jurusan` from `jurusan` order by `kode_jurusan`";
                      $query_j = mysqli_query($koneksi,$sql_j);
                      while($data_j = mysqli_fetch_row($query_j)){
                      $kode_jurusan = $data_j[0];
                      $jurusan = $data_j[1];
                      ?>
                      <option value="<?php echo $kode_jurusan;?>"
                      <?php if($kode_jurusan==$kd_jur){?> selected="selected" 
                      <?php }?>>
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
                $sql_h = "select `kode_hobi`, `hobi` from `hobi` 
                order by `kode_hobi`";
                $query_h = mysqli_query($koneksi,$sql_h);
                $jum_hobi = mysqli_num_rows($query_h);
                while($data_h = mysqli_fetch_row($query_h)){
                $kode_hobi = $data_h[0];
                $hobi = $data_h[1];
              ?>
              <input type="checkbox"  name="hobi[]" 
              value="<?php echo $kode_hobi; ?>"
              <?php if(in_array($kode_hobi, $array_hobi)){?>checked="checked" 
              <?php }?>/> 
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
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
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
