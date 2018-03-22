<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BasicFormEntryApplicantPhotoUpload extends NIC_Controller{

	public function __construct()
	{
		parent::__construct();
		parent::check_login();
		$this->load->model('./form_entry/BasicFormEntryPhotoUpload_model');
	}

	public function index(){

		//$this->load->view('./form_entry/rp_basic_form_entry_applicant_photo_upload_view.php');
		$this->load->view($this->config->item('theme') . 'form_entry/rp_basic_form_entry_applicant_photo_upload_view');
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

                		$this->BasicFormEntryPhotoUpload_model->photo_insert($data);
						
						redirect('./admin/form_entry/BasicFormEntryGroomPhotoUpload');
						
				}
				
				
			}

	}

}
