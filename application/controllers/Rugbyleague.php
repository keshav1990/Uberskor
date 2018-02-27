<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Rugbyleague
Description : This function is used to show all the events,matches,leagues of game Rugby.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : rugby.php
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

Date of created : 7-06-2017
Last Modified : 7-06-2017
	
*/
class Rugbyleague extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Rugby_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 80; //2 for basketball.
	} 
	/* 
	@Description : function is used to show the list of all live matches on current date 
	*/
	public function index()
	{
		
		$data = $this->common_list();
		//$this->test($data);die;
		$data['sportFK'] = $this->sportFK;
		$data['my_events'] ='';
		if($this->session->userdata('user_id')!=''){
		$data['my_events'] = $this->get_myevents($this->sportFK);
		}
		$this->load->view('rugby',$data);
	}
	public function getContent()
	{
		if (!$this->input->is_ajax_request()) 
		{
	     show_error("No direct access allowed");
		}else{
			$data["date"] = $date = $this->input->post('date',true);
			$data["game"] = "rugby-league";
			$data["list"] = $this->Rugby_model->get_live_list($this->sportFK,$date);
			foreach($data["list"] as $key =>$val)
			{
				$data["list"][$key]->home_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$val->home_id,'del'=>'no'));
				$data["list"][$key]->away_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$val->away_id,'del'=>'no'));
			}
			$this->load->view("rugby/rugby_content",$data);
		}
		
	}
	/* This function is used to get live events only through ajax */
	public function showLiveEvent()
	{
		if (!$this->input->is_ajax_request()) 
		{
	     show_error("No direct access allowed");
		}else{ 
			$data["date"] = $date = $this->Common_games_model->filterval($this->input->get('date',true));
			$data["game"] = 'rugby-league';
			
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
				$data["list"] = $this->Rugby_model->get_live_list($this->sportFK,$date,$wherein);
				foreach($data["list"] as $key =>$val)
				{
					$data["list"][$key]->home_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$val->home_id,'del'=>'no'));
					$data["list"][$key]->away_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$val->away_id,'del'=>'no'));
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
		$country = str_replace("-", " ", $this->uri->segment(2)); 
		$rawurl = explode('-',$this->uri->segment(3));
		$tournament_stageId = end($rawurl);
		if(is_numeric($tournament_stageId)){
			if($this->uri->segment(3) && !$this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Rugby_model->get_league_match($tournament_stageId,$this->sportFK,"limit 4");
			$data["programMatch"] = $this->Rugby_model->get_programed_match($tournament_stageId,$this->sportFK,"20");
			}
				if($this->uri->segment(4)){
						$uri = $this->uri->segment(4);
						$data["tlist"] = $data["list"] = $this->Rugby_model->get_league_match($tournament_stageId,$this->sportFK,"limit 1");
						switch($uri){
							case "sonuclar":
								$data["tlist"] = $data["list"] = $this->Rugby_model->get_league_match($tournament_stageId,$this->sportFK,"");
								break;
							case "puan-durumu":
								if(!empty($data["list"])){
								$data["league_standing"] =  $this->Rugby_model->get_leagues_standing($tournament_stageId);
								}
								break;
							case "takimlar":
									if(!empty($data["list"])){
									$data["teams"] =  $this->Rugby_model->get_teams($this->sportFK,$tournament_stageId);
									}
								break;
							default:
								break;
						}
				}
				if(empty($data["list"])){
				$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,c.name as country_name,t.name as tournament_name,ts.name as league_name',array("ts.id"=>$tournament_stageId,"tt.sportFK"=>$this->sportFK));
				}else{
					foreach($data["list"] as $key =>$val)
					{
						$data["list"][$key]->home_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$val->home_epid,'del'=>'no'));
						$data["list"][$key]->away_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$val->away_epid,'del'=>'no'));
					}
				}
				$data["relatedLeagues"] = $this->Rugby_model->get_league_by_country($this->sportFK,$country,$tournament_stageId);
				//$this->qry();
			
			$data = $data + $this->common_list();
			$this->load->view('rugby/rugby_leaguematch',$data);
		}else{
			redirect("rugby");
		}
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function teamDetail()
	{
		$pid =  $this->uri->segment("3");
		$data["players"] = $this->Rugby_model->get_players($pid);
		$this->test($data);
	}
	/*
	@Descriptin : function is used to get the detail of a particular match or event 
	*/
	public function matchDetail()
	{
		$eventId = $this->uri->segment("3");
		//fetching main match details
		$data["result"] = $this->Rugby_model->match_detail($eventId);
		$data["incident"] = $this->Rugby_model->getIncident($eventId);
	//	$this->test($data);die;
		if(!empty($data["result"])){
			$home_epid = $data["result"][0]->home_epid;
			$away_epid = $data["result"][0]->away_epid;
			$data["result"][0]->home_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$home_epid));
			$data["result"][0]->away_result = $this->Rugby_model->get_result(array("event_participantsFK"=>$away_epid));

			$data["home_lineup"] = $this->Rugby_model->getLineup($home_epid,"l.pos ASC");
			$data["away_lineup"] = $this->Rugby_model->getLineup($away_epid,"l.pos ASC");
		
			
			
			//fetching all against matches of both teams
			$home_pid = $data["result"][0]->home_pid;
			$away_pid = $data["result"][0]->away_pid;
			$data["teamA_match"] = (!empty($home_pid))? $this->Rugby_model->get_team_against_match($home_pid) :'';
			$data["teamB_match"] = (!empty($away_pid))? $this->Rugby_model->get_team_against_match($away_pid) :'';
			//fetching all matches played between both teams
			$team1name = $data["result"][0]->home_team;
			$team2name = $data["result"][0]->away_team;
			$data["betweenMatch"] = $this->Rugby_model->get_between_match($team1name,$team2name);
		}

		//fetching common list from function
		$data = $data + $this->common_list();
		$this->load->view('rugby/rugby_popup',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list(){
		$data["game"] = "rugby-league";
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("tennis_banners","id asc");
		$data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK);
		$data["country"] = $this->Common_games_model->get_only_country($this->sportFK);
		if(empty($data['country'])){
		$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		}
		foreach($data["country"] as $key => $val)
		{
			//$leagues = $this->Common_games_model->get_country_leagues($this->sportFK,$val->id);
			$leagues = $this->sortArrayByArray($this->sportFK,$val->id);
			if(!empty($leagues)){
				$data["country"][$key]->leagues = $leagues;
			}else{
					unset($data["country"][$key]);
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