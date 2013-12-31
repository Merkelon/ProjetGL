<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ProjetGL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery/jquery-1.8.3.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery/jquery.pngFix.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/cufon-yui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/comfortaa.cufonfonts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/script.js"></script>
        <script type="text/javascript">
            function changeDiv(div) {
                if (div == 'loginbox')
                {
                    $('#loginbox').slideDown(350);
                    $('#forgotbox').fadeOut(0);
                }
                else if (div == 'forgotbox')
                {
                    $('#loginbox').fadeOut(0);
                    $('#forgotbox').slideDown(350);
                }
            }
        </script>
    </head>
    <body id="login-bg">
        <div id="login-holder">
            <div id="logo-login">
                <h1 style="text-align:center; line-height: 80px; font-size:45px; color:#003764;">Name<span style="color:#ABCC60;">App</span></h1>
            </div>
            <div></div>
            <div class="clear"></div>
            <div id="loginbox">
                <div id="login-inner">
                    <?php echo form_open('login'); ?>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2">
                                <div id="messages" style="width: 700px;">
                                    <?php echo validation_errors(); ?> 
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Username : </th>
                            <td><input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="login-inp"/></td>
                        </tr>
                        <tr>
                            <th>Mot de passe : </th>
                            <td><input type="password" name="password" id="password" class="login-inp" /></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td valign="top"><input type="checkbox" class="checkbox-size" name="login-check" id="login-check" /><label for="login-check">Se souvenir de moi ?</label></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input class="submit-login" type="submit" /></td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="clear"></div>
                <a href="#" class="forgot-pwd" onClick="changeDiv('forgotbox')">Mot de passe perdu ?</a>
            </div>
            <div id="forgotbox" >
                <div id="forgotbox-text" style="margin: 40px auto 10px auto">Envoyez un message pour réinitialiser votre mot de passe.</div>
                <div id="login-inner" style="margin-top:10px">
                    <form action="se-connecter" method="post">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="2">
                                    <div id="messages" style="width: 700px;">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Email :</th>
                                <td><input type="text" name="email2" id="email2" class="login-inp"/></td>
                            </tr>
                            <tr>
                                <th> </th>
                                <td><input type="submit" class="envoyer-login" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="clear"></div>
                <a href="#" class="back-login" onClick="changeDiv('loginbox')">Revenir à la connexion</a>
            </div>
        </div>
    </body>
</html>