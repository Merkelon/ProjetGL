<div id="content">   

<!-- h4>Rechercher un utilisateur </h4><input type="text" class="recherche"  / -->
<br />
        <h1>Liste des <span>Enseignants</span></h1>
        <br />
     <table class="liste_tab">
<tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>     
        <th></th>
  </tr>
<?php foreach ($enseignants as $enseignant){ ?>
  <tr>
  <td><?php echo $enseignant->nom ?> </td> 
  <td><?php echo $enseignant->prenom ?> </td> 
  <td><?php echo $enseignant->email ?> </td> 
  <td><?php echo $enseignant->tel ?> </td> 
   <td>
   <a href="<?php echo base_url(); ?>admin/modifier_utilisateur/enseignant/<?php echo $enseignant->id;  ?>"><img title="Modifier" src="<?php echo base_url();?>assets/img/modify.png" /></a> 
   <a class="supprimer" id="<?php echo $enseignant->id_compte; ?>" href="#"><img title="Supprimer" class="supprimer" src="<?php echo base_url();?>assets/img/delete.png" /> </a> 
   </td>
  </tr>
<?php } ?>
     </table>


<script type="text/javascript" > 
$(document).ready(function(){   
	$("a.supprimer").click(function(){
                var id_compte = $(this).attr('id');
		$(this).parent().fadeOut(300); 		
		$.post(base_url+"admin_controller/supprimer_compte",{id_compte : id_compte },
		function(data){
			var result=jQuery.parseJSON(data);
			// alert(result);  
		});  
	});
        
	$("input.recherche").keyup(function(){
                var motif = $(this).val();
                var exp=new RegExp(motif.toLowerCase());
             $("ul.liste").children("li").each(function(){
                 elm_li = $(this);
                 var span_text = elm_li.children("span").text();
                 if(!exp.test(span_text.toLowerCase())){
                      elm_li.fadeOut(300);
                 }
                 else
                     elm_li.fadeIn(300);
             });		
	});	
});
</script>
</body>

</html>