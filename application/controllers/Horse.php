<?php 	defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controller Name : Horse
Description : This function is used to show all the events,matches,leagues of game Futbol.

Function : index
	Description : This function is used to get and show the Live matches Today.
	Called view : Index.php
Function : demo
	Description : This function is used to insert the unparsed files from push_receiver/files into database table 'saved_xml' for parsing.
	Called view : no view
Function : leagueMatch
	Description : This function is used to get and shows the both played & future one's matches,leagues standing,top score in a particular league.
	Called view : leagueMatch.php
Function : matchDetail
	Description : This function is used to show the details of a particular event.
	Called view : futball_popup.php
Function : common_list
	Description : It is common function which is embed in every function. It is used to get the data of leagues,banners,clrschemes which is used in all function .
	Called view : no view
Function : test & qry
	Description : These functions are for testing purpose only for developer test() is to print data and qry() is to print the last query executed.

Date of created : 1-04-2017
Last Modified : 25-05-2017
	
*/
class Horse extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(array('Horse_model','Common_model'));
		$this->load->helper(array('form'));
		//global variable for all function 
		$this->sportFK = 31; //31 for horse racing game At Yarışı
		$this->game = 'at-yarisi';//controller name for url 
	} 
	/* 
	@Description : function is used to show the list of all live matches on current date
	*/
	public function index()
	{
		 $data = '';
   // $this->output->cache(5);
   /*  $this->output->delete_cache();
	$this->cache->clean(); */
		$data = $this->common_list();
		$data['getContent'] = $this;
		$data['sportFK'] = $this->sportFK;
		$data['my_events'] ='';
		if($this->session->userdata('user_id')!=''){
		$data['my_events'] = $this->get_myevents($this->sportFK);
		}
		$this->load->view('horse_race',$data);	
	}
	public function getContent()
	{
		set_time_limit(0);
			$data["date"] = $date = $this->uri->segment('3');
			$data["game"] = "at-yarisi";
			if (!$data["list"] = $this->cache->file->get(__CLASS__.'cache_key'.$data["date"])) 
			{
				$data["list"] = $this->Horse_model->get_live_list($this->sportFK,$date);
				$this->cache->file->save(__CLASS__.'cache_key'.$data["date"], $data["list"], 240);
			}
			if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__.$date)) 
			{
				foreach($data["list"] as $key =>$val)
				{
					$data["list"][$key]->participants = $this->Horse_model->get_participants($val->id);
				}
				$theHTMLResponse    = $this->load->view("horse_race/horse_content", $data, TRUE);
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
		if($this->uri->segment(3) && !$this->uri->segment(4)){
			$data["tlist"] = $data["list"] = $this->Horse_model->get_league_match($tournament_stageId,$this->sportFK,"");
			foreach($data["list"] as $key =>$val)
			{
				$participants = $this->Horse_model->get_participants($val->id);
				if(!empty($participants)){
					$data["list"][$key]->participants = $participants; 
				}else{
					unset($data["list"][$key]);
				}	
			}
			$data["programMatch"] = $this->Horse_model->get_programed_match($this->sportFK,$tournament_stageId);
		}
		if(empty($data["list"])){
			$data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
		$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK,$country,$tournament_stageId);
		//$this->test($data["list"]);die;
		$data = $data + $this->common_list();
		$this->load->view('horse_race/horse_leaguematch',$data);
	}

	/* 
	@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function 
	*/
	public function common_list(){
		$data["game"] = "at-yarisi";
		$this->db->cache_on();
		$data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes',"id ASC");
		$data["banners"] = $this->Common_model->get_all_orderby("futboll_banners","id asc");
		
		$this->db->cache_off();
		$data["leagues"] = $this->Horse_model->get_leagues($this->sportFK);
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