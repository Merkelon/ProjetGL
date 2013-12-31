<div id="content">
    <br />
    <h1>Modifier <span>entreprise</span></h1>
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
    <?php echo form_open('admin/ajouter_utilisateur/entreprise'); ?>   
    <table class="formulaire" style="width: 360px;">

        <tr>
            <th><label for="nom">Nom :</label></th>
            <td style="width: 180px;"><input type="text" name="nom" class="nom" value="<?php echo $utilisateur->nom; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_nom" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="domaine">Domaine :</label></th>
            <td style="width: 180px;">
                <select name="domaine" class="domaine" style="width: 212px;">
                    <?php
                    foreach ($domaines as $domaine) {
                        
                        if ($domaine->id === $utilisateur->id_domaine)
                            $selected = "selected";
                        else
                            $selected = "";
                        ?>
                    
                    <option value="<?php echo $domaine->id ?>" <?php echo $selected ?> > <?php echo $domaine->intitule ?></option>
                    <?php }?>
                </select>
                    
                </td>
                <td style="float:left; padding-left: 0;">
                    <div id="msg_domaine" class="message_err">
                        <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                        <div class="message"></div>
                    </div>
                </td>
            </tr>               
            <tr>
                <th><label for="email">Email :</label></th>
                <td style="width: 180px;"><input type="text" class="email" name="email" value="<?php echo $utilisateur->email; ?>" /></td>
                <td style="float:left; padding-left: 0;">
                    <div id="msg_email" class="message_err">
                        <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                        <div class="message"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="tel">Tel :</label></th>
                <td style="width: 180px;"><input type="text" name="tel" class="tel" value="<?php echo $utilisateur->tel; ?>" /></td>
                <td style="float:left; padding-left: 0;">
                    <div id="msg_tel" class="message_err">
                        <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                        <div class="message"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="fax">Fax :</label></th>
                <td style="width: 180px;"><input type="text" name="fax" class="fax" value="<?php echo $utilisateur->fax; ?>" /></td>
                <td style="float:left; padding-left: 0;">
                    <div id="msg_fax" class="message_err">
                        <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                        <div class="message"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="ville">Ville :</label></th>
                <td style="width: 180px;"><input type="text" name="ville" class="ville" value="<?php echo $utilisateur->ville; ?>" /></td>
                <td style="float:left; padding-left: 0;">
                    <div id="msg_ville" class="message_err">
                        <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                        <div class="message"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="adresse">Adresse :</label></th>
                <td style="width: 180px;"><input type="text" name="adresse" class="adresse" value="<?php echo $utilisateur->adresse; ?>" /></td>
                <td style="float:left; padding-left: 0;">
                    <div id="msg_adresse" class="message_err">
                        <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                        <div class="message"></div>
                    </div>
                </td>
            </tr>


            <tr>
                <th colspan="3" style="text-align: center">
                    <br />
                    <input type="reset" id="reset" value="Vider les champs" class="bouton icon_rest"/>
                    <input type="button" value="Modifier utilisateur" id="valider_modification" class="bouton icon_add" />
                    <input type="hidden" name="ajax" class="use_ajax" value="ok" />
                    <input type="hidden" name="id" class="id_utilisateur" value="<?php echo $utilisateur->id; ?>" />
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
                $.post(base_url + "admin_controller/verifier_email/entreprise", {email: email},
                function(data) {
                    var result = jQuery.parseJSON(data);
                    element.parent().children("span.msg_err").text("");
                    element.parent().children("span.msg_err").text(result['msg_res']);
                });
            }
            else
                element.parent().children("span.msg_err").text("Entrer une adresse email valide");
        });

        $("input#valider_modification").click(function() {
            var id = $('input.id_utilisateur').val();
            var nom = $('input.nom').val();
            var domaine = $('select.domaine').val();
            var email = $('input.email').val();
            var tel = $('input.tel').val();
            var fax = $('input.fax').val();
            var ville = $('input.ville').val();
            var adresse = $('input.adresse').val();
            var ajax = $('input.use_ajax').val();

            $.post(base_url + "admin_controller/modifier_utilisateur/entreprise", {
                id: id,
                nom: nom,
                domaine: domaine,
                tel: tel,
                ajax: ajax,
                fax: fax,
                ville: ville,
                email: email,
                adresse: adresse},
            function(data) {
                var result = jQuery.parseJSON(data);
                if (result["message"] == "0") {
                    $("#reponse_ok").fadeIn(300).find("p").text("Entreprise modifiée avec succés");
                    $("div#msg_nom").fadeOut(300);
                    $("div#msg_email").fadeOut(300);
                    $("div#msg_tel").fadeOut(300);
                    $("div#msg_fax").fadeOut(300);
                    $("div#msg_ville").fadeOut(300);
                    $("div#msg_adresse").fadeOut(300);
                }

                else if (result["message"] == "-1") {
                   $("#reponse_error").fadeIn(300).find("p").text(result["error"]);
                }
                else {
                    $("div#msg_nom").fadeIn(300).children("div.message").text("").text(result['nom']);
                    $("div#msg_tel").fadeIn(300).children("div.message").text("").text(result['tel']);
                    $("div#msg_ville").fadeIn(300).children("div.message").text("").text(result['ville']);
                    $("div#msg_adresse").fadeIn(300).children("div.message").text("").text(result['adresse']);
                    $("div#msg_email").fadeIn(300).children("div.message").text("").text(result['email']);
                    $("div#msg_fax").fadeIn(300).children("div.message").text("").text(result['fax']);
                }

            });
        });



    });
</script>
