<?php
// echo "<pre>";
$top_banner = $banners[0]->image;
$mid_banner = $banners[1]->image;
$right_banner = $banners[2]->image;
$leftside_banner = $banners[3]->image;
$logo = $banners[4]->image;
$setColor = json_decode(json_encode($clrschemes[0]),true);
   $body_clr =$setColor["body_color"];
   $inner_body_color = $setColor["inner_body_color"];
   $innerbody_font_color = $setColor["innerbody_font_color"];

   $footer_color = $setColor["footer_color"];
   $footer_font_color = $setColor["footer_font_color"];

   $tbl_head_color = $setColor["table_head_color"];
   $tbl_row_color = $setColor["table_row_color"];
   $tbl_font_color = $setColor["table_font_color"];

   $sidebar_font_color = $setColor["sidebar_font_color"];
   $sidebar_color = $setColor["sidebar_color"];

   $subfooter_color = $setColor["subfooter_color"];
   $subfooter_font_color = $setColor["subfooter_font_color"];

   $tophead_color = $setColor["tophead_color"];

   $sidebar_bottomlist_color = $setColor["sidebar_bottomlist_color"];
   $sidebar_bottomlist_font_color = $setColor["sidebar_bottomlist_font_color"];

   $last_list_color = $setColor["last_list_color"];
   $last_list_font_color = $setColor["last_list_font_color"];

   function change_acent12($str) {
    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë','İ', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','ğ','ı','Ğ','Ş') ;
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E','I', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', 'a', '?', 'e', '?', '?', 'O', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','g','i','G','S') ;
  return str_replace($a, $b, $str) ;
}
function url_converter12($str, $separator = 'dash', $lowercase = TRUE, $en_val) {
  $CI = & get_instance() ;
//$str = remove_accents($str);
  $str = change_acent12($str) ;
//return $str;
//exit;
  $replace = ($separator == 'dash') ? '-' : '_' ;
  $trans = array('&\#\d+?;' => '', '&\S+?;' => '', '\s+' => $replace, '[^a-z0-9\-\._]' => '', $replace . '+' => $replace, $replace . '$' => $replace, '^' . $replace => $replace, '\.+$' => '') ;
  $str = strip_tags($str) ;
  foreach ($trans as $key => $val) {
    $str = preg_replace("#" . $key . "#i", $val, $str) ;
  }
  if ($lowercase === TRUE) {
    if (function_exists('mb_convert_case')) {
      $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8") ;
    }
    else {
      $str = strtolower($str) ;
    }
  }
  $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str) ;
//create_json(array($str=>$en_val));
  return trim(stripslashes($str)) ;
}

?>

<?php $this->load->view("common/header"); ?>

