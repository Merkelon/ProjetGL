<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etudiant_model extends CI_Model{


function __construct(){
	parent::__construct();
}

function all(){
	$query = $this->db->get('etudiant')->result();// select * from etudiant
	return $query;
}

function ajouter($data){
	$msg_error = "CIN déja existant à 3azzy";
	$this->db->where('cin', $data['cin']);
	$this->db->from('etudiant');
	$num = $this->db->count_all_results();
	if($num == 0){
		$query = $this->db->insert('etudiant', $data); 
		return $query;
	}
	else{
		return $msg_error;
	}
	
}
function afficher($id_etudiant){
	$msg_error = "Etudiant inexistant";
	$result = $this->db->get_where('etudiant', array('id' => $id_etudiant))->result();
	if($result){
		return $result[0];
	}
	else{
		return $msg_error;
	}
}
function modifier($data){
	$msg_error = "CIN déja existant à 3azzy";
	$this->db->where('cin', $data['cin']);//à modifier selon la clé primaire de la table
	$this->db->from('etudiant');
	$num = $this->db->count_all_results();
	if($num == 0){	
		$this->db->where('id', $data['id']);
		$result = $this->db->update('etudiant', $data);
		return $result;
	}
	else{
		return $msg_error;
	}
}
function supprimer($id_etudiant){
	$res = $this->db->delete('etudiant', array('id' => $id_etudiant)); 
	$res['result'] = "ok";
	return $this->output->set_output(json_encode($res));
	// return $this->output->set_output->(json_encode($res));
}

}