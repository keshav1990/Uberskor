<div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
                      
                           <ul class="ifmenu live-menu hrs_nv">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
							  
                              <li><a href="#tab-3">Bitmiş</a></li>

                              <li><a href="#tab-4" >Fikstür</a></li>

                              <!--li class="oyunl_middle_lrn"><a href="#tab-6">Oyunlarım <span id="mygames-count">0</span></a></li-->
							   <?php $this->load->view('common/datepicker');?>
                  
                           </ul>
						   
						   
                           <div id="tab-1" class="fs-table tab-content" style=" display:block;">
                             <?php  ob_start();
							if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>  
							  <div class="odds-content">
                              <?php
                                  $oldNameCount = 0;
                                  $oldName1 = "";
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
         <table class="odds {str_class} pushLeague_in<?=$parentID?> LeaguePushID_in" id="{parent}_show<?=$parentID?>"   width="100%">
                                <thead>
                                    <tr class="league l_1_WbuOhZRa" >
                                       <td colspan="1" class="head_aa">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="country left"><span class="flag  flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="tournament_part"> <?=$row1->stage_name?> : <?=$row1->venue?></span></span></span> <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'   onclick="{pushLeague}(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   
									   <span style="float:right;margin-right:1%;">
										<?php
										if($row1->status_text=="Bitti"){
											echo $row1->status_text;
										}else{
											echo "Start time ".$row1->starttime.' '.$row1->startdate;
										}
										?>
									   </span>
                                       </td>
                                    </tr>

									<tr class="bef_arrw white"> 
                                      <td colspan="1"class="cell_ib icons">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="10" class="cell_ib time">At</td>
									  <td colspan="2" class="cell_ad time">Başlangıç ​​numarası</td>
									  <td colspan="2" class="cell_ad time">olasılık</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } ?>
							  <?php foreach($row1->participants as $key =>  $participants): ?>  
								<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first ice_tab_cnt no-service-info stage-finished pointer"  >
								  <td colspan="1"class="cell_ib  "></td>
								  <td colspan="1" class="cell_ad "><?=$participants->rank ?></td>
								  <td colspan="10" class="cell_ib  " style="text-align:left;padding-left:5%;"><span class="flag flag-<?=strtolower($participants->flag)?>"></span> <?=$participants->player ?></td>
								  
								  <td colspan="2" class="cell_ad "><?=$participants->startnumber ?></td>
								  <td colspan="2" class="cell_ad "><?=$participants->horseracingodds?></td>
								</tr>
								<?php  endforeach;?>
                                
                              <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($list)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
                              <?php }  } 
								  
								?>
                              </div>
							  <?php } $duplicate = ob_get_clean();
								  $duplicate1 = str_replace(array('{str_class}','{parent}',"{pushLeague}"),array("","","pushLeague"),$duplicate);
								  echo $duplicate1; ?>
                           </div>
						  
							<!-----Tab Content-3---->
							<div id="tab-3" class="fs-table tab-content">
							<?php
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
         <table class="soccer odds" width="100%">
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

                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="country left"><span class="flag  flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="tournament_part"> <?=$row1->stage_name?> : <?=$row1->venue?></span></span></span> <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   
									   <span style="float:right;margin-right:1%;">
										<?php
										if($row1->status_text=="Bitti"){
											echo $row1->status_text;
										}else{
											echo "Start time ".$row1->starttime.' '.$row1->startdate;
										}
										?>
									   </span>
                                       </td>
                                    </tr>

									<tr class="white" style="background:#9c9c9c !important;" > 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="10" class="cell_ib time">At</td>
									  <td colspan="2" class="cell_ad time">Başlangıç ​​numarası</td>
									  <td colspan="2" class="cell_ad time">olasılık</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } ?>
							  <?php foreach($row1->participants as $key =>  $participants): ?>  
								<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer"  >
								  <td colspan="1"class="cell_ib  "></td>
								  <td colspan="1" class="cell_ad "><?=$participants->rank ?></td>
								  <td colspan="10" class="cell_ib  " style="text-align:left;padding-left:5%;"><span class="flag flag-<?=strtolower($participants->flag)?>"></span> <?=$participants->player ?></td>
								  
								  <td colspan="2" class="cell_ad "><?=$participants->startnumber ?></td>
								  <td colspan="2" class="cell_ad "><?=$participants->horseracingodds?></td>
								</tr>
								<?php  endforeach;?>
                                
                              <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($flist)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
                              <?php }  } ?>
                                            
							</div>
							
							<!-----Tab Content-4---->
							<div id="tab-4" class="fs-table tab-content">
                       <?php
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
                               <table class="soccer odds" width="100%">
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

                                       <td colspan="15" class="head_ab left project-bonus-border "><span class="country left"><span class="flag flag-<?=strtolower($row1->flag)?> left-odds" title=""></span><span class="name"><span class="tournament_part"> <?=$row1->stage_name?> : <?=$row1->venue?></span></span></span> <span data-flag="<?=$row1->flag?>" data-country='<?=$row1->country?>' data-stage_id='<?=$row1->stage_id?>' data-stage_name='<?=$row1->stage_name?>' data-parentid='<?=$parentID?>'  onclick="pushLeague(this)" class="{startclass} showme<?=$parentID?> toggleMyLeague 1_3_EwJVdqzn"  ></span>
									   
									   <span style="float:right;margin-right:1%;">
										<?php
										if($row1->status_text=="Bitti"){
											echo $row1->status_text;
										}else{
											echo "Start time ".$row1->starttime.' '.$row1->startdate;
										}
										?>
									   </span>
                                       </td>
                                    </tr>

									<tr class="white" style="background:#9c9c9c !important;" > 
                                      <td colspan="1"class="cell_ib icons ">&nbsp;</td>
									  <td colspan="1" class="cell_ad time">#</td>
									  <td colspan="10" class="cell_ib time">At</td>
									  <td colspan="2" class="cell_ad time">Başlangıç ​​numarası</td>
									  <td colspan="2" class="cell_ad time">olasılık</td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } ?>
							  <?php foreach($row1->participants as $key =>  $participants): ?>  
								<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer"  >
								  <td colspan="1"class="cell_ib icons left"></td>
								  <td colspan="1" class="cell_ad time"><?=$participants->rank ?></td>
								  <td colspan="10" class="cell_ib icons left" style="text-align:left;padding-left:5%;" ><span class="flag flag-<?=strtolower($participants->flag)?>"></span> <?=$participants->player ?></td>
								  <td colspan="2" class="cell_ad time"><?=$participants->startnumber ?></td>
								  <td colspan="2" class="cell_ad time"><?=$participants->horseracingodds?></td>
								</tr>
								<?php endforeach;?>
                              <?php 
                             // echo $k."=".count($list);
                                 ///this is used if it's last column   
                              if($k == (count($plist)-1) ) {  
                              ?> 
                               </tbody>
                              </table>
                              <?php }  } ?>
                        
           
							</div>
						
							
							<!-----Tab Content-6---->
							<div id="tab-6" class="fs-table tab-content mygamesTab">
                                 <?php
								$duplicate1 = str_replace(array('{str_class}','{parent}','{startclass}',"showMe(",'showMe','{str_child_class}','LeaguePushID_in','{pushLeague}',),array("display_none","parent","toggleMyLeague_icn","hide_me(",'',"LeaguePushID_my",'removeLeague'),$duplicate);
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