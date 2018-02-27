<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Common_model","Common_games_model"));
		if($this->uri->segment(4)){
			$game = urldecode($this->uri->segment('4'));
			$game = str_replace("-", " ", $game);
			$this->game = str_replace("+", " - ", $game);
			$sport= $this->Common_model->get_where("language",array("language_typeFK"=>31,"object"=>'sport',"name"=>$game));
			$this->sportFK = $sport[0]->objectFK;
		}
	}
	public function index()
	{
		$data["links"] = $this->Common_games_model->get_sports_list_with_language('31');
		$this->load->view("admin-view/sports_list",$data);
	}
	public function game()
	{
		$data["game"] = $this->game;
		 
		$data['sportFK'] = $this->sportFK;
		$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		  $country = $data["country"];
		  foreach ($country as $key => $val) {
			$leagues = $this->Common_games_model->get_country_leagues($this->sportFK, $val->id);
			if (!empty($leagues)) {
			  $data["country"][$key]->leagues = $leagues;
			}
			else {
			  unset($data["country"][$key]);
			}
		  }
		//$this->test($data);
		//die;
		
		/* $league = $this->Common_model->get_where("my_leagues",array("sportFK"=>$this->sportFK));
		if(!empty($league) && !empty(json_decode($league[0]->tournament_stageFK,true))){
			$where_in = json_decode($league[0]->tournament_stageFK,true);		
			$data["list"] = $this->Common_games_model->get_all_league_by_sports($this->game,$this->sportFK,$where_in);
		} */
		$this->load->view("admin-view/country_list",$data);
	}
	public function addLeague()
	{
		$this->load->helper('form');
		$data["game"] = $this->game;
		if($this->input->post('league_name'))
		{
			$data["text"] =$this->input->post('league_name',true);
		}
		$this->load->view("admin-view/addTo_leagues_list",$data);
	}
	public function getSearchedList()
	{
		if (!$this->input->is_ajax_request()) 
		{
		   show_error("No direct access allowed");
		}else{
			$text = $this->input->post('text',true);
			$leagues = $this->db->like('name',$text,"both")->where(array("startdate>="=>"2017-01-01 00:00:00"))->or_where(array("enddate>="=>"2017-01-01 00:00:00"))->get("tournament_stage")->result();
			$sql = "SELECT * FROM `tournament_stage` WHERE `name` LIKE '%$text%' ESCAPE '!' AND (`startdate` >= '2017-01-01 00:00:00' OR `enddate` >= '2017-01-01 00:00:00')";
			$leagues = $this->Common_model->direct_query($sql);
			if(!empty($leagues))
			{
				$where_in = array_map(function($v){
					   return $v->id;
					  },array_values($leagues));
				$data = $this->Common_games_model->get_all_league_by_sports($this->game,$this->sportFK,$where_in);
			}
			/* =========================================================== */
			$result = array('data' => array());
			$i = 1;
			foreach ($data as $key => $list) 
			{
				$action = '<button class="btn btn-primary bg-aqua btn-flat btn-sm " onclick=addToList('.$list->league_id.')><i class="fa fa-plus-circle fa-2x"></i></button>';
				$result['data'][$key]=array(
					$i,
					ucwords($list->league_name),
					$list->total_event,
					$list->startdate,
					$list->enddate,
					$action
					);
				$i++;
			}
			echo json_encode($result);
		}
	}
	public function updateList()
	{		
		if($this->uri->segment(5))
		{
			$id = $this->uri->segment(5);
			$league = $this->Common_model->get_where("my_leagues",array("sportFK"=>$this->sportFK)); 
			$res = array();
			if(!empty($league))
			{
				/* Update code goes here */
				$league_array = json_decode($league[0]->tournament_stageFK,true);
				$res = array_filter(array_map(function($v) use($id){
				   if($v == $id)
				   {
					   return $v;
					   break;
				   }
				   //echo $v."<br>";
				  },array_values($league_array)));
					
					if(count($res)==0)
					{
						array_push($league_array,$id);
						$num = $this->Common_model->update("my_leagues",array("tournament_stageFK"=>json_encode($league_array)),array('id'=>$league[0]->id));
					}
			}else
			{
				/* Insert code goes here */
				$league_array = array();
				array_push($league_array,$id);
				$num = $this->Common_model->insert("my_leagues",array('sportFK'=>$this->sportFK,"tournament_stageFK"=>json_encode($league_array)));
			}
			if($num>0)
			{
				$msg = array('status' => 'success','msg' =>ucwords($this->game)." league list update successfully");
		        $this->session->set_flashdata($msg);
		       	$url = $_SERVER['HTTP_REFERER'];
				
			}else{
				$msg = array('status' => 'danger','msg' =>"Un-successfull operation");
		        $this->session->set_flashdata($msg);
			}
			redirect($this->config->item('admin_base_url').'sidebar-list/'.url_title($this->game,"dash",true)); 
		}else{
			redirect($this->config->item('admin_base_url').'sidebar-list/'.url_title($this->game,"dash",true)); 
		}
	}
	public function delete()
	{	
		if($this->uri->segment(5))
		{
			$id = $this->uri->segment(5);
			$league = $this->Common_model->get_where("my_leagues",array("sportFK"=>$this->sportFK)); 
			$newleague_array = array();
			if(!empty($league))
			{
				/* Update code goes here */
				$league_array = json_decode($league[0]->tournament_stageFK,true);
				$newleague_array = array_values(array_filter(array_map(function($v) use($id,$league_array){
				  if($v != $id)
				   {
					   return $v;
				   }
				  },array_values($league_array))));
				/* $this->test($newleague_array); */
				$num = $this->Common_model->update("my_leagues",array("tournament_stageFK"=>json_encode($newleague_array)),array('id'=>$league[0]->id));
					
			}
			if($num>0)
			{
				$msg = array('status' => 'success','msg' =>ucwords($this->game)." league deleted successfully");
		        $this->session->set_flashdata($msg);
		       	$url = $_SERVER['HTTP_REFERER'];
				
			}else{
				$msg = array('status' => 'danger','msg' =>"Un-successfull operation");
		        $this->session->set_flashdata($msg);
			}
			redirect($this->config->item('admin_base_url').'sidebar-list/'.url_title($this->game,"dash",true)); 
		}else{
			redirect($this->config->item('admin_base_url').'sidebar-list/'.url_title($this->game,"dash",true)); 
		}
	}
	
	public function add_countrylist(){
		$sportFK  = $this->input->post('sportFK');
		$game  = $this->input->post('game');
		$countryIdvar = $this->input->post('countryId');
		if($countryIdvar != ""){
	    $countryIdarray  = explode(',',$this->input->post('countryId'));
		$countCountryList = $this->Common_model->count_where('countryList',array('game_id' => $sportFK));
		if($countCountryList != ""){
		$this->Common_model->delete('countryList',array('game_id'=>$sportFK));		
		}
		foreach($countryIdarray as $countryId){
		if($countryId != ""){	
		$this->Common_model->insert('countryList',array('game_id'=>$sportFK, 'country_id' =>$countryId ));	
		}
		}
		$msg = array('status' => 'success','msg' =>"Country List added successfully");
		$this->session->set_flashdata($msg);
		redirect($this->config->item('admin_base_url').'country/game/'.$game);
		}
		else{
		$msg = array('status' => 'error','msg' =>"Un-successfull operation");
		$this->session->set_flashdata($msg);
		redirect($this->config->item('admin_base_url').'country/game/'.$game);	
		}
	}
	

}

/* End of file  */
/* Location: ./application/controllers/admin-controller */