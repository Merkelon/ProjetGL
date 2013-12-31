<div id="content">
    <br />
    <h1>Modifier <span>Etudiant</span></h1>
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
    <?php echo form_open('admin/modifier_utilisateur/etudiant'); ?>   
    <table class="formulaire" style="width: 360px;">
        <tr>
            <th><label for="apogee">Apogee :</label></th>
            <td style="width: 180px;"><input type="text" name="apogee" class="apogee" value="<?php echo $utilisateur->apogee; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_apogee" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
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
            <th><label for="nom">Prenom :</label></th>
            <td style="width: 180px;"><input type="text" name="prenom" class="prenom" value="<?php echo $utilisateur->prenom; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_prenom" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="nom">Cin :</label></th>
            <td style="width: 180px;"><input type="text" name="cin" class="cin" value="<?php echo $utilisateur->cin; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_cin" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="nom">Cne :</label></th>
            <td style="width: 180px;"><input type="text" name="cne" class="cne" value="<?php echo $utilisateur->cne; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_cne" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="nom">Email :</label></th>
            <td style="width: 180px;"><input type="text" class="email" name="email" value="<?php echo $utilisateur->email; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_email" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="3" style="padding-top:0;font-size:8px;text-align:center;" >
                <img src="<?php echo base_url(); ?>assets/img/l.jpg" style="width:330px;height:2px;" />
            </th>
        </tr>
        <tr>
            <th><label for="ann_insc" title ="Année universitaire d'inscription" >Année d'inscription:</label></th>
            <td style="width: 180px;"><input type="text" onkeypress="testNumber(event);" class="ann_insc" id="ann_insc" name="ann_insc" value="<?php echo $utilisateur->annee_univ_inscription; ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_ann_insc" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="niv_insc" title="Niveau universitaire d'inscription" >Niveau d'inscription :</label></th>
            <td style="width: 180px;">
                <select class="niv_insc" id="niv_insc" name="niv_insc" onchange="remplire_niv_act(this.value);" style="width: 212px;">                   
                    <?php
                    $nivx = array();
                    $nivx['1cp'] = "1ére année CP ";
                    $nivx['2cp'] = "2éme année CP ";
                    $nivx['1ci'] = "1ére année CI ";
                    $nivx['2ci'] = "2éme année CI ";
                    $nivx['3ci'] = "3éme année CI ";
                    $selected = "";
                    $start_remplir_niv_actuel = 0;
                    foreach ($nivx as $niv => $desc) {
                        if ($niv === $utilisateur->niveau_univ_inscription) {
                            $selected = "selected";
                        }
                        else
                            $selected = "";
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $niv ?>" ><?php echo $desc ?></option>                    
                        <?php
                    }
                    ?>

                </select>
            </td>  
            <td style="float:left; padding-left: 0;">
                <div id="msg_niv_insc" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="niv_act" title="Niveau universitaire actuel" >Niveau actuel :</label></th>
            <td style="width: 180px;">
                <?php // à changer selon le niveau d'inscription  ?>
                <?php // peut pas etre inf au niveau d'insc ?>
                <select class="niv_act" id="niv_act"  name="niv_act" style="width: 212px;">
                    <?php
                    foreach ($nivx as $niv => $desc) {
                        if ($niv === $utilisateur->niveau_univ_inscription) {
                            $start_remplir_niv_actuel = 1;
                        }
                        if ($niv === $utilisateur->niveau_univ_actuel)
                            $selected = "selected";
                        else
                            $selected = "";

                        if ($start_remplir_niv_actuel === 1) {
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $niv ?>" ><?php echo $desc ?></option>                    
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_niv_act" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="option"  >Option :</label></th>
            <td style="width: 180px;">
                <select class="option" id="option" name="option" style="width: 212px;">
                    <?php
                    foreach ($options as $option) {
                        if ($option->id === $utilisateur->id_option)
                            $selected = "selected";
                        else
                            $selected = "";
                        ?>

                        <option value="<?php echo $option->id; ?>" <?php echo $selected; ?> ><?php echo $option->intitule; ?> </option>

                    <?php } ?>

                </select>
            </td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_option" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="ingenieur" title="Est t il ingenieur ce fils de pute ???" >Ingenieur :</label></th>
            <td style="width: 180px;">
                <?php
                $checked = "";
                if ($utilisateur->ingenieur == 1)
                    $checked = "checked";
                else
                    $checked = "";
                ?>
                <input type="checkbox" <?php echo $checked; ?> id="ingenieur" name="ingenieur" class="ingenieur"  />

            </td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_ingenieur" class="message_err">
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
                            $.post(base_url + "admin_controller/verifier_email/etudiant", {email: email},
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
                        var prenom = $('input.prenom').val();
                        var email = $('input.email').val();
                        var cin = $('input.cin').val();
                        var cne = $('input.cne').val();
                        var apogee = $('input.apogee').val();
                        var ann_insc = $('input.ann_insc').val();
                        var niv_insc = $('select.niv_insc').val();
                        var niv_act = $('select.niv_act').val();
                        var option = $('select.option').val();
                        var ingenieur = $('input.ingenieur').is(":checked");
                        if (ingenieur == true)
                            ingenieur = 1;
                        else
                            ingenieur = 0;
                        var ajax = $('input.use_ajax').val();


                        $.post(base_url + "admin_controller/modifier_utilisateur/etudiant", {
                            id: id,
                            nom: nom,
                            prenom: prenom,
                            ajax: ajax,
                            cin: cin,
                            cne: cne,
                            email: email,
                            ann_insc: ann_insc,
                            niv_insc: niv_insc,
                            niv_act: niv_act,
                            option: option,
                            ingenieur: ingenieur,
                            apogee: apogee},
                        function(data) {
                            var result = jQuery.parseJSON(data);
                            if (result["message"] == "0") {
                                $("#reponse_ok").fadeIn(300).find("p").text("L'étudiant a été modifié avec succés.");
                                $("div#msg_nom").fadeOut(300);
                                $("div#msg_prenom").fadeOut(300);
                                $("div#msg_cin ").fadeOut(300);
                                $("div#msg_cne ").fadeOut(300);
                                $("div#msg_email ").fadeOut(300);
                                $("div#msg_apogee ").fadeOut(300);
                                $("div#msg_ann_insc ").fadeOut(300);
                            }

                            else if (result["message"] == "-1") {
                                $("div#reponse_error").fadeIn(300).find("p").text(result["error"]);
                            }
                            else {
                                $("div#msg_nom").fadeIn(300).children("div.message").text("").text(result['nom']);
                                $("div#msg_prenom").fadeIn(300).children("div.message").text("").text(result['prenom']);
                                $("div#msg_cin ").fadeIn(300).children("div.message").text("").text(result['cin']);
                                $("div#msg_cne ").fadeIn(300).children("div.message").text("").text(result['cne']);
                                $("div#msg_email ").fadeIn(300).children("div.message").text("").text(result['email']);
                                $("div#msg_ann_insc ").fadeIn(300).children("div.message").text("").text(result['ann_insc']);
                                $("div#msg_apogee ").fadeIn(300).children("div.message").text("").text(result['apogee']);
                            }

                        });
                    });

                    $("input.nom,input.prenom").blur(function() {
                        element = $(this);
                        var text = element.val();
                        var exp = new RegExp("^[a-zA-Z]{4,}$");
                        if (!exp.test(text)) {
                            element.parent().children("span.msg_err").text("");
                            element.parent().children("span.msg_err").text("Que des chaines,min 4 caracteres");
                        }
                        else
                            element.parent().children("span.msg_err").text("");
                    })

                    $("input.cin").blur(function() {
                        element = $(this);
                        var text = element.val();
                        var exp = new RegExp("^[a-zA-Z]{1,2}[1-9][0-9]{5}$");
                        if (!exp.test(text)) {
                            element.parent().children("span.msg_err").text("");
                            element.parent().children("span.msg_err").text("commencant par des caracteres,max taille : 8");
                        }
                        else
                            element.parent().children("span.msg_err").text("");
                    })
                    $("input.cne").blur(function() {
                        element = $(this);
                        var text = element.val();
                        var exp = new RegExp("^[1-9][0-9]{9}$");
                        if (!exp.test(text)) {
                            element.parent().children("span.msg_err").text("");
                            element.parent().children("span.msg_err").text("que des chiffres,taille : 10");
                        }
                        else
                            element.parent().children("span.msg_err").text("");
                    })

                });
</script>
