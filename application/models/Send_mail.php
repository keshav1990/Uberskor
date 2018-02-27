<?php 

class Send_mail extends CI_Model {

    

    public function sendmail($to,$subject,$message)

    {

      

      $this->load->model('Email_credentials');

      $email_credentials = $this->Email_credentials->get_credentials();

      $this->load->library('email');  

        $this->email->initialize($email_credentials);

      $this->email->from('rajat@neowebsolution.com','Task Manager');

      $this->email->to($to);

      $this->email->subject($subject);

      $this->email->message($message);

      #$this->email->set_mailtype("html");

      $num = $this->email->send();

      #echo $this->email->print_debugger();

      return $num;



    }

     public function send_mail($to,$subject,$message)

    {
		$this->load->library('email');
		$query = $this->db->order_by('id',"ASC")->limit(1)->get('email_credentials')->result();
		$config = array();
		if(!empty($query))
		{
				foreach ($query as $val) {
				$config['protocol']    = $val->protocol;
            $config['smtp_host']    = $val->smtp_host;
            $config['smtp_port']    = $val->smtp_port;
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = $val->smtp_user;
            $config['smtp_pass']    = $val->smtp_pass;
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
         $this->email->initialize($config);
            $this->email->from('rajat@neowebsolution.com','Task Manager');
            $this->email->to($to); 
            $this->email->subject($subject);

           $this->email->message($message);  
            $num = $this->email->send();
      return $num;



    }

    public function mail_send($from_email, $header_txt, $to, $subject, $message)

    {

	  

     $this->load->model('Email_credentials');

      $email_credentials = $this->Email_credentials->get_credentials();

      $this->load->library('email',array($email_credentials));  

      #  $this->email->initialize($email_credentials); 

      $this->email->from($from_email, $header_txt);

      $this->email->to($to);

      $this->email->set_mailtype("html");

      $this->email->subject($subject);

      $this->email->message($message);



      $num = $this->email->send();

        

      return $num;

    }



}

?>