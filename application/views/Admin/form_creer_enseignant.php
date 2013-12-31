<div id="content">
    <br />
    <h1>Ajouter <span>Enseignant</span></h1>
    <br />
    <div id="messages">
        <div id="reponse_ok">
            <p></p>
            <a class="close_msg" title="Fermer"></a>
        </div>
        <div id="reponse_error">
            <p></p>
            <a class="close_msg" title="Fermer"></a>
        </div>
    </div>
    <div class="clear"></div>
    <?php echo form_open('admin/ajouter_utilisateur/etudiant'); ?>   
    <table class="formulaire" style="width: 360px;">
        <tr>
            <th><label for="nom">Nom :</label></th>
            <td style="width: 180px;"><input type="text" name="nom" class="nom" value="<?php echo set_value('nom'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_nom" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="prenom">Prenom :</label></th>
            <td style="width: 180px;"><input type="text" name="prenom" class="prenom" value="<?php echo set_value('prenom'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_prenom" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="email">Email :</label></th>
            <td style="width: 180px;"><input type="text" class="email" name="email" value="<?php echo set_value('email'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_email" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="tel">Tel :</label></th>
            <td style="width: 180px;"><input type="text" class="tel" name="tel" value="<?php echo set_value('tel'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_tel" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>          
        <tr>
            <th><label for="nom">Password :</label></th>
            <td style="width: 180px;"><input type="password" name="password" class="password" value="<?php echo set_value('password'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_password" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="nom">Confirmer password :</label></th>
            <td style="width: 180px;"><input type="password" name="password_conf" class="password_conf" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_password_conf" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>                

        <tr>
            <th colspan="3" style="text-align: center">
                <br />
                <input type="reset" id="reset" value="Vider les champs" class="bouton icon_rest"/>
                <input type="button" value="Creer utilisateur" id="valider_creation" class="bouton icon_add" />
                <input type="hidden" name="ajax" class="use_ajax" value="ok" />
            </th>
        </tr>
    </table>
</form>
</div>

<script type="text/javascript" >
    $(document).ready(function() {
        resultat = 1;
        $("input.email").blur(function() {
            element = $(this);
            var email = element.val();
            var exp = new RegExp("^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$");

            if (email && exp.test(email)) {
                $.post(base_url + "admin_controller/verifier_email/enseignant", {email: email},
                function(data) {
                    var result = jQuery.parseJSON(data);
                    element.parent().children("span.msg_err").text("");
                    element.parent().children("span.msg_err").text(result['msg_res']);
                });
            }
            else
                element.parent().children("span.msg_err").text("Entrer une adresse email valide");
        });

        $("input#valider_creation").click(function() {
            var nom = $('input.nom').val();
            var prenom = $('input.prenom').val();
            var email = $('input.email').val();
            var tel = $('input.tel').val();
            var ajax = $('input.use_ajax').val();
            var password = $('input.password').val();
            var password_conf = $('input.password_conf').val();

            $.post(base_url + "admin_controller/creer_compte/enseignant", {
                nom: nom,
                prenom: prenom,
                tel: tel,
                ajax: ajax,
                email: email,
                password: password,
                password_conf: password_conf},
            function(data) {
                var result = jQuery.parseJSON(data);
                if (result["message"] == "0") {
                    $("#reponse_ok").fadeIn(300).find("p").text("Enseignant ajouté avec succés");
                    $("table.formulaire input[type='text'],table.formulaire input[type='password']").val("");
                    $("div#msg_nom").fadeOut(300);
                    $("div#msg_prenom").fadeOut(300);
                    $("div#msg_email ").fadeOut(300);
                    $("div#msg_tel ").fadeOut(300);
                    $("div#msg_password ").fadeOut(300);
                    $("div#msg_password_conf ").fadeOut(300);
                }

                else if (result["message"] == "-1") {
                    $("#reponse_error").fadeIn(300).find("p").text("Une erreur s'est produite");
                }
                else {
                    $("div#msg_nom").fadeIn(300).children("div.message").text("").text(result['nom']);
                    $("div#msg_prenom").fadeIn(300).children("div.message").text("").text(result['prenom']);
                    $("div#msg_email ").fadeIn(300).children("div.message").text("").text(result['email']);
                    $("div#msg_tel ").fadeIn(300).children("div.message").text("").text(result['tel']);
                    $("div#msg_password ").fadeIn(300).children("div.message").text("").text(result['password']);
                    $("div#msg_password_conf ").fadeIn(300).children("div.message").text("").text(result['password_conf']);
                }

            });
        });



    });
</script>
</body>
</html>