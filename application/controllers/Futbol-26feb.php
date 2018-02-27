<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/*
Controller Name : soccer
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
class Futbol extends MY_Controller {
  public function __construct() {
    parent :: __construct();
    $this->load->model(array('Parse_xml', 'Common_model'));
    $this->load->helper(array('form'));
//global variable for all function
    $this->sportFK = 1;
//1 for soccer game
    $this->game = 'futbol';
//controller name for url
  }
/*
@Description : function is used to show the list of all live matches on current date
*/
  public function index($date = "") {
// echo strtolower("Çin");die;
    $data = '';
    $date = ($date=='')?date("Y-m-d"):$date;
//$this->output->cache(1);
  //  $this->output->delete_cache();
    //$this->cache->clean();
    $data = $this->common_list();
    $data['date'] = $date;
    $data['sportFK'] = $this->sportFK;
	$data['my_events'] ='';
	$data['my_teams'] ='';
	if($this->session->userdata('user_id')!=''){
	$data['my_events'] = $this->get_myevents($this->sportFK);
	$data['my_teams'] = $this->get_myteams($this->sportFK);
	}
    $data['getContent'] = $this;
//$this->test($this->getContent());die;
//echo "<pre>"; print_R($data); die;
    $this->load->view("futball", $data);
  }
/* this function is used to load html content for first time */
  public function getContent($date = "") {
    if ($this->input->is_ajax_request()) {
    }
    $data["date"] = $date != '' ? $date : $this->uri->segment('3');
    $data["game"] = 'futbol';
    if (!$data["list"] = $this->cache->file->get(__CLASS__ . 'cache_key' . $data["date"])) {
      $data["list"] = $this->Parse_xml->get_live_list($this->sportFK, $date);
      $this->cache->file->save(__CLASS__ . 'cache_key' . $data["date"], $data["list"], 240);
    }
    if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__ . $date)) {
      $theHTMLResponse = $this->load->view("futball/futball_content", $data, TRUE);
      $this->cache->file->save(__FUNCTION__ . __CLASS__ . $date, $theHTMLResponse, 240);
    }
    return $theHTMLResponse;
  }
  public function showLiveEvent() {
    if (1==2) {
      show_error("No direct access allowed");
    }
    else {
		
      $data["date"] = $date = $this->filterval($this->input->post('date', true));
      $data["game"] = 'futbol';
      $where = "";
      $list = $this->Common_games_model->get_live_event($this->sportFK, $date);
      $events = array_filter(array_map(
      function ($val) {
        if ($val->status_text != 'Bitti' && $val->gameStarted != '' && $val->gameEnded == '') {
//if($val->status_text != 'Finished'){
          return $val->id;
        }
      }
      , array_values($list)) );
      if (count($events) > 0) {
        $wherein = $events;
        $data["list"] = $this->Parse_xml->get_live_list($this->sportFK, $date, $wherein);
        //echo "<pre>"; print_R($data["list"]); die;
		$new = array();
        foreach($data["list"] as $th=>$row){
        $row->minutes = get_time_in_minute($row->gameStarted,$row->flag);
		$minutes = 0;
		
		$date1 = new DateTime("now", new DateTimeZone('Europe/Berlin') );
		
		if(!empty($row->gameStarted) && empty($row->FirstHalfEnded) && empty($row->SecondHalfStarted) && empty($row->SecondHalfEnded)){
			$datetime1 = strtotime($row->gameStarted);
			$datetime2 = strtotime($date1->format('Y-m-d H:i:s'));
			$interval  = abs($datetime2 - $datetime1);
			$minutes   = round($interval / 60)."<span class='blink1'>'</span>";
		}elseif(!empty($row->gameStarted) && !empty($row->FirstHalfEnded) && empty($row->SecondHalfStarted) && empty($row->SecondHalfEnded)){
			/*$datetime1 = strtotime($row->gameStarted);
			$datetime2 = strtotime($row->FirstHalfEnded);
			$interval  = abs($datetime2 - $datetime1);
			$minutes   = round($interval / 60)." (HalfTime)";*/
			$minutes = $row->status_text;
		}elseif(!empty($row->gameStarted) && !empty($row->FirstHalfEnded) && !empty($row->SecondHalfStarted) && empty($row->SecondHalfEnded)){
			/*first half time */
			$datetime1 = strtotime($row->gameStarted);
			$datetime2 = strtotime($row->FirstHalfEnded);
			$interval  = abs($datetime2 - $datetime1);
			$minutes   = round($interval / 60);
			
			/*second half time */
			$datetime3 = strtotime($row->SecondHalfStarted);
			$datetime4 = strtotime($date1->format('Y-m-d H:i:s'));
			$interval1  = abs($datetime4 - $datetime3);
			$minutes1   = round($interval1 / 60);
			
			$minutes = $minutes+$minutes1."<span class='blink1'>'</span>";
		}elseif(!empty($row->gameStarted) && !empty($row->FirstHalfEnded) && !empty($row->SecondHalfStarted) && !empty($row->SecondHalfEnded)){
			/*
			$datetime1 = strtotime($row->gameStarted);
			$datetime2 = strtotime($row->FirstHalfEnded);
			$interval  = abs($datetime2 - $datetime1);
			$minutes   = round($interval / 60);
			
			
			$datetime3 = strtotime($row->SecondHalfStarted);
			$datetime4 = strtotime($row->SecondHalfEnded);
			$interval1  = abs($datetime4 - $datetime3);
			$minutes1   = round($interval1 / 60);
			
			$minutes = $minutes+$minutes1."'";*/
			$minutes = $row->status_text;
		}
		$row->timeafterstart =$minutes;
		
        $new[] =  $row;
        }
		
        echo json_encode($new);
      }
    }
  }
