<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Snowboarding
Description : This function is used to show all the events,matches,leagues of game Handball.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : handball.php
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

Date of created : 07-06-2017
Last Modified : 07-06-2017
	
*/
class Snowboard extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Snowboarding_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 18; //18 for Snowboarding.
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
		$this->load->view('snowboarding',$data);
	}
	public function getContent()
	{
		if ($this->input->is_ajax_request()) 
		{
		}
			$data["date"] = $date = $this->uri->segment('3');
			$tsid = $this->input->post('tsid',true);
			$data["game"] = "snowboard";
			//echo "today => ".$date;die;
			
			if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) 
			{
			   $data["list"] = $this->Snowboarding_model->get_live_list($this->sportFK,$date,'',$tsid);
			   $this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) 
			{
				foreach($data["list"] as $key =>$val)
				{
					$data["list"][$key]->participants = $this->Snowboarding_model->get_participants($val->id);
				}
				$theHTMLResponse    = $this->load->view("snowboarding/snowboarding_content", $data, TRUE);
				$this->cache->file->save(__FUNCTION__ . __CLASS__.$date, $theHTMLResponse, 240);
			}
			return $theHTMLResponse;
	}
	/*
	@Description : This function is used to get the all matches both played and future ones & standing leagues ,top scores of a particular league
	*/
	public function tournament()
	{
		$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName, $country,$this->sportFK);
		if($tournament_stageId ==false)
		{
			$tournament_stageId = $this->getNextStageId($tournament_stageName,$country,$this->sportFK);
		}
		if(is_numeric($tournament_stageId)){
			if($this->uri->segment(3) && !$this->uri->segment(4)){
				$data["tlist"] = $data["list"] = $this->Snowboarding_model->get_league_match($tournament_stageId,$this->sportFK,"4");
			}
			if($this->uri->segment(4)){
				$data["tlist"] = $data["list"] = $this->Snowboarding_model->get_league_match($tournament_stageId,$this->sportFK,"1");
					$uri = $this->uri->segment(4);
					switch($uri){
						case "sonuclar":
							$data["tlist"] = $data["list"] = $this->Snowboarding_model->get_league_match($tournament_stageId,$this->sportFK,"30");
							break;
						case "puan-durumu":
							if(!empty($data["list"])){
							$data["league_standing"] =  $this->Snowboarding_model->get_leagues_standing($tournament_stageId);
							}
							break;
						case "takimlar":
								if(!empty($data["list"])){
								$data["teams"] =  $this->Snowboarding_model->get_teams($this->sportFK,$tournament_stageId);
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
					$data["list"][$key]->participants = $this->Snowboarding_model->get_participants($val->id);
				}
			}
			$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK,$country);
			//$this->qry();
			//$this->test($data);die;
			$data = $data + $this->common_list();
			$this->load->view('snowboarding/snowboarding_leaguematch',$data);
		}else{
			redirect("snowboard");
		}
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function race()
	{
		$tournament_stageName = str_replace("-", " ", $this->uri->segment(3));
		$tournament_stageName = str_replace("+", " - ", $tournament_stageName);
		$tournament_stageId = $this->getStageId($tournament_stageName,$country,$this->sportFK);
		if(is_numeric($tournament_stageId)){
			$data["tsid"] = $tournament_stageId;
			$data = $data + $this->common_list();
			//$this->test($data);die;
			$this->load->view('snowboarding',$data);
		}else{
			redirect("snowboarding");
		}
	}
	/*
	@Descriptin : function is used to get the detail of a particular match or event 
	*/
	public function matchDetail()
	{
		$eventId = $this->uri->segment("3");
		//fetching main match details
		$data["result"] = $this->Snowboarding_model->match_detail($eventId);
		//$this->qry();
		//$this->test($data);
		//fetching incident of a match
		$data["incident"] = $this->Snowboarding_model->getIncident($eventId);
		//$this->test($data);
		//fetching players lineup details
		$home_epid = $data["result"][0]->home_epid;
		$away_epid = $data["result"][0]->away_epid;
		$data["home_lineup"] = $this->Snowboarding_model->getLineup($home_epid);
		$data["away_lineup"] = $this->Snowboarding_model->getLineup($away_epid);
		
		//fetching all against matches of both teams
		$home_pid = $data["result"][0]->home_id;
		$away_pid = $data["result"][0]->away_id;
		$data["teamA_match"] = (!empty($home_pid))? $this->Snowboarding_model->get_team_against_match($home_pid) :'';
		$data["teamB_match"] = (!empty($away_pid))? $this->Snowboarding_model->get_team_against_match($away_pid) :'';
		
		//fetching all matches played between both teams
		$team1name = $data["result"][0]->home_team;
		$team2name = $data["result"][0]->away_team;
		$data["betweenMatch"] = $this->Snowboarding_model->get_between_match($team1name,$team2name);

		$data["game"] = "snowboard";
		//fetching common list from function
		$data = $data + $this->common_list();
		$this->load->view('detailPopup',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list(){
		$data["game"] = "snowboard";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("tennis_banners","id asc");
		/* $data["tournament_template"] = $this->Common_model->get_where("tournament_template",array("sportFK"=>$this->sportFK,"del"=>"no",'ut >='=>date("2017-01-01 00:00:00")));		 */
		$this->db->cache_off();
		$data["leagues"] = $this->Snowboarding_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues',array('sportFK'=>$this->sportFK));
		if(!empty($myleagues)  && !empty(json_decode($myleagues[0]->tournament_stageFK,true)))
		{
			$myleagues = $myleagues[0];
			$data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK,json_decode($myleagues->tournament_stageFK,true));
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
		//$this->test($data["tournament_template"]);die;
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