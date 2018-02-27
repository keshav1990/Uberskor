<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Golf
Description : This function is used to show all the events,matches,leagues of game GOLF.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : basketball.php
Function : demo
	Description : This function is used to insert the unparsed files from push_receiver/files into database table 'saved_xml' for parsing.
	Called view : no view
Function : leagueMatch
	Description : This function is used to get and shows the both played & future one's matches,leagues standing,top score in a particular league.
	Called view : leagueMatch.php
Function : matchDetail
	Description : This function is used to show the details of a particular event.
	Called view : detailPopup.php
Function : common_list
	Description : It is common function which is embed in every function. It is used to get the data of leagues,banners,clrschemes which is used in all function .
	Called view : no view
Function : test & qry
	Description : These functions are for testing purpose only for developer test() is to print data and qry() is to print the last query executed.

Date of created : 9-05-2017
Last Modified : 9-05-2017
	
*/
class Golf extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Golf_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 3; //3 for Golf.
	} 
	/* 
	@Description : function is used to show the list of all live matches on current date 
	*/
	public function index()
	{
		 $data = '';
		$this->output->cache(5); 
		/* $this->output->delete_cache();
		$this->cache->clean();*/
		$data = $this->common_list();
		$data['getContent'] = $this;
		$data['sportFK'] = $this->sportFK;
		$data['my_events'] ='';
		if($this->session->userdata('user_id')!=''){
		$data['my_events'] = $this->get_myevents($this->sportFK);
		}
		$this->load->view('golf',$data);
	}
	public function getContent()
	{
		if (!$this->input->is_ajax_request()) {}
			
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "golf";
			if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) {
			  $data["list"] = $this->Golf_model->get_live_list($this->sportFK,$date);
			   $this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) {
				foreach($data["list"] as $key =>$val)
				{
					$data["list"][$key]->t_p = $this->Golf_model->get_tournament_property(array("objectFK"=>$val->stage_id,"object"=>"tournament_stage"));
					$data["list"][$key]->e_p = $this->Golf_model->get_event_property(array("objectFK"=>$val->id,"object"=>"event"));
					$data["list"][$key]->participants= $this->Golf_model->get_participants($val->stage_id
					);
				}
				$theHTMLResponse    = $this->load->view("golf/golf_content", $data, TRUE);
				$this->cache->file->save(__FUNCTION__ . __CLASS__.$date, $theHTMLResponse, 240);
			}
			return $theHTMLResponse;
	}
	
	/*
	@Description : This function is used to get the all matches both played and future ones & standing leagues ,top scores of a particular league
	*/
	public function leagueMatch()
	{
		$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName, $country,$this->sportFK);
		if(is_numeric($tournament_stageId)){
		if($this->uri->segment(3) && !$this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Golf_model->get_league_match($tournament_stageId,$this->sportFK,"4");
		}
		if($this->uri->segment(4)){
				$uri = $this->uri->segment(4);
				$data["tlist"] = $data["list"] = $this->Golf_model->get_league_match($tournament_stageId,$this->sportFK,"1");
				switch($uri){
					case "sonuclar":
						$data["tlist"] = $data["list"] = $this->Golf_model->get_league_match($tournament_stageId,$this->sportFK,"");
						break;
					case "puan-durumu":
						$data["league_standing"] =  $this->Golf_model->get_leagues_standing($tournament_stageId);
						break;
					case "oyuncular":
							$data["teams"] =  $this->Golf_model->get_teams($this->sportFK,$tournament_stageId);
						break;
					default:
						break;
				}
		}
		if(empty($data["list"])){
		$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
		}else{
			foreach($data["list"] as $key =>$val)
			{
				$data["list"][$key]->t_p = $this->Golf_model->get_tournament_property(array("objectFK"=>$val->stage_id,"object"=>"tournament_stage"));
				$data["list"][$key]->e_p = $this->Golf_model->get_event_property(array("objectFK"=>$val->id,"object"=>"event"));
				$data["list"][$key]->participants= $this->Golf_model->get_participants($val->stage_id
				);
			}
		}
		$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK,$country,$tournament_stageId);
		
		$data = $data + $this->common_list();
		$this->load->view('golf/golf_leaguematch',$data);
		}else{
			redirect("golf");
		}
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function teamDetail()
	{
		$pid =  $this->uri->segment("3");
		$data["players"] = $this->Golf_model->get_players($pid);
		$this->test($data);
	}
	/*
	@Descriptin : function is used to get the detail of a particular match or event 
	*/
	public function playerdetail()
	{
		$rawurl = explode('-',$this->uri->segment(2));
		$eid = end($rawurl);
		$rawurl = explode('-',$this->uri->segment(4));
		$pid = end($rawurl);
		$data["profile"] = $this->Golf_model->get_general_details(array("objectFK"=>$pid,"object"=>"participant"));
		$data["event"] = $this->Golf_model->get_event_player_property($this->sportFK,$eid,$pid);
		$this->load->view('golf/profile',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list(){
		$data["game"] = "golf";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("basketball_banners","id asc");	
		
		$this->db->cache_off();
		$data["cur_tournament"] = 	$this->Golf_model->get_current_tournament($this->sportFK);
		$data["leagues"] = $this->Golf_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues',array('sportFK'=>$this->sportFK));
		if(!empty($myleagues)  && !empty(json_decode($myleagues[0]->tournament_stageFK,true)))
		{
			$myleagues = $myleagues[0];
			$data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK,json_decode($myleagues->tournament_stageFK,true));
		}
		$data["country"] = $this->Common_games_model->get_only_country($this->sportFK);
		if(empty($data['country'])){
			$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		}
		foreach($data["country"] as $key => $val)
		{
			//$leagues = $this->Common_games_model->get_country_leagues($this->sportFK, $val->id);
			$leagues = $this->sortArrayByArray($this->sportFK,$val->id);
			$temp_country = $this->Common_model->get_where('language', array('language_typeFK' => 31, 'object' => 'country', "objectFK" => $val->id));
			if (!empty ($temp_country)) {
			  $data["country"][$key]->name = $temp_country[0]->name;
			}
			if (!empty ($leagues)) {
			  $data["country"][$key]->leagues = $leagues;
			}
			else {
			  unset ($data["country"][$key]);
			}
		}
		return $data;
	}
	
	/* 
	@Description : function to print data 
	*/
	public function test($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		//exit;
	}
	/*
	@Descriptin : Function to print the last executed query 
	*/
	public function qry()
	{
		 print_r($this->db->last_query());
		 //exit;
	}
	



}