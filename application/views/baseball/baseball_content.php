<div id="fsbody" class="flashscore baseball_conent">
                        <div id="fsi"></div>
                        <div id="fscon" class="icehocky_table_main">
                            <div class="top_nav-mb">
                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
                               
							  <li><a href="#tab-2">Canlı</a></li>

                              <li><a href="#tab-3">Bitmiş</a></li>

                              <li><a href="#tab-4" >Fikstür</a></li>

                              <li><a href="#tab-6">Oyunlarım <span id="mygames-count">0</span></a></li>
								
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
                              $oldNameCount = 0;
                              $oldName1 = "";
                              foreach ($list as $k => $row1) {
                              ///this is to check name if name is not same from previous than create new one
                                if ($oldName1 != $row1->id) {
                                  $oldName1 = $row1->id;
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
			<table class="soccer odds {str_class} pushLeague_in<?=$parentID?> LeaguePushID_in" colgroup="" id="{parent}_show<?=$parentID?>" cellspacing="0" cellpadding="0" width="100%">
								<thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                        <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"parent_<?=$parentID?>");' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                               
                                       </td>

                                       <td colspan="31" class="head_ab left project-bonus-border ">
									   <span class="country left"><span class="flag flag-<?=strtolower($row1->flag) ?> country_part"></span><span class="name"><span class="tournament_part"> <?=$row1->name ?> - <?=$row1->stage_name ?> </span></span>
									    <div class="right_country"><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   <?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span class="leagu_tble" style="float:right" onclick="openLeague('<?=$url?>')" title="Puan durumu">LeagueTable</span>
									   <!----span style="float:right;margin-right:5%;display:none;">Venue : <?=$row1->venue?></span></div></span--->
                                       </td>
                                    </tr>
									
									<tr class="white" >
                                      
									  <td colspan="16" class="cell_ad time">Final</td>
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
									  <td colspan="2" class="cell_ad time md_dta">&nbsp;</td>
                                    </tr>
									
									
                              </thead> 
                              <tbody>
							  
							  
                              <?php }?> 
							<tr id="<?=$parentID?>" title="<?=$row1->eventname?>" class="<?=$game.'_event_'.$row1->id.'_1'?>  tr-first even stage-scheduled {str_child_class} {show_ck_tr} childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?>" style="cursor:pointer;"  >
							
							  <td rowspan="2"  colspan="1" class="cell_ib icons left">    <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"child_<?=$row1->id ?>,<?=$parentID ?>");'  class="checkbox parent_<?=$parentID ?> child_<?=$row1->id ?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2" class="cell_ad time"><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="4" class="cell_aa timer"><span><?=$row1->status_text?></span></td>

							  <!--td onclick='detailPopup("<?=$row1->id?>");' class="cell_xh serve-home" colspan="1">&#160;</td--->

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->home_team?><span style="display:none;" class="mobile_only_score1"><?=$row1->home_score?></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->home_score?></td>

							  
							<?php
							/* this loop is used to print inning score */  
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id?>");' class="cell_sd part-bottom " colspan="1"><?=$row1->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->home_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->home_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  class="cell_ss part-bottom" colspan="1"><?=$row1->home_result[0]->errors?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2" class="cell_oq comparison"></td> 
							</tr>

							<tr id="<?=$parentID?>" title="<?=$row1->eventname?>" class="<?=$game.'_event_'.$row1->id.'_2'?>  tr-first  baseball-inner-bx even stage-scheduled {str_child_class} {show_ck_tr} childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?>" style="cursor:pointer;"  >
							
							  <!--td onclick='detailPopup("<?=$row1->id?>");' class="cell_xa serve-away" colspan="1">&#160;</td-->

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->away_team?><span style="display:none;" class="mobile_only_score2"><?=$row1->away_score?></span></td> 

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->away_score?></td>
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id?>");' class="cell_sd part-bottom" colspan="1"><?=$row1->away_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->away_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->away_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' class="cell_ss part-bottom" colspan="1"><?=$row1->away_result[0]->errors?></td>
							  
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
                              </div>
										  <?php }
								    $duplicate = ob_get_clean();
							  $duplicate1 = str_replace(array('{str_class}','{parent}',"{pushLeague}"),array("","","pushLeague"),$duplicate);
							  echo $duplicate1;
							  ?>
                           </div>
						   <!-----Tab Content-2---->
						   <div id="tab-2" class="fs-table tab-content">
							   							<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  
                           $llist = array();
                           $llist = array_map(
                           function ($val) {
                              if($val->status_text != 'Bitti'  && $val->gameStarted != '' && $val->gameEnded==''){
                                             return $val;
                                          }
                           }
                           , $list );
                           $llist = array_filter($llist);
                           $llist = array_values($llist);
                           $oldNameCount = 0;
                           $oldName1 = "";
                           foreach ($llist as $k => $row1) {
                           ///this is to check name if name is not same from previous than create new one
                             if ($oldName1 != $row1->id) {
                               $oldName1 = $row1->id;
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
                            <table class="soccer bbbbb odds" cellspacing="0" cellpadding="0" width="100%">
								<thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                        <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"parent_<?=$parentID?>");' id="parent_<?=$parentID?>" class="checkbox-custom" >    
                                       </td>

                                      <td colspan="31" class="head_ab left project-bonus-border ">
									   <span class="country left"><span class="name"><span class="flag flag-<?=strtolower($row1->flag) ?> country_part"></span><span class="tournament_part"> <?=$row1->name ?> - <?=$row1->stage_name ?> </span></span>
									    <div class="right_country"><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" title="
Liglerime ekle" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   <?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span  class="leagu_tble"  style="float:right" onclick="openLeague('<?=$url?>')" title="Puan durumu">LeagueTable</span>
									   <!--span style="float:right;margin-right:5%">Venue : <?=$row1->venue?></span-->
									   </div></span>
                                       </td>
                                    </tr>
									
									<tr class="white">
                                      <td colspan="16" class="cell_ad time">Final</td>
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
									  <td colspan="2" class="cell_ad time md_dta">&nbsp;</td>
                                    </tr> 
                              </thead>
                              <tbody>
							  
                              <?php }?>
							<tr id="<?=$parentID?>"  class="tr-first <?=$game.'_event_'.$row1->id.'_1'?>" style="cursor: pointer;">
							
							  <td  rowspan="2" colspan="1" class="cell_ib icons left">    <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"child_<?=$row1->id ?>,<?=$parentID ?>");'  class="checkbox parent_<?=$parentID ?> child_<?=$row1->id ?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="2" class="cell_ad time"><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="4" class="cell_aa timer"><span><?=$row1->status_text?></span></td>

							  <!--td onclick='detailPopup("<?=$row1->id ?>");' class="cell_xh serve-home" colspan="1">&#160;</td-->

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->home_team?><span style="display:none;" class="mobile_only_score1"><?=$row1->home_score?></span></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->home_score?></td>

							  
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>
							<td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sd part-bottom " colspan="1"><?=$row1->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>
							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->home_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->home_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ss part-bottom" colspan="1"><?=$row1->home_result[0]->errors?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="2" class="cell_oq comparison"></td>
							</tr>

							<tr id="<?=$parentID?>"  class="tr-first baseball-inner-bx <?=$game.'_event_'.$row1->id.'_2'?>" style="cursor: pointer;">
							
							  <!--td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_xa serve-away" colspan="1">&#160;</td-->

							  <td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->away_team?><span style="display:none;" class="mobile_only_score2"><?=$row1->away_score?></span></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->away_score?></td>
							<?php
							/* this loop is used to print inning score  */ 
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_sd part-bottom" colspan="1"><?=$row1->away_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_sm part-bottom" colspan="2"><?=$row1->away_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_sr part-bottom" colspan="1"><?=$row1->away_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");'  class="cell_ss part-bottom" colspan="1"><?=$row1->away_result[0]->errors?></td>
							  
							</tr>
							<!--tr class="blank-line">
							  <td colspan="30"></td>
							</tr-->

                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($llist) - 1)) {
                                  ?>
                               </tbody>
                              </table>
										  <?php }}}?>
						   </div>
							<!-----Tab Content-3---->
							<div id="tab-3" class="fs-table tab-content">
                           							<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  
                           $flist = array();
                           $flist = array_map(
                           function ($val) {
                             if ($val->status_text == 'Bitti') {
                               return $val;
                             }
                           }
                           , $list );
                           $flist = array_filter($flist);
                           $flist = array_values($flist);
                           $oldNameCount = 0;
                           $oldName1 = "";
                           foreach ($flist as $k => $row1) {
                           ///this is to check name if name is not same from previous than create new one
                             if ($oldName1 != $row1->id) {
                               $oldName1 = $row1->id;
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
                            <table class="soccer odds" cellspacing="0" cellpadding="0" width="100%">
								<thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                        <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"parent_<?=$parentID?>");' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                               
                                       </td>

                                       <td colspan="31" class="head_ab left project-bonus-border ">
									   <span class="country left"><span class="flag flag-<?=strtolower($row1->flag) ?> country_part"></span><span class="name"><span class="tournament_part"> <?=$row1->name ?> - <?=$row1->stage_name ?> </span></span>
									    <div class="right_country"><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" title="
Liglerime ekle" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   <?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span  class="leagu_tble"  style="float:right" onclick="openLeague('<?=$url?>')" title="Puan durumu">LeagueTable</span>
									   <!--span style="float:right;margin-right:5%">Venue : <?=$row1->venue?></span-->
									   </div></span>
                                       </td>
                                    </tr>
									
									<tr class="white">
                                      <td colspan="16" class="cell_ad time">Final</td>
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
									  <td colspan="2" class="cell_ad time md_dta">&nbsp;</td>
                                    </tr>								
                              </thead>
                              <tbody>
							  
                              <?php }?>
							<tr id="<?=$parentID?>"  class="tr-first <?=$game.'_event_'.$row1->id.'_1'?>" style="cursor: pointer;">
							  <td rowspan="2" colspan="1" class="cell_ib icons left">    <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"child_<?=$row1->id ?>,<?=$parentID ?>");'  class="checkbox parent_<?=$parentID ?> child_<?=$row1->id ?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="2" class="cell_ad time"><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="4" class="cell_aa timer"><span><?=$row1->status_text?></span></td>

							  <!--td onclick='detailPopup("<?=$row1->id ?>");' class="cell_xh serve-home" colspan="1">&#160;</td-->

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->home_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->home_score?></td>

							  
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sd part-bottom " colspan="1"><?=$row1->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->home_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->home_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ss part-bottom" colspan="1"><?=$row1->home_result[0]->errors?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="2" class="cell_oq comparison"></td>
							</tr>

							<tr id="<?=$parentID?>"  class="tr-first baseball-inner-bx <?=$game.'_event_'.$row1->id.'_2'?>" style="cursor: pointer;">
							  <!--td onclick='detailPopup("<?=$row1->id ?>");' class="cell_xa serve-away" colspan="1">&#160;</td--> 

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->away_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->away_score?></td>
							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sd part-bottom" colspan="1"><?=$row1->away_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->away_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->away_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ss part-bottom" colspan="1"><?=$row1->away_result[0]->errors?></td>

							</tr>
							<!--tr class="blank-line">
							  <td colspan="30"></td>
							</tr--->

                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($flist) - 1)) {
                                  ?>
                               </tbody>
                              </table>
										  <?php }}}?>

							</div>

							<!-----Tab Content-4---->
							<div id="tab-4" class="fs-table tab-content">
                     							<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{
                       $plist = array();
                       $plist = array_map(
                       function ($val) {
                        // if ($val->status_text == 'Ertelendi') {
                         if ( $val->status_text == 'Başlamadı' ) {
							   
                           return $val;
                         }
                       }
                       , $list );
                       $plist = array_filter($plist);
                       $plist = array_values($plist);
                       $oldNameCount = 0;
                       $oldName1 = "";
                       foreach ($plist as $k => $row1) {
                       ///this is to check name if name is not same from previous than create new one
                         if ($oldName1 != $row1->id) {
                           $oldName1 = $row1->id;
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
                            <table class="soccer odds" cellspacing="0" cellpadding="0" width="100%">
								<thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">                
                        <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"parent_<?=$parentID?>");' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                       </td>

                                       <td colspan="31" class="head_ab left project-bonus-border">
									   <span class="country left"><span class="flag flag-<?=strtolower($row1->flag) ?> country_part"></span><span class="name"><span class="tournament_part"> <?=$row1->name ?> - <?=$row1->stage_name ?> </span></span>
									    <div class="right_country"><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" title="
Liglerime ekle" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   <?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span  class="leagu_tble"  style="float:right" onclick="openLeague('<?=$url?>')" title="Puan durumu">LeagueTable</span>
									   <!--span style="float:right;margin-right:5%">Venue : <?=$row1->venue?></span--></div></span>
                                       </td>
                                    </tr>
									
									<tr class="white">
                                      <td colspan="16" class="cell_ad time">Final</td>
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
									  <td colspan="2" class="cell_ad time md_dta">&nbsp;</td>
                                    </tr>
									
                              </thead>
                              <tbody>
							  
							  
							  
                              <?php }?>
							<tr id="<?=$parentID?>"  class="tr-first <?=$game.'_event_'.$row1->id.'_1'?>" style="cursor: pointer;">
							  <td  rowspan="2" colspan="1" class="cell_ib icons left">    <input title="Oyunlarima ekle" type="checkbox" onchange='mygames(this,"child_<?=$row1->id ?>,<?=$parentID ?>");'  class="checkbox parent_<?=$parentID ?> child_<?=$row1->id ?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="2" class="cell_ad time"><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="4" class="cell_aa timer"><span><?=$row1->status_text?></span></td>

							  <!--td onclick='detailPopup("<?=$row1->id ?>");' class="cell_xh serve-home" colspan="1">&#160;</td--->

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->home_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->home_score?></td>

							<?php
							/* this loop is used to print inning score */
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sd part-bottom " colspan="1"><?=$row1->home_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->home_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->home_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ss part-bottom" colspan="1"><?=$row1->home_result[0]->errors?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' rowspan="2" colspan="2" class="cell_oq comparison"></td>
							</tr>

							<tr id="<?=$parentID?>"  class="tr-first baseball-inner-bx <?=$game.'_event_'.$row1->id.'_2'?>" style="cursor: pointer;">
							  <!--td onclick='detailPopup("<?=$row1->id ?>");' class="cell_xa serve-away" colspan="1">&#160;</td-->

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ab team-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="9"><span class="padl"><?=$row1->away_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sc score-home <?php if (strpos($row1->status_text, 'Bitti') !== false) { if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) {echo "bold";} } ?>" colspan="1"><?=$row1->away_score?></td>
							<?php
							/* this loop is used to print inning score */ 
							for($i=1;$i<10;$i++){
								$tmpvar = "inning".$i
							?>	
							<td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sd part-bottom" colspan="1"><?=$row1->away_result[0]->$tmpvar?></td>
							<?php } //end of loop ?>	
							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sm part-bottom" colspan="2"><?=$row1->away_result[0]->extra_inning?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_sr part-bottom" colspan="1"><?=$row1->away_result[0]->hits?></td>

							  <td onclick='detailPopup("<?=$row1->id ?>");' class="cell_ss part-bottom" colspan="1"><?=$row1->away_result[0]->errors?></td>
							  
							</tr>
							<!--tr class="blank-line">
							  <td colspan="30"></td>
							</tr-->
                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($plist) - 1)) {
                                  ?>
                               </tbody>
                              </table>
										  <?php }}} ?>


							</div>

							<!-----Tab Content-6---->
							<div id="tab-6" class="fs-table tab-content mygamesTab">
								<?php
								$duplicate1 = str_replace(array('{str_class}','{parent}',"showMe(",'showMe','{str_child_class}','LeaguePushID_in','{pushLeague}',"childRwckShow_","{show_ck_tr}","rshowme"),array("display_none","parent","mygames(",'',"","LeaguePushID_my",'removeLeague',"childRwckHide_","display_none","nrshowme"),$duplicate);
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