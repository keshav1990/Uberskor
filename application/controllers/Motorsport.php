<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 

Controller Name : Motorsport
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

Date of created : 05-06-2017
Last Modified : 05-06-2017
	
*/
class Motorsport extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Motorsport_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 22; //22 for Motorsport.
	} 
	/* 
	@Description : function is used to show the list of all live matches on current date 
	*/
	public function index()
	{
		$data = '';
		$this->output->cache(5);
		/* $this->output->delete_cache();
		$this->cache->clean(); */
		$data = $this->common_list();
		$data['getContent'] = $this;
		$this->load->view('motorsport',$data);
	}
	public function getContent()
	{
		    if ($this->input->is_ajax_request()) {}
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "otomobil-yarisi";
			
		    if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) 
			{
			   $data["list"] = $this->Motorsport_model->get_live_list($this->sportFK,$date);
			   $this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) {
				//$this->test($data);die;
				foreach($data["list"] as $key =>$val)
				{
					$data["list"][$key]->participants = $this->Motorsport_model->get_participants($val->id);
				}
			$theHTMLResponse    = $this->load->view("motorsport/motorsport_content", $data, TRUE);
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
			$data["game"] = 'otomobil-yarisi';
			$list = $this->Common_games_model->get_live_event($this->sportFK,$date);
			$events = array_filter(array_map(function($val){
			//if($val->status_text != 'Finished' && $val->gameStarted != '' && $val->gameEnded==''){			
			if($val->status_text == 'Bitti'){
						return $val->id;
				}
			},array_values($list)));	
			//$this->test($events);
			if(count($events)>0){
				$wherein = $events;
				$data["list"] = $this->Motorsport_model->get_live_list($this->sportFK,$date,$wherein);
				echo  json_encode($data["list"]);
			}
		}
		
	}
	/*
	@Description : This function is used to get the all matches both played and future ones & standing leagues ,top scores of a particular league
	*/
	public function races()
	{
		if(!$this->uri->segment('3')){
			redirect('otomobil-yarisi');
		}	
		$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
		$tournament_stageName = (str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		$tournament_stageId = $this->getStageId($tournament_stageName, $country,$this->sportFK);
		$TsId = $tournament_stageId;
		$data["tlist"] = $data["list"] = $this->Motorsport_model->get_league_match($this->sportFK,array('ts.id'=>$TsId));
		if(empty($data["list"])){
			$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
		}else{
			foreach($data["list"] as $key =>$val)
			{
				$data["list"][$key]->participants = $this->Motorsport_model->get_participants($val->id);
			}
		}
		$data = $data + $this->common_list();
		//$this->test($data);die;
		$this->load->view('motorsport/motorsport_racematch',$data);
	}
	/*
	@Description : this function is used to get detail of a particular team 
	*/
	public function playerdetail()
	{
		/* $rawurl = explode('-',$this->uri->segment(2));
		$eid = end($rawurl);
		$rawurl = explode('-',$this->uri->segment(4));
		$pid = end($rawurl);
		$data["profile"] = $this->Motorsport_model->get_general_details(array("objectFK"=>$pid,"object"=>"participant"));
		$data["event"] = $this->Motorsport_model->get_event_player_property($this->sportFK,$eid,$pid);
		//$this->test($data);die;
		$this->load->view('cycling/profile',$data); */
		
	}
	
	public function tournament()
	{
		if(!$this->uri->segment('3')){
			redirect("motor-sport");
		}
		set_time_limit(0);
		$ttname = str_replace("-", " ", $this->uri->segment(3));
		$ttname = str_replace("+", " - ", $ttname);
		$ttid = $this->getTtId($ttname,$this->sportFK );
		$data["tlist"] = $data["list"] = $this->Motorsport_model->get_league_match($this->sportFK,array('tt.id'=>$ttid),'');
		if(empty($data["list"])){
			$data["tlist"] = $this->Common_games_model->get_sel_only_tournament_limit('s.name as sport_name,tt.name as tt_name,ts.id,c.name as country_name,t.name as tournament_name,ts.name as league_name',array("tt.id"=>$ttid,"tt.sportFK"=>$this->sportFK),'1');
		}else{
			foreach($data["list"] as $key =>$val)
			{
				$data["list"][$key]->participants = $this->Motorsport_model->get_participants($val->id);
			}
		}
		$data = $data + $this->common_list();
		$this->load->view('motorsport/motorsport_leaguematch',$data);
	}
	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function  
	*/
	public function common_list()
	{
		$data["game"] = "otomobil-yarisi";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("basketball_banners","id asc");
		$data["tournament_template"] = $this->Common_model->get_where("tournament_template",array("sportFK"=>$this->sportFK,"del"=>"no","ut>="=>date("2017-01-01 00:00:00")));	
		$this->db->cache_off();
		$data["leagues"] = $this->Motorsport_model->get_leagues($this->sportFK);
		$myleagues = $this->Common_model->get_where('my_leagues', array('sportFK' => $this->sportFK));
		if (!empty ($myleagues) && !empty (json_decode($myleagues[0]->tournament_stageFK, true))) {
		  $myleagues = $myleagues[0];
		  $data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK, json_decode($myleagues->tournament_stageFK, true));
		}
		$data["cur_races"] = $this->Motorsport_model->get_current_races($this->sportFK);		
		//$this->test($data["tournament_template"]);die;
		return $data;
	}





}