<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Cricket
Description : This function is used to show all the events,matches,leagues of game Icehockey.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : icehockey.php
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

Date of created : 09-04-2017
Last Modified : 10-05-2017
	
*/

class Kriket extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Cricket_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 73; 
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
		$this->load->view('cricket',$data);
	}
	public function getContent()
	{
		if (!$this->input->is_ajax_request()) {}
			
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "kriket";
			//echo "today => ".$date;die;
			if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) 
			{
			  $data["list"] = $this->Cricket_model->get_live_list($this->sportFK,$date);
			  $this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) 
			{
				foreach($data["list"] as $key=>$val){						
					$tmp = $this->Cricket_model->get_event_property(array("objectFK"=>$val->id,"object"=>"event"));
					$tmpAry = json_decode(json_encode($tmp),TRUE);
					$data["list"][$key] = $tmpAry[0]+json_decode(json_encode($data["list"][$key]),TRUE);
					$data["list"][$key] = json_decode(json_encode($data["list"][$key]));
					$data["list"][$key]->home_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->home_epid));
					$data["list"][$key]->away_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->away_epid));
				}
				$theHTMLResponse    = $this->load->view("cricket/cricket_content", $data, TRUE);
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
			$data["game"] = 'kriket';
			$where = "";
			$list = $this->Common_games_model->get_live_event($this->sportFK,$date);
			$events = array_filter(array_map(function($val){
			if($val->status_text != 'Finished' && $val->gameStarted != '' && $val->gameEnded==''){			
			//if($val->status_text == 'Finished'){
						return $val->id;
				}
			},array_values($list)));	
			//$this->test($events);
			if(count($events)>0){
				$wherein = $events;
				$data["list"] = $this->Cricket_model->get_live_list($this->sportFK,$date,$wherein);
				foreach($data["list"] as $key=>$val){						
					$tmp = $this->Cricket_model->get_event_property(array("objectFK"=>$val->id,"object"=>"event"));
					$tmpAry = json_decode(json_encode($tmp),TRUE);
					$data["list"][$key] = $tmpAry[0]+json_decode(json_encode($data["list"][$key]),TRUE);
					$data["list"][$key] = json_decode(json_encode($data["list"][$key]));
					$data["list"][$key]->home_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->home_epid));
					$data["list"][$key]->away_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->away_epid));
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
		if($tournament_stageId==FALSE)
		{
			$tournament_stageId = $this->getNextStageId($tournament_stageName,$country,$this->sportFK);
		}
		if($this->uri->segment(3) && !$this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Cricket_model->get_league_match($tournament_stageId,$this->sportFK,"50");
			
		}
		if($this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Cricket_model->get_league_match($tournament_stageId,$this->sportFK,"1");
				$uri = $this->uri->segment(4);
				switch($uri){
					case "sonuclar":
						$data["tlist"] = $data["list"] = $this->Cricket_model->get_league_match($tournament_stageId,$this->sportFK,"");
						break;
					case "puan-durumu":
						$data["league_standing"] =  $this->Cricket_model->get_leagues_standing($tournament_stageId);
						break;
					case "takimlar":
							$data["teams"] =  $this->Cricket_model->get_teams($this->sportFK,$tournament_stageId);
						break;
					case "fikstur" :
						$data["programMatch"] = $this->Cricket_model->get_programed_match($tournament_stageId,$this->sportFK,"200");
					default:
						break;
				}
		}
		if(!empty($data["list"])){
			foreach($data["list"] as $key=>$val){			
				
				$tmp = $this->Cricket_model->get_event_property(array("objectFK"=>$val->id,"object"=>"event"));
				$tmpAry = json_decode(json_encode($tmp),TRUE);
				$data["list"][$key] = $tmpAry[0]+json_decode(json_encode($data["list"][$key]),TRUE);
				$data["list"][$key] = json_decode(json_encode($data["list"][$key]));
				$data["list"][$key]->home_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->home_epid));
				$data["list"][$key]->away_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->away_epid));
			}
		}
		if(empty($data["list"])){
			$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
		$data["relatedLeagues"] = $this->Cricket_model->get_league_by_country($this->sportFK,$country);
		$data = $data + $this->common_list();
		$this->load->view('cricket/cricket_leaguematch',$data);
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
		$data["game"] = "kriket";
		$this->load->view('common/playerProfile',$data);
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function teamDetail()
	{
		$pid =  $this->uri->segment("3");
		$data["players"] = $this->Cricket_model->get_players($pid);
		//$this->test($data);
	}
	/*
	@Descriptin : function is used to  get the detail of a particular match or event 
	*/
	public function matchDetail()
	{
		$eventId = $this->uri->segment("3");
		$data["result"] = $this->Cricket_model->match_detail($eventId);
		//$this->qry();
		foreach($data["result"] as $key=>$val){			
			
			$tmp = $this->Cricket_model->get_event_property(array("objectFK"=>$val->id,"object"=>"event"));
			$tmpAry = json_decode(json_encode($tmp),TRUE);
			$data["result"][$key] = $tmpAry[0]+json_decode(json_encode($data["result"][$key]),TRUE);
			$data["result"][$key] = json_decode(json_encode($data["result"][$key]));
			$data["result"][$key]->home_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->home_epid));
			$data["result"][$key]->away_result = $this->Cricket_model->get_result(array("event_participantsFK"=>$val->away_epid));
		}
		$home_epid = $data["result"][0]->home_epid;
		$away_epid = $data["result"][0]->away_epid;
		$data["home_lineup"] = $this->Cricket_model->getLineup($home_epid,"l.id asc");
		$data["away_lineup"] = $this->Cricket_model->getLineup($away_epid,"l.id asc");
		
		$home_pid = $data["result"][0]->home_id;
		$away_pid = $data["result"][0]->away_id;
		$data["teamA_match"] = $this->Cricket_model->get_team_against_match($home_pid);
		$data["teamB_match"] = $this->Cricket_model->get_team_against_match($away_pid);
		$team1name = $data["result"][0]->home_team;
		$team2name = $data["result"][0]->away_team;
		$data["betweenMatch"] = $this->Cricket_model->get_between_match($team1name,$team2name);
		
		/* this function is used to get scope result for both teams */
		$data["home_scope"] = $this->Cricket_model->get_scopre_result($home_epid);
		$data["away_scope"] = $this->Cricket_model->get_scopre_result($away_epid);
		
		$data["game"] = "kriket";
		$this->load->view('cricket/cricket_popup',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function
	*/
	public function common_list(){
		$data["game"] = "kriket";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");	
		$data["country"] = $this->Common_games_model->get_only_country($this->sportFK);
		if(empty($data['country'])){
			$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		}
		$data["banners"] = $this->Common_model->get_all_orderby("icehockey_banners","id asc");
		$this->db->cache_off();
		$data["leagues"] = $this->Cricket_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues', array('sportFK' => $this->sportFK));

		if (!empty ($myleagues) && !empty (json_decode($myleagues[0]->tournament_stageFK, true))) {
		  $myleagues = $myleagues[0];
		  $data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK, json_decode($myleagues->tournament_stageFK, true));
		}
		$date = $this->uri->segment('3');
		if (!$data["country"] = $this->cache->file->get(__CLASS__ . __FUNCTION__ . 'country' . $date)) {

		  $data["country"] = $this->Common_games_model->get_only_country($this->sportFK);

		  if (empty ($data['country'])) {
			$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		  }
		  $country = $data["country"];
		  foreach ($country as $key => $val) {
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
		  $this->cache->file->save(__CLASS__ . __FUNCTION__ . 'country' . $date, $data["country"], 2240);
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
	}
	/*
	@Descriptin : Function to print the last executed query 
	*/
	public function qry()
	{
		 print_r($this->db->last_query());
		 exit;
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
				$data["tlist"] = $data["list"] = $this->Cricket_model->get_league_match($tournament_stageId,$this->sportFK,"1");
				$data["league_standing"] =  $this->Cricket_model->get_leagues_standing($tournament_stageId);

			}
		
			if(empty($data["list"])){
			$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
			$data["game"] = "kriket";
			$theHTMLResponse = $this->load->view("cricket/cricket_leaguematch_iframe", $data, TRUE);
			$this->cache->file->save(__FUNCTION__ . __CLASS__ .'league_popup'.$this->uri->uri_string(), $theHTMLResponse, 14400);
		}
		echo $theHTMLResponse;
	}
	


}