<div id="content">
    <br />
    <h1>Ajouter <span>Etudiant</span></h1>
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
            <th><label for="apogee">Apogee :</label></th>
            <td style="width: 180px;"><input type="text" id="apogee" name="apogee" class="apogee" value="<?php echo set_value('apogee'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_apogee" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="nom">Nom :</label></th>
            <td style="width: 180px;"><input type="text" id="nom" name="nom" class="nom" value="<?php echo set_value('nom'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_nom" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="prenom">Prenom :</label></th>
            <td style="width: 180px;"><input type="text" id="prenom" name="prenom" class="prenom" value="<?php echo set_value('prenom'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_prenom" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="cin">Cin :</label></th>
            <td style="width: 180px;"><input type="text" id="cin" name="cin" class="cin" value="<?php echo set_value('cin'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_cin" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="cne">Cne :</label></th>
            <td style="width: 180px;"><input type="text" id="cne" name="cne" class="cne" value="<?php echo set_value('cne'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_cne" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="email">Email :</label></th>
            <td style="width: 180px;"><input type="text" id="email" class="email" name="email" value="<?php echo set_value('email'); ?>" /></td>
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
            <td style="width: 180px;"><input type="text" onkeypress="testNumber(event);" class="ann_insc" id="ann_insc" name="ann_insc" value="<?php echo set_value('annee_univ_inscription'); ?>" /></td>
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
                    <option value="1cp" >1ére année CP </option>
                    <option value="2cp" >2éme année CP </option>
                    <option value="1ci" >1ére année CI </option>
                    <option value="2ci" >2éme année CI </option>
                    <option value="3ci" >3éme année CI </option>
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
                    <?php // à changer selon le niveau d'inscription ?>
                    <?php // peut pas etre inf au niveau d'insc ?>
                <select class="niv_act" id="niv_act"  name="niv_act" style="width: 212px;">
                    <option value="1cp" >1ére année CP </option>
                    <option value="2cp" >2éme année CP </option>
                    <option value="1ci" >1ére année CI </option>
                    <option value="2ci" >2éme année CI </option>
                    <option value="3ci" >3éme année CI </option>
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
                        ?>
                        <option value="<?php echo $option->id; ?>" ><?php echo $option->intitule; ?> </option>

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
                <input type="checkbox" id="ingenieur" name="ingenieur" class="ingenieur"  />
                
            </td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_ingenieur" class="message_err">
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
            <th><label for="password">Password :</label></th>
            <td style="width: 180px;"><input type="password" id="password" name="password" class="password" value="<?php echo set_value('password'); ?>" /></td>
            <td style="float:left; padding-left: 0;">
                <div id="msg_password" class="message_err">
                    <img src="<?php echo base_url(); ?>assets/img/error_left.gif" />
                    <div class="message"></div>
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="password_conf">Confirmer password :</label></th>
            <td style="width: 180px;"><input type="password" id="password_conf" name="password_conf" class="password_conf" /></td>
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
            </tht
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
                    $("div#msg_email").fadeIn(300)
                            .children("div.message").text("").text(result['msg_res']);
                });
            }
            else
                element.parent().children("span.msg_err").text("Email invalide");
        });
        $("input#valider_creation").click(function() {
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
            if(ingenieur == true) ingenieur = 1; else ingenieur = 0;
            var ajax = $('input.use_ajax').val();
            var password = $('input.password').val();
            var password_conf = $('input.password_conf').val();

            $.post(base_url + "admin_controller/creer_compte/etudiant", {
                nom: nom,
                prenom: prenom,
                ajax: ajax,
                cin: cin,
                cne: cne,
                email: email,
                apogee: apogee,
                ann_insc: ann_insc,
                niv_insc: niv_insc,
                niv_act: niv_act,
                option: option,
                ingenieur: ingenieur,
                password: password,
                password_conf: password_conf},
            function(data) {
                var result = jQuery.parseJSON(data);
                if (result["message"] == "0") {
                     $("#reponse_ok").fadeIn(300).find("p").text("Etudiant ajouté avec succés");
                    $("table.formulaire input[type='text'],table.formulaire input[type='password']").val("");
                    $("div#msg_nom").fadeOut(300);
                    $("div#msg_prenom").fadeOut(300);
                    $("div#msg_cin ").fadeOut(300);
                    $("div#msg_cne ").fadeOut(300);
                    $("div#msg_email ").fadeOut(300);
                    $("div#msg_apogee ").fadeOut(300);
                    $("div#msg_ann_insc ").fadeOut(300);
                    $("div#msg_password ").fadeOut(300);
                    $("div#msg_password_conf ").fadeOut(300);
                }

                else if (result["message"] == "-1") {
                    $("#reponse_error").fadeIn(300).find("p").text("Une erreur s'est produite");
                }
                else {
                    $("div#msg_nom").fadeIn(300).children("div.message").text(result['nom']);
                    $("div#msg_prenom").fadeIn(300).children("div.message").text(result['prenom']);
                    $("div#msg_cin ").fadeIn(300).children("div.message").text(result['cin']);
                    $("div#msg_cne ").fadeIn(300).children("div.message").text(result['cne']);
                    $("div#msg_email ").fadeIn(300).children("div.message").text(result['email']);
                    $("div#msg_apogee ").fadeIn(300).children("div.message").text(result['apogee']);
                    $("div#msg_ann_insc ").fadeIn(300).children("div.message").text(result['ann_insc']);
                    $("div#msg_password ").fadeIn(300).children("div.message").text(result['password']);
                    $("div#msg_password_conf ").fadeIn(300).children("div.message").text(result['password_conf']);
                }


            });
        });       
    });
    
    function remplire_niv_act(niv_act){
            
         nivx = new Array();
         nivx['1cp'] = "1ére année CP "
         nivx['2cp'] = "2éme année CP "
         nivx['1ci'] = "1ére année CI "
         nivx['2ci'] = "2éme année CI "
         nivx['3ci'] = "3éme année CI "
         var remplir = 0 ;
        $("select.niv_act").empty();
        $("select.niv_insc").children("option").each(function(){               
                 elm_td = $(this);
                 if(elm_td.val() === niv_act || remplir === 1 ){
                     remplir = 1;
                     $("select.niv_act").append("<option value="+elm_td.val()+" >"+nivx[elm_td.val()]+"</option>");
                 }
             });		
	}	
</script>
