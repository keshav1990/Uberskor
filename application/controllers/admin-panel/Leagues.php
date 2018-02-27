<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leagues extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Common_model","Common_games_model"));
		if($this->uri->segment(4)){
			$game = urldecode($this->uri->segment('4'));
			$game = str_replace("-", " ", $game);
			$this->game = str_replace("+", " - ", $game);
			$sport= $this->Common_model->get_where("language",array("language_typeFK"=>31,"object"=>'sport',"name"=>$game));
			$this->sportFK = $sport[0]->objectFK;
		}
	}
	public function index()
	{
		$data["links"] = $this->Common_games_model->get_sports_list_with_language('31');
		$this->load->view("admin-view/country_leagues_list",$data);
	}
	public function game()
	{
		$data["game"] = $this->game;
		$data['sportFK'] = $this->sportFK;
		
		$data["country"] = $this->Common_games_model->get_only_country($this->sportFK);
		//s$this->tst($data);
		//die;
		if(empty($data['country'])){
		$data["country"] = $this->Common_model->get_all_orderby("country", 'name asc');
		}
		  $country = $data["country"];
		  foreach ($data["country"] as $key => $val) {
			$leagues = $this->Common_games_model->get_country_leagues($this->sportFK, $val->id);
			if (!empty($leagues)) {
			  $data["country"][$key]->leagues = $leagues;
			}
			else {
			  unset($data["country"][$key]);
			}
		  }
		//$this->test($data);
		//die;
		
		/* $league = $this->Common_model->get_where("my_leagues",array("sportFK"=>$this->sportFK));
		if(!empty($league) && !empty(json_decode($league[0]->tournament_stageFK,true))){
			$where_in = json_decode($league[0]->tournament_stageFK,true);		
			$data["list"] = $this->Common_games_model->get_all_league_by_sports($this->game,$this->sportFK,$where_in);
		} */
		$this->load->view("admin-view/leagues_list_sort",$data);
	}
	
	public function add_leagueslist(){
		$sportFK  = $this->input->post('sportFK');
		$game  = $this->input->post('game');
		$country_id  = $this->input->post('country_id');
		$leagueIdvar = $this->input->post('league_id');
		if($leagueIdvar != ""){
	    $leagueIdarray  = explode(',',$this->input->post('league_id'));
		$countleagueList = $this->Common_model->count_where('leagueslist',array('game_id' => $sportFK,'country_id'=>$country_id));
		if($countleagueList != ""){
		$this->Common_model->delete('leagueslist',array('game_id'=>$sportFK,'country_id'=>$country_id));		
		}
		foreach($leagueIdarray as $leagueId){
		if($leagueId != "" && $leagueId != "undefined"){	
		$this->Common_model->insert('leagueslist',array('game_id'=>$sportFK, 'country_id' =>$country_id,'league_id'=>$leagueId ));	
		}
		}
		$msg = array('status' => 'success','msg' =>"Country List added successfully");
		$this->session->set_flashdata($msg);
		redirect($this->config->item('admin_base_url').'country/game/'.$game);
		}
		else{
		$msg = array('status' => 'error','msg' =>"Un-successfull operation");
		$this->session->set_flashdata($msg);
		redirect($this->config->item('admin_base_url').'country/game/'.$game);	
		}
	}
	

}

/* End of file  */
/* Location: ./application/controllers/admin-controller */