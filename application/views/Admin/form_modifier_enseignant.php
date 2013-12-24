<div id="content">
        <br />
        <h1>Modifier <span>Enseignant</span></h1>
        <br />
        <div class="msg_res" > </div>
        <div class="clear"></div>
        <?php echo form_open('admin/ajouter_utilisateur/enseignant'); ?>   
        <table class="formulaire" style="width: 360px;">
                <tr>
                        <th><label for="nom">Nom :</label></th>
                        <td style="width: 180px;"><input type="text" name="nom" class="nom" value="<?php echo $utilisateur->nom; ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_nom" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
                <tr>
                        <th><label for="prenom">Prenom :</label></th>
                        <td style="width: 180px;"><input type="text" name="prenom" class="prenom" value="<?php echo $utilisateur->prenom; ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_prenom" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
               <tr>
                        <th><label for="email">Email :</label></th>
                        <td style="width: 180px;"><input type="text" class="email" name="email" value="<?php echo $utilisateur->email; ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_email" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
                                        <div class="message"></div>
                                </div>
                        </td>
                </tr>
               <tr>
                        <th><label for="tel">Tel :</label></th>
                        <td style="width: 180px;"><input type="text" class="tel" name="tel" value="<?php echo $utilisateur->tel; ?>" /></td>
                        <td style="float:left; padding-left: 0;">
                                <div id="msg_tel" class="message_err">
                                        <img src="<?php echo base_url();?>assets/img/error_left.gif" />
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
$(document).ready(function(){   
        resultat = 1;
	$("input.email").blur(function(){
            element = $(this);
            var email = element.val();
            var exp=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$");
            
            if(email && exp.test(email)){                      	
		$.post(base_url+"admin_controller/verifier_email/enseignant",{email : email },
		function(data){
			var result=jQuery.parseJSON(data);
                        element.parent().children("span.msg_err").text("");  
                        element.parent().children("span.msg_err").text(result['msg_res']);  
		}); 
            }
            else
                element.parent().children("span.msg_err").text("Entrer une adresse email valide");
	});	
        
	$("input#valider_modification").click(function(){
            var id = $('input.id_utilisateur').val();                   	
            var nom = $('input.nom').val();                   	
            var prenom = $('input.prenom').val();                   	
            var email = $('input.email').val();                   	
            var tel = $('input.tel').val();                   	                      	
            var ajax = $('input.use_ajax').val();                   	
                               	                   	
		$.post(base_url+"admin_controller/modifier_utilisateur/enseignant",{
                    id : id, 
                    nom : nom, 
                    prenom : prenom, 
                    tel : tel,
                    ajax : ajax, 
                    email : email},
		function(data){
                       var result=jQuery.parseJSON(data);
                        if(result["message"] == "0"){                        
                            $("div.msg_res").fadeIn(300).text("").text("Etudiant ajouté avec succés");
                            $("div#msg_nom").fadeOut(300);                 
                            $("div#msg_prenom").fadeOut(300);
                            $("div#msg_email ").fadeOut(300);
                            $("div#msg_tel ").fadeOut(300);
                        }
                       
                       else if(result["message"] == "-1"){ 
                            $("div.msg_res").text("").text("Une erreur s'est produite");
                        }
                        else{
                            $("div#msg_nom").fadeIn(300).children("div.message").text("").text(result['nom']);                 
                            $("div#msg_prenom").fadeIn(300).children("div.message").text("").text(result['prenom']);
                            $("div#msg_email ").fadeIn(300).children("div.message").text("").text(result['email']);
                            $("div#msg_tel ").fadeIn(300).children("div.message").text("").text(result['tel']);                                              
                        }
                       
		}); 
	});	
        
        
        
});
</script>
</body>
</html>