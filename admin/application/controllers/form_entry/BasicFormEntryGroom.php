<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BasicFormEntryGroom extends NIC_Controller{

	public function __construct(){

			parent::__construct();
			parent::check_login();
			$this->load->model('./common/Master_model');
			$this->load->model('./form_entry/BasicFormEntryGroom_model');
	}

	public function index(){
		
		/*----------------Guardian Details Data Store from model  ---------------------*/
		$data['gurds'] = $this->Master_model->get_guardian_query();
		/*----------------District Details Data Store from model  ---------------------*/
		$data['districts'] = $this->Master_model->get_district_query();
		/*----------------Current District Details Data Store from model  --------------*/
		$data['cur_districts'] = $this->Master_model->get_cur_district_query();
		/*----------------show view page -----------------------------------------------*/
		//$this->load->view('./form_entry/rp_basic_form_entry_groom_view.php',$data);
		$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_view', $data);
			
	}	

	/*--------------------------Get Block Details from AJAX call---------------*/

	public function get_block(){

    	//echo $district_id =$this->input->get('district_id');
    	
    		$district_id =$this->input->get('district_id');
    		$blocks= $this->Master_model->get_block_query($district_id);

			if(count($blocks) > 0)
			{
				$block_select_box='';
				$block_select_box .= '<option value="">Select Blocks</option>';
				foreach ($blocks as $block) {
					$block_select_box .= '<option value="'.$block->schcd.'">'.$block->block_name.'</option>';	
				}
				echo json_encode($block_select_box);
			}

		}
	/*--------------------------Get Current Block Details from AJAX call---------------*/

	public function get_cur_block(){

    	//echo $district_id =$this->input->get('district_id');

    		$cur_district_id =$this->input->get('cur_district_id');
    		$cur_blocks= $this->Master_model->get_cur_block_query($cur_district_id);

			if(count($cur_blocks) > 0)
			{
				$cur_block_select_box='';
				$cur_block_select_box .= '<option value="">Select Blocks</option>';
				foreach ($cur_blocks as $cur_block) {
					$cur_block_select_box .= '<option value="'.$cur_block->schcd.'">'.$cur_block->block_name.'</option>';	
				}
				echo json_encode($cur_block_select_box);
			}

	}
	/*--------------------------Click Save Details Button---------------*/
	public function save_groom_details(){

	/*------------Server Side Validation of Groom Basic entry form------*/

		  $this->load->library('form_validation');
		  $this->form_validation->set_rules('groom_first_name', 'First Name', 'callback_alpha');  
		  $this->form_validation->set_rules('groom_last_name', 'Last Name', 'callback_alpha');
		  $this->form_validation->set_rules('groom_mother_f_name', 'Mother First Name', 'callback_alpha');
		  $this->form_validation->set_rules('groom_mother_l_name', 'Mother Last Name', 'callback_alpha');
		  $this->form_validation->set_rules('groom_father_f_name', 'Father First Name', 'callback_alpha');
		  $this->form_validation->set_rules('groom_father_l_name', 'Father Last Name', 'callback_alpha');		  
		  $this->form_validation->set_rules('datepicker_dob_groom', 'Date of Birth', 'required');		  
		  $this->form_validation->set_rules('groom_mobile','Mobile No','callback_valid_phone_number_or_empty');
		  $this->form_validation->set_rules('groom_e_mail_id', 'Email', 'valid_email');
		  $this->form_validation->set_rules('groom_village', 'Village', 'callback_alpha_numeric_spaces');
		  $this->form_validation->set_rules('groom_house_number', 'House Number', 'callback_alpha_numeric_spaces');
		  $this->form_validation->set_rules('groom_street_name', 'Street Name', 'callback_alpha_numeric_spaces');
		  $this->form_validation->set_rules('groom_post_office', 'Post Office', 'callback_alpha');
		  $this->form_validation->set_rules('groom_police_station', 'Police Station', 'callback_alpha');
		  $this->form_validation->set_rules('groom_grmp_ward', 'Gram Panchayat/Ward', 'callback_alpha');
		  $this->form_validation->set_rules('groom_district', 'District', 'required|is_natural');
		  $this->form_validation->set_rules('groom_bmc', 'Block', 'required|is_natural');
		  $this->form_validation->set_rules('groom_pin_code', 'PIN', 'callback_pin_val');
		  $this->form_validation->set_rules('c_groom_village', 'Village', 'callback_alpha_numeric_spaces');
		  $this->form_validation->set_rules('c_groom_house_number', 'House Number', 'callback_alpha_numeric_spaces');
		  $this->form_validation->set_rules('c_groom_street_name', 'Street Name', 'callback_alpha_numeric_spaces');
		  $this->form_validation->set_rules('c_groom_post_office', 'Post Office', 'callback_alpha');
		  $this->form_validation->set_rules('c_groom_police_station', 'Police Station', 'callback_alpha');
		  $this->form_validation->set_rules('c_groom_grmp_ward', 'Gram Panchayat/Ward', 'callback_alpha');
		  $this->form_validation->set_rules('c_groom_district', 'District', 'required');
		  $this->form_validation->set_rules('c_groom_bmc', 'Block', 'required');
		  $this->form_validation->set_rules('c_groom_pin_code', 'PIN', 'callback_pin_val');


		if ($this->form_validation->run() == FALSE)
        {
        	//redirect('./admin/form_entry/groom_details');
           // $this->load->view('./form_entry/rp_basic_form_entry_groom_view');
		   	$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_view');

        }
        else
        {
			
			
					
        			 $applicant_id = $this->session->userdata('d_cd');
        			/*-------------- Post Groom Name ------------------------------------ */
					$groom_first_name = $this->input->post('groom_first_name') == '' || $this->input->post('groom_first_name') == 'First Name' ? '' : strtoupper($this->input->post('groom_first_name'));
					$groom_middle_name = $this->input->post('groom_middle_name') == '' || $this->input->post('groom_middle_name') == 'Middle Name' ? '' : strtoupper($this->input->post('groom_middle_name'));
					$groom_last_name = $this->input->post('groom_last_name') == '' || $this->input->post('groom_last_name') == 'Last Name' ? '' : strtoupper($this->input->post('groom_last_name'));
			 		/*-------------- Groom Mother Name ------------------------------------ */
					$groom_mother_first_name = $this->input->post('groom_mother_f_name') == '' || $this->input->post('groom_mother_f_name') == 'First Name' ? '' : strtoupper($this->input->post('groom_mother_f_name'));
					$groom_mother_middle_name = $this->input->post('groom_mother_m_name') == '' || $this->input->post('groom_mother_m_name') == 'Middle Name' ? '' : strtoupper($this->input->post('groom_mother_m_name'));
					$groom_mother_last_name = $this->input->post('groom_mother_l_name') == '' || $this->input->post('groom_mother_l_name') == 'Last Name' ? '' : strtoupper($this->input->post('groom_mother_l_name'));
					/*-------------- Groom Father Name ------------------------------------ */
					$groom_father_first_name = $this->input->post('groom_father_f_name') == '' || $this->input->post('groom_father_f_name') == 'First Name' ? '' : strtoupper($this->input->post('groom_father_f_name'));
					$groom_father_middle_name = $this->input->post('groom_father_m_name') == '' || $this->input->post('groom_father_m_name') == 'Middle Name' ? '' : strtoupper($this->input->post('groom_father_m_name'));
					$groom_father_last_name = $this->input->post('groom_father_l_name') == '' || $this->input->post('groom_father_l_name') == 'Last Name' ? '' : strtoupper($this->input->post('groom_father_l_name'));
			 		/*-------------- Groom Guardian's  Name ------------------------------------ */
					$groom_guardian_first_name = $this->input->post('groom_guardian_f_name') == '' || $this->input->post('groom_guardian_f_name') == 'First Name' ? '' : strtoupper($this->input->post('groom_guardian_f_name'));
					$groom_guardian_middle_name = $this->input->post('groom_guardian_m_name') == '' || $this->input->post('groom_guardian_m_name') == 'Middle Name' ? '' : strtoupper($this->input->post('groom_guardian_m_name'));
					$groom_guardian_last_name = $this->input->post('groom_guardian_l_name') == '' || $this->input->post('groom_guardian_l_name') == 'Last Name' ? '' : strtoupper($this->input->post('groom_guardian_l_name'));

			 		/*-------------- Groom Relationship With Guardian ------------------------------*/
					$groom_relation_with_gur = $this->input->post('groom_relation_with_guardian');

					/*-------------- Groom Date Of Birth  ------------------------------*/
					$dateofbirth = $this->input->post('datepicker_dob_groom');
					$date=explode('-', $dateofbirth);
					$dob= '20'.$date['2']."-".$date['1']."-".$date['0'];

					/*-------------- Groom Mobile Number ------------------------------*/
					$mobile_no = $this->input->post('groom_mobile');

					/*--------------Groom  Emailid ------------------------------*/					
					$email = $this->input->post('groom_e_mail_id');

					/*-------------- Groom Village ----------------*/
					$groom_village = strtoupper($this->input->post('groom_village'));

					/*-------------- Groom House Number ----------------*/
					$groom_house_number = strtoupper($this->input->post('groom_house_number'));

					/*-------------- Groom street name ----------------*/
					$groom_street_name = strtoupper($this->input->post('groom_street_name'));

					/*-------------- Groom Post Office ----------------*/
					$groom_post_office = strtoupper($this->input->post('groom_post_office'));

					/*-------------- Groom Police Station ----------------*/
					$groom_police_station = strtoupper($this->input->post('groom_police_station'));

					/*-------------- Groom Gram Panchayat/Ward ----------------*/
					$groom_grmp_ward = strtoupper($this->input->post('groom_grmp_ward'));

					/*--------------  Groom District ----------------*/
					$groom_district = $this->input->post('groom_district');

					/*--------------  Groom Block/Municipality/Corporation  ----------------*/
					$groom_bmc = $this->input->post('groom_bmc');

					/*--------------  Groom PIN  ----------------*/
					$groom_pin_code = $this->input->post('groom_pin_code');

					/*-------------- Groom Current Village ----------------*/
					$cur_groom_village = strtoupper($this->input->post('c_groom_village'));

					/*-------------- Groom Current House Number ----------------*/
					$cur_groom_house_no = strtoupper($this->input->post('c_groom_house_number'));

					/*-------------- Groom Current street name ----------------*/
					$cur_groom_street_name = strtoupper($this->input->post('c_groom_street_name'));

					/*-------------- Groom Current Post Office ----------------*/
					$cur_groom_post_office = strtoupper($this->input->post('c_groom_post_office'));

					/*-------------- Groom Current Police Station ----------------*/
					$cur_groom_police_station = strtoupper($this->input->post('c_groom_police_station'));

					/*-------------- Groom  Current Gram Panchayat/Ward ----------------*/
					$cur_groom_grmp_ward = strtoupper($this->input->post('c_groom_grmp_ward'));

					/*-------------- Groom  Current District ----------------*/
					$cur_groom_district = $this->input->post('c_groom_district');

					/*--------------  Groom Current Block/Municipality/Corporation  ----------------*/
					$cur_groom_bmc = $this->input->post('c_groom_bmc');

					/*--------------  Groom Current PIN  ----------------*/
					$cur_groom_pin_code = $this->input->post('c_groom_pin_code');



					/*------- Insert Operation on rp_applicant_groom_details------------*/

					$partial_groom_data=array(
					'applicant_id' => $applicant_id,
					'applicant_groom_fname' => $groom_first_name,
					'applicant_groom_mname' => $groom_middle_name,
					'applicant_groom_lname' => $groom_last_name,
					'applicant_groom_dob' => $dob,
					'applicant_groom_mother_fname' => $groom_mother_first_name,
					'applicant_groom_mother_mname' => $groom_mother_middle_name,
					'applicant_groom_mother_lname' => $groom_mother_last_name,
					'applicant_groom_father_fname' => $groom_father_first_name,
					'applicant_groom_father_mname' => $groom_father_middle_name,
					'applicant_groom_father_lname' => $groom_father_last_name,
					'applicant_groom_guardian_fname' => $groom_guardian_first_name,
					'applicant_groom_guardian_mname' => $groom_guardian_middle_name,
					'applicant_groom_guardian_lname' => $groom_guardian_last_name,
					'applicant_groom_guardian_relation' => $groom_relation_with_gur,
					'applicant_groom_mobile' => $mobile_no,
					'applicant_groom_email' => $email
					);

					$this->BasicFormEntryGroom_model->basic_groom_registration($partial_groom_data);


					/*------- Insert Operation on rp_applicant_address_details------------*/

					if($this->input->post('perm_curr_add_same') == '0')
					{

							$full_groom_data=array(
							'applicant_id' => $applicant_id,
							'groom_current_village' => $cur_groom_village,
							'groom_current_house_no' => $cur_groom_house_no ,
							'groom_current_street' =>$cur_groom_street_name,
							'groom_current_po' =>$cur_groom_post_office ,
							'groom_current_ps' =>$cur_groom_police_station,
							'groom_current_gp_ward' =>$cur_groom_grmp_ward,
							'groom_current_block_mun' =>$cur_groom_bmc,
							'groom_current_district' => $cur_groom_district,
							'groom_current_pin' => $cur_groom_pin_code,
							'groom_permanent_village' => $groom_village,
							'groom_permanent_house_no' => $groom_house_number,
							'groom_permanent_street' => $groom_street_name,
							'groom_permanent_po' => $groom_post_office,
							'groom_permanent_ps' => $groom_police_station,
							'groom_permanent_gp_ward' => $groom_grmp_ward,
							'groom_permanent_block_mun' => $groom_bmc,
							'groom_permanent_district' => $groom_district,
							'groom_permanent_pin' => $groom_pin_code
								
							);

						$this->BasicFormEntryGroom_model->basic_groom_address_registration($full_groom_data);
					}
					else
					{
							$full_groom_data=array(
							'applicant_id' => $applicant_id,
							'groom_current_village' => $groom_village,
							'groom_current_house_no' => $groom_house_number ,
							'groom_current_street' =>$groom_street_name,
							'groom_current_po' =>$groom_post_office ,
							'groom_current_ps' =>$groom_police_station,
							'groom_current_gp_ward' =>$groom_grmp_ward,
							'groom_current_block_mun' =>$groom_bmc,
							'groom_current_district' => $groom_district,
							'groom_current_pin' => $groom_pin_code,
							'groom_permanent_village' => $groom_village,
							'groom_permanent_house_no' => $groom_house_number,
							'groom_permanent_street' => $groom_street_name,
							'groom_permanent_po' => $groom_post_office,
							'groom_permanent_ps' => $groom_police_station,
							'groom_permanent_gp_ward' => $groom_grmp_ward,
							'groom_permanent_block_mun' => $groom_bmc,
							'groom_permanent_district' => $groom_district,
							'groom_permanent_pin' => $groom_pin_code
							);

						$this->BasicFormEntryGroom_model->basic_groom_address_registration($full_groom_data);

					}

					redirect('./admin/form_entry/BasicFormEntryApplicantPhotoUpload');

        }
	}

	public function alpha($str){

			if($str == '')
			{
				$this->form_validation->set_message('alpha', 'The %s field required');
        		return FALSE;
			}

			else if (! preg_match('/^[a-zA-Z]+$/', $str)) 
			{
        		$this->form_validation->set_message('alpha', 'The %s field may only contain alpha characters');
        		return FALSE;
    		} 
    		else
    		{
        		return TRUE;
    		}
		}

		public function valid_phone_number_or_empty($str){

				$str = trim($str);

				if ($str == '') 
				{
					$this->form_validation->set_message('valid_phone_number_or_empty', 'The %s field required');
        			return FALSE;
				}
				else if (! preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $str))
				{
					$this->form_validation->set_message('valid_phone_number_or_empty', 'The %s field not Valid');
        			return FALSE;
				}
				else
				{
					return TRUE;
				}
		}
		public function alpha_numeric_spaces($str){

			if($str == '')
			{
				$this->form_validation->set_message('alpha_numeric_spaces', 'The %s field required');
        		return FALSE;
			}

			else if (! preg_match('/^[A-Z0-9 ]+$/i', $str))
			{
				$this->form_validation->set_message('alpha_numeric_spaces', 'The %s field may only contain alpha characters,numeric number and space');
        		return FALSE;
			}
			else
			{
				return TRUE;
			}

		}

		public function acc_val($str){
			if($str == '')
			{
				$this->form_validation->set_message('acc_val', 'The %s field required');
        		return FALSE;
			}
			else if(! preg_match('/^[\-+]?[0-9]+$/', $str))
			{
				$this->form_validation->set_message('acc_val', 'The %s field may only contain integer');
        		return FALSE;
			}
			else
			{
				return TRUE;	
			}
		}
		public function family_income($str){

			if($str == '')
			{
				$this->form_validation->set_message('family_income', 'The %s field required');
        		return FALSE;
			}
			else if(! preg_match('/^[\-+]?[0-9]+$/', $str))
			{
				$this->form_validation->set_message('family_income', 'The %s field may only contain integer');
        		return FALSE;
			}
			else if($str > 150000)
			{
				$this->form_validation->set_message('family_income', 'The %s field is not greater than 150000');
        		return FALSE;
			}
			else
			{
				return TRUE;	
			}
		}
		public function pin_val($str){

			if($str == '')
			{
				$this->form_validation->set_message('pin_val', 'The %s field required');
        		return FALSE;
			}
			else if(! preg_match('/^[\-+]?[0-9]+$/', $str))
			{
				$this->form_validation->set_message('pin_val', 'The %s field may only contain integer');
        		return FALSE;
			}
			
			else
			{
				return TRUE;	
			}
		}

}
