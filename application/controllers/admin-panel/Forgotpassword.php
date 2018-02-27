<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
      	$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('Common_model'));
	} 

	public function index()
	{
		$this->load->view("admin-view/forgot_password.php");
	}
	
	function send_mail()
			{
				$this->load->model("Common_model");
                $this->load->model("Send_mail");
				$email = $this->input->post('txt_email');
				$user = $this->Common_model->get_where('login',array('email' =>$email));
				if(!empty($user))
				{
				$key = md5(1290*3+$user[0]->id);
				$this->Common_model->update('login',array('resetpassword_key'=>$key),array('id'=>$user[0]->id));
				$to = $email;
				$from = 'tarsem@neowebsolution.com';
				$subject = 'Forgot Password Link';
				$message = '
				<html>
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
								<a href="'.base_url().'admin-panel/forgotpassword/change_password/'.$user[0]->id.'/'.$key.'" style="text-decoration:none; color:#564eff;">'.base_url().'forgotpassword/change_password/'.$user[0]->id.'/'.$key.'</a><br /><br />
					
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
				
         
        $header ='Forgot Passward - Art Gallery';
          
		   $num = $this->Send_mail->mail_send($from,$header,$to,$subject,$message);
          
            if ($num == 1)
			{
				$msg = array('status' => 'success', 'msg' =>"Forgot Password link successfully send. Please check your email-id.");
				$this->session->set_flashdata($msg);			
				$url = $_SERVER['HTTP_REFERER'];
            	redirect($url);
			}
			else
			{
			$msg = array('status' => 'danger', 'msg' =>"Oppss.... Some error is occur. Please re-try !");
			$this->session->set_flashdata($msg);			
			$url = $_SERVER['HTTP_REFERER'];
            redirect($url);
			}
		}
      else
	  {
		$msg = array('status' => 'danger', 'msg' =>"This email is not registered with us!");
		$this->session->set_flashdata($msg);
		$url = $_SERVER['HTTP_REFERER'];
        redirect($url);
	  }				  
			
			}
			
		public function change_password($id,$key)
		{   $this->load->model('Common_model'); 
            if(!empty($id))	
			{					
				$data['userdata'] = $this->Common_model->get_where('login',array('id' =>$id,'resetpassword_key'=>$key));
				if(!empty($data['userdata']))
				{
					$this->load->view('admin-view/change_password',$data);
				}
				else
				{
			        $this->session->set_flashdata('forgot_msg', 'This is not a valid key!');
					redirect($this->config->item('admin_base_url').'forgotpassword');
				}
			}
		}
		
		public function save_password()
        {

		$this->load->library("form_validation");
		$this->form_validation->set_rules("txt_password","Password","trim|required");
		$this->form_validation->set_rules("txt_cpassword","Confirm Password","trim|required|matches[txt_password]");

			if($this->form_validation->run()==true)
			{
				$this->load->model('Common_model');
	            $id = $this->input->post('user_id');
	            $this->load->library('encrypt');
				$cipher = new Cipher($this->config->item('encryption_key'));
	            $update_data =array('password' => $cipher->encrypt($this->input->post('txt_cpassword')));
	            $num = $this->Common_model->update('login',$update_data, array('id' => $id));
	               if($num>0)
					{
						$msg = array('status' => 'success', 'msg' =>"Your password successfully changed.Please login with your new Credentials");
						$url = $this->config->item('admin_base_url').'login';
	                }
	               else
	                {
		               	$msg = array('status' => 'danger', 'msg' =>"Oppss.... Some error is occur. Please re-try !");
						$url = $_SERVER['HTTP_REFERER'];
	                }
	                $this->session->set_flashdata($msg);			
	                redirect($url);
			}
			else{
				$msg = array('status' => 'danger', 'msg' => validation_errors());
				$this->session->set_flashdata($msg);			
				$url = $_SERVER['HTTP_REFERER'];
				redirect($url);
			}
         
           	
        }

	
}
