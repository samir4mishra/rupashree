<?php
defined('BASEPATH') OR exit('No direct script access allowed' );
class BasicFormEntry_model extends CI_Model{
	
	
	public function basic_registration($partial_data)
	{
		$this->db->insert('rp_applicant_basic_details', $partial_data);
		return true;
	}
	
	public function basic_address_registration($full_data){
		
		$this->db->insert('rp_applicant_address_details',$full_data);
		return true;
	}
	public function basic_bank_registration($full_bank_data){

		$this->db->insert('rp_applicant_bank_details',$full_bank_data);
		return true;
	}
	
	public function basic_groom_registration($partial_groom_data){


		$this->db->insert('rp_applicant_groom_details',$partial_groom_data);
		return true;
	}
	public function basic_groom_address_registration($full_groom_data){

		$this->db->insert('rp_groom_address_details',$full_groom_data);
		return true;

	}
	
	public function photo_insert($data){

		$this->db->insert('rp_photograph_details',$data);
		return true;
	}
	
	public function groom_photo_insert($data){
		
		$id = $this->session->userdata('d_cd');
		
	 	$this->db->where('applicant_id', $id)
				->update('rp_photograph_details', $data);
				
		return true;		
	}
	
	public function doc_insert($data){
		
		$this->db->insert('rp_declaration_details',$data);
		return true;
			
	}
	
	public function age_doc_insert($age_doc_data){
				
		$this->db->insert('rp_age_proof_details',$age_doc_data);
		return true;
	}
    public function never_married_doc_insert($never_married_doc_data){	
	
		$this->db->insert('rp_unmarried_details',$never_married_doc_data);
		return true;
	}
	
	public function family_income_doc_insert($family_income_doc_data){	
	
		$this->db->insert('rp_income_details',$family_income_doc_data);
		return true;
	}
	
	public function address_proof_doc_insert($address_proof_doc_data)
	{
		$this->db->insert('rp_address_proof_details',$address_proof_doc_data); 
		return true;
	}
				
	public function bank_details_doc_insert($bank_details_doc_data)
	{
		$this->db->insert('rp_pass_book_details',$bank_details_doc_data);
		return true;
	}			
				
	public function proposed_marriage_doc_insert($proposed_marriage_doc_data)
	{
		$this->db->insert('rp_marriage_proof_details',$proposed_marriage_doc_data);
		return true;
	
	}	
				
	
}