<div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                       <div class="icehocky_table_main" id="fscon">
					      <div class="top_nav-mb">
						  <span class="selected-mob">Hepsi</span>

                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
							  

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
         <table class="soccer odds {str_class} show_parent_<?=$parentID?> " id="{parent}_show<?=$parentID?>"  width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="12" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds  flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name ?>"></span><span class="name"><span class="country_part"></span><span class="tournament_part"> <?=$row1->stage_name.'-'.$row1->name ?> </span></span></span>
									   <span style="float:right;margin-right:1%;">
										Start Time : <?=$row1->startdate.'-'.$row1->starttime?>
									   </span>
                                       </td>
                                    </tr>
									<tr class="bef_arrw league l_1_WbuOhZRa">
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="11" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>-<?=$row1->startdate ?>,  </span><span class="tournament_part"> <?=$row1->pro[0]->sname.' - '.$row1->pro[0]->ename ?> </span> ( <?=$row1->pro[0]->km?>Km )  - <?=$row1->status_text?></span></span>
									   <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $participants): ?>  
							<tr id="<?=$parentID?>" onclick='detailPopup("<?=$row1->id?>","<?=url_title($row1->name,"dash",true)?>","<?=url_title($participants->name,"dash",true)?>","<?=$participants->id ?>");' class="tr-first no-service-info cursor stage-finished pointer show_id_<?=$participants->rank?> <?=$game.'_event_'.$row1->id.'_1'?>  "  <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td class="cell_ib icons left"></td>
							  <td class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left"><?=$participants->name ?></td>
							  <td colspan="5" class="cell_ad time"><?=$participants->duration ?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach; if(!empty($row1->participants)){ ?>
							<tr id="" class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="12" class="cell_ad time" style="text-align:center"><a class="show_more" style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$parentID?>)">Daha Encounters yükle <span class="arrow"></span></a></td>
							</tr>
							  <?php } ?>
							<tr class="blank-line">
							  <td colspan="12"></td>
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
										  <?php } 
								  $duplicate = ob_get_clean();
								  $duplicate1 = str_replace(array('{str_class}','{parent}',"{pushLeague}"),array("","","pushLeague"),$duplicate);
								  echo $duplicate1;
								?> 
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
                                 <table class="soccer odds  show_parent_<?=$parentID?> " id=""  width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="12" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name ?>"></span><span class="name"><span class="country_part"></span><span class="tournament_part"> <?=$row1->stage_name.'-'.$row1->name ?> </span></span></span>
									   <span style="float:right;margin-right:1%;">
										Start Time : <?=$row1->startdate.'-'.$row1->starttime?>
									   </span>
                                       </td>
                                    </tr>
									<tr class="league l_1_WbuOhZRa" style="background:#9c9c9c !important;" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="11" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>-<?=$row1->startdate ?>,  </span><span class="tournament_part"> <?=$row1->pro[0]->sname.'-'.$row1->pro[0]->ename ?> </span> ( <?=$row1->pro[0]->km?>Km ) </span></span>
									  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									  
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $participants): ?>  
							<tr  onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer show_id_<?=$participants->rank?>   "  <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td class="cell_ib icons left"></td>
							  <td class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left"><?=$participants->name ?></td>
							  <td colspan="5" class="cell_ad time"><?=$participants->duration ?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach;?>
							<tr id=""  class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="12" class="cell_ad time" style="text-align:center"><a class="show_more" style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$parentID?>)">Daha Encounters yükle <span class="arrow"></span></a></td>
							</tr>
							<tr class="blank-line">
							  <td colspan="12"></td>
							</tr>

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
                                <table class="soccer odds {str_class} show_parent_<?=$parentID?> " id="{parent}_show<?=$parentID?>"  width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="12" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name ?>"></span><span class="name"><span class="country_part"></span><span class="tournament_part"> <?=$row1->stage_name.'-'.$row1->name ?> </span></span></span>
									   <span style="float:right;margin-right:1%;">
										Start Time : <?=$row1->startdate.'-'.$row1->starttime?>
									   </span>
                                       </td>
                                    </tr>
									<tr class="league l_1_WbuOhZRa" style="background:#9c9c9c !important;" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="11" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>-<?=$row1->startdate ?>,  </span><span class="tournament_part"> <?=$row1->pro[0]->sname.'-'.$row1->pro[0]->ename ?> </span> ( <?=$row1->pro[0]->km?>Km ) </span></span>
									  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									  
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $participants): ?>  
							<tr id="<?=$parentID?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer show_id_<?=$participants->rank?>   "  <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td class="cell_ib icons left"></td>
							  <td class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left"><?=$participants->name ?></td>
							  <td colspan="5" class="cell_ad time"><?=$participants->duration ?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach;?>
							<tr id=""  class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="12" class="cell_ad time" style="text-align:center"><a class="show_more" style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$parentID?>)">Daha Encounters yükle <span class="arrow"></span></a></td>
							</tr>
							<tr class="blank-line">
							  <td colspan="12"></td>
							</tr>

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
								$duplicate1 = str_replace(array('{str_class}','{parent}','{startclass}',"showMe(",'showMe','LeaguePushID_in','{pushLeague}'),array("display_none","parent","toggleMyLeague_icn","mygames(",'',"LeaguePushID_my",'removeLeague'),$duplicate);
								echo $duplicate1;?>
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
	
	/* // On Click Add class function for Table Star
	$(".toggleMyLeague").click(function() {  
		$(this).toggleClass("toggleMyLeague_icn");
	}); */
});
</script>						 
                