<style>    #def-form-table td input, textarea { padding: 4px 4px; margin-bottom: 8px;border-radius: 2px; }    #def-form-table td textarea {resize: none; }    #def-form-table td select  { width:159px;padding: 4px 4px;margin-bottom: 8px;border-radius: 2px;}
   .soccer #header > .content {
    background-image: url(<?php echo base_url().'uploads/banners/'.$top_banner; ?>) !important;
    background-repeat: no-repeat;

}
.darkgrey{background:#9c9c9c !important;}
   /*for body color and font color*/
      body{
         background : <?=$body_clr?>;
         color : <?=$footer_font_color?>;
      }
   /*for footer color and font color*/
      #footer,#footer a {
         background : <?=$footer_color?>;
         color : <?=$innerbody_font_color?>;
      }
      /*for top head section*/
      div#control-panel{
         background : <?=$tophead_color?>;
      }
      /*for inner body color*/
      body div.container > div.content {
         background : <?=$inner_body_color?>;
      }
      /*for side menu color and font- color*/
      .menu.country-list ul li, .menu ul li{
         background : <?=$sidebar_color?>;
         color : <?=$sidebar_font_color?>;
      }

      /*for table th color*/
      .fs-table tr.league {
         background : <?=$tbl_head_color?>;
         color : <?=$tbl_font_color?>;
      }
      /*for table tr color*/
      .fs-table tr.even {
          background : <?=$tbl_row_color?>;
          color : <?=$tbl_font_color?>;
      }
      /*for first footer*/
      #e-content {
         background : <?=$subfooter_color?>;
         color : <?=$subfooter_font_color?>;
      }
      /*for sidemenu list 2*/
      .soccer ul.country-list li{
         background : <?=$sidebar_bottomlist_color?>;
         color : <?=$sidebar_bottomlist_font_color?>;
      }
      /*for last sidemenu for partners*/
      ul.partner li {
         background: <?=$last_list_color?>;;
         color: <?=$last_list_font_color?>;;
      }	  
	  .cursor{cursor: pointer;}	  .darkbg{background:#cacaca!important;}
	  
	  
	  
	   @media only screen and (max-device-width:840px){ 
 #tc-main { 
 display: -webkit-box; 
    display: -moz-box;
   display: box;
      -webkit-box-orient: vertical; 
    -moz-box-orient: vertical;
  box-orient: vertical;
	 } 
	 #mc { 
  -webkit-box-ordinal-group: 3; 
   -moz-box-ordinal-group: 3;
  box-ordinal-group: 3;
 }

 #lc {
    -webkit-box-ordinal-group: 2; 
   -moz-box-ordinal-group:2; 
     box-ordinal-group: 2;
 } 
 
 #tc-main #lc {height: 0px;}
 .mobile-bx-2 {top:0px;}
 #header {margin-bottom: 14px;}
 .tab-content {margin-top: 35px;}
 #tc-main #lc {margin-top: 0px;}
 #fsbody {top: 0px;}
 .tab-content {margin-top: 1px;}

 }
	  
   </style>

         <div class="adsclear"></div>
         <div id="header">
            <div class="top">
               <h1>
            <?php 
            $ci = & get_instance();
            $ci->load->model("Common_model");
            $subheader = $ci->Common_model->get_all_orderby('sub_header_content','id ASC');
            echo $subheader[0]->sub_header_content;
            ?>
            </h1>
            </div>
            <div class="content"> 
               <a href="<?php echo base_url();?>" id="logo"><img src="<?php echo base_url().'uploads/banners/'.$logo?>" alt="Uberskor.com" style="width:210px;height:37px;"></a>
               <div id="project-debug"></div>
			   <span class="toggle_img"><img src="<?php echo base_url().'assets/images/show-menu-icon.png';?>" alt=""></span> 
               <div id="menu" class="menu-top">
               <?php $this->load->view("common/topmenu")?>
                  <div class="menu-border"></div>
               </div>
            </div>
         </div>  
         <div class="content futball-leageu-main">
            <div id="main">
               <div id="rc-top"> 
                  <div id="rccontent">
                    
               <!-----Google Add iframe------>
               <img src="<?php echo base_url().'uploads/banners/'.$right_banner;?>" alt="Right Banner" style="width:161px; height:500px;" >
                    
                    
                  </div>
               </div>
               <div id="tc-main">
			   
                 <div id="mc" class="sport_page baseball_leag_main">

				   <h2 class="tournament">
				   <?=$tlist[0]->sport_name?> »
				    <a href="#"><span class="flag flag-<?=strtolower($tlist[0]->flag)?>" title="<?=$tlist[0]->country_name?>"></span> <?=$tlist[0]->country_name?>  </a> »  <a href="#"> <?=$tlist[0]->league_name?> </a> » <?=$tlist[0]->tournament_name?>
				   </h2>
				   
				   
				   <div class="team-header">
					<div class="team-logo" ></div>
					
					<div class="team-name"><?=$tlist[0]->league_name?></div>
				   </div>
				  
                  
                     <div id="fsbody" class="flashscore futball_leag_main">
                        <div id="fsi"></div> 
                        <div id="fscon">
						
						<?PHP
                            $SELECTEDtab = $this->uri->segment('4');
                             ?>
						<span class="selected-mob"><?php   switch ($SELECTEDtab){
                                case "":
                                echo "Genel";
                                 break;
                                 case "sonuclar":
                                echo "Sonuçlar";
                                 break;
                                 case "puan-durumu":
                                echo "Puan Durumu";
                                 break;
                                 case "takimlar":
                                echo "Takimlar";
                                 break;
                                 case "fikstur":
                                echo "Fikstür";
                                 break;
                                 default:
                                  echo "Tüm";
                            } ?></span> 
						
						<?php
							$pathUrl = base_url().$game.'/'.$this->uri->segment('2').'/'.$this->uri->segment('3');
						?>
                           <ul class="ifmenu live-menu">
                              <li class="<?php if( $SELECTEDtab== '' ){echo "selected m_selected";}?>" ><a href="<?php echo $pathUrl;?>" onclick="window.location = '<?=$pathUrl?>'">Genel</a></li>
                              <li  class="<?php if($SELECTEDtab == 'sonuclar' ){echo "selected m_selected";}?>" ><a href="<?php echo $pathUrl."/sonuclar";?>" onclick="goTo('sonuclar')"  >Sonuçlar</a></li>
                              <li class="<?php if($SELECTEDtab == 'puan-durumu' ){echo "selected m_selected";}?>" ><a href="<?php echo $pathUrl."/puan-durumu";?>" onclick="goTo('puan durumu')">Puan Durumu</a></li>
							  <li class="<?php if($SELECTEDtab == 'takimlar' ){echo "selected m_selected";}?>" ><a href="<?php echo $pathUrl."/takimlar";?>" onclick="goTo('takimlar')" >Takimlar</a></li>
							  <li class="<?php if($this->uri->segment('4') == 'fikstur' ){echo "selected";}?>" ><a href="<?php echo $pathUrl."/fikstur";?>" onclick="goTo('fikstur')" >Fikstür</a></li>
                           </ul>
						   
                           <div id="baseball-details" class="fs-table tab-content" style="<?php if($this->uri->segment('4') == '' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>">
								
									  <div class="odds-content">
												  <ul class="ifmenu tAB-1">
												  <li class="selected"><strong>Son Skorlar</strong></li>
												  </ul>
												  <div class="ifmenu-border"></div>
										 <?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
							  <div class="odds-content baseball_contend">
                              <?php
                              $oldNameCount = 0;
                              $oldName1 = "";
                              foreach ($list as $k => $row1) {
                              ///this is to check name if name is not same from previous than create new one
                                if ($oldName1 != $row1->stage_id) {
                                  $oldName1 = $row1->stage_id;
                                  $oldNameCount++;
                              ////if new name than close the old table from prev name 
                                  if ($oldNameCount == 2) {
                                    $oldNameCount = 0;
                                    ?>
                                   </tbody> 
                              </table>
                                       <?php
                                     }
                                     ?>
								      <?php $parentID = $row1->id;?>
								<table class="od_table_mx ft-ball_main" cellspacing="0" cellpadding="0" width="100%"> 
								<thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="30" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name?>"></span><span class="name"><span class="tournament_part"> <?=$row1->league_name ?> </span></span></span> 
                                       </td>
                                    </tr>
									
									<tr class="white">
									  <td colspan="14" class="cell_ad time">Final</td>
									  <td colspan="1" class="cell_ad time">R</td>
									  <td colspan="1" class="cell_ad time">1</td>
									  <td colspan="1" class="cell_ad time">2</td>
									  <td colspan="1" class="cell_ad time">3</td>
									  <td colspan="1" class="cell_ad time">4</td>
									  <td colspan="1" class="cell_ad time">5</td>
									  <td colspan="1" class="cell_ad time">6</td>
									  <td colspan="1" class="cell_ad time">7</td>
									  <td colspan="1" class="cell_ad time">8</td>
									  <td colspan="1" class="cell_ad time">9</td>
									  <td colspan="2" class="cell_ad time">ESI</td>
									  <td colspan="1" class="cell_ad time">V</td>
									  <td colspan="1" class="cell_ad time">H</td>
									  <td colspan="2" class="cell_ad time live_icon_data">&nbsp;</td>
                                    </tr>  	
									
                              </thead>
                              <tbody>
							  
							  
                              <?php }?>
								<tr onclick='detailPopup("<?=$row1->id ?>");' class="tr-first" style="cursor: pointer;" title="<?=$row1->eventname?>">
							  <!--td rowspan="2" colspan="1" class="cell_ib icons left"> </td-->

							  <td rowspan="2" colspan="5" class="cell_ad time"><?=$row1->starttime?> <?=$row1->startdate?></td>

							  <!--td class="cell_xh serve-home" colspan="1">&#160;</td-->

							  <td class="cell_ab team-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score > $row1->away_score ) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->home_team?></span></td>

							  <td class="cell_sc score-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score > $row1->away_score ) {echo "bold";} } ?>" colspan="1"><?=$row1->home_score?></td>

							  
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td class="cell_sd part-bottom " colspan="1"><?=$row1->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td class="cell_sm part-bottom" colspan="2"><?=$row1->home_result[0]->extra_inning?></td>

							  <td class="cell_sr part-bottom" colspan="1"><?=$row1->home_result[0]->hits?></td>

							  <td class="cell_ss part-bottom" colspan="1"><?=$row1->home_result[0]->errors?></td>

							  <td rowspan="2" colspan="2" class="cell_oq comparison"></td>
							</tr>

							<tr title="<?=$row1->eventname?>" onclick='detailPopup("<?=$row1->id ?>");'  class="tr-first baseball_details-pg" style="cursor: pointer;">
							  <!--td class="cell_xa serve-away" colspan="1">&#160;</td-->

							  <td class="cell_ab team-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->away_team?></span></td>

							  <td class="cell_sc score-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->away_score?></td>
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td class="cell_sd part-bottom" colspan="1"><?=$row1->away_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td class="cell_sm part-bottom" colspan="2"><?=$row1->away_result[0]->extra_inning?></td>

							  <td class="cell_sr part-bottom" colspan="1"><?=$row1->away_result[0]->hits?></td>

							  <td class="cell_ss part-bottom" colspan="1"><?=$row1->away_result[0]->errors?></td>
							  
							</tr>
							<!--tr class="blank-line">
							  <td colspan="30"></td>
							</tr-->

                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($list) - 1)) {
                                  ?>
                               </tbody>
            </table>
                              <?php }} ?>
							   <table class="soccer odds">
										<tr class="event_round">
										<td colspan="16" style="text-align:center:"><a href="<?=$pathUrl.'/sonuclar'?>" style="color:#fff!important;" >Daha fazla karşılaşma göster</a></td>  
										</tr>
									  </table>
                              </div>
										  <?php } ?> 										  
                              </div>
							  
						
							
							  
							  
							  
                           </div>
						   
						   <!-----Tab Content-2---->
						    <div id="tab-2"  style="<?php if($this->uri->segment('4') == 'sonuclar' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>"  class="fs-table tab-content">
							 <?php if(empty($list)){
													  $this->load->view("common/nomatch");
												  }else{  ?>
							<div id="baseball-details" class="odds-content baseball_contend">
								<table  class="ft-ball_main odds" cellspacing="0" cellpadding="0" width="100%" style="table-layout: inherit;">
								<thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <!--td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                      
                                                </span>
                                             </span>
                                          </div>
                                       </td-->

                                       <td colspan="31" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($list[0]->flag)?>   left-odds " title="<?=$list[0]->country_name ?>"></span><span class="name"><span class="tournament_part"> <?=$list[0]->league_name ?> </span></span></span>
                                       </td>
                                    </tr>
									<tr class="white">
                                  
									  <td colspan="14" class="cell_ad time">Final</td>
									  <td colspan="1" class="cell_ad time">R</td>
									  <td colspan="1" class="cell_ad time">1</td>
									  <td colspan="1" class="cell_ad time">2</td>
									  <td colspan="1" class="cell_ad time">3</td>
									  <td colspan="1" class="cell_ad time">4</td>
									  <td colspan="1" class="cell_ad time">5</td>
									  <td colspan="1" class="cell_ad time">6</td>
									  <td colspan="1" class="cell_ad time">7</td>
									  <td colspan="1" class="cell_ad time">8</td>
									  <td colspan="1" class="cell_ad time">9</td>
									  <td colspan="2" class="cell_ad time">ESI</td>
									  <td colspan="1" class="cell_ad time">V</td>
									  <td colspan="1" class="cell_ad time">H</td>
									  <td colspan="2" class="cell_ad time">&nbsp;</td>
                                    </tr>
                              </thead>
                              <tbody>

							  <?php $k = 0;$j = 1; $diff_month = ''; foreach ($list as $row1): $class = ($k%2 ==0 )? "even":"odd" ;?>
							  <?php if($diff_month != $row1->diff_month || $diff_month == ''){ ?>
										<tr class="event_round darkbg parent_match_day_<?=$j?>" style="display:none;"  >
										   <td colspan="30"><span id="counter_<?=$k?>" class="counter"></span>. Maç Günü</td>
										</tr>
							<?php $j++; } ?>

							<tr  title="<?=$row1->eventname?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first pointer <?=$class?> child_match_day_<?=($j-1)?>"   style="display:none;">
							  <!--td rowspan="2" colspan="1" class="cell_ib icons left"> </td-->

							  <td rowspan="2" colspan="5" class="cell_ad time"><?=$row1->starttime?> <?=$row1->startdate?></td>

							  <!--td class="cell_xh serve-home" colspan="1">&#160;</td-->

							  <td class="cell_ab team-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->home_team?></span></td>

							  <td class="cell_sc score-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->home_score?></td>

							  
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td class="cell_sd part-bottom " colspan="1"><?=$row1->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td class="cell_sm part-bottom" colspan="2"><?=$row1->home_result[0]->extra_inning?></td>

							  <td class="cell_sr part-bottom" colspan="1"><?=$row1->home_result[0]->hits?></td>

							  <td class="cell_ss part-bottom" colspan="1"><?=$row1->home_result[0]->errors?></td>

							  <td rowspan="2" colspan="2" class="cell_oq comparison"></td>
							</tr>

							<tr  title="<?=$row1->eventname?>" onclick='detailPopup("<?=$row1->id ?>");'  class="tr-first baseball_details-pg pointer <?=$class?> child_match_day_<?=($j-1)?>" style="display:none;"> 
							  <!--td class="cell_xa serve-away" colspan="1">&#160;</td-->

							  <td class="cell_ab team-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->away_team?></span></td>

							  <td class="cell_sc score-home <?php if (strpos($row1->status_text, 'Finished') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->away_score?></td>
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td class="cell_sd part-bottom" colspan="1"><?=$row1->away_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td class="cell_sm part-bottom" colspan="2"><?=$row1->away_result[0]->extra_inning?></td>

							  <td class="cell_sr part-bottom" colspan="1"><?=$row1->away_result[0]->hits?></td>

							  <td class="cell_ss part-bottom" colspan="1"><?=$row1->away_result[0]->errors?></td>
							  
							</tr>
							<!--tr class="blank-line <?=$class?> child_match_day_<?=($j-1)?>" style="display:none;">
							  <td colspan="30"></td>
							</tr--->

							<?php $k++; $diff_month = $row1->diff_month;  endforeach ?>
							<tr class="event_round">
										<td colspan="30" style="text-align:center:"><a href="javascript:void(0)" style="color:#fff!important;" onclick="loadMore()">Daha fazla karşılaşma göster</a></td>  
										</tr>
                               </tbody>
								</table>

                              </div>
										  <?php } ?>
							</div>
							
							
							<!-----Tab Content-4---->
							 <div id="tab-4"  style="<?php if($this->uri->segment('4') == 'puan-durumu' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>" class="fs-table tab-content">
							  <!-- <table class="base-table squad-table">
								<tbody>
								<tr class="player">
									<td class="jersey-number">13</td>
									<td class="player-name">
									<span class="flag fl_139" title="Hollanda"></span>
									<a href="#">Cillessen Jasper</a></td>
									<td class="player-age">27</td>
									<td>1</td>
									<td class="grey">0</td>
									<td class="grey">0</td>
									<td class="grey">0</td>
								</tr>
							   </tbody>
							   </table> -->
							  <div class="table_takim leag-table-main puan-durumu_match">
							  <table class="od_table_mx programlar_bg tble_ntert_leag" style="border-top: 1px solid #435779;">
							  
							  <thead style=" background:#000;">
							   <tr class="main">
								  <th class="rank col_rank gTableSort-switch" title="Rank"><a href="#" class="gTableSort-asc gTableSort-on"><span class="txt">#</span><!--span class="arrow"></span--></a></th>
								  
								  <th colspan="5" class="participant_name col_name gTableSort-switch" title="Takım"><a href="#" class="gTableSort-off"><span class="txt">Takım</span><span class="arrow"></span></a></th>
								  
								  <th class="matches gTableSort-switch" title="Oynadığı maçlar"><a href="#" class="gTableSort-off"><span class="txt">O</span><span class="arrow"></span></a></th>
								  
								  <th class="wins gTableSort-switch" title="Galibiyet"><a href="#" class="gTableSort-off"><span class="txt">G</span><span class="arrow"></span></a></th>
								  
								  <th class="draws gTableSort-switch" title="Beraberlik"><a href="#" class="gTableSort-off"><span class="txt">B</span><span class="arrow"></span></a></th>
								  
								  <th class="losses gTableSort-switch" title="Mağlubiyet"><a href="#" class="gTableSort-off"><span class="txt">M</span><span class="arrow"></span></a></th>
								  
								  <th class="goals gTableSort-switch" title="Goller"><a href="#" class="gTableSort-off"><span class="txt">G</span><span class="arrow"></span></a></th>
								  
								  <th class="points gTableSort-switch" title="Puan">
								  <a href="#" class="gTableSort-off"><span class="txt">P</span><span class="arrow"></span></a></th>
								  
								  <th class="form" title="Son 5 Maç" style="width:130px;">Form</th>
							   </tr>
		   
		   
		   
		   
