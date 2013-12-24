 <div id="content">   

<!-- h4>Rechercher un utilisateur </h4><input type="text" class="recherche"  / -->
<br />
        <h1>Liste des <span>Entreprises</span></h1>
        <br />
     <table class="liste_tab">
<tr>
        <th>Nom</th>
        <th>Domaine</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Fax</th>
        <th>Ville</th>
        <th>Adresse</th>
        <th></th>       
        <th></th>
  </tr>
<?php foreach ($entreprises as $entreprise){ ?>
   <tr>
    <td> <?php echo $entreprise->nom ?> </td>
    <td> <?php echo $entreprise->domaine ?> </td>
    <td> <?php echo $entreprise->email ?> </td>
    <td> <?php echo $entreprise->tel ?> </td>
    <td> <?php echo $entreprise->fax ?> </td>
    <td> <?php echo $entreprise->ville ?> </td>
    <td> <?php echo $entreprise->adresse ?> </td>
   <td> 
   <a href="<?php echo base_url(); ?>admin/modifier_utilisateur/entreprise/<?php echo $entreprise->id;  ?>"><img title="Modifier" src="<?php echo base_url();?>assets/img/modify.png" /> </a> 
   <a class="supprimer" id="<?php echo $entreprise->id_compte; ?>" href="#"><img title="Supprimer" class="supprimer" src="<?php echo base_url();?>assets/img/delete.png" /> </a> 
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
