<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Table_tennis
Description : This function is used to show all the events,matches,leagues of game Tennis.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : tennis.php
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

Date of created : 9-05-2017
Last Modified : 9-05-2017
	
*/
class Masa_tenisi extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Tt_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 48; //48 for table_tennis.
	} 
	/* 
	@Description : function is used to show the list of all live matches on current date 
	*/
	public function index()
	{
		$data = '';
		$this->output->cache(5);
	    /*  $this->output->delete_cache();
		$this->cache->clean(); */
		$data = $this->common_list();
		$data['getContent'] = $this;
		$data['sportFK'] = $this->sportFK;
		$data['my_events'] ='';
		if($this->session->userdata('user_id')!=''){
		$data['my_events'] = $this->get_myevents($this->sportFK);
		}
		$this->load->view('table_tennis',$data);
	}
	
	public function getContent()
	{
		if (!$this->input->is_ajax_request()) {}
		
			
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "masa-tenisi";
			
			if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) 
			{
			  $data["list"] = $this->Tt_model->get_live_list($this->sportFK,$date);
			  $this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) 
			{
				foreach($data["list"] as $key =>$val)
				{
					switch($val->teamType){
						case "Team" :
							$ep = $this->Tt_model->get_doubles(array("ep.eventFK"=>$val->id,'ep.del'=>'no'));
							/* converting obj array to assoc array and then convert into obj  */
							$playersData = array_values($ep);
							/* Converting obj to array */
							$playersData = $this->obj2Array($playersData[0]);
							$data["list"][$key] = $this->obj2Array($data['list'][$key]) + $playersData; 
							/* Converting array to obj*/
							$data["list"][$key] = $this->array2Object($data["list"][$key]);
							break;
						default :
							break;
					}
					$data["list"][$key]->home_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->home_id,'del'=>'no'));
					$data["list"][$key]->away_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->away_id,'del'=>'no'));
				}
				$theHTMLResponse    = $this->load->view("table_tennis/table_tennis_content", $data, TRUE);
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
			$data["game"] = 'masa-tenisi';
			$where = "";
			$list = $this->Common_games_model->get_live_event($this->sportFK,$date);
			$events = array_filter(array_map(function($val){
			if($val->status_text != 'Bitti' && $val->gameStarted != '' && $val->gameEnded==''){			
			//if($val->status_text != 'Finished'){
						return $val->id;
				}
			},array_values($list)));	
			//$this->test($events);
			if(count($events)>0){
				$wherein = $events;
				$data["list"] = $this->Tt_model->get_live_list($this->sportFK,$date,$wherein);
				foreach($data["list"] as $key =>$val)
				{
					switch($val->teamType){
						case "Team" :
							$ep = $this->Tt_model->get_doubles(array("ep.eventFK"=>$val->id,'ep.del'=>'no'));
							/* converting obj array to assoc array and then convert into obj  */
							$playersData = array_values($ep);
							/* Converting obj to array */
							$playersData = $this->obj2Array($playersData[0]);
							$data["list"][$key] = $this->obj2Array($data['list'][$key]) + $playersData; 
							/* Converting array to obj*/
							$data["list"][$key] = $this->array2Object($data["list"][$key]);
							break;
						default :
							break;
					}
					$data["list"][$key]->home_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->home_id,'del'=>'no'));
					$data["list"][$key]->away_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->away_id,'del'=>'no'));
				}
				echo  json_encode($data["list"]);
			}
		}
		
	}
	public function obj2Array($input){
	return 	json_decode(json_encode($input),true);
	}
	
	public function array2Object($input){
	return 	json_decode(json_encode($input));
	}
	/*
	@Description : This function is used to get the all matches both played and future ones & standing leagues ,top scores of a particular league
	*/
	public function leagueMatch()
	{
		$country = str_replace("-", " ", $this->uri->segment(2)); 
		$tournament_stageName = str_replace("-", " ", $this->uri->segment(3)); 
		$data["list"] = $this->Tt_model->get_league_match($tournament_stageName,$this->sportFK);
		$data["relatedLeagues"] = $this->Tt_model->get_league_by_country($this->sportFK,$country);
		$data["programMatch"] = $this->Tt_model->get_programed_match($this->sportFK,$tournament_stageName);
		$tsid =$data["list"][0]->stage_id;
		$data["league_standing"] =  $this->Tt_model->get_leagues_standing($tsid);
		//$this->qry();
		//$this->test($data);
		$data = $data + $this->common_list();
		$this->load->view('leagueMatch',$data);
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function teamDetail()
	{
		$pid =  $this->uri->segment("3");
		$data["players"] = $this->Tt_model->get_players($pid);
		$this->test($data);
	}
	/*
	@Descriptin : function is used to get the detail of a particular match or event 
	*/
	public function matchDetail()
	{
		$eventId = $this->uri->segment("3");
		$data["result"] = $this->Tt_model->match_detail($eventId);
		if(!empty($data["result"])){
		$home_epid = $data["result"][0]->home_epid;
		$away_epid = $data["result"][0]->away_epid;
		$data["result"][0]->home_result = $this->Tt_model->get_result(array("event_participantsFK"=>$home_epid));
		$data["result"][0]->away_result = $this->Tt_model->get_result(array("event_participantsFK"=>$away_epid));
		$key = 0;
		switch($data["result"][$key]->teamType){
				case "Team" :
					$ep = $this->Tt_model->get_doubles(array("ep.eventFK"=>$eventId,'ep.del'=>'no'));
					/* converting obj array to assoc array and then convert into obj  */
					$playersData = array_values($ep);
					/* Converting obj to array */
					$playersData = $this->obj2Array($playersData[0]);
					$data["result"][$key] = $this->obj2Array($data['result'][$key]) + $playersData; 
					/* Converting array to obj*/
					$data["result"][$key] = $this->array2Object($data["result"][$key]);
					break;
				default :
					break;
			}
		
		//fetching all against matches of both teams
		$home_pid = $data["result"][0]->home_pid;
		$away_pid = $data["result"][0]->away_pid;
		$data["teamA_match"] = (!empty($home_pid))? $this->Tt_model->get_team_against_match($home_pid) :'';
		$data["teamB_match"] = (!empty($away_pid))? $this->Tt_model->get_team_against_match($away_pid) :'';
		$data["home_statistic"] = $this->Tt_model->get_statistics($eventId,$home_pid);
		$data["away_statistic"] = $this->Tt_model->get_statistics($eventId,$away_pid);
		//fetching all matches played between both teams
		$team1name = $data["result"][0]->home_team;
		$team2name = $data["result"][0]->away_team;
		$data["betweenMatch"] = $this->Tt_model->get_between_match($team1name,$team2name);
		}
		$data["game"] = "masa-tenisi";
		$this->load->view('table_tennis/table_tennis_popup',$data);
	}
	/* 
		Description : This function is used to get match according to the type
	*/
	public function type()
	{
		$data['getContent'] = $this;
		if($this->uri->segment(3)){
			$type = str_replace("-"," ",$this->uri->segment('3'));
			$data["list"] = $this->Tt_model->get_listby_type($this->sportFK,$type);
			if(!empty($data["list"])){
			foreach($data["list"] as $key =>$val)
			{
				switch($val->teamType){
					case "Team" :
						$ep = $this->Tt_model->get_doubles(array("ep.eventFK"=>$val->id,'ep.del'=>'no'));
						/* converting obj array to assoc array and then convert into obj  */
						$playersData = array_values($ep);
						/* Converting obj to array */
						$playersData = $this->obj2Array($playersData[0]);
						$data["list"][$key] = $this->obj2Array($data['list'][$key]) + $playersData; 
						/* Converting array to obj*/
						$data["list"][$key] = $this->array2Object($data["list"][$key]);
						break;
					default :
						break;
				}
				$data["list"][$key]->home_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->home_id,'del'=>'no'));
				$data["list"][$key]->away_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->away_id,'del'=>'no'));
			}
			}
			//$this->qry();
			//$this->test($data);die;
			$data = $data + $this->common_list();
			///$this->test($data);die;
			$this->load->view('table_tennis',$data);
		}else{
			redirect('table-tennis');
		}
	}
	/* 
		Description : This function is used to get match according to the tournament stage
	*/
	public function tournament()
	{
		$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName, $country,$this->sportFK);
		
		if($tournament_stageId==FALSE)
		{
			$tournament_stageId = $this->getNextStageId($tournament_stageName,$country,$this->sportFK);
		}
		
		if($this->uri->segment(3) && !$this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Tt_model->get_league_match($tournament_stageId,$this->sportFK,"limit 100");
			if(!empty($data["list"])){
				
				foreach($data["list"] as $key =>$val)
				{
					switch($val->teamType){
						case "Team" :
							$ep = $this->Tt_model->get_doubles(array("ep.eventFK"=>$val->id,'ep.del'=>'no'));
							/* converting obj array to assoc array and then convert into obj  */
							$playersData = array_values($ep);
							/* Converting obj to array */
							$playersData = $this->obj2Array($playersData[0]);
							$data["list"][$key] = $this->obj2Array($data['list'][$key]) + $playersData; 
							/* Converting array to obj*/
							$data["list"][$key] = $this->array2Object($data["list"][$key]);
							break;
						default :
							break;
					}
					$data["list"][$key]->home_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->home_id,'del'=>'no'));
					$data["list"][$key]->away_result = $this->Tt_model->get_result(array("event_participantsFK"=>$val->away_id,'del'=>'no'));
				}
				
			}

		}

		if($this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Tt_model->get_league_match($tournament_stageId,$this->sportFK,"limit 1");
			if(!empty($data["list"])){
				$uri = $this->uri->segment(4);
				switch($uri){
					case "sonuclar":
						$data["tlist"] = $data["list"] = $this->Tt_model->get_league_match($tournament_stageId,$this->sportFK,"");
						break;
					case "puan-durumu":
						$data["league_standing"] =  $this->Tt_model->get_leagues_standing($tournament_stageId);
						
						break;
					case "takimlar":
							
							$data["teams"] =  $this->Tt_model->get_teams($this->sportFK,$tournament_stageId);
							
						break;
					 case "fikstur" :
						$data["programMatch"] = $this->Tt_model->get_programed_match($tournament_stageId, $this->sportFK, "200");  
					default:
						break;
				}
				
			}	
		}
		if(empty($data["list"])){
				 $data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
		//$this->test($data);die;
		$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK,$country, $tournament_stageId);
		$data = $data + $this->common_list();
		$this->load->view('table_tennis/table_tennis_leaguematch',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list(){
		$data["game"] = "masa-tenisi";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("tennis_banners","id asc");	
		$this->db->cache_off();
		$data["cur_tournament"] = 	$this->Tt_model->get_current_tournament($this->sportFK);
		$data["type"] =  $this->Tt_model->get_draw_type();
		$data["leagues"] = $this->Tt_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues', array('sportFK' => $this->sportFK));

		if (!empty ($myleagues) && !empty (json_decode($myleagues[0]->tournament_stageFK, true))) {
		  $myleagues = $myleagues[0];
		  $data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK, json_decode($myleagues->tournament_stageFK, true));
		}
		//$this->test($data["tour"]);die;
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
	
	public function takim()
	{
		$teamId = $this->uri->segment(3);
		$data["detail"] = $this->Common_games_model->get_team_information($teamId);
		$data["players"] = $this->Common_games_model->get_team_players($teamId);
		foreach($data["players"] as $k=>$p)
		{
		 $data["players"][$k]->gen = array_values($this->Common_games_model->get_general_details(array("objectFK"=>$p->id,"object"=>"participant")) );	
		}
		$data["game"] = "masa-tenisi";
		$this->load->view('common/playerProfile', $data);
	}
	
	public function iframe()
	{
		$country = urldecode(str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(4)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName, $country,$this->sportFK);
		
		if($tournament_stageId==FALSE)
		{
			$tournament_stageId = $this->getNextStageId($tournament_stageName,$country,$this->sportFK);
		}
		
		if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__ .'league_popup'. $this->uri->uri_string())) 
		{
			if($this->uri->segment(4)){
				$data["tlist"] = $data["list"] = $this->Tt_model->get_league_match($tournament_stageId,$this->sportFK,"limit 1");
				$data["league_standing"] =  $this->Tt_model->get_leagues_standing($tournament_stageId);	
			}
			if(empty($data["list"])){
				 $data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
			
			$data["game"] = "masa-tenisi";
			$theHTMLResponse = $this->load->view("table_tennis/table_tennis_leaguematch_iframe", $data, TRUE);
			$this->cache->file->save(__FUNCTION__ . __CLASS__ .'league_popup'.$this->uri->uri_string(), $theHTMLResponse, 14400);
		}
		echo $theHTMLResponse;
	}

}