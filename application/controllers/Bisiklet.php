<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Cycling
Description : This function is used to show all the events,matches,leagues of game Cycling.
Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : cycling.php
Function : leagueMatch
	Description : This function is used to get and shows the both played & future one's matches,leagues standing,top score in a particular league.
	Called view : leagueMatch.php
Function : matchDetail
	Description : This function is used to show the details of a particular event.
	Called view : detailPopup.php
Function : common_list
	Description : It is common function which is embed in every function. It is used to get the data of banners,clrschemes,current tournament and draw types which is used in all function .
	Called view : no view
Function : test & qry
	Description : These functions are for testing purpose only for developer test() is to print data and qry() is to print the last query executed.

Date of created : 29-05-2017
Last Modified : 29-05-2017
	
*/
class Bisiklet extends MY_Controller 
{
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Cycling_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 30; //30 for Cycling.
	} 
	
	/* 
	@Description : function is used to show the list of all live matches on current date 
	*/
	
	public function index()
	{
		$this->output->cache(5);
		/* $this->output->delete_cache();
		$this->cache->clean(); */
		$data = $this->common_list();
		$data['getContent'] = $this;
		$data['sportFK'] = $this->sportFK;
		$data['my_events'] ='';
		if($this->session->userdata('user_id')!=''){
		$data['my_events'] = $this->get_myevents($this->sportFK);
		}
		//$this->test($data);die;
		$this->load->view('cycling',$data);
	}
	
	public function getContent()
	{
		if ($this->input->is_ajax_request()) 
		{
	       //echo "Success";
		}
			
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "bisiklet";
			if (!$data["list"] = $this->cache->file->get($data["game"].'cache_key'.$data["date"])) {
			  $data["list"] = $this->Cycling_model->get_live_list($this->sportFK,$date);
			  // Save into the cache for 2 minutes
			  $this->cache->file->save($data["game"].'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) {
			foreach($data["list"] as $key =>$val)
			{
				$data["list"][$key]->participants = $this->Cycling_model->get_participants($val->id);
				$data["list"][$key]->pro = $this->Cycling_model->get_property(array("objectFK"=>$val->id,"object"=>"event","del"=>"no"));
			}
			//$this->test($data);die;
				$theHTMLResponse    = $this->load->view("cycling/cycling_content", $data, TRUE);
				$this->cache->file->save(__FUNCTION__ . __CLASS__.$date, $theHTMLResponse, 240);
			}
			return $theHTMLResponse;
		
	}
	/* This function is used to get live events only through ajax */
	public function showLiveEvent()
	{
		if (!$this->input->is_ajax_request()) 
		{
	     show_error("No direct access allowed");
		}else{ 
			$data["date"] = $date = $this->Common_games_model->filterval($this->input->get('date',true));
			$data["game"] = 'Bitti';
			
			$list = $this->Common_games_model->get_live_event($this->sportFK,$date);
			$events = array_filter(array_map(function($val){
			//if($val->status_text != 'Finished' && $val->gameStarted != '' && $val->gameEnded==''){			
			if($val->status_text == 'Finished'){
						return $val->id;
				}
			},array_values($list)));	
			//$this->test($events);
			if(count($events)>0){
				$wherein = $events;
				$data["list"] = $this->Cycling_model->get_live_list($this->sportFK,$date,$wherein);
				foreach($data["list"] as $key =>$val)
				{
					$data["list"][$key]->participants = $this->Cycling_model->get_participants($val->id);
					$data["list"][$key]->pro = $this->Cycling_model->get_property(array("objectFK"=>$val->id,"object"=>"event","del"=>"no"));
				}
				echo  json_encode($data["list"]);
			}
		}
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
			$data["tlist"] = $data["list"] = $this->Cycling_model->get_league_match($tournament_stageId,$this->sportFK,"");
		}
		if($this->uri->segment(4)){
				$uri = $this->uri->segment(4);
				$data["tlist"] = $data["list"] = $this->Cycling_model->get_league_match($tournament_stageId,$this->sportFK," 1");
				switch($uri){
					case "takimlar":
							if(!empty($data["list"])){
							$data["teams"] =  $this->Cycling_model->get_teams($this->sportFK,$tournament_stageId);
							}
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
				$data["list"][$key]->participants = $this->Cycling_model->get_participants($val->id);
				$data["list"][$key]->pro = $this->Cycling_model->get_property(array("objectFK"=>$val->id,"object"=>"event","del"=>"no"));
			}
		}
		$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK,$country,$tournament_stageId);
		//$this->qry();
		//$this->test($data);die;
		$data = $data + $this->common_list();
		$this->load->view('cycling/cycling_leaguematch',$data);
		}else{
			redirect("bisiklet");
		}
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function teamDetail()
	{
		$pid =  $this->uri->segment("3");
		$data["players"] = $this->Cycling_model->get_players($pid);
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
		$data["profile"] = $this->Cycling_model->get_general_details(array("objectFK"=>$pid,"object"=>"participant"));
		$data["event"] = $this->Cycling_model->get_event_player_property($this->sportFK,$eid,$pid);
		//$this->test($data);die;
		$this->load->view('cycling/profile',$data);
		
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list(){
		$data["game"] = "bisiklet";
		
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("tennis_banners","id asc");
		$data["country"] = $this->Common_games_model->get_only_country($this->sportFK);
		
		$this->db->cache_off();
		$data["leagues"] = $this->Cycling_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues',array('sportFK'=>$this->sportFK));
		if(!empty($myleagues)  && !empty(json_decode($myleagues[0]->tournament_stageFK,true)))
		{
			$myleagues = $myleagues[0];
			$data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK,json_decode($myleagues->tournament_stageFK,true));
		}
		if(empty($data['country'])){
			$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		}
		foreach ($data["country"] as $key => $val) {
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