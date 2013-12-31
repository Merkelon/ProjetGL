<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compte_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function connexion($data_compte) {
        $count = $this->db->select("id, type")
                ->from('compte')
                ->where('username', $data_compte['username'])
                ->where('password', $data_compte['password'])
                ->get()
                ->num_rows();
        
        if ($count > 0) {
            $resultat = $this->db->select('id, type')
                    ->where('username', $this->input->post('username'))
                    ->get('compte')
                    ->row();
            
            $update_data = array('logged_in' => 1);
            $this->db->where('id', $resultat->id)
                     ->update('compte', $update_data);
            
            $data = array(
                'id' => $resultat->id,
                'type' => $resultat->type,
                'username' => $this->input->post('username'),
                'logged_in' => 1
            );
            
            $this->session->set_userdata($data);
            
            return $resultat->type;
        }
        else
            return FALSE;
    }

    public function deconnexion() {
        $update_data = array('logged_in' => '0');
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('compte', $update_data);
        $this->session->sess_destroy();
    }
}