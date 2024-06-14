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
            <h1>Prospecteurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Prospecteurs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Taking all 5 values from the form data(input)
    $NomPros =  $_POST['NomPros'];
    $PreNomPros = $_POST['PreNomPros'];
    $FonctionPros =  $_POST['FonctionPros'];
    $NumTelPros = $_POST['NumTelPros'];
    $EmailPros = $_POST['EmailPros'];
    $MotdpassePros = $_POST['MotdpassePros'];
    $NumAuthPros = $_POST['NumAuthPros'];

$sql = "INSERT INTO  prespecteur ( `ID_P`,`Nom_P`, `Prenom_P`, `Fonction_P`, `Tel_P`, `Email_P`, `Motdpasse`, `Num_auth`) VALUES (Null,'$NomPros','$PreNomPros','$FonctionPros',$NumTelPros,'$EmailPros',$MotdpassePros,$NumAuthPros)";
$query 		= mysqli_query($con,$sql);
if ($query) {
  ?><div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i> Alert!</h5>
  Success New record created successfully
</div>
<?php
} else {?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Danger alert 
       <?php        

  echo "Error: " . $sql . "<br>" . $con->error;
  ?>
  </div>
  <?php
}
    }
?>    
    <!-- /.content -->
 
      <!-- Table -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des Prospecteurs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <td>
              <form action="AddProspecteur.php" method="POST">        
              <button type="submit" class="btn btn-block bg-gradient-primary btn-sm" title="NewEs" name="newEs">Ajouter un prospecteur</button>
              </form>
              </td>
                    
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>ID prospecteur</th>
                    <th>Nom Prospecteur</th>
                    <th>Prenom Prospecteur</th>
                    <th>Fonction Prospecteur</th>
                    <th>Tél Prospecteur</th>
                    <th>Email Prospecteur</th>
                  </tr>
                  </thead>
              <tbody>
              <?php 
        // entrpeises liste 
                $resultE=mysqli_query($con, "SELECT `ID_P`, `Nom_P`, `Prenom_P`, `Fonction_P`, `Tel_P`, `Email_P` FROM `prespecteur` ORDER BY `ID_P` DESC")or die('Error In Session');
                if(!empty($resultE)){
              while( $row2 = mysqli_fetch_array( $resultE, MYSQLI_NUM ) ) {?>
                  <tr>
                   <td><?php echo "$row2[0]"; ?></td>
                    <td><?php echo "$row2[1]";?></td>
                    <td><?php echo "$row2[2]";  ?></td>
                    <td><?php echo "$row2[3]"; ?></td>
                    <td><?php echo "$row2[4]"; ?></td>
                    <td><?php echo "$row2[5]"; ?></td>
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