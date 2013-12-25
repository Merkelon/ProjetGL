<div id="content">
        <br />
        <h1>Ajouter <span>Entreprise</span></h1>
        <br />
        <div class="msg_res" > </div>
        <div class="clear"></div>
        <?php echo form_open('admin/ajouter_utilisateur/entreprise'); ?>   
        <table class="formulaire" style="width: 360px;">
            
                <tr>
                        <th><label for="nom">Nom :</label></th>
                        <td style="width: 180px;"><input type="text" name="nom" class="nom" value="<?php echo set_value('nom'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_nom" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="domaine">Domaine :</label></th>
                        <td style="width: 180px;"><input type="text" name="domaine" class="domaine" value="<?php echo set_value('domaine'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_domaine" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>               
                <tr>
                        <th><label for="email">Email :</label></th>
                        <td style="width: 180px;"><input type="text" class="email" name="email" value="<?php echo set_value('email'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_email" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="tel">Tel :</label></th>
                        <td style="width: 180px;"><input type="text" name="tel" class="tel" value="<?php echo set_value('tel'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_tel" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="fax">Fax :</label></th>
                        <td style="width: 180px;"><input type="text" name="fax" class="fax" value="<?php echo set_value('fax'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_fax" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="ville">Ville :</label></th>
                        <td style="width: 180px;"><input type="text" name="ville" class="ville" value="<?php echo set_value('ville'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_ville" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="adresse">Adresse :</label></th>
                        <td style="width: 180px;"><input type="text" name="adresse" class="adresse" value="<?php echo set_value('adresse'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_adresse" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="username">Username :</label></th>
                        <td style="width: 180px;"><input type="text" class="username" name="username" value="<?php echo set_value('username'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_username" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="nom">Password :</label></th>
                        <td style="width: 180px;"><input type="password" name="password" class="password" value="<?php echo set_value('password'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_password" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="nom">Confirmer password :</label></th>
                        <td style="width: 180px;"><input type="password" name="password_conf" class="password_conf" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_password_conf" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
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
$(document).ready(function(){   
        resultat = 1;
	$("input.email").blur(function(){
            element = $(this);
            var email = element.val();
            var exp=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$");
            
            if(email && exp.test(email)){                      	
		$.post(base_url+"admin_controller/verifier_email/entreprise",{email : email },
		function(data){
			var result=jQuery.parseJSON(data);
                        element.parent().children("span.msg_err").text("");  
                        element.parent().children("span.msg_err").text(result['msg_res']);  
		}); 
            }
            else
                element.parent().children("span.msg_err").text("Entrer une adresse email valide");
	});	
        
	$("input#valider_creation").click(function(){
            var nom = $('input.nom').val();                   	
            var domaine = $('input.domaine').val();                   	
            var email = $('input.email').val();                   	
            var tel = $('input.tel').val();                   	
            var fax = $('input.fax').val();                   	
            var ville = $('input.ville').val();                   	
            var adresse = $('input.adresse').val();                   	
            var username = $('input.username').val();                   	
            var ajax = $('input.use_ajax').val();                   	
            var password = $('input.password').val();                   	
            var password_conf = $('input.password_conf').val();                   	
                    	
		$.post(base_url+"admin_controller/creer_compte/entreprise",{
                    nom : nom, 
                    domaine : domaine, 
                    tel : tel,
                    ajax : ajax, 
                    fax : fax, 
                    ville : ville, 
                    email : email, 
                    username : username, 
                    adresse : adresse, 
                    password : password, 
                    password_conf : password_conf},
		function(data){
			var result=jQuery.parseJSON(data);
                       if(result["message"] == "0"){                        
                            $("div.msg_res").fadeIn(300).text("").text("Entreprise ajoutée avec succés");
                            $("table.formulaire input[type='text'],table.formulaire input[type='password']").val("");
                            $("div#msg_nom").fadeOut(300);                 
                            $("div#msg_domaine").fadeOut(300);
                            $("div#msg_tel ").fadeOut(300);
                            $("div#msg_fax ").fadeOut(300);
                            $("div#msg_email ").fadeOut(300);
                            $("div#msg_ville ").fadeOut(300);
                            $("div#msg_adresse ").fadeOut(300);
                            $("div#msg_username ").fadeOut(300);
                            $("div#msg_password ").fadeOut(300);
                            $("div#msg_password_conf ").fadeOut(300);
                        }
                       
                       else if(result["message"] == "-1"){ 
                            $("div.msg_res").fadeIn(300).text("").text("Une erreur s'est produite");
                        }
                        else{
                            $("div#msg_nom").fadeIn(300).children("div.message").text("").text(result['nom']);                 
                            $("div#msg_domaine").fadeIn(300).children("div.message").text("").text(result['domaine']);
                            $("div#msg_tel ").fadeIn(300).children("div.message").text("").text(result['tel']);
                            $("div#msg_fax ").fadeIn(300).children("div.message").text("").text(result['fax']);
                            $("div#msg_email ").fadeIn(300).children("div.message").text("").text(result['email']);
                            $("div#msg_ville ").fadeIn(300).children("div.message").text("").text(result['ville']);
                            $("div#msg_adresse ").fadeIn(300).children("div.message").text("").text(result['adresse']);
                            $("div#msg_username ").fadeIn(300).children("div.message").text("").text(result['username']);
                            $("div#msg_password ").fadeIn(300).children("div.message").text("").text(result['password']);
                            $("div#msg_password_conf ").fadeIn(300).children("div.message").text("").text(result['password_conf']);                                                  
                        }
                       
		}); 
	});	
        
        
        
});
</script>
</body>
</html>