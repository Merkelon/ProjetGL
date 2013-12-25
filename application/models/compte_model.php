<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compte_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function connexion() {
        $resultat = $this->db->select('id, type')
                ->where('username', $this->input->post('username'))
                ->get('compte')
                ->row(); //recuperer l'id de l'utilisateur
        $update_data = array('logged_in' => 1);
        $this->db->where('id',$resultat->id);
        $this->db->update('compte', $update_data); // 
        $data = array(
            'id' => $resultat->id,
            'type' => $resultat->type,
            'username' => $this->input->post('username'),
            'logged_in' => 1
        );

        $this->session->set_userdata($data);
        return $resultat->type;
    }

    public function deconnexion() {
        $update_data = array('logged_in' => '0');
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('compte', $update_data);
        $this->session->sess_destroy();
    }

    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */
}