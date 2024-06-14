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
            <h1 class="m-0">Historique de Modifications</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Historique de Modifications</li>
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
        <h2 class="text-center display-8">Historique des modification de la prospection </h2>
      </div>
    </section>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // search input  
    $ID_Pr= $_POST['ID_PR'];

    $resultPr=mysqli_query($con, "select * from `prospection` WHERE `ID_Pr`='$ID_Pr'")or die('Error In Session');
    $rowPr=mysqli_fetch_array($resultPr);
 
 }
    ?>  
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">Date premier contact : <?php echo $rowPr['Date_Pr'] ?></div>
                                        <h5>identifiant : <?php echo $rowPr['ID_Pr'] ?></h5>
                                        <h5>Sujet du prospection : <?php echo $rowPr['Sujet_Pr'] ?></h5>
                                        <h5>Source du prospect : <?php echo $rowPr['Source_Pr'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
        // entrpeises liste 
                
                $resultE=mysqli_query($con, "SELECT `ID_H`, `ID_Pr`, `Date_Pr`, `Sujet_Pr`, `Difficulte_Pr`, `Opportunite_Pr`, `Commentaires_Pr`, `Source_Pr`, `Statut_act_Pr`, `ID_P`, `ID_E`, `ID_PI` FROM `historique` WHERE `ID_Pr`=$ID_Pr")or die('Error In Session');
                
                if(!empty($resultE)){
              while( $row2 = mysqli_fetch_array( $resultE, MYSQLI_NUM ) ) {
                $ID_P= $row2[9];
                $resultPPr=mysqli_query($con, "SELECT `ID_P`, `Nom_P`, `Prenom_P`, `Fonction_P`, `Tel_P`, `Email_P`, `Motdpasse`, `Num_auth` FROM `prespecteur` WHERE  `ID_P`=$ID_P")or die('Error In Session');
                 $rowPPr=mysqli_fetch_array($resultPPr);
                                                 ?>

              

                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                <h5 class="text-muted">Modification  par :</h5>
                                <ul class="list-unstyled">
                                <li class="text-sm">Nom & Prénom
                                    <b class="d-block"><?php echo $rowPPr['ID_P']; ?></b>
                                </li>
                                <li class="text-sm">Numéro de TéléphoneNom & Prénom
                                    <b class="d-block"><?php echo $rowPPr['Nom_P'].' '. $rowPPr['Prenom_P']; ?></b>
                                </li>
                                <li class="text-sm">Fonction du prospecteur
                                    <b class="d-block"><?php echo $rowPPr['Fonction_P']; ?></b>
                                </li>
                                <li class="text-sm">Numéro de Téléphone
                                    <b class="d-block"><?php echo $rowPPr['Tel_P']; ?></b>
                                </li>
                                <li class="text-sm">Email
                                    <b class="d-block"><?php echo $rowPPr['Email_P']; ?></b>
                                </li>
                                </ul>
                                <ul >
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">Date de Modiication:<?php echo "$row2[2]"; ?></div>
                                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <div class="text-muted">
                                <ul class="list-unstyled">
                                    <li class="text-sm">Sujet du prospection
                                        <b class="d-block"><?php echo "$row2[3]"; ?></b>
                                    </li>
                                    <li class="text-sm">Source du prospect
                                        <b class="d-block"><?php echo "$row2[7]"; ?></b>
                                    </li>
                                    <li class="text-sm">Dificultées rencontrer
                                        <b class="d-block"><?php echo "$row2[4]"; ?></b>
                                    </li>
                                    <li class="text-sm">Oportinutées
                                        <b class="d-block"><?php echo "$row2[5]"; ?></b>
                                    </li>
                                    <li class="text-sm">Commentaires
                                        <b class="d-block"><?php echo "$row2[6]"; ?></b>
                                    </li>
                                    <li class="text-sm">Status actuelles
                                        <b class="d-block"><?php echo "$row2[8]"; ?></b>
                                    </li>
                                    </ul>
                                    </div>        
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row">
                                
                            </div>
                        </div>

                        <?php   }}?> 
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
