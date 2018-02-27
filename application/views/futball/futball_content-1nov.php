


                     <div id="fsbody" class="flashscore">


                        <div id="fsi"></div>
                        <div id="fscon">

                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
                              <li><a href="#tab-2">Canlı</a></li>

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
										  }else{
								?>
							  <div class="odds-content">
                              <?php
                                  $oldNameCount = 0;
                                  $oldName1 = "";$mlm = 1;
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
                                    <tr class="league l_1_WbuOhZRa " >
                                       <td colspan="1" class="head_aa ">
                                         
                                                
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>"),showMe("<?=$parentID?>");' id="parent_<?=$parentID?>" class="checkbox-custom" >
						
						
                                               
                                             
                                         
                                       </td>

                                       <td colspan="6" class="head_ab left project-bonus-border "><span class="country left"> <span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>
							  <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>

									   </span>
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } ?>
							  <tr id="<?=$parentID?>" title="<?=$row1->eventname?>" class="<?=$game.'_event_'.$row1->id?>  tr-first even stage-scheduled {str_child_class} {show_ck_tr} childRwckShow_<?=$row1->id?> parentRwckShow_<?=$parentID?>" style="cursor:pointer;"  >
                                       <td class="cell_ib icons left ">
                                          <span class="icons left clr_chnge">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td class="cell_ad time " onclick='detailPopup("<?=$row1->id?>");'><?=$row1->starttime?></td>
                                       <td class="cell_ad time " onclick='detailPopup("<?=$row1->id?>");'><?=$row1->status_text?></td>
                                       <td  class="cell_ab team-home "   onclick='detailPopup("<?=$row1->id?>");'><span class="padl <?php if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->home_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_sa score "><?=$row1->home_score?> - <?=$row1->away_score?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away "><span class="padl <?php if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->away_team?></span></td>
									   <td   onclick='detailPopup("<?=$row1->id?>");'>
									   <?php  if($row1->status_text != 'Finished' && $row1->status_text !='Postponed' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr">
										 <b></b>
										 <h3>LIVE</h3>
										</span>
									   <?php } ?>
									   </td>
									   
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
                                 $llist = array_map(function($val){
                                          if($val->status_text != 'Finished' && $val->status_text !='Postponed' && $val->gameStarted != '' && $val->gameEnded==''){
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
                              <table class="soccer odds" colgroup="" width="100%">
                                 <colgroup>
                                    <col width="24">
                                    <col width="47">
                                    <col width="80">
                                    <col width="176">
                                    <col width="50">
                                    <col width="176">

                                 </colgroup>
                              <thead>

                                    <tr class="league l_1_WbuOhZRa ">
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");,showMe("<?=$parentID?>")' id="parent_<?=$parentID?>" class="checkbox-custom" >

                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="6" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
                                       </td>

                                    </tr>

                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr  title="<?=$row1->eventname?>"  class="<?=$game.'_event_'.$row1->id?> tr-first even stage-scheduled" style="cursor:pointer;"  >
                                       <td onclick='detailPopup("<?=$row1->id?>");'  class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0 clr_chnge">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
			   
                                             </span>
                                          </span>
                                       </td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ad time "><?=$row1->starttime?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");'  class="cell_ad time "><?=$row1->status_text?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_sa score "><?=$row1->home_score?> - <?=$row1->away_score?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away "><span class="padl"><?=$row1->away_team?></span></td>
									   <td   onclick='detailPopup("<?=$row1->id?>");'>
									   <?php  if($row1->status_text != 'Finished' && $row1->status_text !='Postponed' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"><b></b>
										 <h3>LIVE</h3></span>
									   <?php } ?>
									   </td>
                                    </tr>
                              <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($llist)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
										  <?php }  }  } ?>
							</div>
							<!-----Tab Content-3---->
							<div id="tab-3" class="fs-table tab-content">
							<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
							<?php
                                 $flist = array();
                                 $flist = array_map(function($val){
                                          if($val->status_text == 'Finished'){
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
                              <table class="soccer odds" colgroup="" width="100%">
                                 <colgroup>
                                    <col width="24">
                                    <col width="47">
                                    <col width="80">
                                    <col width="176">
                                    <col width="50">
                                    <col width="176">
                                    
                                 </colgroup>
                              <thead>
                                    
                                    <tr class="league l_1_WbuOhZRa ">
                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");,showMe("<?=$parentID?>")' id="parent_<?=$parentID?>" class="checkbox-custom" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="6" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
                                       </td>
                                      
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr title="<?=$row1->eventname?>"  class="tr-first even stage-scheduled <?=$game.'_event_'.$row1->id?>"  style="cursor:pointer;"  >
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0 clr_chnge">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>"  >

                                             </span>
                                          </span>
                                       </td>
                                       <td  onclick='detailPopup("<?=$row1->id?>");' class="cell_ad time "><?=$row1->starttime?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ad time "><?=$row1->status_text?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_sa score "><?=$row1->home_score?> - <?=$row1->away_score?></td>
                                       <td  onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away "><span class="padl"><?=$row1->away_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");'>
									    <?php  if($row1->status_text != 'Finished' && $row1->status_text !='Postponed' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"><b></b>
										 <h3>LIVE</h3></span>
									   <?php } ?>
									   </td>
                                    </tr>
                              <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($flist)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
										  <?php }  } } ?>
                                            
							</div>
							
							<!-----Tab Content-4---->
							<div id="tab-4" class="fs-table tab-content">
							<?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
							<?php
                                 $plist = array();
                                 $plist = array_map(function($val){
                                          if($val->status_text == 'Postponed'){
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
                              <table class="soccer odds" colgroup=""  width="100%">
                                 <colgroup>
                                    <col width="24">
                                    <col width="47">
                                    <col width="80">
                                    <col width="176">
                                    <col width="50">
                                    <col width="176">
                                 </colgroup>
                              <thead>
                                    
                                    <tr class="league l_1_WbuOhZRa ">
                                     <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" class="checkbox-custom" onchange='mygames("parent_<?=$parentID?>"),showMe("<?=$parentID?>");'>
						
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span><span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
                                       </td>
                                     
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr  title="<?=$row1->eventname?>"  class="tr-first even stage-scheduled <?=$game.'_event_'.$row1->id?>" style="cursor:pointer;" >
                                     <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0 clr_chnge">
              <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox-custom checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
			 
			  
                                             </span>
                                          </span>
                                       </td>
                                       <td class="cell_ad time "><?=$row1->starttime?></td>
                                       <td class="cell_ad time "><?=$row1->status_text?></td>
                                       <td class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td class="cell_sa score "><?=$row1->home_score?> - <?=$row1->away_score?></td>
                                       <td class="cell_ac team-away "><span class="padl"><?=$row1->away_team?></span></td>
                                      
                                    </tr>
                              <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($plist)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
										  <?php }  } } ?>
                        
           
							</div>
							
							
							<!-----Tab Content-6---->
							<div id="tab-6" class="fs-table tab-content mygamesTab">
								<?php
								$duplicate1 = str_replace(array('{str_class}','{parent}',"showMe(",'showMe','{str_child_class}','LeaguePushID_in','{pushLeague}',"childRwckShow_","{show_ck_tr}"),array("display_none","parent","hide_me(",'',"","LeaguePushID_my",'removeLeague',"childRwckHide_","display_none"),$duplicate);
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
  
});
</script>						 
                