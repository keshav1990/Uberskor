
                    <div id="fsbody" class="flashscore">

                        <div id="fsi"></div>

                        <div class="icehocky_table_main" id="fscon">
						<div class="top_nav-mb">
							<span class="selected-mob">Hepsi</span>
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
							<?php   
									ob_start();
									if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
                              <div class="odds-content">

                              <?php

                                  $oldNameCount = 0;

                                  $oldName1 = "";

                              foreach($list as $k=>$row1 ) {



                                  ///this is to check name if name is not same from previous than create new one 

                              if($oldName1!=$row1->stage_id){

                              $oldName1 = $row1->stage_id;

                              $oldNameCount++;

                              ////if new name than close the old table from prev name 

                                if ($oldNameCount==2) {

                                 $oldNameCount = 0;

                                 ?>

                                   </tbody>

                              </table>

                                 <?php

                               }

                              ?>								 

								      <?php $parentID=$row1->id; ?>

        <table class="soccer odds {str_class} pushLeague_in<?=$parentID?> LeaguePushID_in" colgroup="" id="{parent}_show<?=$parentID?>" width="100%">
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
     
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>")' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                               
                                       </td>
                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="name"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title="<?=$row1->country?>"></span><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?>  rshowme<?=$parentID?>  toggleMyLeague 1_3_EwJVdqzn"  ></span>
<?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span class="leagu_tble" style="float:right" onclick="openLeague('<?=$url?>')">LeagueTable</span>
                                       </td>

                                    </tr>

                              </thead>

                              <tbody>

                              <?php  } ?>

							  <tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="tr-first bef_arrw no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_1'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr} " style="cursor: pointer;">

							  <td rowspan="2" colspan="1" class="cell_ib icons left"><span class="tomyg clr_chnge"> 
							 <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>")'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
							  </span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2"  colspan="2" class="cell_ad time"><?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="Color_anited">
										 <b></b> 
										</span>
									   <?php } ?><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2"  class="cell_aa timer"><span><?=$row1->status_text?><span style="display:none;" class="mobile_only_live"><span class="live-centre-inr"> <b></b></span></span></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' colspan="5" class="cell_ab team-home  " ><span class="padl <?php if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->home_team?></span></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sc score-home"><?=$row1->home_score?></td>

							  <td   onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sd part-bottom"><?=$row1->home_result[0]->p1?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_se part-bottom"><?=$row1->home_result[0]->p2?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sf part-bottom"><?=$row1->home_result[0]->p3?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2" class="cell_oq comparison">
							  <?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"></span>
									   <?php } ?>
							 </td>

							</tr>

							<tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="ice_tab_cnt tr-first no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_2'?>  childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr}  " style="cursor: pointer;">

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="5" class="cell_ac team-away" ><span class="padl <?php if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->away_team?></span></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_ta score-away "><?=$row1->away_score?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_tb part-top"><?=$row1->away_result[0]->p1?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_tc part-top"><?=$row1->away_result[0]->p2?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_td part-top"><?=$row1->away_result[0]->p3?></td>
							  
							</tr>

							<!---tr class="blank-line">

							  <td colspan="16"></td>

							</tr---->

                                   

                              <?php 

                             // echo $k."=".count($list);

                                 ///this is used if it's last column   

                              if($k == (count($list)-1) ) {  

                              ?> 

                               </tbody>

                              </table>

                              <?php }  } ?>

                              </div>
							<?php 
								  }
							
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

                                 $llist = array_map(function($val){

                                           if($val->status_text != 'Bitti' && $val->status_text !='Ertelendi' && $val->gameStarted != '' && $val->gameEnded==''){
                                             return $val;
                                          }

                                          },$list);

                                 $llist = array_filter($llist);

                                 $llist = array_values($llist);



                                 $oldNameCount = 0;

                                 $oldName1 = "";

                              foreach($llist as $k=>$row1 ) {



                                  ///this is to check name if name is not same from previous than create new one 

                              if($oldName1!=$row1->stage_id){

                              $oldName1 = $row1->stage_id;

                              $oldNameCount++;

                              ////if new name than close the old table from prev name 

                                if ($oldNameCount==2) {

                                 $oldNameCount = 0;

                                 ?>

                                   </tbody>

                              </table>

                                 <?php

                               }

                              ?>                       

                              <?php $parentID=$row1->id; ?>
 <table class="soccer odds"  width="100%">
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>")' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="name"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title="<?=$row1->country?>"></span><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
<?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span  class="leagu_tble" style="float:right" onclick="openLeague('<?=$url?>')">LeagueTable</span>
                                       </td>

                                    </tr>

                              </thead>

                              <tbody>

                              <?php  } ?>

							   <tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="tr-first bef_arrw no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_1'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr} " style="cursor: pointer;">

							  <td rowspan="2" colspan="1" class="cell_ib icons left">  <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>")'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2"  colspan="2" class="cell_ad time"><?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="Color_anited">
										 <b></b> 
										</span>
									   <?php } ?><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2"  colspan="2"  class="cell_aa timer"><span><?=$row1->status_text?><span style="display:none;" class="mobile_only_live"><span class="live-centre-inr"> <b></b></span></span></span></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="5" class="cell_ab team-home  " ><span class="padl <?php if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->home_team?></span></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sc score-home"><?=$row1->home_score?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sd part-bottom"><?=$row1->home_result[0]->p1?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_se part-bottom"><?=$row1->home_result[0]->p2?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sf part-bottom"><?=$row1->home_result[0]->p3?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2" class="cell_oq comparison">&nbsp;</td>

							 </tr>

							<tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="ice_tab_cnt tr-first no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_2'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr} " style="cursor: pointer;">

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="5" class="cell_ac team-away" ><span class="padl <?php if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->away_team?></span></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_ta score-away "><?=$row1->away_score?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_tb part-top"><?=$row1->away_result[0]->p1?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_tc part-top"><?=$row1->away_result[0]->p2?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_td part-top"><?=$row1->away_result[0]->p3?></td>
							  
							</tr>

							<tr class="blank-line">

							  <td colspan="16"></td>

							</tr>

                                   

                              <?php 

                             // echo $k."=".count($list);

                                 ///this is used if it's last column   

                              if($k == (count($llist)-1) ) {  

                              ?> 

                               </tbody>

                              </table>

										  <?php }  } }  ?>

                                            

							</div>

							<!-----Tab Content-3---->

							<div id="tab-3" class="fs-table tab-content">
