<?php 
$url = base_url().$game.'/iframe/'.url_title($result[0]->country,"dash",TRUE).'/'.url_title($result[0]->stage_name,"dash",TRUE); 
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <title>Uberskor : <?=$result[0]->name?></title>
	  <link rel="icon" href="<?=base_url('assets/images/fv_icn.png')?>" type="image/x-icon">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/mac.css" media="screen">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>countries.css" media="screen">
      <style> 
	  .bold{font-weight: bold;}
         .email_error,.error{
         color:#f00!important;
         font-size: 12px!important;
         text-align: left!important;
         }  
         #lsid-content .user .icon {
         background-image: url(<?php echo base_url().'assets/images/icon-user.png'; ?>) !important; 
         }
      </style>
   </head>
   <body class="v3" >

      <div class="container">

      <div class="adsclear"></div>

      <div id="detail" class="sport-soccer  popup_ft_main" style="margin-top:0px;">
         <div id="detcon">
            <table class="detail">
               <thead>
                  <tr>
                     <th class="header">
                        <div class="fleft">
                           <div class="p-up-inner"><span class="flag sml_flg_bk flag-<?=strtolower($result[0]->flag)?>"></span><?=$result[0]->country?>:</div> <a href="<?php echo base_url($game . '/') . url_title($result[0]->country, "dash", true) . '/' . str_replace('error','.',url_title(str_replace('.','error',$result[0]->stage_name), "dash", true))  ?>"><?=$result[0]->stage_name?></a>
                        </div>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="hclean"></td>
                  </tr>
               </tbody>
            </table>
            <div id="preload-all" class="hidden">
               <div class="preload"><span>Loading ...</span></div>
            </div>
            <div id="content-all" class="">
               <div id="fscon-service-status"></div>
               <table id="flashscore" class="team">
                  <tbody>
                     <tr>
                        <td class="tlogo-home">
                           <div>
                              <div id="tomyteams_1_SKbpVP5K" class="tomyteams">
                                 <span class="toggleMyTeam 1_SKbpVP5K"></span>
                              </div>
                           </div>
                        </td>
                        <td id="flashscore_column">
                           <table>
                              <tbody>
                                 <tr>
                                    <td class="tname-home logo-enable">
									<span class="tname">
									<?php
										$teamAurl = base_url()."/".$game.'/takim/'.$result[0]->home_pid;
									?>
									<!--a href="#" ><?=$result[0]->home_team?></a-->
									<a style="cursor:pointer" onclick=""><?=$result[0]->home_team?></a>
									</span>
									</td>
                                    <td class="current-result"><span class="scoreboard-divider"><?=$result[0]->home_score?> - <?=$result[0]->away_score?></span></td>
                                    <td class="tname-away logo-enable"><span class="tname">
									<?php
										$teamBurl = base_url()."/".$game.'/takim/'.$result[0]->away_pid;
									?>
                                       <a style="cursor:pointer" onclick=""><?=$result[0]->away_team?></a><span style="display: none" class="dw-icon ico">&nbsp;</span></span>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="3" id="utime" class="mstat-date"><?=$result[0]->startdate?> <?=$result[0]->starttime?></td>
                                 </tr>
								 
                                 <tr>
                                    <td colspan="3" class="mstat"><font><?=$result[0]->status_text?></font></td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                        <td class="tlogo-away" title="">
                           <div title="">
                              <div id="tomyteams_1_CjhkPw0k" class="tomyteams"><span class="toggleMyTeam 1_CjhkPw0k"></span></div>
                           </div>
                        </td>
                     </tr>
                     
                  </tbody>
               </table>
               <div id="detail-submenu-bookmark-container" style="display: none;"></div>
               <div id="detail-bookmarks">
                  <div class="pop_listing" style="position: relative;">
                     <ul class="ifmenu ifmu">
                        <li class="selected"><a href="#tab-1">Maç Özeti</a></li>
						<?php if(!empty($teamA_match) || !empty($teamB_match) ) { ?>
                        <li><a href="#tab-3">Maçlar</a></li>
						<?php } if(!empty($home_scope) && !empty($away_scope) ) { ?>
                        <li><a href="#tab-4">Statistic</a></li>
						<?php } if(!empty($home_lineup) && !empty($away_lineup)) { ?>
						<li><a href="#tab-5">Lineup</a></li>
						<?php } ?>
						<li><a href="#tab-6" id="closeIframe" onclick="">Lig</a></li>
                     </ul>
                  </div>
                  <div class="color-spacer"></div>
               </div>
               <!------===== Maç Özeti Main Tab-1=====-------->
               <div id="tab-1" class="tab-content" style=" display:block;">
                  <div id="summary-content">
                     <div id="missing-players-content"></div>
                     <table class="parts match-information">
                        <tbody>
                           <tr class="stage-header">
                              <td class="h-part" colspan="15">Maç Bilgileri</td>
                           </tr>
                           <tr class="even content">
                              <td colspan="15">
                                 Venue: <?=$result[0]->venue_name?>
                              </td>
                           </tr>
						   <tr>
							<tr class="content" style="color:#fff;" >
									  <td colspan="3" class="cell_ib time">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">1</td>
									  <td colspan="1" class="cell_ad time">2</td>
									  <td colspan="1" class="cell_ad time">3</td>
									  <td colspan="1" class="cell_ad time">4</td>
									  <td colspan="1" class="cell_ad time">5</td>
									  <td colspan="1" class="cell_ad time">6</td>
									  <td colspan="1" class="cell_ad time">7</td>
									  <td colspan="1" class="cell_ad time">8</td>
									  <td colspan="1" class="cell_ad time">9</td>
									  <td colspan="1" class="cell_ad time">ESI</td>
									  <td colspan="1" class="cell_ad time">V</td>
									  <td colspan="1" class="cell_ad time">H</td>
                                    </tr>
						   </tr>
						   <tr class="content <?php if($result[0]->home_score > $result[0]->away_score && strpos($result[0]->status_text, 'Finished') !== false){echo 'bold';}?>">
                              <td colspan="3">
                                 <?=$result[0]->home_team?>
                              </td>
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td ><?=$result[0]->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td ><?=$result[0]->home_result[0]->extra_inning?></td>

							  <td ><?=$result[0]->home_result[0]->hits?></td>

							  <td ><?=$result[0]->home_result[0]->errors?></td>

                           </tr>
						   <tr class="even content <?php if($result[0]->away_score > $result[0]->home_score && strpos($result[0]->status_text, 'Finished') !== false){echo 'bold';}?>">
                              <td colspan="3">
                                 <?=$result[0]->away_team?>
                              </td>
							  <?php
								/* this loop is used to print inning score */
								for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
								?>	
								<td ><?=$result[0]->away_result[0]->$tmpvar?></td>
								<?php } //end of loop ?>	
							  <td ><?=$result[0]->away_result[0]->extra_inning?></td>

							  <td ><?=$result[0]->away_result[0]->hits?></td>

							  <td ><?=$result[0]->away_result[0]->errors?></td>
							  
							  
                           </tr>
						   
                        </tbody>
                     </table>
					 
                  </div>
				  
                  
               </div>
               <!------=====Main Tab-1=====------ -->
			   <?php if(!empty($teamA_match) || !empty($teamB_match) ) { ?>
               <!------=====H2H Main Tab-3=====------ -->
               <div id="tab-3" class="tab-content">
					 <div id="tab-h2h-overall" style="display: block;">
					 
					 <table class="head_to_head h2h_home">
						  <colgroup>
							 <col width="1%">
							 <col width="1%">
							 <col width="48%">
							 <col width="48%">
							 <col width="1%">
							 <col width="1%">
						  </colgroup>
						  <thead>
							 <tr>
								<td colspan="6" class="h-part last">Recent encounters Between: <?=$result[0]->home_team?> - <?=$result[0]->away_team?> </td>
							 </tr>
						  </thead>
						  <tbody>
						  <?php foreach($betweenMatch as $bw):?>
							 <tr class="odd highlight">
								<td style="cursor: pointer;"><span class="date"><?=$bw->startdate?></span></td>
								<td class="name <?php if($bw->home_score > $bw->away_score && $bw->home_score != $bw->away_score){echo "bold";} ?>" style="cursor: pointer;"><span><?=$bw->home_team?></span></td>
								<td class="name <?php if($bw->home_score < $bw->away_score && $bw->home_score != $bw->away_score){echo "bold";} ?>" style="cursor: pointer;" >
								<span><?=$bw->away_team?></span></td>
								<td class="" style="cursor: pointer;">
								<span class="score"><strong><?=$bw->home_score?> : <?=$bw->away_score?></strong></span>
								</td>
							 </tr>
						<?php endforeach;?>
						  </tbody>
					</table>
					   <table class="head_to_head h2h_home">
						  <colgroup>
							 <col width="1%">
							 <col width="1%">
							 <col width="48%">
							 <col width="48%">
							 <col width="1%">
							 <col width="1%">
						  </colgroup>
						  <thead>
							 <tr>
								<td colspan="6" class="h-part last">Recent encounters of: <?=$result[0]->home_team?></td>
							 </tr>
						  </thead>
						  <tbody>
						  <?php foreach($teamA_match as $teama):?>
							 <tr class="odd highlight">
								<td style="cursor: pointer;"><span class="date"><?=$teama->startdate?></span></td>
								<td class="name <?php if($teama->home_score > $teama->away_score && $teama->home_score != $teama->away_score){echo "bold";} ?>" style="cursor: pointer;"><span><?=$teama->home_team?></span></td>
								<td class="name <?php if($teama->home_score < $teama->away_score && $teama->home_score != $teama->away_score){echo "bold";} ?>" style="cursor: pointer;" >
								<span><?=$teama->away_team?></span></td>
								<td class="" style="cursor: pointer;">
								<span class="score"><strong><?=$teama->home_score?> : <?=$teama->away_score?></strong></span>
								</td>
							 </tr>
						<?php endforeach;?>
						  </tbody>
					</table>
					<table class="head_to_head h2h_home">
						  <colgroup>
							 <col width="1%">
							 <col width="1%">
							 <col width="48%">
							 <col width="48%">
							 <col width="1%">
							 <col width="1%">
						  </colgroup>
						  <thead>
							 <tr>
								<td colspan="6" class="h-part last">Recent encounters of: <?=$result[0]->away_team?></td>
							 </tr>
						  </thead>
						  <tbody>
						  <?php foreach($teamB_match as $teamb):?>
							 <tr class="odd highlight">
								<td style="cursor: pointer;"><span class="date"><?=$teamb->startdate?></span></td>
								<td class="name <?php if($teamb->home_score > $teamb->away_score && $teamb->home_score != $teamb->away_score){echo "bold";} ?>" style="cursor: pointer;"><span><?=$teamb->home_team?></span></td>
								<td class="name <?php if($teamb->home_score < $teamb->away_score && $teamb->home_score != $teamb->away_score){echo "bold";} ?>" style="cursor: pointer;" >
								<span><?=$teamb->away_team?></span></td>
								<td class="" style="cursor: pointer;">
								<span class="score"><strong><?=$teamb->home_score?> : <?=$teamb->away_score?></strong></span>
								</td>
								<td class="winLose" style="cursor: pointer;">
								<span class="winLoseIcon"><a title="Malubiyet" class="form-bg-last form-l"><span></span></a></span></td>
							 </tr>
						<?php endforeach;?>
						  </tbody>
					</table>
					
					
				  </div>
			   
			   
			   
			   
			   

                  <div class="color-spacer blk-border"></div>

               </div>
               <!------=====H2H Main Tab-3=====-------->
			   <?php } if(!empty($home_scope) && !empty($away_scope) ) { ?>
               <!------=====Statistic Tab-4=====-------->
               <div id="tab-4" class="tab-content">
					<div  style=" display:block;">
						 <div id="tab-statistics-0-statistic">
						 
						 <?php if(!empty($home_scope)){ ?>
							<table class="parts">
								<?php $class='';$i=1;$j=0; foreach($home_scope as $hstatistic): 
									$case = ($i%2);
									switch($case){
										case 0:
											$class = "even";
											break;
										default :
											$class = "odd";										
											break;
									}
								?>
								   <tr class="<?=$class?>">
								   
									   <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
									   <div style="float: left;"><?=$hstatistic->value?></div>
									   <div class="grb_bxd">
									   <div class="grb_bxd2" style="width: <?=$hstatistic->value?>%;"></div>
									   </div>
									   </td>
									  
									   <td class="score stats" style="border-top: 0px;"><?=$hstatistic->description?></td>
									   
									   <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
									   <div class="grb_bxd" style="width: 82%;float:left;">
									   <div class="grb_bxd2 blck" style="width: <?=$away_scope[$j]->value?>%;float:left;"></div>
									   </div>
									   <div style="float: right;"><?=$away_scope[$j]->value?></div>
									   </td>
									   
								   </tr>
								<?php $i++;$j++; endforeach; ?>
							</table>
						 <?php } ?>
						 
						   </div> 
						 </div>
						 
               </div>
			   <!-- Statistic tab ends-->
			   <?php } if(!empty($home_lineup) && !empty($away_lineup)) { ?>
	           <div id="tab-5" class="tab-content">

				
						  <!----==Bottom Table html===------>
							<table class="parts">		  
								<tr>
									 <td colspan="2" class="h-part">Vurucular</td>
								</tr>
							</table>
									  
									  
							<table class="parts" style="width:50%; float:left;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->lineup_typeFK ==12){?>
								  <tr class="<?=$class?>">
									 <td class="summary-vertical fl">
										<div class="time-box"><?=$team1->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team1->name?></a></div>
									 </td> 
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; } } ?> 
							   </tbody>
							</table>

							<table class="parts" style="width:50%;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($away_lineup as $team2){ if ($team2->lineup_typeFK ==12) { ?>
								<tr class="<?=$class?>">
									 <td class="summary-vertical fr">
										<div class="time-box"><?=$team2->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team2->name?></a></div>
									 </td>
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; }} ?> 
							   </tbody>
							</table>
						

						
							<table class="parts">		  
									<tr>
									 <td colspan="2" class="h-part">Atıcılar</td>
									</tr>
							</table>	
							<table class="parts" style="width:50%; float:left;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->lineup_typeFK ==11){?>
								  <tr class="<?=$class?>">
									 <td class="summary-vertical fl">
										<div class="time-box"><?=$team1->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team1->name?></a></div>
									 </td> 
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; } } ?> 
							   </tbody>
							</table>

							<table class="parts" style="width:50%;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($away_lineup as $team2){ if ($team2->lineup_typeFK ==11) { ?>
								<tr class="<?=$class?>">
									 <td class="summary-vertical fr">
										<div class="time-box"><?=$team2->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team2->name?></a></div>
									 </td>
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; }} ?> 
							   </tbody>
							</table>


				<!----==/Bottom Table html===------>
               </div>
			   <?php } ?>
               <!------=====Maçlar Main Tab-3=====-------->
            </div>
            <div id="winclose">
               <div id="sync-indicator" ondblclick="sync_change()"><span class="nosync" title="Sync Offline"></span></div>
               <a href="#" onclick="window.close();">Pencereyi kapat</a>
            </div>
         </div>
      </div>

<?php $d["url"]=$url;$this->load->view("common/popup_common",$d);?>	  


   </body>
</html>