<div id="content" style="vertical-align: middle;" align="center">
    <br />
    <div class="indexLigneDIV">
        <div class="indexLigne curve">
            <h1>Gestion des <span>étudiants</span></h1>
            <?php
            echo anchor('admin/ajouter_utilisateur/etudiant', '<div class="indexBloc">
                                                                    <img src="'.base_url().'assets/img/add__.png" />
                                                                    <span>Ajouter un étudiant</span>
                                                                </div>');
            
            echo anchor('admin/liste_etudiants', '<div class="indexBloc">
                                                            <img src="'.base_url().'assets/img/liste__.png" />
                                                            <span>Liste des étudiants</span>
                                                        </div>');
            ?>
        </div>
        <div class="indexLigne curve">
            <h1>Gestion des <span>entreprises</span></h1>
            <?php
            echo anchor('admin/ajouter_utilisateur/entreprise', '<div class="indexBloc">
                                                                    <img src="'.base_url().'assets/img/add__.png" />
                                                                    <span>Ajouter une entreprise</span>
                                                                </div>');
            
            echo anchor('admin/liste_entreprises', '<div class="indexBloc">
                                                        <img src="'.base_url().'assets/img/liste__.png" />
                                                        <span>Liste des entreprises</span>
                                                    </div>');
            ?>
        </div>
        <div class="indexLigne curve">
            <h1>Gestion des <span>enseignants</span></h1>
            <?php
            echo anchor('admin/ajouter_utilisateur/enseignant', '<div class="indexBloc">
                                                                    <img src="'.base_url().'assets/img/add__.png" />
                                                                    <span>Ajouter un enseignant</span>
                                                                </div>');
            
            echo anchor('admin/liste_enseignants', '<div class="indexBloc">
                                                        <img src="'.base_url().'assets/img/liste__.png" />
                                                        <span>Liste des enseignants</span>
                                                    </div>');
            ?>			
        </div>
        <br />
        <br />
        <div class="indexLigne curve2" style="width:609px;">
            <h1>Titre <span>Block</span></h1>
            <br />
            <br />
            <br />
            <br />
        </div>
        <div class="indexLigne curve">
            <h1>Titre <span>Block</span></h1>
            <br />
            <br />
            <br />
            <br />
        </div>
        <br />
    </div>
</div>