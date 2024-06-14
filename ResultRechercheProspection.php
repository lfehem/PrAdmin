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
  <title>Pr-Admin</title>

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
            <h1 class="m-0">Recherche Prospection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Recherche Prospection</li>
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
                    <form action="ResultRechercheProspection.php" method="POST">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" id="search" name="search" placeholder="Entrer le sujet ou l'identifiant de l'entreprise" value="<?php echo $search?>">
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
                  <th> </th>
                  <th>Identifiant</th>
                    <th>Date de Prospection</th>
                    <th>Sujet</th>
                    <th>Difficulte rencontrer</th>
                    <th>Opportunités</th>
                    <th>Commentaires</th>
                    <th>Source de prospection</th>
                    <th>Status actuelle</th>
                  </tr>
                  </thead>
              <tbody>
              <?php 
        // entrpeises liste 
                $resultE=mysqli_query($con, "SELECT `ID_Pr`, `Date_Pr`, `Sujet_Pr`, `Difficulte_Pr`, `Opportunite_Pr`, `Commentaires_Pr`, `Source_Pr`, `Statut_act_Pr`, `ID_P`, `ID_E`, `ID_PI` FROM `prospection` WHERE `Sujet_Pr` LIKE '%".$search."%' OR (`ID_Pr` LIKE '%".$search."%') OR (`ID_Pr` LIKE '%".$search."%') ")or die('Error In Session');
                
                if(!empty($resultE)){
              while( $row2 = mysqli_fetch_array( $resultE, MYSQLI_NUM ) ) {?>
                  <tr>
                  <td class="project-actions text-right">
                  <form action="ConsultProspection.php" method="POST">
                  <input type="hidden" id="ID_PR" name="ID_PR" value=<?php echo "$row2[0]"?>>
                  <input type="hidden" id="ajAction" name="ajAction" value=<?php echo null ?>>
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-folder"></i> Detaills
                  </button>
                </form></td>
                   <td><?php echo "$row2[0]"; ?></td>
                    <td><?php echo "$row2[1]";?></td>
                    <td><?php echo "$row2[2]";  ?></td>
                    <td><?php echo "$row2[3]"; ?></td>
                    <td><?php echo "$row2[4]"; ?></td>
                    <td><?php echo "$row2[5]"; ?></td>
                    <td><?php echo "$row2[6]";?></td>
                    <td><?php echo "$row2[7]";  ?></td> 
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
