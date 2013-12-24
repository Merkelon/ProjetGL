<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
</head>
<body>
    <h3><?php echo validation_errors(); ?></h3> 
<?php echo form_open('login'); ?>
<h5>Username :</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" />
<h5>Password :</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" />
<div>
<input type="submit" name="submit" value="Se connecter" />
</div>
</body>
</html>