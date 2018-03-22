<?php

class BasicFormEntryPhotoUpload_model extends CI_Model{


	public function photo_insert($data=array()){

		$query = $this->db->insert('rp_photograph_details',$data);
		
	}
	
	public function groom_photo_insert($data){
		
		$id = $this->session->userdata('d_cd');
		
		return $this->db->where('applicant_id', $id)
				->update('rp_photograph_details', $data);		
	}	
	

}