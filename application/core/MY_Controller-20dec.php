<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function minifyHtml($buffer="")
	{
		
		$re = '%# Collapse whitespace everywhere but in blacklisted elements.
			(?>             # Match all whitespans other than single space.
			  [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
			| \s{2,}        # or two or more consecutive-any-whitespace.
			) # Note: The remaining regex consumes no text at all...
			(?=             # Ensure we are not in a blacklist tag.
			  [^<]*+        # Either zero or more non-"<" {normal*}
			  (?:           # Begin {(special normal*)*} construct
				<           # or a < starting a non-blacklist tag.
				(?!/?(?:textarea|pre|script)\b)
				[^<]*+      # more non-"<" {normal*}
			  )*+           # Finish "unrolling-the-loop"
			  (?:           # Begin alternation group.
				<           # Either a blacklist start tag.
				(?>textarea|pre|script)\b
			  | \z          # or end of file.
			  )             # End alternation group.
			)  # If we made it here, we are not in a blacklist tag.
			%Six';

		$new_buffer = preg_replace($re, " ", $buffer);

		// We are going to check if processing has working
		if ($new_buffer === null)
		{
			$new_buffer = $buffer;
		}
	return $new_buffer;
	}
	
	/*  */
	public function getStageId($tournament_stageName,$cName,$sfk='')
	{
		$date = date('Y-m-d 23:59:59') ;
		$this->load->model("Common_model");
		$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ls`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` desc limit 0,1';
		$res = $this->Common_model->direct_query($sql); 
		if(empty($res))
		{			
			$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` desc limit 0,1';
			$res = $this->Common_model->direct_query($sql); 	
		}

		if(!empty($res))
		{
			return $res[0]->id;
		}else{
			return false;;
		}
	}
	
	public function getNextStageId($tournament_stageName,$cName ,$sfk='')
	{
		$date = date('Y-m-d 00:00:00') ;
		$this->load->model("Common_model");
		$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ls`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` ASC limit 0,1';
		$res = $this->Common_model->direct_query($sql); 
		if(empty($res))
		{			
			$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` ASC limit 0,1';
			$res = $this->Common_model->direct_query($sql); 	
		}

		if(!empty($res))
		{
			return $res[0]->id;
		}else{
			return false;;
		}
		
	}
	public function getTtId($ttName,$sfk )
	{
		$date = date('Y-m-d 23:59:59') ;
		 $this->load->model("Common_model");
		$sql = 'SELECT id FROM `tournament_template` WHERE name="'.$ttName.'"  and sportFK="'.$sfk .'" ORDER BY id  Desc limit 0,1';
		$res = $this->Common_model->direct_query($sql);
		if(!empty($res))
		{
				return $res[0]->id;
		}else{
			return false;;
		}
	}
	/* This function is used to filter values  */
	public function filterval($val){
		$newVal = $this->db->escape_str(trim($val));
		return $newVal;
	}
	/*
	@Description : function to print data
	*/
	public function test($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		//exit;
	}
	/* 
	@Descriptin : Function to print the last executed query
	*/
	public function qry()
	{
		 print_r($this->db->last_query());
		 //exit;
	}
	

	


}

/* End of file  */
/* Location: ./application/core/ */