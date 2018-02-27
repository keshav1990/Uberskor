<div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
                      
                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
                              <li><a href="#tab-3">Bitmiş</a></li>

                              <li><a href="#tab-4" >Fikstür</a></li>

                              <li><a href="#tab-6">Oyunlarım <span id="mygames-count">0</span></a></li>
							  <?php $this->load->view('common/datepicker');?>

                  
                           </ul>
						   
						   
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
				<table class="soccer odds {str_class} pushLeague_in<?=$parentID?> LeaguePushID_in" id="{parent}_show<?=$parentID?>" width="100%">
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="9" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> - <?=$row1->name?>  </span></span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span></span>
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
                                       <td colspan="9" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>,<?=$row1->startdate ?>, <?=$row1->discipline?>, <?=$row1->groupName?>-(<?=$row1->round?>) </span> </span></span>
                                       </td>
                                    </tr>
									<tr class="white"> 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="6" class="cell_ib time"><?=mb_convert_encoding("Sürücü","UTF-8")?></td>
									  <td colspan="1" class="cell_ad time">Duration</td>
									  <td colspan="1" class="cell_ad time">Startnumber</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } foreach($row1->participants as $participant): if($participant->rank!=''){ ?>
                                    <tr id="<?=$parentID?>" onclick='detailPopup("<?=$row1->id?>");' class="tr-first even " style="cursor:pointer;">
                                       <td colspan="1" class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
              
                                             </span>
                                          </span>
                                       </td>
                                       <td  colspan="1" class="cell_ad time "><?=$participant->rank?></td>
                                       <td  colspan="6" class="cell_ad time "><?=$participant->racer_name?></td>
                                       <td  colspan="1" class="cell_ac team-away "><?=$participant->duration?></td>
									   <td  colspan="1" class="cell_ad time "><?=$participant->startnumber?></td>
                                    </tr>
                              <?php } endforeach; ?>
							  <tr class="blank-line">
							  <td colspan="10">
							</tr>
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
                              if($oldName1!=$row1->id){
                              $oldName1 = $row1->id;
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                        <td colspan="9" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> - <?=$row1->name?>  </span></span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
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
                                       <td colspan="9" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>,<?=$row1->startdate ?>, <?=$row1->discipline?>, <?=$row1->groupName?>-(<?=$row1->round?>) </span> </span></span>
                                       </td>
                                    </tr>
									<tr class="white" style="background:#9c9c9c !important;" > 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="6" class="cell_ib time"><?=mb_convert_encoding("Sürücü","UTF-8")?></td>
									  <td colspan="1" class="cell_ad time">Point</td>
									  <td colspan="1" class="cell_ad time">Startnumber</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } foreach($row1->participants as $participant): if($participant->rank!=''){ ?>
                                    <tr onclick='detailPopup("<?=$row1->id?>");' class="tr-first even " style="cursor:pointer;">
                                       <td colspan="1" class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td  colspan="1" class="cell_ad time "><?=$participant->rank?></td>
                                       <td  colspan="6" class="cell_ad time "><?=$participant->racer_name?></td>
                                       <td  colspan="1" class="cell_ac team-away "><?=$participant->duration?></td>
									   <td  colspan="1" class="cell_ad time "><?=$participant->startnumber?></td>
                                    </tr>
                              <?php } endforeach; ?>
							  <tr class="blank-line">
							  <td colspan="10">
							</tr>
							  <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($list)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
                              <?php }  }}  ?>
                              
                                            
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
                              if($oldName1!=$row1->id){
                              $oldName1 = $row1->id;
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                         <td colspan="9" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> - <?=$row1->name?>  </span></span></span>  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
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
                                       <td colspan="9" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>,<?=$row1->startdate ?>, <?=$row1->discipline?>, <?=$row1->groupName?>-(<?=$row1->round?>) </span> </span></span>
                                       </td>
                                    </tr>
									<tr class="white" style="background:#9c9c9c !important;" > 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="6" class="cell_ib time"><?=mb_convert_encoding("Sürücü","UTF-8")?></td>
									  <td colspan="1" class="cell_ad time">Point</td>
									  <td colspan="1" class="cell_ad time">Startnumber</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } foreach($row1->participants as $participant): if($participant->rank!=''){ ?>
                                    <tr onclick='detailPopup("<?=$row1->id?>");' class="tr-first even " style="cursor:pointer;">
                                       <td colspan="1" class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td  colspan="1" class="cell_ad time "><?=$participant->rank?></td>
                                       <td  colspan="6" class="cell_ad time "><?=$participant->racer_name?></td>
                                       <td  colspan="1" class="cell_ac team-away "><?=$participant->duration?></td>
									   <td  colspan="1" class="cell_ad time "><?=$participant->startnumber?></td>
                                    </tr>
                              <?php } endforeach; ?>
							  <tr class="blank-line">
							  <td colspan="10">
							</tr>
							  <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($list)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
				  <?php }  } }?>
                              </div>
                        
							
							<!-----Tab Content-6---->
							<div id="tab-6" class="fs-table tab-content mygamesTab">
								<?php
								$duplicate1 = str_replace(array('{str_class}','{parent}',"showMe(",'showMe','{str_child_class}','LeaguePushID_in','{pushLeague}',"childRwckShow_","{show_ck_tr}","rshowme"),array("display_none","parent","mygames(",'',"","LeaguePushID_my",'removeLeague',"childRwckHide_","display_none","nrshowme"),$duplicate);
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
	// On Click Add class function for Table Star
	/* $(".toggleMyLeague").click(function() {  
		$(this).toggleClass("toggleMyLeague_icn");
	}); */
});
</script>  