<?php

class BasicFormEntryGroom_model extends CI_Model{

	public function basic_groom_registration($partial_groom_data=array()){

		$this->db->trans_begin();

		$this->db->insert('rp_applicant_groom_details',$partial_groom_data);

		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		}
	}

	public function basic_groom_address_registration($full_groom_data=array()){

			$this->db->trans_begin();

			$this->db->insert('rp_groom_address_details',$full_groom_data);

			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
			else
			{
				$this->db->trans_commit();
			}
	}

}