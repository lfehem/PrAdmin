<?php 
include('includes/dbcon.php');
include('includes/session.php'); 
$result=mysqli_query($con, "select * from prespecteur where ID_P='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
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
  <title>Consulter Prospection</title>

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
            <h1 class="m-0">Modification Prospection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Modification Prospection</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- up date prospections tables -->
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // intervewee table 
    $ID_P = $_POST['ID_P'];
    $ID_E = $_POST['ID_E'];
    $ID_PI=$_POST['ID_PI'];
    $ID_Pr=$_POST['ID_Pr'];
    
    $NomPI =  $_POST['NomPI'];
    $PrenomPI = $_POST['PrenomPI'];
    $EmailPI =  $_POST['EmailPI'];
    $FonctionPI = $_POST['FonctionPI'];
    $TelPI = $_POST['TelPI'];

    $sql = "UPDATE `personne_interviewe` SET `Nom_PI`='$NomPI',`Prenom_PI`='$PrenomPI',`Tel_PI`=$TelPI,`Email_PI`='$EmailPI',`Fonction_PI`='$FonctionPI',`ID_E`=$ID_E WHERE `ID_PI`=$ID_PI";
    $query 		= mysqli_query($con,$sql);

    //prospection table 
    
    $sujetPro = $_POST['sujetPro'];
    $DiffPro =  $_POST['DiffPro'];
    $OppPro = $_POST['OppPro'];
    $CommPro = $_POST['CommPro'];
    $SourcePro= $_POST['SourcePro'];
    $SatutPro = $_POST['SatutPro'];
  
   
    $sql2 = "UPDATE `prospection` SET `Sujet_Pr`='$sujetPro',`Difficulte_Pr`='$DiffPro',`Opportunite_Pr`='$OppPro',`Commentaires_Pr`='$CommPro',`Source_Pr`='$SourcePro',`Statut_act_Pr`='$SatutPro',`ID_P`=$ID_P,`ID_E`=$ID_E WHERE `ID_Pr`=$ID_Pr";
    $query2 		= mysqli_query($con,$sql2);
    if ($query2 && $query ) {
      $sqlmodif = "INSERT INTO historique (`ID_H`,`ID_Pr`, `Date_Pr`, `Sujet_Pr`, `Difficulte_Pr`, `Opportunite_Pr`, `Commentaires_Pr`, `Source_Pr`, `Statut_act_Pr`, `ID_P`, `ID_E`, `ID_PI`)  VALUES (null,$ID_Pr,Now(),'$sujetPro','$DiffPro','$OppPro','$CommPro','$SourcePro','$SatutPro',$ID_P,$ID_E,$ID_PI)";
    $querymoif 	= mysqli_query($con,$sqlmodif);
    ?><div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    Success : Modification réusite
    </div>
    <?php
    } else {?>
    <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Erruer d'entregistrement de la modification
       <?php        

    echo "Error: " . $sql2 . "<br>" . $con->error;
    ?>
    </div>
    <?php
    }
    }
    ?>  

<!-- up date prospections tables -->

       <!-- Main content -->
                <?php 
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Taking all 5 values from the form data(input)
            
            
          $resultPr=mysqli_query($con, "select * from `prospection` WHERE `ID_Pr`='$ID_Pr'")or die('Error In Session');
          $rowPr=mysqli_fetch_array($resultPr);
              }
          ?>

