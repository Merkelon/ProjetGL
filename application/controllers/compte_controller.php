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
        $this->_username = $this->input->post('username');
        $this->_password = sha1($this->_salt . $this->input->post('password'));

        if ($this->form_validation->run("connexion") == FALSE) {
            // "-2" form non valide
            $motifs = array("</p>", "<p>");
            $res['username'] = str_replace($motifs, '', form_error('username'));
            $res['password'] = str_replace($motifs, '', form_error('password'));
            $res['msg'] = "-2";
            return $this->output->set_output(json_encode($res));
        } else {
            $data_compte = array(
                'username' => $this->_username,
                'password' => $this->_password
            );

            $result = $this->compte_model->connexion($data_compte);

            if ($result != FALSE) {
                // "1" données valides
                $res['msg'] = "1";
                $res['type_utilisateur'] = $result;
                return $this->output->set_output(json_encode($res));
            } else {
                // "-1" données non valides
                $res['msg'] = "-1";
                return $this->output->set_output(json_encode($res));
            }
        }
    }

    function verifier_password() {
        $this->db->like('username', $this->_username);
        $this->db->like('password', $this->_password);
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
        redirect(base_url());
    }
}
