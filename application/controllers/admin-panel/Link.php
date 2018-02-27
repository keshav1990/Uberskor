<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {
	
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
		$this->load->model(array('Common_model'));
	} 
	public function index()
	{
		$this->manageLink();
	}

	public function externalLink()
	{
		$this->load->view("admin-view/add_link");
	}

	public function addLink()
	{
		$this->form_validation->set_rules("txt_url","Url","trim|required|valid_url|prep_url");
		if($this->form_validation->run() == true)
		{	
			$data = array(
				"tr_name"=>$this->filterval($this->input->post("txt_tr_name",true)),
				"tr_alt"=>$this->filterval($this->input->post("txt_tr_alt",true)),
				"tr_title"=>$this->filterval($this->input->post("txt_tr_title",true)),
				"en_name"=>$this->filterval($this->input->post("txt_en_name",true)),
				"en_alt"=>$this->filterval($this->input->post("txt_en_alt",true)),
				"en_title"=>$this->filterval($this->input->post("txt_en_title",true)),
				"url"=>$this->filterval($this->input->post("txt_url",true)),
				"text_color"=>$this->filterval($this->input->post("color",true)),
				"bgcolor"=>$this->filterval($this->input->post("txt_bgcolor",true))
				);
			//$this->test($data);
			$num = $this->Common_model->insert("external_link",$data);
			if($num>0)
			{
				$msg = array('status' => 'success','msg' =>"External Link Added  Successfully !");
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
			$this->load->view("admin-view/add_link");		
		}
	}

	public function manageLink()
	{
		$data["links"] = $this->Common_model->get_all_orderby("external_link","id ASC");
		$this->load->view("admin-view/manage_link",$data);
	}

	public function editLink($id)
	{
		if(!empty($id))
		{
			$data["link"] = $this->Common_model->get_where("external_link",array("id"=>$id));
			$this->load->view("admin-view/edit_link",$data);
		}
		else{
			redirect($this->config->item("admin_base_url")."link/manageLink");
		}

	}
	
	public function updateLink()
	{
		$this->form_validation->set_rules("txt_url","Url","trim|required|valid_url|prep_url");
		if($this->form_validation->run() == true)
		{
			$data = array(
				"tr_name"=>$this->filterval($this->input->post("txt_tr_name",true)),
				"tr_alt"=>$this->filterval($this->input->post("txt_tr_alt",true)),
				"tr_title"=>$this->filterval($this->input->post("txt_tr_title",true)),
				"en_name"=>$this->filterval($this->input->post("txt_en_name",true)),
				"en_alt"=>$this->filterval($this->input->post("txt_en_alt",true)),
				"en_title"=>$this->filterval($this->input->post("txt_en_title",true)),
				"url"=>$this->filterval($this->input->post("txt_url",true)),
				"text_color"=>$this->filterval($this->input->post("txt_color",true)),
				"bgcolor"=>$this->filterval($this->input->post("txt_bgcolor",true))
				);
			$id = $this->input->post("linkId",true);
			if(!empty($id))
			{
				$num = $this->Common_model->update("external_link",$data,array("id"=>$id));	
			}
			else{
				$num = 0;
			}
			if($num>0)
			{
				$msg = array('status' => 'success','msg' =>"External Link Updated Successfully !");
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
			$this->load->view("admin-view/edit_link");		
		}
	}

	public function deleteLink($id)
	{
		if(!empty($id))
		{
	        $num = $this->Common_model->delete('external_link',array('id'=>$id));		 
			if($num>0)
			{
				$msg = array('status' => 'success', 'msg' => "Link has been deleted Successfully.");
			}	
			else
			{
				$msg = array('status' => 'danger', 'msg' => "Oppss.... Some error is occur. Please re-try !");
			}
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
        	redirect($url);
		}
		else{		
			redirect($this->config->item("admin_base_url")."link/manageLink");
		}
	}
	public function footer()
	{
		$data["detail"] = $this->Common_model->get_all_orderby("footer_content","id ASC");
		$this->load->view("admin-view/add_footer",$data);
	}
	public function updateFooter()
	{
		$id = $this->input->post("id",true);
		$data = array(
				"top_footer_content"=>html_escape($this->input->post("txt_desc")),
				"footer_one"=>html_escape($this->input->post("footer_one")),
				"footer_two"=>html_escape($this->input->post("footer_two")),
				"footer_three"=>html_escape($this->input->post("footer_three")),
				"txt_copyright"=>trim($this->input->post("txt_copyright",true))
				);
		// $this->test($data);
		if(!empty($id))
		{
			$num = $this->Common_model->update("footer_content",$data,array("id"=>$id));
		}
		else
		{
			$num = $this->Common_model->insert("footer_content",$data);
		}

			if($num>0)
			{
				$msg = array('status' => 'success', 'msg' => "Footer Updated Successfully.");
			}	
			else
			{
				$msg = array('status' => 'danger', 'msg' => "Oppss.... Some error is occur. Please re-try !");
			}
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
        	redirect($url);
	}
	
	public function subheader(){
		$data["detail"] = $this->Common_model->get_all_orderby("sub_header_content","id ASC");
		$this->load->view("admin-view/subheader_content",$data);
	}
	public function updateSubheader()
	{
		$id = $this->input->post("id",true);
		$data = array(
				"sub_header_content"=>html_escape($this->input->post("txt_desc",true)),
				);
		// $this->test($data);
		if(!empty($id))
		{
			$num = $this->Common_model->update("sub_header_content",$data,array("id"=>$id));
		}
		else
		{
			$num = $this->Common_model->insert("sub_header_content",$data);
		}

			if($num>0)
			{
				$msg = array('status' => 'success', 'msg' => "Sub Header Content Updated Successfully.");
			}	
			else
			{
				$msg = array('status' => 'danger', 'msg' => "Oppss.... Some error is occur. Please re-try !");
			}
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
        	redirect($url);
	}
	public function filterval($val){
		$newVal = $this->db->escape_str($val);
		return $newVal;
	}

	public function clean_sql_post($val){
	$val =trim($val);
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