<?php
class Social extends CI_Controller {

  public function __construct() {
     parent::__construct();

       $this->load->helper('form');
       $this->load->helper('url');
	}

    public function session($provider) {

        $this->load->model("Common_model");
        $social = $this->Common_model->get_all_orderby('social_login',"id asc");

         $this->load->helper('url_helper');
         //facebook
         //print_r($provider);
         //exit;
        // print_r($social);
          //  exit;
         if($provider == 'facebook') {
            $app_id = $social[0]->fb_appid;
		    $app_secret = $social[0]->fb_appsecret;
		    $provider	= $this->oauth2->provider($provider, array(
			'id' => $app_id,
			'secret' => $app_secret,
			));

		}
	//google
		else if($provider == 'google'){

			$app_id 		= $social[0]->googleplus_appid;
			$app_secret 	= $social[0]->googleplus_appsecret;
			$provider 		= $this->oauth2->provider($provider, array(
				'id' => $app_id,
				'secret' => $app_secret,
			));
		}


	if ( ! $this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
            redirect('social?error');
        }
        else
        {
            //echo "Hello";
            // Howzit?
            try
            {

              $token = $provider->access($_GET['code']);
             // print_r($token);
               //  print_r($provider);
                //exit;
              // $token = "EAAGnPufm9lgBAHJtavfZAIF3SmjU3xr8ZBxHsWLceNuwLYbZAiEn5xDPdlqxcXYifmbP18AZCOkxwRzgsNyK2IZBTdmOdq74qjpgIdHvfiZCZA9mUJYyFDb9kLbqLVeA2bS0bkyfg6lsO3yZBpGtVaWiX7nxEsFxNvIVQvhy1CvFrQZDZD";
                $user = $provider->get_user_info($token);

                if($this->uri->segment(3) == 'google'){
					$provider = 'google';
                  //Your code stuff here
                  /* $logindata = array('user_id'=>$user['uid'],'name'=>$user['name'],'user_email'=>$user['email'],'access_level'=>3,'logged_in'=>TRUE);
                  $this->session->set_userdata($logindata); */
                //  print_r($logindata);
                }

                elseif($this->uri->segment(3) == 'facebook'){
					$provider = 'facebook';
                  //Your code stuff here
                  /* $logindata = array('user_id'=>$user['uid'],'name'=>$user['name'],'user_email'=>$user['email'],'access_level'=>3,'logged_in'=>TRUE);
                  $this->session->set_userdata($logindata); */
                 // print_r($logindata);
            	  }
			 $data = array(
			  'email'=>$user['email'],
			  'name'=>$user['name'],
			  'access_level'=>3,
			  'is_active'=>1,
			  'provider'=>$provider
			  );
			  $userdata = $this->Common_model->get_where('login',array('email'=>$user['email'],'provider'=>$provider));
			  if(empty($userdata))
			  {
			   $num = $this->Common_model->insert('login',$data);
			  }
			  else
			  {
				$num =$userdata[0]->id;  
			  }
			
			$logindata = array('user_id'=>$num,'name'=>$user['name'],'user_email'=>$user['email'],'access_level'=>3,'logged_in'=>TRUE);
                  $this->session->set_userdata($logindata);
        	   //$this->session->set_flashdata('info',$message);
            redirect(base_url());

            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }

    }


}