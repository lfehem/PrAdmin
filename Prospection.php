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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Prospections</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Prospections</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // intervewee table 
    $ID_P = $_POST['ID_P'];
    $ID_E = $_POST['ID_E'];
    $ID_PI=$_POST['ID_PI'];
    //prospection table 
    $DatePro = $_POST['DatePro'];
    $sujetPro = $_POST['sujetPro'];
    $DiffPro =  $_POST['DiffPro'];
    $OppPro = $_POST['OppPro'];
    $CommPro = $_POST['CommPro'];
    $SourcePro= $_POST['SourcePro'];
    $SatutPro = $_POST['SatutPro'];
   
$sql2 = "INSERT INTO prospection (`ID_Pr`,`Date_Pr`, `Sujet_Pr`, `Difficulte_Pr`, `Opportunite_Pr`, `Commentaires_Pr`,`Source_Pr`,`Statut_act_Pr`, `ID_P`, `ID_E`,`ID_PI`) VALUES (null,STR_TO_DATE('$DatePro','%d/%m/%Y'),'$sujetPro','$DiffPro','$OppPro','$CommPro','$SourcePro','$SatutPro',$ID_P,$ID_E,$ID_PI)";
$query2 		= mysqli_query($con,$sql2);
if ($query2) {
  ?><div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i> Alert!</h5>
  Success : Nouvelles prospection Ajouter
</div>
<?php
} else {?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Erruer d'entregistrement de la prospection
       <?php        

  echo "Error: " . $sql2 . "<br>" . $con->error;
  ?>
  </div>
  <?php
}
    }
    ?>  
<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4"></h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="ResultRechercheProspection.php" method="POST">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" id="search" name="search"  placeholder="Entrer le sujet ou l'identifiant de la prospection">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <!-- Table -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des Prospections</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <td>
              <form action="AddProspection.php" method="POST">        
              <button type="submit" class="btn btn-block bg-gradient-primary btn-sm" title="NewPros" name="newPros">Nouvelles Prospection</button>
              </form>
              </td>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">Identifian</th>
                    <th class="text-center">Date premier contact</th>
                    <th class="text-center">Sujet de la prospection</th>
                    <th class="text-center">Difficultés rencontrer</th>
                    <th class="text-center">Opportunitées</th>
                    <th class="text-center">Commentaires</th>
                    <th class="text-center">Source de prospect</th>
                    <th class="text-center">Satatut actuel</th>
                  </tr>
                  </thead>
              <tbody>
              <?php   
              // entrpeises liste 
              $resultE=mysqli_query($con, "SELECT `ID_Pr`, `Date_Pr`, `Sujet_Pr`, `Difficulte_Pr`, `Opportunite_Pr`, `Commentaires_Pr`, `Source_Pr`, `Statut_act_Pr`, `ID_P`, `ID_E`,`ID_PI` FROM `prospection` ORDER BY `ID_Pr` DESC")or die('Error In Session');
              if(!empty($resultE)){
              while( $row2 = mysqli_fetch_array( $resultE, MYSQLI_NUM ) ) {?>
                  <tr>
                  <td class="project-actions text-right">
                  <form action="ConsultProspection.php" method="POST">
                  <input type="hidden" id="ID_PR" name="ID_PR" value=<?php echo "$row2[0]"?>>
                  <input type="hidden" id="ajAction" name="ajAction" value=<?php echo null ?>>
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-folder"></i> Voir
                  </button>
                </form>
                
                <form action="Historique.php" method="POST">
                  <input type="hidden" id="ID_PR" name="ID_PR" value=<?php echo "$row2[0]"?>>
                  <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Historique</button>
                </form></td>
                <td><?php echo "$row2[0]";?></td>
                    <td><?php echo "$row2[1]";?></td>
                    <td><?php echo "$row2[2]";  ?></td>
                    <td><?php echo "$row2[3]"; ?></td>
                    <td><?php echo "$row2[4]"; ?></td>
                    <td><?php echo "$row2[5]"; ?></td>
                    <td><?php echo "$row2[6]"; ?></td>
                    <td><?php echo "$row2[7]"; ?></td>
                    
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
                  <tfoot>
                  <tr>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  <!-- Table -->



       <!--/ Main content -->
    



  <!-- /.content-wrapper -->

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
 <!-- footer  -->
 <?php include "includes/footer.php"; ?>
   <!-- /.footer  -->
<!-- ./wrapper -->
</body>
</html>
