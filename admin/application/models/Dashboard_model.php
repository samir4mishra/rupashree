<?php
defined('BASEPATH') OR exit('No direct script access allowed' );

class Dashboard_model extends CI_Model {

	public function get_register_count_from_block() {
		
		$query = $this->db->select('count(*)')
				->from('rp_applicant_basic_details AS a')
				->join('rp_status_details AS b', 'a.applicant_id = b.applicant_id')
				->where(
					array(
						'b.current_status' => 6,
						'b.complete_entry_time !=' => NULL
					)
				)->get();
			$course_count = $query->result_array();
			
			return $course_count;
		
	}
}