<?php 
class Pagging extends CI_Model {
    
        public function __construct() 
        {
            parent:: __construct();
            $this->load->helper("url");
            $this->load->model("common_model");
            $this->load->model("join_model");
            $this->load->library("pagination");
        }
				
	function make_pagging($url, $total_rows, $per_page, $uri)
        {
            $config["base_url"] = $url;
            $config["total_rows"] = $total_rows;
            $config["per_page"] = $per_page;
            $config["uri_segment"] = $uri;
            $config['num_links'] = 8;
            $config['use_page_numbers']  = TRUE;
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';

            $config['next_link'] = '&raquo;';
            $config['prev_link'] = '&laquo;';

            $config['cur_tag_open'] = "<li class='active'><a target='_self' href='#'>";
            $config['cur_tag_close'] = "</a></li>";

            $this->pagination->initialize($config);


            $page = ($this->uri->segment($config["uri_segment"]))? $this->uri->segment($config["uri_segment"]) : 0;
            $offset = ($page  == 0) ? 0 : ($page * $config['per_page']) - $config['per_page'];

            $limit = array(
            'per_page'=>$config["per_page"],
            'cur_page'=>$offset
            );
            
            return $limit;
        }
        
        function search_pagging($url, $total_rows, $per_page)
        {
            if(isset($_GET['per_page']) && (!empty($_GET['per_page']))){$cur_page = $_GET['per_page'];}else{$cur_page='0';}
            
            $config["base_url"] = $url;
            $config["total_rows"] = $total_rows;
            $config["per_page"] = $per_page;
            $config['cur_page'] = $cur_page;
            $config['num_links'] = 8;
            $config['use_page_numbers']  = TRUE;
            $config['page_query_string'] = TRUE;
            $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
            $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';

            $config['next_link'] = '&raquo;';
            $config['prev_link'] = '&laquo;';

            $config['cur_tag_open'] = "<li class='active'><a target='_self' href='#'>";
            $config['cur_tag_close'] = "</a></li>";

            $this->pagination->initialize($config);


            //$page = ($this->uri->segment($config["uri_segment"]))? $this->uri->segment($config["uri_segment"]) : 0;
            $offset = ($cur_page  == 0) ? 0 : ($cur_page * $config['per_page']) - $config['per_page'];
            
            $limit = array(
            'per_page'=>$config["per_page"],
            'cur_page'=>$offset
            );
            
            return $limit;
        }
}
?>