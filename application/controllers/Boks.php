<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Boxing
Description : This function is used to show all the events,matches,leagues of game Boxing.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : boxing.php
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

Date of created : 27-05-2017
Last Modified : 27-05-2017
	
*/
class Boks extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Boxing_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 34; //34 for boxing.
	} 
	/* 
	@Description : function is used to show the list of all live matches on current date 
	*/
	public function index()
	{
		
	    $this->output->cache(5);
	    /*  $this->output->delete_cache();
		$this->cache->clean(); */
		$data = $this->common_list();
		$data['getContent'] = $this;
		$data = $data + $this->common_list();
		$data['sportFK'] = $this->sportFK;
		$data['my_events'] ='';
		if($this->session->userdata('user_id')!=''){
		$data['my_events'] = $this->get_myevents($this->sportFK);
		}
		$this->load->view('boxing',$data);
	}
	public function getContent()
	{
		if ($this->input->is_ajax_request()) {}
		
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "boks";
			
			if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) 
			{
			  $data["list"] = $this->Boxing_model->get_live_list($this->sportFK,$date);
			  $this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) 
			{
				$theHTMLResponse   = $this->load->view("boxing/boxing_content", $data, TRUE);
				$this->cache->file->save(__FUNCTION__ . __CLASS__.$date, $theHTMLResponse, 240);
			}
			return $theHTMLResponse;
	}
		
	
	
	/*
	@Description : This function is used to get the all matches both played and future ones & standing leagues ,top scores of a particular league
	*/
	public function category()
	{
		$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName,$country,$this->sportFK);
		if($tournament_stageId==FALSE)
		{
			$tournament_stageId = $this->getNextStageId($tournament_stageName,$country,$this->sportFK);
		}
		if(is_numeric($tournament_stageId)){
			if($this->uri->segment(3) && !$this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Boxing_model->get_league_match($tournament_stageId,$this->sportFK,"50");
			}
				if($this->uri->segment(4)){
						$uri = $this->uri->segment(4);
						$data["tlist"] = $data["list"] = $this->Boxing_model->get_league_match($tournament_stageId,$this->sportFK,"limit 1");
						switch($uri){
							case "sonuclar":
								$data["tlist"] = $data["list"] = $this->Boxing_model->get_league_match($tournament_stageId,$this->sportFK,"");
								break;
							case "puan-durumu":
								$data["league_standing"] =  $this->Boxing_model->get_leagues_standing($tournament_stageId);
								break;
							case "takimlar":
									$data["teams"] =  $this->Boxing_model->get_teams($this->sportFK,$tournament_stageId);
								break;
							case "fikstur" :
							  $data["programMatch"] = $this->Boxing_model->get_programed_match($tournament_stageId, $this->sportFK, "200");
							  if (empty ($data["programMatch"])) {
								$temptournament_stageId = $this->getNextStageId($tournament_stageName, $country,$this->sportFK);
								if ($temptournament_stageId != false) {
								  $data["programMatch"] = $this->Boxing_model->get_programed_match($temptournament_stageId, $this->sportFK, "200");
								}
								else {
								  $data["programMatch"] = '';
								}
							  }
							  break;
							default:
								break;
						}
				}
				if(empty($data["list"])){
					$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
				}
				$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK,$country,$tournament_stageId);
				
			$data = $data + $this->common_list();
			$this->load->view('boxing/boxing_leaguematch',$data);
		}else{
			redirect("boks");
		}		
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function teamDetail()
	{
		$pid =  $this->uri->segment("3");
		$data["players"] = $this->Boxing_model->get_players($pid);
		$this->test($data);
	}
	/*
	@Descriptin : function is used to get the detail of a particular match or event 
	*/
	public function matchDetail()
	{
		$eventId = $this->uri->segment("3");
		//fetching main match details
		$data["result"] = $this->Boxing_model->match_detail($eventId);
		//fetching all against matches of both teams
		$home_pid = $data["result"][0]->home_id;
		$away_pid = $data["result"][0]->away_id;
		$data["teamA_match"] = (!empty($home_pid))? $this->Boxing_model->get_team_against_match($home_pid) :'';
		$data["teamB_match"] = (!empty($away_pid))? $this->Boxing_model->get_team_against_match($away_pid) :'';

		//fetching all matches played between both teams
		$team1name = $data["result"][0]->home_team;
		$team2name = $data["result"][0]->away_team;
		$data["betweenMatch"] = $this->Boxing_model->get_between_match($team1name,$team2name);
		//fetching common list from function
		//$this->test($data);die;
		$data["game"] = "boks";
		$this->load->view('boxing/boxing_popup',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list()
	{
		$data["game"] = "boks";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("basketball_banners","id asc");	
		$this->db->cache_off();
		$data["category"] = $this->Boxing_model->get_category($this->sportFK);	
		$data["leagues"] = $this->Boxing_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues', array('sportFK' => $this->sportFK));
		if (!empty ($myleagues) && !empty (json_decode($myleagues[0]->tournament_stageFK, true))) {
		  $myleagues = $myleagues[0];
		  $data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK, json_decode($myleagues->tournament_stageFK, true));
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
	
	
	public function obj2Array($input){
		return 	json_decode(json_encode($input),true);
	}
	
	public function array2Object($input){
		return 	json_decode(json_encode($input));
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
		$data["game"] = "boks";	
		$this->load->view('search_result',$data);
	}
	
	public function iframe()
	{
		$country = urldecode(str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(4)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName,$country,$this->sportFK);
		if($tournament_stageId==FALSE)
		{
			$tournament_stageId = $this->getNextStageId($tournament_stageName,$country,$this->sportFK);
		}
		if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__ .'league_popup'. $this->uri->uri_string())) 
		{
			if($this->uri->segment(4)){
				$data["tlist"] = $data["list"] = $this->Boxing_model->get_league_match($tournament_stageId,$this->sportFK,"limit 1");
				$data["league_standing"] =  $this->Boxing_model->get_leagues_standing($tournament_stageId);
			}
			if(empty($data["list"])){
				$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
			$data["game"] = "boks";	
			$theHTMLResponse = $this->load->view("boxing/boxing_leaguematch_iframe", $data, TRUE);
			$this->cache->file->save(__FUNCTION__ . __CLASS__ .'league_popup'.$this->uri->uri_string(), $theHTMLResponse, 14400);
		}
		echo $theHTMLResponse;
	}

}