<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'futbol';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* routes for admin panel  */
$route['admin-panel'] = "admin-panel/home";
$route['admin-panel/sidebar-list'] = "admin-panel/sidebarList/index";

$route['admin-panel/sidebar-list/(:any)/getSearchedList'] = "admin-panel/sidebarList/getSearchedList";
$route['admin-panel/sidebar-list/(:any)/updateList/(:num)'] = "admin-panel/sidebarList/updateList/$1";
$route['admin-panel/sidebar-list/(:any)/delete/(:num)'] = "admin-panel/sidebarList/delete/$1";
$route['admin-panel/sidebar-list/(:any)'] = "admin-panel/sidebarList/game/$1";
$route['admin-panel/sidebar-league-add/(:any)'] = "admin-panel/sidebarList/addLeague/$1/";

/* routes for game Futboll */
$route['futbol/eventof/(:any)'] = "futbol/index/$1";
$route['futbol/eventof'] = "futbol/index";
$route['futbol/teamDetail/(:any)'] = "futbol/teamDetail/$1";
$route['futbol/match-detail/(:num)'] = "futbol/matchDetail/$1";
$route['futbol/takim/(:any)'] = "futbol/takim/$1";
$route['futbol/iframe/(:any)/(:any)'] = "futbol/iframe/$1/$2";
$route['futbol/(:any)/(:any)'] = "futbol/leagueMatch/$1/$2";
$route['futbol/(:any)/(:any)/(:any)'] = "futbol/leagueMatch/$1/$2/$3";

/* routes for Icehockey */
$route['buz-hokeyi'] = "buzhokeyi/index";
$route['buz-hokeyi/eventof/(:any)'] = "buzhokeyi/index/$1";
$route['buz-hokeyi/eventof'] = "buzhokeyi/index";
$route['buz-hokeyi/getContent'] = "buzhokeyi/getContent";
$route['buz-hokeyi/showLiveEvent'] = "buzhokeyi/showLiveEvent";
$route['buz-hokeyi/match-detail/(:num)'] = "buzhokeyi/matchDetail/$1";
$route['buz-hokeyi/takim/(:any)'] = "buzhokeyi/takim/$1";

$route['buz-hokeyi/iframe/(:any)/(:any)'] = "buzhokeyi/iframe/$1/$2";
$route['buz-hokeyi/(:any)/(:any)'] = "buzhokeyi/leagueMatch/$1/$2";
$route['buz-hokeyi/(:any)/(:any)/(:any)'] = "buzhokeyi/leagueMatch/$1/$2/$3";

/* routes for game Basketball */
$route['basketball/eventof/(:any)'] = "basketball/index/$1";
$route['basketball/eventof'] = "basketball/index";
$route['basketball/match-detail/(:num)'] = "basketball/matchDetail";
$route['basketball/teamDetail/(:any)'] = "basketball/teamDetail";
$route['basketball/takim/(:any)'] = "basketball/takim/$1";
$route['basketball/iframe/(:any)/(:any)'] = "basketball/iframe//$1/$2";
$route['basketball/(:any)/(:any)'] = "basketball/leagueMatch/$1/$2";
$route['basketball/(:any)/(:any)/(:any)'] = "basketball/leagueMatch/$1/$2/$3";


/* custom routes for tennis */
$route['tenis/eventof/(:any)'] = "tenis/index/$1";
$route['tenis/eventof'] = "tenis/index";
$route['tenis/match-detail/(:num)'] = "tenis/matchDetail/$1";
$route['tenis/type/(:any)'] = "tenis/index/$1";
$route['tenis/tour/(:any)'] = "tenis/index/$1";
$route['tenis/takim/(:any)'] = "tenis/takim/$1";
$route['tenis/iframe/(:any)/(:any)'] = "tenis/iframe/$1/$2";
$route['tenis/(:any)/(:any)'] = "tenis/tournament/$1/$2";
$route['tenis/(:any)/(:any)/(:any)'] = "tenis/tournament/$1/$2/$3";

