
<div id="content">   

<!-- h4>Rechercher un utilisateur </h4><input type="text" class="recherche"  / -->
    <br />
    <h1>Liste des <span>etudiants</span></h1>
    <br />
    <div style='min-width:900px;text-align:center;'>
        <label for="recherche_rapide">Recherche rapide : </label>
        <input type="text" id="recherche_rapide" style= "width:300px" />
        <input type="button" value="Ok" id="recherche_rapide_btn" onclick="byMotif_recherche();" class="bouton icon_add" />
        <br /><br />
        
        <label style="margin-top: 8px;float:left;display:relative;" id="nbr_elm">

        </label>
        <select id="filiere" style="width: 200px;position:relative;" onChange="byFiliere(this.value)">
            <option value="-1" >Toutes les filières  </option>
            <?php
            foreach ($filieres as $filiere) {
                ?>
                <option value="<?php echo $filiere->id ?>" ><?php echo $filiere->intitule ?> </option>
                <?php
            }
            ?>
        </select>
        <span style="font: 15px Tahoma; color: #173146; margin:0 8px">|</span>
        <select id="option" style="width: 200px;position:relative;" onChange="byOption(this.value)">
            <option value="-1" >Toutes les options  </option>
            <?php
            foreach ($options as $option) {
                ?>
                <option value="<?php echo $option->id ?>" ><?php echo $option->intitule ?> </option>
                <?php
            }
            ?>
        </select>
        <span style="font: 15px Tahoma; color: #173146; margin:0 8px">|</span>
        <select id="niv_act" style="width: 200px;position:relative;" onChange="byNiv_act(this.value)">
            <option value="-1" >Tous les niveaux  </option>
            <?php
            foreach ($niveaux as $niveau) {
                ?>
                <option value="<?php echo $niveau->niveau_univ_actuel ?>" ><?php echo $niveau->niveau_univ_actuel ?> </option>
                <?php
            }
            ?>
        </select>
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
            $(document).ready(function() {
                var nbr = getCookie("nbr_elm_pp");
                if (nbr == null)
                {
                    setCookie("nbr_elm_pp", "10", 9999);
                    nbr = 10;
                }
                document.getElementById("nbr_elm_pp").value = getCookie("nbr_elm_pp");
                 loadData(1, nbr, "-1", "-1", "-1", "");


                $("img.supprimer").click(function() {
                    if (confirm("Etes vous sûr de vouloir supprimer cet enregistrement ?")) {
                        var id_compte = $(this).parent().attr('id');
                        $(this).parent().parent().parent().fadeOut(300);
                        $.post(base_url + "admin_controller/supprimer_compte", {id_compte: id_compte},
                        function(data) {
                            var result = jQuery.parseJSON(data);
                            // alert(result);  
                        });
                    }
                });

                $("input.recherche").keyup(function() {
                    var motif = $(this).val();
                    alert(motif);
                    var exp = new RegExp(motif.toLowerCase());
                    $("table.liste_tab").children("td").each(function() {
                        elm_td = $(this);
                        alert(elm_td.val());
                        var li_text = elm_td.text();
                        if (!exp.test(li_text.toLowerCase())) {
                            elm_td.fadeOut(300);
                        }
                        else
                            elm_td.fadeIn(300);
                    });
                });
            });
    </script>
</div>