/*
@Description : This function is used to get the all matches both played and future ones & standing leagues ,top scores of a particular league
*/
  public function leagueMatch() {
    //$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
    $countryname = $this->uri->segment(2);

    $tournament_stageName = (($this->uri->segment(3)));
    $myFile = "./uploads/sidebar/futboll.json" ;
    $jsondata = file_get_contents($myFile) ;
 //  print_r($jsondata);
    $arr_data = json_decode($jsondata, true) ;
   // print_r($arr_data);
    if(!empty($arr_data[$countryname]))
		{
		$country = $arr_data[$countryname];
		}
		else
		{
			$country = urldecode(str_replace("-", " ", $this->uri->segment(2)));
		}
		
		if(!empty($arr_data[$countryname.'-'.$tournament_stageName]))
		{
		$tournament_stageName = $arr_data[$countryname.'-'.$tournament_stageName];
		}
		else
		{
		 $tournament_stageName = (str_replace("-", " ", $this->uri->segment(3)));
		 $tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		}
       // echo $tournament_stageName; exit;
        //echo $country;

    ///$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
    $tournament_stageId = $this->getStageId($tournament_stageName, $country,$this->sportFK);
	 //echo  $this->db->last_query(); exit;
    if ($this->uri->segment(4)) {
      $data["tlist"] = $data["tlist"] = $data["list"] = $this->Parse_xml->get_league_match($tournament_stageId, $this->sportFK, "limit 1");
      $uri = $this->uri->segment(4);
      switch ($uri) {
        case "sonuclar" :
          $data["tlist"] = $data["list"] = $this->Parse_xml->get_league_match($tournament_stageId, $this->sportFK, "");
          break;
        case "puan-durumu" :
//if(!empty($data["list"])){
          $data["league_standing"] = $this->Parse_xml->get_leagues_standing($tournament_stageId);
//}
          break;
        case "takimlar" :
//if(!empty($data["list"])){
          $data["teams"] = $this->Parse_xml->get_teams($this->sportFK, $tournament_stageId);
//}
          break;
        case "fikstur" :
          $data["programMatch"] = $this->Parse_xml->get_programed_match($tournament_stageId, $this->sportFK, "200");
          if (empty ($data["programMatch"])) {
            $temptournament_stageId = $this->getNextStageId($tournament_stageName, $country,$this->sportFK);
            if ($temptournament_stageId != false) {
              $data["programMatch"] = $this->Parse_xml->get_programed_match($temptournament_stageId, $this->sportFK, "200");
            }
            else {
              $data["programMatch"] = '';
            }
          }
          break;
        default :
          break;
      }
    }
    if ($this->uri->segment(3) && !$this->uri->segment(4)) {
      $data["tlist"] = $data["list"] = $this->Parse_xml->get_league_match($tournament_stageId, $this->sportFK, "limit 50", '');
    }
    if (empty ($data["list"])) {
      $data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name,im.value AS league_image', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
    }
    //$data["relatedLeagues"] = $this->Common_games_model->get_league_by_country($this->sportFK, $country, $tournament_stageId);
    $data["relatedLeagues"] = $this->Common_games_model->get_league_country($this->sportFK, $country, $tournament_stageId);

  //  echo '<pre>';print_r($data["relatedLeagues"]); exit;
    if(count( $data["relatedLeagues"] ) && is_array( $data["relatedLeagues"] )) {
        $data['flag'] = $data["relatedLeagues"][0]->flag;
    $data['country_name'] = $data["relatedLeagues"][0]->country_name;
    $data['cname'] = $data["relatedLeagues"][0]->cname;
    $data["relatedLeagues"] = $leagues = $this->sortArrayByArray($this->sportFK,$data["relatedLeagues"][0]->countryID);
    }
    $data = $data + $this->common_list();
 //echo '<pre>'; print_r($data); die;
    $data['current_country'] = $country;

    $this->load->view('futball_leaguematch', $data);
  }