<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Details de la Prospection</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-lightblue">Date premier contact</span>
                <span class="info-box-number text-center text-muted mb-0"><?php echo $rowPr['Date_Pr'] ?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-lightblue">Sujet du prospection</span>
                <span class="info-box-number text-center text-muted mb-0"><?php echo $rowPr['Sujet_Pr'] ?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-lightblue">Source du prospect</span>
                <span class="info-box-number text-center text-muted mb-0"><?php echo $rowPr['Source_Pr'] ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
              <div class="post">
                <div class="user-block">
                    <h3>Dificultées rencontrer</h3>
                </div>
                <!-- /.user-block -->
                <p>
                <?php echo $rowPr['Difficulte_Pr'] ?>
                </p>
              </div>

              <div class="post clearfix">
                <div class="user-block">
                    <h3>Oportinutées</h3>
                </div>
                <!-- /.user-block -->
                <p>
                <?php echo $rowPr['Opportunite_Pr'] ?>
                </p>
              </div>

              <div class="post">
                <div class="user-block">
                    <h3>Commentaires</h3>
                </div>
                <!-- /.user-block -->
                <p>
                <?php echo $rowPr['Commentaires_Pr'] ?>
                </p>
              </div>

              <div class="post">
                <div class="user-block">
                    <h3>Status actuelles</h3>
                </div>
                    <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo $rowPr['Statut_act_Pr'] ?></span>
                    <!--<span class="info-box-number">410</span> -->
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>

              <div class="post">
                <div class="user-block">
                    <h3>Actions</h3>
                </div>
                <!-- /.user-block -->
                       <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List des actions</h3>

                <div class="card-tools">
                <form acttion="#" method="POST">
                  <div class="input-group " style="width: 300px;">
                    <input type="text" class="form-control float-right" name="ajouterAction" placeholder="Ajouter une action :">
                    <input type="hidden" id="ID_PR" name="ID_PR" value=<?php echo $ID_Pr?>>
                    <div class="input-group-append">
                      <button type="submit" value="ajAction" class="btn btn-default">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </form> 
                <!---^^^^^^^^^^^^^^^^-->
                <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  
                  
                  if(!isset($_POST['ajAction'])){
                  $actiontext=$_POST['ajouterAction'];
                  
                  if(!empty($actiontext)){ 

                  $sqlAction = "INSERT INTO `actions`(`ID_A`, `Action_A`, `ID_Pr`) VALUES (null,'$actiontext',$ID_Pr)";
                  $queryAction = mysqli_query($con,$sqlAction);
                  
                if ($queryAction) {
  ?><div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i> Alert!</h5>
  Success : Nouvelles Action Ajouter
</div>
<?php
} else {?>
  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Erruer d'entregistrement de l'Action
       <?php        

  echo "Error: " . $sqlAction . "<br>" . $con->error;
  ?>
  </div>
  <?php
}
    }
  }
  }
    ?>  
    
               
                <!---^^^^^^^^^^^^^^^^-->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 200px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php   
              // entrpeises liste 
              $resultA=mysqli_query($con, "SELECT * FROM `actions` WHERE `ID_Pr`='$ID_Pr'")or die('Error In Session');
              if(!empty($resultA)){
              while( $rowA = mysqli_fetch_array( $resultA, MYSQLI_NUM ) ) {?>
                  <tr>
                <td><?php echo "$rowA[0]";?></td>
                    <td><?php echo "$rowA[1]";?></td>
                  </tr>
                  <?php   }}
                  if (mysqli_num_rows($resultA)==0){?>
                    <tr>
                    <td></td>
                      <td>
                    <div class="card ">
        <div class="card-footer">
        <?php echo "Aucune resultat :Pas d'action prise pour le moment";?>
        </div>
                  </div>
                  </td> </tr>
                    <?php   }?> 
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
              </div>
          </div>
        </div>
      </div>
      <?php 
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
             
           
          $resultPrE=mysqli_query($con, "SELECT e.`ID_E`, e.`Nom_E`, e.`Type_E`, e.`Date_ceation_E`, e.`Statut_juridique_E`, e.`Tel_E`, e.`Email_E`, e.`Nom_Res_E`, e.`Nbr_empl_E`, e.`CA_E`, (SELECT Nom_D from domain_activte WHERE ID_DA=e.ID_DA ) as 'DA', (SELECT Nom_D from domain_activte WHERE ID_DA=e.ID_DAS ) as 'DAS' FROM `entreprise` e,`prospection` p WHERE p.ID_E=e.ID_E AND p.ID_Pr='$ID_Pr'")or die('Error In Session');
          $rowPrE=mysqli_fetch_array($resultPrE);
              }
          ?>
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> <?php echo $rowPrE['Nom_E'] ?></h3>
        <p class="text-muted">ID: <?php echo $rowPrE['ID_E'] ?></p>
        <div class="text-muted">
        <ul class="list-unstyled">
          <li class="text-sm">Type d'entreprise
            <b class="d-block"><?php echo $rowPrE['Type_E'] ?></b>
            </li>
          <li class="text-sm">Date de création 
            <b class="d-block"><?php echo $rowPrE['Date_ceation_E'] ?></b>
          </li>
          <li class="text-sm">Status juridique
            <b class="d-block"><?php echo $rowPrE['Statut_juridique_E'] ?></b>
          </li>
          <li class="text-sm">Numéro Téléphone 
            <b class="d-block"><?php echo $rowPrE['Tel_E'] ?></b>
          </li>
          <li class="text-sm">Email 
            <b class="d-block"><?php echo $rowPrE['Email_E'] ?></b>
          </li>
          <li class="text-sm">Nom responsable
            <b class="d-block"><?php echo $rowPrE['Nom_Res_E'] ?></b>
          </li>
          <li class="text-sm">Nombre d'employés 
            <b class="d-block"><?php echo $rowPrE['Nbr_empl_E'] ?></b>
          </li>
          <li class="text-sm">Chiffre d'affaire
            <b class="d-block"><?php echo $rowPrE['CA_E'] ?></b>
          </li>
          <li class="text-sm">Domaine d'activité 
            <b class="d-block"><?php echo $rowPrE['DA'] ?></b>
          </li>
          <li class="text-sm">Domaine d'activité secondaire
            <b class="d-block"><?php echo $rowPrE['DAS'] ?></b>
          </li>
            </ul>
        </div>

        <?php 
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Taking all 5 values from the form data(input)
          $resultPrPos=mysqli_query($con, "SELECT  pri.`ID_PI`, pri.`Nom_PI`, pri.`Prenom_PI`, pri.`Tel_PI`, pri.`Email_PI`, pri.`Fonction_PI` FROM `personne_interviewe` pri,`entreprise` e,`prospection` p WHERE p.ID_E=e.ID_E AND e.ID_E=pri.ID_E AND pri.`ID_PI`=$ID_PI AND p.ID_Pr='$ID_Pr'")or die('Error In Session');
          $rowPrPros=mysqli_fetch_array($resultPrPos);
              }
          ?>

        <h5 class="mt-5 text-muted">Informations du prospect</h5>
        <ul class="list-unstyled">
        <li class="text-sm">Nom & Prénom
            <b class="d-block"><?php echo $rowPrPros['Nom_PI'].' '. $rowPrPros['Prenom_PI'] ?></b>
          </li>
          <li class="text-sm">Numéro de Téléphone
            <b class="d-block"><?php echo $rowPrPros['Tel_PI'] ?></b>
          </li>
          <li class="text-sm">Email
            <b class="d-block"><?php echo $rowPrPros['Email_PI'] ?></b>
          </li>
          <li class="text-sm">Fonction du prospect
            <b class="d-block"><?php echo $rowPrPros['Fonction_PI'] ?></b>
          </li>
        </ul>
        <ul >
        <form action="ModifProspection.php" method="POST">
                  <input type="hidden" id="ID_PR" name="ID_PR" value=<?php echo "$ID_Pr"?>>
                  <button type="submit" class="btn btn-primary btn-lg float-right"><i class="fas fa-pencil-alt"></i> Confirmer
                  </button>
                </form>
          </ul>  
      </div>        
      </div>
      
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

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
</div>
<!-- ./wrapper -->
</body>
</html>

