<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class BasicFormEntryDeclarationUpload extends NIC_Controller
	{
		
		public function __construct()
		{
		parent::__construct();
		parent::check_login();
		$this->load->helper('file');
		$this->load->library('upload');
		$this->load->model('./form_entry/BasicFormEntryDeclarationUpload_model');
		}
		
		public function index()
		{
			$this->load->view('./form_entry/rp_basic_form_entry_declaration_upload_view.php');
		}

		public function submit_declaration(){

			$this->load->helper('file');
	 		$this->load->library('upload');

	 		$imgdata = $_FILES['upload_file']['name'];

	 		if(mime_content_type($_FILES['upload_file']['tmp_name']) == 'image/jpeg')
			{
				//$name= "12345";
				$vumd=explode('.',$imgdata);
				$valid_unmd = end($vumd);
				$unmd = $name.'_docs.'.$valid_unmd;
				$photo_path = './upload_pic'.'/'.$unmd;
			
					if(copy($_FILES['upload_file']['tmp_name'],$photo_path))
					{
						
						//imageCompression_ocr($photo_path,375,$photo_path);
						
						//create_watermark_from_string($photo_path,$photo_path,'Hello World','Hello World',14,'CCCCCC',75,0,22);
						// Load the stamp and the photo to apply the watermark to
						$im = imagecreatefromjpeg($photo_path);
					
						// First we create our stamp image manually from GD
						$stamp = imagecreatetruecolor(375, 20);
						//	imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
						//	imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
						//$im = imagecreatefromjpeg($photo_path);
						//	imagestring($stamp, 5, 20, 20, '19110414103', 0x0000FF);
						imagestring($stamp, 1, 15, 5, '19110414103', 0xf10f0f);
					
						// Set the margins for the stamp and get the height/width of the stamp image
						$marge_right = 10;
						$marge_bottom = 30;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);
					
						// Merge the stamp onto our photo with an opacity of 50%
						imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
					
						// Save the image to file and free memory
						imagejpeg($im, $photo_path);
						imagedestroy($im);
					
					 	$file_content=unpack('H*', file_get_contents($photo_path));
					 
					 	$data=array(

                		'doc_image'	=> $file_content[1],
                		'doc_image_extension' => $valid_unmd

                		);

                		$this->declarationupload_model->doc_insert();

					 
					
					}
			}
	 		


        }
		
		
	}