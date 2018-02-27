<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
       
	} 

	public function index()
	{
		redirect(base_url());//$this->load->view("admin-panel/reset-password");
	}
	
	function send_mail()
			{
				
	  $this->load->model("Common_model");
                $this->load->model("Send_mail");
				$email = $this->input->post('forgotpass_email');
				$user = $this->Common_model->get_where('login',array('email' =>$email));
				if(!empty($user))
				{
				$key = md5(1290*3+$user[0]->id);
				$this->Common_model->update('login',array('resetpassword_key'=>$key),array('id'=>$user[0]->id));
				$to = $email;
				
				$subject = 'Forgot Password Link';
				$message = '<html>
				<head>
    <meta charset="UTF-8">
    <title></title>
</head>
				<body>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center" valign="top" bgcolor="#387cd1"><table width="600" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" valign="top">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="left" valign="top">&nbsp;</td>
						  </tr>
						
						  <tr>
							<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="30">
							  <tr>
								<td align="left" valign="top" bgcolor="#FFFFFF"><h1 style="font-family:Arial; font-size:17px; color:#000; padding:0px; margin:0px;">Password Reset Confirmation</h1>
								<p style="font-family:Arial; font-size:14px; color:#555; padding:0px; margin:0px;"><br />Hello,<br /><br />
					
								You recently requested a new '.COMPANYNAME.' password. <br /><br />
					
								To reset your password, follow the link below:<br />
								<a href="'.base_url().'forgotpassword/change_password/'.$user[0]->id.'/'.$key.'" style="text-decoration:none; color:#564eff;">'.base_url().'forgotpassword/change_password/'.$user[0]->id.'/'.$key.'</a><br /><br />
					
								If you did not reset your password, please disregard this message.<br /><br /><br />
								
								Support Team<br />
								<b>'.COMPANYNAME.'</b></p></td>
							  </tr>
							</table></td>
						  </tr>
						
						  <tr>
							<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="30">
							  <tr>
								<td align="center" valign="top" bgcolor="#FFFFFF">
								<p style="font-family:Arial; font-size:13px; color:#555; padding:0px; margin:0px;"><a href="'.COMPANYNAME.'" style="text-decoration:none;">'.COMPANYNAME.'</a></p>
								<p style="font-family:Arial; font-size:13px; color:#555; padding:0px; margin:0px; line-height:22px;"><a href="'.base_url().'" style="text-decoration:none;">Terms & Conditions</a> | <a href="'.base_url().'" style="text-decoration:none;">Privacy Policy</a></p>
								<p style="font-family:Arial; font-size:12px; color:#888; padding:0px; margin:0px;">Please do not reply to this email. Emails sent to this address will not be answered.</p></td>
							  </tr>
							</table></td>
						  </tr>
						  <tr>
							<td align="left" valign="top">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="left" valign="top">&nbsp;</td>
						  </tr>
						</table></td>
					  </tr>
					</table>
				</body>
		</html>';
				
         
          
		   $num = $this->Send_mail->send_mail($to,$subject,$message);
		 
           /* $this->load->library('email');
            
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'send.one.com';
            $config['smtp_port']    = '25';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'rajat@neowebsolution.com';
            $config['smtp_pass']    = 'rajat@123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = FALSE;

            $this->email->initialize($config);
            $this->email->from('rajat@neowebsolution.com','Task Manager');
            $this->email->to($to); 
            $this->email->subject($subject);

           $this->email->message($message);  
            $num = $this->email->send(); */
			//echo $this->email->print_debugger(); exit;
            if ($num==1)
						{
						die(json_encode(array('message'=>'Forgot Password link successfully send. Please check your email-id.')));
						/* $this->session->set_flashdata('forgot_msg', 'Forgot Password link successfully send. Please check your email-id.');			
						$url = $_SERVER['HTTP_REFERER'];
                        redirect($url); */
						}
						else
						{
						die(json_encode(array('message'=>'Oppss.... Some error is occur. Please re-try !')));
						/* $this->session->set_flashdata('forgot_msg', 'Oppss.... Some error is occur. Please re-try !');			
						$url = $_SERVER['HTTP_REFERER'];
                        redirect($url); */
						}
		}
      else
	  {
		die(json_encode(array('message'=>'This email is not resistered with us!')));
		/* $this->session->set_flashdata('forgot_msg', 'This email is not resistered with us!');
		 $url = $_SERVER['HTTP_REFERER'];
         redirect($url); */
	  }				  
			
			
  
			}
			
			public function change_password($id,$key)
			{   $this->load->model('Common_model'); 
                if(!empty($id))	
				{					
					$data['userdata'] = $this->Common_model->get_where('login',array('id' =>$id,'resetpassword_key'=>$key));
					
					if(!empty($data['userdata']))
					{
					//$this->load->view('change-password',$data);
					redirect(base_url().'?change_password='.$id);
					}
					else
					{
				        $this->session->set_flashdata('forgot_msg', 'This is not a valid key!');
						redirect(base_url());
					}
				}
			}
			
		public function save_password()
        {
           $this->load->model('Common_model');
            $id = $this->input->post('user_id');
            $this->load->library('encrypt');
			$cipher = new Cipher($this->config->item('encryption_key'));
            $update_data =array('password' => $cipher->encrypt($this->input->post('new_pass')));
             $num = $this->Common_model->update('login',$update_data, array('id' => $id));
               if($num>0)
				{
					$this->session->set_flashdata('msg_login', 'Your password successfully changed.');			
					redirect($this->config->item('admin_base_url').'login'); 
                }
               else
                {
				$this->session->set_flashdata('msg_login', 'Oppss.... Some error is occur. Please re-try !');			
				$url = $_SERVER['HTTP_REFERER'];
				redirect($url);
                }
        }

	
}
?>