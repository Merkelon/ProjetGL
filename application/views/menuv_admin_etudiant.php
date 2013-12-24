<div id="menu_v">
    <h2>Gestion des etudiants</h2>
    <ul>
        <?php echo anchor('admin/ajouter_utilisateur/etudiant', '<li class="_nouveau">Ajouter un nouvel etudiant</li>'); ?>
        <?php echo anchor('admin/liste_etudiants', '<li class="_liste">Liste des etudiants</li>'); ?>    
        <?php echo anchor('admin/liste_etudiants', '<li class="_liste">Liste des rapports</li>'); ?>    
        <?php echo anchor('admin/liste_etudiants', '<li class="_liste">Validation des stages</li>'); ?>    
    </ul>

</div>