<?php
defined('BASEPATH') OR exit('No direct script access allowed' );

class Status_model extends CI_Model {
	
	public function insert_app_status_query($status_data){

		$this->db->insert('rp_status_details', $status_data);
		return true;
	}
	public function update_groom_status_query($applicant_id)
	{
		return $this->db
               ->where('applicant_id', $applicant_id)
               ->update('rp_status_details', array('current_status' => 2));
	}
	public function update_app_photo_status_query($applicant_id)
	{
		return $this->db
               ->where('applicant_id', $applicant_id)
               ->update('rp_status_details', array('current_status' => 3));
	}
	public function update_groom_photo_status_query($applicant_id)
	{
		return $this->db
               ->where('applicant_id', $applicant_id)
               ->update('rp_status_details', array('current_status' => 4));
	}
	public function update_declaration_photo_status_query($applicant_id)
	{
		return $this->db
               ->where('applicant_id', $applicant_id)
               ->update('rp_status_details', array('current_status' => 5));
	}
	public function update_declaration_status_query($applicant_id)
	{
		return $this->db
               ->where('applicant_id', $applicant_id)
               ->update('rp_status_details', array('current_status' => 6 ,'complete_entry_time' => 'now()' ));
	}
	
}