<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  
                        

                                 $flist = array();

                                 $flist = array_map(function($val){

                                          if($val->status_text == 'Bitti'){

                                             return $val;

                                          }

                                          },$list);

                                 $flist = array_filter($flist);

                                 $flist = array_values($flist);



                                 $oldNameCount = 0;

                                 $oldName1 = "";

                              foreach($flist as $k=>$row1 ) {



                                  ///this is to check name if name is not same from previous than create new one 

                              if($oldName1!=$row1->stage_id){

                              $oldName1 = $row1->stage_id;

                              $oldNameCount++;

                              ////if new name than close the old table from prev name 

                                if ($oldNameCount==2) {

                                 $oldNameCount = 0;

                                 ?>

                                   </tbody>

                              </table>

                                 <?php

                               }

                              ?>                       

                              <?php $parentID=$row1->id; ?>
 <table class="soccer odds {str_class}" id="{parent}_show<?=$parentID?>" width="100%">
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>")' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="name"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title="<?=$row1->country?>"></span><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
<?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span  class="leagu_tble" style="float:right" onclick="openLeague('<?=$url?>')">LeagueTable</span>
                                       </td>

                                    </tr>

                              </thead>

                              <tbody>

                              <?php  } ?>

							   <tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="tr-first bef_arrw no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_1'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr}  " style="cursor: pointer;">

							  <td rowspan="2" colspan="1" class="cell_ib icons left">   <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>")'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  rowspan="2"  colspan="2" class="cell_ad time"><?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="Color_anited">
										 <b></b> 
										</span>
									   <?php } ?><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2"  colspan="2"  class="cell_aa timer"><span><?=$row1->status_text?></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="5" class="cell_ab team-home  " ><span class="padl <?php if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->home_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_sc score-home"><?=$row1->home_score?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sd part-bottom"><?=$row1->home_result[0]->p1?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_se part-bottom"><?=$row1->home_result[0]->p2?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_sf part-bottom"><?=$row1->home_result[0]->p3?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2" class="cell_oq comparison">
							  <?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"></span>
									   <?php } ?>
							 </td>

							</tr>

							<tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="ice_tab_cnt tr-first no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_2'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr} " style="cursor: pointer;">

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="5" class="cell_ac team-away" ><span class="padl <?php if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->away_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_ta score-away "><?=$row1->away_score?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_tb part-top"><?=$row1->away_result[0]->p1?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_tc part-top"><?=$row1->away_result[0]->p2?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_td part-top"><?=$row1->away_result[0]->p3?></td>
							  
							</tr>

							<tr class="blank-line">

							  <td colspan="16"></td>

							</tr>

                                   

                              <?php 

                             // echo $k."=".count($list);

                                 ///this is used if it's last column   

                              if($k == (count($flist)-1) ) {  

                              ?> 

                               </tbody>

                              </table>

										  <?php }  } }  ?>

                                            

							</div>

							

							<!-----Tab Content-4---->

							<div id="tab-4" class="fs-table tab-content">
