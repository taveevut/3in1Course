<?php

/**
 *
 */
class UploadFile_library {
	public $CI;

	function __construct() {
		$this->CI = &get_instance();
	}

	public function do_upload($file,$type = TRUE ,$path) {


		$config['upload_path']          = 'uploads/'.$path.'/'.date('Y').'/'.date('m');
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|bmp';
		//$config['max_size']             = 300;
		$config['encrypt_name']         = TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
	

		if (!is_dir($config['upload_path'] ))
		{
			mkdir('./'.$config['upload_path'] , 0777, true);
		}

		$this->CI->load->library('upload', $config);
        
		if ( ! $this->CI->upload->do_upload($file))
		{
			$data = array('error' => $this->CI->upload->display_errors());
		}
		else
		{
			$data = array('index' => $this->CI->upload->data());
		}
		return $data;
		
	}

	

}

?>