/*
@Description : this function is used to get detail of a particular team
*/
  public function teamDetail() {
    $team_name = str_replace('-', ' ', $this->uri->segment("3"));
    $data["team"] = $this->Parse_xml->get_teamDetail($team_name);
    $tid = $data["team"][0]->id;
    $data["players"] = $this->Parse_xml->get_players($tid);
    $data["players_detail"] = $this->Parse_xml->getLineup($tid);
// $this->test($data);
    $data = $data + $this->common_list();
  }
/*
@Descriptin : function is used to  get the detail of a particular match or event
*/
  public function matchDetail() {
    $eventId = $this->uri->segment("3");

    $data["result"] = $this->Parse_xml->match_detail($eventId);
    $data["incident"] = $this->Parse_xml->getIncident($eventId);

    if (!empty ($data["result"])) {
      $home_epid = $data["result"][0]->home_epid;
      $away_epid = $data["result"][0]->away_epid;
      $data["home_lineup"] = $this->Parse_xml->getLineup($home_epid, "l.pos ASC");

      $data["away_lineup"] = $this->Parse_xml->getLineup($away_epid, "l.pos DESC");
      $home_pid = $data["result"][0]->home_id;
      $away_pid = $data["result"][0]->away_id;
      $data["teamA_match"] = $this->Parse_xml->get_team_against_match($home_pid);
      $data["teamB_match"] = $this->Parse_xml->get_team_against_match($away_pid);
      $team1name = $data["result"][0]->home_team;
      $team2name = $data["result"][0]->away_team;
      $data["betweenMatch"] = $this->Parse_xml->get_between_match($team1name, $team2name);
      $data["home_statistic"] = $this->Parse_xml->get_statistics($eventId, $home_pid);
      $data["away_statistic"] = $this->Parse_xml->get_statistics($eventId, $away_pid);
    }
    $data["game"] = "futbol";
    $this->load->view('futball_popup', $data);
  }
  public function takim()
  {
	$data["game"] = "futbol";
    $teamId = $this->uri->segment(3);
    $data["detail"] = $this->Common_games_model->get_team_information($teamId);
    $data["players"] = $this->Common_games_model->get_team_players($teamId);
    foreach ($data["players"] as $k => $p) {
      $data["players"][$k]->gen = array_values($this->Common_games_model->get_general_details(array("objectFK" => $p->id, "object" => "participant")));
    }
    $this->load->view('common/playerProfile', $data);
  }
