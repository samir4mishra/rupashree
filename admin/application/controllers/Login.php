<?php
defined('BASEPATH') OR exit('No direct script access allowed' );

class Login extends NIC_Controller {
	
	public function __construct(){
		parent::__construct();
				
	}

	public function index() {
		
		parent::check_public();
		
		/*--------------- CAPTCHA---------------*/
		$this->load->helper('captcha');
		$vals = array(
	        //'word'          => 'AbCd',
	        'img_path'      => './captcha/',
	        'img_url'       => 'admin/captcha/',
	        'font_path'     => './captcha4.ttf',
	        'img_width'     => '150',
	        'img_height'    => 35,
	        'expiration'    => 7200,
	        'word_length'   => 5,
	        'font_size'     => 16,
	        //'img_id'        => 'Imageid',
	        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
	        // White background and border, black text and red grid
	        'colors'        => array(
	                'background' => array(255, 255, 255),
	                'border' => array(200, 200, 200),
	                'text' => array(100, 100, 100),
	                'grid' => array(200, 200, 200)
	        )
		);
		$data['cap'] = create_captcha($vals);
		
		
		/*--------------- Form Validation---------------*/
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$config = array(
			array(
				'field' => 'login_id',
				'label' => 'Username',
				'rules' => 'required|max_length[30]|alpha_numeric'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			),
			array(
				'field' => 'captcha',
				'label' => 'Captcha',
				'rules' => 'required|callback_username_check['.$this->input->post('security_code').']'
			)
		);
		
		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view($this->config->item('theme') . 'login_view', $data);
		}
		
		else
		{
			$this->load->model('login_model');
			
			$login_id = $this->input->post('login_id');
			$password = $this->input->post('password');
			
			$login_result = $this->login_model->check_user($login_id, $password);
			
			if(count($login_result) == 1)
			{
				$this->session->set_userdata($login_result[0]);
				redirect('admin/','location');	
			} 
			else
			{
				$data['error_message'] = '<p class="text-danger text-center">Incorrect Login Credentials</p>';
				$this->load->view($this->config->item('theme') . 'login_view', $data);
			}
			
						
		}
			
		
		}
	/*---------------------custom validation for captcha ------------------*/
	public function username_check($captcha,$security_code){
		if($captcha != ""){
			if(hash('sha256',strtoupper($captcha).$this->config->item('encryption_key')) == $security_code){
				 return TRUE;
			} else {
				$this->form_validation->set_message('username_check', 'The {field} is incorrect');
	            return FALSE;
			}
		}
	}	
	
	/*---------------------logout------------------------*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/Login', 'location');
	}	
		
}
