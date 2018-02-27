<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Contact extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

		$this->load->helper(array('form','file'));

		// $this->load->library(array('form_validation'));

		$this->load->model(array('Parse_xml','Common_model'));

		

	} 
	public function index()
	{
		
		$sportFK = 1;//1 for socceer.

        $data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");

		$data["list"] = $this->Parse_xml->get_live_list($sportFK);

		$data["leagues"] = $this->Common_model->get_all_orderby("tournament_stage","id asc");

		$data["banners"] = $this->Common_model->get_all_orderby("admin_banners","id asc");

		// $this->test($data['banners']);
		$this->load->view("contact",$data);
	}
	public function getContact()
	{

                $this->load->model("Send_mail");
                
                $to = "rajat@neowebsolution@gmail.com";

				$name = $this->input->post('txt_name',true)." ".$this->input->post('txt_lname',true);;
				$from = $this->input->post('txt_email',true);

				$subject = $this->input->post('txt_topic',true);
         		$header = 'Contact Us Form';

         		$data["name"] = $name;
         		$data["email"] = $from;
         		$data["subject"] = $this->input->post('txt_topic',true);
         		$data["message"] =  $this->input->post('txt_message',true);

         		$message = $this->load->view("email_contactus_template",$data,true);
          		

		  	$num = $this->Send_mail->mail_send($from,$header,$to,$subject,$message);
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
