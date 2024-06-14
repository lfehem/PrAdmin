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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/getData.js"></script>
<script type="text/javascript" src="script/dist/js/getData.js"></script>
<script type="text/javascript" src="script/js/getData.js"></script>
  <script type="text/javascript" src="dist/js/getData.js"></script>
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
            <h1>Ajouter Entreprise</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ajouter Entreprise</li>
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
                <h3 class="card-title">Nouvelle Entreprise</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="Entreprises.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="NomEse">Nom de l'entreprise</label>
                    <input type="text" class="form-control" name="NomEse" placeholder="Entrer Nom d'entreprise">
                  </div>
                  <div class="form-group">
                    <label for="TypeEse">Typed'entreprise</label>
                    <input type="text" class="form-control" name="TypeEse" placeholder=" d'entreprise">
                  </div>
                  <!-- Date dd/mm/yyyy -->
                
                  <!-- Date -->
               <div class="form-group">
                  <label>Date de création de l'entreprise</label>
                    <div class="input-group date" id="DateEse" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#DateEse" name="DateEse"/>
                        <div class="input-group-append" data-target="#DateEse" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                  <!-- /.input group -->
                
                <!-- /.form group -->
                 
                  <div class="form-group">
                    <label for="StatJEse">Status juridique de l'entreprise</label>
                    <input type="text" class="form-control" name="StatJEse" placeholder="Entrer Nom d'entreprise">
                  </div>
                  <div class="form-group">
                    <label for="NumTelEse"> Numero de Téléphone </label>
                    <input type="text" class="form-control" name="NumTelEse" placeholder="Entrer Nom d'entreprise">
                  </div>
                  <div class="form-group">
                    <label for="EmailEse">Email</label>
                    <input type="text" class="form-control" name="EmailEse" placeholder="Entrer Nom d'entreprise">
                  </div>
                  <div class="form-group">
                    <label for="NomRes">Nom responsable</label>
                    <input type="text" class="form-control" name="NomRes" placeholder="Entrer Nom d'entreprise">
                  </div>
                  <div class="form-group">
                    <label for="NbrEmpl">Nombre d'employés</label>
                    <input type="text" class="form-control" name="NmrEmpl" placeholder="Nombre d'emplyés">
                  </div>
                  <div class="form-group">
                    <label for="CA_E">Chifre d'affaire</label>
                    <input type="text" class="form-control" name="CA_E" placeholder="CA">
                  </div>
                              <!-- select -->
                  <?php
                  $resultD=mysqli_query($con, "select ID_DA,Nom_D from domain_activte")or die('Error In Session');

                  ?>
                <div class="form-group">
                  <label for="DA_E">Domain d'activité</label>
                    <select class="form-control" name="DA_E" placeholder="Domain d'activité">
                        <?php 
                         while ($row = $resultD->fetch_assoc()) {

                             unset($id, $name);
                             $id = $row['ID_DA'];
                            $name = $row['Nom_D']; 
                             echo '<option value="'.$id.'">'.$name.'</option>';

                            }
                        ?>
                          
                     </select>
                </div>
                <?php
                  $resultDs=mysqli_query($con, "select ID_DA,Nom_D from domain_activte")or die('Error In Session');

                  ?>
                <div class="form-group">
                  <label for="DAS_E">Domain d'activité secondaire</label>
                    <select class="form-control" name="DAS_E" placeholder="Domain d'activité secondaire">  
                    <option value= 0>----------</option>
                       <?php 
                 while ($row = $resultDs->fetch_assoc()) {

                  unset($ids, $names);
                  $ids = $row['ID_DA'];
                  $names = $row['Nom_D']; 
                  echo '<option value="'.$ids.'">'.$names.'</option>';

                            }
                        ?>
                     </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" value="Submit" class="btn btn-primary">Valider</button>
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
   <?php include "includes/pluginsdordate.php"; ?>
   <!-- /.footer  -->
</div>
<!-- ./wrapper -->
</body>
</html>