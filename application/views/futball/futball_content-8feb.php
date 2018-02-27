
                     <div id="fsbody" class="flashscore futball_main-top">


                        <div id="fsi"></div>
                        <div id="fscon">
                            <div class="top_nav-mb">
                           <ul class="ifmenu live-menu">
                              <li class="selected"><a data-target=".maintable" class="onetab">Hepsi</a></li>
                              <li><a data-target=".canli" class="onetab">Canlı</a></li>

                              <li><a data-target=".Bitti" class="onetab">Bitmiş</a></li>

                              <li><a data-target=".Başlamadı" class="onetab">Fikstür</a></li>

                              <li><a data-target=".mygames" class="onetab">Oyunlarım <span id="mygames-count">0</span></a></li>
                           </ul>
						   </div>

						   <div class="select_drp-dwn">
						    <?php $this->load->view('common/datepicker') ; ?>
						   </div>



                           <div id="tab-1" class="fs-table tab-content" style=" display:block;">
                              <?php
                              ob_start() ;
                              if (empty($list)) {
                                $this->load->view("common/nomatch") ;
                              }
                              else {
                                ?>
							  <div class="odds-content">
                                  <?php
                                  $oldNameCount = 0 ;
                                  $oldName1 = "" ;
                                  $mlm = 1 ;
                                  $textData = "";
                                  $data_array_keys = array() ;
                                  $duplicateHandler = array() ;
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

                                  //print_r($list1);
                                 // foreach ($listNewN as $cou => $list1) :
                                     $list1 =  $listNewN[$c->name.$league1->name];
                                     $listN1 =  str_replace(" ","",$c->name.$league1->name);

                                  ///now make the loop for the country we do have
                                   //  $oldName1 = "";
                                     $statusText = "maintable ";
                                    foreach ($list1 as $k => $row1) {
                                     //   print_r($row1);
                                        $liveText = "";
                               $liveTextclass = "";
                                if ($row1->status_text != 'Bitti' && $row1->status_text != 'Ertelendi' && $row1->gameStarted != '' && $row1->gameEnded == '') {
                                    ob_start(); $liveTextclass = "canli" ?>
										<span style="" class="Color_anited">
										 <b></b>
										</span>
									   <?php $liveText = ob_get_clean();
                                                }
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
								      <?php  ?>
         <table class="soccer maintable mobile-vr odds {str_class} pushLeague_in<?= $listN1 ?>   LeaguePushID_in" colgroup="" id="{parent}_show<?= $listN1 ?>" width="100%">
                                 <colgroup>
                                    <col width="24">
                                    <col width="47">
                                    <col width="80">
                                    <col width="176">
                                    <col width="50">
                                    <col width="176">
                                    <col width="28">
                                 </colgroup>
                              <thead>
                                    <tr class="league l_1_WbuOhZRa maintable" >
                                       <td colspan="1" class="head_aa ">
                        <input type="checkbox" onchange='mygames("parent_<?= $listN1 ?>")' id="parent_<?= $listN1 ?>" class="checkbox-custom" >

                                       </td>

                                       <td colspan="7" class="head_ab left project-bonus-border "><span class="country left"> <span class="flag flag-<?= strtolower($row1->flag) ?> left-odds" title=""></span><span class="name"><span class="country_part"><?= $row1->country ?>: </span><span class="tournament_part"> <?=$league1->name ?> </span></span>
								<div class="right_country">
							  <span data-flag="<?= $row1->flag ?>" data-country='<?= $row1->country ?>' data-stage_id='<?= $row1->stage_id ?>' data-stage_name='<?= $row1->stage_name ?>' data-parentid='<?= $listN1 ?>'  onclick="pushLeague(this)" class="{startclass} showme<?= $parentID ?> rshowme<?= $parentID ?> toggleMyLeague 1_3_EwJVdqzn"  ></span>

								<?php $url = base_url() . $game . '/iframe/' . url_title($row1->country, "dash", TRUE) . '/' . url_title($row1->stage_name, "dash", TRUE) . '/puan-durumu' ; ?>
                                <span class="leagu_tble" style="float:right" onclick="openLeague('<?= $url ?>')">LeagueTable</span></div>

									   </span>
                                       </td>
                                    </tr>
                              </thead>
                              <tbody class="data_table_innr">
                              <?php }  $statusText .= " ".$row1->status_text." ".$liveTextclass;  ?>

							  <tr id="<?= $row1->id ?>" title="<?= $row1->eventname ?>" class="<?= $game . '_event_' . $row1->id." ".$liveTextclass ?> maintable  tr-first even stage-scheduled {str_child_class} <?php echo $row1->status_text; ?> {show_ck_tr} childRwckShow_<?= $row1->id ?> parentRwckShow_<?= $listN1 ?> <?= $listN1 ?>" style="cursor:pointer;"  >
                                       <td class="cell_ib icons left ">
                                          <span class="icons left clr_chnge">
                                             <span class="tomyg icon0">
				<input type="checkbox" value="<?= $row1->id ?>" onchange='mygames("child_<?= $row1->id ?>,<?= $listN1 ?>")'  class="checkbox-custom checkbox parent_<?= $listN1 ?> child_<?= $row1->id ?>" >

                                             </span>
                                          </span>
                                       </td>
                                       <td class="cell_ad time " onclick='detailPopup("<?= $row1->id ?>");'>
									  <?php echo $liveText; ?>
									   <?= $row1->starttime ?>
									   </td>
                                       <td class="cell_ad time " onclick='detailPopup("<?= $row1->id ?>");'><?= $row1->status_text ?></td>
                                       <td colspan="2" class="cell_ab team-home "   onclick='detailPopup("<?= $row1->id ?>");'><span class="padl <?php if ($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score) { echo "bold" ; } ?>"><?= $row1->home_team ?><span style="display:none;" class="mobile_only_score1"><?= $row1->home_score ?></span>
									   <span style="display:none;" class="mobile_only_score1 ply_btn"><img src="<?php echo base_url('assets/') ; ?>images/play-icn.png" alt=""></span>

									   </span></td>
                                       <td onclick='detailPopup("<?= $row1->id ?>");' class="cell_sa score "><?= $row1->home_score ?> - <?= $row1->away_score ?></td>
                                       <td colspan="2" onclick='detailPopup("<?= $row1->id ?>");' class="cell_ac team-away "><span class="padl <?php if ($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score) { echo "bold" ; } ?>"><?= $row1->away_team ?> <span style="display:none;" class="mobile_only_score2"><?= $row1->away_score ?></span>
									   <span style="display:none;" class="mobile_only_score1 ply_btn"><img src="<?php echo base_url('assets/') ; ?>images/play-icn.png" alt=""></span>
									   </span></td>
									   <td class="live_lst" onclick='detailPopup("<?= $row1->id ?>");'>

									   </td>

                                 </tr>
                                        <?php
                                  // echo $k."=".count($list);
                                  ///this is used if it's last column
                                        if ($k == (count($list1) - 1)) {
                                                $duplicateHandler[]   = $c->name.$league1->name;
                                                $duplicateHandler[]   = $parentID;
                                          ?>
                               </tbody>
                              </table>
                              <?php
                                 $textData = ob_get_clean();
                                                   $textData = str_replace("{str_class}",$statusText,$textData);
                                                   echo $textData;
                               $statusText = "";
                               } }
                            // endforeach ;
                             endforeach ;
                             }
                              endforeach ;
                              ?>
                              </div>
							      <?php
							    }
							   $duplicate = ob_get_clean() ;
							    $duplicate1 = str_replace(array('{str_class}', '{parent}', "{pushLeague}"), array("", "", "pushLeague"), $duplicate) ;
							    echo $duplicate1 ;
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

});
</script>
