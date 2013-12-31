<html>
<head>
<title>Formulaire d'ajout d'etudaint</title>
</head>
<body>
<?php if(isset($succes) && $succes){
	if($succes == 1){
		echo "Etudiant ajouté avec succés";
	}
	else
		echo $succes;
}
?>
<?php echo validation_errors(); ?>

<?php echo form_open('Etudiant_controller/ajouter'); ?>

<h5>Nom</h5>
<input type="text" name="nom" value="<?php echo set_value('nom'); ?>" size="50" />

<h5>Prenom</h5>
<input type="text" name="prenom" value="<?php echo set_value('prenom'); ?>" size="50" />

<h5>CIN</h5>
<input type="text" name="cin" value="<?php echo set_value('cin'); ?>" size="50" />

<h5>CNE</h5>
<input type="text" name="cne" value="<?php echo set_value('cne'); ?>" size="50" />

<div><input type="submit" value="Ajouter" /></div>

</form>

</body>
</html>