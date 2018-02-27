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

?>

<?php $this->load->view("common/header"); ?>

<style>    #def-form-table td input, textarea { padding: 4px 4px; margin-bottom: 8px;border-radius: 2px; }    #def-form-table td textarea {resize: none; }    #def-form-table td select  { width:159px;padding: 4px 4px;margin-bottom: 8px;border-radius: 2px;}
   .soccer #header > .content {
    background-image: url(<?php echo base_url().'uploads/banners/'.$top_banner; ?>) !important; 
    background-repeat: no-repeat;

}

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
      }	  .cursor{cursor: pointer;}	  .darkbg{background:#cacaca!important;}
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
               <div id="menu" class="menu-top">
              <span class="toggle_img"><img src="<?php echo base_url().'assets/images/show-menu-icon.png';?>" alt=""></span>
               <?php $this->load->view("common/topmenu")?>
                  <div class="menu-border"></div>
               </div>
            </div>
         </div>
         <div class="content">
            <div id="main">
               <div id="rc-top">
                  <div id="rccontent">
                    
               <!-----Google Add iframe------>
               <img src="<?php echo base_url().'uploads/banners/'.$right_banner;?>" alt="Right Banner" style="width:161px; height:500px;" >
                    
                    
                  </div>
               </div>
               <div id="tc">
			   
                 <div id="mc" class="sport_page">  
				   <h2 class="tournament">
				   <?=$tlist[0]->sport_name?> »
				    <a href="#"><?=$tlist[0]->country_name?>  </a> »  <a href="#"> <?=$tlist[0]->league_name?> </a> » <?=$tlist[0]->tournament_name?>
				   </h2>
				   
				   
				   <div class="team-header">
					<div class="team-logo" style=""></div>
					
					<div class="team-name"><?=$tlist[0]->league_name?></div>
				   </div>
				  
                  
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
						<?php
							$pathUrl = base_url().$game.'/'.$this->uri->segment('2').'/'.$this->uri->segment('3');
						?>
                           <ul class="ifmenu live-menu">
                              <li class="<?php if($this->uri->segment('4') == '' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="window.location = '<?=$pathUrl?>'">Genel</a></li>
                              <li class="<?php if($this->uri->segment('4') == 'sonuclar' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('sonuclar')" >Sonuçlar</a></li>
                              <li class="<?php if($this->uri->segment('4') == 'puan-durumu' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('puan durumu')">Puan Durumu</a></li>
							  <li class="<?php if($this->uri->segment('4') == 'takimlar' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('takimlar')">Takımlar</a></li>
                           </ul>
						   
                           <div class="fs-table tab-content" style="<?php if($this->uri->segment('4') == '' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>">
								
                              <div class="odds-content">
            							  <ul class="ifmenu tAB-1">
            							  <li class="selected"><strong>Son Skorlar</strong></li>
            							  </ul>
            							  <div class="ifmenu-border"></div>
            							  <?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
            							  <div class="table_takim">
												  <table class="soccer od_table_mx">
												  <thead class="no-border-bottom">
													   <tr class="league l_1_ljIBgFCg primary-top">
														  <td colspan="1" class="head_aa "></td>
														  <td colspan="4" class="head_ab "> 
														  <span class="stats-link link-tables"><span class="stats" title="Puan Durumu"><a href="javascript:void(0)" onclick="goTo('puan durumu')">Puan Durumu</a></span></span>
														  <span class="country left">
														  <span class="flag fl_81 left" title="Almanya"></span>
														  <span class="name"><span class="country_part"><?=$list[0]->country_name?>: </span>
														  <span class="tournament_part"><?=$list[0]->league_name?></span></span></span>
														  <span class="toggleMyLeague active 1_81_W6BOzpK2"></span></td>
													   </tr>
												  </thead>							  

													<tbody>
													<?php $i = 0;$j = 1; $diff_month = ''; foreach ($list as $val): $class = ($i%2 ==0 )? "even":"odd" ;?>
													<?php if($diff_month != $val->diff_month || $diff_month == ''){ ?>
													<tr class="event_round darkbg parent_match_day_<?=$j?>" style="display:none;"  >
													   <td colspan="5" style="text-align:left"><span id="counter_<?=$i?>" class="counter"></span>. Maç Günü</td>
													</tr>
													<?php $j++; } ?>
													<tr id="g_1_ENxpnY1b" class="<?=$class?> stage-finished cursor child_match_day_<?=($j-1)?>" style="display:none;" >
													   <td class="cell_ib icons left" title=""></td>
													   <td class="cell_ad time" title="Karşılaşmanın detayları için tıklayınız!"><?=$val->startdate?> <?=$val->starttime?></td>
													   <td class="cell_ab team-home <?php if($val->home_score > $val->away_score){echo "bold";} ?>" title="Karşılaşmanın detayları için tıklayınız!"><span class="padr"><?=$val->home_team?></span></td>
													   <td class="cell_ac team-away <?php if($val->home_score < $val->away_score){echo "bold";} ?>" title="Karşılaşmanın detayları için tıklayınız!"><span class="padl"><?=$val->away_team?></span></td>
													   <td class="cell_sa score  bold" title=""><?=$val->home_score?>&nbsp;:&nbsp;<?=$val->away_score?></td>
													</tr>
													<?php $i++; $diff_month = $val->diff_month;  endforeach ?>
													<tr class="event_round" style="background:#cacaca!important;" >
													<td colspan="5" style="text-align:center:"><a href="<?=$pathUrl.'/sonuclar'?>" style="color:#fff!important;" onclick="">Daha fazla karşılaşma göster</a></td>  
													</tr>
													</tbody>  
												  </table>
            							  </div>
										  <?php } ?>										  
                              </div>
							  
							
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
									  <td colspan="3" class="head_ab " title=""> <span class="stats-link link-tables"><span class="stats" title="Puan Durumu">Puan Durumu</span></span><span class="country left"><span class="flag fl_81 left" title="<?=$programMatch[0]->country?>"></span><span class="name"><span class="country_part"><?=$programMatch[0]->country?>: </span><span class="tournament_part"><?=$programMatch[0]->league_name?></span></span></span><span class="toggleMyLeague active 1_81_W6BOzpK2" title="Bu ligi Liglerimden çıkar!" data-label-key="1_81_W6BOzpK2" onclick="cjs.myLeagues.toggleTop('1_81_W6BOzpK2', event); return false;"></span></td>
								   </tr>
								</thead>
								<tbody>
                                    <?php $i = 0; $date_diff = ''; foreach ($programMatch as $val2): $class = ($i%2 ==0 )? "even":"odd" ;?>
                                    <tr id="g_1_ENxpnY1b" class="<?=$class?> stage-finished" style="cursor: pointer;">
                                       <td class="cell_ib icons left" title=""></td>
                                       <td class="cell_ad time" title="Karşılaşmanın detayları için tıklayınız!"><?=$val2->startdate?> <?=$val2->starttime?></td>
                                       <td class="cell_ab team-home" title="Karşılaşmanın detayları için tıklayınız!"><span class="padr"><?=$val2->home_team?></span></td>
                                       <td class="cell_ac team-away" title="Karşılaşmanın detayları için tıklayınız!"><span class="padl"><?=$val2->away_team?></span></td>
                                    </tr>
                                    <?php $i++; $date_diff = $val2->date_diff; endforeach ?>
									<tr><td colspan="4">&nbsp;</td></tr>
                                 	</tbody>
							  </table>
							  </div>							 
                              </div>
							<?php } ?>
							  
							  <!--------======Tabing CSS=======------- -->
						<!--  <div class="odds-content">
							  <ul class="ifmenu live-menu2">
                              <li class="selected"><a href="#tab-001">Score Status</a></li>
                              <li><a href="#tab-002">Form</a></li>					  
                              <li><a href="#tab-003">Up down</a></li>
                              <li><a href="#tab-004">HR / MS</a></li>
							  <li><a href="#tab-005">Goal Kingdom</a></li>
                           </ul>
							 
							  <div class="ifmenu-border"></div>
							  
							  
							   <div id="tab-01" class="fs-table tab-content1" style=" display:block;">
							   
							   
							   
							   <ul class="ifmenu live-menu3">
							   <li id="tabitem-table-overall" class="li0 first selected">
								<span><a href="#tab-001"><font><font>All</font></font></a></span>
							</li>
							<li id="tabitem-table-home" class="li1">
								<span><a href="#tab-002"><font><font class="">Home</font></font></a></span>
							</li>
							<li id="tabitem-table-away" class="li2 last">
								<span><a href="#tab-003"><font><font>Outside</font></font></a></span>
							</li>
							</ul>
							   
							    <div id="tab-001" class="fs-table tab-content2" style=" display:block;">
							  
							  </div>
							  
							  <div id="tab-002" class="fs-table tab-content2">
							  Tab-2
							  </div>
							  
							  <div id="tab-003" class="fs-table tab-content2">
							  Tab-3
							  </div>
							  
                              </div>
							  
							 
							   <div id="tab-02" class="fs-table tab-content1">
							   Form
							   </div>
							   
							  
							   <div id="tab-03" class="fs-table tab-content1">
							   Up down
							   </div>
							   
							  
							   <div id="tab-04" class="fs-table tab-content1">
							   HR / MS
							   </div>
							   
							   
							   <div id="tab-05" class="fs-table tab-content1">
							   Goal Kingdom
							   </div>



							  
                              </div> -->
							  
							  
							  
                           </div>
						   
						   <!-----Tab Content-2---->
						    <div id="tab-2"  style="<?php if($this->uri->segment('4') == 'sonuclar' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>"  class="fs-table tab-content">
							 <!-- 
							 <table class="soccer od_table_mx">
							   <tbody>
							   <tr class="league l_1_v103vjOF primary-top">
							   <td colspan="1" class="head_aa "></td>
							   <td colspan="6" class="head_ab "> 
							   <span class="stats-link link-draw">
							   <span class="stats-draw" title="Eşleşmeler">Eşleşmeler</span>
							   </span>
							   <span class="country left">
							   <span class="flag fl_6 left" title="Avrupa"></span>
							   <span class="name">
							   <span class="country_part">AVRUPA: </span>
							   <span class="tournament_part" style="cursor: inherit; text-decoration: inherit;">Şampiyonlar Ligi - Playofflar</span></span></span>
							   <span class="toggleMyLeague active 1_6_xGrwqq16"></span>
							   </td>
							   </tr>
							   </tbody>
							 </table> -->
							 <?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
								<div class="table_takim">
									  <table class="soccer od_table_mx">
									  <thead class="no-border-bottom">
										   <tr class="league l_1_ljIBgFCg primary-top">
											  <td colspan="1" class="head_aa "></td>
											  <td colspan="4" class="head_ab "> 
											  <span class="stats-link link-tables"><span class="stats" title="Puan Durumu">Puan Durumu</span></span>
											  <span class="country left">
											  <span class="flag fl_81 left" title="Almanya"></span>
											  <span class="name"><span class="country_part"><?=$list[0]->country_name?>: </span>
											  <span class="tournament_part"><?=$list[0]->league_name?></span></span></span>
											  <span class="toggleMyLeague active 1_81_W6BOzpK2"></span></td>
										   </tr>
									  </thead>							  
										<tbody>
										<?php $i = 0;$j = 1; $diff_month = ''; foreach ($list as $val): $class = ($i%2 ==0 )? "even":"odd" ;?>
										<?php if($diff_month != $val->diff_month || $diff_month == ''){ ?>
										<tr class="event_round darkbg parent_match_day_<?=$j?>" style="display:none;"  >
										   <td colspan="5" style="text-align:left"><span id="counter_<?=$i?>" class="counter"></span>. Maç Günü</td>
										</tr>
										<?php $j++; } ?>
										<tr id="g_1_ENxpnY1b" class="<?=$class?> stage-finished cursor child_match_day_<?=($j-1)?>" style="display:none;" >
										   <td class="cell_ib icons left" title=""></td>
										   <td class="cell_ad time" title="Karşılaşmanın detayları için tıklayınız!"><?=$val->startdate?> <?=$val->starttime?></td>
										   <td class="cell_ab team-home <?php if($val->home_score > $val->away_score){echo "bold";} ?>" title="Karşılaşmanın detayları için tıklayınız!"><span class="padr"><?=$val->home_team?></span></td>
										   <td class="cell_ac team-away <?php if($val->home_score < $val->away_score){echo "bold";} ?>" title="Karşılaşmanın detayları için tıklayınız!"><span class="padl"><?=$val->away_team?></span></td>
										   <td class="cell_sa score  bold" title="Karşılaşmanın detayları için tıklayınız!"><?=$val->home_score?>&nbsp;:&nbsp;<?=$val->away_score?></td>
										</tr>
										<?php $i++; $diff_month = $val->diff_month;  endforeach ?>
										<tr class="event_round" style="background:#cacaca!important;" >
										<td colspan="5" style="text-align:center:"><a href="javascript:void(0)" style="color:#fff!important;" onclick="loadMore()">Daha fazla karşılaşma göster</a></td>  
										</tr>
										</tbody>  
									  </table>
            					</div>
								<?php } ?>
							</div>
							
							
							<!-----Tab Content-4---->
							 <div id="tab-4"  style="<?php if($this->uri->segment('4') == 'puan-durumu' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>" class="fs-table tab-content">
							   <?php if(empty($league_standing)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
								<div class="table_takim">
							  <table class="soccer od_table_mx programlar_bg tble_ntert" style="border-top:1px solid #ccc;">
							  
							  <thead style=" background:#000;">
							   <tr class="main">
								  <th class="rank col_rank gTableSort-switch" title="Rank"><a href="#" class="gTableSort-asc gTableSort-on"><span class="txt">#</span><span class="arrow"></span></a></th>
								  
								  <th class="participant_name col_name gTableSort-switch" title="Takım"><a href="#" class="gTableSort-off"><span class="txt">Takım</span><span class="arrow"></span></a></th>
								  
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
							   <td class="rank col_rank no q1 col_sorted" title="Kupaya katılım - Şampiyonlar Ligi (Grup Aşaması)"><?=$lst->rank?>.</td>
							   
							   <td class="participant_name col_participant_name col_name" title=""><span class="team-logo team-logo-258" style="background: transparent url(images/m-ljIBgFCg-OQGDrVDa.png) 0 0px no-repeat"></span><span class="team_name_span" style="width: 266px;"><a ><?=$lst->name?></a></span><span title="Katılmayı garantiledi: Şampiyonlar Ligi (Grup Aşaması)" class="dw-icon ico">&nbsp;</span></td>
							   
							   
							   <td class="matches_played col_matches_played"><?=$lst->played?></td>
							   <td class="wins col_wins"><?=$lst->wins?></td>
							   <td class="draws col_draws"><?=$lst->draws?></td>
							   <td class="losses col_losses"><?=$lst->defeits?></td>
							   <td class="goals col_goals"><?=$lst->goalsfor?>:<?=$lst->goalsagainst?></td>
							   <td class="goals col_goals"><?=$lst->points?></td>
							   <td class="form col_form">
								  <div class="matches-5 ">
									<a class="form-bg form-s" title="[b]Sonraki maçı:[/b]
									 Wolfsburg - Bayern
									 29.04.2017">&nbsp;</a>
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
										  <?php } ?> 
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
							 

                        </div>
                
                     </div>
                  </div>
				
 
                
  
                  <div id="lc">
                    <?php if(!empty($relatedLeagues)){ ?>
					<div class="mbox0px l-brd">
                        <ul class="menu country-list my-leagues">
                           <li class="head">Related Leagues </li>
                           <ul id="my-leagues-list" class="menu">
                      
                              <?php $i=0; foreach ($relatedLeagues as $row1) { if($i<9){ ?>
                              <li><span class="toggleMyLeague active "   ></span> <a href="<?php echo base_url().$game.'/'.str_replace(" ","-",strtolower($row1->country_name))."/".str_replace(" ","-",strtolower($row1->name))?>"><?=$row1->name?></a></li>
                              <?php }else{break;} $i++;}								$otherTot = (count($relatedLeagues)-9);							  if($otherTot > 0){							  ?>
                             <li class="show-more">
                                <a href="javascript:void(0)" class="arww_img">
                                <font class="">Other (<?=count($relatedLeagues)-9?>)</font>
                                <span class="more-arrow"></span></a>
                                <ul class="hidden-templates2">
                                 <?php $i=0;  foreach ($relatedLeagues as $row1) { if($i>8){ ?>
                                 <li><a href="<?php echo base_url().$game.'/'.str_replace(" ","-",strtolower($row1->country_name))."/".str_replace(" ","-",strtolower($row1->name))?>"><?=$row1->name?></a></li>
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
                           <li class="head">Liglerim </li>
                           <ul id="my-leagues-list" class="menu" >
                              <?php  foreach ($leagues as $row) { ?>
                              <li><a href="<?php echo base_url().$game.'/'.str_replace(" ","-",strtolower($row->country_name))."/".str_replace(" ","-",strtolower($row->name))?>"><?=$row->name?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->
                       
                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>              
    <?php $this->load->view("common/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>


<?php $this->load->view("common/footer"); ?>

<script> 
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});

// function for detais pop
function detailPopup(id){
   var link = "<?php echo base_url().$game.'/matchDetail';?>" ;
   var url = link+'/'+id;
   
   // console.log(url);
   window.open(url,'_blank',width=400,height=200);
}

function mygames(id) {

   var newid = id.split(',');   
   var ParentId = newid[1];
   var arra = newid[0].split('_');
   var atr = arra[0];
   var pid = arra[1];
   var atrparent = "#parent_"+pid; 
   var atrP_child = ".parent_"+pid;  
   var atrchild = ".child_"+pid;
   if(atr == "parent"){
      if($(atrparent). prop("checked")  == true){               
         $(atrP_child).each(function(){ 
         this.checked = true;
         });
      }
      if($(atrparent). prop("checked")  == false){ 
         $(atrP_child).each(function(){ 
         this.checked = false;
         });
      }
   }
   if(atr == "child"){ 
      if($(atrchild).prop("checked")  == true){ 
         $("#parent_"+ParentId)[0].checked = true;   
      }
      if($(atrchild). prop("checked")  == false){ 
         if ($(atrP_child+":checked").length > 0) {}
         else{
            $("#parent_"+ParentId)[0].checked = false;       
         }
      }      
   }
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

