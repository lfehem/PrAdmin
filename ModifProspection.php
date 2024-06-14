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
<script src="plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
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
            <h1 class="m-0">Modfier Prospection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Modfier Prospection</li>
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
                   <!-- select -->
                   <?php 
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Taking all 5 values from the form data(input)
            $ID_Pr =  $_POST['ID_PR'];
            
            $resultPrE=mysqli_query($con, "SELECT e.`ID_E`, e.`Nom_E`, e.`Type_E`, e.`Date_ceation_E`, e.`Statut_juridique_E`, e.`Tel_E`, e.`Email_E`, e.`Nom_Res_E`, e.`Nbr_empl_E`, e.`CA_E`, (SELECT Nom_D from domain_activte WHERE ID_DA=e.ID_DA ) as 'DA', (SELECT Nom_D from domain_activte WHERE ID_DA=e.ID_DAS ) as 'DAS' FROM `entreprise` e,`prospection` p WHERE p.ID_E=e.ID_E AND p.ID_Pr='$ID_Pr'")or die('Error In Session');
            $rowPrE=mysqli_fetch_array($resultPrE);
              }
          ?>
                
                <!--result of the selection-->
                <div class="card card-primary card-outline">
    <section class="content">
        <div class="container-fluid">
           
           <div class="card-body box-profile">                          
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                Nom entreprise :
                <h3><?php echo $rowPrE['Nom_E'] ?></h3>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                Type entreprise :
                <h4><?php echo $rowPrE['Type_E'] ?></h4>
                </div>
                <div class="form-group">
                Numéro de contact :
                <h5><?php echo $rowPrE['Tel_E'] ?></h5>
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                Email de contact :
                <h4><?php echo $rowPrE['Email_E'] ?></h4>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                Nombre d'employés :
                <h5><?php echo $rowPrE['Nbr_empl_E'] ?></h5>
                </div>
                <!-- /.form-group -->
                 <!-- /.form-group -->
                 <div class="form-group">
                Status juridique :
                <span class="badge bg-danger" ><?php echo $rowPrE['Statut_juridique_E'] ?></span>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                Date de création :
                <h5 ><?php
                $my_date =$rowPrE['Date_ceation_E'];
                $date = DATE("d/m/Y",strtotime($my_date));
                 echo $date ?></h5>
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
            $resultP=mysqli_query($con, "SELECT pr.`ID_P`, pr.`Nom_P`, pr.`Prenom_P`, pr.`Fonction_P`, pr.`Tel_P`, pr.`Email_P`, pr.`Motdpasse`, pr.`Num_auth`  FROM `prespecteur` pr,`prospection` p WHERE pr.ID_P=p.ID_P AND p.ID_Pr='$ID_Pr'")or die('Error In Session');
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
                <h3 class="card-title">Prospection</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
      <form action="ConfirmModifProspection.php" method="POST">
        <!-- Id prospecteur and Id entreprise to be added to the form -->
              <div class="card-body">  
              <?php echo '<input type="hidden" id="ID_P" name="ID_P" value="'.$rowP['ID_P'].'" >';  ?>
              <?php echo '<input type="hidden" id="ID_E" name="ID_E" value="'.$rowPrE['ID_E'].'" >';  ?>
                        <!-- SELECT2 EXAMPLE -->
                        <?php    

            $resultPI=mysqli_query($con, "SELECT pi.`ID_PI`, pi.`Nom_PI`, pi.`Prenom_PI`, pi.`Tel_PI`, pi.`Email_PI`, pi.`Fonction_PI`, pi.`ID_E` FROM `personne_interviewe` pi,`entreprise` e,`prospection` p WHERE  pi.`ID_E`=e.`ID_E` AND e.`ID_E`=p.`ID_E` And p.`ID_PI`=pi.`ID_PI` And p.`ID_Pr`=$ID_Pr")or die('Error In Session');
            $rowPI=mysqli_fetch_array($resultPI);
              ?>
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Information personelles</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </div>
          </div>
          <?php echo '<input type="hidden" id="ID_PI" name="ID_PI" value="'.$rowPI['ID_PI'].'" >';  ?>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="NomPI">Nom du prospect</label>
                <input type="text" class="form-control" name="NomPI" placeholder="Entrer Nom du prospect" value="<?php echo $rowPI['Nom_PI']?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label for="EmailPI">Email</label>
                <input type="email" class="form-control" name="EmailPI" placeholder="Entrer email du prospect" value="<?php echo $rowPI['Email_PI']?>">
                </div>
                <div class="form-group">
                <label for="FonctionPI">La fonction du prosspect dans l'oganisation</label>
                <input type="text" class="form-control" name="FonctionPI" placeholder="Entrer la fonction du prospect" value="<?php echo $rowPI['Fonction_PI']?>">
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                <label for="PrenomPI">Prénom</label>
                <input type="text" class="form-control" name="PrenomPI" placeholder="Entrer Prénom du prospect" value="<?php echo $rowPI['Prenom_PI']?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label for="TelPI">Téléphone</label>
                <input type="text" class="form-control" name="TelPI" placeholder="Entrer le Tel du prospecteur" value="<?php echo $rowPI['Tel_PI']?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

          
        </div>
                          </div>

                          <?php
                  $ID_P=$rowP['ID_P'] ;
                  $ID_E = $rowPrE['ID_E'];    

            $resultProspection=mysqli_query($con, "SELECT `ID_Pr`, `Date_Pr`, `Sujet_Pr`, `Difficulte_Pr`, `Opportunite_Pr`, `Commentaires_Pr`, `Source_Pr`, `Statut_act_Pr` FROM `prospection` WHERE `ID_P`=$ID_P and `ID_E`=$ID_E And `ID_Pr`=$ID_Pr")or die('Error In Session');
            $rowProspection=mysqli_fetch_array($resultProspection);
              ?>
      <div class="card-body ">   
      <div class="card card-info">
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
                <?php echo '<input type="hidden" id="ID_Pr" name="ID_Pr" value="'.$rowProspection['ID_Pr'].'" >';  ?>
               <!-- Date -->
               <?php
                $Pr_date =$rowProspection['Date_Pr'];
                $datePr = DATE("d/m/Y",strtotime($Pr_date)); ?>
               <div class="form-group">
                  <label>Date de premier contact:</label>
                    <div class="input-group date" id="DatePro" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#DatePro" name="DatePro" value="<?php echo $datePr ?>" disabled/>
                        <div class="input-group-append" data-target="#DatePro" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- //Date --> 
                <!-- /.form-group -->
                <div class="form-group">
                <label for="sujetPro">Sujet de la prospection</label>
                <input type="text" class="form-control" name="sujetPro" placeholder="Entrer le sujet de la prospection" value="<?php echo $rowProspection['Sujet_Pr']?>">
                </div>
                
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                <label for="OppPro">Opportunitées </label>
                <input type="text" class="form-control" name="OppPro" placeholder="Opportunitées" value="<?php echo $rowProspection['Opportunite_Pr']?>">
                </div>
                <div class="form-group">
                <label for="DiffPro">Difficultés rencontrer</label>
                <input type="text" class="form-control" name="DiffPro" placeholder="Entrer niveau de difficulter de la prosection" value="<?php echo $rowProspection['Difficulte_Pr']?>">
                </div>
              </div>
             </div>  

            <div class="row">  
              <!-- /.col -->
              <div class="col-md-12">
                <!-- /.form-group -->
                <div class="form-group">
                <label for="CommPro">Commentaires</label>
                <textarea type="text" class="form-control" name="CommPro" placeholder="Commentaires" ><?php echo $rowProspection['Commentaires_Pr']?></textarea>
                </div>
                <div class="form-group">
                <label for="SourcePro">Source de prospect </label>
                <input type="text" class="form-control" name="SourcePro" placeholder="Source de prospect" value="<?php echo $rowProspection['Source_Pr']?>">
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
              <input type="hidden" id="ajAction" name="ajAction" value=<?php echo null ?>>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        
        </div>   
                          </div>  
                  <div class="card-footer">
                    <div class="col-12">
                    <a href="http://localhost/PrAdmin/Prospection.php" class="btn btn-secondary">Annuler</a>
                    <input type="submit" value="Modifier" class="btn btn-success btn float-right">
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