/* routes for Horse */
$route['at-yarisi'] = "horse/index";
$route['at-yarisi/eventof/(:any)'] = "horse/index/$1";
$route['at-yarisi/eventof'] = "horse/index";
$route['at-yarisi/getContent'] = "horse/getContent";
$route['at-yarisi/showLiveEvent'] = "horse/showLiveEvent";
$route['at-yarisi/(:any)/takim/(:any)'] = "horse/takim/$1/$2";
$route['at-yarisi/(:any)/takim/(:any)/(:any)'] = "horse/takim/$1/$2";
$route['at-yarisi/(match-detail/:num)'] = "horse/matchDetail/$1";
$route['at-yarisi/(:any)/(:any)'] = "horse/leagueMatch/$1/$2";
$route['at-yarisi/(:any)/(:any)/(:any)'] = "horse/leagueMatch/$1/$2/$3";

/* routes for Esport */
$route['e-sport'] = "esport/index";
$route['e-sport/match-detail/(:num)'] = "esport/matchDetail";
$route['e-sport/eventof/(:any)'] = "esport/index/$1";
$route['e-sport/eventof'] = "esport/index";
$route['e-sport/getContent'] = "esport/getContent";
$route['e-sport/showLiveEvent'] = "esport/showLiveEvent";
$route['e-sport/(:any)/takim/(:any)'] = "esport/takim/$1/$2";
$route['e-sport/(:any)/takim/(:any)/(:any)'] = "esport/takim/$1/$2";
$route['e-sport/iframe/(:any)/(:any)'] = "esport/iframe/$1/$2";
$route['e-sport/(:any)/(:any)'] = "esport/leagueMatch/$1/$2";
$route['e-sport/(:any)/(:any)/(:any)'] = "esport/leagueMatch/$1/$2/$3";

/* routes for Motor Sport */
$route['otomobil-yarisi'] = "motorsport/index";
$route['otomobil-yarisi/getContent'] = "motorsport/getContent";
$route['otomobil-yarisi/eventof/(:any)'] = "motorsport/index/$1";
$route['otomobil-yarisi/eventof'] = "motorsport/index";
$route['otomobil-yarisi/showLiveEvent'] = "motorsport/showLiveEvent";
$route['otomobil-yarisi/races/(:any)'] = "motorsport/races/$1";
$route['otomobil-yarisi/tournament/(:any)'] = "motorsport/tournament/$1";
$route['otomobil-yarisi/(:any)/(:any)'] = "motorsport/races/$1";
$route['otomobil-yarisi/player/(:any)/(:num)/(:any)/(:num)/(:num)'] = "motorsport/player/$1/$2/$3/$4/$5";


/* routes for Table Tennis */
$route['masa-tenisi'] = "masa_tenisi/index";
$route['masa-tenisi/eventof/(:any)'] = "masa_tenisi/index/$1";
$route['masa-tenisi/eventof'] = "masa_tenisi/index";
$route['masa-tenisi/getContent'] = "masa_tenisi/getContent";
$route['masa-tenisi/showLiveEvent'] = "masa_tenisi/showLiveEvent";
$route['masa-tenisi/match-detail/(:num)'] = "masa_tenisi/matchDetail/$1";
$route['masa-tenisi/takim/(:any)'] = "masa_tenisi/takim/$1";
$route['masa-tenisi/type/(:any)'] = "masa_tenisi/type/$1";
$route['masa-tenisi/iframe/(:any)/(:any)'] = "masa_tenisi/iframe/$1/$2";
$route['masa-tenisi/(:any)/(:any)'] = "masa_tenisi/tournament/$1/$2/$3";
$route['masa-tenisi/(:any)/(:any)/(:any)'] = "masa_tenisi/tournament/$1/$2/$3/$4";

/* routes for Rugby*/
$route['ragbi'] = "rugby/index";
$route['ragbi/eventof/(:any)'] = "rugby/index/$1";
$route['ragbi/eventof'] = "rugby/index";
$route['ragbi/showLiveEvent'] = "rugby/showLiveEvent";
$route['ragbi/match-detail/(:num)'] = "rugby/matchDetail/$1";
$route['ragbi/takim/(:any)'] = "rugby/takim/$1/$2";
$route['ragbi/iframe/(:any)/(:any)'] = "rugby/iframe/$1";
$route['ragbi/(:any)/(:any)'] = "rugby/leagueMatch/$1";
$route['ragbi/(:any)/(:any)/(:any)'] = "rugby/leagueMatch/$1/$2";

