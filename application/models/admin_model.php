<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function creer_compte($data_compte, $data_utilisateur, $type_compte) {
        if ($this->db->insert('compte', $data_compte)) {
            $id_compte = $this->db->insert_id();
            $data_utilisateur['id_compte'] = $id_compte;
            if ($this->db->insert($type_compte, $data_utilisateur))
                return TRUE;
        }
        return FALSE;
    }

    function all_niveaux() {
        $this->db->distinct();
        $this->db->select("niveau_univ_actuel");
        $query = $this->db->get('etudiant')->result();
        return $query;
    }

    function all_options() {
        $query = $this->db->get('option_filiere')->result(); // select * from etudiant
        return $query;
    }
    
    function all_filieres() {
        $query = $this->db->get('filiere')->result(); // select * from etudiant
        return $query;
    }

    function liste_etudiants($data_filter) {
        if ($data_filter["niveau"] === "-1") {
            $data_filter["niveau"] = "";
        }
        if($data_filter["option"] === "-1") {
            $data_filter["option"] = "";
        }
        if($data_filter["filiere"] === "-1") {
            $data_filter["filiere"] = "";
        }
        
        
        /* Pour la requete d'affichage des enregistrements */
        $niveau          = $data_filter["niveau"];
        $option          = $data_filter["option"];
        $filiere         = $data_filter["filiere"];
        $motif_recherche = $data_filter["motif_recherche"];
        $cur_page        = $data_filter["page"];
        $page = $cur_page--;
        $per_page        = $data_filter["nbr"];
        $start = $cur_page * $per_page;     
        
        $adn_query="(
            e.nom like '%$motif_recherche%'  
            OR e.prenom like '%$motif_recherche%'
            OR e.cne like '%$motif_recherche%'
            OR e.apogee like '%$motif_recherche%'
            )";
        $num = $this->db->select("*, e.id as id_etudiant")
                ->from("etudiant e")
                ->join('option_filiere o', 'o.id = e.id_option')
                ->join('filiere f', 'f.id = o.id_filiere')
                ->like("e.id_option",$option)
                ->like("e.niveau_univ_actuel",$niveau)
                ->like("o.id_filiere",$filiere)
                ->where($adn_query, NULL, FALSE)
                ->get()
                ->num_rows();  
          
        $result = $this->db->select("*, e.id as id_etudiant")
                ->from("etudiant e")
                ->join('option_filiere o', 'o.id = e.id_option')
                ->join('filiere f', 'f.id = o.id_filiere')
                ->like("e.id_option",$option)
                ->like("e.niveau_univ_actuel",$niveau)
                ->like("o.id_filiere",$filiere)
                ->where($adn_query, NULL, FALSE)             
                ->limit($per_page,$start)
                ->get()
                ->result();                    
        $data['query'] = $result;
        $data['num'] = $num;                         
        return $data;
    }
    
    function liste_enseignants($data_filter) {
        /* Pour la requete d'affichage des enregistrements */
        $motif_recherche = $data_filter["motif_recherche"];
        $cur_page        = $data_filter["page"];
        $page = $cur_page--;
        $per_page        = $data_filter["nbr"];
        $start = $cur_page * $per_page;     
        
        $adn_query="
            (
            e.nom like '%$motif_recherche%'  
            OR 
            e.prenom like '%$motif_recherche%'
            )";
        $num = $this->db->select("*")
                ->from("enseignant e")
                ->where($adn_query, NULL, FALSE)
                ->get()
                ->num_rows();  
          
        $result = $this->db->select("*")
                ->from("enseignant e")
                ->where($adn_query, NULL, FALSE)             
                ->limit($per_page,$start)
                ->get()
                ->result();                    
        $data['query'] = $result;
        $data['num'] = $num;                         
        return $data;
    }

    function all_etudiants() {
        $query = $this->db->get('etudiant')->result(); // select * from etudiant
        return $query;
    }

    function all_entreprises() {
        $query = $this->db->get('entreprise')->result(); // select * from etudiant
        return $query;
    }

    function all_enseignants() {
        $query = $this->db->get('enseignant')->result(); // select * from etudiant
        return $query;
    }

    function get_utilisateur($type_utilisateur, $id_utilisateur) {
        switch ($type_utilisateur) {
            case 'etudiant' :
                $msg_error = "Etudiant inexistant";
                $result = $this->db->get_where('etudiant', array('id' => $id_utilisateur))->result();
                if ($result) {
                    return $result[0];
                } else {
                    return $msg_error;
                }
                break;

            case 'enseignant' :
                $msg_error = "Enseignant inexistant";
                $result = $this->db->get_where('enseignant', array('id' => $id_utilisateur))->result();
                if ($result) {
                    return $result[0];
                } else {
                    return $msg_error;
                }
                break;

            case 'entreprise' :
                $msg_error = "Entreprise inexistant";
                $result = $this->db->get_where('entreprise', array('id' => $id_utilisateur))->result();
                if ($result) {
                    return $result[0];
                } else {
                    return $msg_error;
                }
                break;
        }
    }

    function modifier_utilisateur($data_utilisateur, $type_utilisateur) {

        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;
        $this->db->where('id', $data_utilisateur['id']);
        $result = $this->db->update($type_utilisateur, $data_utilisateur);
        if (!$result) {
            throw new Exception($this->db->_error_message());
        }
        $this->db->db_debug = $db_debug;
        return $result;
    }

    function supprimer_compte($id_compte) {
        $res = $this->db->delete('compte', array('id' => $id_compte));
        $res['result'] = "ok";
        return $this->output->set_output(json_encode($res));
        // return $this->output->set_output->(json_encode($res));
    }

    function verifier_email($email, $type_utilisateur) {
        $this->db->where('email', $email);
        $this->db->from($type_utilisateur);
        $num = $this->db->count_all_results();
        if (!$num == 0) {
            $res['msg_res'] = "Doit avoir une valeur unique";
        }
        else
            $res['msg_res'] = "Email valide";
        return $this->output->set_output(json_encode($res));
    }

    function liste_demandes_stage() {
        //       $query = $this->db->get('demande_stage')->result(); // select * from etudiant
        $this->db->select('etudiant.apogee,etudiant.nom,etudiant.prenom,entreprise.nom as nom_entreprise,d.date_demande,d.date_reponse,d.validation_entreprise,d.validation_etudiant');
        $this->db->from('demande_stage d', 'etudiant e', 'entreprise en');
        $this->db->join('etudiant', 'etudiant.id = d.id_etudiant');
        $this->db->join('entreprise', 'entreprise.id = d.id_entreprise');
        $query = $this->db->get()->result();


        return $query;
    }

    function liste_options() {
        $query = $this->db->get('option_filiere')->result(); // select * from etudiant
        return $query;
    }

// 
}