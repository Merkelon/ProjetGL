<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compte_model extends CI_Model{
    
    function __construct(){
	parent::__construct();
        $this->load->library('session');
    }
    
    public function connexion(){
         $resultat = $this->db->select('id')
                 ->where('username', $this->input->post('username'))
                 ->get('compte')
                 ->row();//recuperer l'id de l'utilisateur
         $update_data = array('logged_in' => 1 );       
         $this->db->update('compte', $update_data);// 
         $data = array(
            'id' => $resultat->id,
            'username' => $this->input->post('username'),
            'logged_in' => 1
            );
      
        $this->session->set_userdata($data);
    }

    public function verifier_auth(){

    if($this->session->userdata('logged_in') == 1){ return TRUE; } return FALSE; 
    
    }
    public function deconnexion(){    
        $update_data = array('logged_in' => '0' );    
        $this->db->where('id',$this->session->userdata('id'));   
        $this->db->update('compte', $update_data);
        $this->session->sess_destroy();
       
    }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
}