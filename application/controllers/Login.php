<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    	/*if ($this->session->userdata('logged_in')==1 && $this->session->userdata('user_email')!=""){
			redirect(base_url());
		}*/
	}

	public function email_validate(){
		$email = $this->db->escape_str($this->input->post("txt_email",true));
		$this->load->model(array("Common_model"));
		$res = $this->Common_model->get_where("login",array("email"=>$email));
		echo (empty($res)?"true":"false");
	}
    public function check_email(){
		$email = $this->db->escape_str($this->input->post("forgotpass_email",true));
		$this->load->model(array("Common_model"));
		$res = $this->Common_model->get_where("login",array("email"=>$email));
		echo (empty($res)?"false":"true");
	}
	public function adminLogin(){

		$this->load->library("form_validation");
		$this->form_validation->set_rules("txt_email","Username","required");
		$this->form_validation->set_rules("txt_password","Password","required");

		if($this->form_validation->run()==false)
		{
            $msg = array('status' => 'danger', 'msg' =>"Invalid Login Credentials !");
        	$this->session->set_flashdata($msg);
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
		}
		else
		{
			$this->load->library('encrypt');
			$cipher = new Cipher($this->config->item('encryption_key'));
			$where = array(
				'password' => $cipher->encrypt($this->input->post('txt_password',true)),
				'email' => $this->input->post('txt_email',true)
			);
			$this->load->model(array("Login_model"));
			$num = $this->Login_model->get_login_where('login',$where,1);

			if($num > 0)
			{
		//$this->output->clear_all_cache();
				$row = $this->Login_model->get_login_where('login',$where,0);
				$logindata = array('user_id'=>$row[0]->id,'name'=>$row[0]->name,'user_email'=>$row[0]->email,'access_level'=>$row[0]->access_level,'logged_in'=>TRUE);
				$this->session->set_userdata($logindata);
				$url = $_SERVER['HTTP_REFERER'];

				redirect($url);
			}
			else
			{
				$error = array('user'=>'No');
				$this->session->set_userdata($error);
				$this->session->set_flashdata('msg', 'Username or password incorrect');
				$url = $_SERVER['HTTP_REFERER'];
				redirect($url);
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
			  'name'=>$this->filterval($this->input->post('txt_name',true)),
			  'password'=>$cipher->encrypt($this->input->post('txt_password',true)),
			  'access_level'=>3,
			  'is_active'=>1,
			  );
			$num = $this->Common_model->insert('login',$data);
	        if($num>0)
			{
			$logindata = array('user_id'=>$num,'name'=>$data['name'],'user_email'=>$data['email'],'access_level'=>3,'logged_in'=>TRUE);
			$this->session->set_userdata($logindata);
			$msg = array('status' => 'success', 'msg' => 'Account Created Successfully');
	        $this->session->set_flashdata($msg);
			}
	        else
			{
			  $msg = array('status' => 'danger', 'msg' => 'Operation Un-successfully');
	          $this->session->set_flashdata($msg);
			}
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);

	}
	public function filterval($val){
		$newVal = $this->db->escape_str($val);
		return $newVal;
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

    public function check_status_header(){
        if($this->session->userdata('logged_in') != 1){ ?>
             <div class="login_register">
			<button class="Register" onclick="$('.Overpop6').fadeIn();">Kayıt</button>
				<button class="Login" onclick="$('.Overpop5').fadeIn();">Giriş</button>
             </div>
            <?php } else{ ?>



							<div class="login_inner">
							  <span class="my-accunt"><img src="<?=base_url('assets/images/over-login.png')?>" alt=""> Hesabım</span>
							  <div class="login-list-main">
							  <ul class="m-sccnt-logn">
							    <li class="name-lg" ><?php echo ucwords($this->session->userdata('name')); ?> </li>
								<li class="accnt_details" onclick="$('.Overpop3').fadeIn();">Hesap Detayları</li>
								<li class="logout_btn">
								<a href="<?php echo base_url('logout'); ?>" ><img src="<?=base_url('assets/images/mob-log.png')?>" alt=""> Çıkış</a></li>
								</ul></div>

							</div>

							<?php }
    }

  public function  my_leagues()
  {
	$this->load->model("Common_model");

	if($this->input->post('checked_val')=='true')
	{
	 $data = array(
			  'user_fk'=>$this->session->userdata('user_id'),
			  'sportFK'=>$this->input->post('sportFK',true),
			  'events_fk'=>$this->input->post('events_fk',true)
			  );
			$num = $this->Common_model->insert('users_events',$data);
	        echo $num;
	}
	else
	{
	 $num = $this->Common_model->delete('users_events',array('user_fk'=>$this->session->userdata('user_id'),'events_fk'=>$this->input->post('events_fk',true)));
	 echo $num;
	}
  }

  public function  my_team()
  {
	$this->load->model("Common_model");
	//print_r($this->input->post()); exit;
	if($this->input->post('is_delete')=='')
	{

	 $data = array(
			  'user_fk'=>$this->session->userdata('user_id'),
			  'sportFK'=>$this->input->post('sportFK',true),
			  'tournamentstage_fk'=>$this->input->post('events_fk',true),
			  'url'=>$this->input->post('url',true),
			  'alldata'=>json_encode($this->input->post('alldata',true)),
			  );
			$num = $this->Common_model->insert('users_teams',$data);
	        echo $num;
	}
	else
	{
	 $num = $this->Common_model->delete('users_teams',array('user_fk'=>$this->session->userdata('user_id'),'tournamentstage_fk'=>$this->input->post('events_fk',true)));
	 echo $num;
	}
  }
  public function update_password(){
     $this->load->model("Common_model");
     $this->load->library('encrypt');
			$cipher = new Cipher($this->config->item('encryption_key'));
			$where = array(
				'password' => $cipher->encrypt($this->input->post('old_password',true)),
				'email' => $this->session->userdata('user_email')
			);
			$this->load->model(array("Login_model"));
			$num = $this->Login_model->get_login_where('login',$where,1);

			if($num > 0)
			{
			    $data = array('password' => $cipher->encrypt($this->input->post('ch_password',true)));
                $num = $this->Common_model->update('login',$data,array('id'=>$this->session->userdata('user_id')));
                $msg = array('status' => 'success', 'msg' => 'Password updated successfully.');
	            $this->session->set_flashdata($msg);

			}else{
                $msg = array('status' => 'danger', 'msg' => 'Old Password doesn\'t match.');
	            $this->session->set_flashdata($msg);


			}
            $url = $_SERVER['HTTP_REFERER'];
			redirect($url);
  }
  public function updateinfo()
  {
	 $this->load->model("Common_model");
			  $data = array(
			  'email'=>$this->input->post('user_email',true),
			  'name'=>$this->input->post('user_name',true).' '.$this->input->post('user_surname',true)
			  );
			$num = $this->Common_model->update('login',$data,array('id'=>$this->session->userdata('user_id')));
	        if($num>0)
			{

			$this->session->set_userdata('name', $data['name']);
			$this->session->set_userdata('user_email', $data['email']);
			$msg = array('status' => 'success', 'msg' => 'Infromation updated Successfully');
	        $this->session->set_flashdata($msg);
			}
	        else
			{
			  $msg = array('status' => 'danger', 'msg' => 'Operation Un-successfully');
	          $this->session->set_flashdata($msg);
			}
			$url = $_SERVER['HTTP_REFERER'];
			redirect($url);
  }
  
}
