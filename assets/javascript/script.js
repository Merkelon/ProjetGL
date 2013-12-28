// Fonts Cufon
Cufon.replace('#content h1, #logo-login h1', {fontFamily: 'Comfortaa', hover: true});
Cufon.replace('_', {fontFamily: 'Comfortaa Bold', hover: true});
Cufon.replace('_', {fontFamily: 'Comfortaa Thin', hover: true});
// Liste des l3ibat  test z3ma v.0

function testNumber(evt) {
    var theEvent = evt || window.event;
    var key_code = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key_code);
    var regex = /[0-9]/; // 
    if (!regex.test(key) && key_code !== 8)
    {
        theEvent.returnValue = false;
        if (theEvent.preventDefault)
            theEvent.preventDefault();
    }
}


function byFiliere(filiere) {
    var niv_act = $("#niv_act").val();
    var elm = $("#nbr_elm_pp").val();
    var option = $("#option").val();
    var motif_recherche = $("#recherche_rapide").val();
    loadData(1, elm, niv_act, option, filiere, motif_recherche);
}

function byOption(option) {
    var niv_act = $("#niv_act").val();
    var elm = $("#nbr_elm_pp").val();
    var filiere = $("#filiere").val();
    var motif_recherche = $("#recherche_rapide").val();
    loadData(1, elm, niv_act, option, filiere, motif_recherche);
}

function byNiv_act(niv_act) {
    var elm = $("#nbr_elm_pp").val();
    var filiere = $("#filiere").val();
    var option = $("#option").val();
    var motif_recherche = $("#recherche_rapide").val();
    loadData(1, elm, niv_act, option, filiere, motif_recherche);
}

function nbr_elm_pp(elm) {
    var option = $("#option").val();
    var filiere = $("#filiere").val();
    var motif_recherche = $("#recherche_rapide").val();
    var niv_act = $("#niv_act").val();
    loadData(1, elm, niv_act, option, filiere, motif_recherche);
    setCookie("nbr_elm_pp", elm, 365);
}

function byMotif_recherche(){
    var elm = $("#nbr_elm_pp").val();
    var option = $("#option").val();
    var filiere = $("#filiere").val();
    var niv_act = $("#niv_act").val();
     var motif_recherche = $("#recherche_rapide").val();
    loadData_sansloading(1, elm, niv_act, option, filiere, motif_recherche);
}

function pagin(p){
    var elm = $("#nbr_elm_pp").val();
    var niv_act = $("#niv_act").val();
    var option = $("#option").val();
    var filiere = $("#filiere").val();
    var motif_recherche = $("#motif_recherche").val();
    loadData(p, elm, niv_act, option, filiere, motif_recherche);
}

// en construction :D
function loadData(page, nbr_, niveau, option, filiere, motif_recherche) {
    $('#loading').html("<img src='" + base_url + "assets/img/load_.gif'/><span> Chargement ..</span>").fadeIn('fast');
    $.post(base_url + "admin_controller/liste_etudiants", {
        page: page,
        nbr: nbr_,
        niveau: niveau,
        filiere: filiere,
        motif_recherche: motif_recherche,
        option: option},
    function(data) {
        var result = jQuery.parseJSON(data);
        $("#container").ajaxComplete(function(event, request, settings) {
            $("#container").html(result["liste_etudiants"]);
            var plus;
            if(result["nbr_etu"] > 1)
                plus = "s";
            else
                plus = "";           
            $("#nbr_elm").html("<span style='color:#8F0000'>"+result["nbr_etu"]+"</span> Etudiant"+plus);
            $('#loading').fadeOut('fast');
        });
    });
}
function loadData_sansloading(page, nbr_, niveau, option, filiere, motif_recherche) {
    
    $.post(base_url + "admin_controller/liste_etudiants", {
        page: page,
        nbr: nbr_,
        niveau: niveau,
        filiere: filiere,
        motif_recherche: motif_recherche,
        option: option},
    function(data) {
        var result = jQuery.parseJSON(data);
        $("#container").ajaxComplete(function(event, request, settings) {
            $("#container").html(result["liste_etudiants"]);
            var plus;
            if(result["nbr_etu"] > 1)
                plus = "s";
            else
                plus = "";           
            $("#nbr_elm").html(result["nbr_etu"]+" Etudiant"+plus);
            $('#loading').fadeOut('fast');
        });
    });
}

function setCookie(c_name, value, exdays)
{
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name)
{
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++)
    {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name)
        {
            return unescape(y);
        }
    }
}

