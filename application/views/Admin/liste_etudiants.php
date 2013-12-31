<div id="content">   
    <br />
    <h1>Liste des <span>etudiants</span></h1>
    <br />
    <div style='min-width:900px;text-align:center;'>
        <label for="recherche_rapide">Recherche rapide : </label>
        <input type="text" id="recherche_rapide" style= "width:300px" onkeypress="rechercheOnEnter(event, this)" />
        <input type="button" value="Ok" id="recherche_rapide_btn"  class="bouton icon_add" />
        <br />
        <br />
        <label style="margin-top: 8px;float:left;display:relative;" id="nbr_elm"></label>
        <select id="filiere" style="width: 200px;position:relative;" >
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
        <select id="option" style="width: 200px;position:relative;" >
            <option value="-1" >Toutes les options</option>
            <?php
            foreach ($options as $option) {
                ?>
                <option value="<?php echo $option->id ?>" ><?php echo $option->intitule ?> </option>
                <?php
            }
            ?>
        </select>
        <span style="font: 15px Tahoma; color: #173146; margin:0 8px">|</span>
        <select id="niv_act" style="width: 200px;position:relative;" >
            <option value="-1" >Tous les niveaux</option>
            <?php
            foreach ($niveaux as $niveau) {
                ?>
                <option value="<?php echo $niveau->niveau_univ_actuel ?>" ><?php echo $niveau->niveau_univ_actuel ?> </option>
                <?php
            }
            ?>
        </select>
        <select style="width: 80px;display:inline; float:right;" id="nbr_elm_pp" >
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
            //##########################################################################"        
            

            $(document).ready(function() {
                var nbr = getCookie("nbr_elm_pp");
                if (nbr == null)
                {
                    setCookie("nbr_elm_pp", "10", 9999);
                    nbr = 10;
                }
                $("#nbr_elm_pp").val(getCookie("nbr_elm_pp"));
                loadData(null);

                $("#recherche_rapide_btn").click(function() {
                    loadData(this);
                });

                $("#filiere,#option,#nbr_elm_pp,#niv_act").change(function() {
                    loadData(this);
                });

            });

            function loadData(element) {
                $('#loading').html("<img src='" + base_url + "assets/img/load_.gif'/><span> Chargement ..</span>").fadeIn('fast');
                var page;
                if (element !== null && element.nodeName === "LI")
                    page = $(element).attr("p");
                else
                    page = 1;

                var nbr_ = $("#nbr_elm_pp").val();
                var filiere = $("#filiere").val();
                var niveau = $("#niv_act").val();
                var option = $("#option").val();
                var motif_recherche = $("#recherche_rapide").val();

                $.post(base_url + "admin_controller/liste_etudiants", {
                    page: page,
                    nbr: nbr_,
                    niveau: niveau,
                    filiere: filiere,
                    motif_recherche: motif_recherche,
                    option: option
                },
                function(data) {
                    var result = jQuery.parseJSON(data);
                    $("#container").html(result["liste_etudiants"]);
                    var plus;
                    if (result["nbr_etu"] > 1)
                        plus = "s.";
                    else
                        plus = ".";
                    $("#nbr_elm").html("<span style='color:#8F0000'>" + result["nbr_etu"] + "</span> Etudiant" + plus);
                    $('#loading').fadeOut('fast');
                });

                setCookie("nbr_elm_pp", nbr_, 365);
            }

    </script>
</div>