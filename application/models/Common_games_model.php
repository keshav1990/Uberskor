<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Model Name : Common_games_model
Description : This controller  is used to common features in all games only 


Date of created : 30-06-2017
Last Modified : 30-06-2017
	
*/
class Common_games_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		/* Setting global stardate and enddate */
		
		$this->today_from =  date("Y-m-d 00:00:00");
		$this->today_to =  date("Y-m-d 23:59:59");
		//$this->today_from =  "2017-06-11 00:00:00";
		//$this->today_to =  "2017-06-11 23:59:59";
	}
	/* this function used to get tournament,tournament,tournment stage only */
	public function get_sel_only_tournament($sel,$where)
	{
			$this->db->select($sel);
			$this->db->from('tournament_template as tt');
			$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
			$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('country AS c', 'c.id = ts.countryFK', 'INNER');
			$this->db->join('language  AS l', 'l.objectFK  = c.id and object="country" and language_typeFK=31', 'INNER');
			$this->db->join('language  AS ls', 'ls.objectFK  = ts.id and ls.object="tournament_stage" and ls.language_typeFK=31', 'LEFT');
			$this->db->join('sport AS s', 's.id = tt.sportFK', 'INNER');
			$this->db->join('image AS im', 'im.objectFK = tt.id', 'LEFT');
			$this->db->where($where);
			$result = $this->db->get()->result();
			return $result;
	}
	public function get_sel_only_tournament_limit($sel,$where,$limit)
	{
			$this->db->select($sel);
			$this->db->from('tournament_template as tt');
			$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
			$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('country AS c', 'c.id = ts.countryFK', 'INNER');
			$this->db->join('sport AS s', 's.id = tt.sportFK', 'INNER');
			$this->db->WHERE($where);
			$this->db->limit($limit);
			$result = $this->db->get()->result();
			return $result;
	}	
	public function get_leagues($sportFK,$where_in)
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
		$this->db->where_in("ts.id",$where_in);
		$this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}

	/* This function is used to get type of scope of all games according to the eventid */
	public function get_type_of_scope($eid){
		$this->db->select('st.name,st.description,es.id,es.scope_typeFK');
		$this->db->from('event_scope AS es');
		$this->db->join('scope_type AS st', 'st.id = es.scope_typeFK', 'INNER');
		$this->db->where("es.eventFK  = $eid");
		$this->db->order_by("es.scope_typeFK ASC");
		$result = $this->db->get();
        return $result->result();
	}
	
	public function obj2Array($input){
		return 	json_decode(json_encode($input),true);
	}
	
	public function array2Object($input){
		return 	json_decode(json_encode($input));
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
		$result = $this->db->get();
        return $result->result();
	}
	public function get_live_event($sfk,$date='')
	{
		$this->db->select('e.id, es.name AS status_text,
				    MIN(IF(prop.name = "GameStarted", prop.value, NULL)) AS gameStarted,
				    MIN(IF(prop.name = "GameEnded", prop.value, NULL)) AS gameEnded,
					');
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('status_desc AS es', 'e.status_descFK = es.id', 'left');
		$this->db->join('language  AS esl', 'esl.objectFK  = es.id and esl.object="status_desc" and esl.language_typeFK=31', 'inner');
		$this->db->join('property AS prop', 'e.id = prop.objectFK AND prop.object ="event"', 'left');
		$this->db->WHERE("tt.sportFK =".$sfk."");
		$this->db->WHERE("e.status_descFK !=6 and e.status_descFK != 1   and e.status_descFK != 106   and e.status_descFK != 93  ");
		//$this->db->WHERE("e.status_descFK !=6 and e.status_descFK != 1 ");
		if($date!=''){
			$today_from = $date." 00:00:00";
			$today_to = $date." 23:59:59";
			$this->db->WHERE("e.startdate BETWEEN '".$today_from."' AND '".$today_to."'");
		}else{
			$this->db->WHERE("e.startdate BETWEEN '".$this->today_from."' AND '".$this->today_to."'");
		}
		$this->db->group_by('e.id');
		$this->db->order_by("e.startdate,e.id,ts.id");
		$result = $this->db->get();

		return $result->result();
	}
	public function filterval($val)
	{
		$newVal = $this->db->escape_str(trim($val));
		return $newVal;
	}
	/* 		@Description : this function is used to get all leagues of country	*/
	public function get_country_leagues($sportFK,$cid)
	{
		$TODAY =  date("Y-m-d 00:00:00");
		$PrevDate = date("Y-m-d 00:00:00",strtotime(' -30 day'));
		$NextDate = date("Y-m-d 00:00:00",strtotime(' +30 day'));
		ini_set('memory_limit', '-1');	
		$this->db->select("ts.id,ts.countryFK,ts.name as urlname,IF(ls.name IS NULL or ls.name='', ts.name,ls.name) AS name");
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		//$this->db->join('countryList AS cl', 'ts.countryFK = cl.country_id', 'left');
		$this->db->join('language  AS ls', 'ts.id=ls.objectFK  and ls.object="tournament_stage" and ls.language_typeFK=31', 'LEFT');
		$this->db->where('ts.startdate >= "'.date("2017-01-01 00:00:00").'"');
		$this->db->where("ts.del='no' and t.del='no' and tt.del='no' and tt.sportFK=$sportFK");
		$this->db->where('ts.countryFK="'.$cid.'" and ts.del="no"');
		$this->db->group_by('ts.name');
		//$this->db->order_by('cl.id asc');
		$result = $this->db->get()->result();
		return $result;	
	}
	
	public function getLeagues($sportFK,$front='')
	{
		$TODAY =  date("Y-m-d 00:00:00");
		$PrevDate = date("Y-m-d 00:00:00",strtotime(' -30 day'));
		$NextDate = date("Y-m-d 00:00:00",strtotime(' +30 day'));
		ini_set('memory_limit', '-1');	
		$this->db->select("ts.id,ts.countryFK,ts.name as urlname,IF(ls.name IS NULL or ls.name='', ts.name,ls.name) AS name,`l`.`name` AS country_name,c.name as cname");
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join('country AS c', 'c.id = ts.countryFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('language  AS l', 'l.objectFK  = c.id and object="country" and language_typeFK=31', 'inner');
		$this->db->join('language  AS ls', 'ts.id=ls.objectFK  and ls.object="tournament_stage" and ls.language_typeFK=31', 'LEFT');
		if($front=='')
		{
		$this->db->where('ts.startdate >= "'.$PrevDate.'"');
		$this->db->where('ts.startdate <= "'.$NextDate.'"');
		}
		$this->db->where("ts.del='no' and t.del='no' and tt.del='no' and tt.sportFK=$sportFK");
		$this->db->group_by('ts.name');
		//$this->db->order_by('cl.id asc');
		$result = $this->db->get()->result();
		return $result;	
	}

	public function get_only_country_leagues($sportFK,$cid)
	{
		$TODAY =  date("Y-m-d 00:00:00");
		$PrevDate = date("Y-m-d 00:00:00",strtotime(' -30 day'));
		$NextDate = date("Y-m-d 00:00:00",strtotime(' +30 day'));
		ini_set('memory_limit', '-1');	
		$this->db->select("ts.id,ts.name,ts.countryFK");
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->join('countryList AS cl', 'ts.countryFK = cl.country_id', 'left');
		//$this->db->join('language AS l', 'l.objectFK = ts.id and object="tournament_stage" and language_typeFK=31', 'INNER');
		$this->db->where('ts.startdate >= "'.date("2017-01-01 00:00:00").'"');
		$this->db->where("ts.del='no' and t.del='no' and tt.del='no' and tt.sportFK=$sportFK");
		$this->db->where('ts.countryFK="'.$cid.'" and ts.del="no"');
		$this->db->group_by('ts.name');
		
		$this->db->order_by('cl.id asc');
		$this->db->limit('1');
		$result = $this->db->get()->result();
		return $result;	
	}
	
	public function get_only_country($sportFK,$tableName = 'countryList')
	{
		$this->db->select("c.*");
		$this->db->from($tableName.' as cl');
		$this->db->join('country AS c', 'c.id = cl.country_id', 'INNER');
		$this->db->where("cl.game_id=$sportFK");
	    $this->db->order_by('cl.id asc');
		
		$result = $this->db->get()->result();
		return $result;	
	}
	
	public function get_league_by_country($sportFK,$country,$tsid='')
	{
		$this->db->select('`ts`.`id`,`l`.`name` AS country_name,c.flag,ts.name as urlname,c.name as cname,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS name');
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join("country as c","c.id=ts.countryFK","INNER");
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'inner');
		$this->db->join('language  AS ls', 'ts.id = ls.objectFK and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->where(array("tt.sportFK"=>$sportFK,"l.name"=>$country,"ts.startdate >"=>"2017-01-01 00:00:00"));
        $this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	public function get_league_country($sportFK,$country,$tsid='')
	{
		$this->db->select('`ts`.`id`,`l`.`name` AS country_name,c.id as countryID,c.flag,ts.name as urlname,c.name as cname,IF(ls.name IS NULL or ls.name="", ts.name,ls.name) AS name');
		$this->db->from('tournament_stage as ts');
		$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
		$this->db->join("country as c","c.id=ts.countryFK","INNER");
		$this->db->join('language  AS l', 'l.objectFK  = c.id and l.object="country" and l.language_typeFK=31', 'inner');
		$this->db->join('language  AS ls', 'ts.id = ls.objectFK and ls.object="tournament_stage" and ls.language_typeFK=31', 'left');
		$this->db->where(array("tt.sportFK"=>$sportFK,"c.name"=>$country,"ts.startdate >"=>"2017-01-01 00:00:00"));
        $this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	public function get_event_by_game($id,$term)
	{
			$this->db->select("c.name as country,c.flag,p.id,p.name,p.gender");
			$this->db->from('tournament_stage as ts');
			$this->db->join('tournament AS t', 't.id = ts.tournamentFK', 'INNER');
			$this->db->join('tournament_template AS tt', 'tt.id = t.tournament_templateFK', 'INNER');
			$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
			$this->db->join('event_participants AS ep', 'e.id = ep.eventFK', 'INNER');
			$this->db->join('participant AS p', 'ep.participantFK = p.id', 'left');
			$this->db->join('country  AS c', 'c.id  = p.countryFK', 'left');
			$this->db->where(array("tt.sportFK"=>$id,"ts.startdate >="=>date('2017-01-01 00:00:00'),"ts.enddate <="=>date('Y-m-d 23:59:59'),"p.type"=>"team"));
			$this->db->like("p.name",$this->db->escape_like_str($term),'after');
			$this->db->group_by("p.id");
			$this->db->order_by("p.name");
			return $this->db->get()->result();
	}
	
	public function get_team_events($teamId)
	{
		$sql = 'SELECT
				e.id,e.name as eventname,
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
				ep.eventFK in ( SELECT id FROM `event` where id in (SELECT eventFK FROM `event_participants` where participantFk='.$teamId.') ) AND e.startdate < "'.date("Y-m-d 00:00:00").'" AND
				e.del = "no" AND
				p.del = "no" 
			GROUP BY
				e.id
			ORDER BY
				e.startdate, e.id limit 50' ;
		$result = $this->db->query($sql);
		return $result->result();
	}
	
	public function get_team_information($teamId)
	{
		$this->db->select("lc.name as country,c.flag,p.name,p.gender");
		$this->db->from('participant AS p');
		$this->db->join('country  AS c', 'c.id  = p.countryFK', 'INNER');
		$this->db->join('language AS lc', 'lc.objectFK = p.countryFK AND lc.language_typeFK=3', 'INNER');
		$this->db->where(array('p.id'=>$teamId,"p.type"=>"team"));
		$this->db->group_by("p.id");
		$this->db->order_by("p.name");
		return $this->db->get()->result();
	}
	
	public function get_team_players($teamId)
	{
			$sql = '
				SELECT OP.participantFK, OP.participant_type, OP.date_from, OP.date_to, OP.active, P.name, P.`type`, P.countryFK, C.name AS country_name,C.flag,P.id 
				FROM object_participants AS OP
				INNER JOIN participant AS P ON P.id = OP.participantFK
				LEFT OUTER JOIN country AS C ON C.id = P.countryFK
				WHERE OP.object =  "participant" AND OP.objectFK =  '.$teamId.' AND OP.del =  "no" AND OP.active="yes" ';
		return $this->db->query($sql)->result();
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
	
	public function get_sports_list_with_language($lang_type)
	{
		$this->db->select('l.name,l.objectFK as id');
		$this->db->from('sport as s');
		$this->db->join("language as l","s.id=l.objectFK and l.object='sport'");
		$this->db->where(array("l.language_typeFK"=>$lang_type));
        $this->db->where_not_in('s.id', '24,39');
        $this->db->order_by("s.id asc");
		$result = $this->db->get();
		return $result->result();
	}
	
	public function get_all_league_by_sports($game,$sfk,$where_in='')
	{
		$this->db->select("ts.name as league_name,ts.id as league_id,ts.startdate,ts.enddate,tt.sportFK,count(e.name) as total_event");
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->where(array("tt.sportFK"=>$sfk));
		
		if(!empty($where_in)){
			$this->db->where_in("ts.id",$where_in);
		}else{
			$this->db->where("(`startdate` >= '2017-01-01 00:00:00' OR `enddate` >= '2017-01-01 00:00:00')");
		}
		
		$this->db->order_by("ts.startdate asc");
		$this->db->group_by("ts.name");
		$result = $this->db->get();
		return $result->result();
	}
	
	public function get_sports_list_with_language_country($lang_type)
	{
		$this->db->select('l.name,l.objectFK as id,c.name as country');
		$this->db->from('sport as s');
		$this->db->join("language as l","s.id=l.objectFK and l.object='sport'");
		$this->db->join('country  AS c', 'c.id  = l.objectFK', 'INNER');
		$this->db->where(array("l.language_typeFK"=>$lang_type));
        $this->db->where_not_in('s.id', '24,39');
        $this->db->order_by("s.id asc");
		$result = $this->db->get();
		return $result->result();
	}
	public function get_all_league_by_sports_country($game,$sfk,$where_in='')
	{
		$this->db->select("ts.name as league_name,ts.id as league_id,ts.startdate,ts.enddate,tt.sportFK,count(e.name) as total_event,c.name as country");
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join("country as c","c.id=ts.countryFK","INNER");
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->where(array("tt.sportFK"=>$sfk));

		if(!empty($where_in)){
			$this->db->where_in("ts.id",$where_in);
		}else{
			$this->db->where("(`startdate` >= '2017-01-01 00:00:00' OR `enddate` >= '2017-01-01 00:00:00')");
		}

		$this->db->order_by("ts.startdate asc");
		$this->db->group_by("ts.name");
		$result = $this->db->get();
       // echo $this->db->last_query();
		return $result->result();
	}
	
	public function get_all_league_sports_country($game,$sfk,$where_in='')
	{
		$this->db->select("ts.id as league_id,ts.startdate,ts.enddate,tt.sportFK,count(e.name) as total_event,c.name as country,IF(ls.name IS NULL or ls.name='', ts.name,ls.name) AS league_name");
		$this->db->from('tournament_template as tt');
		$this->db->join('tournament AS t', 't.tournament_templateFK = tt.id', 'INNER');
		$this->db->join('tournament_stage AS ts', 't.id = ts.tournamentFK', 'INNER');
		$this->db->join('language  AS ls', 'ts.id=ls.objectFK  and ls.object="tournament_stage" and ls.language_typeFK=31', 'LEFT');
		$this->db->join("country as c","c.id=ts.countryFK","INNER");
		$this->db->join('event AS e', 'ts.id = e.tournament_stageFK', 'INNER');
		$this->db->where(array("tt.sportFK"=>$sfk));

		if(!empty($where_in)){
			$this->db->where_in("ts.id",$where_in);
		}else{
			$this->db->where("(`startdate` >= '2017-01-01 00:00:00' OR `enddate` >= '2017-01-01 00:00:00')");
		}

		$this->db->order_by("ts.startdate asc");
		$this->db->group_by("ts.name,c.name");
		$result = $this->db->get();
       // echo $this->db->last_query();
		return $result->result();
	}
}										