<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  

                                 $plist = array();

                                 $plist = array_map(function($val){

                                          if($val->status_text == 'Ertelendi'){

                                             return $val;

                                          }

                                          },$list);

                                 $plist = array_filter($plist);

                                 $plist = array_values($plist);



                                 $oldNameCount = 0;

                                 $oldName1 = "";

                              foreach($plist as $k=>$row1 ) {



                                  ///this is to check name if name is not same from previous than create new one 

                              if($oldName1!=$row1->stage_id){

                              $oldName1 = $row1->stage_id;

                              $oldNameCount++;

                              ////if new name than close the old table from prev name 

                                if ($oldNameCount==2) {

                                 $oldNameCount = 0;

                                 ?>

                                   </tbody>

                              </table>

                                 <?php

                               }

                              ?>                       

                              <?php $parentID=$row1->id; ?>
 <table class="soccer odds "  width="100%">
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>")' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="name"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title="<?=$row1->country?>"></span><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
<?php $url = base_url().$game.'/iframe/'.url_title($row1->country,"dash",TRUE).'/'.url_title($row1->stage_name,"dash",TRUE); ?>
                                <span  class="leagu_tble" style="float:right" onclick="openLeague('<?=$url?>')">LeagueTable</span>
                                       </td>

                                    </tr>

                              </thead>

                              <tbody>

                              <?php  } ?>

							   <tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="tr-first bef_arrw no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_1'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr}  " style="cursor: pointer;">

							  <td rowspan="2" colspan="1" class="cell_ib icons left">    <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>")'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" ></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2"  colspan="2" class="cell_ad time"><?php  if($row1->status_text != 'Bitti' && $row1->status_text !='Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="Color_anited">
										 <b></b> 
										</span>
									   <?php } ?><?=$row1->starttime?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2"  colspan="2"  class="cell_aa timer"><span><?=$row1->status_text?></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="5" class="cell_ab team-home  " ><span class="padl <?php if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->home_team?></span></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_sc score-home"><?=$row1->home_score?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_sd part-bottom"><?=$row1->home_result[0]->p1?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_se part-bottom"><?=$row1->home_result[0]->p2?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_sf part-bottom"><?=$row1->home_result[0]->p3?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");' rowspan="2" colspan="2" class="cell_oq comparison">&nbsp;</td>

							</tr>

							<tr id="<?=$parentID?>"  title="<?=$row1->eventname?>"  class="ice_tab_cnt tr-first no-service-info stage-finished <?=$game.'_event_'.$row1->id.'_2'?> childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?> <?=$parentID?> {str_child_class} {show_ck_tr}  " style="cursor: pointer;">

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="5" class="cell_ac team-away" ><span class="padl <?php if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->away_team?></span></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_ta score-away "><?=$row1->away_score?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_tb part-top"><?=$row1->away_result[0]->p1?></td>

							  <td  onclick='detailPopup("<?=$row1->id?>");' colspan="1" class="cell_tc part-top"><?=$row1->away_result[0]->p2?></td>

							  <td onclick='detailPopup("<?=$row1->id?>");'  colspan="1" class="cell_td part-top"><?=$row1->away_result[0]->p3?></td>
							  
							</tr>

							<tr class="blank-line">

							  <td colspan="16"></td>

							</tr>

                                   

                              <?php 

                             // echo $k."=".count($list);

                                 ///this is used if it's last column   

                              if($k == (count($plist)-1) ) {  

                              ?> 

                               </tbody>

                              </table>

										  <?php }  }  } ?>

                        

           

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
