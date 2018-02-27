<?php 
$url = base_url().$game.'/iframe/'.url_title($result[0]->country,"dash",TRUE).'/'.url_title($result[0]->stage_name,"dash",TRUE).'/puan-durumu'; 		
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
         background-image: url(<?php echo base_url().'assets/images/icon-user.png'; ?>) !important; }
		 .container { width:100% !important;}
		 .detail tr th .fleft a {margin-top: 0px;}
      </style> 

   </head>
   <body class="v3" >

      <div class="container">

      <div class="adsclear"></div>

      <div id="detail" class="sport-soccer popup_ft_main" style="margin-top:0px;">
         <div id="detcon" style="padding-top:5px;"> 
            <table class="detail pop_flg">
               <thead>
                  <tr>
                     <th class="header">
                        <div class="fleft">
						
                           <div class="p-up-inner"><span class="flag sml_flg_bk flag-<?=strtolower($result[0]->flag)?>" ></span><?=$result[0]->country?>:</div> <a href="<?php echo base_url($game . '/') . url_title($result[0]->country, "dash", true) . '/' . str_replace('error','.',url_title(str_replace('.','error',$result[0]->stage_name), "dash", true))  ?>"><?=$result[0]->stage_name?></a>
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
					 <?php
										$teamAurl = base_url()."/".$game.'/takim/'.$result[0]->home_id;
									?>
									<!--a href="#" ><?=$result[0]->home_team?></a-->
                        <td class="tlogo-home">
                           <div>
                             <?php if(!empty($result[0]->home_image)){ ?>
                              <a style="cursor:pointer" onclick="openTeams('<?=$teamAurl?>')">
											<img src="data:image/png;base64, <?=$result[0]->home_image?>" alt="Red dot" />
										</a>
						   <?php } ?>
                           </div>
                        </td>
                        <td id="flashscore_column">
                           <table>
                              <tbody>
                                 <tr>
                                    <td class="tname-home logo-enable">
									<span class="tname">
									
									<a style="cursor:pointer" onclick="openTeams('<?=$teamAurl?>')"><?=$result[0]->home_team?>
									 <span class="pop-star"> <img src="<?php echo base_url() . 'assets/images/pop-star-dr.png'; ?>" alt=""></span>
									</a>
									
									</span>
									</td>
                                    <td class="current-result"><span class="scoreboard-divider"><?=$result[0]->home_score?> - <?=$result[0]->away_score?></span></td>
                                    <td class="tname-away logo-enable"><span class="tname">
									<?php
										$teamBurl = base_url()."/".$game.'/takim/'.$result[0]->away_id;
									?>
                                       <a style="cursor:pointer" onclick="openTeams('<?=$teamBurl?>')"><?=$result[0]->away_team?>
									   <span class="pop-star"> <img src="<?php echo base_url() . 'assets/images/pop-star-lt.png'; ?>" alt=""></span>
									   </a><span style="display: none" class="dw-icon ico">&nbsp;</span></span>
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
                              <?php if(!empty($result[0]->away_image)){ ?>                             
							 <a style="cursor:pointer" onclick="openTeams('<?=$teamBurl?>')">   
												<img src="data:image/png;base64, <?=$result[0]->away_image?>" alt="Red dot" /> 
											</a>
							<?php } ?>	
                           </div>
                        </td>
                     </tr>
                     
                  </tbody>
               </table>
               <div id="detail-submenu-bookmark-container" style="display: none;"></div>
               <div id="detail-bookmarks">
                  <div class="pop_listing" style="position: relative;">
				  <div class="top_nav-mb">
							<span class="selected-mob">All</span>
                     <ul class="ifmenu ifmu">
                        <li class="selected" style="background-color:#016700;" ><a href="#tab-1">Maç Özeti</a></li>
						<?php if(!empty($teamA_match) || !empty($teamB_match) ) { ?>
                        <li><a href="#tab-3">Maçlar</a></li>
						<?php } if(!empty($home_statistic) && !empty($away_statistic) ) { ?>
                        <li><a href="#tab-4">Statistic</a></li>
						<?php } if(!empty($home_lineup) && !empty($away_lineup)) { ?>
						<li><a href="#tab-5">Lineup</a></li>
						<?php } ?>
						<li><a href="#tab-6" id="closeIframe" onclick="">Lig</a></li>
                    </ul>
					
					</div>
					
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
                              <td class="h-part">Maç Bilgileri</td>
                           </tr>
                           <tr class="content">
                              <td>
                                 Venue: <?=$result[0]->venue_name?>
                              </td>
                           </tr>
                        </tbody>
                     </table>
					 
					 <?php if(!empty($incident)){ ?>
					 <table id="parts" class="parts-first vertical pop_tables olaylar_main">
                           <tr class="stage-header stage-12">
                              <td colspan="3" class="h-part">Olaylar</td>
                           </tr>
                           <?php $count=1; foreach ($incident as $val) {
							$class = ($val->number == 1)?"even":"odd";    ?>
                           <tr class="<?=$class?>">
                              <td class="summary-vertical fl">
								
								 <?php if ($val->number == 1){ ?> 
                                 <div class="wrapper">
                                    <div class="time-box"><?=$val->elapsed1?></div>
                                    <span class="participant-name"><a href="javascript:void(0);"><?=$val->pname1?>.</a></span>
                                    
                                 </div>
								 <?php }else{ ?>
								 <div class="wrapper">&nbsp;</div>
								 <?php } ?>
                              </td>
								<?php if($count == 1){ ?>
								  <td class="score" rowspan="<?php echo count($incident);?>">
									 <span class="p1_home"><?=$result[0]->home_score?></span>
									 - <span class="p1_away"><?=$result[0]->away_score?></span>
								  </td>
								<?php $count=0; } ?>
								
                              <td class="summary-vertical fr">
                                 <?php if ($val->number == 1){ ?> 
								 <div class="wrapper">&nbsp;</div>
								 <?php } else{?>
								 <div class="wrapper">
                                    <div class="time-box"><?=$val->elapsed2?></div>
                                    <span class="participant-name">&nbsp;<a href="javascript:void(0);"><?=$val->pname2?>.</a></span>
                                 </div>
								 <?php } ?>
                              </td>
                           </tr>
						   <?php } ?>
                        </table>
					 <?php } ?>
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
							 </tr>
						<?php endforeach;?>
						  </tbody>
					</table>
					
					
				  </div>
			   
			   
			   
			   
			   

                  <div class="color-spacer blk-border"></div>

               </div>
               <!------=====H2H Main Tab-3=====-------->
			   <?php } if(!empty($home_statistic) && !empty($away_statistic) ) { ?>
               <!------=====Statistic Tab-4=====-------->
               <div id="tab-4" class="tab-content">
					<div  style=" display:block;">
						 <div id="tab-statistics-0-statistic">
						 
						 <?php if(!empty($home_statistic)){ ?>
							<table class="parts">
								<?php $class='';$i=1;$j=0; foreach($home_statistic as $hstatistic): 
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
									  
									   <td class="score stats" style="border-top: 0px;"><?=$hstatistic->standing_type?></td>
									   
									   <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
									   <div class="grb_bxd" style="width: 82%;float:left;">
									   <div class="grb_bxd2 blck" style="width: <?=$away_statistic[$j]->value?>%;float:left;"></div>
									   </div>
									   <div style="float: right;"><?=$away_statistic[$j]->value?></div>
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
						<?php if(count($home_lineup) > 1 && count($away_lineup) > 1){ ?>
						<!---======Map table layout=====--->
						<div class="field" data-type="lineup-field">
						   <div class="home-info" data-type="home-info">
							  <div class="name" data-type="team"><?=$result[0]->home_team?></div>
							  <div class="formation" data-type="formation"><?=$result[0]->home_formation?></div>
						   </div>
						   <div class="field-wrap">
							  <div class="corners">
								 <div></div>
								 <div></div>
								 <div></div>
								 <div></div>
							  </div>
							  <div class="middle"></div>
							  <div class="circle"></div>
							  <div class="center"></div>
							  <div class="goal-box">
								 <div></div>
								 <div></div>
								 <div></div>
							  </div>
							  <div class="goal-box goal-box-right">
								 <div></div>
								 <div></div>
								 <div></div>
							  </div>
							  <!-- home team start -->
							  <div class="home">
								 <div class="players-row">
									<ul class="item">
									<?php
									/* this function is used to get home keeper  */
										$homek = array_values(array_filter(array_map(function($val){
											if($val->lineup_typeFK == 1){
											return  $val;
											}
										},array_values($home_lineup))));
									?>
									   <li>
										  <div class="player"> 
										  <img src="<?=base_url('assets/images/dress-yellow.gif')?>" alt="">
										  <span class="number"><?=$homek[0]->shirt_number?></span> 
										  </div>
										  <div class="name">
										  <span class=""><?=$homek[0]->name?></span>
										  </div>
									   </li>
									</ul>
								 </div>
								 <?php
						/* This function is used to show lineup on fields according to the position and type of player  */
								function getPosition($lineup,$lineup_type,$min,$max){
									$tmp = array_values(array_filter(array_map(function($val) use($lineup_type,$min,$max){
											if($val->lineup_typeFK == $lineup_type && $val->pos >= $min && $val->pos <= $max){
												return  $val;
											}
										},array_values($lineup))));
									return $tmp ;
								}	
									/*home Defender type start */
											$HDefender_def = getPosition($home_lineup,2,21,29);
											$HDefender1 = getPosition($home_lineup,2,31,39);
											$HDefender2 = getPosition($home_lineup,2,41,49); 
											$HDefender_offe = getPosition($home_lineup,2,51,59);
									
									/* home Midfield type start */
											$HMidfield_def = getPosition($home_lineup,3,61,69);
											$HMidfield1 = getPosition($home_lineup,3,71,79);
											$HMidfield2 = getPosition($home_lineup,3,81,89);
											$HMidfield_offe = getPosition($home_lineup,3,91,99);
									/* home Offensive type start */
											$HOffense1 = getPosition($home_lineup,4,101,109);
											$HOffense2 = getPosition($home_lineup,4,111,119);
									
								 ?>
								 <!--  row for home defense players-->
								 <?php if(!empty($HDefender_def)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HDefender_def as $HDefender_def): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HDefender_def->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HDefender_def->name?></span></div>
									   </li>
									   <?php   endforeach; ?>
									</ul>
								 </div>
								 <?php } ?>
								 <?php if(!empty($HDefender1)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HDefender1 as $HDefender1): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HDefender1->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HDefender1->name?></span></div>
									   </li>
									   <?php   endforeach; ?>
									</ul>
								 </div>
								 <?php } ?>
								 <?php if(!empty($HDefender2)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HDefender2 as $HDefender2): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HDefender2->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HDefender2->name?></span></div>
									   </li>
									   <?php   endforeach; ?>
									</ul>
								 </div>
								 <?php } ?>
								 <?php if(!empty($HDefender_offe)){ ?>
								 <div class="players-row" data-type="player-row" >
									<ul class="item">
									   <?php foreach($HDefender_offe as $HDefender_offe): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HDefender_offe->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HDefender_offe->name?></span></div>
									   </li>
									   <?php   endforeach; ?>
									</ul>
								 </div>
								 <?php } ?>
								 <!--  row for home midfield players-->
								 <?php if(!empty($HMidfield_def)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HMidfield_def as $HMidfield_def): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HMidfield_def->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HMidfield_def->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								<?php if(!empty($HMidfield1)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HMidfield1 as $HMidfield1): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HMidfield1->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HMidfield1->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								<?php if(!empty($HMidfield2)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HMidfield2 as $HMidfield2): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HMidfield2->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HMidfield2->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								<?php if(!empty($HMidfield_offe)){ ?>
								 <div class="players-row" data-type="player-row" >
									<ul class="item">
									   <?php foreach($HMidfield_offe as $HMidfield_offe): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HMidfield_offe->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HMidfield_offe->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								<!-- offensive home type start -->
								<?php if(!empty($HOffense1)){ ?>
								 <div class="players-row" data-type="player-row" >
									<ul class="item">
									   <?php foreach($HOffense1 as $HOffense1): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HOffense1->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HOffense1->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								<?php if(!empty($HOffense2)){ ?>
								 <div class="players-row" data-type="player-row" >
									<ul class="item">
									   <?php foreach($HOffense2 as $HOffense2): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-white.gif')?>" alt="">
										  <span class="number"><?=$HOffense2->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HOffense2->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								
							  </div>
							  <!-- home team end -->
							  
<!-- ========================================================================================================================== -->

							  <!-- away team start -->
							  <div class="away">
							  
							  <?php 
							  
								$AOffense2 = getPosition($away_lineup,4,111,119);
								$AOffense1 = getPosition($away_lineup,4,101,109);
								$AMidfield_offe = getPosition($away_lineup,3,91,99);
								$AMidfield2 = getPosition($away_lineup,3,81,89);
								$AMidfield1 = getPosition($away_lineup,3,71,79);
								$AMidfield_def = getPosition($away_lineup,3,61,69);
								$ADefender_offe = getPosition($away_lineup,2,51,59);
								$ADefender2 = getPosition($away_lineup,2,41,49);
								$ADefender1 = getPosition($away_lineup,2,31,39);
								$HDefender_def = getPosition($away_lineup,2,21,29);
								
							  ?>
								 <?php if(!empty($AOffense2)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($AOffense2 as $AOffense2): ?>
									   <li>
										  <div class="player">
										  <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$AOffense2->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$AOffense2->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($AOffense1)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($AOffense1 as $AOffense1): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$AOffense1->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$AOffense1->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($AMidfield_offe)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($AMidfield_offe as $AMidfield_offe): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$AMidfield_offe->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$AMidfield_offe->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($AMidfield2)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($AMidfield2 as $AMidfield2): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$AMidfield2->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$AMidfield2->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($AMidfield1)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($AMidfield1 as $AMidfield1): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$AMidfield1->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$AMidfield1->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($AMidfield_def)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($AMidfield_def as $AMidfield_def): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$AMidfield_def->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$AMidfield_def->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($ADefender_offe)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($ADefender_offe as $ADefender_offe): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$ADefender_offe->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$ADefender_offe->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($ADefender2)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($ADefender2 as $ADefender2): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$ADefender2->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$ADefender2->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($ADefender1)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($ADefender1 as $ADefender1): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$ADefender1->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$ADefender1->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								
								<?php if(!empty($HDefender_def)){ ?>
								 <div class="players-row" data-type="player-row">
									<ul class="item">
									   <?php foreach($HDefender_def as $HDefender_def): ?>
									   <li>
										  <div class="player">
										   <img src="<?=base_url('assets/images/dress-blue.gif')?>" alt="">
										  <span class="number"><?=$HDefender_def->shirt_number?></span>  </div>
										  <div class="name">
										  <span class="hidden-xxs"><?=$HDefender_def->name?></span></div>
									   </li>
									   <?php endforeach; ?>
									</ul>
								 </div>
								<?php } ?>
								 
								 
								 <div class="players-row">
									<ul class="item">
									<?php
									/* this function is used to get away keeper  */
										$awayk = array_values(array_filter(array_map(function($val){
											if($val->lineup_typeFK == 1){
											return  $val;
											}
										},array_values($away_lineup))));
									?>
									   <li>
										  <div class="player"> 
										   <img src="<?=base_url('assets/images/dress-green.gif')?>" alt="">
										  <span class="number"><?=$awayk[0]->shirt_number?></span>  </div>
										  <div class="name">
										  <span class=""><?=$awayk[0]->name?></span>
										  </div>
									   </li>
									</ul>
								 </div>
							  </div>
						   </div>
						   <div class="away-info">
							  <div class="name"><?=$result[0]->away_team?></div>
							  <div class="formation"><?=$result[0]->away_formation?></div>
						   </div>
						</div>
			   <?php } ?>							  
													  
							  
							  
							  <!---======map table layout======--->
				
				
				
						  <!----==Bottom Table html===------>
							<table class="parts">		  
								<tr>
									 <td colspan="2" class="h-part">Kadrolar</td>
								</tr>
							</table>
									  
									  
							<table class="parts" style="width:50%; float:left;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->lineup_typeFK !=5 && $team1->lineup_typeFK !=10){?>
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
								<?php $i = 0; $class="odd"; foreach($away_lineup as $team2){ if ($team2->lineup_typeFK !=5 && $team2->lineup_typeFK !=10) { ?>
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
									 <td colspan="2" class="h-part">vekil</td>
									</tr>
							</table>	
							<table class="parts" style="width:50%; float:left;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->lineup_typeFK ==5){?>
								  <tr class="<?=$class?>">
									 <td class="summary-vertical fl">
										<div class="time-box"><?=$team1->shirt_number?></div>
										<span title="" style="background:none;" class=""></span>
										<div class="name"><a href="javascript:void(0);"><?=$team1->name?></a></div>
									 </td> 
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; } } ?> 
							   </tbody>
							</table>

							<table class="parts" style="width:50%;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($away_lineup as $team2){ if ($team2->lineup_typeFK ==5) { ?>
								<tr class="<?=$class?>">
									 <td class="summary-vertical fr">
										<div class="time-box"><?=$team2->shirt_number?></div>
										<span title="" style="background:none;" class=""></span>
										<div class="name"><a href="javascript:void(0);"><?=$team2->name?></a></div>
									 </td>
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; }} ?> 
							   </tbody>
							</table>

									

							<table class="parts">		  
									<tr>
									 <td colspan="2" class="h-part">Coach</td>
									</tr>
							</table>	  
							<table class="parts" style="width:50%; float:left;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->lineup_typeFK ==10) { ?>
								  <tr class="<?=$class?>">
									 <td class="summary-vertical fl">
										<div class="name"><a href="javascript:void(0);"><?=$team1->name?></a></div>
									 </td> 
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; }} ?> 
							   </tbody>
							</table>
							<table class="parts" style="width:50%;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($away_lineup as $team2){ if ($team2->lineup_typeFK ==10){ ?>
								<tr class="<?=$class?>">
									 <td class="summary-vertical fr">
										<div class="name"><a href="javascript:void(0);"><?=$team2->name?></a></div>
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