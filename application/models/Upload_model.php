<?php
class Upload_model extends CI_Model {

	public function image_upload($upload_path, $max_width, $max_height, $min_width, $min_height, $filename)
	{
			$config['upload_path'] = $upload_path;
			$config['file_name'] = date('Ymd_his_').rand(10,99).rand(10,99).rand(10,99);
			$config['allowed_types'] = "gif|jpg|png|jpeg|pdf|docx|JPG|JPEG|PNG";
			$config['overwrite'] = FALSE;
			$config['max_size']	= '0';
			$config['max_width']  = $max_width;
			$config['max_height']  = $max_height;
			$config['min_width']  = $min_width;
			$config['min_height']  = $min_height;
			$config['max_filename']  = '0';
			$config['remove_spaces']  = FALSE;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload($filename))
				{
					//print_r($this->upload->display_errors());
					/*$data['upload_data']['file_name'] = '';
					$msg = $this->upload->display_errors('');
					$this->session->set_flashdata('msg',$msg);	
					$url = $_SERVER['HTTP_REFERER'];
					redirect($url);	*/
                 return false;				
                 //return $error = array('error' => $this->upload->display_errors());				
				}
			else
				{
					$data = array('upload_data' => $this->upload->data());
					$config['source_image'] = $config['upload_path'].$data['upload_data']['file_name'];
					$config['quality'] = '100%';

					$this->load->library('image_lib', $config);
					return $data['upload_data']['file_name'];
				}
	unset($config);
  	$this->image_lib->clear();
	}
	
	public function zip_upload($upload_path, $filename)
	{
			$config['upload_path'] = $upload_path;
			$config['file_name'] = date('Ymd_his_').rand(10,99).rand(10,99).rand(10,99);
			$config['allowed_types'] = 'zip';
			$config['overwrite'] = FALSE;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload($filename))
				{
					$data['upload_data']['file_name'] = '';
					$msg = $this->upload->display_errors('');
					$this->session->set_flashdata('msg',$msg);	
					$url = $_SERVER['HTTP_REFERER'];
					redirect($url);		
				}
			else
				{
					$data = array('upload_data' => $this->upload->data());
					$config['source_image'] = $config['upload_path'].$data['upload_data']['file_name'];

					$this->load->library('image_lib', $config);
					return $data['upload_data']['file_name'];
				}
	unset($config);
  	$this->image_lib->clear();
	}
	
	public function file_upload($upload_path, $maxsize, $filename)
	{
			$config['upload_path'] = $upload_path;
			$config['file_name'] = date('Ymd_his_').rand(10,99).rand(10,99).rand(10,99);
			$config['allowed_types'] = 'gif|jpg|png|mpeg|mp4|mpg|mpe|mov|avi';
                        //$config['allowed_types'] = '*';
			$config['max_size']	= $maxsize;
			$config['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload($filename))
				{
					//$data['upload_data']['file_name'] = '';
					//$msg = $this->upload->display_errors('');
					//$this->session->set_flashdata('msg',$msg);	
					//$url = $_SERVER['HTTP_REFERER'];
					//redirect($url);
                                        return FALSE;
				}
			else
				{
					$data = array('upload_data' => $this->upload->data());
					$config['source_image'] = $config['upload_path'].$data['upload_data']['file_name'];

					$this->load->library('image_lib', $config);
					return $data['upload_data']['file_name'];
     
				}
	unset($config);
  	$this->image_lib->clear();			
	}

   public function pdf_upload($upload_path, $filename)
	{
			$config['upload_path'] = $upload_path;
			$config['file_name'] = date('Ymd_his_').rand(10,99).rand(10,99).rand(10,99);
			$config['allowed_types'] = 'pdf';
			$config['overwrite'] = FALSE;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload($filename))
				{
					$data['upload_data']['file_name'] = '';
					$msg = $this->upload->display_errors('');
					$this->session->set_flashdata('msg',$msg);	
					$url = $_SERVER['HTTP_REFERER'];
					redirect($url);		
				}
			else
				{
					$data = array('upload_data' => $this->upload->data());
					$config['source_image'] = $config['upload_path'].$data['upload_data']['file_name'];

					$this->load->library('image_lib', $config);
					return $data['upload_data']['file_name'];
				}
	unset($config);
  	$this->image_lib->clear();
	}
	

}
?>