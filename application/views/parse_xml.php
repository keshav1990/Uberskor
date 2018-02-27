<?php
include("connection.php");

if(isset($_GET["sportFK"])){
    $sportFK = $_GET["sportFK"]; //which stands for soccer.    
}else{
    $sportFK = 1; //which stands for soccer.
}

if(isset($_GET["tournamentId"])){
    $tournament_stageID = $_GET['tournamentId'];  //for premier league. 
}else{
    $tournament_stageID = "844439"; //for premier league.844439
}



//$sql for Fixture example: "England - Premier league all result"
$listsql = 'SELECT
    e.id,
    es.name AS status_text,
    ts.name AS stage_name,
    ts.id AS stage_id
    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
    IFNULL(SUM(IF(ep.number = 1, r.value, NULL)),"-") AS home_score,
    IFNULL(SUM(IF(ep.number = 2, r.value, NULL)),"-") AS away_score,
    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team
FROM
    status_desc AS es,
    event AS e INNER JOIN
    tournament_stage AS ts  ON e.tournament_stageFK = ts.id INNER JOIN
    event_participants AS ep ON e.id = ep.eventFK LEFT JOIN
    participant AS p ON ep.participantFK = p.id LEFT JOIN
    result AS r ON ep.id = r.event_participantsFK AND
    r.result_code = "finalresult" AND
    r.del = "no"
WHERE
    e.tournament_stageFK = '.$tournament_stageID.'  AND
    e.del = "no" AND
    p.del = "no" 
GROUP BY
    e.id
ORDER BY
    e.startdate, e.id ' ;
$matchlist = mysqli_query($conn,$listsql);



// $sql2 forLive example: "Soccer - Today"
//    e.startdate BETWEEN "2017-03-10 00:00:00" AND "2017-03-10 23:59:59" AND
$TODAY_FROM =  date("Y-m-d 00:00:00");
$TODAY_TO =  date("Y-m-d 23:59:59");

$TODAY_FROM =  "2017-03-10 00:00:00";
$TODAY_TO =  "2017-03-10 23:59:59";

$Livesql = 'SELECT
    e.id,
    ts.name AS stage_name,
    ts.id AS stage_id,
    DATE_FORMAT(e.startdate, "%d.%m.%Y") AS startdate,
    DATE_FORMAT(e.startdate, "%H:%i") AS starttime,
    MIN(IF( ep.number = 1, p.name, NULL)) AS home_team,
    IF(e.status_type = "notstarted", "",(MIN(IF(ep.number = 1, r.value, NULL)))) AS home_score,
    IF(e.status_type = "notstarted", "",(MIN(IF(ep.number = 2, r.value, NULL)))) AS away_score,
    MIN(IF(ep.number = 2, p.name, NULL)) AS away_team,
    es.name AS status_text
FROM
    tournament_template AS tt INNER JOIN
    tournament AS t ON t.tournament_templateFK = tt.id left JOIN
    tournament_stage AS ts ON t.id = ts.tournamentFK left JOIN
    event AS e ON ts.id = e.tournament_stageFK left JOIN
    event_participants AS ep ON e.id = ep.eventFK left JOIN
    status_desc AS es ON e.status_descFK = es.id LEFT JOIN
    participant AS p ON ep.participantFK = p.id left JOIN
    result AS r ON ep.id = r.event_participantsFK AND r.result_code = "runningscore" left JOIN
    property AS prop ON e.id = prop.objectFK AND prop.object ="event" AND prop.name = "Live"
WHERE
    tt.sportFK = '.$sportFK.'  AND
    e.startdate BETWEEN "'.$TODAY_FROM.'" AND "'.$TODAY_TO.'" AND
    prop.value = "yes"
    GROUP BY
    e.id
ORDER BY 
    ts.id, e.startdate, e.id';
//echo $Livesql;
$forLiveMatch = mysqli_query($conn,$Livesql);

$list = array();
while($row = mysqli_fetch_object($forLiveMatch))
{ 
    $list[] = $row;
    // $list[]['subs']= $row;

}                               

//$sql3 for getting leagues name
$sql3 = 'SELECT * FROM `tournament_stage`';
$leagues = mysqli_query($conn,$sql3);




// echo "<pre>";
// print_r(mysqli_fetch_object($leagues));
// echo "</pre>";

// exit;

?>