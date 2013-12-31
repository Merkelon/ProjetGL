<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Etudiant_controller extends CI_Controller {
    
    private $res = array();

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form')); // , 'date'
        $this->load->model("etudiant_model", "", TRUE);
        $this->verifier_auth();
        $this->res['header'] = $this->load->view("Etudiant/header", '', TRUE);
    }

    public function index() {
        
        $data['etudiants'] = $this->etudiant_model->all();
        $this->res['menu_v'] = $this->load->view("Etudiant/menuv_etudiant", '', TRUE);
        $this->res['content'] = $this->load->view("Etudiant/accueil", $data, TRUE);
        $this->load->view("page", $this->res);
    }
    
    public function verifier_auth() {
        if ($this->session->userdata('logged_in') == 1) {
            switch ($this->session->userdata('type')) {
                case 'etudiant':
                    break;
                case 'admin':
                    redirect('admin');
            }
        }
        else
            redirect('');
    }
    
    // ####################################################################################

    function afficher($id_etudiant) {
        $result['etudiant'] = $this->etudiant->afficher($id_etudiant);
        $this->load->view("Etudiant/form_modifier", $result);
    }

    function modifier() {
        $this->form_validation->set_rules('nom', 'Votre Nom', 'required|xss_clean');
        $this->form_validation->set_rules('prenom', 'Votre Prenom', 'required');
        $this->form_validation->set_rules('cin', 'CIN', 'required');
        $this->form_validation->set_rules('cne', 'CNE', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            // $this->load->view("$this->chemin/form_modifier");
            $id = $this->input->post('id', TRUE);
            $this->afficher($id);
        } else {
            //traitement de la modification d'un etudiant
            $nom = $this->input->post('nom', TRUE);
            $prenom = $this->input->post('prenom', TRUE);
            $cin = $this->input->post('cin', TRUE);
            $cne = $this->input->post('cne', TRUE);
            $id = $this->input->post('id', TRUE);
            $data = array(
                'nom' => $nom,
                'prenom' => $prenom,
                'cin' => $cin,
                'cne' => $cne,
                'id' => $id
            );

            $succes = $this->etudiant->modifier($data);
            echo $succes;
            // $result = array('succes'=>$succes);			
            //$this->redirect(site_url("Etudiant_controller"));
        }
    }

    function supprimer() {
        $id = $this->input->post('id_etudiant', TRUE);
        $result = $this->etudiant->supprimer($id);
        return $result;
    }

}