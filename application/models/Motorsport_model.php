<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Model Name : Motorsport_model
Description : This controller  is used to show all the events,matches,leagues of game Tennis.

Function : get_live_list
	Description : This function is used to get the Live matches of Today.
Function : get_participants
	Description : This function is used to get participants by eventid.


Function : get_league_match
	Description : Description : This function is to gets all the matches (both played and future ones) from a season or league .
Function : get_programed_match
	Description : This function is to get program matches which is going to be play in a particular league.
Function : get_leagues_standing
	Description  : This function is to get all leagues standing of team in a league.
Function : get_matches
	Description : This function is a child function of get_leagues_standing() .it is used to get the played match status win,lose,tie.
Function : get_leagues
	Description this function is used to get selected leagues of a particular sport 
Function : get_team_against_match
	Description : this function is used to get list matches which is played against of a Team 
Function : get_between_match
	Description : his function is used to get list matches which is played between two teams 
Function : getLineup
	Description : This function is used to get lineup of all players.	
Function : get_players
	Description : This function is used to get all players of a team.
Function : get_country_leagues
	Description : Description : this function is used to get all leagues of country	



Date of created : 05-06-2017
Last Modified : 05-06-2017
	
*/
class Motorsport_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("Common_model");
		/* Setting global stardate and enddate */
		$this->today_from =  "2017-07-15 00:00:00";
		$this->today_to =  "2017-07-15 23:59:59";
		//$this->today_from =  date("Y-m-d 00:00:00");
		//$this->today_to =  date("Y-m-d 23:59:59");
	}
	/* @Description : This function is to get todays live matches of Motorsport game. */
	public function get_live_list($sportFK,$date='',$wherein='')
	{
		$this->db->select('e.id,e.name,l.name as country,t.id as tid,c.flag,e.name as eventname,
				    IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS stage_name,ts.id AS stage_id,
				    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
					esl.name AS status_text,
					MIN(IF( prop2.name = "Venue", prop2.value , NULL )) AS venue,					
					MIN(IF( prop.name = "Live", prop.value , NULL )) AS elive,	
					MIN(IF( prop.name = "Round", prop.value , NULL )) AS round,	
					MIN(IF( prop.name = "Kilometers", prop.value , NULL )) AS km,	
					MIN(IF( prop.name = "Laps", prop.value , NULL )) AS laps,	
					MIN(IF( prop.name = "weather", prop.value , NULL )) AS weather,	
					MIN(IF( prop.name = "track_condition", prop.value , NULL )) AS track_condition,	
					MIN(IF( prop.name = "current_lap", prop.value , NULL )) AS current_lap,	
					MIN(IF( prop.name = "fastest_lap_time", prop.value , NULL )) AS fastest_lap_time,	
					MIN(IF( prop.name = "fastest_lap_participantFK", prop.value , NULL )) AS fastest_lap_participantFK,	
					');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('event_scope AS esc', 'esc.eventFK = e.id', 'INNER');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('property as prop', 'prop.objectFK  = e.id and prop.object = "event" ', 'left');
		$this->db->join('property as prop2', 'prop2.objectFK  = ts.id and prop2.object = "tournament_stage"', 'left');
		//$this->db->join('participant AS p', ' p.id = prop.value and prop.name="fastest_lap_participantFK" and prop.object="event"', 'right');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'left');
		$this->db->join('language  AS ls', 'ts.id = ls.objectFK and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->WHERE('tt.sportFK ="'.$sportFK.'" ');
		$this->db->WHERE('e.del ="no" ');
		if($date!=''){
			$today_from = $date." 00:00:00";
			$today_to = $date." 23:59:59";
			$this->db->WHERE("e.startdate BETWEEN '".$today_from."' AND '".$today_to."'");
		}else{
			$this->db->WHERE("e.startdate BETWEEN '".$this->today_from."' AND '".$this->today_to."'");
		}
		if(!empty($wherein)){
			$this->db->where_in("e.id",$wherein);
		}
		$this->db->group_by('e.id');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get()->result();
		foreach($result as $key =>$val)
		{
			$result[$key]->fastest_lap_participant = $this->Common_model->get_singel_field_where_order('participant','name',array('del'=>'no','id'=>$val->fastest_lap_participantFK),'id asc');
		}
		return $result;
	}
	/* 
		@Description : This function is used to get event participants by eventid		
	*/
	public function get_participants($event)
	{
			$this->db->select('p.id as racer_id,p.name as racer_name,c.name as country,ep.id as epid,c.flag,
						MIN(IF( r.result_typeFK = "100" , CAST(r.value AS UNSIGNED) , NULL )) AS rank,
						MIN(IF(r.result_code = "duration" AND r.value != "", CONCAT(" ",r.value), IF(r.result_code = "laps_behind", r.value, NULL)) ) AS time_elapsed,
						MIN(IF(r.result_typeFK = "102", r.value, NULL) ) as points,
						MIN(IF(r.result_typeFK = "223", r.value, NULL)) as pitstops,
						MIN(IF(prop.name = "startnumber", prop.value, NULL)) as startnumber,						
						MIN(IF(prop.name = "team", prop.value, NULL)) as teamid,					
						');
			$this->db->from('event AS e');
			$this->db->join('event_participants AS ep', 'e.id = ep.eventFK ', 'INNER');
			$this->db->join('participant AS p', ' p.id = ep.participantFK ', 'left');
			
			$this->db->join('country  AS c', 'c.id  = p.countryFK ', 'left');
			$this->db->join('result  AS r', 'r.event_participantsFK  = ep.id and r.del = "no"', 'left');
			$this->db->join('property as prop', 'prop.objectFK  = ep.id and prop.object = "event_participants" ', 'left');
			$this->db->where("e.id = $event ");
			$this->db->group_by("ep.id");
			$this->db->order_by("rank");
			$result = $this->db->get()->result();
			 foreach($result as $key =>$val)
			{
				$result[$key]->team_name = $this->Common_model->get_singel_field_where_order('participant','name',array('del'=>'no','id'=>$val->teamid),'id asc');
			}  
			return $result;
	}

	/* @Description : This function is to gets all the matches (both played and future ones) from a season or league */
	public function get_league_match($sfk,$where,$limit='')
	{
				$this->db->select('e.id,e.name,l.name as country,l.name as country_name,c.flag,
				    IF(lts.name IS NULL or lts.name="", ts.name,lts.name) AS league_name,ts.id AS stage_id,tt.name as tt_name,IF(lts.name IS NULL or lts.name="", ts.name,lts.name) AS stage_name,
				    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
					esl.name AS status_text,ls.name as sport_name,
					MIN(IF( prop2.name = "Venue", prop2.value , NULL )) AS venue,					
					MIN(IF( prop.name = "Live", prop.value , NULL )) AS elive,	
					MIN(IF( prop.name = "Round", prop.value , NULL )) AS round,	
					MIN(IF( prop.name = "Kilometers", prop.value , NULL )) AS km,	
					MIN(IF( prop.name = "Laps", prop.value , NULL )) AS laps,	
					MIN(IF( prop.name = "weather", prop.value , NULL )) AS weather,	
					MIN(IF( prop.name = "track_condition", prop.value , NULL )) AS track_condition,	
					MIN(IF( prop.name = "current_lap", prop.value , NULL )) AS current_lap,	
					MIN(IF( prop.name = "fastest_lap_time", prop.value , NULL )) AS fastest_lap_time,	
					MIN(IF( prop.name = "fastest_lap_participantFK", prop.value , NULL )) AS fastest_lap_participantFK,	
					');
			$this->db->from('tournament_template as tt');
			$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
			$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
			$this->db->join('event_scope AS esc', 'esc.eventFK = e.id', 'INNER');
			$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
			$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
			$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
			$this->db->join('property as prop', 'prop.objectFK  = e.id and prop.object = "event" ', 'left');
			$this->db->join('property as prop2', 'prop2.objectFK  = ts.id and prop2.object = "tournament_stage"', 'left');
			$this->db->join('sport AS s', 's.id = tt.sportFK AND s.del="no"', 'left');
			$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'left');
			$this->db->join('language  AS lts', 'ts.id = lts.objectFK and lts.object="tournament_stage" and lts.language_typeFK=31', 'left');
			$this->db->join('language  AS ls', 's.id = ls.objectFK and ls.object="sport" and ls.language_typeFK=31', 'left');
			$this->db->WHERE('tt.sportFK ="'.$sfk.'" ');
			$this->db->WHERE($where);
			$this->db->WHERE('e.del ="no" ');
			$this->db->WHERE("e.startdate <'".$this->today_from."' ");
			if(!empty($limit)){
				$this->db->limit($limit);
			}
			$this->db->group_by('e.id');
			$this->db->order_by("e.startdate,e.id,ts.id");
			$result = $this->db->get();
			return $result->result();

	}
	
	/*  @Description : This function is to get program matches which is going to be play in a particular league. */
	public function get_programed_match($sportFK,$tsfk)
	{
		$this->db->select('e.id,c.name as country,c.flag,e.name as eventname,
				    ts.name AS league_name,ts.id AS stage_id,
				    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
				    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
				    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
				    esl.name AS status_text,datediff("'.$this->today_from.'",DATE_FORMAT(e.startdate, "%y-%m-%d")) As date_diff');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
		$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
		$this->db->join('result AS r', 'ep.id = r.event_participantsFK', 'left');
		$this->db->join('property AS prop', 'e.id = prop.objectFK AND prop.object ="event" ', 'left');
		
		$this->db->WHERE("tt.sportFK =".$sportFK."");
		$this->db->WHERE("ts.name like '".$tsfk."' ");
		$this->db->WHERE("e.startdate > '".$this->today_from."' ");
		$this->db->WHERE("e.status_type = 'notstarted' ");
		$this->db->WHERE('prop.value = "yes"');
		
		$this->db->group_by('e.id');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();
		return $result->result();
	}
	/* @Description  : This function is to get all leagues standing of team in a league. */
	public function get_leagues_standing($tsFK)
	{
			$leaguesql 	= 'SELECT
							p.name,
							p.id as participant_id,
							sp.rank AS rank,
							MIN(IF(sd.code = "points", sd.value, NULL)) AS points,
							MIN(IF(sd.code = "played", sd.value, NULL)) AS played,
							MIN(IF(sd.code = "wins", sd.value, NULL)) AS wins,
							MIN(IF(sd.code = "draws", sd.value, NULL)) AS draws,
							MIN(IF(sd.code = "defeits", sd.value, NULL)) AS defeits,
							MIN(IF(sd.code = "goalsfor", sd.value, NULL)) AS goalsfor,
							MIN(IF(sd.code = "goalsagainst", sd.value, NULL)) AS goalsagainst
						FROM
							standing AS s INNER JOIN
							standing_participants AS sp ON s.id = sp.standingFK INNER JOIN
							standing_data AS sd ON sp.id = sd.standing_participantsFK INNER JOIN
							participant AS p ON sp.participantFK = p.id
						WHERE
							s.object = "tournament_stage" AND
							s.objectFK = '.$tsFK.' AND
							s.name = "Ligatable test"
						GROUP BY
							sp.id
						ORDER BY
							rank' ;

			$result = $this->db->query($leaguesql)->result();
			
			foreach($result as $key =>$val){
				$result[$key]->matches = $this->get_matches($val->participant_id);
			}
			return $result;
	}
	/* @Description : This function is a child function of get_leagues_standing() .it is used to get the played match status win,lose,tie. */
	public function get_matches($teamId)
	{		
				$sql = 'SELECT
						e.id,
						DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
						MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
						IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"0") AS home_score,
						IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"0") AS away_score,
						MIN(IF( ep.number = 2, p.name, NULL)) AS away_team,
						CASE WHEN IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"0") > IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"0") THEN 1 ELSE 0 END as win,
						CASE WHEN IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"0") = IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"0") THEN 1 ELSE 0 END as tie
					FROM
						event AS e INNER JOIN
						event_participants AS ep ON e.id = ep.eventFK LEFT JOIN
						participant AS p ON ep.participantFK = p.id LEFT JOIN
						result AS r ON ep.id = r.event_participantsFK AND
						r.del = "no"
					WHERE
						ep.eventFK in ( SELECT id FROM `event` where id in (SELECT eventFK FROM `event_participants` where participantFk='.$teamId.') ) AND e.startdate < "'.$this->today_from.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id' ;
						
			$result = $this->db->query($sql);
			return $result->result();
	}
	/* @Description this function is used to get selected leagues of a particular sport */
	public function get_leagues($sportFK)
	{
		$sql = 'SELECT 
				`ts`.`id`,
				`ts`.`name`,
				`c`.`name` AS country_name
				FROM `tournament_stage` as `ts` INNER JOIN `country` AS `c` ON `c`.`id` = `ts`.`countryFK`
				WHERE `ts`.`tournamentFK` in (SELECT id FROM `tournament` WHERE tournament_templateFK in ( SELECT id from `tournament_template` where del="no" AND sportFk='.$sportFK.') ) AND ts.name in ("Bundesliga","Lidl Starligue","Liga ASOBAL","World Championship Finals","Champions League Men","European Championship - Ladies") group by ts.name';
		$result = $this->db->query($sql);
        return $result->result();
	}
	
	/* @Description : this function is used to get leagues according to the related country of selected league */
	public function get_league_by_country($sportFK,$country)
	{
		$this->db->select('`ts`.`id`,
				 c.flag,
				`l`.`name` AS country_name,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS name');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('country AS c', 'c.id = ts.countryFK', 'INNER');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and object="country" and language_typeFK=31', 'inner');
		$this->db->join('language  AS ls', 'ls.objectFK  = ts.id and ls.object="tournament_stage" and ls.language_typeFK=31', 'LEFT');
		$this->db->where(array("tt.sportFK"=>$sportFK));
		$this->db->where_in("ts.name",array("Dunya Kupasi","League 1","lalig to","Bundesliga","Premier League","sampiyonlar Ligi","Avrupa Ligi","Dunya Kupas","World Cup","Sports Toto Super League","Champions League","European League","TFF 1st League"));
		$this->db->WHERE(array("ts.startdate >="=>date("2017-01-01 00:00:00")));
		$this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	/* @Description : This function is used to get the detail of a match.  */
	public function match_detail($eventId)
	{
		$matchDetailSql = 'SELECT
					    e.id,
					    ts.name AS stage_name,
					    ts.countryFK AS cfk,
						c.name as country,
					    ts.id AS stage_id,
					    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
					    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
					    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
					    MIN(IF( ep.number = 1, p.id, NULL)) AS home_id,
					    MIN(IF( ep.number = 1, ep.id, NULL)) AS home_epid,
					    IF(e.status_type = "notstarted", "",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
					    IF(e.status_type = "notstarted", "",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
					    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
					    MIN(IF(ep.number = 2, p.id, NULL)) AS away_id,
					    MIN(IF( ep.number = 2, ep.id, NULL)) AS away_epid,
					    esl.name AS status_text,
					    v.name as venue_name,
					    prop.value as pvalue,
						prop.name as pname
					FROM
					    tournament_template AS tt INNER JOIN
					    tournament AS t ON t.tournament_templateFK = tt.id left JOIN
					    tournament_stage AS ts ON t.id = ts.tournamentFK left JOIN
					    venue AS v ON v.id = ts.countryFK LEFT JOIN
						country  AS c ON c.id  = ts.countryFK  INNER JOIN
					    event AS e ON ts.id = e.tournament_stageFK left JOIN
					    event_participants AS ep ON e.id = ep.eventFK left JOIN
					    status_desc AS es ON e.status_descFK = es.id LEFT JOIN
						language  AS esl ON  es.id = esl.objectFK and esl.object="status_desc" and esl.language_typeFK=31 LEFT JOIN
					    participant AS p ON ep.participantFK = p.id left JOIN
					    result AS r ON ep.id = r.event_participantsFK left JOIN
					    property AS prop ON e.id = prop.objectFK AND prop.object ="event_participants"
					WHERE
					    e.id= '.$eventId.'
					GROUP BY
					    e.id
					ORDER BY 
					    ts.id, e.startdate, e.id';

			$result = $this->db->query($matchDetailSql);
			return $result->result();
	}
	/* @Description : Get incidents of a match */
	public function getIncident($id)
	{
		$incidentsql = 'SELECT 
						    i.id,
						    ep.number,
						    it.name AS iname,
						    IF(ep.number = 1, p.name, "") AS pname1,
						    IF(ep.number = 1, CONCAT(i.elapsed,"\'"), "") AS elapsed1,
						    IF(ep.number = 2, CONCAT(i.elapsed,"\'"), "") AS elapsed2,
						    IF(ep.number = 2, p.name, "") AS pname2,
						    pr.value AS player_name
						FROM
						    event AS e INNER JOIN
						    event_participants AS ep ON e.id = ep.eventFK INNER JOIN
						    incident AS i ON ep.id = i.event_participantsFK INNER JOIN
						    incident_type AS it ON i.incident_typeFK = it.id LEFT JOIN
						    participant AS p ON i.ref_participantFK = p.id  LEFT JOIN 
						    property AS pr ON i.id = pr.objectFK AND pr.object = "incident" AND pr.name="player_name"
						WHERE
						    e.id IN ('.$id.') AND it.name != "Substitution out" AND it.name != "Assist" AND i.del = "no" ORDER BY i.elapsed, i.id';
			$result = $this->db->query($incidentsql);
			return $result->result();
	
	}
	/* @Description : this function is used to get list matches which is played against of a Team */
	public function get_team_against_match($teamId)
	{
				$sql = 'SELECT
						e.id,
						DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
						DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
						MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
						IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"-") AS home_score,
						IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"-") AS away_score,
						MIN(IF(ep.number = 2, p.name, NULL)) AS away_team
					FROM
						event AS e INNER JOIN
						event_participants AS ep ON e.id = ep.eventFK LEFT JOIN
						participant AS p ON ep.participantFK = p.id LEFT JOIN
						result AS r ON ep.id = r.event_participantsFK AND
						r.del = "no"
					WHERE
						ep.eventFK in ( SELECT id FROM `event` where id in (SELECT eventFK FROM `event_participants` where participantFk='.$teamId.') ) AND e.startdate < "'.$this->today_from.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id' ;
			$result = $this->db->query($sql);

			return $result->result();
	}
	
	/* @Description : this function is used to get list matches which is played between two teams */
	public function get_between_match($t1,$t2)
	{
		$TODAY =  date("Y-m-d 00:00:00");
				$sql = 'SELECT
						e.id,
						DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
						DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
						MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
						IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"-") AS home_score,
						IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"-") AS away_score,
						MIN(IF(ep.number = 2, p.name, NULL)) AS away_team
					FROM
						event AS e INNER JOIN
						event_participants AS ep ON e.id = ep.eventFK LEFT JOIN
						participant AS p ON ep.participantFK = p.id LEFT JOIN
						result AS r ON ep.id = r.event_participantsFK AND
						r.del = "no"
					WHERE
						e.name like "'.$t1.'-'.$t2.'" OR e.name like "'.$t2.'-'.$t1.'" AND e.startdate < "'.$this->today_from.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id' ;
			$result = $this->db->query($sql);

			return $result->result();
	}
	/* @Description : Function is used to get the line up of players of a team */
	public function getLineup($team_ep)
	{
		$this->db->select('lt.name as player_type,l.participantFK,p.name,l.pos,l.shirt_number');
		$this->db->from('lineup AS l');
		$this->db->join('lineup_type AS lt', 'lt.id = l.lineup_typeFK', 'INNER');
		$this->db->join('participant AS p', 'p.id = l.participantFK ', 'INNER');
		$this->db->where("l.event_participantsFK  = $team_ep");
		// $this->db->group_by('e.id');
		// $this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();
        return $result->result();
	}
	/* @Description : this function is used to get the players of a team */
	public function get_players($pfk)
	{
		$sql = 'SELECT OP.participantFK, 
				OP.participant_type, OP.date_from, OP.date_to, 	OP.active, P.name, P.`type`, P.countryFK, C.name AS country_name 
				FROM object_participants AS OP
				INNER JOIN participant AS P ON P.id = OP.participantFK
				LEFT OUTER JOIN country AS C ON C.id = P.countryFK
				WHERE OP.object =  "participant" AND OP.objectFK ='.$pfk.' AND OP.del =  "no" ';
		$result = $this->db->query($sql);
        return $result->result();
	}
	/* 		@Description : this function is used to get current tournament*/
	public function get_current_races($sportFK)
	{
		ini_set('memory_limit', '-1');	
		$this->db->select("ts.id,IF(ls.name IS NULL or ls.name='', ts.name,ls.name) AS name,e.name as event,e.id as eventid,c.flag,l.name as country_name");
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and object="country" and language_typeFK=31', 'left');
		$this->db->join('language  AS ls', 'ts.id = ls.objectFK and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->where("ts.del='no' and t.del='no' and tt.del='no' and tt.sportFK=$sportFK");
		$this->db->where('e.startdate between "'.$this->today_from.'" and "'.$this->today_to.'" ');
		$this->db->where('e.del = "no" ');
		$this->db->group_by('ts.name');
		$result = $this->db->get()->result();
		return $result;	
	}
	
	public function get_general_details($where)
	{
		$this->db->select('GROUP_CONCAT(IF(p.name = "date_of_birth", p.value, NULL)) as date_of_birth,
						GROUP_CONCAT(IF(p.name = "height", p.value, NULL)) as height,
						GROUP_CONCAT(IF(p.name = "weight", p.value, NULL)) as weight,
						GROUP_CONCAT(IF(p.name = "status", p.value, NULL)) as status
						');
		$this->db->where($where);
		$result = $this->db->get("property as p");
		return $result->result();
	}


	



}