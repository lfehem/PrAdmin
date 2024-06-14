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
              <li class="breadcrumb-item active">Detaills Nouvelle Prospection</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // intervewee table 
    $ID_P = $_POST['ID_P'];
    $ID_E = $_POST['ID_E'];
    
    $NomPI =  $_POST['NomPI'];
    $PrenomPI = $_POST['PrenomPI'];
    $EmailPI =  $_POST['EmailPI'];
    $FonctionPI = $_POST['FonctionPI'];
    $TelPI = $_POST['TelPI'];

    $sql = "INSERT INTO  personne_interviewe (`ID_PI`, `Nom_PI`, `Prenom_PI`, `Tel_PI`, `Email_PI`, `Fonction_PI`, `ID_E`) VALUES (null,'$NomPI','$PrenomPI',$TelPI,'$EmailPI','$FonctionPI',$ID_E)";
    $query= mysqli_query($con,$sql);
if ($query) {
  ?><div class="card-body">  
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i> Etape 1:</h5>
  Success : Informations personelles enregistrer
  passer au Questionnaire de la Prospection
</div>
 
<?php
$resultPI=mysqli_query($con, "SELECT `ID_PI` FROM `personne_interviewe` WHERE `ID_E`=$ID_E and `Nom_PI`= '$NomPI' and `Prenom_PI`='$PrenomPI'");
$rowPI=mysqli_fetch_array($resultPI);
$ID_PI=$rowPI['ID_PI'];
} else {?><div class="card-body">  
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Erruer dans d'entregistrement d'Informations personelles 
       <?php        

  echo "Error: " . $sql . "<br>" . $con->error;
  ?>
  </div>
  </div>
  <?php
}
}?>    
       <!-- Main content -->
    
<section class="content">
    <div class="container-fluid">
          <!-- general form elements -->
      <div class="card card-green">
              <div class="card-header">
                <h3 class="card-title">Prospection</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->      
    <form action="Prospection.php" method="POST">
    <input type="hidden" id="ID_P" name="ID_P" value="<?php echo $ID_P ?>" >
    <input type="hidden" id="ID_E" name="ID_E" value="<?php echo $ID_E ?>" >
    <input type="hidden" id="ID_PI" name="ID_PI" value="<?php echo $ID_PI ?>" >
    
      <div class="card-body">   
      <div class="card card-Info">
          <div class="card-header">
            <h3 class="card-title">Questionnaire de prospection</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <!-- /.form-group -->
               <!-- Date -->
               <div class="form-group">
                  <label>Date de premier contact:</label>
                    <div class="input-group date" id="DatePro" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#DatePro" name="DatePro"/>
                        <div class="input-group-append" data-target="#DatePro" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- //Date --> 
                <!-- /.form-group -->
                <div class="form-group">
                <label for="sujetPro">Sujet de la prospection</label>
                <input type="text" class="form-control" name="sujetPro" placeholder="Entrer le sujet de la prospection">
                </div>
                
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                <label for="OppPro">Opportunitées </label>
                <input type="text" class="form-control" name="OppPro" placeholder="Opportunitées">
                </div>
                <div class="form-group">
                <label for="DiffPro">Difficultés rencontrer</label>
                <input type="text" class="form-control" name="DiffPro" placeholder="Entrer niveau de difficulter de la prosection">
                </div>
              </div>
             </div>  

            <div class="row">  
              <!-- /.col -->
              <div class="col-md-12">
                <!-- /.form-group -->
                <div class="form-group">
                <label for="CommPro">Commentaires</label>
                <textarea type="text" class="form-control" name="CommPro" placeholder="Commentaires"></textarea>
                </div>
                <div class="form-group">
                <label for="SourcePro">Source de prospect </label>
                <input type="text" class="form-control" name="SourcePro" placeholder="Source de prospect">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label for="SatutPro">Status actuel</label>
                <select id="SatutPro" class="form-control select2" name="SatutPro" style="width: 100%;">
                  <option value="A MODIFIER" selected="selected">A Modifier</option>
                  <option value="terminer" >Terminer</option>
                  <option value="A RELANCER">A Relancer</option>
                  </select>
                </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="card-footer">
                    <div class="float-right">
                  <button type="submit" value="Submit" class="btn btn-Success btn-lg" >Valider la prospection</button>
                          </div>
                </div> 
          </div>
          <!-- /.card-body -->
        
        </div>   
                          </div>  
                        
    </form>
            </div>

      </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->




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
