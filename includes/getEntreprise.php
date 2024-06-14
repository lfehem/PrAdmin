<?php
include('dbcon.php');
include('session.php');
if($_REQUEST['entid']) {
    
	$sql = "SELECT ID_E,Nom_E,Type_E,Date_ceation_E,Statut_juridique_E, Tel_E,Email_E,Nom_Res_E,Nbr_empl_E From entreprise
WHERE ID_E='".$_REQUEST['entid']."'";
	$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));	
	$entrepriseData = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$entrepriseData = $rows;
	}
	echo json_encode($entrepriseData);
} else {
	echo 0;	
}
?>