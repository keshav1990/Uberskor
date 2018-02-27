<?php 
   // echo "<pre>";
   
   $top_banner = $banners[0]->image;
   
   $mid_banner = $banners[1]->image;
   
   $right_banner = $banners[2]->image;
   
   $left_banner = $banners[3]->image;
   
   $logo = $banners[4]->image;

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
      <title>Uberskor | Match Detail</title>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/mac.css" media="screen">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <style>
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
   <body class="soccer v3" >

      <div class="container">

      <div class="adsclear"></div>

      <div id="detail" class="sport-soccer" style="margin-top:0px;">
         <div id="detcon">
            <table class="detail">
               <thead>
                  <tr>
                     <th class="header">
                        <div class="fleft">
                           <span class="flag fl_6"></span><?=$result[0]->country?>: <a href="#"><?=$result[0]->stage_name?></a>
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
                              <a href="<?php echo base_url('futbol/teamDetail/').$result[0]->home_id?>"><img width="50" height="50" src="<?php echo base_url().'assets/images/logo-2.png';?>" alt="Barcelona" title="Profili göster"></a>
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
                              <a href="<?php echo base_url('futbol/teamDetail/').$result[0]->away_id?>"><img width="50" height="50" src="<?php echo base_url().'assets/images/logo-2-right.png';?>" alt="PSG" title="Profili göster"></a>
                           </div>
                        </td>
                     </tr>
                     <tr id="info-row">
                        <td colspan="5"><span class="info-bubble"><span class="icon-ico info">&nbsp;</span><span class="text">2nci ayak. İlk maç sonucu: 0-4.</span></span></td>
                     </tr>
                  </tbody>
               </table>
               <div id="detail-submenu-bookmark-container" style="display: none;"></div>
               <div id="detail-bookmarks">
                  <div style="position: relative;">
                     <ul class="ifmenu ifmu">
                        <li class="selected" style="background-color:#016700;" ><a href="#tab-1">Maç Özeti</a></li>
                        <li><a href="#tab-3">H2H</a></li>
                        <li><a href="#tab-4">Maçlar</a></li>
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
                              <td class="h-part">Maç Bilgileri</td>
                           </tr>
                           <tr class="content">
                              <td>
                                 Venue: <?=$result[0]->venue_name?>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div id="detail-submenu-bookmark" class="detail-submenu-bookmark dark_blck">
                     <div class="spacer-block">&nbsp;</div>
                     <ul class="ifmenu ifmu2">
                        <?php if(!empty($incident)){ ?><li class="selected"><a href="#tab-01" id="a-match-timeline">Maç Özeti</a></li> <?php } ?>
                        <li class="li1"><a href="#tab-02">İstatistikler</a></li>
                        <li class="li2"><a href="#tab-03">Kadrolar</a></li>
                        <li class="li1"><a href="#tab-04">Oyuncu İstatistikleri</a></li>
                        <li class="li3"><a href="#tab-05" >CANLI-Yorum</a></li>
                     </ul>
                    <div class="color-spacer"></div>
                    <?php if(!empty($incident)){ ?>
					<!---Tab box1---->
                    <div id="tab-01" class="tab-content2" style=" display:block;">
                        <table id="parts" class="parts-first vertical">
                           <tr class="stage-header stage-12">
                              <td colspan="3" class="h-part">1. yarı</td>
                           </tr>
                           <?php $count=1; foreach ($incident as $val) {
							$class = ($val->number == 1)?"even":"odd";    ?>
                           <tr class="<?=$class?>">
                              <td class="summary-vertical fl">
								
								 <?php if ($val->number == 1){ ?> 
                                 <div class="wrapper">
                                    <div class="time-box"><?=$val->elapsed2?></div>
                                    <div class="icon-box soccer-ball"><span class="icon soccer-ball">&nbsp;</span></div>
                                    <span class="participant-name"><a href="#"><?=$val->player_name?>.</a></span>
                                    <a href="#">
                                    <span class="icon video fr" title="Videosunu izle!"></span>
                                    </a>
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
                                    <div class="icon-box y-card"><span class="icon y-card">&nbsp;</span></div>
                                    <span class="subincident-penalty">(İtme)</span>
                                    <span class="participant-name">&nbsp;<a href="#"><?=$val->player_name?>.</a></span>
                                 </div>
								 <?php } ?>
                              </td>
                           </tr>
						   <?php } ?>
                        </table>

                     </div>
					 <?php } ?>
                     <!---/Tab box1---->
                     <!---Tab box2---->
                     <div id="tab-02" class="tab-content2">
                        <div class="lines-bookmark">
                           <ul class="ifmenu ifmu3">
                              <li class="li0 selected"><a href="#tab11" >Karşılaşma</a></li>
                              <li><a href="#tab12">1. yarı</a></li>
                              <li><a href="#tab13" >2. yarı</a></li>
                           </ul>
                        </div>
                        <div id="tab11" class="tab-content3" style=" display:block;">
                           <div id="tab-statistics-0-statistic">
                              <table class="parts">
                                 <tr class="odd">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">66%</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style=""></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 34%;float:left;"></div>
                                       </div>
                                       <div style="float: right;">34%</div>
                                    </td>
                                 </tr>
                                 <tr class="even">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">17</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style=""></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 28%; float:left;"></div>
                                       </div>
                                       <div style="float: right;">7</div>
                                    </td>
                                 </tr>
                                 <tr class="odd">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">7</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style="width:45%;"></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 34%;float:left;"></div>
                                       </div>
                                       <div style="float: right;">3</div>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                        <div id="tab12" class="tab-content3" >
                           <div id="tab-statistics-0-statistic">
                              <table class="parts">
                                 <tr class="odd">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">66%</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style=""></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 34%;float:left;"></div>
                                       </div>
                                       <div style="float: right;">34%</div>
                                    </td>
                                 </tr>
                                 <tr class="even">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">17</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style=""></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 28%; float:left;"></div>
                                       </div>
                                       <div style="float: right;">7</div>
                                    </td>
                                 </tr>
                                 <tr class="odd">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">7</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style="width:45%;"></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 34%;float:left;"></div>
                                       </div>
                                       <div style="float: right;">3</div>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                        <div id="tab13" class="tab-content3" >
                           <div id="tab-statistics-0-statistic">
                              <table class="parts">
                                 <tr class="odd">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">66%</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style=""></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 34%;float:left;"></div>
                                       </div>
                                       <div style="float: right;">34%</div>
                                    </td>
                                 </tr>
                                 <tr class="even">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">17</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style=""></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 28%; float:left;"></div>
                                       </div>
                                       <div style="float: right;">7</div>
                                    </td>
                                 </tr>
                                 <tr class="odd">
                                    <td class="summary-vertical fl" style="padding-right: 0px; border-top: 0px;">
                                       <div style="float: left;">7</div>
                                       <div class="grb_bxd">
                                          <div class="grb_bxd2" style="width:45%;"></div>
                                       </div>
                                    </td>
                                    <td class="score stats" style="border-top: 0px;">Topa sahip olma</td>
                                    <td class="summary-vertical fr" style="padding-left: 0px; border-top: 0px;">
                                       <div class="grb_bxd" style="width: 82%;float:left;">
                                          <div class="grb_bxd2 blck" style="width: 34%;float:left;"></div>
                                       </div>
                                       <div style="float: right;">3</div>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!---/Tab box1-- -->
                     <!--------Tab-03------- -->
                     <div id="tab-03" class="tab-content2">
                        <table id="parts" class="parts-first vertical">
                           <tbody>
                              <tr class="stage-header stage-12">
                                 <td colspan="3" class="h-part">1. yarı</td>
                              </tr>
                              <tr class="odd">
                                 <td class="summary-vertical fl">
                                    <div class="wrapper">
                                       <div class="time-box">3'</div>
                                       <div class="icon-box soccer-ball"><span class="icon soccer-ball">&nbsp;</span></div>
                                       <span class="participant-name"><a href="#">Suarez L.</a></span>
                                       <a href="#">
                                       <span class="icon video fr" title="Videosunu izle!"></span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="score" rowspan="7">
                                    <span class="p1_home">2</span>
                                    - <span class="p1_away">0</span>
                                 </td>
                                 <td class="summary-vertical fr">
                                    <div class="wrapper">&nbsp;</div>
                                 </td>
                              </tr>
                              <tr class="even">
                                 <td class="summary-vertical fl">
                                    <div class="wrapper">&nbsp;</div>
                                 </td>
                                 <td class="summary-vertical fr">
                                    <div class="wrapper">
                                       <div class="time-box">5'</div>
                                       <div class="icon-box y-card"><span class="icon y-card">&nbsp;</span></div>
                                       <span class="subincident-penalty">(İtme)</span>
                                       <span class="participant-name">&nbsp;<a href="#">Matuidi B.</a></span>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="odd">
                                 <td class="summary-vertical fl">
                                    <div class="wrapper">&nbsp;</div>
                                 </td>
                                 <td class="summary-vertical fr">
                                    <div class="wrapper">
                                       <div class="time-box">14'</div>
                                       <div class="icon-box y-card"><span class="icon y-card">&nbsp;</span></div>
                                       <span class="subincident-penalty">(Çelme takma)</span>
                                       <span class="participant-name">&nbsp;<a href="#">Draxler J.</a></span>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="odd">
                                 <td class="summary-vertical fl">
                                    <div class="wrapper">&nbsp;</div>
                                 </td>
                                 <td class="summary-vertical fr">
                                    <div class="wrapper">
                                       <div class="time-box">14'</div>
                                       <div class="icon-box y-card"><span class="icon y-card">&nbsp;</span></div>
                                       <span class="subincident-penalty">(Çelme takma)</span>
                                       <span class="participant-name">&nbsp;<a href="#">Draxler J.</a></span>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="odd">
                                 <td class="summary-vertical fl">
                                    <div class="wrapper">
                                       <div class="time-box">36'</div>
                                       <div class="icon-box y-card"><span class="icon y-card">&nbsp;</span></div>
                                       <span class="participant-name"><a href="#">Busquets S.</a>&nbsp;</span>
                                       <span class="subincident-penalty">(Sportmenlik dışı davranış)</span>
                                    </div>
                                 </td>
                                 <td class="summary-vertical fr">
                                    <div class="wrapper">&nbsp;</div>
                                 </td>
                              </tr>
                              <tr class="even">
                                 <td class="summary-vertical fl" title="">
                                    <div class="wrapper" title="">
                                       <div class="time-box">40'</div>
                                       <div class="icon-box soccer-ball-own">
                                          <span class="icon soccer-ball-own">&nbsp;</span>
                                       </div>
                                       <span class="participant-name"><a href="#">Kurzawa L.</a></span>&nbsp;
                                       <span class="assist">(<a href="#">Iniesta A.</a>) </span> 
                                       (Kendi kalesine)
                                       <a data-restriction="1489005016|" title="">
                                       <span class="icon video fr" title="Videosunu izle!"></span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="summary-vertical fr">
                                    <div class="wrapper">&nbsp;</div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     		<!--------Tab-04--------->
						   <div id="tab-04" class="tab-content2">
						   
						   
						   <!-----==Top Table Heading==---->
						   <table id="parts">
						   <tr>
						   <td class="h-part" style="width: 35%;"><b>4 - 4 - 2</b></td>
						   
						   <td class="h-part" style="width: 30%; white-space: nowrap;">In-field alignment</td>
						   
						   <td class="h-part"><b>4 - 4 - 2</b></td>
						   </tr>
						   </tbody>
						   </table>
						 <!-----==/Top Table Heading==---->
						   
						   <!-------==map html==-------->
						   
						   <div class="soccer-formation">
				   <div class="field" style="background-image: url('<?php echo base_url('assets/')?>images/field_soccer_540x320.gif');">
					
						 <div id="h1" style="left: -28px; top: 142px; width: 120px; height: 36px; background-image: url('<?php echo base_url('assets/')?>images/dress-yellow.gif');" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">25</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h1" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Armani</a></span></div>
							</div>
						 </div>
						 <div id="h2" style="left: 34px; top: 264px; width: 120px; height: 36px; background-image: url('<?php echo base_url('assets/')?>images/dress-white.gif');" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1" title="">
							   <div style="_height: 100%" title="">
								  <div class="icon-formation"><span class="icon y-card">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">2</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h2" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#" onclick="window.open('/oyuncu/bocanegra-daniel/Gz2pZSoi/'); return false;">Bocanegra</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h3" style="left: 34px; top: 184px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">26</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h3" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Cuesta Figueroa</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h4" style="left: 34px; top: 101px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">12</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h4" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  ">
							   <a href="#">Henriquez</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h5" style="left: 34px; top: 21px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%">
								  <span class="icon soccer-ball-own">&nbsp;</span>
								  <div title="71' Diaz F." onmouseover="tt.show(this, event)" onmouseout="tt.hide(this)" class="icon-formation"><span class="icon y-card">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">19</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h5" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Diaz</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h6" style="left: 104px; top: 264px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player" title="">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1" title="">
							   <div style="_height: 100%" title="">
								  <div title="36' Uribe M. " class="icon-formation"><span class="icon soccer-ball">&nbsp;</span></div>
								  <div class="icon-formation"><span class="icon substitution-out">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">6</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h6" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Uribe</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h7" style="left: 104px; top: 184px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">8</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h7" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Arias</a></span></div>
							</div>
						 </div>
						 
						 <div id="h8" style="left: 104px; top: 101px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">18</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h8" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Quinonez</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h9" style="left: 104px; top: 21px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%">
								  <div title="69' Torres M. " class="icon-formation"><span class="icon soccer-ball">&nbsp;</span></div>
								  <div class="icon-formation"><span class="icon substitution-out">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">10</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h9" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Torres</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="h10" style="left: 174px; top: 203px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player" title="">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1" title="">
							   <div style="_height: 100%" title="">
								  <div title="47' Ibarguen A." class="icon-formation"><span class="icon soccer-ball">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">11</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h10" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Ibarguen</a></span></div>
							</div>
						 </div>
						 
						 <div id="h11" style="left: 174px; top: 82px; width: 120px; height: 36px; background-image: url(images/dress-white.gif);" class="player" title="">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1" title="">
							   <div style="_height: 100%" title="">
								  <div title="45' Moreno D. " class="icon-formation"><span class="icon soccer-ball">&nbsp;</span></div>
								  <div title="78' Moreno D. (Ruiz L.)" class="icon-formation"><span class="icon substitution-out">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">17</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_h11" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Moreno</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a1" style="left: 448px; top: 142px; width: 120px; height: 36px; background-image: url('<?php echo base_url('assets/')?>images/dress-yellow.gif');" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">21</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a1" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Andujar</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a2" style="left: 386px; top: 20px; width: 120px; height: 36px;  background-image: url('<?php echo base_url('assets/')?>images/dress-blue.gif');" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">13</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a2" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Aguirregaray</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a3" style="left: 386px; top: 100px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%">
								  <div title="43' Schunke J." class="icon-formation"><span class="icon y-card">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">6</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a3" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Schunke</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a4" style="left: 386px; top: 183px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">2</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a4" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Desabato</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a5" style="left: 386px; top: 263px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%">
								  <div title="75' Dubarbier S." class="icon-formation"><span class="icon y-card">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">19</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a5" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  ">
							   <a href="#">Dubarbier</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a6" style="left: 316px; top: 20px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">22</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a6" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  ">
							   <a href="#">Brana</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a7" style="left: 316px; top: 100px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">30</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a7" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Irirtier</a></span></div>
							</div>
						 </div>
						 
						 <div id="a8" style="left: 316px; top: 183px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player" title="">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1" title="">
							   <div style="_height: 100%" title="">
								  <div title="65' Veron J. (Ascacibar S.)" onmouseover="tt.show(this, event)" onmouseout="tt.hide(this)" class="icon-formation"><span class="icon substitution-out">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">11</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a8" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Veron</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a9" style="left: 316px; top: 263px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%"></div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">28</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a9" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Bautista Cascini</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a10" style="left: 246px; top: 81px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player" title="">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1" title="">
							   <div style="_height: 100%" title="">
								  <div title="52' Rodriguez L. (Cavallaro J.)" onmouseover="tt.show(this, event)" onmouseout="tt.hide(this)" class="icon-formation"><span class="icon substitution-out">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">10</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a10" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#">Rodriguez</a></span></div>
							</div>
						 </div>
						 
						 
						 <div id="a11" style="left: 246px; top: 202px; width: 120px; height: 36px; background-image: url(images/dress-blue.gif);" class="player">
							<div style="position: absolute; top: -10px; left: 40px; z-index: 1">
							   <div style="_height: 100%">
								  <div title="59' Viatri L. (Toledo J.)" onmouseover="tt.show(this, event)" onmouseout="tt.hide(this)" class="icon-formation"><span class="icon substitution-out">&nbsp;</span></div>
							   </div>
							</div>
							<div style="position: absolute; top: 7px; text-align: center; width: 100%; font-family: tahoma, verdana, arial; font-size: 11px; font-weight: bold; padding-left: 1px; color: #353535;">9</div>
							<div style="position: absolute; top: 31px; text-align: center; width: 100%;">
							   <div style="font-family: tahoma, verdana, arial; font-size: 11px; font-weight: normal; color: #ffffff; _margin-left: 6px;"><span id="player_name_a11" class="participant-link" style="background-color: #353535; padding: 1px 3px; white-space: nowrap; color: white;  "><a href="#" >Viatri</a></span></div>
							</div>
						 </div>
					 
				   </div>
				</div>
				<!-------==/map html==-------->
						  

						  <!----==Bottom Table html===------>
							<table class="parts">		  
								<tr>
									 <td colspan="2" class="h-part">Kadrolar</td>
								</tr>
							</table>
									  
									  
							<table class="parts" style="width:50%; float:left;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->player_type !='Substitute player'){?>
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
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->player_type !='Substitute player') { ?>
								<tr class="<?=$class?>">
									 <td class="summary-vertical fr">
										<div class="time-box"><?=$team1->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team1->name?></a></div>
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
								<?php $i = 0; $class="odd"; foreach($away_lineup as $team2){ if ($team2->player_type =='Substitute player') { ?>
								  <tr class="<?=$class?>">
									 <td class="summary-vertical fl">
										<div class="time-box"><?=$team2->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team2->name?></a></div>
									 </td> 
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; }} ?> 
							   </tbody>
							</table>

							<table class="parts" style="width:50%;">
							   <tbody title="">
								<?php $i = 0; $class="odd"; foreach($home_lineup as $team1){ if ($team1->player_type =='Substitute player'){ ?>
								<tr class="<?=$class?>">
									 <td class="summary-vertical fr">
										<div class="time-box"><?=$team1->shirt_number?></div>
										<span title="" style="background:none;" class="flag fl_22"></span>
										<div class="name"><a href="#"><?=$team1->name?></a></div>
									 </td>
								  </tr>
								<?php  $class = ($i % 2 == 0)?"even":"odd"; $i++; }} ?> 
							   </tbody>
							</table>						
							
							
				<!----==/Bottom Table html===------>
						   
						   
						   
						   </div>
                     <!--------Tab-04------ - -->
                     <div id="tab-05" class="tab-content2">
                        5
                     </div>
                  </div>
               </div>
               <!------=====Main Tab-1=====------ -->
               <!------=====H2H Main Tab-3=====------ -->
               <div id="tab-3" class="tab-content">
                  <ul class="ifmenu ifmu5">
                     <li class="selected"><a href="#tab-31" >All</a></li>
                     <li><a href="#tab-32"><?=$result[0]
                        ->home_team?> - Home</a></li>
                     <li><a href="#tab-33"><?=$result[0]
                        ->away_team?> - Away</a></li>
                  </ul>
                  <div class="color-spacer blk-border"></div>
                  <!--------Tab-31------- -->
                  <div id="tab-31" class="tab-content5" style=" display:block;" >31</div>
                  <!--------Tab-32------- -->
                  <div id="tab-32" class="tab-content5">32</div>
                  <!--------Tab-33------- -->
                  <div id="tab-33" class="tab-content5">33</div>
               </div>
               <!------=====H2H Main Tab-3=====-------->
               <!------=====Maçlar Main Tab-4=====-------->
               <div id="tab-4" class="tab-content">
                  Page-4
               </div>
               <!------=====Maçlar Main Tab-3=====-------->
            </div>
            <div id="winclose">
               <div id="sync-indicator" ondblclick="sync_change()"><span class="nosync" title="Sync Offline"></span></div>
               <a href="#" onclick="window.close();">Pencereyı kapat</a>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.min.js"></script>
      <script>
         $(document).ready(function() {
         
            $(".ifmu li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         $(".ifmu2 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content2").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
           $(".ifmu3 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content3").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         $(".ifmu4 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content4").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         $(".ifmu5 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content5").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         
         
         
         
         
         
         });
         
         
         
         
         
         $(document).ready(function () {
         
         
         
            $(window).scroll(function () {
         
                if ($(this).scrollTop() > 100) {
         
                    $('#scroll-to-top').fadeIn();
         
                } else {
         
                    $('#scroll-to-top').fadeOut();
         
                }
         
            });
         
         
         
            $('#scroll-to-top').click(function () {
         
                $("html, body").animate({
         
                    scrollTop: 0
         
                }, 600);
         
                return false;
         
            });
         
         
         
         });
         
         
         
         $(".toggle_img").click(function(){
         
            $(".menu_tggle").toggle();
         
         });
         
         
         
         /*****pop-1 *****/
         
         $("#signIn").click(function(){
         
            $(".Overpop1").fadeIn();
         
         });
         
         
         
         $("#lsid-window-close").click(function(){
         
            $(".Overpop1").fadeOut();
         
         });
         
         
         
         /*****pop-2 *****/
         
         $("#registration").click(function(){
         
            $(".Overpop2").fadeIn();
         
         });
         
         
         
         $(".clsepp2").click(function(){
         
            $(".Overpop2").fadeOut();
         
         });
         
         
         
         /*****pop-3 *****/
         
         $(".control-panel-icon-setting").click(function(){
         
            $(".Overpop3").fadeIn();
         
         });
         
         
         
         $(".clsepp3").click(function(){
         
            $(".Overpop3").fadeOut();
         
         });
         
         
         
         /*****pop-4 *****/
         
         $(".control-panel-icon-search").click(function(){
         
            $(".Overpop4").fadeIn();
         
         });
         
         
         
         $(".clsepp4").click(function(){
         
            $(".Overpop4").fadeOut();
         
         });
         
         
         
         
         
         
         
      </script>
   </body>
</html>