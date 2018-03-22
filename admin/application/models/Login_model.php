<?php
defined('BASEPATH') OR exit('No direct script access allowed' );

class Login_model extends CI_Model {

	public function check_user($login_id=NULL, $password=NULL) {
		//return $login_id . $password;
			$query = $this->db->select('login_id,stake_cd')
			->from('rp_login')
			->where(
				array(
					'login_id' => $login_id,
					'login_password' => md5($password),
					'active' => '1',
				)
			)->get();
		return $query->result_array();
	}
}
