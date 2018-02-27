
                    <div id="fsbody" class="flashscore basketbal_cnt_main">
                        <div id="fsi"></div>
                        <div class="icehocky_table_main basketball_main" id="fscon">
                         <div class="top_nav-mb">
							<!--span class="selected-mob">Hepsi</span--->
                           <ul class="ifmenu live-menu">
                                  <li class="selected"><a data-target=".maintable" class="onetab">Hepsi</a></li>
                              <li><a data-target=".Yarı" class="onetab">Canlı</a></li>

                              <li><a data-target=".Bitti" class="onetab">Bitmiş</a></li>

                              <li><a data-target=".Başlamadı" class="onetab">Fikstür</a></li>

                              <li><a data-target=".mygames" class="onetab">Oyunlarım <span id="mygames-count">0</span></a></li>

                           </ul>
						   </div>

						   <div class="select_drp-dwn">
						    <?php $this->load->view('common/datepicker');?>
						   </div>


                           <div id="tab-1" class="fs-table tab-content" style=" display:block;">
							<?php ob_start();
							if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
							 <div class="odds-content">
                                   <?php
                                  $oldNameCount = 0 ;
                                  $oldName1 = "" ;
                                  $mlm = 1 ;
                                  $textData = "";
                                  $data_array_keys = array() ;
                                  $duplicateHandler = array() ;
                                 // print_r($list);
                                  $testData = array_map(
                                  function ($a) use (& $data_array_keys) {
                                    $val = $data_array_keys['tab1'][$a->country][$a->country . $a->stage_name][] = $a ;
                                    if ($val->status_text != 'Bitti' && $val->status_text != 'Ertelendi' && $val->gameStarted != '' && $val->gameEnded == '') {
                                    //  $data_array_keys['tab2'][$a->country][$a->country . $a->stage_name][] = $a ;
                                    }
                                    if ($val->status_text == 'Başlamadı') {
                                  //    $data_array_keys['tab4'][$a->country][$a->country . $a->stage_name][] = $a ;
                                    }
                                    elseif ($val->status_text == 'Bitti') {
                                      //$data_array_keys['tab3'][$a->country][$a->country . $a->stage_name][] = $a ;
                                    }
                                    return $data_array_keys ;
                                  }
                                  , $list ) ;
                                  //$listNew = array_values($data_array_keys['tab1']) ;
                                  $listNew1 = ($data_array_keys['tab1']) ;

                                  ///tow loops are used to make the listing acc to stage and than get stage lists
                                 foreach($country as $c) :
                                 if(!array_key_exists($c->name,$listNew1)){
                                     continue;
                                 }
                                 $listNewN =  ($listNew1[$c->name]) ;
                                if(!empty($c->leagues)){
                                     foreach($c->leagues as $league1) :
                                   //  echo $c->name.$league1->name;
                                  // print_r($listNewN[$c->name.$league1->name]);
                                    if(!array_key_exists($c->name.$league1->name,$listNewN)) {continue;}
                                     $listN1 =  str_replace(" ","",$c->name.$league1->name);
                                  //print_r($list1);
                                 // foreach ($listNewN as $cou => $list1) :
                                     $list1 =  $listNewN[$c->name.$league1->name];

                                  ///now make the loop for the country we do have
                                   //  $oldName1 = "";
                                     $statusText = "maintable ";
                                    foreach ($list1 as $k => $row1) {
                                     //   print_r($row1);
                                     $parentID = $row1->id ;
                                     if(in_array($parentID,$duplicateHandler) || in_array($c->name.$league1->name,$duplicateHandler)) {continue;}
                                ///this is to check name if name is not same from previous than create new one
                                      if ($oldName1 != $c->name.$league1->name) {
                                        ob_start();
                                      // print_r($row1);

                                        $oldName1 = $c->name.$league1->name ;
                                        $oldNameCount++;
                                ////if new name than close the old table from prev name
                                        if ($oldNameCount == 2) {
                                          $oldNameCount = 0 ;
                                          ?>
                                   </tbody>
                              </table>

                                                   <?php
                                                   $textData = ob_get_clean();
                                                   $textData = str_replace("{str_class}",$statusText,$textData);
                                                   echo $textData;
                               $statusText = "maintable ";
                              }
                                                 ?>

        <table class="soccer odds basketball_table {str_class} <?=$row1->status_text?> pushLeague_in<?=$listN1?> LeaguePushID_in" colgroup="" id="{parent}_show<?=$listN1?>" width="100%">

                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                        <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"parent_<?=$listN1?>")' id="parent_<?=$listN1?>" class="checkbox-custom" >

                                          </div>
                                       </td>

                                       <td colspan="17" class="head_ab left project-bonus-border ">
									   <span class="country left"><span class="flag  flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>
									   <div class="right_country">
									   <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$listN1?>'  onclick="pushLeague(this)" title="
Liglerime ekle" class="{startclass} showme<?=$listN1?> rshowme<?=$listN1?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   <?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span class="leagu_tble" style="float:right" onclick="openLeague('<?=$url?>')" title="Puan durumu">LeagueTable</span></div></span>
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } $statusText .= " ".$row1->status_text;   ?>
							<tr id="<?=$parentID?>" title="<?=$row1->eventname?>"  class="tr-first bef_arrw maintable <?php echo $row1->status_text; ?> no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_1'?> even stage-scheduled {str_child_class} {show_ck_tr} childRwckShow_<?=$row1->id?> parentRwckShow_<?=$listN1?> <?=$listN1?> " style="cursor: pointer;">
							  <td rowspan="2" class="cell_ib icons left">
									<input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"child_<?=$row1->id?>,<?=$listN1?>")'  class="checkbox-custom checkbox parent_<?=$listN1?> child_<?=$row1->id?>" >
								</td>
							  <td colspan="2" rowspan="2" class="cell_ad time"><?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="Color_anited">
										 <b></b>
										</span>
									   <?php } ?><?=$row1->starttime?></td>
							  <td colspan="2" onclick='detailPopup("<?=$row1->id?>");' rowspan="2" class="cell_aa timer"><span><?=$row1->status_text?></span></td>
							  <td colspan="6" onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away team-home <?php if ($row1->home_result[0]->finalresult > $row1->away_result[0]->finalresult) {echo "bold";}?>" title="<?=$row1->event_name?>"><span class="padl"><?=$row1->home_team ?><span style="display:none;" class="mobile_only_score1"><?=$row1->home_score?></span></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sc score-home <?php if ($row1->home_result[0]->finalresult > $row1->away_result[0]->finalresult) {echo "bold";}?> "><?=$row1->home_score?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sd part-bottom"><?=$row1->home_result[0]->quarter1?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_se part-bottom"><?=$row1->home_result[0]->quarter2?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sf part-bottom"><?=$row1->home_result[0]->quarter3?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sg part-bottom"><?=$row1->home_result[0]->quarter4?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sh part-bottom">&nbsp;</td>
							  <td onclick='detailPopup("<?=$row1->id?>");' colspan="1" rowspan="2" class="cell_ia icons live_icon_data">
							  <?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"></span>
									   <?php } ?>

							  </td>

							</tr>
							<tr id="<?=$parentID?>" title="<?=$row1->eventname?>"  class="tr-first maintable <?=$row1->status_text?> ice_tab_cnt no-service-info <?php echo $row1->status_text; ?> stage-finished <?=$game.'_event_'.$row1->id.'_2'?> even stage-scheduled {str_child_class} {show_ck_tr} childRwckShow_<?=$row1->id?> parentRwckShow_<?=$listN1?> <?=$listN1?> " style="cursor: pointer;">
							  <td colspan="6" onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away <?php if ($row1->home_result[0]->finalresult < $row1->away_result[0]->finalresult) {echo "bold";}?>" title="<?=$row1->event_name?>"><span class="padl"><?=$row1->away_team ?><span style="display:none;" class="mobile_only_score2"><?=$row1->away_score?></span></span></td>
							  <td class="cell_ta score-away <?php if ($row1->home_result[0]->finalresult < $row1->away_result[0]->finalresult) {echo "bold";}?>"><?=$row1->away_score?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_tb part-top"><?=$row1->away_result[0]->quarter1?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_tc part-top"><?=$row1->away_result[0]->quarter2?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_td part-top"><?=$row1->away_result[0]->quarter3?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_te part-top lst-bkb_mm"><?=$row1->away_result[0]->quarter4?></td>
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_tf part-top">&nbsp;</td>
							</tr>
							<!--tr class="blank-line" style="height: 0px;line-height: 0px;float: left;">
							  <td colspan="12"></td>
							</tr-->
                                       <?php           if ($k == (count($list1) - 1)) {
                                                $duplicateHandler[]   = $c->name.$league1->name;
                                                $duplicateHandler[]   = $parentID;
                                          ?>
                               </tbody>
                              </table>
                              <?php
                                 $textData = ob_get_clean();
                                                   $textData = str_replace("{str_class}",$statusText,$textData);
                                                   echo $textData;
                               $statusText = " ";
                               } }
                            // endforeach ;
                             endforeach ;
                             }
                              endforeach ;
                              ?>
                              </div>
							<?php
								  }

							  $duplicate = ob_get_clean();
							  $duplicate1 = str_replace(array('{str_class}','{parent}',"{pushLeague}"),array("","",'pushLeague'),$duplicate);
							  echo $duplicate1;
							?>
                           </div>


	                    </div>

                     </div>
<script type="text/javascript">
$(document).ready(function() {
    $(".live-menu li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("selected");
        $(this).parent().siblings().removeClass("selected");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
	// On Click Add class function for Table Star
	/* $(".toggleMyLeague").click(function() {  
		$(this).toggleClass("toggleMyLeague_icn");
	}); */
});
</script>  