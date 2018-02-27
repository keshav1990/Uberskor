<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("Common_model","Common_games_model",'Parse_xml'));
	}

	public function index()
	{
		/* $sports = $this->Common_model->get_all_orderby('sport','id asc');
		foreach($sports as $k => $sport)
		{
			$name = $this->Common_model->get_singel_field_where_order("language",'name',array("object"=>"sport","objectFK"=>$sport->id,"language_typeFK"=>31),'id asc');
			if(!empty($name)){
			echo "<option value='".$sport->id."'>".$name."</option>";
			}
			$name='';
		}
		die; */
		$game = $this->input->post("sport",true);
		$term = $this->input->post("term",true);
		$data["game"] = $this->input->post("game",true);
		$data['result'] = $this->Common_model->get_where('sport',array('id'=>$game));
		array_map(function($k,$v) use($term,$data){
			$data["result"][$k]->name = $this->Common_model->get_singel_field_where_order("language",'name',array("object"=>"sport","objectFK"=>$v->id,"language_typeFK"=>31),'id asc');
			$data["result"][$k]->participants = $this->Common_games_model->get_event_by_game($v->id,$term);
		},array_keys($data["result"]),array_values($data["result"]));
		$theHTMLResponse = $this->load->view("search_content", $data, TRUE);
		$theHTMLResponse  =  $this->minifyHtml($theHTMLResponse);
		echo $theHTMLResponse;
	}
	
	

}

/* End of file  */
/* Location: ./application/controllers/ */