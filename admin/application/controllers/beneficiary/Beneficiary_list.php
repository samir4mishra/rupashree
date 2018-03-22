<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiary_list extends NIC_Controller {
	public function __construct(){
		parent::__construct();
		parent::check_login();
	}
	public function index(){
		
		$this->load->model('beneficiary/beneficiary_model');
		$data['applicants']  = $this->beneficiary_model->get_applicant_list();
		$this->load->view($this->config->item('theme').'beneficiary/rp_app_list_view',$data);
		
		}
}
