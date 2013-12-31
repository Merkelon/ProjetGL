<!DOCTYPE html>
<html>
    <head>
        <title>Intro - ProjetGL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login_page.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery/jquery-1.10.2.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery/jquery-ui.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/cufon-yui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/comfortaa.cufonfonts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/Segoe_UI_Light_300.font.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/Segoe_UI_Bold_1_400.font.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/cufon/myriad-pro.cufonfonts.js"></script>
        <script type="text/javascript" >var base_url = "<?php echo base_url(); ?>";</script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/script.js"></script>
    </head>
    <body>
        <div id="page">
            <div id="main">
                <div id="block_left">
                    <h1>Plateforme des stages</h1>
                    <h2>ENSA de Kénitra</h2>
                    <p>Metuentes igitur idem latrones Lycaoniam magna parte campestrem cum seraedium, sdfz sda milite per omnia diffuso propinqua, magnis undique praesidiis conmunitam.</p>
                    <p>Metuentes igitur idem latrones Lycaoniam magna parte campestrem cum seraedium, sdfz sda milite per omnia diffuso propinqua, magnis undique praesidiis conmunitam.</p>
                </div>
                <div id="blocks">
                    <div class="block admin">
                        <div class="title">
                            Espace Administrateur
                        </div>
                        <div class="content">
                            <div class="login-button"></div>
                            <div class="box login">
                                <table>
                                    <tr id="tr_1">
                                        <td><label for="admin_username" class="username" >Nom d'utilisateur :</label></td>
                                        <td><input type="text" id="admin_username" class="username" /></td>
                                    </tr>
                                    <tr id="tr_2">
                                        <td><label for="admin_password" class="password" >Mot de passe :</label></td>
                                        <td><input type="password" id="admin_password" class="password" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="forget-link">Mot de passe oublié ?</span>
                                            <button id="cnx">Se connecter</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                            <div class="box forget">
                                <table>
                                    <tr>
                                        <td><label for="admin_forget_email">Votre email :</label></td>
                                        <td><input type="text" id="admin_forget_email" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button id="forget_admin">Récupérer</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="block encadrant">
                        <div class="title">
                            Espace Encadrant
                        </div>
                        <div class="content">
                            <div class="login-button"></div>
                            <div class="box login">
                                <table>
                                    <tr>
                                        <td><label for="encadrant_username" class="username">Nom d'utilisateur :</label></td>
                                        <td><input type="text" id="encadrant_username" class="username" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="encadrant_password"  class="password" >Mot de passe :</label></td>
                                        <td><input type="password" id="encadrant_password" class="password" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="forget-link">Mot de passe oublié ?</span>
                                            <button id="cnx">Se connecter</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                            <div class="box forget">
                                <table>
                                    <tr>
                                        <td><label for="encadrant_forget_email">Votre email :</label></td>
                                        <td><input type="text" id="encadrant_forget_email" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button id="forget_encadrant">Récupérer</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="block etudiant">
                        <div class="title">
                            Espace Etudiant
                        </div>
                        <div class="content">
                            <div class="login-button"></div>
                            <div class="box login">
                                <table>
                                    <tr>
                                        <td><label for="etudiant_apogee" class="username">N° APOGEE :</label></td>
                                        <td><input type="text" id="etudiant_apogee" class="username"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="etudiant_password" class="password">Mot de passe :</label></td>
                                        <td><input type="password" id="etudiant_password" class="password"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="forget-link">Mot de passe oublié ?</span>
                                            <button id="cnx">Se connecter</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                            <div class="box forget">
                                <table>
                                    <tr>
                                        <td><label for="etudiant_forget_email">Votre email :</label></td>
                                        <td><input type="text" id="etudiant_forget_email" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button id="forget_etudiant">Récupérer</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="block entreprise">
                        <div class="title">
                            Espace Entreprise
                        </div>
                        <div class="content">
                            <div class="login-button"></div>
                            <div class="box login">
                                <table>
                                    <tr>
                                        <td><label for="entreprise_username" class="username">Nom d'utilisateur :</label></td>
                                        <td><input type="text" id="entreprise_username" class="username"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="entreprise_password" class="password">Mot de passe :</label></td>
                                        <td><input type="password" id="entreprise_password" class="password"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="forget-link">Mot de passe oublié ?</span>
                                            <button id="cnx">Se connecter</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                            <div class="box forget">
                                <table>
                                    <tr>
                                        <td><label for="entreprise_forget_email">Votre email :</label></td>
                                        <td><input type="text" id="entreprise_forget_email" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button id="forget_entreprise">Récupérer</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="close" title="Fermer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                NameApp <span>&copy;</span> Ecole Nationale des Sciences Appliquées de Kénitra 2013 - 2014
            </footer>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("button#cnx").click(function() {
                    var ele = $(this).closest("table");
                    var username = ele.find("input.username").val();
                    var password = ele.find("input.password").val();

                    $.post(base_url + "login", {
                        username: username,
                        password: password
                    },
                    function(data) {
                        var result = jQuery.parseJSON(data);
                        if (result["msg"] === "1") {
                            if (result['type_utilisateur'] === 'admin')
                                window.location.href = base_url + "admin";
                            else if (result['type_utilisateur'] === 'etudiant')
                                window.location.href = base_url + "etudiant";
                            else if (result['type_utilisateur'] === 'entreprise')
                                alert("redirect to entreprise");
                            else if (result['type_utilisateur'] === 'encadrant')
                                alert("redirect to encadrant");
                        } else if (result["msg"] === "-1") {
                            //données non valides
                            $("table").effect("shake");
                            ele.find("label.username").addClass("err");
                            ele.find("label.password").addClass("err");
                            ele.find("input.username").addClass("err");
                            ele.find("input.password").addClass("err");
                        } else if (result["msg"] === "-2") {
                            //form non valide
                            $("table").effect("shake");
                            if (result['username']) {
                                ele.find("label.username").addClass("err");
                                ele.find("input.username").addClass("err");
                            }
                            else {
                                ele.find("label.username").removeClass("err");
                                ele.find("input.username").removeClass("err");
                            }
                            if (result['password']) {
                                ele.find("label.password").addClass("err");
                                ele.find("input.password").addClass("err");
                            }
                            else {
                                ele.find("label.password").removeClass("err");
                                ele.find("input.password").removeClass("err");
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>

