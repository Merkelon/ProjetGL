<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$nom_modif      = array('field' => 'nom','label' => 'Le nom','rules' => 'required|xss_clean|alpha');
$nom            = array('field' => 'nom','label' => 'Le nom','rules' => 'required|xss_clean|alpha|is_unique[entreprise.nom]');
$prenom         = array('field' => 'prenom','label' => 'Le prenom','rules' => 'required|xss_clean|alpha');
$apogee_modif   = array('field' => 'apogee','label' => 'L\'apogee','rules' => 'required|xss_clean|numeric');
$apogee         = array('field' => 'apogee','label' => 'L\'apogee','rules' => 'required|xss_clean|numeric|is_unique[etudiant.apogee]');
$email_etudiant = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean|is_unique[etudiant.email]');
$email_entreprise = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean|is_unique[entreprise.email]');
$email_enseignant = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean|is_unique[enseignant.email]');
$email_etudiant_modif = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean');
$email_entreprise_modif = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean');
$email_enseignant_modif = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean');
$domaine        = array('field' => 'domaine','label' => 'Le domaine','rules' => 'required|xss_clean|alpha');
$ann_insc       = array('field' => 'domaine','label' => 'Le domaine','rules' => 'required|xss_clean|numeric|exact_length[4]');
$niv_insc       = array('field' => 'domaine','label' => 'Le domaine','rules' => 'required|xss_clean|alpha');
$niv_act        = array('field' => 'domaine','label' => 'Le domaine','rules' => 'required|xss_clean|alpha');
$option         = array('field' => 'domaine','label' => 'Le domaine','rules' => 'required|xss_clean');
$ingenieur      = array('field' => 'domaine','label' => 'Le domaine','rules' => 'xss_clean|numeric');
$tel            = array('field' => 'tel','label' => 'Le téléphone','rules' => 'xss_clean|numeric');
$fax            = array('field' => 'fax','label' => 'Le fax','rules' => 'xss_clean|numeric');
$ville          = array('field' => 'ville','label' => 'La ville','rules' => 'xss_clean|alpha');
$adresse        = array('field' => 'adresse','label' => 'L\'adresse','rules' => 'xss_clean');
$cin            = array('field' => 'cin','label' => 'Cin','rules' => 'required|xss_clean|is_unique[etudiant.cin]');
$cne            = array('field' => 'cne','label' => 'Cne','rules' => 'required|numeric|xss_clean|is_unique[etudiant.cne]');
$cin_modif      = array('field' => 'cin','label' => 'Cin','rules' => 'required|xss_clean');
$cne_modif      = array('field' => 'cne','label' => 'Cne','rules' => 'required|numeric|xss_clean');
$username       = array('field' => 'username','label' => 'Le username','rules' => 'xss_clean|required|callback_verifier_username|is_unique[compte.username]');
$username_modif = array('field' => 'username','label' => 'Le username','rules' => 'xss_clean|required|callback_verifier_username');
$password       = array('field' => 'password','label' => 'le mot de passe','rules' => 'xss_clean|required|min_length[4]|max_length[12]'); 
$password_conf  = array('field' => 'password_conf','label' => 'La confirmation','rules' => 'xss_clean|required|matches[password]');
      
$config = array(
     'ajouter_etudiant'     => array($nom,$prenom,$apogee,$email_etudiant,$cin,$cne,$ann_insc,$niv_act,$niv_insc,$option,$ingenieur,$password,$password_conf),
     'modifier_etudiant'    => array($nom,$prenom,$apogee_modif,$email_etudiant_modif,$cin_modif,$cne_modif,$ann_insc,$niv_act,$niv_insc,$option,$ingenieur),
     'ajouter_entreprise'   => array($nom,$domaine,$email_entreprise,$tel,$fax,$ville,$username,$adresse,$password,$password_conf),
     'modifier_entreprise'  => array($nom_modif,$domaine,$email_entreprise_modif,$tel,$fax,$ville,$adresse),
     'ajouter_enseignant'   => array($nom,$prenom,$email_enseignant,$tel,$password,$password_conf),
     'modifier_enseignant'  => array($nom,$prenom,$email_enseignant_modif,$tel),
     'connexion'            => array($username_modif,$password)
        )       
?>
