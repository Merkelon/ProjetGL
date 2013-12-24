<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compte_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('compte_model', '', TRUE);
        $this->_salt = "123456789987654321";
    }

    function index() {
        if ($this->compte_model->verifier_auth() === TRUE) {
            $data['message'] = "You are logged in! Now go take a look at the ";
            $this->load->view('Compte/success', $data);
        } else {
            $this->load->view("Compte/details");
        }
    }

    function connexion() {  //fonction qui permet la  validation la connexion  
//        header("Cache-Control: private, must-revalidate, max-age=0");
//        header("Pragma: no-cache"); probleme du bouton "retour à la page precedente"
        if ($this->compte_model->verifier_auth() === TRUE) {
            $data['message'] = "You are logged in! Now go take a look at the ";
            $this->load->view('Compte/success', $data);
        } else {
            $this->_username = $this->input->post('username');
            $this->_password = sha1($this->_salt . $this->input->post('password'));
            $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|min_length[4]')
                    ->set_message("required", "le champ Username est obligatoire")
                    ->set_message("min_length", "Minimum 4 lettres");
            $this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[4]|max_length[12]|callback_verifier_password');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('Compte/form_connexion');
            } else {
                $this->compte_model->connexion();
                $data['message'] = "You are logged in! Now go take a look at the ";
                $this->load->view('Compte/success', $data);
            }
        }
    }

    function verifier_password() {
        $this->db->where('username', $this->_username);
        $this->db->where('password', $this->_password);
        $this->db->from('compte');
        $num = $this->db->count_all_results();
        if ($num == 0) {
            $this->form_validation->set_message('verifier_password', 'La combinaison Username/Password est incorrect!');
            return FALSE;
        }
        return TRUE;
    }

    function deconnexion() {
        $this->compte_model->deconnexion();

        $this->index();
    }

}
