   <?php 
      session_start();
      include('../koneksi/koneksi.php');
      if(isset($_GET['data'])){
        $nim = $_GET['data'];
        //get data mahasiswa
        $sql_m = "select `m`.`nama`, `j`.`jurusan`, `m`.`foto` 
        from `mahasiswa` `m` inner join `jurusan` `j` 
        on `m`.`kode_jurusan` = `j`.`kode_jurusan` 
        where `m`.`nim` = '$nim'";
        $query_m = mysqli_query($koneksi,$sql_m);
        while($data_m = mysqli_fetch_row($query_m)){
          $nama= $data_m[0];
          $jurusan = $data_m[1];
          $foto = $data_m[2];
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
            <h3><i class="fas fa-user-tie"></i> Detail Data Mahasiswa</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
              <li class="breadcrumb-item active">Detail Data Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="mahasiswa.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Profil Mahasiswa<strong></td>
                      </tr>               
                      <tr>
                        <td width="20%"><strong>NIM<strong></td>
                        <td width="80%"><?php echo $nim;?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama;?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Jurusan<strong></td>
                        <td width="80%"><?php echo $jurusan;?></td>
                      </tr> 
                      <tr>
                          <td><strong>Foto Mahasiswa<strong></td>
                          <td><img src="foto/<?php echo $foto;?>" class="img-fluid" width="200px;"></td>

                      </tr>
                      <tr>
                      <td><strong>Hobi<strong></td>
                      <td>
                          <ul>
                          <?php
                          //get hobi
                          $sql_h = "select `h`.`hobi` from `hobi_mahasiswa` `hm`
                                    inner join `hobi` `h` 
                                    on `h`.`kode_hobi` = `hm`.`kode_hobi` 
                                    where `hm`.`nim`='$nim'";
                          $query_h = mysqli_query($koneksi,$sql_h);
                         while($data_h = mysqli_fetch_row($query_h)){
                            $hobi= $data_h[0];
                        ?>
                                    <li><?php echo $hobi;?></li>
                                 <?php }?>
                                </ul>
                            </td>
                           </tr>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
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
