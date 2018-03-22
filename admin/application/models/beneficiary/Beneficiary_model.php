<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiary_model extends CI_model {
		public function __construct(){
		parent::__construct();
		}

	public function get_applicant_list(){
		
		$query = $this->db->select('*')
		->from('rp_applicant_basic_details AS a')
		->join('rp_status_details AS b', 'a.applicant_id = b.applicant_id')
		/*->where(
				array(
					   'b.current_status' => 6,
					   'b.complete_entry_time !=' => NULL
					 )
				)*/
		->order_by('applicant_fname','DESC')
		/*->limit($limit, $offset)*/
		->get();
	return $query->result_array();
	}
}