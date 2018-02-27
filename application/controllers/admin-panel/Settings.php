<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in')!=1){
			redirect($this->config->item('admin_base_url')."login");
		}
		if ($this->session->userdata('admin_access_level')!=1){
			redirect($this->config->item('admin_base_url')."login");
		}
		$this->load->helper(array('form','file'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('Join_model','Common_model'));
	}


	public function profile()
	{
		$where=array('id'=>$this->session->userdata('admin_user_id'));
		$data['detail']=$this->Common_model->get_where('login',$where);
		// $this->test($data);
		$this->load->view("admin-view/profile",$data);
	}
	public function changepwd()
	{
		
	$this->load->model("Common_model");
	$this->load->library("form_validation");
	$this->form_validation->set_rules('npassword', 'New Password', 'required|matches[cpassword]');
	$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required');

		if($this->form_validation->run()==TRUE)
		{
			$this->load->library('encrypt');
			$cipher = new Cipher($this->config->item('encryption_key'));
			$where=array('id'=>$this->session->userdata('admin_user_id'));
			$data=array('password'=>$cipher->encrypt($this->input->post('npassword',true)));
			$num=$this->Common_model->update('login',$data,$where);	

			if($num>0)
			{
				$msg = array('status' => 'success', 'msg' =>'Password Changed successfully');
				$this->session->set_flashdata($msg);
				redirect($this->config->item('admin_base_url').'settings/profile');
			}	
			 else
			{
				 $msg = array('status' => 'danger', 'msg' =>'Unsuccessfull Operation !');
				 $this->session->set_flashdata($msg);
				 $url = $_SERVER['HTTP_REFERER'];
	             redirect($url);
			}
		}
		else{
				$where=array('id'=>$this->session->userdata('admin_user_id'));
				$data['detail']=$this->Common_model->get_where('login',$where);
				$this->load->view('admin-view/profile',$data);
		}

	}
	public function font()
	{
		$data["font"] = $this->Common_model->get_all_orderby("font_size","id ASC");
		$this->load->view("admin-view/manage_font",$data);
	}
	public function updatefont()
	{
		$this->form_validation->set_rules("sidebar_size","Sidebar Font Size","trim|required|integer");
		$this->form_validation->set_rules("body_size","Body Font Size","trim|required|integer");
		$this->form_validation->set_rules("midbody_size","Middle Body Font Size","trim|required|integer");
		$this->form_validation->set_rules("menu_size","Menu Font Size","trim|required|integer");
		$this->form_validation->set_rules("footer_size","Footer Font Size","trim|required|integer");

		if($this->form_validation->run() == true)
		{
			$data = array(
				"sidebar_size"=>$this->filterval($this->input->post("sidebar_size",true)),
				"body_size"=>$this->filterval($this->input->post("body_size",true)),
				"midbody_size"=>$this->filterval($this->input->post("midbody_size",true)),
				"menu_size"=>$this->filterval($this->input->post("menu_size",true)),
				"footer_size"=>$this->filterval($this->input->post("footer_size",true)),
				);
			// $this->test($data);
			$id = $this->input->post("id",true);
			if(!empty($id))
			{
				$num = $this->Common_model->update("font_size",$data,array("id"=>$id));	
			}
			else{
				//$num = $this->Common_model->insert("font_size",$data);
				$num = 0;
			}
			if($num>0)
			{
				$msg = array('status' => 'success','msg' =>"Font Size Updated Successfully !");
		        $this->session->set_flashdata($msg);
		        $url = $_SERVER['HTTP_REFERER'];
		       	redirect($url); 
			}	
		    else
		    {
				$msg = array('status' => 'danger', 'msg' =>"Operation Unsuccessfull !");
		        $this->session->set_flashdata($msg);
		        $url = $_SERVER['HTTP_REFERER'];
		        redirect($url); 
			}
		}
		else{
			
			$this->load->view("admin-view/manage_font");		
		}
	}
	public function filterval($val){
		$newVal = $this->db->escape_str($val);
		return $newVal;
	}

	public function clean_sql_post($val){
	$val =trim($val);
	$this->load->model("Common_model");
	//$val = str_replace('\n\n', "<br />", $val);
	$val = str_replace("\r","</br>",$val);
	$val = str_replace("\n","</br>",$val);
	$val = $this->db->escape_str($val);
	//$val = str_replace(array('\r\n', '\r', '\n'), "<br />", $val);
	return $val;
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