/* routes for Rugby League */
$route['rugby-ligi'] = "rugby/index";
$route['rugby-ligi/eventof/(:any)'] = "rugby/index/$1";
$route['rugby-ligi/eventof'] = "rugby/index";
$route['rugby-ligi/getContent'] = "rugby/getContent";
$route['rugby-ligi/showLiveEvent'] = "rugby/showLiveEvent";
$route['rugby-ligi/match-detail/(:num)'] = "rugby/matchDetail/$1";
$route['rugby-ligi/iframe/(:any)/(:any)'] = "rugby/iframe/$1";
$route['rugby-ligi/takim/(:any)'] = "rugby/takim/$1";
$route['rugby-ligi/(:any)/(:any)'] = "rugby/leagueMatch/$1";
$route['rugby-ligi/(:any)/(:any)/(:any)'] = "rugby/leagueMatch/$1/$2";

/* custome routes for volleyball */
$route['voleybol/match-detail/(:num)'] = "voleybol/matchDetail/$1";
$route['voleybol/eventof/(:any)'] = "voleybol/index/$1";
$route['voleybol/eventof'] = "voleybol/index";
$route['voleybol/takim/(:any)'] = "voleybol/takim/$1";
$route['voleybol/iframe/(:any)/(:any)'] = "voleybol/iframe/$1";
$route['voleybol/(:any)/(:any)'] = "voleybol/leagueMatch/$1";
$route['voleybol/(:any)/(:any)/(:any)'] = "voleybol/leagueMatch/$1/$2/$3";

/* custome routes for handball */
$route['hentbol/match-detail/(:num)'] = "hentbol/matchDetail/$1";
$route['hentbol/eventof/(:any)'] = "hentbol/index/$1";
$route['hentbol/eventof'] = "hentbol/index";
$route['hentbol/getContent'] = "hentbol/getContent";
$route['hentbol/showLiveEvent'] = "hentbol/showLiveEvent";
$route['hentbol/takim/(:any)'] = "hentbol/takim/$1";
$route['hentbol/iframe/(:any)/(:any)'] = "hentbol/iframe/$1";
$route['hentbol/(:any)/(:any)'] = "hentbol/leagueMatch/$1";
$route['hentbol/(:any)/(:any)/(:any)'] = "hentbol/leagueMatch/$1/$2";

/* custome routes for cycling */
$route['bisiklet/eventof/(:any)'] = "bisiklet/index/$1";
$route['bisiklet/eventof'] = "bisiklet/index";
$route['bisiklet/(:any)/player/(:any)'] = "bisiklet/playerdetail/$1/$2";
$route['bisiklet/iframe/(:any)/(:any)'] = "bisiklet/iframe/$1";
$route['bisiklet/(:any)/(:any)'] = "bisiklet/leagueMatch/$1";
$route['bisiklet/(:any)/(:any)/(:any)'] = "bisiklet/leagueMatch/$1/$2";

/* custome routes for golf */
$route['golf/eventof/(:any)'] = "golf/index/$1";
$route['golf/eventof'] = "golf/index";
$route['golf/getContent'] = "golf/getContent";
$route['golf/showLiveEvent'] = "golf/showLiveEvent";
$route['golf/match-detail/(:num)'] = "golf/matchDetail/$1";
$route['golf/(:any)/player/(:any)'] = "golf/playerdetail/$1/$2";
$route['golf/(:any)/(:any)'] = "golf/leagueMatch/$1";
$route['golf/(:any)/(:any)/(:any)'] = "golf/leagueMatch/$1/$2";

