
                    
                     
                     <div id="fsbody" class="flashscore">
		
			   
                        <div id="fsi"></div>
                        <div id="fscon">
                      
                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
                              <li><a href="#tab-2">Canlı</a></li>
							  
                              <li><a href="#tab-3">Bitmiş</a></li>
							  
                              <li><a href="#tab-4" >Programlar</a></li>
							  
                              <li><a href="#tab-6">Oyunlarım (<span id="mygames-count">0</span>)</a></li>
							  
							  <li id="ifmenu-calendar" class="has-tomorrow has-yesterday">
							  
							  <span class="day yesterday"><span class="arrow"></span></span>
							  
							  <?php 
									echo "<select class=\"home_selct\" name=\"proposed_deliver_date\" id='datechange' onchange=\"changeDate()\"><option>-Select-</option>";        
									for($i = 0; $i < 7; $i++) { 
									// Get the current year, month, and day 
									$year = date('y'); 
									$mon = date('m'); 
									$day = date('d') + $i; 
									// Make sure we don't have too many days for the current month...if we do, subtract the two 
									if($day > date('t')) { 
										$day -= date('t'); 
										// We've increased a month too, by the way 
										$mon += 1; 
										// Make sure we compensate for a new year 
										if($mon > 12) { $mon = 1; $year++; } 
									} 
									// Now make a timestamp of the current information 
									$stamp = mktime(0,0,0,$mon,$day,$year); 
									// Substitue this with your dropdown code 
									echo  "<option value='".date('Y-m-d',$stamp)."' ".(date('Y-m-d',$stamp)==$date?"selected":'')." >". date('D M d', $stamp)."</option>"; 
									}  
									echo "</select>";
							?>
							 
							 <span class="day tomorrow"><span class="inner"><span class="arrow"></span></span></span>
							 
							  </li>
							  
                  
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
                              if($oldName1!=$row1->stage_name){
                              $oldName1 = $row1->stage_name;
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
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>"),showMe("<?=$parentID?>");' id="parent_<?=$parentID?>" class="toggleMyLeague" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="6" class="head_ab left project-bonus-border "><span class="country left"> <span class="flag small small-<?=$row1->flag?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span>
							  <span onclick="showMe('<?=$parentID?>'),{pushLeague}('<?=$row1->flag?>','<?=$row1->country?>','<?=$row1->stage_id?>','<?=$row1->stage_name?>','<?=$parentID?>')" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   
									   </span>
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php $mlm++; } ?>
							  <tr id="<?=$parentID?>" title="<?=$row1->eventname?>"   class="<?=$game.'_event_'.$row1->id?>  tr-first even stage-scheduled {str_child_class}" style="cursor:pointer;"  >
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td class="cell_ad time "   onclick='detailPopup("<?=$row1->id?>");'><?=$row1->starttime?></td>
                                       <td class="cell_ad time "   onclick='detailPopup("<?=$row1->id?>");'><?=$row1->status_text?></td>
                                       <td  class="cell_ab team-home "   onclick='detailPopup("<?=$row1->id?>");'><span class="padl <?php if($row1->home_score > $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->home_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_sa score ">(<?=$row1->home_score?> - <?=$row1->away_score?>)</td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away "><span class="padl <?php if($row1->home_score < $row1->away_score && $row1->home_score != $row1->away_score){echo "bold";} ?>"><?=$row1->away_team?></span></td>
									   <td   onclick='detailPopup("<?=$row1->id?>");'>
									   <?php  if($row1->status_text != 'Finished' && $row1->status_text !='Postponed' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"></span>
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");,showMe("<?=$parentID?>")' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="6" class="head_ab left project-bonus-border "><span class="country left"><span class="flag small small-<?=$row1->flag?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span><span onclick="showMe('<?=$parentID?>')" class="showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
                                       </td>
                                      
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr  title="<?=$row1->eventname?>"   class="<?=$game.'_event_'.$row1->id?> tr-first even stage-scheduled" style="cursor:pointer;"  >
                                       <td onclick='detailPopup("<?=$row1->id?>");'  class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ad time "><?=$row1->starttime?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");'  class="cell_ad time "><?=$row1->status_text?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_sa score ">(<?=$row1->home_score?> - <?=$row1->away_score?>)</td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away "><span class="padl"><?=$row1->away_team?></span></td>
									   <td   onclick='detailPopup("<?=$row1->id?>");'>
									   <?php  if($row1->status_text != 'Finished' && $row1->status_text !='Postponed' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"></span>
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
                              if($oldName1!=$row1->stage_name){
                              $oldName1 = $row1->stage_name;
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");,showMe("<?=$parentID?>")' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="6" class="head_ab left project-bonus-border "><span class="country left"><span class="flag small small-<?=$row1->flag?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span><span onclick="showMe('<?=$parentID?>')" class="showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
                                       </td>
                                      
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr title="<?=$row1->eventname?>"  class="tr-first even stage-scheduled <?=$game.'_event_'.$row1->id?>"  style="cursor:pointer;"  >
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td  onclick='detailPopup("<?=$row1->id?>");' class="cell_ad time "><?=$row1->starttime?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ad time "><?=$row1->status_text?></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");' class="cell_sa score ">(<?=$row1->home_score?> - <?=$row1->away_score?>)</td>
                                       <td  onclick='detailPopup("<?=$row1->id?>");' class="cell_ac team-away "><span class="padl"><?=$row1->away_team?></span></td>
                                       <td   onclick='detailPopup("<?=$row1->id?>");'>
									    <?php  if($row1->status_text != 'Finished' && $row1->status_text !='Postponed' && $row1->gameStarted != '' && $row1->gameEnded==''){ ?>
										<span style="" class="live-centre-inr"></span>
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
                              if($oldName1!=$row1->stage_name){
                              $oldName1 = $row1->stage_name;
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>"),showMe("<?=$parentID?>");' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag small small-<?=$row1->flag?> left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span><span onclick="showMe('<?=$parentID?>')" class="showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
                                       </td>
                                     
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr  title="<?=$row1->eventname?>"  class="tr-first even stage-scheduled <?=$game.'_event_'.$row1->id?>" style="cursor:pointer;" >
                                     <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
              <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>"),showMe("<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td class="cell_ad time "><?=$row1->starttime?></td>
                                       <td class="cell_ad time "><?=$row1->status_text?></td>
                                       <td class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td class="cell_sa score ">(<?=$row1->home_score?> - <?=$row1->away_score?>)</td>
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
								$duplicate1 = str_replace(array('{str_class}','{parent}','{startclass}',"showMe(",'showMe','{str_child_class}','LeaguePushID_in','{pushLeague}'),array("display_none","parent","toggleMyLeague_icn","hide_me(",'',"","LeaguePushID_my",'removeLeague'),$duplicate);
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
	$(".toggleMyLeague").click(function() {  
		$(this).toggleClass("toggleMyLeague_icn");
	});
});
</script>						 
                