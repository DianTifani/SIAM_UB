<?php 
   include('../koneksi/koneksi.php');
   session_start();
   if((isset($_GET['aksi']))&&(isset($_GET['data']))){
      if($_GET['aksi']=='hapus'){
        $id_admin = $_GET['data'];
        //get foto
        
     
      //hapus data mahasiswa
      $sql_dm = "delete from `admin` where `id_admin` = '$id_admin'";
      mysqli_query($koneksi,$sql_dm);
    }
  }
   if(isset($_SESSION['id_admin'])) {
   
   
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
                        <h3><i class="fas fa-user-tie"></i> Data User</h3>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item active">Data User</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data User</h3>
                     <div class="card-tools">
                        <a href="tambah_user.php" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah User</a>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <form method="get" action="user.php">
                              <div class="row">
                                 <div class="col-md-4 bottom-10">
                                    <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                                 </div>
                                 <div class="col-md-5 bottom-10">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                                 </div>
                              </div>
                              <!-- .row -->
                           </form>
                        </div>
                        <div class="col-md-12 mt-3">
                           <div class="row">
                              <?php
                                 if(isset($_GET['notif'])){
                                   if($_GET['notif'] =='tambahberhasil'){ ?>
                                    <div class="col-12">
                                       <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                                    </div>
                              <?php } else if($_GET['notif'] == 'editberhasil'){ ?>
                                    <div class="col-12">
                                       <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                                    </div>
                              <?php }
                                 }
                                 ?>
                           </div>
                        </div>
                     </div>
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th width="5%">No</th>
                              <th width="19%">Nama</th>
                              <th width="19%">Email</th>
                              <th width="19%">Username</th>
                              <th width="19%">Level</th>
                              <th width="19%">
                                 <center>Aksi</center>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                        $batas = 2;
                        if(!isset($_GET['halaman'])){
                           $posisi = 0;
                           $halaman = 1;
                        }else{
                           $halaman = $_GET['halaman'];
                           $posisi = ($halaman-1) * $batas;
                        }
                        ?> 

                           <?php
                              //menampilkan data hobi
                              $sql_h = "select `id_admin`, `nama`,`email`,`username`,`level` from `admin`";
                                  if (isset($_GET["katakunci"])){
                                        $katakunci_user = $_GET["katakunci"];
                                     $sql_h .= " where `nama` LIKE '%$katakunci_user%'";
                                     } 
                               $sql_h .= " order by `id_admin` limit $posisi, $batas ";
                              $query_h = mysqli_query($koneksi,$sql_h);
                              $no=$posisi+1;
                              while($data_h = mysqli_fetch_row($query_h)){
                              $id_admin = $data_h[0];
                              $nama = $data_h[1];
                              $email = $data_h[2];
                              $username = $data_h[3];
                              $level = $data_h[4];
                              ?>	
                           <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $nama;?></td>
                              <td><?php echo $email;?></td>
                              <td><?php echo $username;?></td>
                              <td><?php echo $level;?></td>
                              <td align="center">
                                 <a href="edit_user.php?data=<?php echo $id_admin;?>" class="btn btn-xs btn-info" title="Edit">
                                 <i class="fas fa-edit"></i> Edit</a>
                                 <a href="javascript:if(confirm('Anda yakin ingin menghapus data 
                                    <?php echo $id_admin.' - '.$nama; ?>?'))window.location.href = 'user.php?aksi=hapus&data=<?php echo $id_admin;?>'" 
                                    class="btn btn-xs btn-warning"><i class="fas fa-trash"  title="Hapus"></i> Hapus 
                                 </a> 
                              </td>
                           </tr>
                           <?php
                              $no++;
                              }?> 
                        </tbody>
                     </table>
                  </div>
                  <?php
				//hitung jumlah semua data 
         
            $sql_jum = "select `id_admin`, `nama`, `email`, `level` from `admin`"; 
               if (isset($_GET["katakunci"])){
                     $katakunci_user = $_GET["katakunci"];
                     $sql_jum .= " where `nama` LIKE '%$katakunci_user%'";
               } 
            $sql_jum .= " order by `id_admin`";
 
				$query_jum = mysqli_query($koneksi,$sql_jum);
				$jum_data = mysqli_num_rows($query_jum);
				$jum_halaman = ceil($jum_data/$batas);	
				?>
                  <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                        <?php 
                        if($jum_halaman==0){
                           //tidak ada halaman
                        }else if($jum_halaman==1){
                           echo "<li class='page-item'><a class='page-link'>1</a></li>";
                        }else{
                           $sebelum = $halaman-1;
                           $setelah = $halaman+1;
                           if (isset($_GET["katakunci"])){
                              $katakunci_user = $_GET["katakunci"];
                              if($halaman!=1){
                                 echo "<li class='page-item'><a class='page-link' 
                                 href='user.php?katakunci=$katakunci_user&halaman=1'>
                                 First</a></li>";
                                 echo "<li class='page-item'><a class='page-link' 
                             href='user.php?katakunci=$katakunci_user&halaman=$sebelum'>
                                 «</a></li>";
                              }
                              for($i=1; $i<=$jum_halaman; $i++){
                                if($i!=$halaman){
                                   echo "<li class='page-item'><a class='page-link' 
                                 href='user.php?katakunci=$katakunci_user&halaman=$i'>
                                   $i</a></li>";
                                }else{
                                    echo "<li class='page-item'>
                                    <a class='page-link'>$i</a></li>";
                                }
                              }
                              if($halaman!=$jum_halaman){
                                echo "<li class='page-item'><a class='page-link'  
                             href='user.php?katakunci=$katakunci_user&halaman=$setelah'>
                                »</a></li>";
                                echo "<li class='page-item'><a class='page-link' 
                                href='user.php?katakunci=$katakunci_user&=$jum_halaman'>
                                Last</a></li>";
                              }
                          }else{
                        if($halaman!=1){
                           echo "<li class='page-item'>
                           <a class='page-link' href='user.php?halaman=1'>
                           First</a></li>";
                           echo "<li class='page-item'>
                           <a class='page-link' href='user.php?halaman=$sebelum'>
                           «</a></li>";
                        }
                        for($i=1; $i<=$jum_halaman; $i++){
                           if($i!=$halaman){
                              echo "<li class='page-item'>
                              <a class='page-link' href='user.php?halaman=$i'>
                              $i</a></li>";
                           }else{
                              echo "<li class='page-item'>
                              <a class='page-link'>$i</a></li>";
                           }
                        }
                        if($halaman!=$jum_halaman){
                           echo "<li class='page-item'>
                           <a class='page-link' href='user.php?halaman=$setelah'>
                           »</a></li>";
                           echo "<li class='page-item'>
                           <a class='page-link' href='user.php?halaman=$jum_halaman'>
                           Last</a></li>";
                        }
                     }
                        }?>
                        </ul>

                        

              </div>
               </div>
         </div>
         <!-- /.card-body -->         
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
}else{
   header("Location: index.php");
} ?>