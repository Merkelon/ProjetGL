<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_controller extends CI_Controller {
    /****/
    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form', 'date'));
        $this->load->model("admin_model", "", TRUE);
        $this->_salt = "123456789987654321";
    }

    function index() {
        $data['etudiants'] = $this->admin_model->all_etudiants();
        $res['menuv_admin'] = "";
        $res['content'] = $this->load->view("Admin/accueil", $data, TRUE);
        $this->load->view("page", $res);
    }

    function all_etudiants() {
        $data['etudiants'] = $this->admin_model->all_etudiants();
        $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
        $res['content'] = $this->load->view("Admin/liste_etudiants", $data, TRUE);
        $this->load->view("page", $res);
    }

    function all_entreprises() {
        $data['entreprises'] = $this->admin_model->all_entreprises();
        $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_entreprise", "", TRUE);
        $res['content'] = $this->load->view("Admin/liste_entreprises", $data, TRUE);
        $this->load->view("page", $res);
    }

    function all_enseignants() {
        $data['enseignants'] = $this->admin_model->all_enseignants();
        $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_enseignant", "", TRUE);
        $res['content'] = $this->load->view("Admin/liste_enseignants", $data, TRUE);
        $this->load->view("page", $res);
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
                        $res['password'] = str_replace($motifs, '', form_error('password'));
                        $res['password_conf'] = str_replace($motifs, '', form_error('password_conf'));
                        return $this->output->set_output(json_encode($res));
                    } else {
                        $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
                        $res['content'] = $this->load->view("Admin/form_creer_etudiant", "", TRUE);
                        $this->load->view("page", $res);
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
                    }
                    else
                        $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_entreprise", "", TRUE);
                    $res['content'] = $this->load->view("Admin/form_creer_entreprise", "", TRUE);
                    $this->load->view("page", $res);
                }
                else {
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
                    }
                    $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_enseignant", "", TRUE);
                    $res['content'] = $this->load->view("Admin/form_creer_enseignant", "", TRUE);
                    $this->load->view("page", $res);
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
                $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
                $res['content'] = $this->load->view("Admin/form_modifier_etudiant", $result, TRUE);
                $this->load->view("page", $res);
                break;
            case 'entreprise' :
                $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_entreprise", "", TRUE);
                $res['content'] = $this->load->view("Admin/form_modifier_entreprise", $result, TRUE);
                $this->load->view("page", $res);
                break;
            case 'enseignant' :
                $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_enseignant", "", TRUE);
                $res['content'] = $this->load->view("Admin/form_modifier_enseignant", $result, TRUE);
                $this->load->view("page", $res);
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
                        'id' => $this->_id);

                    $result = $this->admin_model->modifier_utilisateur($data_utilisateur, 'etudiant');
                    if ($result == TRUE)
                        $data['message'] = "0";
                    else
                        $data['message'] = "-1";
                    return $this->output->set_output(json_encode($data));
                    ;
                }
                break;
            case 'entreprise' :
                $this->_nom = $this->input->post('nom');
                $this->_domaine = $this->input->post('domaine');
                $this->_email = $this->input->post('email');
                $this->_tel = $this->input->post('tel');
                $this->_fax = $this->input->post('fax');
                $this->_ville = $this->input->post('ville');
                $this->_adresse = $this->input->post('adresse');


                if ($this->form_validation->run('modifier_entreprise') == FALSE) {
                    if ($this->_ajax == "ok") {
                        $motifs = array("</p>", "<p>");
                        $res['nom'] = str_replace($motifs, '', form_error('nom'));
                        $res['domaine'] = str_replace($motifs, '', form_error('domaine'));
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
                        'domaine' => $this->_domaine,
                        'tel' => $this->_tel,
                        'fax' => $this->_fax,
                        'ville' => $this->_ville,
                        'adresse' => $this->_adresse,
                        'email' => $this->_email);

                    $result = $this->admin_model->modifier_utilisateur($data_utilisateur, "entreprise");
                    if ($result == TRUE)
                        $data['message'] = "0";
                    else
                        $data['message'] = "-1";
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

                    $result = $this->admin_model->modifier_utilisateur($data_utilisateur, "enseignant"); //on specifie le type de compte
                    if ($result == TRUE)
                        $data['message'] = "0";
                    else
                        $data['message'] = "-1";
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
        $data['demandes'] = $this->admin_model->liste_demandes_stage();
        $res['menuv_admin'] = $this->load->view("Admin/menuv_admin_etudiant", "", TRUE);
        $res['content'] = $this->load->view("Admin/liste_demandes_stage", $data, TRUE);
        $this->load->view("page", $res);
    }

}