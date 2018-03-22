<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends NIC_Controller{
	
	public function __construct(){
		
			parent::__construct();
			
			parent::check_login();
	}
	public function index(){
	
		$this->load->view($this->config->item('theme').'dashboard_view');
	}	
	
					
}