/*
@Description : funtion to get the color schemes and leagues and banners Which is embeded in every function as a common function
*/
  public function common_list() {
    $data["game"] = "futbol";
    $this->db->cache_on();
    $data['clrschemes'] = $this->Common_model->get_all_orderby('admin_color_schemes', "id ASC");
    $data["banners"] = $this->Common_model->get_all_orderby("futboll_banners", "id asc");
    $this->db->cache_off();
    $data["leagues"] = $this->Parse_xml->get_leagues($this->sportFK);
    $myleagues = $this->Common_model->get_where('my_leagues', array('sportFK' => $this->sportFK));

    if (!empty ($myleagues) && !empty (json_decode($myleagues[0]->tournament_stageFK, true))) {
      $myleagues = $myleagues[0];
      $data["leagues"] = $this->Common_games_model->get_leagues($this->sportFK, json_decode($myleagues->tournament_stageFK, true));
    }
    $date = $this->uri->segment('3');
    	$data["countryListCenter"] = $this->Common_games_model->get_only_country($this->sportFK,'countryListCenter');
         if (empty ($data['countryListCenter'])) {
        $data["countryListCenter"] = $this->Common_model->get_all_orderby("country", 'name asc');
      }
       foreach ($data["countryListCenter"] as $key => $val) {
        //$leagues = $this->Common_games_model->get_country_leagues($this->sportFK, $val->id);
        $leagues = $this->sortArrayByArray($this->sportFK,$val->id,'leagueslistCenter');
		$temp_country = $this->Common_model->get_where('language', array('language_typeFK' => 31, 'object' => 'country', "objectFK" => $val->id));
        if (!empty ($temp_country)) {
			$data["countryListCenter"][$key]->cname =$data["countryListCenter"][$key]->name;
          $data["countryListCenter"][$key]->name = $temp_country[0]->name;
        }
        if (!empty ($leagues)) {
          $data["countryListCenter"][$key]->leagues = $leagues;
        }
        else {
          unset ($data["countryListCenter"][$key]);
        }
      }


    if (!$data["country"] = $this->cache->file->get(__CLASS__ . __FUNCTION__ . 'country' . $date)) {

      $data["country"] = $this->Common_games_model->get_only_country($this->sportFK);
      ///this is condition if there is no country for that event than load all countries lists
      if (empty ($data['country'])) {
        $data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
      }
      $country = $data["country"];
      foreach ($country as $key => $val) {
        //$leagues = $this->Common_games_model->get_country_leagues($this->sportFK, $val->id);
        $leagues = $this->sortArrayByArray($this->sportFK,$val->id);
		$temp_country = $this->Common_model->get_where('language', array('language_typeFK' => 31, 'object' => 'country', "objectFK" => $val->id));
        if (!empty ($temp_country)) {
			$data["country"][$key]->cname =$data["country"][$key]->name;
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
  public function iframe() {
	$country = urldecode(str_replace("-", " ", $this->uri->segment(3)));
		$tournament_stageName = str_replace("-", " ", $this->uri->segment(4));
		$tournament_stageName = urldecode(str_replace("+", " - ", $tournament_stageName));
		

  	$tournament_stageId = $this->getStageId_language($tournament_stageName, $country,$this->sportFK);
		if (!$theHTMLResponse = $this->cache->file->get(__FUNCTION__ . __CLASS__ .'league_popup'. $this->uri->uri_string()))
		{
			if ($this->uri->segment(4)) {
			  $data["tlist"] = $data["tlist"] = $data["list"] = $this->Parse_xml->get_league_match($tournament_stageId, $this->sportFK, "limit 1");
			  $data["league_standing"] = $this->Parse_xml->get_leagues_standing($tournament_stageId);
			}
			if (empty ($data["list"])) {
			  $data["tlist"] = $this->Common_games_model->get_sel_only_tournament('s.name as sport_name,ts.id,l.name as country_name,c.flag,t.name as tournament_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS league_name', array("ts.id" => $tournament_stageId, "tt.sportFK" => $this->sportFK));
			}
			$data["game"] = "futbol";

			$theHTMLResponse = $this->load->view("futball/futball_leaguematch_iframe", $data, TRUE);
			$this->cache->file->save(__FUNCTION__ . __CLASS__ .'league_popup'.$this->uri->uri_string(), $theHTMLResponse, 14400);
		}
		echo $theHTMLResponse;
  }
}