/* custome route for beyzbol game */
$route['beyzbol'] = "beyzbol/index";
$route['beyzbol/eventof/(:any)'] = "beyzbol/index/$1";
$route['beyzbol/eventof'] = "beyzbol/index";
$route['beyzbol/getContent'] = "beyzbol/getContent";
$route['beyzbol/showLiveEvent'] = "beyzbol/showLiveEvent";
$route['beyzbol/match-detail/(:num)'] = "beyzbol/matchDetail/$1";
$route['beyzbol/iframe/(:any)/(:any)'] = "beyzbol/iframe/$1/$2";
$route['beyzbol/takim/(:any)'] = "beyzbol/takim/$1";
$route['beyzbol/iframe/(:any)/(:any)'] = "beyzbol/iframe/$1/$2";
$route['beyzbol/(:any)/(:any)'] = "beyzbol/leagueMatch/$1/$2";
$route['beyzbol/(:any)/(:any)/(:any)'] = "beyzbol/leagueMatch/$1/$2/$3";

/* custome routes for snooker */


/* custome routes for boxing */
$route['boxing/match-detail/(:num)'] = "boxing/matchDetail/$1";
$route['boxing/eventof/(:any)'] = "boxing/index/$1";
$route['boxing/eventof'] = "boxing/index";
$route['boxing/getContent'] = "boxing/getContent";
$route['boxing/showLiveEvent'] = "boxing/showLiveEvent";
$route['boxing/takim/(:any)'] = "boxing/takim/$1";

$route['boxing/(:any)/(:any)'] = "boxing/category/$1/$2";

/* custome routes for cricket */
$route['kriket'] = "kriket/index";
$route['kriket/eventof/(:any)'] = "kriket/index/$1";
$route['kriket/eventof'] = "kriket/index";
$route['kriket/getContent'] = "kriket/getContent";
$route['kriket/showLiveEvent'] = "kriket/showLiveEvent";
$route['kriket/match-detail/(:num)'] = "kriket/matchDetail/$1";
$route['kriket/takim/(:any)'] = "kriket/takim/$1";
$route['kriket/iframe/(:any)/(:any)'] = "kriket/iframe/$1/$2";
$route['kriket/(:any)/(:any)'] = "kriket/leagueMatch/$1/$2";
$route['kriket/(:any)/(:any)/(:any)'] = "kriket/leagueMatch/$1/$2/";

/* custome routes for snooker */
$route['snooker/match-detail/(:num)'] = "snooker/matchDetail/$1";
$route['snooker/eventof/(:any)'] = "snooker/index/$1";
$route['snooker/eventof'] = "snooker/index";
$route['snooker/getContent'] = "snooker/getContent";
$route['snooker/showLiveEvent'] = "snooker/showLiveEvent";
$route['snooker/(:any)/takim/(:any)'] = "snooker/takim/$1/$2";
$route['snooker/(:any)/takim/(:any)/(:any)'] = "snooker/takim/$1/$2";
$route['snooker/iframe/(:any)/(:any)'] = "snooker/iframe/$1/$2";
$route['snooker/(:any)/(:any)'] = "snooker/league/$1/$2";
$route['snooker/(:any)/(:any)/(:any)'] = "snooker/league/$1/$2";


/* Custome routes for snowboarding */
$route['snowboard/getContent'] = "snowboard/getContent";
$route['snowboard/eventof/(:any)'] = "snowboard/index/$1";
$route['snowboard/eventof'] = "snowboard/index";
$route['snowboard/(:any)/(:any)'] = "snowboard/tournament/$1/$2";
$route['snowboard/(:any)/(:any)/(:any)'] = "snowboard/tournament/$1/$2";

/* Custome routes for boxing */
$route['boks/category/(:any)'] = "boks/category/$1/$2";
$route['boks/match-detail/(:num)'] = "boks/matchDetail/$1";
$route['boks/(:any)/takim/(:any)'] = "boks/takim/$1/$2";
$route['boks/(:any)/takim/(:any)/(:any)'] = "boks/takim/$1/$2";
$route['boks/iframe/(:any)/(:any)'] = "boks/iframe/$1";
$route['boks/(:any)/(:any)'] = "boks/category/$1/$2";
$route['boks/(:any)/(:any)/(:any)'] = "boks/category/$1/$2";