</thead>
							  
							  <tbody>
							  <?php foreach($league_standing as $lst ): ?>
							   <tr class="glib-participant-nVp0wiqd odd" data-def-order="0" title="">
							   <td class="rank col_rank no q1 col_sorted" title=""><?=$lst->rank?>.</td>
							   
							   <td colspan="5" class="participant_name col_participant_name col_name" title=""><span class="team_name_span" style="width: 266px;"><a><?=$lst->name?></a></span><span  class="dw-icon ico">&nbsp;</span></td>
							   
							   
							   <td class="matches_played col_matches_played"><?=$lst->played?></td>
							   <td class="wins col_wins"><?=$lst->wins?></td>
							   <td class="draws col_draws"><?=$lst->draws?></td>
							   <td class="losses col_losses"><?=$lst->defeits?></td>
							   <td class="goals col_goals"><?=$lst->goalsfor?>:<?=$lst->goalsagainst?></td>
							   <td class="goals col_goals"><?=$lst->points?></td>
							   <td class="form col_form">
								  <div class="matches-5 ">
									<a class="form-bg form-s" title="">&nbsp;</a>
								<?php if(!empty($lst->matches)) { ?>
								<?php $i=0;$imgClass=""; foreach($lst->matches as $match){
								if($match->win==1){$imgClass="form-w";}elseif($match->tie==1){$imgClass="form-d";}else{$imgClass="form-l";}
								if($i>4){break;}
								?>
								<a onclick='detailPopup("<?=$match->id?>");'  class="form-bg <?=$imgClass?>" title="[b]<?=$match->home_score.':'.$match->away_score?>&amp;nbsp;(<?=$match->home_team.' - '.$match->away_team?>)
								<?=$match->startdate?>">&nbsp;</a>
								<?php $i++;} } ?>
									</div>
							   </td>
							</tr>
								<?php endforeach; ?>


														  
														
														
							  </tbody>
							  </table>
							  </div>
							</div>
							
								<!-----Tab Content-5---->
							 <div id="tab-5" style="<?php if($this->uri->segment('4') == 'takimlar' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>" class="fs-table tab-content">
							 
							 <div id="tournament-page-participants" class="fs-table tournament-page-participants">
							 <table>
							 <thead><tr class="league"><td>Takimlar</td></tr></thead>
							 <?php if(!empty($teams)){ $i=0; foreach($teams as $team): $class = ($i%2 ==0 )? "even":"odd" ;?>
							 <tr id="participant_xAO4gBas" class="<?=$class?>">
							  <td><?=$team->pname?> </td>
							 </tr>
							 <?php $i++;endforeach; } ?>
							 </table>
							 </div>
							 
							 
							
							 </div>
							 
							 <div id="tab-6" style="<?php if($this->uri->segment('4') == 'fikstur' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>" class="fs-table tab-content">

								 <?php if(!empty($programMatch)){ ?>
							  <div class="odds-content">
							  <ul class="ifmenu tAB-1">
							  <li class="selected"><strong>Programlar</strong></li>
							  </ul>
							  <div class="ifmenu-border"></div>
							  
							  <div class="table_takim">
							  <table class="soccer od_table_mx programlar_bg">
							  
								<thead class="no-border-bottom" title="">
								   <tr class="league l_1_ljIBgFCg primary-top" title="">
									  <td colspan="1" class="head_aa ">
										 <!--<input type="checkbox" value="" name="">-->
									  </td>
									  <td colspan="3" class="head_ab " title=""> <span class="stats-link link-tables"></span><span class="country left"><span class="left flag flag-<?=strtolower($programMatch[0]->flag)?>" title="<?=$programMatch[0]->country_name?>"></span><span class="name"><span class="tournament_part"><?=$programMatch[0]->league_name?></span></span></span></td>
								   </tr>
								</thead>
								<tbody>
                                    <?php $i = 0;  foreach ($programMatch as $val2): $class = ($i%2 ==0 )? "even":"odd" ;?>
                                    <tr title="<?=$val2->eventname?>"  id="" class="<?=$class?> stage-finished" style="cursor: pointer;">
                                       <td class="cell_ib icons left" title=""></td>
                                       <td class="cell_ad time" ><?=$val2->startdate?> <?=$val2->starttime?></td>
                                       <td class="cell_ab team-home" ><span class="padr"><?=$val2->home_team?></span></td>
                                       <td class="cell_ac team-away" ><span class="padl"><?=$val2->away_team?></span></td>
                                    </tr>
                                    <?php $i++;  endforeach ?>
									<tr><td colspan="4">&nbsp;</td></tr>
                                 	</tbody>
							  </table>
							  </div>							 
                              </div>
							<?php } ?>
							 
							
							 </div>

                        </div>
                
                     </div>
                  </div>
				

                
                     <div id="tc">   
                    <div id="lc">
                    <?php if(!empty($relatedLeagues)){ ?>
					<div class="mbox0px l-brd">
                        <ul class="menu country-list my-leagues">
                           <li class="head">Related Leagues </li>
                           <ul id="my-leagues-list-1" class="menu">

                              <?php $i=0; foreach ($relatedLeagues as $row1) { if($i<9){
                               $URL = $row1->name ;

                                               $countryURI = url_converter12($country_name, "dash", TRUE, $cname) ;
                                    		   $URL = url_converter12($URL, "dash", TRUE, $row1->urlname) ;  //print_r($row1);

                              ?>
                              <li> <span class=" flag  flag-<?=strtolower($flag)?>"></span><a href="<?php echo base_url().$game.'/'.$countryURI.'/'.$URL?>"><?=$row1->name?></a></li>
                              <?php }else{break;} $i++;}								$otherTot = (count($relatedLeagues)-9);							  if($otherTot > 0){							  ?>
                             <li class="show-more">
                                <a href="javascript:void(0)" class="arww_img">
                                <font class="">Other (<?=count($relatedLeagues)-9?>)</font>
                                <span class="more-arrow"></span></a>
                                <ul class="hidden-templates2">
                                 <?php $i=0;  foreach ($relatedLeagues as $row1) { if($i>8){
                                  $URL = $row1->name ;

                                               $countryURI = url_converter12($country_name, "dash", TRUE, $cname) ;
                                    		   $URL = url_converter12($URL, "dash", TRUE, $row1->urlname) ;  //print_r($row1);

                                 ?>
                                 <li> <span class=" flag flag-<?=strtolower($flag)?>"></span><a href="<?php echo base_url().$game.'/'.$countryURI."/".$URL?>"><?=$row1->name?></a></li>
                                 <?php } $i++; } ?>
                                </ul>
                              </li>							  <?php } ?>


                           </ul>
                        </ul>
                     </div>
					 <?php } ?>
                     <div class="spacer10"></div>
                     <div class="mbox0px l-brd">
                         <ul class="menu country-list my-leagues" title="">
                           <li class="head"><span class="toggleMyLeague"></span> Liglerim </li>
                           <ul id="my-leagues-list" class="menu" >
                               <?php  foreach ($leagues as $row) { 
							   $URL = $row->name ;

                                               $countryURI = url_converter12($row->country_name, "dash", TRUE, $row->cname) ;
                                    		   $URL = url_converter12($URL, "dash", TRUE, $row->urlname) ;
							   ?>
                              <li style="display:none;"> <span  class=" flag flag-<?=strtolower($row->flag)?>"></span> <span class="toggleMyLeague active "   ></span><a title="<?php echo ucwords($row->country_name).': '.ucwords($row->name) ?>" href="<?php echo base_url($game.'/').$countryURI.'/'.$URL?>"><?=$row->name?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->

                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>            
    <?php //$this->load->view("futball/sidebar"); ?>            
    <?php $this->load->view("baseball/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>
			   </div>


<?php $this->load->view("common/footer"); ?>

<script> 
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});

