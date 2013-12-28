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
        $this->verifier_auth();
    }

    public function verifier_auth() {

        if ($this->session->userdata('logged_in') == 1) {
            switch ($this->session->userdata('type')) {
                case 'etudiant':
                    break;
                case 'admin':
                    redirect('admin');
                    break;
            }
        }
        else
            $this->load->view('Compte/index');
    }

    function connexion() {

        $this->verifier_auth();
        
        $this->_username = $this->input->post('username');
        $this->_password = sha1($this->_salt . $this->input->post('password'));

        if ($this->form_validation->run("connexion") == FALSE) {
            $this->load->view('Compte/index');
        } 
        else {
            $type_compte = $this->compte_model->connexion();
            switch ($type_compte){
                 case 'etudiant':
                    break;
                case 'admin':
                    redirect('admin');
                    break;
            }
            $this->load->view('Compte/success', $data);
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
