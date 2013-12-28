<div id="content">   

<!-- h4>Rechercher un utilisateur </h4><input type="text" class="recherche"  / -->
  <br />
    <h1>Liste des <span>etudiants</span></h1>
    <br />
    <div style='min-width:900px;text-align:center;'>
        <label for="recherche_rapide">Recherche rapide : </label>
        <input type="text" id="recherche_rapide" style= "width:300px" />
        <input type="button" value="Ok" id="recherche_rapide_btn" onclick="byMotif_recherche();" class="bouton icon_add" />
        <br/>
        <label style="margin-top: 8px;float:left;display:relative;" id="nbr_elm">
10 articles
        </label>
        <select style="width: 80px;display:inline; float:right;" id="nbr_elm_pp" onChange="nbr_elm_pp(this.value)">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="500">500</option>
        </select>
        <label style="margin: 8px; float:right;" for="">Affichage : </label>
    </div>
    <br />
    <div id="container">
        
    </div>
    <div id="loading"></div>      

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