<html>
<head>
<title>Formulaire de modification d'etudaint</title>
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

<?php echo form_open('Etudiant_controller/modifier'); ?>

<h5>Nom</h5>
<input type="text" name="nom" value="<?php echo $etudiant->nom; ?>" size="50" />

<h5>Prenom</h5>
<input type="text" name="prenom" value="<?php echo $etudiant->prenom; ?>" size="50" />

<h5>CIN</h5>
<input type="text" name="cin" value="<?php echo $etudiant->cin; ?>" size="50" />

<h5>CNE</h5>
<input type="text" name="cne" value="<?php echo $etudiant->cne; ?>" size="50" />

<input type="hidden" name="id" value="<?php echo $etudiant->id; ?>" size="50" />

<div><input type="submit" value="Modifier" /></div>

</form>

</body>
</html>