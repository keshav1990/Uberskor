<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smtp extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in')!=1){
			redirect($this->config->item('admin_base_url')."login");
		}
		if ($this->session->userdata('admin_access_level')!=1){
			redirect($this->config->item('admin_base_url')."login");
		}
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('Common_model','Email_credentials'));
	}

	public function index()
	{
		$data['smtp']=$this->Email_credentials->get_dbcredentials();
		$this->load->view("admin-view/smtp",$data);
	}

	public function updateCredentials()
	{
		$this->load->library(array('form_validation',"email"));

	    $this->form_validation->set_rules("protocol","SMTP Protocol","required|trim");
	    $this->form_validation->set_rules("smtp_host","SMTP Host","required|trim");
	    $this->form_validation->set_rules("smtp_port","SMTP Port","required|trim");
	    $this->form_validation->set_rules("smtp_user","SMTP User","required|valid_email");
	    $this->form_validation->set_rules("smtp_pass","SMTP Password","required|trim");
	    
        if($this->form_validation->run() == FALSE){
        	$msg = array('status' => 'danger', 'msg' =>validation_errors());
			$this->session->set_flashdata($msg);
        	$this->index();
        }else{

		$id = $this->input->post('id',true);
		$data=array(
				"protocol"=>trim($this->input->post('protocol',true)),
				"smtp_host"=>trim($this->input->post('smtp_host',true)),
				"smtp_user"=>trim($this->input->post('smtp_user',true)),
				"smtp_pass"=>trim($this->input->post('smtp_pass',true)),
				"smtp_port"=>trim($this->input->post('smtp_port',true)),
				);
		if(empty($id)){
			$num=$this->Common_model->insert('email_credentials',$data);	
		}
		else{
			$where=array('id'=>$id);
			$num=$this->Common_model->update('email_credentials',$data,$where);
		}
	
		if($num>0)
		{
			$msg = array('status' => 'success', 'msg' =>'SMTP Updated successfully');
			$this->session->set_flashdata($msg);
		}	
		 else
		{
			$msg = array('status' => 'danger', 'msg' =>'! Error Found May Be  Incorrect Information or Database Error ');
			$this->session->set_flashdata($msg);
		}
		redirect($this->config->item('admin_base_url').'smtp');

        }

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