<div id="content">   

<!-- h4>Rechercher un utilisateur </h4><input type="text" class="recherche"  / -->
    <br />
    <h1>Liste des <span>Etudiants</span></h1>
    <br />
    <table class="liste_tab">
        <tr>
            <th>Apogee etudiant</th>
            <th>Etudiant(Nom et Prenom)</th>
            <th>Entreprise</th>
            <th>Date demande</th>
            <th>Date reponse</th>       
            <th>Validation entreprise</th>
            <th>Validation etudiant</th>
            <th></th>
        </tr>
        <?php foreach ($demandes as $demande) { ?>

            <tr>
                <td><?php echo $demande->apogee ?> </td>
                <td><?php echo $demande->nom." ".$demande->prenom ?> </td>
                <td><?php echo $demande->nom_entreprise ?> </td>
                <td><?php echo $demande->date_demande ?> </td>
                <td><?php echo $demande->date_reponse ?> </td>
                <td><?php echo $demande->validation_entreprise ?> </td>
                <td><?php echo $demande->validation_etudiant ?> </td>
                <td>

                    <a href="<?php echo base_url(); ?>admin/modifier_utilisateur/etudiant/<?php  ?>"><img title="Modifier" src="<?php echo base_url(); ?>assets/img/modify.png" /> </a> 
                    <a class="supprimer" id="<?php  ?>" href="#"><img title="Supprimer" class="supprimer" src="<?php echo base_url(); ?>assets/img/delete.png" /> </a> 
                </td>
            </tr>
        <?php } ?>
    </table>

</div>