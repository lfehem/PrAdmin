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
  <div class="content-wrapper" style="height: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter Prospecteur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ajouter Prospecteur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nouveau Prospecteur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="Prospecteur.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="NomPros">Nom du prospecteur</label>
                    <input type="text" class="form-control" name="NomPros" placeholder="Entrer Nom du prospecteur">
                  </div>
                  <div class="form-group">
                    <label for="PreNomPros">Prenom prospecteur</label>
                    <input type="text" class="form-control" name="PreNomPros" placeholder="Entrer Prenom prospecteur">
                  </div>
                  <div class="form-group">
                    <label for="FonctionPros">La fonction du prospecteur</label>
                    <input type="text" class="form-control" name="FonctionPros" placeholder="Entrer La fonction du prospecteur dans l'équipe">
                  </div>
                  <div class="form-group">
                    <label for="NumTelPros"> Numero de Téléphone </label>
                    <input type="text" class="form-control" name="NumTelPros" placeholder="Entrer Numéros du tel">
                  </div>
                  <div class="form-group">
                    <label for="EmailPros">Email</label>
                    <input type="text" class="form-control" name="EmailPros" placeholder="Entrer le mail du prospecteur">
                  </div>
                  <div class="form-group">
                    <label for="MotdpassePros">Mots de passe </label>
                    <input type="text" class="form-control" name="MotdpassePros" required="required" placeholder="Mot de passe initiale ">
                  </div>
                  <div class="form-group">
                    <label for="NumAuthPros">Numero d'authetification du prospecteur</label>
                    <input type="number" class="form-control" name="NumAuthPros" required="required" placeholder="Numero d'authetification du prospecteur">
                  </div>
        
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" value="Submit" class="btn btn-primary">Valider la création</button>
                </div>
              </form>
            </div>
  
          </div>
          <!--/.col (left) -->
          <!-- right column -->
        <div class="col-md-6">
            
            <!-- /.card --> 
        </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  
    </section>
    <!-- /.content -->
  </div>
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
   <!-- footer  -->
  <?php include "includes/footer.php"; ?>
   <!-- /.footer  -->
</div>
<!-- ./wrapper -->
</body>
</html>