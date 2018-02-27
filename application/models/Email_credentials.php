<?php 
class Email_credentials extends CI_Model {

	public function get_credentials()
	{
		$query = $this->db->order_by('id',"ASC")->limit(1)->get('email_credentials')->result();
		$config = array();
		if(!empty($query))
		{
				foreach ($query as $val) {
				$config['protocol'] = $val->protocol;
			    $config['smtp_host'] = $val->smtp_host; //change this
			    $config['smtp_port'] = $val->smtp_port;
			    $config['smtp_user'] = $val->smtp_user; //change this
			    $config['smtp_pass'] = $val->smtp_pass; //change this
			    /* $config['mailtype'] = 'html';
			    $config['charset'] = 'iso-8859-1';
			    $config['newline'] = "\r\n"; */
			    //$config['crlf'] = "\r\n";
				//$config['wordwrap'] = TRUE;
				
				
            $config['smtp_timeout'] = '7';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = FALSE;
				}
		}
		else{
			$this->config->load('email');
      		$config = $this->config->item('email_credentials');
		}
		return $config;
		// print_r($config);
	}

	public function get_dbcredentials()
	{
		$query = $this->db->get('email_credentials')->result();
		$config = array();
	
				foreach ($query as $val) {
				$config['id'] = $val->id;
				$config['protocol'] = $val->protocol;
			    $config['smtp_host'] = $val->smtp_host; //change this
			    $config['smtp_port'] = $val->smtp_port;
			    $config['smtp_user'] = $val->smtp_user; //change this
			    $config['smtp_pass'] = $val->smtp_pass; //change this
			    $config['mailtype'] = 'html';
			    $config['charset'] = 'iso-8859-1';
			    $config['wordwrap'] = TRUE;
			    $config['newline'] = "\r\n";
			    $config['crlf'] = "\r\n";
				}
			return $config;
	
		// print_r($config);
	}	


}