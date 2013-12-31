<div id="content">   
    <br />
    <h1>Liste des <span>enseignants</span></h1>
    <br />
    <div style='min-width:900px;text-align:center;'>
        <label for="recherche_rapide">Recherche rapide : </label>
        <input type="text" id="recherche_rapide" style= "width:300px" />
        <input type="button" value="Ok" id="recherche_rapide_btn" onkeypress="rechercheOnEnter(event, this)" class="bouton icon_add" />
        <br/>
        <label style="margin-top: 8px;float:left;display:relative;" id="nbr_elm">

        </label>

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

        <br />
    </div>
    <br />
    <div id="container">

    </div>
    <div id="loading"></div>      

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/load_data_enseignant.js" ></script>
    <script type="text/javascript" >
        $(document).ready(function() {
            var nbr = getCookie("nbr_elm_pp");
            if (nbr == null)
            {
                setCookie("nbr_elm_pp", "10", 9999);
                nbr = 10;
            }
            document.getElementById("nbr_elm_pp").value = getCookie("nbr_elm_pp");
            loadData(null, "liste_enseignants");
            $("#recherche_rapide_btn").click(function() {
                loadData(this);
            });

            $("#nbr_elm_pp").change(function() {
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
            var motif_recherche = $("#recherche_rapide").val();
            //        alert(nbr_+" "+filiere+" "+niveau+" "+option+" "+motif_recherche);
            $.post(base_url + "admin_controller/liste_enseignants", {
                page: page,
                nbr: nbr_,
                motif_recherche: motif_recherche},
            function(data) {
                var result = jQuery.parseJSON(data);
                $("#container").html(result["liste_enseignants"]);
                var plus;
                if (result["nbr_ens"] > 1)
                    plus = "s .";
                else
                    plus = " .";
                $("#nbr_elm").html("<span style='color:#8F0000'>" + result["nbr_ens"] + "</span> Enseignant" + plus);
                $('#loading').fadeOut('fast');
            });
            setCookie("nbr_elm_pp", nbr_, 365);
        }

    </script>
</div>