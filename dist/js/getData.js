$(document).ready(function(){  
	// code to get all records from table via select box
	$("#Entreprise").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'entid='+ id;    
		$.ajax({
			url: 'includes/getEntreprise.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(entrepriseData) {
			   if(entrepriseData) {
					$("#heading").hide();		  
					$("#no_records").hide();					
					$("#Nom_E").text(entrepriseData.Nom_E);
					$("#ID_E").val(entrepriseData.ID_E);
					$("#Type_E").text(entrepriseData.Type_E);
					$("#Date_ceation_E").text(entrepriseData.Date_ceation_E);
                	$("#Statut_juridique_E").text(entrepriseData.Statut_juridique_E);
                	$("#Tel_E").text(entrepriseData.Tel_E);
                	$("#Email_E").text(entrepriseData.Email_E);
                	$("#Nbr_empl_E").text(entrepriseData.Nbr_empl_E);                
					$("#records").show();		 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
 	}) 
});