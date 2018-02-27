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
   <body class=" v3" >

      <div class="container">

      <div class="adsclear"></div>

      <div id="detail" class="sport-soccer" style="margin-top:0px;">
         <div id="detcon">
            <table class="detail">
               <thead>
                  <tr>
                     <th class="header">
                        <div class="fleft">
                           <span class="flag sml_flg_bk flag-<?=strtolower($result[0]->flag)?>"></span><?=$result[0]->country?>: <a href="#"><?=$result[0]->stage_name?></a>
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
                                    <td class="tname-home logo-enable"><span class="tname"><span style="display: none" class="dw-icon ico" title="Tur atlayan">&nbsp;</span><a href="#"><?=$result[0]->home_team?></a></span></td>
                                    <td class="current-result"><span class="scoreboard-divider"><?=$result[0]->home_score?> - <?=$result[0]->away_score?></span></td>
                                    <td class="tname-away logo-enable"><span class="tname">
                                       <a href="#"><?=$result[0]->away_team?></a><span style="display: none" class="dw-icon ico">&nbsp;</span></span>
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
                        <li class="selected" style="background-color:#016700;" ><a href="#tab-1">Ma√ß √ñzeti</a></li>
						<?php if(!empty($teamA_match) || !empty($teamB_match) ) { ?>
                        <li><a href="#tab-3">Ma√ßlar</a></li>
						<?php } if(!empty($home_statistic) && !empty($away_statistic) ) { ?>
                        <li><a href="#tab-4">Statistic</a></li>
						<?php } if(!empty($home_lineup) && !empty($away_lineup)) { ?>
						<li><a href="#tab-5">Lineup</a></li>
						<?php } ?>
						<li><a href="#tab-6" id="closeIframe" onclick="">Lig</a></li>
                     </ul>
                  </div>
                  <div class="color-spacer"></div>
               </div> 
               <!------===== MaÁ ÷zeti Main Tab-1=====-------->
               <div id="tab-1" class="tab-content" style=" display:block;">
                  <div id="summary-content">
                     <div id="missing-players-content"></div>
                     
					  <table class="parts match-information mtch_infrmtn">
                        <tbody>
                           <tr class="stage-header">
                              <td class="h-part" colspan="3">Ma√ß Bilgileri</td>
                           </tr>
                           <tr class="even content">
                              <td colspan="3">
                                 Venue: <?=$result[0]->venue_name?>
                              </td>
                           </tr>
						   <tr class="content <?php if($result[0]->winner=='Home'){echo 'bold';}?>">
                              <td>
                                 <?=$result[0]->home_team?>
                              </td>
							  <td rowspan="2" colspan="2" class="">
								
								<?php if($result[0]->comment=='TKO' || $result[0]->comment=='W.O.'){ ?>
									<span class="bold">
										<?=$result[0]->comment?>
									</span>
								<?php }else{ ?>
								<span class="<?php if ($result[0]->winner=='Home') {echo "bold";}  ?>"><?=$result[0]->home_score?></span>	
											 - 
								<span class="<?php if ($result[0]->winner=='Away') {echo "bold";}  ?>"><?=$result[0]->away_score?></span>		
								<?php } ?>
							  </td>
                           </tr>
						   <tr class="even content <?php if($result[0]->winner=='Away'){echo 'bold';}?>">
                              <td>
                                 <?=$result[0]->away_team?>
                              </td>
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
								<span class="score"><strong><?=$bw->home_score?>: <?=$bw->away_score?></strong></span>
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
								<span class="score"><strong><?=$teama->home_score?>: <?=$teama->away_score?></strong></span>
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
								<span class="score"><strong><?=$teamb->home_score?>: <?=$teamb->away_score?></strong></span>
								</td>
							 </tr>
						<?php endforeach;?>
						  </tbody>
					</table>
					
					
				  </div>
			   
			   
			   
			   
			   

                  <div class="color-spacer blk-border"></div>

               </div>
               <!------=====H2H Main Tab-3=====-------->
			   <?php } ?> 
               <!------=====MaÁlar Main Tab-3=====-------->
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