<div id="content">   
    <br />
    <h1>Liste des <span>entreprises</span></h1>
    <br />
    <div style='min-width:900px;text-align:center;'>
        <label for="recherche_rapide">Recherche rapide : </label>
        <input type="text" id="recherche_rapide" style= "width:300px" onkeypress="rechercheOnEnter(event, this)" />
        <input type="button"  value="Ok"  id="recherche_rapide_btn"  class="bouton icon_add" />
        <br />
        <br />
        <label style="margin-top: 8px;float:left;display:relative;" id="nbr_elm"></label>
        <select id="domaine" style="width: 200px;position:relative;"  >
            <option value="-1" >Tous les domaines  </option>
            <?php
            foreach ($domaines as $domaine) {
                ?>
                <option value="<?php echo $domaine->id ?>" ><?php echo $domaine->intitule ?> </option>
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
    <div id="container"></div>
    <div id="loading"></div>
    <script type="text/javascript" >
            //##########################################################################"
            
            //##########################################################################"

            $(document).ready(function() {
                var nbr = getCookie("nbr_elm_pp");
                if (nbr === null)
                {
                    setCookie("nbr_elm_pp", "10", 9999);
                    nbr = 10;
                }
                $("#nbr_elm_pp").val(getCookie("nbr_elm_pp"));
                loadData(null);

                $("#recherche_rapide_btn").click(function() {
                    loadData(this);
                });

                $("#nbr_elm_pp,#domaine").change(function() {
                    loadData(this);
                });
            });

            function loadData(element) {
                $('#loading').html("<img src='" + base_url + "assets/img/load_.gif'/><span> Chargement ..</span>").fadeIn('fast');
                var page;
                if (element !== null && element.nodeName === "LI") {
                    page = $(element).attr("p");
                }
                else
                    page = 1;

                var nbr_ = $("#nbr_elm_pp").val();
                var domaine = $("#domaine").val();
                var motif_recherche = $("#recherche_rapide").val();
//        alert(nbr_+" "+filiere+" "+niveau+" "+option+" "+motif_recherche);
                $.post(base_url + "admin_controller/liste_entreprises", {
                    page: page,
                    nbr: nbr_,
                    domaine: domaine,
                    motif_recherche: motif_recherche},
                function(data) {
                    var result = jQuery.parseJSON(data);

                    $("#container").html(result["liste_entreprises"]);
                    var plus;
                    if (result["nbr_ent"] > 1)
                        plus = "s";
                    else
                        plus = "";
                    $("#nbr_elm").html("<span style='color:#8F0000'>" + result["nbr_ent"] + "</span> Entreprise" + plus);
                    $('#loading').fadeOut('fast');
                });
                setCookie("nbr_elm_pp", nbr_, 365);
            }

    </script>
</div>