<?php
// echo "<pre>";
$top_banner = $banners[0]->image;
$mid_banner = $banners[1]->image;
$right_banner = $banners[2]->image;
$leftside_banner = $banners[3]->image;
$logo = $banners[4]->image;
$setColor = json_decode(json_encode($clrschemes[0]),true);
   $body_clr =$setColor["body_color"];
   $inner_body_color = $setColor["inner_body_color"];
   $innerbody_font_color = $setColor["innerbody_font_color"];

   $footer_color = $setColor["footer_color"];
   $footer_font_color = $setColor["footer_font_color"];

   $tbl_head_color = $setColor["table_head_color"];
   $tbl_row_color = $setColor["table_row_color"];
   $tbl_font_color = $setColor["table_font_color"];

   $sidebar_font_color = $setColor["sidebar_font_color"];
   $sidebar_color = $setColor["sidebar_color"];

   $subfooter_color = $setColor["subfooter_color"];
   $subfooter_font_color = $setColor["subfooter_font_color"];

   $tophead_color = $setColor["tophead_color"];

   $sidebar_bottomlist_color = $setColor["sidebar_bottomlist_color"];
   $sidebar_bottomlist_font_color = $setColor["sidebar_bottomlist_font_color"];

   $last_list_color = $setColor["last_list_color"];
   $last_list_font_color = $setColor["last_list_font_color"];

?>

<?php $this->load->view("common/header"); ?>

