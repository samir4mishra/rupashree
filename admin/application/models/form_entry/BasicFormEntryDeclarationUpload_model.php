<?php

class BasicFormEntryDeclarationUpload_model extends CI_Model{


public function doc_insert($data=array()){
		
		$this->db->set('doc_image','doc_image_extension',false);
		$this->db->where('id','id');
		$this->db->update('photo',$data);
		if($query)
		{
			$this->session->set_flashdata('success', 'Photo Update Succcessfully');
			redirect('./admin/form_entry/Declarationupload');
		}
		else
		{
			$this->session->set_flashdata('error', 'Somthing worng. Error!!');
			redirect('./admin/form_entry/Declarationupload');
		}		
	}

}