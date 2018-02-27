<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Banners
Description : This function is used to Get and Update all games Banners.

Function : futboll
	Description : This function is used to get and shows  & update the all banners of the Futboll game.
	Called view : banners.php

Function : basketball
	Description : This function is used to get and shows  & update the all banners of the Basketball game.
	Called view : banners.php

Function : icehockey
	Description : This function is used to get and shows  & update the all banners of the Ice-Hockey game.
	Called view : banners.php
Function : update_banners
	Description : This is common banner update function. This function is used to update the banners of all games.
	Called view : No view	Function : tennis	Description : This function is used to get and shows  & update the all banners of the Ice-Hockey game.	Called view : banners.phpFunction : update_banners	Description : This is common banner update function. This function is used to update the banners of all games.	Called view : No view	
Function : test & qry
	Description : These functions are for testing purpose only for developer test() is to print data and qry() is to print the last query executed.

Date of created : 1-04-2017
Last Modified : 9-05-2017
	
*/
class Banners extends CI_Controller
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
			'Common_model'
		));
		}
/* @Description : this function is used to get and edit the futbool game banner */
	public function futboll()
		{
		$data['banners'] = $this->Common_model->get_all_orderby('futboll_banners', "id ASC");
		$this->load->view('admin-view/banners', $data);
		}
/* @Description : this function is used to get and edit the basketball game banner */
	public function basketball()
		{
		$data['banners'] = $this->Common_model->get_all_orderby('basketball_banners', "id ASC");
		$this->load->view('admin-view/banners', $data);
		}
/* @Description : this function is used to get and edit the icehockey game banner */
	public function icehockey()
		{
		$data['banners'] = $this->Common_model->get_all_orderby('icehockey_banners', "id ASC");
		$this->load->view('admin-view/banners', $data);
		}/* @Description : this function is used to get and edit the tennis game banner */	public function tennis()		{		$data['banners'] = $this->Common_model->get_all_orderby('tennis_banners', "id ASC");		$this->load->view('admin-view/banners', $data);		}
/* @Description : this function is used to update the all games banners */
	public function update_banners()
		{
		$id = $this->input->post('id', true);
		$banner_type = $this->input->post('banner_type', true);
		
			/*
			function is used to generate db table name according to the url 
			Note : if you change the url of games then you have to also change the database table name of banners.	
			*/			
		$url = $_SERVER['HTTP_REFERER'];
		$table = basename($url).'_banners';
		//function to upload image 
		$this->load->model('Upload_model');
		$path = './uploads/banners';
		$img = $this->Upload_model->image_upload($path, "", '', '', '', "banner");
		if ($img)
			{
			$data = array(
				"banner_type" => $banner_type ,
				"image" => $img,
			);
			if (!empty($id))
				{
				$where = array(
					'id' => $id
				);
				$num = $this->Common_model->update($table, $data, $where);
				}
			  else
				{
				$num = $this->Common_model->insert($table, $data);
				}
			}
	//if else to set flashdata message about updation of banner or not.
		if ($num > 0)
			{
			$msg = array(
				'status' => 'success',
				'type' => $banner_type,
				'msg' => "Banner Updated Successfully !"
			);
			$this->session->set_flashdata($msg);
			}
		  else
			{
			$msg = array(
				'status' => 'danger',
				'type' => $banner_type,
				'msg' => "Operation Unsuccessfull !"
			);
			$this->session->set_flashdata($msg);
			}
			
		$url = $_SERVER['HTTP_REFERER'];
		redirect($url);
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

