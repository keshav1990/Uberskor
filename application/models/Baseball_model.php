<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Model Name : Baseball_model
Description : This controller  is used to show all the events,matches,leagues of game Baseball.

Function : get_live_list
	Description : This function is used to get the Live matches of Today.
Function : get_result
	Description : This function is used to get the result of a match of both team .


Function : get_league_by_country
	Description : this function is used to get leagues according to the related country of selected league 

	
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

Date of created : 2-06-2017
Last Modified : 02-06-2017
	
*/
class Baseball_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		/* Setting global stardate and enddate */
		$this->today_from =  "2017-05-25 00:00:00";
		$this->today_to =  "2017-05-25 23:59:59";
		$this->today_from =  date("Y-m-d 00:00:00");
		$this->today_to =  date("Y-m-d 23:59:59");
	}
	/* @Description : This function is to get todays live matches of Baseball game. */
	public function get_live_list($sportFK,$date='',$wherein='')
	{
		$this->db->select('e.id,e.name,l.name as country,e.name as event_name,c.flag,e.name as eventname,
				    IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS stage_name,ts.id AS stage_id,
				    DATE_FORMAT(e.startdate, "%d.%m") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
					esl.name AS status_text,
					MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
					MIN(IF( ep.number = 1, ep.id, NULL)) AS home_id,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
				    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
					MIN(IF( ep.number = 2, ep.id, NULL)) AS away_id,
					MIN(IF( prop.name = "Cup", prop.value , NULL )) AS cup,
					MIN(IF( prop.name = "Ranking", prop.value , NULL )) AS ranking,
					MIN(IF( prop2.name = "Round", prop2.value ,NULL )) AS round,
					MIN(IF( prop2.name = "VenueName", prop2.value , NULL )) AS venue,
					MIN(IF( prop2.name = "Live", prop2.value , NULL )) AS live,
					MIN(IF( prop2.name = "GameStarted", prop2.value , NULL )) AS gameStarted,
					MIN(IF( prop2.name = "current_pitcher", prop2.value , NULL )) AS current_pitcher,
					MIN(IF( prop2.name = "runner_on_third", prop2.value , NULL )) AS runner_on_third,
					MIN(IF( prop2.name = "current_batter", prop2.value , NULL )) AS current_batter,
					MIN(IF( prop2.name = "strike_count", prop2.value , NULL )) AS strike_count,
					MIN(IF( prop2.name = "ball_count", prop2.value , NULL )) AS ball_count,
					MIN(IF( prop2.name = "outs", prop2.value , NULL )) AS outs,
					MIN(IF( prop2.name = "runner_on_first", prop2.value , NULL )) AS runner_on_first,
					MIN(IF( prop2.name = "runner_on_second", prop2.value , NULL )) AS runner_on_second,
					MIN(IF( prop2.name = "GameEnded", prop2.value , NULL )) AS gameEnded,
					MIN(IF( prop2.name = "Verified", prop2.value , NULL )) AS verified,
					MIN(IF( prop2.name = "Spectators", prop2.value , NULL )) AS spectators,
					');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('property as prop', 'prop.objectFK  = ts.id and prop.object = "tournament_stage" ', 'left');
		$this->db->join('property as prop2', 'prop2.objectFK  = e.id and prop2.object = "event" ', 'left');
		$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
		$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
		//$this->db->join('participant AS p2', 'p2.id = prop2.value and prop2.name="current_pitcher"', 'inner');
		//$this->db->join('participant AS p3', 'p3.id = prop2.value and prop2.name="current_batter"', 'left');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'left');
		$this->db->join('language  AS ls', 'ts.id = ls.objectFK and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->join('result AS r', 'ep.id = r.event_participantsFK AND r.result_code = "runningscore"', 'left');
		$this->db->WHERE('tt.sportFK ="'.$sportFK.'" ');
		$this->db->WHERE('e.del ="no" ');if($date!=''){
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
		$result = $this->db->get();
		return $result->result();
	}
	/* 
		@Description : This function is used to get the result of a match .
	*/
	public function get_result($efk)
	{
		$this->db->select('r.event_participantsFK as resultid,
					MIN(IF(r.result_code = "ordinarytime", r.value, NULL)) AS ordinarytime,
					MIN(IF(r.result_code = "runningscore", r.value, NULL)) AS runningscore,
					MIN(IF(r.result_code = "hits", r.value, NULL)) AS hits,
					MIN(IF(r.result_code = "errors", r.value, NULL)) AS errors,
					MIN(IF(r.result_code = "inning1", r.value, NULL)) AS inning1,
					MIN(IF(r.result_code = "inning2", r.value, NULL)) AS inning2,
					MIN(IF(r.result_code = "inning3", r.value, NULL)) AS inning3,
					MIN(IF(r.result_code = "inning4", r.value, NULL)) AS inning4,
					MIN(IF(r.result_code = "inning5", r.value, NULL)) AS inning5,
					MIN(IF(r.result_code = "inning6", r.value, NULL)) AS inning6,
					MIN(IF(r.result_code = "inning7", r.value, NULL)) AS inning7,
					MIN(IF(r.result_code = "inning", r.value, NULL)) AS inning8,
					MIN(IF(r.result_code = "inning9", r.value, NULL)) AS inning9,
					MIN(IF(r.result_code = "extratime", r.value, NULL)) AS extratime,
					MIN(IF(r.result_code = "extra_inning", r.value, NULL)) AS extra_inning,
					MIN(IF(r.result_code = "finalresult", r.value, NULL)) AS finalresult,
							');
		$this->db->where(array("event_participantsFK"=>$efk));
		$result = $this->db->get("result as r");
		return $result->result();
	}
	/* @Description : This function is to gets all the matches (both played and future ones) from a season or league */
	public function get_league_match($tournament_stageId,$sfk,$limit='')
	{		
			
			$this->db->select('e.id,e.name,l.name as country_name,e.name as eventname,c.flag,
						IF(lts.name IS NULL or lts.name="", ts.name,lts.name) AS league_name,ts.id AS stage_id,t.name as tournament_name,
						DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
						DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
						es.name AS status_text,
						MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
						MIN(IF( ep.number = 1, ep.id, NULL)) AS home_id,
						IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
						IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
						MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
						MIN(IF( ep.number = 2, ep.id, NULL)) AS away_id,
						MIN(IF( prop.name = "Cup", prop.value , NULL )) AS cup,
						MIN(IF( prop.name = "Ranking", prop.value , NULL )) AS ranking,
						MIN(IF( prop2.name = "Round", prop2.value ,NULL )) AS round,
						MIN(IF( prop2.name = "VenueName", prop2.value , NULL )) AS venue,
						MIN(IF( prop2.name = "Live", prop2.value , NULL )) AS live,
						MIN(IF( prop2.name = "GameStarted", prop2.value , NULL )) AS gameStarted,
						MIN(IF( prop2.name = "current_pitcher", prop2.value , NULL )) AS current_pitcher,
						MIN(IF( prop2.name = "runner_on_third", prop2.value , NULL )) AS runner_on_third,
						MIN(IF( prop2.name = "current_batter", prop2.value , NULL )) AS current_batter,
						MIN(IF( prop2.name = "strike_count", prop2.value , NULL )) AS strike_count,
						MIN(IF( prop2.name = "ball_count", prop2.value , NULL )) AS ball_count,
						MIN(IF( prop2.name = "outs", prop2.value , NULL )) AS outs,
						MIN(IF( prop2.name = "runner_on_first", prop2.value , NULL )) AS runner_on_first,
						MIN(IF( prop2.name = "runner_on_second", prop2.value , NULL )) AS runner_on_second,
						MIN(IF( prop2.name = "GameEnded", prop2.value , NULL )) AS gameEnded,
						MIN(IF( prop2.name = "Verified", prop2.value , NULL )) AS verified,
						MIN(IF( prop2.name = "Spectators", prop2.value , NULL )) AS spectators,
						DATE_FORMAT(e.startdate, "%m") as diff_month,
						ls.name as sport_name
						');
			$this->db->from('tournament_template as tt');
			$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
			$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
			$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
			$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
			$this->db->join('property as prop', 'prop.objectFK  = ts.id and prop.object = "tournament_stage" ', 'left');
			$this->db->join('property as prop2', 'prop2.objectFK  = e.id and prop2.object = "event" ', 'left');
			$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
			$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
			$this->db->join('result AS r', 'ep.id = r.event_participantsFK AND r.result_code = "runningscore"', 'left');
			$this->db->join('sport AS s', 's.id = tt.sportFK', 'left');
			$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'left');
			$this->db->join('language  AS lts', 'ts.id = lts.objectFK and lts.object="tournament_stage" and lts.language_typeFK=31', 'left');
			$this->db->join('language  AS ls', 's.id = ls.objectFK and ls.object="sport" and ls.language_typeFK=31', 'left');
			$this->db->WHERE('tt.sportFK ="'.$sfk.'" ');			
			$this->db->WHERE('ts.id ="'.$tournament_stageId.'" ');			
			$this->db->WHERE('e.del ="no" ');
			$this->db->WHERE("e.startdate < '".$this->today_from."' ");
			if(!empty($limit)){
				$this->db->limit($limit);
			}
			$this->db->group_by('e.id');
			$this->db->order_by("e.startdate,e.id,ts.id");
			$result = $this->db->get();
			return $result->result();
	}
	
	/*  @Description : This function is to get program matches which is going to be play in a particular league. */
	public function get_programed_match($tournament_stageId,$sfk,$limit='20')
	{
		$this->db->select('e.id,e.name,c.name as country_name,c.flag,e.name as eventname,
						ts.name AS league_name,ts.id AS stage_id,t.name as tournament_name,
						DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
						DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
						es.name AS status_text,
						MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
						MIN(IF( ep.number = 1, ep.id, NULL)) AS home_id,
						IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
						IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
						MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
						MIN(IF( ep.number = 2, ep.id, NULL)) AS away_id,
						MIN(IF( prop.name = "Cup", prop.value , NULL )) AS cup,
						MIN(IF( prop.name = "Ranking", prop.value , NULL )) AS ranking,
						MIN(IF( prop2.name = "Round", prop2.value ,NULL )) AS round,
						MIN(IF( prop2.name = "VenueName", prop2.value , NULL )) AS venue,
						MIN(IF( prop2.name = "Live", prop2.value , NULL )) AS live,
						MIN(IF( prop2.name = "GameStarted", prop2.value , NULL )) AS gameStarted,
						MIN(IF( prop2.name = "current_pitcher", prop2.value , NULL )) AS current_pitcher,
						MIN(IF( prop2.name = "runner_on_third", prop2.value , NULL )) AS runner_on_third,
						MIN(IF( prop2.name = "current_batter", prop2.value , NULL )) AS current_batter,
						MIN(IF( prop2.name = "strike_count", prop2.value , NULL )) AS strike_count,
						MIN(IF( prop2.name = "ball_count", prop2.value , NULL )) AS ball_count,
						MIN(IF( prop2.name = "outs", prop2.value , NULL )) AS outs,
						MIN(IF( prop2.name = "runner_on_first", prop2.value , NULL )) AS runner_on_first,
						MIN(IF( prop2.name = "runner_on_second", prop2.value , NULL )) AS runner_on_second,
						MIN(IF( prop2.name = "GameEnded", prop2.value , NULL )) AS gameEnded,
						MIN(IF( prop2.name = "Verified", prop2.value , NULL )) AS verified,
						MIN(IF( prop2.name = "Spectators", prop2.value , NULL )) AS spectators,
						DATE_FORMAT(e.startdate, "%m") as diff_month,
						s.name as sport_name
						');
			$this->db->from('tournament_template as tt');
			$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
			$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
			$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
			$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
			$this->db->join('property as prop', 'prop.objectFK  = ts.id and prop.object = "tournament_stage" ', 'left');
			$this->db->join('property as prop2', 'prop2.objectFK  = e.id and prop2.object = "event" ', 'left');
			$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
			$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
			$this->db->join('result AS r', 'ep.id = r.event_participantsFK AND r.result_code = "runningscore"', 'left');
			$this->db->join('sport AS s', 's.id = tt.sportFK', 'left');
			$this->db->WHERE('tt.sportFK ="'.$sfk.'" ');			
			$this->db->WHERE('ts.id ="'.$tournament_stageId.'" ');			
			$this->db->WHERE('e.del ="no" ');
			$this->db->WHERE("e.startdate > '".$this->today_to."' ");
			if(!empty($limit)){
				$this->db->limit($limit);
			}
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
						r.del = "no" AND r.result_code = "runningscore"
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
		$this->db->select('`ts`.`id`,
				 c.flag,
				`l`.`name` AS country_name,c.name as cname,ts.name as urlname,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS name');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('country AS c', 'c.id = ts.countryFK', 'INNER');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and object="country" and language_typeFK=31', 'inner');
		$this->db->join('language  AS ls', 'ls.objectFK  = ts.id and ls.object="tournament_stage" and ls.language_typeFK=31', 'LEFT');
		$this->db->where(array("tt.sportFK"=>$sportFK));
		$this->db->where_in("ts.name",array("MLB","NPB","KBO"));
		$this->db->WHERE(array("ts.startdate >="=>date("2017-01-01 00:00:00")));
		$this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	
	/* @Description : this function is used to get leagues according to the related country of selected league */
	public function get_league_by_country($sportFK,$country,$tsfk)
	{
		$sql = 'SELECT 
				`ts`.`id`,
				`ts`.`name`, 
				`c`.`name` AS country_name,c.flag 
				FROM `tournament_stage` as `ts` INNER JOIN `country` AS `c` ON `c`.`id` = `ts`.`countryFK`
				WHERE `ts`.`tournamentFK` in (SELECT id FROM `tournament` WHERE tournament_templateFK in ( SELECT id from `tournament_template` where del="no" AND sportFk='.$sportFK.') ) AND c.name = "'.$country.'" AND ts.del = "no" and ts.id!='.$tsfk.' group by ts.name';
		$result = $this->db->query($sql);
        return $result->result();
	}
	
	/* @Description : This function is used to get the detail of a match.  */
	public function match_detail($eventId)
	{
		$this->db->select('e.id,e.name,c.flag,l.name as country,
				    ts.name AS stage_name,ts.id AS stage_id,
				    DATE_FORMAT(e.startdate, "%d.%m") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
					esl.name AS status_text,
					MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
					MIN(IF( ep.number = 1, ep.id, NULL)) AS home_epid,
					MIN(IF( ep.number = 1, p.id, NULL)) AS home_pid,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
				    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
					MIN(IF( ep.number = 2, ep.id, NULL)) AS away_epid,
					MIN(IF( ep.number = 2, p.id, NULL)) AS away_pid,
					MIN(IF( prop.name = "Cup", prop.value , NULL )) AS cup,
					MIN(IF( prop.name = "Ranking", prop.value , NULL )) AS ranking,
					MIN(IF( prop2.name = "Round", prop2.value ,NULL )) AS round,
					MIN(IF( prop2.name = "VenueName", prop2.value , NULL )) AS venue_name,
					MIN(IF( prop2.name = "Live", prop2.value , NULL )) AS live,
					MIN(IF( prop2.name = "GameStarted", prop2.value , NULL )) AS gameStarted,
					MIN(IF( prop2.name = "current_pitcher", prop2.value , NULL )) AS current_pitcher,
					MIN(IF( prop2.name = "runner_on_third", prop2.value , NULL )) AS runner_on_third,
					MIN(IF( prop2.name = "current_batter", prop2.value , NULL )) AS current_batter,
					MIN(IF( prop2.name = "strike_count", prop2.value , NULL )) AS strike_count,
					MIN(IF( prop2.name = "ball_count", prop2.value , NULL )) AS ball_count,
					MIN(IF( prop2.name = "outs", prop2.value , NULL )) AS outs,
					MIN(IF( prop2.name = "runner_on_first", prop2.value , NULL )) AS runner_on_first,
					MIN(IF( prop2.name = "runner_on_second", prop2.value , NULL )) AS runner_on_second,
					MIN(IF( prop2.name = "GameEnded", prop2.value , NULL )) AS gameEnded,
					MIN(IF( prop2.name = "Verified", prop2.value , NULL )) AS verified,
					MIN(IF( prop2.name = "Spectators", prop2.value , NULL )) AS spectators,
					
					');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('property as prop', 'prop.objectFK  = ts.id and prop.object = "tournament_stage" ', 'left');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'left');

		$this->db->join('property as prop2', 'prop2.objectFK  = e.id and prop2.object = "event" ', 'left');
		$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
		$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
		//$this->db->join('participant AS p2', 'p2.id = prop2.value and prop2.name="current_pitcher"', 'inner');
		//$this->db->join('participant AS p3', 'p3.id = prop2.value and prop2.name="current_batter"', 'left');
		$this->db->join('result AS r', 'ep.id = r.event_participantsFK AND r.result_code = "runningscore"', 'left');
		$this->db->WHERE('e.id ="'.$eventId.'" ');
		$this->db->group_by('e.id');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();
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
						r.del = "no" AND r.result_code = "runningscore"
					WHERE
						ep.eventFK in ( SELECT id FROM `event` where id in (SELECT eventFK FROM `event_participants` where participantFk='.$teamId.') ) AND e.startdate < "'.$this->today_from.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id limit 5' ;
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
						r.del = "no" AND r.result_code = "runningscore"
					WHERE
						e.name like "'.$t1.'-'.$t2.'" OR e.name like "'.$t2.'-'.$t1.'" AND e.startdate < "'.$this->today_from.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id limit 5' ;
			$result = $this->db->query($sql);

			return $result->result();
	}
	/* @Description : Function is used to get the line up of players of a team */
	public function getLineup($team_ep,$order)
	{
		$this->db->select('lt.name as player_type,l.participantFK,p.name,l.pos,l.shirt_number,l.lineup_typeFK');
		$this->db->from('lineup AS l');
		$this->db->join('lineup_type AS lt', 'lt.id = l.lineup_typeFK', 'INNER');
		$this->db->join('participant AS p', 'p.id = l.participantFK ', 'INNER');
		$this->db->where("l.event_participantsFK  = $team_ep");
		$this->db->order_by($order);
		//$this->db->group_by("lineup_typeFK");
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
		$result = $this->db->get();
        return $result->result();
	}
	/* 		@Description : this function is used to get all leagues of country	*/
	public function get_country_leagues($sportFK,$cid)
	{
		$TODAY =  date("Y-m-d 00:00:00");
		$PrevDate = date("Y-m-d 00:00:00",strtotime(' -15 day'));
		$NextDate = date("Y-m-d 00:00:00",strtotime(' +15 day'));
		ini_set('memory_limit', '-1');	
		$this->db->select("ts.id,ts.name,ts.countryFK");
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->where("ts.del='no' and t.del='no' and tt.del='no' and tt.sportFK=$sportFK");
		$this->db->where('ts.startdate between "'.$PrevDate.'" and "'.$NextDate.'" ');
		$this->db->where('ts.enddate >= "'.$TODAY.'" ');
		$this->db->where('ts.countryFK="'.$cid.'"');
		$result = $this->db->get()->result();
		return $result;	
	}
	/* This function is used get the list of participated team name */
	public function get_teams($sportFK,$tsid)
	{
		$this->db->select('e.id,ep.id as epid,p.id as pid,p.name as pname');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
		$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
		$this->db->WHERE("tt.sportFK =".$sportFK."");
		$this->db->WHERE("ts.id = $tsid ");
		//$this->db->WHERE("e.startdate > '".$this->today."' ");
		$this->db->group_by('ep.participantFK');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();
		return $result->result();
	}
	/* This function is used to get event statistic */
	public function get_statistics($eid,$pid)
	{
		$this->db->select("sd.*,sp.participantFK,st.name as standing_type");
		$this->db->from("standing as s");
		$this->db->join("standing_participants as sp","sp.standingFK=s.id","left");
		$this->db->join("standing_data as sd","sd.standing_participantsFK=sp.id","left");
		$this->db->join("standing_type_param as st","st.id=sd.standing_type_paramFK","left");
		$this->db->where("s.object='event' and s.standing_typeFK=17 and s.objectFK=$eid");
		$this->db->where("sp.participantFK=$pid");
		$this->db->order_by("sd.id asc");
		$result = $this->db->get()->result();
		return $result;
	}
		/* This function is used to get the scope result of the event */
	public function get_scopeof_event($eid,$epid)
	{
		$this->db->select("sr.*,sdt.description");
		$this->db->from("event_scope as es");
		$this->db->join("scope_result as sr","sr.event_scopeFK=es.id","inner");
		$this->db->join("scope_data_type  as sdt","sdt.id=sr.scope_data_typeFK","left");
		$this->db->where("sr.event_participantsFK=$epid");
		$this->db->where("es.scope_typeFK=305 and es.eventFK=$eid");
		//$this->db->order_by("sd.id asc");
		$result = $this->db->get()->result();
		return $result;	
	}
	


	



}