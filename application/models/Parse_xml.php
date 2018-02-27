<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Model : Parse_xml
Description :  This functin is used to show all the details of futball or soccer only

Function : get_statistics
Description : This function is used to get statistic of an event
 */
class Parse_xml extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		/* Setting global stardate and enddate */
		//$this->today_from =  "2017-06-20 00:00:00";
		//$this->today_to =  "2017-06-20 23:59:59";
		$this->today_from =  date("Y-m-d 00:00:00");
		$this->today_to =  date("Y-m-d 23:59:59");	
	}
	//This function is to get todays live matches of sprots.
	public function get_live_list($sportFK,$date='',$wherein='')
	{
		$this->db->select('e.id,l.name as country,e.name as eventname,c.flag,
					ts.id AS stage_id,
				    IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS stage_name,
				    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
				    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
				    MIN(IF( ep.number = 1, p.id, NULL)) AS home_id,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
				    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
				    MIN(IF(prop.name = "GameStarted", prop.value, NULL)) AS gameStarted,
				    MIN(IF(prop.name = "GameEnded", prop.value, NULL)) AS gameEnded,
				    MIN(IF(prop.name = "Live", prop.value, NULL)) AS elive,
				    MIN(IF(prop.name = "VenueName", prop.value, NULL)) AS venue_name,
					MIN(IF(prop.name = "FirstHalfEnded", prop.value, NULL)) AS FirstHalfEnded,
					MIN(IF(prop.name = "SecondHalfEnded", prop.value, NULL)) AS SecondHalfEnded,
					MIN(IF(prop.name = "SecondHalfStarted", prop.value, NULL)) AS SecondHalfStarted,
				    esl.name AS status_text');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
		$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'left');
		$this->db->join('language  AS ls', 'ts.id = ls.objectFK and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->join('result AS r', 'ep.id = r.event_participantsFK AND r.result_code = "runningscore"', 'left');
		$this->db->join('property AS prop', 'e.id = prop.objectFK AND prop.object ="event"', 'left');
		$this->db->WHERE("tt.sportFK =".$sportFK."");
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
		//$this->db->WHERE('prop.value = "yes"');
		$this->db->group_by('e.id');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();
	
		return $result->result();
	}
	
	//This function is to gets all the matches (both played and future ones) from a season or league
	public function get_league_match($tournament_stageId,$sfk,$limit='',$time='')
	{
	    $time = $time?$time:date("Y-m-d 00:00:00");
				$leaguesql = 'SELECT
						    e.id,e.name as eventname,
							IF(lts.name IS NULL or lts.name="", ts.name,lts.name) AS league_name,
						    ts.id AS stage_id,c.flag,
							im.value AS league_image,
						    DATE_FORMAT(e.startdate, "%d.%m.") AS startdate,
						    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
						    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
						    IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"-") AS home_score,
						    IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"-") AS away_score,
						    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
						    es.name AS status_text,
						    IFNULL(IF(ls.name = NULL,"No sport",ls.name),"Not available") AS sport_name,
							l.name AS country_name,
						    t.name AS tournament_name,
							DATE_FORMAT(e.startdate, "%m") as diff_month
						FROM
						    tournament_template AS tt LEFT JOIN
						    sport AS s on s.id = tt.sportFK AND s.del="no" LEFT JOIN
						    tournament AS t ON t.tournament_templateFK = tt.id left JOIN
						    tournament_stage AS ts ON t.id = ts.tournamentFK left JOIN
						    country AS c ON c.id = ts.countryFK INNER JOIN
							language AS l ON l.objectFK = c.id and object="country" and language_typeFK=31 INNER JOIN
							language AS ls ON ls.objectFK = s.id and ls.object="sport" and ls.language_typeFK=31 LEFT JOIN
							language AS lts ON lts.objectFK = ts.id and lts.object="tournament_stage" and lts.language_typeFK=31 INNER JOIN
						    event AS e ON ts.id = e.tournament_stageFK left JOIN
							image AS im ON tt.id = im.objectFK left JOIN
						    event_participants AS ep ON e.id = ep.eventFK left JOIN
						    status_desc AS es ON e.status_descFK = es.id LEFT JOIN
						    participant AS p ON ep.participantFK = p.id left JOIN
						    result AS r ON ep.id = r.event_participantsFK AND r.result_code = "finalresult" AND r.del = "no"
						WHERE
						    ts.id = ? AND 
							tt.sportFK =? AND
							e.startdate < ? AND
						   	e.del = "no" AND
						    p.del = "no" 
						    GROUP BY
						    e.id
						ORDER BY 
							 e.startdate  DESC, e.id '.$limit ;
			$result = $this->db->query($leaguesql,array($tournament_stageId,$sfk,$this->today_from));

			return $result->result();

	}
	
	//This function is to get program matches which is going to be play in a particular league.
	public function get_programed_match($tsfk,$sportFK,$limit='20')
	{
		
		$NextDate = date("Y-m-d 00:00:00",strtotime(' +2 month'));
		//$TODAY =  "2017-04-28 00:00:00";
		$this->db->select('e.id,c.name as country,e.name as eventname,
				    ts.name AS league_name,ts.id AS stage_id,c.flag,
				    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
				    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
				    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
				    IF(e.status_type = "notstarted", "-",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
				    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
				    es.name AS status_text,datediff("'.$this->today_from .'",DATE_FORMAT(e.startdate, "%y-%m-%d")) As date_diff');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
		$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
		$this->db->join('result AS r', 'ep.id = r.event_participantsFK', 'left');
		$this->db->join('property AS prop', 'e.id = prop.objectFK AND prop.object ="event" ', 'left');
		
		$this->db->WHERE("tt.sportFK =".$sportFK."");
		$this->db->WHERE("ts.id = '".$tsfk."' ");
		$this->db->WHERE("( e.startdate >= '".$this->today_to ."' and e.startdate <= '".$NextDate."' ) ");

		$this->db->WHERE("e.status_type = 'notstarted' ");
		//$this->db->WHERE('prop.value = "yes"');
		if(!empty($limit)){
				$this->db->limit($limit);
			}
		$this->db->group_by('e.id');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();
		return $result->result();
	}
	//This function is to get all leagues standing of team in a league.
	public function get_leagues_standing($tsFK)
	{
			$TODAY =  date("Y-m-d");
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
	//This function is a child function of get_leagues_standing() .it is used to get the played match status win,lose,tie.
	public function get_matches($teamId)
	{
		$TODAY =  date("Y-m-d 00:00:00");
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
						r.del = "no" and r.result_code = "runningscore"
					WHERE
						ep.eventFK in ( SELECT id FROM `event` where id in (SELECT eventFK FROM `event_participants` where participantFk='.$teamId.') ) AND e.startdate < "'.$TODAY.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id' ;
						
			$result = $this->db->query($sql);
			return $result->result();
	}
	//this function is used to get selected leagues of a particular sport
	/* public function get_leagues($sportFK)
	{
		$sql = 'SELECT 
				`ts`.`id`,
				`ts`.`name`,
				`c`.`name` AS country_name
				FROM `tournament_stage` as `ts` INNER JOIN `country` AS `c` ON `c`.`id` = `ts`.`countryFK`
				WHERE `ts`.`tournamentFK` in (SELECT id FROM `tournament` WHERE tournament_templateFK in ( SELECT id from `tournament_template` where del="no" AND sportFk='.$sportFK.') ) AND ts.name in ("Dunya Kupası","League 1","lalig to","Bundesliga","Serie A","Premier League","sampiyonlar Ligi","Avrupa Ligi","Dunya Kupas","World Cup","Sports Toto Super League","Champions League","European League","TFF 1st League") group by ts.name';
		$result = $this->db->query($sql);"Serie A"
        return $result->result();
	} */
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
		$this->db->where_in("ts.name",array("Dunya Kupası","League 1","lalig to","Bundesliga","Premier League","sampiyonlar Ligi","Avrupa Ligi","Dunya Kupas","World Cup","Sports Toto Super League","Champions League","European League","TFF 1st League"));
		$this->db->WHERE(array("ts.startdate >="=>date("2017-01-01 00:00:00")));
		$this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	//this function is used to get leagues according to the related country of selected league
	public function get_league_by_country($sportFK,$country,$tsid)
	{
		$this->db->select('`ts`.`id`,`l`.`name` AS country_name,c.flag,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS name');
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join("country as c","c.id=ts.countryFK","INNER");
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'inner');
		$this->db->join('language  AS ls', 'ls.objectFK  = ts.id and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->where(array("tt.sportFK"=>$sportFK,"c.name"=>$country,"ts.startdate >"=>"2017-01-01 00:00:00"));
        $this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	//This function is used to get the detail of a match. 
	public function match_detail($eventId)
	{
			$this->db->select('e.id,e.name,
					    IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS stage_name,
					    ts.countryFK AS cfk,
						l.name as country,
					    ts.id AS stage_id,c.flag,
					    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
					    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
					    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
					    MIN(IF( ep.number = 1, p.id, NULL)) AS home_id,
					    MIN(IF( ep.number = 1, ep.id, NULL)) AS home_epid,
						MIN(IF( ep.number = 1, im.value, NULL)) AS home_image,
					    MIN(IF(ep.number="1",IF( r.result_code = "runningscore", r.value , NULL ),NULL)) as home_score,
					    MIN(IF(ep.number="2",IF( r.result_code = "runningscore", r.value , NULL ),NULL)) as away_score,
					    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
					    MIN(IF(ep.number = 2, p.id, NULL)) AS away_id,
					    MIN(IF(ep.number = 2, ep.id, NULL)) AS away_epid,
						MIN(IF( ep.number = 2, im.value, NULL)) AS away_image,
						MIN(IF(ep.number="1",IF( r.result_typeFK = 1, r.value, NULL),NULL)) AS home_ordinarytime,
						MIN(IF(ep.number="1",IF( r.result_typeFK = 6, r.value, NULL),NULL)) as home_runningscore,
						MIN(IF(ep.number="1",IF( r.result_typeFK = 4, r.value, NULL),NULL)) as home_halftime,
						MIN(IF(ep.number="1",IF( r.result_typeFK = 5, r.value, NULL),NULL)) as home_finalresult,
						MIN(IF(ep.number="2",IF( r.result_typeFK = 1, r.value, NULL),NULL)) as away_ordinarytime,
						MIN(IF(ep.number="2",IF( r.result_typeFK = 6, r.value, NULL),NULL)) as away_runningscore,
						MIN(IF(ep.number="2",IF( r.result_typeFK = 4, r.value, NULL),NULL)) as away_halftime,
						MIN(IF(ep.number="2",IF( r.result_typeFK = 5, r.value, NULL),NULL)) as away_finalresult,
					    esl.name AS status_text,
					    v.name as venue_name,
						prop.name as pname,
					    prop.value as pvalue,
						MIN(IF(ep.number = 1, prop2.value, NULL)) AS home_formation,
						MIN(IF(ep.number = 2, prop2.value, NULL)) AS away_formation,
						');
			$this->db->from('tournament_template as tt');
			$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
			$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
			$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
			$this->db->join('country  AS c', 'c.id  = ts.countryFK', 'left');
			$this->db->join('language  AS l', 'l.objectFK  = c.id and object="country" and language_typeFK=31', 'left');
			$this->db->join('language  AS ls', 'ls.objectFK  = ts.id and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
			$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
			$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
			$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
			$this->db->join('image AS im', 'ep.participantFK = im.objectFK AND im.object = "participant" AND im.name = "teamlogo"', 'left');
			$this->db->join('result AS r', 'ep.id = r.event_participantsFK and r.result_code = "runningscore" ', 'left');
			$this->db->join('property AS prop', 'e.id = prop.objectFK AND prop.object="event" ', 'left');
			$this->db->join('property AS prop2', ' prop2.objectFK=ep.id AND prop2.object ="event_participants" and prop2.name="formation" ', 'left');
			$this->db->join('venue AS v', 'v.id = ts.countryFK ', 'left');
			$this->db->where(array("e.id"=>$eventId));
			//$this->db->where('prop.value = "yes"');
			$this->db->group_by('e.id');
			$this->db->order_by("e.startdate,e.id,ts.id");
			$result = $this->db->get();
			return $result->result();
	}
	//Get incidents in a match
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
	//this function is used to get list matches which is played against of a Team
	public function get_team_against_match($teamId)
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
						r.del = "no"  and r.result_code = "runningscore"
					WHERE
						ep.eventFK in ( SELECT id FROM `event` where id in (SELECT eventFK FROM `event_participants` where participantFk='.$teamId.') ) AND e.startdate < "'.$TODAY.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id limit 5' ;
			$result = $this->db->query($sql);

			return $result->result();
	}
	//this function is used to get list matches which is played between two teams
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
						r.del = "no"  and r.result_code = "runningscore"
					WHERE
						e.name like "'.$t1.'-'.$t2.'" OR e.name like "'.$t2.'-'.$t1.'" AND e.startdate < "'.$TODAY.'" AND
						e.del = "no" AND
						p.del = "no" 
					GROUP BY
						e.id
					ORDER BY
						e.startdate, e.id limit 5' ;
			$result = $this->db->query($sql);

			return $result->result();
	}
	//Function is used to get the line up of players of a team
	public function getLineup($team_ep,$order)
	{
		$this->db->select('lt.name as player_type,l.participantFK,p.name,l.pos,l.shirt_number,l.lineup_typeFK');
		$this->db->from('lineup AS l');
		$this->db->join('lineup_type AS lt', 'lt.id = l.lineup_typeFK', 'INNER');
		$this->db->join('participant AS p', 'p.id = l.participantFK ', 'INNER');
		$this->db->where("l.event_participantsFK  = $team_ep");
		$this->db->order_by($order);
		$result = $this->db->get();
        return $result->result();
	}
	/* @Description : this function is used to get the detail of a team */
	public function get_teamDetail($team_name)
	{
		$sql = 'SELECT  P.id , P.name , P.countryFK , C.name AS country_name 
				FROM participant AS P
				INNER JOIN country AS C ON C.id = P.countryFK
				WHERE P.name like "'.$team_name.'" AND P.del =  "no" ';
		$result = $this->db->query($sql);
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
				WHERE OP.object = "participant" AND OP.objectFK ='.$pfk.'  AND OP.del =  "no" ';
		$result = $this->db->query($sql);
        return $result->result();
	}
	/* 		@Description : this function is used to get all leagues of country	*/
	public function get_country_leagues($sportFK,$cid)
	{
		$TODAY =  date("Y-m-d 00:00:00");
		$PrevDate = date("Y-m-d 00:00:00",strtotime(' -30 day'));
		$NextDate = date("Y-m-d 00:00:00",strtotime(' +30 day'));
		ini_set('memory_limit', '-1');	
		$this->db->select("ts.id,ts.name,ts.countryFK");
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->where("ts.del='no' and t.del='no' and tt.del='no' and tt.sportFK=$sportFK");
		//$this->db->where('ts.enddate between "'.$PrevDate.'" and "'.$NextDate.'" ');
		$this->db->where('ts.enddate <= "'.$TODAY.'" and ts.del="no"');
		$this->db->where('ts.countryFK="'.$cid.'"');
		$this->db->group_by('ts.name');
		$result = $this->db->get()->result();
		return $result;	
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

	


	



}