<?php 
include('includes/dbcon.php');
include('includes/session.php'); 
$result=mysqli_query($con, "select * from prespecteur where ID_P='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// entrpeises liste 
$resultE=mysqli_query($con, "select Nom_E,Type_E,Tel_E,Email_E,Nom_Res_E from entreprise")or die('Error In Session');


 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
 <!-- XXXXXXX-->
  <!-- Site wrapper -->
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
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bonjour <?php echo $row['Nom_P']; ?></h3>
  
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      <!-- Table -->
  <!-- Main content -->
 <?php 
   //total des propections
      $resultPros=mysqli_query($con, "SELECT COUNT(*) as totProspections  FROM `prospection`")or die('Error In Session totProspections');
      $totProspection=mysqli_fetch_array($resultPros);
  // total des entreprises propectées 
      $resultEs=mysqli_query($con, "SELECT COUNT(*) as totentreprise  FROM `entreprise`")or die('Error In Session entreprise');
      $totEntreprise=mysqli_fetch_array($resultEs);
  // total des prospecteurs
      $resultPr=mysqli_query($con, "SELECT COUNT(*) as totPrespecteur  FROM `prespecteur`")or die('Error In Session totProspecteur');
      $totProspecteur=mysqli_fetch_array($resultPr);
  // total des interviews
      $resultPI=mysqli_query($con, "SELECT COUNT(*) as totPI  FROM `personne_interviewe`")or die('Error In Session totPI');
      $totInterview=mysqli_fetch_array($resultPI);
      
      ?>
      
      <!-- Small Box (Stat card) -->
      <h5 class="mb-2 mt-4">Tableau de bord</h5>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totProspection['totProspections'] ?></h3>

                <p>Prospections Réalisées</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="Prospection.php" class="small-box-footer">
                Plus d'info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totEntreprise['totentreprise'] ?></h3>

                <p>Entreprises prospectées</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <a href="Entreprises.php" class="small-box-footer">
              Plus d'info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totProspecteur['totPrespecteur'] ?></h3>

                <p>Prospecteurs</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="Prospecteur.php" class="small-box-footer">
              Plus d'info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totInterview['totPI'] ?></h3>

                <p>Prospects Interviewée</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

  

  <!-- /.Main contenue -->
</div>
   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
   <!-- footer  -->
  <?php include "includes/footer.php"; ?>
   <!-- /.footer  -->
</div>
</body>
</html>