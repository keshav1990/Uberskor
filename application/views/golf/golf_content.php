<div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                          <div class="icehocky_table_main" id="fscon">
						  <div class="top_nav-mb">
						  <span class="selected-mob">Hepsi</span>
                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
                              <!--<li><a href="#tab-2">Canli</a></li>-->
                              <li><a href="#tab-3">Bitmiş</a></li>

                              <li><a href="#tab-4" >Fikstür</a></li>

                              <!--li><a href="#tab-6">Oyunlarım <span id="mygames-count">0</span></a></li-->
							 

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
                                if ($oldName1 != $row1->stage_name) {
                                  $oldName1 = $row1->stage_name;
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
         <table class="soccer odds show_parent_<?=$parentID?> {str_class} pushLeague_in<?=$parentID?> LeaguePushID_in" id="{parent}_show<?=$parentID?>" width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="16" class="head_ab left project-bonus-border "><span class=" country left"><span class="name"><span class="country_part"  title=""><span class="flag  flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country?>"></span><?=$row1->ttname ?> : </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
									   <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>' onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									  
									   <span style="float:right;margin-right:1%;">
										<?=$row1->status_text?>
									   </span>
                                       </td>
                                    </tr>
									<tr id="<?=$parentID?>" class="bef_arrw league l_1_WbuOhZRa <?=$game.'_event_'.$row1->id.'_1'?> ">
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Dates:<?=$row1->starttime?>-<?=$row1->startdate ?>  </span> </span></span>
                                       </td>
									   <td colspan="2" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Par:<?=$row1->t_p[0]->par?>  </span> </span></span>
                                       </td>
									   
									   <td colspan="8" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Money:<?=$row1->t_p[0]->prize.'( '.$row1->t_p[0]->currency.' )'?>  </span> </span></span>
                                       </td>
                                    </tr>
									<tr id="<?=$parentID?>" class="ice_tab_cnt white <?=$game.'_event_'.$row1->id.'_2'?> "> 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="5" class="cell_ib time flt_left">Oyuncu</td>
									  <td colspan="1" class="cell_ad time">Par</td>
									  <td colspan="1" class="cell_ad time">Delik</td>
									  <td colspan="1" class="cell_ad time">Bugün</td>
									  <td colspan="1" class="cell_ad time">1</td>
									  <td colspan="1" class="cell_ad time">2</td>
									  <td colspan="1" class="cell_ad time">3</td>
									  <td colspan="1" class="cell_ad time">4</td>
									  <td colspan="2" class="cell_ad time">Toplam</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $key =>  $participants): ?>  
							<tr id="" onclick='detailPopup("<?=$row1->id?>","<?=url_title($row1->name,"dash",true)?>","<?=url_title($participants->player,"dash",true)?>","<?=$participants->id ?>");' class="show_id_<?=$participants->rank?> tr-first no-service-info stage-finished pointer" <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td colspan="1"class="cell_ib icons left"></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left flt_left "><span class=" flag flag-<?=strtolower($participants->flag) ?>"></span><?=$participants->player ?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->par?></td>
							  <td colspan="1" class="cell_ad time"><?=(!empty($participants->strokes4)?'F':'')?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->current_hole?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes1?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes2?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes3?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes4?></td>
							  <td colspan="2" class="cell_ad time"><?=$participants->strokes1+$participants->strokes2+$participants->strokes3+$participants->strokes4?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach;?>
							<tr id="g_3_nwMPWFSM"  class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="16" class="cell_ad time" style="text-align:center"><a style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$parentID?>)">Load more encounters</a></td>
							</tr>
							<tr class="blank-line">
							  <td colspan="16"></td>
							</tr>

                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($list) - 1)) {
                                  ?>
                               </tbody>
            </table>
                              <?php }}?>
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
							</div>
							<!-----Tab Content-3---->
							<div id="tab-3" class="fs-table tab-content">
                           <?php
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
                             if ($oldName1 != $row1->stage_name) {
                               $oldName1 = $row1->stage_name;
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
                            <table class="soccer odds" id="show_parent_<?=$parentID?>" width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="16" class="head_ab left project-bonus-border "><span class=" country left"><span class="name"><span class="country_part"  title=""><span class="flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country?>"></span><?=$row1->ttname ?> : </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
									   <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									  
                                
									   <span style="float:right;margin-right:1%;">
										<?=$row1->status_text?>
									   </span>
                                       </td>
                                    </tr>
									<tr class="league l_1_WbuOhZRa">
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="3" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Dates:<?=$row1->starttime?>-<?=$row1->startdate ?>  </span> </span></span>
                                       </td>
									   <td colspan="2" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Par:<?=$row1->t_p[0]->par?>  </span> </span></span>
                                       </td>
									   
									   <td colspan="10" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Money:<?=$row1->t_p[0]->prize.'( '.$row1->t_p[0]->currency.' )'?>  </span> </span></span>
                                       </td>
                                    </tr>
									<tr class="white"> 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="5" class="cell_ib time">Oyuncu</td>
									  <td colspan="1" class="cell_ad time">Par</td>
									  <td colspan="1" class="cell_ad time">Delik</td>
									  <td colspan="1" class="cell_ad time">Bugün</td>
									  <td colspan="1" class="cell_ad time">1</td>
									  <td colspan="1" class="cell_ad time">2</td>
									  <td colspan="1" class="cell_ad time">3</td>
									  <td colspan="1" class="cell_ad time">4</td>
									  <td colspan="2" class="cell_ad time">Toplam</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $participants): ?>  
							<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer" <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td colspan="1"class="cell_ib icons left"></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left flt_left "><span class=" flag flag-<?=strtolower($participants->flag) ?>"></span><?=$participants->player ?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->par?></td>
							  <td colspan="1" class="cell_ad time"><?=(!empty($participants->strokes4)?'F':'')?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->current_hole?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes1?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes2?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes3?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes4?></td>
							  <td colspan="2" class="cell_ad time"><?=$participants->strokes1+$participants->strokes2+$participants->strokes3+$participants->strokes4?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach;?>
							<tr id="g_3_nwMPWFSM"  class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="16" class="cell_ad time" style="text-align:center"><a style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$parentID?>)">Load more encounters</a></td>
							</tr>
							<tr class="blank-line">
							  <td colspan="16"></td>
							</tr>

                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($flist) - 1)) {
                                  ?>
                               </tbody>
                              </table>
                              <?php }}?>

							</div>

							<!-----Tab Content-4---->
							<div id="tab-4" class="fs-table tab-content">
                       <?php
                       $plist = array();
                       $plist = array_map(
                       function ($val) {
                         if ($val->status_text == 'Ertelendi') {
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
                         if ($oldName1 != $row1->stage_name) {
                           $oldName1 = $row1->stage_name;
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
                            <table class="soccer odds" id="show_parent_<?=$parentID?>" width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="16" class="head_ab left project-bonus-border "><span class=" country left"><span class="name"><span class="country_part"  title=""><span class="flag  flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country?>"></span><?=$row1->ttname ?> : </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
									   <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									  
									   <span style="float:right;margin-right:1%;">
										<?=$row1->status_text?>
									   </span>
                                       </td>
                                    </tr>
									<tr class="league l_1_WbuOhZRa">
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="3" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Dates:<?=$row1->starttime?>-<?=$row1->startdate ?>  </span> </span></span>
                                       </td>
									   <td colspan="2" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Par:<?=$row1->t_p[0]->par?>  </span> </span></span>
                                       </td>
									   
									   <td colspan="10" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part">Money:<?=$row1->t_p[0]->prize.'( '.$row1->t_p[0]->currency.' )'?>  </span> </span></span>
                                       </td>
                                    </tr>
									<tr class="white"> 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="5" class="cell_ib time">Oyuncu</td>
									  <td colspan="1" class="cell_ad time">Par</td>
									  <td colspan="1" class="cell_ad time">Delik</td>
									  <td colspan="1" class="cell_ad time">Bugün</td>
									  <td colspan="1" class="cell_ad time">1</td>
									  <td colspan="1" class="cell_ad time">2</td>
									  <td colspan="1" class="cell_ad time">3</td>
									  <td colspan="1" class="cell_ad time">4</td>
									  <td colspan="2" class="cell_ad time">Toplam</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $participants): ?>  
							<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer" <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td colspan="1"class="cell_ib icons left"></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left flt_left "><span class=" flag flag-<?=strtolower($participants->flag) ?>"></span><?=$participants->player ?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->par?></td>
							  <td colspan="1" class="cell_ad time"><?=(!empty($participants->strokes4)?'F':'')?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->current_hole?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes1?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes2?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes3?></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->strokes4?></td>
							  <td colspan="2" class="cell_ad time"><?=$participants->strokes1+$participants->strokes2+$participants->strokes3+$participants->strokes4?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach;?>
							<tr id="g_3_nwMPWFSM"  class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="16" class="cell_ad time" style="text-align:center"><a style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$parentID?>)">Load more encounters</a></td>
							</tr>
							<tr class="blank-line">
							  <td colspan="16"></td>
							</tr>

                                <?php
                              // echo $k."=".count($list);
                              ///this is used if it's last column
                                if ($k == (count($plist) - 1)) {
                                  ?>
                               </tbody>
                              </table>
                              <?php }}?>


							</div>

						

							<!-----Tab Content-6---->
							<div id="tab-6" class="fs-table tab-content mygamesTab">
								<?php
								$duplicate1 = str_replace(array('{str_class}','{parent}','{startclass}',"showMe(",'showMe','LeaguePushID_in','{pushLeague}'),array("display_none","parent","toggleMyLeague_icn","mygames(",'',"LeaguePushID_my",'removeLeague'),$duplicate);
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