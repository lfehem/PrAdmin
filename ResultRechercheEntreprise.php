<?php 
include('includes/dbcon.php');
include('includes/session.php'); 
$result=mysqli_query($con, "select * from prespecteur where ID_P='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// entrpeises liste 
$resultE=mysqli_query($con, "select Nom_E,Type_E,Tel_E,Email_E,Nom_Res_E from entreprise")or die('Error In Session');


 ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!--navbar/sidebar start -->
    <?php include "includes/nav.php"; ?>
    <!--navbar/sidebar end  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Recherche Entreprise</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Recherche Entreprise</li>
              <li class="breadcrumb-item active">Resultat de Recherche</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Content Wrapper. Contains page content -->
  

    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h2 class="text-center display-4">Recherche</h2>
      </div>
    </section>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // search input  
    $search= $_POST['search'];
 
 }
    ?>  
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="ResultRechercheEntreprise.php" method="POST">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" id="search" name="search" placeholder="Entrer le Nom ou l'identifiant de l'entreprise" value="<?php echo $search?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                  
                        
                       
                <div class="list-group-item">
                <div class="card-header">
              </div>     
                            <!-- /.card-header -->
              <div class="card-body table-responsive p-0">       
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>Identifiant</th>
                    <th>Nom Entreprise</th>
                    <th>Type</th>
                    <th>Date de création</th>
                    <th>Status juridique</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Nom responsable</th>
                    <th>Nombre employés</th>
                    <th>Chiffre d'affaire</th>
                  </tr>
                  </thead>
              <tbody>
              <?php 
        // entrpeises liste 
                $resultE=mysqli_query($con, "SELECT `ID_E`, `Nom_E`, `Type_E`, `Date_ceation_E`, `Statut_juridique_E`, `Tel_E`, `Email_E`, `Nom_Res_E`, `Nbr_empl_E`, `CA_E` FROM `entreprise` WHERE `Nom_E` LIKE '%".$search."%' OR (`ID_E` LIKE '%".$search."%') ")or die('Error In Session');
                
                if(!empty($resultE)){
              while( $row2 = mysqli_fetch_array( $resultE, MYSQLI_NUM ) ) {?>
                  <tr>
                   <td><?php echo "$row2[0]"; ?></td>
                    <td><?php echo "$row2[1]";?></td>
                    <td><?php echo "$row2[2]";  ?></td>
                    <td><?php echo "$row2[3]"; ?></td>
                    <td><?php echo "$row2[4]"; ?></td>
                    <td><?php echo "$row2[5]"; ?></td>
                    <td><?php echo "$row2[6]";?></td>
                    <td><?php echo "$row2[7]";  ?></td>
                    <td><?php echo "$row2[8]"; ?></td>
                    <td><?php echo "$row2[9]"; ?></td>
                  </tr>
                  <?php   }}
                  if (mysqli_num_rows($resultE)==0){?>
                    <tr>
                    <td></td>
                      <td></td>
                      <td>
                    <div class="card">
        <div class="card-footer">
        <?php echo "Aucun resultat !!!";?>
        </div>
                  </div>
                  </td>
                  <td></td>
                      <td></td>
                  </tr>
                    <?php   }?>  
                  </tbody>
                </table>
              </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    



  <!-- /.content-wrapper -->
 <!-- footer  -->
 <?php include "includes/footer.php"; ?>
   <!-- /.footer  -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
</div>
<!-- ./wrapper -->
</body>
</html>
