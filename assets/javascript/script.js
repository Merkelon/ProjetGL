/* ============================= Supprimer Compte ============================= */

function supprimer(element) {
    if (confirm("Etes vous sûr de vouloir supprimer cet enregistrement ?")) {
        var id_compte = $(element).parent().attr('id');
        $(element).parent().parent().parent().fadeOut(300);
        $.post(base_url + "admin_controller/supprimer_compte", {id_compte: id_compte},
        function(data) {
            var result = jQuery.parseJSON(data);
            // alert(result);
        });
    }
}

/* ============================= Fonts Cufon ============================= */

Cufon.replace('#content h1, #logo-login h1', {fontFamily: 'Comfortaa', hover: true}); // Comfortaa Bold , Comfortaa Thin
Cufon.replace('h1, .title', {fontFamily: 'Segoe UI Light', hover: true});
Cufon.replace('h2', {fontFamily: 'Segoe UI Bold 1', hover: true}); // Segoe UI Bold
Cufon.replace('p', {fontFamily: 'Myriad Pro Regular', hover: true});

/* ============================= On load Actions ============================= */

$(document).ready(function() {

    // close message Succes & Error
    $(".close_msg").click(function() {
        $(this).parent().fadeOut("slow");
    });

    // login boxs
    $(".login").animate({top: '160px'}, {queue: false, duration: 0});
    $(".login").css("display", "none");

    $('.login-button').click(function() {
        $(".login").css("display", "none");
        $(".login").animate({top: '160px'}, {queue: false, duration: 100});
        $(".close").click();
        $(this).next(".login").css("display", "block");
        $(this).next(".login").stop().animate({top: '0px'}, {queue: false, duration: 160});
        $("#admin_username").val("admin");
        $("#admin_password").val("azerazer");
        $("#etudiant_apogee").val("1002");
        $("#etudiant_password").val("azerazer");
    });

    // forget boxs
    $(".forget").animate({top: '160px'}, {queue: false, duration: 0});
    $(".forget").css("display", "none");

    $('.forget-link').click(function() {
        $(".forget").css("display", "none");
        $(".login").animate({top: '160px'}, {queue: false, duration: 100});
        $(".close").click();
        $(this).closest('div').next(".forget").css("display", "block");
        $(this).closest('div').next(".forget").stop().animate({top: '0px'}, {queue: false, duration: 160});
    });

    // close boxs
    $(".close").click(function() {
        $(this).parent().stop().animate({top: '160px'}, {queue: false, duration: 100});
        $(this).parent().parent().find("input.username").val("").removeClass("err");
        $(this).parent().parent().find("input.password").val("").removeClass("err");
        $(this).parent().parent().find("label.username").removeClass("err");
        $(this).parent().parent().find("label.password").removeClass("err");
    });

    // click CNX onEnter
    $("#blocks").keypress(function() {
        if (window.event.keyCode == 13)
            $("button#cnx").click();
    })
});


/* ============================= Fonctions Utils ============================= */
function rechercheOnEnter(e, elem)
{
    if (!e)
        var e = window.event;
    if (e.keyCode)
        code = e.keyCode;
    else if (e.which)
        code = e.which;

    if (code === 13)
        loadData(elem);
}
function testNumber(evt) {
    var theEvent = evt || window.event;
    var key_code = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key_code);
    var regex = /[0-9]/;
    if (!regex.test(key) && key_code !== 8)
    {
        theEvent.returnValue = false;
        if (theEvent.preventDefault)
            theEvent.preventDefault();
    }
}

/* ============================= Set & Get Cookies ============================= */

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

/* ============================= ################## ============================= */
