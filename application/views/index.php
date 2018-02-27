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

<?php $this->load->view("common/header"); ?><style>	 #def-form-table td input, textarea { padding: 4px 4px; margin-bottom: 8px;border-radius: 2px; }	 #def-form-table td textarea {resize: none; }	 #def-form-table td select  { width:159px;padding: 4px 4px;margin-bottom: 8px;border-radius: 2px;}
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
               <div id="menu" class="menu-top">
			     <span class="toggle_img"><img src="<?php echo base_url().'assets/images/show-menu-icon.png';?>" alt=""></span>
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
               <div id="tc">
                  <div id="mc" class="sport_page">
				  
                    <!----- ------>
					<div class="inner_banner">
					<img src="<?php echo base_url().'uploads/banners/'.$mid_banner;?>" alt="Middel Banner" style="width:661px;height:278px;">
					</div>
                     
                  
                   
                    
                     
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
                      
                           <ul class="ifmenu live-menu">
                              <li class="selected"><a href="#tab-1">Hepsi</a></li>
                              <li><a href="#tab-2">Canlı</a></li>
							  
                              <li><a href="#tab-3">Bitmiş</a></li>
							  
                              <li><a href="#tab-4" >Programlar</a></li>
                              <li ><a href="#tab-5">Oranlar</a></li>
							  
                              <li><a href="#tab-6">Oyunlarım <span id="mygames-count">(0)</span></a></li>
							  
                  
                           </ul>
						   
						   
                           <div id="tab-1" class="fs-table tab-content" style=" display:block;">
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
         <table class="soccer odds" colgroup="" width="100%">
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

                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag  left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php  } ?>
                                    <tr id="g_1_hf9ayLs3" title="Demo-Title" onclick='detailPopup("<?=$row1->id?>");' class="tr-first even stage-scheduled" style="cursor:pointer;">
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
                                             </span>
                                          </span>
                                       </td>
                                       <td class="cell_ad time "><?=$row1->starttime?></td>
                                       <td class="cell_ad time "><?=$row1->status_text?></td>
                                       <td  class="cell_ab team-home "><span class="padl"><?=$row1->home_team?></span></td>
                                       <td  class="cell_sa score ">(<?=$row1->home_score?> - <?=$row1->away_score?>)</td>
                                       <td  class="cell_ac team-away "><span class="padl"><?=$row1->away_team?></span></td>
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
                           </div>
						   <!-----Tab Content-2---->
						   <div id="tab-2" class="fs-table tab-content">
							</div>
							<!-----Tab Content-3---->
							<div id="tab-3" class="fs-table tab-content">
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag fl_81 left-odds" title="<"></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
                                       </td>
                                      
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr id="g_1_hf9ayLs3" onclick='detailPopup("<?=$row1->id?>");' title="Demo-Title" class="tr-first even stage-scheduled" style="cursor:pointer;">
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
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
                        <input type="checkbox" onchange='mygames("parent_<?=$parentID?>");' id="parent_<?=$parentID?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag fl_81 left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->country?>: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
                                       </td>
                                     
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr id="g_1_hf9ayLs3" onclick='detailPopup("<?=$row1->id?>");' title="Demo-Title" class="tr-first even stage-scheduled" style="cursor:pointer;">
                                     <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
              <input type="checkbox" onchange='mygames("child_<?=$row1->id?>,<?=$parentID?>");'  class="checkbox parent_<?=$parentID?> child_<?=$row1->id?>" >
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
                              <?php }  } ?>
                        
           
							</div>
							
							<!-----Tab Content-5---->
							 <div id="tab-5" class="fs-table tab-content">
							
							</div>
							
							<!-----Tab Content-6---->
							<div id="tab-6" class="fs-table tab-content mygamesTab">
                                    							
							</div>
						   
						   
						   
						   
                        </div>
                
                     </div>
                     
                  </div>
				 

                
  
                  <div id="lc">
                     <div class="mbox0px l-brd">
                        <ul class="menu country-list my-leagues" title="">
                           <li class="head">Liglerim </li>
                           <ul id="my-leagues-list" class="menu" >
                               <?php  foreach ($leagues as $row) { ?>
                              <li><a href="<?php echo base_url('futball/').str_replace(" ","-",strtolower($row->country_name))."/".str_replace(" ","-",strtolower($row->name))?>"><?=$row->name?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->
                       
                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>              
    <?php $this->load->view("common/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>


<?php $this->load->view("common/footer"); ?>

<script> 
// function for detais pop
function detailPopup(id){
   var link = "<?php echo base_url().'futball/matchDetail';?>" ;
   var url = link+'/'+id;
   
   // console.log(url);
   window.open(url,'_blank',width=400,height=200);
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


// if(localStorage.getItem('mygamesList')) {
//    $('.mygamesTab').html(localStorage.getItem('mygamesList'));
// alert("Item Found In localStorage");
// }
// else{
//    alert("Not In localStorage");
// }

$('#clear').click( function() {
window.localStorage.clear();
location.reload();
return false;
});
</script>	


	  
   </body>
</html>

