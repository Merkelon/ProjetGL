
 <div id="content">   

<!-- h4>Rechercher un utilisateur </h4><input type="text" class="recherche"  / -->
<br />
        <h1>Liste des <span>Etudiants</span></h1>
        <br />
     <table class="liste_tab">
<tr>
        <th>Apogee</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>CIN</th>
        <th>CNE</th>       
        <th>Email</th>
        <th></th>
    </tr>
<?php foreach ($etudiants as $etudiant){ ?>
    
    <tr>
        <td><?php echo $etudiant->apogee ?> </td>
        <td><?php echo $etudiant->nom ?> </td>
        <td><?php echo $etudiant->prenom ?> </td>
        <td><?php echo $etudiant->cin ?> </td>
        <td><?php echo $etudiant->cne ?> </td>
        <td><?php echo $etudiant->email ?> </td>
        <td>
            
            <a href="<?php echo base_url(); ?>admin/modifier_utilisateur/etudiant/<?php echo $etudiant->id;  ?>"><img title="Modifier" src="<?php echo base_url();?>assets/img/modify.png" /> </a> 
            <a class="supprimer" id="<?php echo $etudiant->id_compte; ?>" href="#"><img title="Supprimer" class="supprimer" src="<?php echo base_url();?>assets/img/delete.png" /> </a> 
        </td>
    </tr>
<?php } ?>
</table>


<script type="text/javascript" > 
$(document).ready(function(){   
	$("img.supprimer").click(function(){
                var id_compte = $(this).parent().attr('id');
		$(this).parent().parent().parent().fadeOut(300); 		
		$.post(base_url+"admin_controller/supprimer_compte",{id_compte : id_compte },
		function(data){
			var result=jQuery.parseJSON(data);
			// alert(result);  
		});  
	});
        
	$("input.recherche").keyup(function(){
                var motif = $(this).val();
                alert(motif);
                var exp=new RegExp(motif.toLowerCase());
             $("table.liste_tab").children("td").each(function(){
                 elm_td = $(this);
                 alert(elm_td.val());
                 var li_text = elm_td.text();
                 if(!exp.test(li_text.toLowerCase())){
                      elm_td.fadeOut(300);
                 }
                 else
                     elm_td.fadeIn(300);
             });		
	});	
});
</script>
 </div>