<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$nom            = array('field' => 'nom','label' => 'Le nom','rules' => 'required|xss_clean|alpha');
$prenom         = array('field' => 'prenom','label' => 'Le prenom','rules' => 'required|xss_clean|alpha');
$apogee         = array('field' => 'apogee','label' => 'L\'apogee','rules' => 'required|xss_clean|numeric|is_unique[etudiant.apogee]');
$email_etudiant = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean|is_unique[etudiant.email]');
$email_entreprise = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean|is_unique[entreprise.email]');
$email_enseignant = array('field' => 'email','label' => 'L\'email','rules' => 'required|valid_email|xss_clean|is_unique[enseignant.email]');
$domaine        = array('field' => 'domaine','label' => 'Le domaine','rules' => 'required|xss_clean|alpha');
$tel            = array('field' => 'tel','label' => 'Le téléphone','rules' => 'xss_clean|numeric');
$fax            = array('field' => 'fax','label' => 'Le fax','rules' => 'xss_clean|numeric');
$ville          = array('field' => 'ville','label' => 'La ville','rules' => 'xss_clean|alpha');
$adresse        = array('field' => 'adresse','label' => 'L\'adresse','rules' => 'xss_clean');
$cin            = array('field' => 'cin','label' => 'Cin','rules' => 'required|xss_clean|is_unique[etudiant.cin]');
$cne            = array('field' => 'cne','label' => 'Cne','rules' => 'required|numeric|xss_clean|is_unique[etudiant.cne]');
$username       = array('field' => 'username','label' => 'Le username','rules' => 'xss_clean|required|callback_verifier_username|is_unique[compte.username]');
$password       = array('field' => 'password','label' => 'le mot de passe','rules' => 'xss_clean|required|min_length[4]|max_length[12]');
$password_conf  = array('field' => 'password_conf','label' => 'La confirmation','rules' => 'xss_clean|required|matches[password]');
      
$config = array(
     'ajouter_etudiant'     => array($nom,$prenom,$apogee,$email_etudiant,$cin,$cne,$password,$password_conf),
     'modifier_etudiant'    => array($nom,$prenom,$apogee,$email_etudiant,$cin,$cne),
     'ajouter_entreprise'   => array($nom,$domaine,$email_entreprise,$tel,$fax,$ville,$username,$adresse,$password,$password_conf),
     'modifier_entreprise'  => array($nom,$domaine,$email_entreprise,$tel,$fax,$ville,$adresse),
     'ajouter_enseignant'   => array($nom,$prenom,$email_enseignant,$tel,$password,$password_conf),
     'modifier_enseignant'  => array($nom,$prenom,$email_enseignant,$tel)
        )       
?>
