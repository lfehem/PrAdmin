<?php 
include('includes/dbcon.php');
include('includes/session.php'); 
$result=mysqli_query($con, "select * from prespecteur where ID_P='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// entrpeises liste 
$resultE=mysqli_query($con, "select Nom_E,Type_E,Tel_E,Email_E,Nom_Res_E from entreprise")or die('Error In Session');
 ?>
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
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Bootstrap slider -->
<script src="../../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
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
            <h1 class="m-0">Ajouter Nouvelle Prospection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nouvelle Prospection</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
       <!-- Main content -->
    
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
         <div class="col-md-8">
                <!-- general form elements -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Entreprise</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <div class="form-group">
                  
                   <!-- select -->
                   <?php
                  $resultEse=mysqli_query($con, "select ID_E,Nom_E,Type_E,Date_ceation_E,Statut_juridique_E, Tel_E,Email_E,Nom_Res_E,Nbr_empl_E,CA_E,ID_DA,ID_DAS From entreprise")or die('Error In Session');

                  ?>
                  
                  <select id="Entreprise" class="form-control select2" name="DA_E" style="width: 100%;">
                  <option value="" > selectionner une entreprise</option>
                  <?php 
                         while ($row = $resultEse->fetch_assoc()) {

                             unset($id, $name);
                             $id = $row['ID_E'];
                            $name = $row['Nom_E'];

                              echo '<option value="'.$id.'" selected="selected">'.$name.'</option>';

                            }
                        ?>
                  </select>
                </div>
                <!--result of the selection-->
                <div class="card card-primary card-outline">
    <section class="content">
        <div class="container-fluid">
           
           <div class="card-body box-profile">                          
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                Nom entreprise :
                <h3 id="Nom_E">-----</h3>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                Type entreprise :
                <h4 id="Type_E">-----</h4>
                </div>
                <div class="form-group">
                Numéro de contact :
                <h5 id="Tel_E">-----</h5>
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                Email de contact :
                <h4 id="Email_E">-----</h4>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                Nombre d'employés :
                <h5 id="Nbr_empl_E">-----</h5>
                </div>
                <!-- /.form-group -->
                 <!-- /.form-group -->
                 <div class="form-group">
                Status juridique :
                <span class="badge bg-danger" id="Statut_juridique_E">-----</span>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                Date de création :
                <h5 id="Date_ceation_E">---/--/----</h5>
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
            </div> 
         
    </section>
                          </div>
        </div>
                <!-- /.card-body -->
                </div>
                
                <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
        <div class="col-md-4">
        <div class="card card-primary disable">
              <div class="card-header">
                <h3 class="card-title">Prospecteur</h3>
              </div>
              <!-- /.card-header -->
              <?php
            $resultP=mysqli_query($con, "select * from prespecteur where ID_P='$session_id'")or die('Error In Session');
            $rowP=mysqli_fetch_array($resultP);
              ?>
              
                <div class="card-body">
                  <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo $rowP['Nom_P'] ?></h3>

                <p class="text-muted text-center"><?php echo $rowP['Prenom_P'] ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Identifian</b> <a class="float-right"><?php echo $rowP['ID_P'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Fonction</b> <a class="float-right"><?php echo $rowP['Fonction_P'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>E-mail</b> <a class="float-right"><?php echo $rowP['Email_P'] ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                </div>
              
                </div>
                <!-- /.card -->
            </div>
          <!--/.col (right) -->
        </div>
        
          <!-- general form elements -->
      <div class="card card-green">
              <div class="card-header">
                <h3 class="card-title">Inormation Personelles du Prospect </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
      <form action="AddProspectionDetails.php" method="POST">
        <!-- Id prospecteur and Id entreprise to be added to the form -->
              <div class="card-body">  
              <?php echo '<input type="hidden" id="ID_P" name="ID_P" value="'.$session_id.'" >';  ?>
              <input type="hidden" id="ID_E" name="ID_E" >
                        <!-- SELECT2 EXAMPLE -->
        <div class="card card-Info card-outline">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="NomPI">Nom du prospect</label>
                <input type="text" class="form-control" name="NomPI" placeholder="Entrer Nom du prospect">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label for="EmailPI">Email</label>
                <input type="email" class="form-control" name="EmailPI" placeholder="Entrer email du prospect">
                </div>
                <div class="form-group">
                <label for="FonctionPI">La fonction du prosspect dans l'oganisation</label>
                <input type="text" class="form-control" name="FonctionPI" placeholder="Entrer la fonction du prospect">
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                <label for="PrenomPI">Prénom</label>
                <input type="text" class="form-control" name="PrenomPI" placeholder="Entrer Prénom du prospect">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label for="TelPI">Téléphone</label>
                <input type="text" class="form-control" name="TelPI" placeholder="Entrer le Tel du prospecteur">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>
        <div class="card-footer">
                    <div class="float-right">
                  <button type="submit" value="Submit" class="btn btn-Success btn-lg" >Valider</button>
                          </div>
                </div>
                          </div>
       
                         
    </form>
            </div>

      </div><!-- /.container-fluid -->
      
</section>
    <!-- /.content -->
    
    <!-- /.content -->
   
    



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
  
   <?php include "includes/pluginsdordate.php"; ?>
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
      min     : 0,
      max     : 5000,
      from    : 1000,
      to      : 4000,
      type    : 'double',
      step    : 1,
      prefix  : '$',
      prettify: false,
      hasGrid : true
    })
    $('#range_2').ionRangeSlider()

    $('#range_5').ionRangeSlider({
      min     : 0,
      max     : 10,
      type    : 'single',
      step    : 0.1,
      postfix : ' mm',
      prettify: false,
      hasGrid : true
    })
    $('#range_6').ionRangeSlider({
      min     : -50,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '°',
      prettify: false,
      hasGrid : true
    })

    $('#range_4').ionRangeSlider({
      type      : 'single',
      step      : 100,
      postfix   : ' light years',
      from      : 55000,
      hideMinMax: true,
      hideFromTo: false
    })
    $('#range_3').ionRangeSlider({
      type    : 'double',
      postfix : ' miles',
      step    : 10000,
      from    : 25000000,
      to      : 35000000,
      onChange: function (obj) {
        var t = ''
        for (var prop in obj) {
          t += prop + ': ' + obj[prop] + '\r\n'
        }
        $('#result').html(t)
      },
      onLoad  : function (obj) {
        //
      }
    })
  })
</script>
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

   
  })
</script>
</body>
</html>