function detailPopup(id){
	var link = "<?php echo base_url() .$game. '/match-detail';?>" ;
	var url = link+'/'+id;
	openLeague(url);
}

// if(localStorage.getItem('mygamesList')) {
//    $('.mygamesTab').html(localStorage.getItem('mygamesList'));
// alert("Item Found In localStorage");
// }
// else{
//    alert("Not In localStorage");
// }

$('#clear').click( function() {
window.localStorage.clear();
location.reload();
return false;
});
$(document).ready(function(){

	var total_counter=	$(".counter").length;
	$(".counter").each(function(){
		$(this).html(total_counter);
		total_counter = total_counter - 1;	});
});
/* This function is used to load more matches */
	/*Global varibale to show the match list   */
var displayCounter = 1;
/* calling function to load first two records of matches */
loadMore();		
		function loadMore(){
			/* Checking if the class is exist or not */
			if($(".parent_match_day_"+displayCounter).length > 0){
				$(".parent_match_day_"+displayCounter).removeAttr('style');	
				$(".child_match_day_"+displayCounter).removeAttr('style');
			}
			/* Checking if the class is exist or not */
			if($(".parent_match_day_"+displayCounter).length > 0){
				/* incrementing displayCounter to show next match's */
				displayCounter = displayCounter+1;
				$(".parent_match_day_"+displayCounter).removeAttr('style');
				$(".child_match_day_"+displayCounter).removeAttr('style');
			}
		}
/* This function is used to open tabs view */
		function goTo(path)
		{
			path = path.replace(" ",'-');
			fullpath = "<?=$pathUrl.'/'?>"+path;
			window.location = fullpath;
		}
</script>   


     
   </body>
</html>

