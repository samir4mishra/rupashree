<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasicFormEntry extends NIC_Controller {
	public function __construct(){
		parent::__construct();
		parent::check_login();
		$this->load->model('common/master_model');
		//print_r($this->master_model->get_gender());
	}
	
	public function index(){
		
		//Data
		$data['gurds'] = $this->master_model->get_guardian_query();
		$data['edus'] = $this->master_model->get_education_query();
		$data['casts'] = $this->master_model->get_cast_query();
		$data['religions'] = $this->master_model->get_religion_query();
		$data['districts'] = $this->master_model->get_district_query();
		$data['cur_districts'] = $this->master_model->get_cur_district_query();
		$data['bank_names'] = $this->master_model->get_bank_query();
		
		//Validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('frm_serial_number', 'Form Serial no', 'required');
			$this->form_validation->set_rules('app_first_name', 'First Name', 'callback_alpha');
			$this->form_validation->set_rules('app_last_name', 'Last Name', 'callback_alpha');
			$this->form_validation->set_rules('app_mother_f_name', 'Mother First Name', 'callback_alpha');
			$this->form_validation->set_rules('app_mother_l_name', 'Mother Last Name', 'callback_alpha');
			$this->form_validation->set_rules('app_father_f_name', 'Father First Name', 'callback_alpha');
			$this->form_validation->set_rules('app_father_l_name', 'Father Last Name', 'callback_alpha');
			//$this->form_validation->set_rules('applicant_relation_with_guardian', 'Relationship', 'required|is_natural');
			$this->form_validation->set_rules('datepicker_dob_applicant', 'Date of Birth', 'required');
			$this->form_validation->set_rules('datepicker_pdom_applicant', 'Proposed Date of Marriage', 'required');
			$this->form_validation->set_rules('applicant_mobile','Mobile No','callback_valid_phone_number_or_empty');
			$this->form_validation->set_rules('applicant_e_mail_id', 'Email', 'valid_email');
			//$this->form_validation->set_rules('applicant_e_mail_id', 'Email', 'callback_email_check');
			$this->form_validation->set_rules('applicant_family_income', 'Family Income', 'callback_family_income');
			$this->form_validation->set_rules('applicant_education', 'Highest Education Level', 'required|is_natural');
			$this->form_validation->set_rules('applicant_caste', 'Cast', 'required|is_natural');
			$this->form_validation->set_rules('applicant_religion', 'Religion', 'required|is_natural');
			$this->form_validation->set_rules('applicant_village', 'Village', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('applicant_house_number', 'House Number', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('applicant_street_name', 'Street Name', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('applicant_post_office', 'Post Office', 'callback_alpha');
			$this->form_validation->set_rules('applicant_police_station', 'Police Station', 'callback_alpha');
			$this->form_validation->set_rules('applicant_grmp_ward', 'Gram Panchayat/Ward', 'callback_alpha');
			$this->form_validation->set_rules('applicant_district', 'District', 'required|is_natural');
			$this->form_validation->set_rules('applicant_bmc', 'Block', 'required|is_natural');
			$this->form_validation->set_rules('applicant_pin_code', 'PIN', 'callback_pin_val');
			$this->form_validation->set_rules('c_applicant_village', 'Village', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('c_applicant_house_number', 'House Number', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('c_applicant_street_name', 'Street Name', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('c_applicant_post_office', 'Post Office', 'callback_alpha');
			$this->form_validation->set_rules('c_applicant_police_station', 'Police Station', 'callback_alpha');
			$this->form_validation->set_rules('c_applicant_grmp_ward', 'Gram Panchayat/Ward', 'callback_alpha');
			$this->form_validation->set_rules('c_applicant_district', 'District', 'required');
			$this->form_validation->set_rules('c_applicant_bmc', 'Block', 'required');
			$this->form_validation->set_rules('c_applicant_pin_code', 'PIN', 'callback_pin_val');
			$this->form_validation->set_rules('applicant_bank_name', 'Bank Name', 'required');
			$this->form_validation->set_rules('applicant_account_no', 'Account Number', 'callback_acc_val');
			$this->form_validation->set_rules('applicant_bank_branch_name', 'Branch Name', 'callback_alpha');
			$this->form_validation->set_rules('applicant_ifs_branch_code', 'IFS Code', 'callback_alpha_numeric_spaces');
			$this->form_validation->set_rules('applicant_bank_branch_address', 'Branch Address', 'callback_alpha');
			
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_view',$data);
			
		
		} else {
			
			
					$year = $this->input->post('applicant_registration_year');
             		$form_serial_no = $this->input->post('frm_serial_number');
					$date = date("Y-m-d");
					//$entered_by = substr($applicant_id,0,6);
       
              		/*-------------- Post Applicant Name ------------------------------------ */
					$app_first_name = $this->input->post('app_first_name') == '' || $this->input->post('app_first_name') == 'First Name' ? '' : strtoupper($this->input->post('app_first_name'));
					$app_middle_name = $this->input->post('app_middle_name') == '' || $this->input->post('app_middle_name') == 'Middle Name' ? '' : strtoupper($this->input->post('app_middle_name'));
					$app_last_name = $this->input->post('app_last_name') == '' || $this->input->post('app_last_name') == 'Last Name' ? '' : strtoupper($this->input->post('app_last_name'));
					/*-------------- Mother Name ------------------------------------ */
					$mother_first_name = $this->input->post('app_mother_f_name') == '' || $this->input->post('app_mother_f_name') == 'First Name' ? '' : strtoupper($this->input->post('app_mother_f_name'));
					$mother_middle_name = $this->input->post('app_mother_m_name') == '' || $this->input->post('app_mother_m_name') == 'Middle Name' ? '' : strtoupper($this->input->post('app_mother_m_name'));
					$mothar_last_name = $this->input->post('app_mother_l_name') == '' || $this->input->post('app_mother_l_name') == 'Last Name' ? '' : strtoupper($this->input->post('app_mother_l_name'));
					/*-------------- Father Name ------------------------------------ */
					$father_first_name = $this->input->post('app_father_f_name') == '' || $this->input->post('app_father_f_name') == 'First Name' ? '' : strtoupper($this->input->post('app_father_f_name'));
					$father_middle_name = $this->input->post('app_father_m_name') == '' || $this->input->post('app_father_m_name') == 'Middle Name' ? '' : strtoupper($this->input->post('app_father_m_name'));
					$father_last_name = $this->input->post('app_father_l_name') == '' || $this->input->post('app_father_l_name') == 'Last Name' ? '' : strtoupper($this->input->post('app_father_l_name'));
					/*-------------- Guardian's  Name ------------------------------------ */
					$guardian_first_name = $this->input->post('app_guardian_f_name') == '' || $this->input->post('app_guardian_f_name') == 'First Name' ? '' : strtoupper($this->input->post('app_guardian_f_name'));
					$guardian_middle_name = $this->input->post('app_guardian_m_name') == '' || $this->input->post('app_guardian_m_name') == 'Middle Name' ? '' : strtoupper($this->input->post('app_guardian_m_name'));
					$guardian_last_name = $this->input->post('app_guardian_l_name') == '' || $this->input->post('app_guardian_l_name') == 'Last Name' ? '' : strtoupper($this->input->post('app_guardian_l_name'));

					/*-------------- Relationship With Guardian ------------------------------*/
					$relation_with_gur = $this->input->post('applicant_relation_with_guardian');
					
					/*--------------Current Date-----------------------------------------*/
					
					//$dateofapplication = date("Y-m-d");
					//$dateofapp =  explode('-', $dateofapplication);
					//$currentdate= $date['2']."-".$date['1']."-".$date['0'];
					
					/*-------------- Date Of Birth  ------------------------------*/
					$dateofbirth = $this->input->post('datepicker_dob_applicant');
					$date=explode('-', $dateofbirth);
					$dob= $date['2']."-".$date['1']."-".$date['0'];

					/*-------------- Proposed Date Of Marriage   ------------------------------*/
					 $pmd = $this->input->post('datepicker_pdom_applicant');
					 $marraige_date=explode('-', $pmd);
					 $proposed_marraige_date= $date['2']."-".$date['1']."-".$date['0'];

					/*-------------- Mobile Number ------------------------------*/
					$mobile_no = $this->input->post('applicant_mobile');

					/*-------------- Emailid ------------------------------*/					
					$email = $this->input->post('applicant_e_mail_id');

					/*-------------- Family Income ------------------------------*/
					$family_income = $this->input->post('applicant_family_income');

					/*-------------- Highest Educational Qualification----------------*/
					$hs_edu_qualification = $this->input->post('applicant_education');

					/*-------------- Caste ----------------*/
					$cast = $this->input->post('applicant_caste');

					/*-------------- Religion ----------------*/
					$religion = $this->input->post('applicant_religion');

					/*-------------- Village ----------------*/
					$applicant_village = strtoupper($this->input->post('applicant_village'));

					/*-------------- House Number ----------------*/
					$applicant_house_no = strtoupper($this->input->post('applicant_house_number'));

					/*-------------- street name ----------------*/
					$applicant_street_name = strtoupper($this->input->post('applicant_street_name'));

					/*-------------- Post Office ----------------*/
					$applicant_post_office = strtoupper($this->input->post('applicant_post_office'));

					/*-------------- Police Station ----------------*/
					$applicant_police_station = strtoupper($this->input->post('applicant_police_station'));

					/*--------------  Gram Panchayat/Ward ----------------*/
					$applicant_grmp_ward = strtoupper($this->input->post('applicant_grmp_ward'));

					/*--------------  District ----------------*/
					$applicant_district = $this->input->post('applicant_district');

					/*--------------  Block/Municipality/Corporation  ----------------*/
					$applicant_bmc = $this->input->post('applicant_bmc');

					/*--------------  PIN  ----------------*/
					$applicant_pin_code = $this->input->post('applicant_pin_code');


					/*-------------- Current Village ----------------*/
					$cur_applicant_village = strtoupper($this->input->post('c_applicant_village'));

					/*-------------- Current House Number ----------------*/
					$cur_applicant_house_no = strtoupper($this->input->post('c_applicant_house_number'));

					/*-------------- Current street name ----------------*/
					$cur_applicant_street_name = strtoupper($this->input->post('c_applicant_street_name'));

					/*-------------- Current Post Office ----------------*/
					$cur_applicant_post_office = strtoupper($this->input->post('c_applicant_post_office'));

					/*-------------- Current Police Station ----------------*/
					$cur_applicant_police_station = strtoupper($this->input->post('c_applicant_police_station'));

					/*--------------  Current Gram Panchayat/Ward ----------------*/
					$cur_applicant_grmp_ward = strtoupper($this->input->post('c_applicant_grmp_ward'));

					/*--------------  Current District ----------------*/
					$cur_applicant_district = $this->input->post('c_applicant_district');

					/*--------------  Current Block/Municipality/Corporation  ----------------*/
					$cur_applicant_bmc = $this->input->post('c_applicant_bmc');

					/*--------------  Current PIN  ----------------*/
					$cur_applicant_pin_code = $this->input->post('c_applicant_pin_code');

					/*--------------  Bank Name  ----------------*/
					$bank_name = strtoupper($this->input->post('applicant_bank_name'));

					/*--------------  Account Number  ----------------*/
					$account_no = strtoupper($this->input->post('applicant_account_no'));

					/*--------------  Branch Name  ----------------*/
					$branch_name = strtoupper($this->input->post('applicant_bank_branch_name'));

					/*--------------  IFSC  ----------------*/
					$ifsc_bank_code = strtoupper($this->input->post('applicant_ifsc_bank_code'));
					$ifs_branch_code = strtoupper($this->input->post('applicant_ifs_branch_code'));

					$ifsc = strtoupper($this->input->post('applicant_ifsc_bank_code')).strtoupper($this->input->post('applicant_ifs_branch_code'));

			// 		/*--------------  Branch Address  ----------------*/
					$branch_address = strtoupper($this->input->post('applicant_bank_branch_address'));

						/*----------------------Generation of unique applicant id --------------*/

					$data = $this->master_model->get_applicant_code();  

							if($data->code == "")
							{
								$code = '191104'.substr($year,2,2);
								$code = $code."0000001";
							}
							else
							{
								$code = $data->code;
								$cd = intval(substr($code,6));
								$cd=$cd+1;
								$code='191104'.$cd;
							}
							$entered_by = substr($code,0,6);
						/*----------------------end of Generation of unique applicant id --------------*/



						/*------- Insert Operation on rp_applicant_basic_details------------*/
							
		   					$partial_data=array(
		                		'applicant_id' => $code,
		                		'applicant_fname' => $app_first_name,
		                		'applicant_mname' => $app_middle_name,
		                		'applicant_lname' => $app_last_name,
		                		'applicant_dob' => $dob,
		                		'applicant_proposed_marriage_date' => $proposed_marraige_date,
		                		'applicant_mother_fname' => $mother_first_name,
		                		'applicant_mother_mname' => $mother_middle_name,
		                		'applicant_mother_lname' => $mothar_last_name,
		                		'applicant_father_fname' => $father_first_name,
		                		'applicant_father_mname' => $father_middle_name,
		                		'applicant_father_lname' => $father_last_name,
		                		'applicant_guardian_fname' => $guardian_first_name,
		                		'applicant_guardian_mname' => $guardian_middle_name,
		                		'applicant_guardian_lname' => $guardian_last_name,
		                		'applicant_guardian_relation' => $relation_with_gur,
		                		'applicant_qualification' => $hs_edu_qualification,
		                		'applicant_caste' => $cast,
		                		'applicant_religion' => $religion,
		                		'applicant_annual_income' => $family_income,
		                		'applicant_mobile_no' => $mobile_no,
		                		'applicant_email' => $email,
								'applicant_form_serial_no' => $form_serial_no,
								'applicant_application_date' => 'now()',
								'applicant_data_entry_time' => 'now()',
								'applicant_data_entry_ip' => $_SERVER['REMOTE_ADDR'],
								'applicant_data_entry_by' => $entered_by
								
		                	);
			
			//print_r($partial_data);
			$this->load->model('form_entry/BasicFormEntry_model');
			$insert_id = $this->BasicFormEntry_model->basic_registration($partial_data);
			
			if($insert_id)
			{
				
					  $full_data=array(
								'applicant_id' => $code,
								'applicant_current_village' => $cur_applicant_village,
								'applicant_current_house_no' => $cur_applicant_house_no,
								'applicant_current_street' => $cur_applicant_street_name,
								'applicant_current_po' => $cur_applicant_post_office,
								'applicant_current_ps' => $cur_applicant_police_station,
								'applicant_current_gp_ward' => $cur_applicant_grmp_ward,
								'applicant_current_block_mun' => $cur_applicant_bmc,						
								'applicant_current_district' => $cur_applicant_district,
								'applicant_current_state' => '19',					
								'applicant_current_pin' => $cur_applicant_pin_code,
								'applicant_permanent_house_no' => $applicant_house_no,
								'applicant_permanent_village' => $applicant_village ,
								'applicant_permanent_street' => $applicant_street_name,
								'applicant_permanent_po' => $applicant_post_office,
								'applicant_permanent_ps' => $applicant_police_station,
								'applicant_permanent_gp_ward' => $applicant_grmp_ward,
								'applicant_permanent_block_mun' => $applicant_bmc,
								'applicant_permanent_district' => $applicant_district,
								'applicant_permanent_state' => '19',
								'applicant_permanent_pin' => $applicant_pin_code
							);

					//$this->BasicFormEntry_model->basic_address_registration($full_data);
				
					$this->load->model('form_entry/BasicFormEntry_model');
					$insert_id_part = $this->BasicFormEntry_model->basic_address_registration($full_data);
					
					if($insert_id_part)
					{
						
						
						$full_bank_data=array(
										'applicant_id' => $code,
										'applicant_bank_name' => $bank_name ,
										'applicant_branch_name' => $branch_name,
										'applicant_branch_address' => $branch_address,
										'applicant_acc_no' => $account_no,
										'applicant_ifsc' => $ifsc
									);
					$this->load->model('form_entry/BasicFormEntry_model');
					$insert_id_full = $this->BasicFormEntry_model->basic_bank_registration($full_bank_data);
					
					if($insert_id_full)
					{
						 
						$data1['gurds'] = $this->master_model->get_guardian_query();
						$data1['edus'] = $this->master_model->get_education_query();
						$data1['casts'] = $this->master_model->get_cast_query();
						$data1['religions'] = $this->master_model->get_religion_query();
						$data1['districts'] = $this->master_model->get_district_query();
						$data1['cur_districts'] = $this->master_model->get_cur_district_query();
						$data1['bank_names'] = $this->master_model->get_bank_query();
						
						$status_data=array(
								'applicant_id' => $code,
								'current_status' => '1'
							);
							
						$this->load->model('common/status_model');
						$this->status_model->insert_app_status_query($status_data);
						
						$data1['success_code'] = 1;
						$data1['success_message'] = "Applicant Details Successfully Saved ";
						
						$this->session->set_userdata('d_cd', $code);
						 
						$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_view',$data1);
					}
					else
					{
						$data1['gurds'] = $this->master_model->get_guardian_query();
						$data1['edus'] = $this->master_model->get_education_query();
						$data1['casts'] = $this->master_model->get_cast_query();
						$data1['religions'] = $this->master_model->get_religion_query();
						$data1['districts'] = $this->master_model->get_district_query();
						$data1['cur_districts'] = $this->master_model->get_cur_district_query();
						$data1['bank_names'] = $this->master_model->get_bank_query();
						
						$data1['success_code'] = 0;
						$data1['success_message'] = "Something is wrong! Please try agein.";
						$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_view',$data1);	

					}
						
					}
					
					else
					{
						$data1['gurds'] = $this->master_model->get_guardian_query();
						$data1['edus'] = $this->master_model->get_education_query();
						$data1['casts'] = $this->master_model->get_cast_query();
						$data1['religions'] = $this->master_model->get_religion_query();
						$data1['districts'] = $this->master_model->get_district_query();
						$data1['cur_districts'] = $this->master_model->get_cur_district_query();
						$data1['bank_names'] = $this->master_model->get_bank_query();
						
						$data1['success_code'] = 0;
						$data1['success_message'] = "Something is wrong! Please try agein."; 
						$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_view',$data1);	
					}
					

				}
			
			else 
			{
				$data['success_code'] = 0;
				$data['success_message'] = "Something is wrong! Please try agein."; 
				$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_view',$data);	
			}
		}
		
		
	}
	
	/*--------------------------------Function for Save Groom Details---------------------------------------*/
	
	public function save_groom_details()
	{
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
			$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_view', $data1);
			  
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
					
					$this->load->model('form_entry/BasicFormEntry_model');
					$insert_groom_id = $this->BasicFormEntry_model->basic_groom_registration($partial_groom_data);
					
					if($insert_groom_id)
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
							'groom_current_state' => '19',
							'groom_current_pin' => $cur_groom_pin_code,
							'groom_permanent_village' => $groom_village,
							'groom_permanent_house_no' => $groom_house_number,
							'groom_permanent_street' => $groom_street_name,
							'groom_permanent_po' => $groom_post_office,
							'groom_permanent_ps' => $groom_police_station,
							'groom_permanent_gp_ward' => $groom_grmp_ward,
							'groom_permanent_block_mun' => $groom_bmc,
							'groom_permanent_district' => $groom_district,
							'groom_permanent_state' => '19',
							'groom_permanent_pin' => $groom_pin_code
								
							);
						$this->load->model('form_entry/BasicFormEntry_model');
						$insert_groom_full = $this->BasicFormEntry_model->basic_groom_address_registration($full_groom_data);
						
						if($insert_groom_full)
						{
							
							$this->load->model('common/status_model');
							$this->status_model->update_groom_status_query($applicant_id);
							
							$data['success_code'] = 1;
							$data['success_message'] = "Groom Details Successfully Saved "; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_photo_upload_view',$data);
							
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Something is wrong! Please try agein."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_view',$data);
							
						}
					
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Something is wrong! Please try agein."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_view',$data);
					}
					  
			  
			}
		
	}
	
	
	public function savephoto(){

			$this->load->helper('file');
		 	$this->load->library('image_lib');
	 		$this->load->library('upload');
			$this->input->post('imgdata');

			$applicant_id = $this->session->userdata('d_cd');

			$entered_by = substr($applicant_id,0,6);

			//if($this->input->post('imgdata') == '')
//			{
//				$this->session->set_flashdata('success', 'Plase Upload Photo');
//				redirect('./admin/form_entry/photoupload');
//			}
			$image=base64_decode(str_replace('data:image/jpeg;base64,', '', hex2bin($this->input->post('imgdata'))));
			$fp = fopen('upload_pic/applicant_image_'.$applicant_id.'.jpg', 'w');
			$photo = 'upload_pic/applicant_image_'.$applicant_id.'.jpg';
			//$fp = fopen('./upload_pic/image_123.jpg', 'w');
			//$photo = './upload_pic/image_123.jpg';
			fwrite($fp, $image);
			fclose($fp);

			if (file_exists($photo))
			{	
				//$name= "12345";
				$vp=explode('.',$photo);
				$valid_photo = end($vp);
				$photo_name = $applicant_id.'_applicant_photo.'.$valid_photo;
				//$photo_name = $name.'_photo.'.$valid_photo;
				$photo_path = './upload_pic'.'/'.'/'.$photo_name;

				if(copy($photo,$photo_path))
				{

					//resize($photo_path,125,$photo_path);
					//create_watermark_from_string($photo_path,$photo_path,'Hello World','Hello World',14,'CCCCCC',75,0,22);
					// Load the stamp and the photo to apply the watermark to
						$im = imagecreatefromjpeg($photo_path);
					// First we create our stamp image manually from GD
						$stamp = imagecreatetruecolor(125, 20);
					//	imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
					//	imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
					//$im = imagecreatefromjpeg($photo_path);
						imagestring($stamp, 1, 15, 5, '19110414103', 0x0000FF);
						imagestring($stamp, 1, 15, 5, 1234, 0xf10f0f);
						// Set the margins for the stamp and get the height/width of the stamp image
					    $marge_right = 10;
						$marge_bottom = 30;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);
					// Merge the stamp onto our photo with an opacity of 50%
						imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 30);

					// Save the image to file and free memory
						imagejpeg($im, $photo_path);
						imagedestroy($im);

						$file_content=unpack('H*', file_get_contents($photo_path));
						  

						$data=array(
						'applicant_id' => $applicant_id,
                		'applicant_photo_content'	=> $file_content[1],
                		'applicant_photo_extension' => $valid_photo,
                		'applicant_photo_entry_time' => 'now()',
                		'applicant_photo_entry_ip' => $_SERVER['REMOTE_ADDR'],
                		'applicant_photo_entry_by' => $entered_by
                		);
						
						$this->load->model('form_entry/BasicFormEntry_model');
                		$insert_photo = $this->BasicFormEntry_model->photo_insert($data);
						
						if($insert_photo)
						{
							$this->load->model('common/status_model');
							$this->status_model->update_app_photo_status_query($applicant_id);
							
							$data['success_code'] = 1;
							$data['success_message'] = "Applicant Photo Successfully Saved "; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_photo_upload_view',$data);
							
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Something is wrong! Please try agein."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_photo_upload_view',$data);
						}
						
				}
				
				
			}

	}
	
	public function save_groom_photo(){

			$this->load->helper('file');
		 	$this->load->library('image_lib');
	 		$this->load->library('upload');
			$this->input->post('imgdata');

			$applicant_id = $this->session->userdata('d_cd');

			$entered_by = substr($applicant_id,0,6);

			//if($this->input->post('imgdata') == '')
//			{
//				$this->session->set_flashdata('success', 'Plase Upload Photo');
//				redirect('./admin/form_entry/photoupload');
//			}
			$image=base64_decode(str_replace('data:image/jpeg;base64,', '', hex2bin($this->input->post('imgdata'))));
			$fp = fopen('upload_pic/groom_image_'.$applicant_id.'.jpg', 'w');
			$photo = 'upload_pic/groom_image_'.$applicant_id.'.jpg';
			//$fp = fopen('./upload_pic/image_123.jpg', 'w');
			//$photo = './upload_pic/image_123.jpg';
			fwrite($fp, $image);
			fclose($fp);

			if (file_exists($photo))
			{	
				//$name= "12345";
				$vp=explode('.',$photo);
				$valid_photo = end($vp);
				$photo_name = $applicant_id.'_groom_photo.'.$valid_photo;
				//$photo_name = $name.'_photo.'.$valid_photo;
				$photo_path = './upload_pic'.'/'.'/'.$photo_name;

				if(copy($photo,$photo_path))
				{

					//resize($photo_path,125,$photo_path);
					//create_watermark_from_string($photo_path,$photo_path,'Hello World','Hello World',14,'CCCCCC',75,0,22);
					// Load the stamp and the photo to apply the watermark to
						$im = imagecreatefromjpeg($photo_path);
					// First we create our stamp image manually from GD
						$stamp = imagecreatetruecolor(125, 20);
					//	imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
					//	imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
					//$im = imagecreatefromjpeg($photo_path);
						imagestring($stamp, 1, 15, 5, '19110414103', 0x0000FF);
						imagestring($stamp, 1, 15, 5, 1234, 0xf10f0f);
						// Set the margins for the stamp and get the height/width of the stamp image
					    $marge_right = 10;
						$marge_bottom = 30;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);
					// Merge the stamp onto our photo with an opacity of 50%
						imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 30);

					// Save the image to file and free memory
						imagejpeg($im, $photo_path);
						imagedestroy($im);

						$file_content=unpack('H*', file_get_contents($photo_path));
						  
						$id = $this->session->userdata('d_cd');
						
						$data=array(
                		'groom_photo_content'	=> $file_content[1],
                		'groom_photo_extension' => $valid_photo,
                		'groom_photo_entry_time' => 'now()',
                		'groom_photo_entry_ip' => $_SERVER['REMOTE_ADDR'],
                		'groom_photo_entry_by' => $entered_by
                		);

						$this->load->model('form_entry/BasicFormEntry_model');
                		$insert_groom_photo = $this->BasicFormEntry_model->groom_photo_insert($data);
						
						if($insert_groom_photo)
						{
							$this->load->model('common/status_model');
							$this->status_model->update_groom_photo_status_query($applicant_id);
							
							$data['success_code'] = 1;
							$data['success_message'] = "Groom Photo Successfully Saved "; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_ocr_detect_view',$data);
						}
						
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Something is wrong! Please try agein."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_groom_photo_upload_view',$data);
							
						}
						
				}
				
				
			}

	}
	
	
	public function submit_declaration(){

			$this->load->helper('file');
	 		$this->load->library('upload');
			$applicant_id = $this->session->userdata('d_cd');
			$entered_by = substr($applicant_id,0,6);
	 		$imgdata = $_FILES['upload_file']['name'];

	 		if(mime_content_type($_FILES['upload_file']['tmp_name']) == 'image/jpeg')
			{
				//$name= "12345";
				$vumd=explode('.',$imgdata);
				$valid_unmd = end($vumd);
				$unmd = $applicant_id.'_docs.'.$valid_unmd;
				$photo_path = './upload_pic'.'/'.$unmd;
			
					if(copy($_FILES['upload_file']['tmp_name'],$photo_path))
					{
						
						//imageCompression_ocr($photo_path,375,$photo_path);
						
						//create_watermark_from_string($photo_path,$photo_path,'Hello World','Hello World',14,'CCCCCC',75,0,22);
						// Load the stamp and the photo to apply the watermark to
						$im = imagecreatefromjpeg($photo_path);
					
						// First we create our stamp image manually from GD
						$stamp = imagecreatetruecolor(375, 20);
						//	imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
						//	imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
						//$im = imagecreatefromjpeg($photo_path);
						//	imagestring($stamp, 5, 20, 20, '19110414103', 0x0000FF);
						imagestring($stamp, 1, 15, 5, '19110414103', 0xf10f0f);
					
						// Set the margins for the stamp and get the height/width of the stamp image
						$marge_right = 10;
						$marge_bottom = 30;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);
					
						// Merge the stamp onto our photo with an opacity of 50%
						imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
					
						// Save the image to file and free memory
						imagejpeg($im, $photo_path);
						imagedestroy($im);
					
					 	$file_content=unpack('H*', file_get_contents($photo_path));
						
						$data=array(
						'applicant_id' => $applicant_id,
                		'applicant_declaration_content'	=> $file_content[1],
                		'applicant_declaration_content_extension' => $valid_unmd,
                		'applicant_declaration_entry_time' => 'now()',
                		'applicant_declaration_entry_ip' => $_SERVER['REMOTE_ADDR'],
                		'applicant_declaration_entry_by' => $entered_by
                		);
					 
					 	$this->load->model('form_entry/BasicFormEntry_model');
                		$insert_doc = $this->BasicFormEntry_model->doc_insert($data);

						if($insert_doc)
						{ 
							$data['records'] = $this->master_model->selectValues();
							
							$this->load->model('common/status_model');
							$this->status_model->update_declaration_photo_status_query($applicant_id);
							
							$data['success_code'] = 1;
							$data['success_message'] = "Declaration Page Successfully Saved "; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
							
						
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Something is wrong! Please try agein."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_ocr_detect_view',$data);
						}
					 
					
					}
			}

        }
		
		public function insert_declaration()
		{
							
				$default_id = date("hms");
				$applicant_id = $this->session->userdata('d_cd');
				$age_doc_data = array();	// to store age document details of applicant and groom...
				
				$never_married_doc_data = array();	// to store never married document details of applicant
				
				$family_income_doc_data = array();	// to store family income document details of applicant
				
				$address_proof_doc_data = array(); 	//	to store address proof document details of applicant
				
				$bank_details_doc_data = array();	//	to store bank account details of applicant
				
				$proposed_marriage_doc_data = array();
				
				
				//$photo_upload_path_age_proof_applicant ="./upload_pic/";
				
				
				// applicant's age proof document details...
				
				$applicant_age_proof_doc = $_FILES['applicant_age_proof_doc']['name'];
				$applicant_age_proof_doc_name = $this->input->post('applicant_age_proof_doc_name');
				$applicant_age_proof_doc_number = $this->input->post('applicant_age_proof_doc_number');
				$applicant_age_proof_doc_mime = mime_content_type($_FILES['applicant_age_proof_doc']['tmp_name']);
				$applicant_age_proof_doc_size = round(($_FILES['applicant_age_proof_doc']['size']/1024));
				
				
				// groom's age proof document details...
				
				$groom_age_proof_doc = $_FILES['groom_age_proof_doc']['name'];
				$groom_age_proof_doc_name = $this->input->post('groom_age_proof_doc_name');
				$groom_age_proof_doc_number = $this->input->post('groom_age_proof_doc_number');
				$groom_age_proof_doc_mime = mime_content_type($_FILES['applicant_age_proof_doc']['tmp_name']);
				$groom_age_proof_doc_size = round(($_FILES['applicant_age_proof_doc']['size']/1024));
				
				// never married proof document details...
				
				$applicant_never_married_doc = $_FILES['applicant_never_married_doc']['name'];
				$applicant_never_married_doc_name = $this->input->post('applicant_never_married_doc_name');
				$applicant_never_married_doc_number = $this->input->post('applicant_never_married_doc_number');
				$applicant_never_married_doc_mime = mime_content_type($_FILES['applicant_never_married_doc']['tmp_name']);
				$applicant_never_married_doc_size = round(($_FILES['applicant_never_married_doc']['size']/1024));
				
				// family income proof document details...
				
				$applicant_family_income_doc = $_FILES['applicant_family_income_doc']['name'];
				$applicant_family_income_doc_name = $this->input->post('applicant_family_income_doc_name');
				$applicant_family_income_doc_number = $this->input->post('applicant_family_income_doc_number');
				$applicant_family_income_doc_mime = mime_content_type($_FILES['applicant_family_income_doc']['tmp_name']);
				$applicant_family_income_doc_size = round(($_FILES['applicant_family_income_doc']['size']/1024));
				
				// address proof document details...
				
					$applicant_address_proof_doc = $_FILES['applicant_address_proof_doc']['name'];
				$applicant_address_proof_doc_name = $this->input->post('applicant_address_proof_doc_name');
				$applicant_address_proof_doc_number = $this->input->post('applicant_address_proof_doc_number');
				$applicant_address_proof_doc_mime = mime_content_type($_FILES['applicant_address_proof_doc']['tmp_name']);
				$applicant_address_proof_doc_size = round(($_FILES['applicant_address_proof_doc']['size']/1024));
				
				
				// bank account proof document details...
				
				$applicant_bank_acc_details_doc = $_FILES['applicant_bank_acc_details_doc']['name'];
				$applicant_bank_acc_details_doc_name = $this->input->post('applicant_bank_acc_details_doc_name');
				$applicant_bank_acc_details_doc_number = $this->input->post('applicant_bank_acc_details_doc_number');
				$applicant_bank_acc_details_doc_mime = mime_content_type($_FILES['applicant_bank_acc_details_doc']['tmp_name']);
				$applicant_bank_acc_details_doc_size = round(($_FILES['applicant_bank_acc_details_doc']['size']/1024));
				
				
				// proposed marriage proof document details...
				
				$applicant_proposed_marriage_proof_doc = $_FILES['applicant_proposed_marriage_proof_doc']['name'];
				$applicant_proposed_marriage_proof_doc_name = $this->input->post('applicant_proposed_marriage_proof_doc_name');
				$applicant_proposed_marriage_proof_doc_number = $this->input->post('applicant_proposed_marriage_proof_doc_number');
				$applicant_proposed_marriage_proof_doc_mime = mime_content_type($_FILES['applicant_proposed_marriage_proof_doc']['tmp_name']);
				$applicant_proposed_marriage_proof_doc_size = round(($_FILES['applicant_proposed_marriage_proof_doc']['size']/1024));
				
				
				// applicant age proof document check...
				
				if($applicant_age_proof_doc_name != "" and $applicant_age_proof_doc != "" and $groom_age_proof_doc != "" and $groom_age_proof_doc_name !="") 
				{
					// checking mime type
					if($applicant_age_proof_doc_mime == "image/jpeg" and $groom_age_proof_doc_mime == "image/jpeg")
					{
						// checking size in KB
						if($applicant_age_proof_doc_size <= 500 and $groom_age_proof_doc_size <= 500)
						{
							
							$file_name_applicant = explode(".",$applicant_age_proof_doc);
							$file_name_groom = explode(".",$groom_age_proof_doc);
							
							$valid_extension_applicant = end($file_name_applicant);
							
							$valid_extension_groom = end($file_name_groom);
							
							$photo_upload_path_age_proof_applicant="./upload_pic/".$default_id.".".$valid_extension_applicant;
							$photo_upload_path_age_proof_groom="./upload_pic/".$default_id.".".$valid_extension_groom;
							
							
							if(copy($_FILES['applicant_age_proof_doc']['tmp_name'],$photo_upload_path_age_proof_applicant) and copy($_FILES['groom_age_proof_doc']['tmp_name'],$photo_upload_path_age_proof_groom))
							{
								
								//imageCompression($photo_upload_path);
							
								$im_applicant = imagecreatefromjpeg($photo_upload_path_age_proof_applicant);
								$im_groom = imagecreatefromjpeg($photo_upload_path_age_proof_groom);
								
								$stamp = imagecreatetruecolor(375, 20);
								
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								
								$marge_right = 10;
								$marge_bottom = 30;
								$sx = imagesx($stamp);
								$sy = imagesy($stamp);
								
								imagecopymerge($im_applicant, $stamp, imagesx($im_applicant) - $sx - $marge_right, imagesy($im_applicant) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								
								imagejpeg($im_applicant, $photo_upload_path_age_proof_applicant);
								
								imagedestroy($im_applicant);
								
								
								imagecopymerge($im_groom, $stamp, imagesx($im_groom) - $sx - $marge_right, imagesy($im_groom) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								imagejpeg($im_groom, $photo_upload_path_age_proof_groom);
								imagedestroy($im_groom);
								
								
								$file_content_applicant=unpack('H*', file_get_contents($photo_upload_path_age_proof_applicant));
								
								$file_content_groom=unpack('H*', file_get_contents($photo_upload_path_age_proof_groom));
								
								
								// storing all informations in the array for later database operations
								
								$age_doc_data = array(
				
								'applicant_id'=>$applicant_id,
								'applicant_age_proof_content'=>$file_content_applicant[1],
								'applicant_age_proof_content_extension'=>$valid_extension_applicant,
								'applicant_age_proof_doc_name'=>$applicant_age_proof_doc_name,
								'applicant_age_proof_no'=>$applicant_age_proof_doc_number,
								'applicant_age_proof_entry_time'=>'now()',
								'applicant_age_proof_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'applicant_age_proof_entry_by'=>$default_id,
								'groom_age_proof_content'=>$file_content_groom[1],
								'groom_age_proof_content_extension'=>$valid_extension_groom,
								'groom_age_proof_doc_name'=>$groom_age_proof_doc_name,
								'groom_age_proof_no'=>$groom_age_proof_doc_number,
								'groom_age_proof_entry_time'=>'now()',
								'groom_age_proof_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'groom_age_proof_entry_by'=>$default_id
								);
								
								$this->load->model('form_entry/BasicFormEntry_model');
                				$insert_age_doc = $this->BasicFormEntry_model->age_doc_insert($age_doc_data);
								
							}
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Age proof document size is more than 500 KB. It should be upto 500 KB"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
						}
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Age proof document uploaded is not a JPEG / JPG file."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					}
				}
				else
				{
							$data['success_code'] = 0;
							$data['success_message'] = "Age proof document name or document is missing."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					
				}
				
				
				
				// applicant never married proof document check...
				
				if($applicant_never_married_doc != "" and $applicant_never_married_doc_name != "") 
				{
					// checking mime type
					if($applicant_never_married_doc_mime == "image/jpeg")
					{
						// checking size in KB
						if($applicant_never_married_doc_size <= 500)
						{
							
							$file_name_never_married = explode(".",$applicant_never_married_doc);
							
							
							$valid_extension_never_married = end($file_name_never_married);
														
							$photo_upload_path_never_married="./upload_pic/".$default_id.".".$valid_extension_never_married;
							
							if(copy($_FILES['applicant_never_married_doc']['tmp_name'],$photo_upload_path_never_married))
							{
								
								//imageCompression($photo_upload_path);
							
								$im_never_married = imagecreatefromjpeg($photo_upload_path_never_married);
								
								
								$stamp = imagecreatetruecolor(375, 20);
								
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								
								$marge_right = 10;
								$marge_bottom = 30;
								$sx = imagesx($stamp);
								$sy = imagesy($stamp);
								
								imagecopymerge($im_never_married, $stamp, imagesx($im_never_married) - $sx - $marge_right, imagesy($im_never_married) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								
								imagejpeg($im_never_married, $photo_upload_path_never_married);
								imagedestroy($im_never_married);
								
								$file_content_never_married=unpack('H*', file_get_contents($photo_upload_path_never_married));
								
								// storing all informations in the array for later database operations
								
								$never_married_doc_data = array(
				
								'applicant_id'=>$applicant_id,
								'applicant_unmarried_content'=>$file_content_never_married[1],
								'applicant_unmarried_no'=>$applicant_never_married_doc_number,
								'applicant_unmarried_doc_name'=>$applicant_never_married_doc_name,
								'applicant_unmarried_content_extension'=>$valid_extension_never_married,
								'applicant_unmarried_entry_time'=>'now()',
								'applicant_unmarried_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'applicant_unmarried_entry_by'=>$default_id,
								);
								
								$this->load->model('form_entry/BasicFormEntry_model');
                				$insert_never_married_doc = $this->BasicFormEntry_model->never_married_doc_insert($never_married_doc_data);
							}
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Never married document size is more than 500 KB. It should be upto 500 KB"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
							
						}
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Never married proof document uploaded is not a JPEG / JPG file."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					}
				}
				else
				{
					$data['success_code'] = 0;
					$data['success_message'] = "Never married proof document name or document is missing."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
				}
				
				
				
				
				// applicant family income proof document check...
				
				if($applicant_family_income_doc != "" and $applicant_family_income_doc_name != "") 
				{
					// checking mime type
					if($applicant_family_income_doc_mime == "image/jpeg")
					{
						// checking size in KB
						if($applicant_family_income_doc_size <= 500)
						{
							
							$file_family_income = explode(".",$applicant_family_income_doc);
							
							$valid_extension_family_income = end($file_family_income);
														
							$photo_upload_path_family_income ="./upload_pic/".$default_id.".".$valid_extension_family_income;
							
							if(copy($_FILES['applicant_family_income_doc']['tmp_name'],$photo_upload_path_family_income))
							{
								
								//imageCompression($photo_upload_path);
							
								$im_family_income = imagecreatefromjpeg($photo_upload_path_family_income);
								
								
								$stamp = imagecreatetruecolor(375, 20);
								
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								
								$marge_right = 10;
								$marge_bottom = 30;
								$sx = imagesx($stamp);
								$sy = imagesy($stamp);
								
								imagecopymerge($im_family_income, $stamp, imagesx($im_family_income) - $sx - $marge_right, imagesy($im_family_income) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								
								imagejpeg($im_family_income, $photo_upload_path_family_income);
								imagedestroy($im_family_income);
								
								$file_content_family_income=unpack('H*', file_get_contents($photo_upload_path_family_income));
								
								// storing all informations in the array for later database operations
								
								$family_income_doc_data = array(
				
								'applicant_id'=>$applicant_id,
								'applicant_income_content'=>$file_content_family_income[1],
								'applicant_income_no'=>$applicant_family_income_doc_number,
								'applicant_income_proof_doc_name'=>$applicant_family_income_doc_name,
								'applicant_income_content_extension'=>$valid_extension_family_income,
								'applicant_income_entry_time'=>'now()',
								'applicant_income_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'applicant_income_entry_by'=>$default_id,
								);
								
								$this->load->model('form_entry/BasicFormEntry_model');
                				$insert_family_income_doc = $this->BasicFormEntry_model->family_income_doc_insert($family_income_doc_data);
								
							}
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Family income document size is more than 500 KB. It should be upto 500 KB."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
						}
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Family income proof document uploaded is not a JPEG / JPG file."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					}
				}
				else
				{
							$data['success_code'] = 0;
							$data['success_message'] = "Family income proof document name or document is missing."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					
				}
				
				
				//	applicant address proof document check....
				
				if($applicant_address_proof_doc != "" and $applicant_address_proof_doc_name != "") 
				{
					// checking mime type
					if($applicant_address_proof_doc_mime == "image/jpeg")
					{
						// checking size in KB
						if($applicant_address_proof_doc_size <= 500)
						{
							
							$file_address_proof = explode(".",$applicant_address_proof_doc);
							
							$valid_extension_address_proof = end($file_address_proof);
														
							$photo_upload_path_address_proof ="./upload_pic/".$default_id.".".$valid_extension_address_proof;
							
							if(copy($_FILES['applicant_address_proof_doc']['tmp_name'],$photo_upload_path_address_proof))
							{
								
								//imageCompression($photo_upload_path);
							
								$im_address_proof = imagecreatefromjpeg($photo_upload_path_address_proof);
								
								
								$stamp = imagecreatetruecolor(375, 20);
								
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								
								$marge_right = 10;
								$marge_bottom = 30;
								$sx = imagesx($stamp);
								$sy = imagesy($stamp);
								
								imagecopymerge($im_address_proof, $stamp, imagesx($im_address_proof) - $sx - $marge_right, imagesy($im_address_proof) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								
								imagejpeg($im_address_proof, $photo_upload_path_address_proof);
								imagedestroy($im_address_proof);
								
								$file_content_address_proof=unpack('H*', file_get_contents($photo_upload_path_address_proof));
								
								// storing all informations in the array for later database operations
								
								$address_proof_doc_data = array(
				
								'applicant_id'=>$applicant_id,
								'applicant_address_proof_content'=>$file_content_address_proof[1],
								'applicant_address_proof_no'=>$applicant_address_proof_doc_number,
								'applicant_address_proof_doc_name'=>$applicant_address_proof_doc_name,
								'applicant_address_proof_content_extension'=>$valid_extension_address_proof,
								'applicant_address_proof_entry_time'=>'now()',
								'applicant_address_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'applicant_address_entry_by'=>$default_id,
								);
								
								$this->load->model('form_entry/BasicFormEntry_model');
                				$insert_address_proof_doc = $this->BasicFormEntry_model->address_proof_doc_insert($address_proof_doc_data);	
							}
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Address proof document size is more than 500 KB. It should be upto 500 KB."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
						}
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Address proof document uploaded is not a JPEG / JPG file."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					}
				}
				else
				{
							$data['success_code'] = 0;
							$data['success_message'] = "Address proof document name or document is missing"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
				}
				
				
				
				
				//	applicant bank account proof document check....
				
				if($applicant_bank_acc_details_doc != "" and $applicant_bank_acc_details_doc_name != "") 
				{
					// checking mime type
					if($applicant_bank_acc_details_doc_mime == "image/jpeg")
					{
						// checking size in KB
						if($applicant_bank_acc_details_doc_size <= 500)
						{
							
							$file_bank_acc_details = explode(".",$applicant_bank_acc_details_doc);
							
							$valid_extension_bank_acc_details = end($file_bank_acc_details);
														
							$photo_upload_path_file_bank_acc_details ="./upload_pic/".$default_id.".".$valid_extension_bank_acc_details;
							
							if(copy($_FILES['applicant_bank_acc_details_doc']['tmp_name'],$photo_upload_path_file_bank_acc_details))
							{
								
								//imageCompression($photo_upload_path);
							
								$im_bank_acc_details = imagecreatefromjpeg($photo_upload_path_file_bank_acc_details);
								
								
								$stamp = imagecreatetruecolor(375, 20);
								
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								
								$marge_right = 10;
								$marge_bottom = 30;
								$sx = imagesx($stamp);
								$sy = imagesy($stamp);
								
								imagecopymerge($im_bank_acc_details, $stamp, imagesx($im_bank_acc_details) - $sx - $marge_right, imagesy($im_bank_acc_details) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								
								imagejpeg($im_bank_acc_details, $photo_upload_path_file_bank_acc_details);
								imagedestroy($im_bank_acc_details);
								
								$file_content_bank_acc_details=unpack('H*', file_get_contents($photo_upload_path_file_bank_acc_details));
								
								// storing all informations in the array for later database operations
								
								$bank_details_doc_data = array(
				
								'applicant_id'=>$applicant_id,
								'applicant_passbook_content'=>$file_content_bank_acc_details[1],
								'applicant_passbook_content_no'=>$applicant_bank_acc_details_doc_number,
								'applicant_passbook_doc_name'=>$applicant_bank_acc_details_doc_name,
								'applicant_passbook_content_extension'=>$valid_extension_bank_acc_details,
								'applicant_passbook_entry_time'=>'now()',
								'applicant_passbook_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'applicant_passbook_entry_by'=>$default_id,
								);
								
								$this->load->model('form_entry/BasicFormEntry_model');
                				$insert_bank_details_doc = $this->BasicFormEntry_model->bank_details_doc_insert($bank_details_doc_data);	
								
							}
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Bank account details document size is more than 500 KB. It should be upto 500 KB"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
						}
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Bank account details document uploaded is not a JPEG / JPG file."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
					}
				}
				else
				{
							$data['success_code'] = 0;
							$data['success_message'] = "Bank account details document name or document is missing"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
				}
				
				//	proposed marriage proof document check...
				
				if($applicant_proposed_marriage_proof_doc != "" and $applicant_proposed_marriage_proof_doc_name != "") 
				{
					// checking mime type
					if($applicant_proposed_marriage_proof_doc_mime == "image/jpeg")
					{
						// checking size in KB
						if($applicant_proposed_marriage_proof_doc_size <= 500)
						{
							
							$file_proposed_marriage_proof = explode(".",$applicant_proposed_marriage_proof_doc);
							
							$valid_extension_proposed_marriage_proof = end($file_proposed_marriage_proof);
														
							$photo_upload_path_proposed_marriage_proof ="./upload_pic/".$default_id.".".$valid_extension_proposed_marriage_proof;
							
							if(copy($_FILES['applicant_proposed_marriage_proof_doc']['tmp_name'],$photo_upload_path_proposed_marriage_proof))
							{
								
								//imageCompression($photo_upload_path);
							
								$im_proposed_marriage_proof = imagecreatefromjpeg($photo_upload_path_proposed_marriage_proof);
								
								
								$stamp = imagecreatetruecolor(375, 20);
								
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								imagestring($stamp, 1, 15, 5, $default_id, 0xf10f0f);
								
								$marge_right = 10;
								$marge_bottom = 30;
								$sx = imagesx($stamp);
								$sy = imagesy($stamp);
								
								imagecopymerge($im_proposed_marriage_proof, $stamp, imagesx($im_proposed_marriage_proof) - $sx - $marge_right, imagesy($im_proposed_marriage_proof) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
								
								imagejpeg($im_proposed_marriage_proof, $photo_upload_path_proposed_marriage_proof);
								imagedestroy($im_proposed_marriage_proof);
								
								$file_content_proposed_marriage_proof=unpack('H*', file_get_contents($photo_upload_path_proposed_marriage_proof));
								
								// storing all informations in the array for later database operations
								
								$proposed_marriage_doc_data = array(
				
								'applicant_id'=>$applicant_id,
								'applicant_marriage_proof_content'=>$file_content_proposed_marriage_proof[1],
								'applicant_marriage_proof_no'=>$applicant_proposed_marriage_proof_doc_number,
								'applicant_marriage_proof_doc_name'=>$applicant_proposed_marriage_proof_doc_name,
								'applicant_marriage_proof_doc_extension'=>$valid_extension_proposed_marriage_proof,
								'applicant_marriage_proof_entry_time'=>'now()',
								'applicant_marriage_proof_entry_ip'=>$_SERVER['REMOTE_ADDR'],
								'applicant_marriage_proof_entry_by'=>$default_id,
								);
								
								$this->load->model('form_entry/BasicFormEntry_model');
                				$insert_proposed_marriage_doc = $this->BasicFormEntry_model->proposed_marriage_doc_insert($proposed_marriage_doc_data);
								
								if($insert_proposed_marriage_doc && $insert_bank_details_doc && $insert_address_proof_doc && $insert_family_income_doc && $insert_never_married_doc && $insert_age_doc)
								{
									
									$this->load->model('common/status_model');
									$this->status_model->update_declaration_status_query($applicant_id);
							
									$data['success_code'] = 1;
							    	$data['success_message'] = "Success! Your form is now successfully submitted."; 
									$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_success_view',$data);
								}
								else
								{
									$data['success_code'] = 0;
							    	$data['success_message'] = "Something Went Wrong !!!! Please try again later"; 
									$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
									
								}
							}
						}
						else
						{
							$data['success_code'] = 0;
							$data['success_message'] = "Proposed marriage document size is more than 500 KB. It should be upto 500 KB"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
						}
					}
					else
					{
							$data['success_code'] = 0;
							$data['success_message'] = "Proposed marriage document uploaded is not a JPEG / JPG file."; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
							
					}
				}
				else
				{
							$data['success_code'] = 0;
							$data['success_message'] = "Bank account details document name or document is missing"; 
							$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_declaration_upload_view',$data);
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
		
		public function get_block(){

    	//echo $district_id =$this->input->get('district_id');
    	
    		$district_id =$this->input->get('district_id');
    		$blocks= $this->master_model->get_block_query($district_id);

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
		public function get_cur_block(){

    	//echo $district_id =$this->input->get('district_id');
    	
    	$cur_district_id =$this->input->get('cur_district_id');
    	$cur_blocks= $this->master_model->get_cur_block_query($cur_district_id);

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
		public function get_ifsc(){
    	
	    	$bank_id =$this->input->get('bank_id');
	   		$bank_names= $this->master_model->get_ifsc_query($bank_id);
	   		$ifsc_code = $bank_names->ifsc;
	   		echo json_encode($ifsc_code);  		
		}
}
