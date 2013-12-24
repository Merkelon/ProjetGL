<!DOCTYPE HTML>
<html>
<head>

<title>Connexion test</title>
</head>
<body>
<p>Cette page necessite une authentification
  <?php echo anchor('login', 'Login'); ?> 
  <?php echo anchor('compte_controller/sinscrire', 'Register'); ?>
 </p>
</body>
</html>