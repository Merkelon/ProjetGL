<header>
    <div id="header_top">
        <div id="logo">
            <a href="Accueil"><img src="<?php echo base_url(); ?>assets/img/logoo.jpg" style="height:70px"/></a>
        </div>
        <div id="header_top_right">
            <div id="info_user">
                <img src="<?php echo base_url(); ?>assets/img/admin.png" />
                <h4>Administrateur</h4>
                <br />
                <br />
                <a href="#">Modifier Compte</a> | <a href="#">Se déconnecter</a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div id="header_bottom">
        <div id="menu_h">
            <ul>
                <?php echo anchor('admin', '<li class="_home"></li>'); ?>
                <li class="separateur">&nbsp;</li>
                <?php echo anchor('admin/liste_etudiants', '<li class="_4">Etudiants</li>'); ?>
                <li class="separateur">&nbsp;</li>
                <?php echo anchor('admin/liste_entreprises', '<li class="_1">Entreprises</li>'); ?>
                <li class="separateur">&nbsp;</li>
                <?php echo anchor('admin/liste_enseignants', '<li class="_4">Enseignants</li>'); ?>
                <li class="separateur">&nbsp;</li>
                <?php echo anchor('admin/demandes_stage', '<li class="_3">Stages</li>'); ?>
                <li class="separateur">&nbsp;</li>
                <?php echo anchor('admin/liste_rapports', '<li class="_3">Rapports</li>'); ?>
                <li class="separateur">&nbsp;</li>
            </ul>
        </div>
        <div id="menu_h_right">
            <div class="separateur">&nbsp;</div>
            <a href="#" class="_alerte"><span class="nbr nbr_alerte">0</span></a>
            <div class="separateur">&nbsp;</div>
            <a href="#" class="_commande_time"><span class="nbr nbr_cmd">0</span></a>
            <div class="separateur">&nbsp;</div>
            <a href="#" class="_message"><span class="nbr nbr_message">0</span></a>
            <div class="separateur">&nbsp;</div>
        </div>
        <!--<div id="menu_h_right">
                <ul>
                        <li class="separateur">&nbsp;</li>
                        <a href="liste-article-alerte.html" title="Articles en alerte !"><li class="_alerte"><span class="nbr_alerte">0</span></li></a>
                        <li class="separateur">&nbsp;</li>
                </ul>
        </div>-->
        <div id="header_bottom_right">
        </div>
        <div class="clear"></div>
    </div>
</header>
<div class="clear"></div>