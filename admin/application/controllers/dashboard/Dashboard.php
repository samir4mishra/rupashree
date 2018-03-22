<?php

class Dashboard extends NIC_Controller{

	public function __construct()
		{
			parent::__construct();
			parent::check_login();
			$this->load->model('dashboard_model');
		}
	
	public function index(){
		
			
		$data['total_courses']		= $this->dashboard_model->get_total_course_count()[0]['count'];
		$this->load->view($this->config->item('theme') . 'dashboard_view',$data);

	}


}