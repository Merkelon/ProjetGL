<div id="content">
        <br />
        <h1>Ajouter <span>Etudiant</span></h1>
        <br />
        <div class="msg_res" > </div>
        <div class="clear"></div>
        <?php echo form_open('admin/ajouter_utilisateur/etudiant'); ?>   
        <table class="formulaire" style="width: 360px;">
                <tr>
                        <th><label for="apogee">Apogee :</label></th>
                        <td style="width: 180px;"><input type="text" name="apogee" class="apogee" value="<?php echo set_value('apogee'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_apogee" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
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
                        <th><label for="nom">Prenom :</label></th>
                        <td style="width: 180px;"><input type="text" name="prenom" class="prenom" value="<?php echo set_value('prenom'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_prenom" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="nom">Cin :</label></th>
                        <td style="width: 180px;"><input type="text" name="cin" class="cin" value="<?php echo set_value('cin'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_cin" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="nom">Cne :</label></th>
                        <td style="width: 180px;"><input type="text" name="cne" class="cne" value="<?php echo set_value('cne'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_cne" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="nom">Email :</label></th>
                        <td style="width: 180px;"><input type="text" class="email" name="email" value="<?php echo set_value('email'); ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_email" class="message_err">
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
		$.post(base_url+"admin_controller/verifier_email/etudiant",{email : email },
		function(data){
			var result=jQuery.parseJSON(data);
                        $("div#msg_email").fadeIn(300)                    
                                .children("div.message").text("").text(result['msg_res']);                        
		}); 
            }
            else
                element.parent().children("span.msg_err").text("Email invalide");
	});	
        
	$("input#valider_creation").click(function(){
            var nom = $('input.nom').val();                   	
            var prenom = $('input.prenom').val();                   	
            var email = $('input.email').val();                   	
            var cin = $('input.cin').val();                   	
            var cne = $('input.cne').val();                   	
            var apogee = $('input.apogee').val();                   	
            var ajax = $('input.use_ajax').val();                   	
            var password = $('input.password').val();                   	
            var password_conf = $('input.password_conf').val();                   	
                    	
		$.post(base_url+"admin_controller/creer_compte/etudiant",{
                    nom : nom, 
                    prenom : prenom, 
                    ajax : ajax, 
                    cin : cin, 
                    cne : cne, 
                    email : email, 
                    apogee : apogee, 
                    password : password, 
                    password_conf : password_conf},
		function(data){
			var result=jQuery.parseJSON(data);
                       if(result["message"] == "0"){                        
                            $("div.msg_res").fadeIn(300).text("").text("Etudiant ajouté avec succés");
                            $("table.formulaire input[type='text'],table.formulaire input[type='password']").val("");
                            $("div#msg_nom").fadeOut(300);                 
                            $("div#msg_prenom").fadeOut(300);
                            $("div#msg_cin ").fadeOut(300);
                            $("div#msg_cne ").fadeOut(300);
                            $("div#msg_email ").fadeOut(300);
                            $("div#msg_apogee ").fadeOut(300);
                            $("div#msg_password ").fadeOut(300);
                            $("div#msg_password_conf ").fadeOut(300);
                        }
                       
                       else if(result["message"] == "-1"){ 
                            $("div.msg_res").text("").text("Une erreur s'est produite");
                        }
                        else{
                            $("div#msg_nom").fadeIn(300).children("div.message").text("").text(result['nom']);                 
                            $("div#msg_prenom").fadeIn(300).children("div.message").text("").text(result['prenom']);
                            $("div#msg_cin ").fadeIn(300).children("div.message").text("").text(result['cin']);
                            $("div#msg_cne ").fadeIn(300).children("div.message").text("").text(result['cne']);
                            $("div#msg_email ").fadeIn(300).children("div.message").text("").text(result['email']);
                            $("div#msg_apogee ").fadeIn(300).children("div.message").text("").text(result['apogee']);
                            $("div#msg_password ").fadeIn(300).children("div.message").text("").text(result['password']);
                            $("div#msg_password_conf ").fadeIn(300).children("div.message").text("").text(result['password_conf']);                                                  
                        }
                       
                       
		}); 
	});	
        
        $("input.nom,input.prenom").blur(function(){       
            element = $(this);
            var text = element.val();
            var exp=new RegExp("^[a-zA-Z]{4,}$");
            if ( !exp.test(text) ) {
               element.parent().children("span.msg_err").text("");  
               element.parent().children("span.msg_err").text("Que des chaines,min 4 caracteres");  
            }
            else
             element.parent().children("span.msg_err").text(""); 
        })
        
        $("input.cin").blur(function(){       
            element = $(this);
            var text = element.val();
            var exp=new RegExp("^[a-zA-Z]{1,2}[1-9][0-9]{5}$");
            if ( !exp.test(text) ) {
               element.parent().children("span.msg_err").text("");  
               element.parent().children("span.msg_err").text("commencant par des caracteres,max taille : 8");  
            }
            else
             element.parent().children("span.msg_err").text(""); 
        })
        $("input.cne").blur(function(){       
            element = $(this);
            var text = element.val();
            var exp=new RegExp("^[1-9][0-9]{9}$");
            if ( !exp.test(text) ) {
               element.parent().children("span.msg_err").text("");  
               element.parent().children("span.msg_err").text("que des chiffres,taille : 10");  
            }
            else
             element.parent().children("span.msg_err").text(""); 
        })
        
});
</script>