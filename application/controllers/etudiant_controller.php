<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etudiant_controller extends CI_Controller {
	public $chemin = 'Etudiant';
	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
         function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation', 'session'));
            $this->load->helper(array('url', 'form'));
            $this->load->model('etudiant_model','etudiant',TRUE);
         
        }
	public function index(){
            $data['etudiants']=$this->etudiant->all();
            $this->load->view("Etudiant/afficher",$data);
        }
	function afficher($id_etudiant){
            $result['etudiant'] = $this->etudiant->afficher($id_etudiant);
            $this->load->view("Etudiant/form_modifier",$result);	
	}
	function modifier(){
            $this->form_validation->set_rules('nom', 'Votre Nom', 'required|xss_clean');
            $this->form_validation->set_rules('prenom', 'Votre Prenom', 'required');
            $this->form_validation->set_rules('cin', 'CIN', 'required');
            $this->form_validation->set_rules('cne', 'CNE', 'required|numeric');	
            if ($this->form_validation->run() == FALSE)
            {	
                // $this->load->view("$this->chemin/form_modifier");
                $id = $this->input->post('id',TRUE);
                $this->afficher($id);
            }
            else{
            //traitement de la modification d'un etudiant
                $nom = $this->input->post('nom',TRUE);
                $prenom = $this->input->post('prenom',TRUE);
                $cin = $this->input->post('cin',TRUE);
                $cne = $this->input->post('cne',TRUE);
                $id = $this->input->post('id',TRUE);
                $data = array(
                    'nom' => $nom ,
                    'prenom' => $prenom ,
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
	function supprimer(){
            $id = $this->input->post('id_etudiant',TRUE);
            $result = $this->etudiant->supprimer($id);
            return $result;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */