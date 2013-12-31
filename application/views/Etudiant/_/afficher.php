<html> 
<head> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery-1.8.0.js" > </script>
<script type="text/javascript"> 
var base_url = "<?php echo base_url();?>";
</script>
</head>
<body> 
<h2>Liste des etudiants </h2><a href="<?php echo base_url(); ?>Etudiant_controller/ajouter">Ajouter un autre </a>
<ul>
<?php if(isset($succes) && $succes){
	if($succes == 1){
		echo "Etudiant ajouté avec succés";
	}
	else
		echo $succes;
}
?>
<?php foreach ($etudiants as $etudiant){ ?>
   <li>
   <?php echo $etudiant->nom." ".$etudiant->prenom." ".$etudiant->cin." ".$etudiant->cne." "; ?> 
   <a href="<?php echo base_url(); ?>Etudiant_controller/afficher/<?php echo $etudiant->id;  ?>">Modifier </a> 
   <a class="supprimer" id="<?php echo $etudiant->id; ?>" href="#">Supprimer </a> 
   </li>
<?php } ?>
</ul>
<script type="text/javascript" > 
$(document).ready(function(){   
	$("a.supprimer").click(function(){
		$(this).parent().fadeOut(300); 
		var id_etudiant = $(this).attr('id');
		$.post(base_url+"Etudiant_controller/supprimer",{id_etudiant : id_etudiant },
		function(data){
			var result=jQuery.parseJSON(data);
			// alert(result);  
		});  
	});
	
});
</script>
</body>

</html>