<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NIC_Controller extends CI_Controller {

    public $css_head = array();
    public $css_foot = array();
    public $js_head = array();
    public $js_foot = array();
    
	public function __construct(){
	    parent::__construct();
	    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
	    $this->output->set_header("Pragma: no-cache");
	    $this->output->set_header("X-Frame-Options: SAMEORIGIN");
	    $this->output->set_header("X-Content-Type-Options: nosniff");
	    $this->output->set_header("X-XSS-Protection: 1; mode=block");
	    $this->title = $this->config->item("title");
	}
	
	public function check_public(){
		if($this->session->userdata('login_id') != NULL){
			redirect('admin/dashboard', 'location');
		}
	}
	
	public function check_login(){
		if($this->session->userdata('login_id') == NULL){
			redirect('admin/login', 'location');
			die();
		}
	}
	
	
	public function check_privilege($prililege_id = NULL){
		
		$this->check_login();
		
		//generate privilege and menu
		$this->load->model('common/privilege_model');
		$this->menu = $this->privilege_model->stake_privilege();

		//check privilege
		if($prililege_id != NULL){
			 $flag = 1;
			 foreach($this->menu as $key){
			 	if($key['pbssd_privilege_id_pk'] == $prililege_id){
			 		$flag = 0;
			 	}
			 }
			 if($flag == 1){
			 	show_404();
			 }
		}
	}

}
