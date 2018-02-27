<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller

	{
	public function __construct()
		{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') != 1)
			{
			redirect($this->config->item('admin_base_url') . "login");
			}
		if ($this->session->userdata('admin_access_level') != 1)
			{
			redirect($this->config->item('admin_base_url') . "login");
			}
		$this->load->helper(array(
			'form',
			'file'
		));
		$this->load->library(array(
			'form_validation'
		));
		$this->load->model(array(
			'Join_model',
			'Common_model'
		));
		}	
	public function index()
		{
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes', "id ASC");
		$this->load->view('admin-view/clr_schemes', $data);
		}

	public function clrschemesUpdate()
		{
		$id = $this->input->post('rowid');
		$data = array(
			"body_color" => $this->input->post("bdyclr", true) ,
			"footer_color" => $this->input->post("ftrclr", true) ,
			"footer_font_color" => $this->input->post("ffontclr", true) ,
			"inner_body_color" => $this->input->post("inrbdyclr", true) ,
			"innerbody_font_color" => $this->input->post("inrbdyfnclr", true) ,
			"table_head_color" => $this->input->post("tblheadclr", true) ,
			"table_row_color" => $this->input->post("tblrowclr", true) ,
			"table_font_color" => $this->input->post("tblfontclr", true) ,
			"sidebar_color" => $this->input->post("sidebarclr", true) ,
			"sidebar_font_color" => $this->input->post("sidebarfontclr", true) ,
			"subfooter_color" => $this->input->post("subfooterclr", true) ,
			"subfooter_font_color" => $this->input->post("subfooterfontclr", true) ,
			"tophead_color" => $this->input->post("tophead_color", true) ,
			"sidebar_bottomlist_color" => $this->input->post("sidebar_bottomlist_color", true) ,
			"sidebar_bottomlist_font_color" => $this->input->post("sidebar_bottomlist_font_color", true) ,
			"last_list_color" => $this->input->post("last_list_color", true) ,
			"last_list_font_color" => $this->input->post("last_list_font_color", true) ,
		);

		//	 $this->test(	$id);

		if (($id))
			{
			$where = array(
				'id' => $id
			);
			$num = $this->Common_model->update('admin_color_schemes', $data, $where);

			//  $this->test($num);

			}
		  else
			{
			$num = $this->Common_model->insert('admin_color_schemes', $data);
			}

		if ($num > 0)
			{
			$msg = array(
				'status' => 'success',
				'msg' => "Color Scheme Updated Successfully !"
			);
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
			}
		  else
			{
			$msg = array(
				'status' => 'danger',
				'msg' => "Operation Unsuccessfull !"
			);
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
			}
		}

	public function preview()
		{
		$this->load->model("Parse_xml");
		$sportFK = 1; //1 for socceer.
		$data["list"] = $this->Parse_xml->get_live_list($sportFK);
		$data["leagues"] = $this->Common_model->get_all_orderby("tournament_stage", "id asc");
		$data["banners"] = $this->Common_model->get_all_orderby("admin_banners", "id asc");

		// $this->test($data);

		$this->load->view('preview', $data);
		}

	public function social()
		{
		$data["social"] = $this->Common_model->get_all_orderby('social_login', "id asc");
		$this->load->view('admin-view/social_credentials', $data);
		}

	public function updateCredentials()
		{
		$id = $this->input->post('id', true);
		$data = array(
			"fb_appid" => $this->input->post('fb_appid', true) ,
			"fb_appsecret" => $this->input->post('fb_appsecret', true) ,
			"googleplus_appid" => $this->input->post('googleplus_appid', true) ,
			"googleplus_appsecret" => $this->input->post('googleplus_appsecret', true) ,
		);
		if (!empty($id))
			{
			$where = array(
				'id' => $id
			);
			$num = $this->Common_model->update('social_login', $data, $where);
			}
		  else
			{
			$num = $this->Common_model->insert('social_login', $data);
			}

		if ($num > 0)
			{
			$msg = array(
				'status' => 'success',
				'msg' => "Social Credentials Updated Successfully !"
			);
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
			}
		  else
			{
			$msg = array(
				'status' => 'danger',
				'msg' => "Operation Unsuccessfull !"
			);
			$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
			}
		}

	public function filterval($val)
		{
		$newVal = $this->db->escape_str($val);
		return $newVal;
		}

	public function clean_sql_post($val)
		{
		$val = trim($val);
		$this->load->model("Common_model");

		// $val = str_replace('\n\n', "<br />", $val);

		$val = str_replace("\r", "</br>", $val);
		$val = str_replace("\n", "</br>", $val);
		$val = $this->db->escape_str($val);

		// $val = str_replace(array('\r\n', '\r', '\n'), "<br />", $val);

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

