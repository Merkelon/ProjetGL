<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_controller extends CI_Controller {

    private $res = array();

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form', 'date'));
        $this->load->model("admin_model", "", TRUE);
        $this->verifier_auth();
        $this->_salt = "123456789987654321";
        $this->_nivx = array();
        $this->_nivx['1cp'] = "1ére année CP ";
        $this->_nivx['2cp'] = "2éme année CP ";
        $this->_nivx['1ci'] = "1ére année CI ";
        $this->_nivx['2ci'] = "2éme année CI ";
        $this->_nivx['3ci'] = "3éme année CI ";
        $this->res['header'] = $this->load->view("Admin/header", '', TRUE);
    }

    function index() {
        $data['etudiants'] = $this->admin_model->all_etudiants();
        $this->res['menu_v'] = "";
        $this->res['content'] = $this->load->view("Admin/accueil", $data, TRUE);
        $this->load->view("page", $this->res);
    }

    public function verifier_auth() {
        if ($this->session->userdata('logged_in') == 1) {
            switch ($this->session->userdata('type')) {
                case 'etudiant':
                    redirect('etudiant');
                case 'admin':
                    break;
            }
        }
        else
            redirect('');
    }

    // test des fonctions ajax :D
    function liste_etudiants() {
        $this->_page = $this->input->post('page'); // le numero de page
        $this->_nbr = $this->input->post('nbr'); // nombre d'elements par page
        $this->_option = $this->input->post('option'); // l'option choisi
        $this->_filiere = $this->input->post('filiere'); // la filière choisi
        $this->_motif_recherche = $this->input->post('motif_recherche'); // le motif de recherche saisi
        $this->_niveau = $this->input->post('niveau'); // le niveau choisit

        $data_filter = array(
            'page' => $this->_page,
            'nbr' => $this->_nbr,
            'option' => $this->_option,
            'filiere' => $this->_filiere,
            'motif_recherche' => $this->_motif_recherche,
            'niveau' => $this->_niveau);

        $resultat = $this->admin_model->liste_etudiants($data_filter);

        $data['etudiants'] = $resultat['query'];
        $data['page'] = $this->_page;
        $data['nbr_etu'] = $resultat['num'];
        $data['nbr_pp'] = $this->_nbr;

        $res['nbr_etu'] = $resultat['num'];
        $res['liste_etudiants'] = $this->load->view("Admin/load_data_etudiant", $data, TRUE);

        return $this->output->set_output(json_encode($res));
    }

    function liste_entreprises() {
        $this->_page = $this->input->post('page'); // le numero de page
        $this->_nbr = $this->input->post('nbr'); // nombre d'elements par page
        $this->_motif_recherche = $this->input->post('motif_recherche'); // le motif de recherche saisi
        $this->_domaine = $this->input->post('domaine'); // le domaine choisit

        $data_filter = array(
            'page' => $this->_page,
            'nbr' => $this->_nbr,
            'domaine' => $this->_domaine,
            'motif_recherche' => $this->_motif_recherche);

        $resultat = $this->admin_model->liste_entreprises($data_filter);

        $data['entreprises'] = $resultat['query'];
        $data['page'] = $this->_page;
        $data['nbr_ent'] = $resultat['num'];
        $data['nbr_pp'] = $this->_nbr;

        $res['nbr_ent'] = $resultat['num'];
        $res['liste_entreprises'] = $this->load->view("Admin/load_data_entreprise", $data, TRUE);

        return $this->output->set_output(json_encode($res));
    }

    function liste_enseignants() {
        $this->_page = $this->input->post('page'); // le numero de page
        $this->_nbr = $this->input->post('nbr'); // nombre d'element par page      
        $this->_motif_recherche = $this->input->post('motif_recherche'); // le motif choisit
        $data_filter = array(
            'page' => $this->_page,
            'nbr' => $this->_nbr,
            'motif_recherche' => $this->_motif_recherche);
        $resultat = $this->admin_model->liste_enseignants($data_filter);

        $data['enseignants'] = $resultat['query'];
        $data['page'] = $this->_page;
        $data['nbr_ens'] = $resultat['num'];
        $data['nbr_pp'] = $this->_nbr;

        $res['nbr_ens'] = $resultat['num'];
        $res['liste_enseignants'] = $this->load->view("Admin/load_data_enseignant", $data, TRUE);

        return $this->output->set_output(json_encode($res));
    }

    // admin_controller/all_XXX => admin/liste_XXXX (routes)
    function all_etudiants() {
        //rassembler les informations à envoyer à la vue liste_
        $data['options'] = $this->admin_model->all_options();
        $data['filieres'] = $this->admin_model->all_filieres();
        $data['niveaux'] = $this->admin_model->all_niveaux();
        $data['nivx'] = $this->_nivx;
        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
        $this->res['content'] = $this->load->view("Admin/liste_etudiants", $data, TRUE);
        $this->load->view("page", $this->res);
    }

    function all_entreprises() {
        $data['domaines'] = $this->admin_model->all_domaines();
        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_entreprise", "", TRUE);
        $this->res['content'] = $this->load->view("Admin/liste_entreprises", $data, TRUE);
        $this->load->view("page", $this->res);
    }

    function all_enseignants() {
        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_enseignant", "", TRUE);
        $this->res['content'] = $this->load->view("Admin/liste_enseignants", "", TRUE);
        $this->load->view("page", $this->res);
    }

    public function creer_compte($type_utilisateur = '') {
        switch ($type_utilisateur) { // creeation des compte des utilsiateurs
            case 'etudiant' :
                $this->_apogee = $this->input->post('apogee');
                $this->_password = sha1($this->_salt . $this->input->post('password'));
                $this->_nom = $this->input->post('nom');
                $this->_prenom = $this->input->post('prenom');
                $this->_cin = $this->input->post('cin');
                $this->_cne = $this->input->post('cne');
                $this->_email = $this->input->post('email');
                $this->_ann_insc = $this->input->post('ann_insc');
                $this->_niv_insc = $this->input->post('niv_insc');
                $this->_niv_act = $this->input->post('niv_act');
                $this->_option = $this->input->post('option');
                $this->_ingenieur = $this->input->post('ingenieur');
                $this->_ajax = $this->input->post('ajax');

                if ($this->form_validation->run('ajouter_etudiant') == FALSE) {
//                    $res['msg_err'] = validation_errors();
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['prenom'] = str_replace($motifs, '', form_error('prenom'));
                        $res['email'] = str_replace($motifs, '', form_error('email'));
                        $res['cin'] = str_replace($motifs, '', form_error('cin'));
                        $res['cne'] = str_replace($motifs, '', form_error('cne'));
                        $res['apogee'] = str_replace($motifs, '', form_error('apogee'));
                        $res['ann_insc'] = str_replace($motifs, '', form_error('ann_insc'));
                        $res['password'] = str_replace($motifs, '', form_error('password'));
                        $res['password_conf'] = str_replace($motifs, '', form_error('password_conf'));
                        return $this->output->set_output(json_encode($res));
                    } else {
                        $data['options'] = $this->admin_model->liste_options();
                        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
                        $this->res['content'] = $this->load->view("Admin/form_creer_etudiant", $data, TRUE);
                        $this->load->view("page", $this->res);
                    }
//                        $this->load->view('Admin/form_creer_etudiant');
//                    return $this->output->set_output(json_encode($res));
                } else {
                    $datestring = "%Y-%m-%d %H:%i:%s";
                    $time = time();
                    $madate = mdate($datestring, $time);

                    $data_compte = array(
                        'username' => $this->_apogee,
                        'password' => $this->_password,
                        'type' => 'etudiant',
                        'date_creation' => $madate);

                    $data_utilisateur = array(
                        'nom' => $this->_nom,
                        'prenom' => $this->_prenom,
                        'email' => $this->_email,
                        'apogee' => $this->_apogee,
                        'cin' => $this->_cin,
                        'annee_univ_inscription' => $this->_ann_insc,
                        'niveau_univ_inscription' => $this->_niv_insc,
                        'niveau_univ_actuel' => $this->_niv_act,
                        'id_option' => $this->_option,
                        'ingenieur' => $this->_ingenieur,
                        'cne' => $this->_cne);

                    $result = $this->admin_model->creer_compte($data_compte, $data_utilisateur, "etudiant");
                    if ($result == TRUE)
                        $data['message'] = "0";
                    else
                        $data['message'] = "-1";
                    return $this->output->set_output(json_encode($data));
//                
                }
                break;
            case 'entreprise' :
                $this->_nom = $this->input->post('nom');
                $this->_domaine = $this->input->post('domaine');
                $this->_email = $this->input->post('email');
                $this->_username = $this->input->post('username');
                $this->_tel = $this->input->post('tel');
                $this->_fax = $this->input->post('fax');
                $this->_ville = $this->input->post('ville');
                $this->_ajax = $this->input->post('ajax');
                $this->_adresse = $this->input->post('adresse');
                $this->_password = sha1($this->_salt . $this->input->post('password'));

                if ($this->form_validation->run('ajouter_entreprise') == FALSE) {
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['domaine'] = str_replace($motifs, '', form_error('domaine'));
                        $res['email'] = str_replace($motifs, '', form_error('email'));
                        $res['username'] = str_replace($motifs, '', form_error('username'));
                        $res['tel'] = str_replace($motifs, '', form_error('tel'));
                        $res['fax'] = str_replace($motifs, '', form_error('fax'));
                        $res['ville'] = str_replace($motifs, '', form_error('ville'));
                        $res['adresse'] = str_replace($motifs, '', form_error('adresse'));
                        $res['password'] = str_replace($motifs, '', form_error('password'));
                        $res['password_conf'] = str_replace($motifs, '', form_error('password_conf'));
                        return $this->output->set_output(json_encode($res));
                    } else {
                        $data['domaines'] = $this->admin_model->all_domaines();
                        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_entreprise", "", TRUE);
                        $this->res['content'] = $this->load->view("Admin/form_creer_entreprise", $data, TRUE);
                        $this->load->view("page", $this->res);
                    }
                } else {
                    $datestring = "%Y-%m-%d %H:%i:%s";
                    $time = time();
                    $madate = mdate($datestring, $time);

                    $data_compte = array(
                        'username' => $this->_username,
                        'password' => $this->_password,
                        'type' => 'entreprise',
                        'date_creation' => $madate);

                    $data_utilisateur = array(
                        'nom' => $this->_nom,
                        'domaine' => $this->_domaine,
                        'tel' => $this->_tel,
                        'fax' => $this->_fax,
                        'ville' => $this->_ville,
                        'adresse' => $this->_adresse,
                        'email' => $this->_email);

                    $result = $this->admin_model->creer_compte($data_compte, $data_utilisateur, "entreprise");
                    if ($result == TRUE)
                        $data['message'] = "0";
                    else
                        $data['message'] = "-1";
                    return $this->output->set_output(json_encode($data));
                }
                break;
            case 'enseignant' :
                $this->_nom = $this->input->post('nom');
                $this->_prenom = $this->input->post('prenom');
                $this->_tel = $this->input->post('tel');
                $this->_email = $this->input->post('email');
                $this->_ajax = $this->input->post('ajax');
                $this->_password = sha1($this->_salt . $this->input->post('password'));

                if ($this->form_validation->run('ajouter_enseignant') == FALSE) {
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['prenom'] = str_replace($motifs, '', form_error('domaine'));
                        $res['email'] = str_replace($motifs, '', form_error('email'));
                        $res['tel'] = str_replace($motifs, '', form_error('tel'));
                        $res['password'] = str_replace($motifs, '', form_error('password'));
                        $res['password_conf'] = str_replace($motifs, '', form_error('password_conf'));
                        return $this->output->set_output(json_encode($res));
                    } else {
                        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_enseignant", "", TRUE);
                        $this->res['content'] = $this->load->view("Admin/form_creer_enseignant", "", TRUE);
                        $this->load->view("page", $this->res);
                    }
                } else {
                    $datestring = "%Y-%m-%d %H:%i:%s";
                    $time = time();
                    $madate = mdate($datestring, $time);

                    $data_compte = array(
                        'username' => $this->_email,
                        'password' => $this->_password,
                        'type' => 'enseignant',
                        'date_creation' => $madate);

                    $data_utilisateur = array(
                        'nom' => $this->_nom,
                        'prenom' => $this->_prenom,
                        'tel' => $this->_tel,
                        'email' => $this->_email);

                    $result = $this->admin_model->creer_compte($data_compte, $data_utilisateur, "enseignant"); //on specifie le type de compte
                    if ($result == TRUE)
                        $data['message'] = "0";
                    else
                        $data['message'] = "-1";
                    return $this->output->set_output(json_encode($data));
                }
                break;
        }
    }

    public function get_utilisateur($type_utilisateur, $id_utilisateur) {
        $result['utilisateur'] = $this->admin_model->get_utilisateur($type_utilisateur, $id_utilisateur);
//        $result['compte_utilisateur']=$result[1];
        switch ($type_utilisateur) {
            case 'etudiant' :
                $result['options'] = $this->admin_model->all_options();
                $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
                $this->res['content'] = $this->load->view("Admin/form_modifier_etudiant", $result, TRUE);
                $this->load->view("page", $this->res);
                break;
            case 'entreprise' :
                $result['domaines'] = $this->admin_model->all_domaines();
                $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_entreprise", "", TRUE);
                $this->res['content'] = $this->load->view("Admin/form_modifier_entreprise", $result, TRUE);
                $this->load->view("page", $this->res);
                break;
            case 'enseignant' :
                $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_enseignant", "", TRUE);
                $this->res['content'] = $this->load->view("Admin/form_modifier_enseignant", $result, TRUE);
                $this->load->view("page", $this->res);
                break;
        }
    }

    public function modifier_utilisateur($type_utilisateur) {
        $this->_id = $this->input->post('id', TRUE);
        switch ($type_utilisateur) { // creeation des compte des utilsiateurs
            case 'etudiant' :
                $this->_nom = $this->input->post('nom');
                $this->_prenom = $this->input->post('prenom');
                $this->_cin = $this->input->post('cin');
                $this->_cne = $this->input->post('cne');
                $this->_email = $this->input->post('email');
                $this->_apogee = $this->input->post('apogee');
                $this->_ajax = $this->input->post('ajax');
                $this->_ann_insc = $this->input->post('ann_insc');
                $this->_niv_insc = $this->input->post('niv_insc');
                $this->_niv_act = $this->input->post('niv_act');
                $this->_option = $this->input->post('option');
                $this->_ingenieur = $this->input->post('ingenieur');
                // reste à verifier les champs à valeurs unique              

                if ($this->form_validation->run('modifier_etudiant') == FALSE) {
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['prenom'] = str_replace($motifs, '', form_error('prenom'));
                        $res['email'] = str_replace($motifs, '', form_error('email'));
                        $res['cin'] = str_replace($motifs, '', form_error('cin'));
                        $res['cne'] = str_replace($motifs, '', form_error('cne'));
                        $res['apogee'] = str_replace($motifs, '', form_error('apogee'));
                        $res['ann_insc'] = str_replace($motifs, '', form_error('ann_insc'));
                        return $this->output->set_output(json_encode($res));
                    }
                    $this->get_utilisateur('etudiant', $this->_id);
                } else {
                    $data_utilisateur = array(
                        'nom' => $this->_nom,
                        'prenom' => $this->_prenom,
                        'email' => $this->_email,
                        'apogee' => $this->_apogee,
                        'cin' => $this->_cin,
                        'cne' => $this->_cne,
                        'annee_univ_inscription' => $this->_ann_insc,
                        'niveau_univ_inscription' => $this->_niv_insc,
                        'niveau_univ_actuel' => $this->_niv_act,
                        'id_option' => $this->_option,
                        'ingenieur' => $this->_ingenieur,
                        'id' => $this->_id);
                    try {
                        $result = $this->admin_model->modifier_utilisateur($data_utilisateur, 'etudiant');
                        $data['message'] = "0";
                    } catch (Exception $ex) {
                        $data['message'] = "-1";
                        $data['error'] = $ex->getMessage();
                    }
                    return $this->output->set_output(json_encode($data));
                }
                break;
            case 'entreprise' :
                $this->_nom = $this->input->post('nom');
                $this->_id_domaine = $this->input->post('domaine');
                $this->_email = $this->input->post('email');
                $this->_tel = $this->input->post('tel');
                $this->_fax = $this->input->post('fax');
                $this->_ville = $this->input->post('ville');
                $this->_adresse = $this->input->post('adresse');
                $this->_ajax = $this->input->post('ajax');

                if ($this->form_validation->run('modifier_entreprise') == FALSE) {
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['email'] = str_replace($motifs, '', form_error('email'));
                        $res['tel'] = str_replace($motifs, '', form_error('tel'));
                        $res['fax'] = str_replace($motifs, '', form_error('fax'));
                        $res['ville'] = str_replace($motifs, '', form_error('ville'));
                        $res['adresse'] = str_replace($motifs, '', form_error('adresse'));
                        return $this->output->set_output(json_encode($res));
                    }
                    $this->get_utilisateur('entreprise', $this->_id);
                } else {
                    $data_utilisateur = array(
                        'id' => $this->_id,
                        'nom' => $this->_nom,
                        'id_domaine' => $this->_id_domaine,
                        'tel' => $this->_tel,
                        'fax' => $this->_fax,
                        'ville' => $this->_ville,
                        'adresse' => $this->_adresse,
                        'email' => $this->_email);

                    try {
                        $result = $this->admin_model->modifier_utilisateur($data_utilisateur, 'entreprise');
                        $data['message'] = "0";
                    } catch (Exception $ex) {
                        $data['message'] = "-1";
                        $data['error'] = $ex->getMessage();
                    }
                    return $this->output->set_output(json_encode($data));
                }
                break;
            case 'enseignant' :
                $this->_id = $this->input->post('id');
                $this->_nom = $this->input->post('nom');
                $this->_prenom = $this->input->post('prenom');
                $this->_tel = $this->input->post('tel');
                $this->_email = $this->input->post('email');
                $this->_ajax = $this->input->post('ajax');

                if ($this->form_validation->run('modifier_enseignant') == FALSE) {
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['prenom'] = str_replace($motifs, '', form_error('prenom'));
                        $res['email'] = str_replace($motifs, '', form_error('email'));
                        $res['tel'] = str_replace($motifs, '', form_error('tel'));
                        return $this->output->set_output(json_encode($res));
                    }
                    $this->get_utilisateur('enseignant', $this->_id);
                } else {

                    $data_utilisateur = array(
                        'id' => $this->_id,
                        'nom' => $this->_nom,
                        'prenom' => $this->_prenom,
                        'tel' => $this->_tel,
                        'email' => $this->_email);
                    try {
                        $result = $this->admin_model->modifier_utilisateur($data_utilisateur, "enseignant"); //on specifie le type de compte
                        $data['message'] = "0";
                    } catch (Exception $ex) {
                        $data['message'] = "-1";
                        $data['error'] = $ex->getMessage();
                    }
                    return $this->output->set_output(json_encode($data));
                }
                break;
        }
    }

    public function verifier_username() { // pour verifier 
        $this->db->where('username', $this->_username);
        $this->db->from('compte');
        $num = $this->db->count_all_results();
        if (!$num == 0) {
            $this->form_validation->set_message('verifier_username', 'Ce username existe déja!');
            return FALSE;
        }
        return TRUE;
    }

    function supprimer_compte() {//utilisée avec ajax
        $id_compte = $this->input->post('id_compte', TRUE);
        $result = $this->admin_model->supprimer_compte($id_compte);
        return $result;
    }

    function verifier_email($type_utilisateur) {//utilisée avec ajax
        //on le changera ares par l'appogee
        $email = $this->input->post('email', TRUE);
        $result = $this->admin_model->verifier_email($email, $type_utilisateur);
        return $result;
    }

    function liste_demandes_stage() {
        $this->res['menu_v'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
        $this->res['content'] = $this->load->view("Admin/liste_demandes_stage", $data, TRUE);
        $this->load->view("page", $this->res);
    }

}