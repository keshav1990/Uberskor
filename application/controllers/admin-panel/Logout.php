<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
public function __construct()
	{
            parent::__construct();
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            		
			if ($this->session->userdata('admin_logged_in')!=1){
			redirect($this->config->item('admin_base_url')."login");
			}
	} 

	public function index()
	{
		$this->loggedout();
	}
	
	public function loggedout()
            {
		$array_items = array('admin_user_id' => '',"admin_name"=> '', 'admin_logged_in'=>'','admin_user_email'=>'','admin_access_level'=>'');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
               
                redirect($this->config->item('admin_base_url').'login');
            }
}
?>