<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends NIC_Controller{
	
	public function __construct(){
			parent::__construct();
			parent::check_login();
			$this->load->model('dashboard_model');
	}
	public function index(){
	
		$data['total_courses'] = $this->dashboard_model->get_register_count_from_block()[0]['count'];
		$this->load->view($this->config->item('theme') . 'dashboard_view',$data);
	}	
	
					
}
