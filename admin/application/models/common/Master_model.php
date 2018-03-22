<?php
defined('BASEPATH') OR exit('No direct script access allowed' );

class Master_model extends CI_Model {
	
	public function get_guardian_query(){

		$query = $this->db->select('*')->from('rp_guardian_master')
	   			 ->get();

	   	return $query->result();

	}
	
	public function get_education_query(){

		$query = $this->db->select('*')->from('rp_education_qualification_master')
       			 ->get();

       	return $query->result();

	}

	public function get_cast_query(){

		$query = $this->db->select('*')->from('rp_caste_master')
       			 ->get();

       	return $query->result();

	}

	public function get_religion_query(){

		$query = $this->db->select('*')->from('rp_religion_master')
       			 ->get();

       	return $query->result();

	}

	public function get_district_query(){

		$query = $this->db->select('district_id_pk,district_name,schcd')->from('rp_location_master_district')
       			 ->where("length(schcd) = '4' order by district_name")->get();

       	return $query->result();

	}

	public function get_cur_district_query(){

		$query = $this->db->select('district_id_pk,district_name,schcd')->from('rp_location_master_district')
       			 ->where("length(schcd) = '4' order by district_name")->get();

       	return $query->result();

	}

	public function get_block_query($district_id){

		$query = $this->db->select('block_id_pk,block_name,schcd')->from('rp_location_master_block')
       			 ->where("length(schcd) = '6' and schcd LIKE '$district_id%' order by block_name")->get();
		return $query->result();
		
	}

	public function get_cur_block_query($cur_district_id){

		$query = $this->db->select('block_id_pk,block_name,schcd')->from('rp_location_master_block')
       			 ->where("length(schcd) = '6' and schcd LIKE '$cur_district_id%' order by block_name")->get();
		return $query->result();
		
	}

	public function get_bank_query(){

		$query = $this->db->select('code,description,account_length')->from('rp_bank_master')
       			 ->where("status = '1' order by description")->get();
		return $query->result();
		
	}

	public function get_ifsc_query($bank_id){

		$query = $this->db->select('ifsc')->from('rp_bank_master')
       			 ->where("code = '$bank_id' ")->get();
		return $query->row();
		
	}

	public function get_applicant_code(){

		$query = $this->db->select('max(applicant_id) as code')->from('rp_applicant_basic_details')
       			 ->where("applicant_id like '19110418%'")->get();
		return $query->row();
	}
	
	public function selectValues(){
		$query = $this->db->get('rp_declaration_master');
		return $query;
	}
}