<style>    #def-form-table td input, textarea { padding: 4px 4px; margin-bottom: 8px;border-radius: 2px; }    #def-form-table td textarea {resize: none; }    #def-form-table td select  { width:159px;padding: 4px 4px;margin-bottom: 8px;border-radius: 2px;}
   .soccer #header > .content {
    background-image: url(<?php echo base_url().'uploads/banners/'.$top_banner; ?>) !important; 
    background-repeat: no-repeat;

}

   /*for body color and font color*/
      body{
         background : <?=$body_clr?>;
         color : <?=$footer_font_color?>;
      }
   /*for footer color and font color*/
      #footer,#footer a {
         background : <?=$footer_color?>;
         color : <?=$innerbody_font_color?>;
      }
      /*for top head section*/
      div#control-panel{
         background : <?=$tophead_color?>;
      }
      /*for inner body color*/
      body div.container > div.content {
         background : <?=$inner_body_color?>;
      }
      /*for side menu color and font- color*/
      .menu.country-list ul li, .menu ul li{
         background : <?=$sidebar_color?>;
         color : <?=$sidebar_font_color?>;
      }

      /*for table th color*/
      .fs-table tr.league {
         background : <?=$tbl_head_color?>;
         color : <?=$tbl_font_color?>;
      }
      /*for table tr color*/
      .fs-table tr.even {
          background : <?=$tbl_row_color?>;
          color : <?=$tbl_font_color?>;
      }
      /*for first footer*/
      #e-content {
         background : <?=$subfooter_color?>;
         color : <?=$subfooter_font_color?>;
      }
      /*for sidemenu list 2*/
      .soccer ul.country-list li{
         background : <?=$sidebar_bottomlist_color?>;
         color : <?=$sidebar_bottomlist_font_color?>;
      }
      /*for last sidemenu for partners*/
      ul.partner li {
         background: <?=$last_list_color?>;;
         color: <?=$last_list_font_color?>;;
      }	  .cursor{cursor: pointer;}	  .darkbg{background:#cacaca!important;}
	  
	  @media only screen and (max-device-width:840px){ 
 #tc-main { 
 display: -webkit-box; 
    display: -moz-box;
   display: box;
      -webkit-box-orient: vertical; 
    -moz-box-orient: vertical;
  box-orient: vertical;
	 } 
	 #mc { 
  -webkit-box-ordinal-group: 3; 
   -moz-box-ordinal-group: 3;
  box-ordinal-group: 3;
 }

 #lc {
    -webkit-box-ordinal-group: 2; 
   -moz-box-ordinal-group:2; 
     box-ordinal-group: 2;
 } 
 
 #tc-main #lc {height: 0px;}
 .mobile-bx-2 {top: -174px;}
 #header {margin-bottom: 14px;}
 .tab-content {margin-top: 35px;}
 #tc-main #lc {margin-top: 0px;}

 }
	  
   </style>

         <div class="adsclear"></div>
         <div id="header">
            <div class="top">
               <h1>
            <?php 
            $ci = & get_instance();
            $ci->load->model("Common_model");
            $subheader = $ci->Common_model->get_all_orderby('sub_header_content','id ASC');
            echo $subheader[0]->sub_header_content;
            ?>
            </h1>
            </div>
            <div class="content">
               <a href="<?php echo base_url();?>" id="logo"><img src="<?php echo base_url().'uploads/banners/'.$logo?>" alt="Uberskor.com" style="width:210px;height:37px;"></a>
               <div id="project-debug"></div>
			       <span class="toggle_img"><img src="<?php echo base_url().'assets/images/show-menu-icon.png';?>" alt=""></span>
               <div id="menu" class="menu-top">
               <?php $this->load->view("common/topmenu")?>
                  <div class="menu-border"></div>
               </div>
            </div>
         </div>
         <div class="content">
            <div id="main">
               <div id="rc-top">
                  <div id="rccontent">
                    
               <!-----Google Add iframe------>
               <img src="<?php echo base_url().'uploads/banners/'.$right_banner;?>" alt="Right Banner" style="width:161px; height:500px;" >
                    
                    
                  </div>
               </div>
               <div id="tc-main">
			   
                 <div id="mc" class="sport_page">
				   <h2 class="tournament">
				   <?=$tlist[0]->sport_name?> »
				    <a href="#"><span class="flag flag-<?=strtolower($tlist[0]->flag)?>"></span> <?=$tlist[0]->country_name?>  </a> »  <a href="#"> <?=$tlist[0]->league_name?> </a> » <?=$tlist[0]->tournament_name?>
				   </h2>
				   
				   
				   <div class="team-header">
					<div class="team-logo"></div>
					
					<div class="team-name"><?=$tlist[0]->league_name?></div>
				   </div>
				  
               
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
						<?php
							$pathUrl = base_url().$game.'/'.$this->uri->segment('2').'/'.$this->uri->segment('3');
						?>
                           <ul class="ifmenu live-menu">
                              <li class="<?php if($this->uri->segment('4') == '' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="window.location = '<?=$pathUrl?>'">Genel</a></li>
                              <li class="<?php if($this->uri->segment('4') == 'sonuclar' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('sonuclar')" >Sonuçlar</a></li>
                              <!--<li class="<?php if($this->uri->segment('4') == 'takimlar' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('Oyuncular')">Oyuncular</a></li>-->
                           </ul>
						   
                           <div class="fs-table tab-content" style="<?php if($this->uri->segment('4') == '' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>">
								
                              <div class="odds-content">
            							  <ul class="ifmenu tAB-1">
            							  <li class="selected"><strong>Son Skorlar</strong></li>
            							  </ul>
            							  <div class="ifmenu-border"></div>
            							  <?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
            							  <div class="table_takim">
												  <div class="odds-content">
                              <?php
                              $oldNameCount = 0;
                              $oldName1 = "";
                              foreach ($list as $k => $row1) {
                              ///this is to check name if name is not same from previous than create new one
                                if ($oldName1 != $row1->league_name) {
                                  $oldName1 = $row1->league_name;
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
                                       <td colspan="16" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><span class="flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name?>"></span><?=$row1->ttname ?> : </span><span class="tournament_part"> <?=$row1->league_name?> </span></span></span>
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
							<?php $displayCounter = 1 ;foreach($row1->participants as $key =>  $participants): ?>  
							<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id?>","<?=url_title($row1->name,"dash",true)?>","<?=url_title($participants->name,"dash",true)?>","<?=$participants->id ?>");' class="tr-first no-service-info stage-finished pointer" <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td colspan="1"class="cell_ib icons left"></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left " style="text-align:left !important;padding-left:2%;"> <span class="flag flag-<?=strtolower($participants->flag) ?> "></span><?=$participants->player ?></td>
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
							  <td colspan="16" class="cell_ad time" style="text-align:center"><a style="color:#fff;" href="javascript:void(0);" onclick="goTo('sonuclar')">Load more encounters</a></td>
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
            							  </div>
										  <?php } ?>										  
                              </div>
							  
							  
							 

							  
                             
							  
							  
							  
                           </div>
						   
						   <!-----Tab Content-2---->
						    <div id="tab-2"  style="<?php if($this->uri->segment('4') == 'sonuclar' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>"  class="fs-table tab-content">
							 
							 <?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
							<div class="table_takim">
									  <div class="odds-content">
                              <?php
                              $oldNameCount = 0;
                              $oldName1 = "";
                              foreach ($list as $k => $row1) {
                              ///this is to check name if name is not same from previous than create new one
                                if ($oldName1 != $row1->league_name) {
                                  $oldName1 = $row1->league_name;
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
                                       <td colspan="16" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><span class="flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name?>"></span><?=$row1->ttname ?> : </span><span class="tournament_part"> <?=$row1->league_name?> </span></span></span>
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
							<?php $displayCounter = 1 ;foreach($row1->participants as $key =>  $participants): ?>  
							<tr id="show_id_<?=$participants->rank?>" onclick='detailPopup("<?=$row1->id ?>");' class="tr-first no-service-info stage-finished pointer" <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td colspan="1"class="cell_ib icons left"></td>
							  <td colspan="1" class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left " style="text-align:left !important;padding-left:2%;"> <span class="flag flag-<?=strtolower($participants->flag) ?> "></span><?=$participants->player ?></td>
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
							  <td colspan="16" class="cell_ad time" style="text-align:center"><a style="color:#fff;" href="javascript:void(0);" onclick="loadMore2(<?=count($row1->participants)?>,<?=$parentID?>)">Load more encounters</a></td>
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
            					</div>
								<?php } ?>
							</div>
							
							
							<!-----Tab Content-4---->
							 <div id="tab-4"  style="<?php if($this->uri->segment('4') == 'Oyuncular' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>" class="fs-table tab-content">
							
								 <div id="tournament-page-participants" class="fs-table tournament-page-participants">
							 <table>
							 <thead><tr class="league"><td>Oyuncular</td></tr></thead>
							 <?php if(!empty($teams)){ $i=0; foreach($teams as $team): $class = ($i%2 ==0 )? "even":"odd" ;?>
							 <tr id="participant_xAO4gBas" class="<?=$class?>">
							  <td><?=$team->pname?> </td>
							 </tr>
							 <?php $i++;endforeach; } ?>
							 </table>
							 </div>
							 
							</div>
							
						
							 

                        </div>
                
                     </div>
                  </div>
				

                
                   <div id="tc">
                    <div id="lc">
                    <?php if(!empty($relatedLeagues)){ ?>
					<div class="mbox0px l-brd">
                        <ul class="menu country-list my-leagues">
                           <li class="head">Related Leagues </li>
                           <ul id="my-leagues-list" class="menu">
                     
                              <?php $i=0; foreach ($relatedLeagues as $row1) { if($i<9){ ?>
                              <li> <span class=" flag small small-<?=$row1->flag?>"></span><a href="<?php echo base_url().$game.'/'.url_title($row1->country_name,"dash",true).'/'.url_title($row1->name,"dash",true).'-'.$row1->id?>"><?=$row1->name?></a></li>
                              <?php }else{break;} $i++;}								$otherTot = (count($relatedLeagues)-9);							  if($otherTot > 0){							  ?>
                             <li class="show-more">
                                <a href="javascript:void(0)" class="arww_img">
                                <font class="">Other (<?=count($relatedLeagues)-9?>)</font>
                                <span class="more-arrow"></span></a>
                                <ul class="hidden-templates2">
                                 <?php $i=0;  foreach ($relatedLeagues as $row1) { if($i>8){ ?>
                                 <li> <span class=" flag small small-<?=$row1->flag?>"></span><a href="<?php echo base_url().$game.'/'.url_title($row1->country_name,"dash",true)."/".url_title($row1->name,"dash",true).'-'.$row1->id?>"><?=$row1->name?></a></li>
                                 <?php } $i++; } ?>
                                </ul>
                              </li>							  <?php } ?>
 
                       
                           </ul>
                        </ul>
                     </div>
					 <?php } ?>
                     <div class="spacer10"></div>
                     <div class="mbox0px l-brd">
                         <ul class="menu country-list my-leagues" title="">
                           <li class="head"><span class="toggleMyLeague"></span> Liglerim </li>
                           <ul id="my-leagues-list" class="menu" >
                               <?php  foreach ($leagues as $row) { ?>
                              <li style="display:none;"> <span style="width:32px;" class=" flag small small-<?=$row->flag?>"></span> <span class="toggleMyLeague active "   ></span><a title="<?php echo ucwords($row->country_name).': '.ucwords($row->name) ?>" href="<?php echo base_url($game.'/').url_title($row->country_name,"dash",true).'/'.url_title($row->name,"dash",true).'-'.$row->id?>"><?=$row->name?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->
                       
                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>              
    <?php $this->load->view("futball/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>
			    </div>


<?php $this->load->view("common/footer"); ?>

<script> 
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});

function detailPopup(eid,event,pname,pid){
   link = "<?php echo base_url() .$game.'/';?>"+event+'-'+eid+'/player/'+pname+'-'+pid;
   $.fancybox({
        'href' : link ,
		'width' : 760,
		'height' : 660,
        'type':'iframe',
        'padding' : 0,
        'closeClick'  : false,
		'onStart' : function(){ jQuery.fancybox.showActivity(); $(".pop_overlay2").fadeIn(); }, 
		'onComplete' : function(){ jQuery.fancybox.hideActivity(); $(".pop_overlay2").fadeOut();}
    });
}

function mygames(id) {

   var newid = id.split(',');   
   var ParentId = newid[1];
   var arra = newid[0].split('_');
   var atr = arra[0];
   var pid = arra[1];
   var atrparent = "#parent_"+pid; 
   var atrP_child = ".parent_"+pid;  
   var atrchild = ".child_"+pid;
   if(atr == "parent"){
      if($(atrparent). prop("checked")  == true){               
         $(atrP_child).each(function(){ 
         this.checked = true;
         });
      }
      if($(atrparent). prop("checked")  == false){ 
         $(atrP_child).each(function(){ 
         this.checked = false;
         });
      }
   }
   if(atr == "child"){ 
      if($(atrchild).prop("checked")  == true){ 
         $("#parent_"+ParentId)[0].checked = true;   
      }
      if($(atrchild). prop("checked")  == false){ 
         if ($(atrP_child+":checked").length > 0) {}
         else{
            $("#parent_"+ParentId)[0].checked = false;       
         }
      }      
   }
}



$('#clear').click( function() {
window.localStorage.clear();
location.reload();
return false;
});
$(document).ready(function(){
	var total_counter=	$(".counter").length;
	$(".counter").each(function(){
		$(this).html(total_counter);
		total_counter = total_counter - 1;	});
});
/* This function is used to load more matches */
	/*Global varibale to show the match list   */
var displayCounter = 1;
/* calling function to load first two records of matches */
loadMore();		
		function loadMore(){
			/* Checking if the class is exist or not */
			if($(".parent_match_day_"+displayCounter).length > 0){
				$(".parent_match_day_"+displayCounter).removeAttr('style');	
				$(".child_match_day_"+displayCounter).removeAttr('style');
			}
			/* Checking if the class is exist or not */
			if($(".parent_match_day_"+displayCounter).length > 0){
				/* incrementing displayCounter to show next match's */
				displayCounter = displayCounter+1;
				$(".parent_match_day_"+displayCounter).removeAttr('style');
				$(".child_match_day_"+displayCounter).removeAttr('style');
			}
		}
/* This function is used to open tabs view */
		function goTo(path)
		{
			path = path.replace(" ",'-');
			fullpath = "<?=$pathUrl.'/'?>"+path;
			window.location = fullpath;
		}
var displayCounter = 11;	
		function loadMore2(total,pid){
			for(i = 1; i <= 10; i++){	
				if(displayCounter <= total){
				$("#show_parent_"+pid+" #show_id_"+displayCounter).removeAttr('style');
				displayCounter++;
				}else{
				$(".hide_class").hide();
				break;
				}
			}
		}
</script>   


     
   </body>
</html>

