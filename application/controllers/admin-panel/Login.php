<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	} 
	public function index(){
		$this->load->view("admin-view/login");
	}

	public function adminLogin(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("txt_email","Username","required");
		$this->form_validation->set_rules("txt_password","Password","required");

		if($this->form_validation->run()==false)
		{

			$msg = array('status' => 'danger', 'msg' =>"Invalid Login Credentials !");
        	$this->session->set_flashdata($msg);	
			redirect($this->config->item('admin_base_url').'login');
		}
		else
		{
			$this->load->library('encrypt');
			$cipher = new Cipher($this->config->item('encryption_key'));
			$where = array(
				'password' => $cipher->encrypt($this->input->post('txt_password',true)),
				'email' => $this->input->post('txt_email',true),
				'access_level' => 1
			);
			$this->load->model(array("Login_model"));
			$num = $this->Login_model->get_login_where('login',$where,1);

			if($num > 0)
			{	
				$row = $this->Login_model->get_login_where('login',$where,0);
				$logindata = array('admin_user_id'=>$row[0]->id,'admin_name'=>$row[0]->name,'admin_user_email'=>$row[0]->email,'admin_access_level'=>$row[0]->access_level,'admin_logged_in'=>TRUE);
				// $this->test($logindata);
				$this->session->set_userdata($logindata);				
				redirect($this->config->item('admin_base_url').'home');				
			}
			else
			{	

				$msg = array('status' => 'danger', 'msg' =>"Invalid Login Credentials !");
	        	$this->session->set_flashdata($msg);	
				redirect($this->config->item('admin_base_url').'login');
			}
		}
	}

	public function userRegistration()
	{
	  $this->load->model("Common_model");
	  $this->load->library(array('encrypt'));	  
	  $cipher = new Cipher($this->config->item('encryption_key'));
			  $data = array(
			  'email'=>$this->input->post('txt_email',true),
			  'password'=>$cipher->encrypt($this->input->post('txt_password',true)),
			  'access_level'=>3,
			  'is_active'=>1,
			  );
			$num = $this->Common_model->insert('login',$data);  
	        if($num>0)
			{
			$logindata = array('admin_user_id'=>$num,'admin_user_email'=>$data['email'],'admin_access_level'=>1,'admin_logged_in'=>TRUE);
			//$this->session->set_userdata($logindata);
			//$msg = array('status' => 'success', 'msg' => 'Account Created Successfully');
	        //$this->session->set_flashdata($msg);
			}
	        else
			{
			  $msg = array('status' => 'danger', 'msg' => 'Operation Un-successfully');
	          $this->session->set_flashdata($msg);	
			}
	       redirect(base_url());		
				  
	}

	public function test($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		exit;
	}
	public function qry()
	{
		 print_r($this->db->last_query());
		 exit;
	}




}
