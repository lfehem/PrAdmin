<?php 
include('includes/dbcon.php');
include('includes/session.php'); 
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
            <h1>Entreprises</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Entreprises</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Taking all 5 values from the form data(input)
    $Nom_Ese =  $_POST['NomEse'];
    $Type_Ese = $_POST['TypeEse'];
    $Date_Ese =  $_POST['DateEse'];
    $Statj_Ese = $_POST['StatJEse'];
    $NumTel_Ese = $_POST['NumTelEse'];
    $Email_Ese = $_POST['EmailEse'];
    $NomRes = $_POST['NomRes'];
    $NbrEmpl = $_POST['NmrEmpl'];
    $CA_E = $_POST['CA_E'];
    $DA_E = $_POST['DA_E'];
    $DAS_E = $_POST['DAS_E'];

$sql = "INSERT INTO  entreprise ( `ID_E`,`Nom_E`, `Type_E`, `Date_ceation_E`, `Statut_juridique_E`, `Tel_E`, `Email_E`, `Nom_Res_E`, `Nbr_empl_E`, `CA_E`, `ID_DA`, `ID_DAS`) VALUES (Null,'$Nom_Ese','$Type_Ese',STR_TO_DATE('$Date_Ese','%d/%m/%Y'),'$Statj_Ese',$NumTel_Ese,'$Email_Ese','$NomRes',$NbrEmpl,$CA_E,$DA_E,$DAS_E)";
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
                  Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
                  entire
                  soul, like these sweet mornings of spring which I enjoy with my whole heart.
       <?php        

  echo "Error: " . $sql . "<br>" . $con->error;
  ?>
  </div>
  <?php
}
    }

?>
   
      <!-- /.card -->
<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-9"></h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="ResultRechercheEntreprise.php" method="POST">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" id="search" name="search"  placeholder="Entrer le Nom ou l'identifiant de l'entreprise">
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
                <h3 class="card-title">Liste d'entreprises</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <td>
              <form action="AddEntreprise.php" method="POST">        
              <button type="submit" class="btn btn-block bg-gradient-primary btn-sm" title="NewEs" name="newEs">Ajouter une nouvelles Entreprise</button>
              </form>
              </td>
                    
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>ID</th>
                    <th>Nom Entreprise</th>
                    <th>Type</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Nom responsable</th>
                  </tr>
                  </thead>
              <tbody>
              <?php 
        // entrpeises liste 
                $resultE=mysqli_query($con, "select ID_E,Nom_E,Type_E,Tel_E,Email_E,Nom_Res_E from entreprise ORDER BY ID_E DESC")or die('Error In Session');
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