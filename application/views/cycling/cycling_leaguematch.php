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
				   <?=$tlist[0]->sport_name?> &raquo;
				    <a href="#"><span class="flag flag-<?=strtolower($tlist[0]->flag)?>"></span> <?=$tlist[0]->country_name?>  </a> &raquo;  <a href="#"> <?=$tlist[0]->league_name?> </a> &raquo;  <?=$tlist[0]->tournament_name?>
				   </h2>
				   
				   
				   
				   <div class="team-header">
					<div class="team-logo" style=""></div>
					
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
							  <li class="<?php if($this->uri->segment('4') == 'takimlar' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('takimlar')">Takimlar</a></li>
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
                                if ($oldName1 != $row1->id) {
                                  $oldName1 = $row1->id;
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
								     
         <table class="soccer odds {str_class} show_parent_<?=$row1->id?> " id="{parent}_show"  width="100%">
                                 
                              <thead>
                                    <tr class="league l_1_WbuOhZRa" >  
                                       <td colspan="12" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds flag flag-<?=strtolower($row1->flag)?>" title="<?=$row1->country_name ?>"></span><span class="name"><span class="country_part"></span><span class="tournament_part"> <?=$row1->league_name.'-'.$row1->name ?> </span></span></span>
									   <span style="float:right;margin-right:1%;">
										Start Time : <?=$row1->startdate.'-'.$row1->starttime?>
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

                                       <td colspan="11" class="head_ab left project-bonus-border "><span class="country left"><span class="left-odds" title=""></span><span class="name"><span class="country_part"><?=$row1->starttime?>-<?=$row1->startdate ?>,  </span><span class="tournament_part"> <?=$row1->pro[0]->sname.' - '.$row1->pro[0]->ename ?> </span> ( <?=$row1->pro[0]->km?>Km )</span></span>
                                       </td>
                                    </tr>
                              </thead>
                              <tbody>
                              <?php } ?>
							<?php $displayCounter = 1 ;foreach($row1->participants as $participants): ?>  
							<tr id="<?=$row1->id?>"  onclick='detailPopup("<?=$row1->id?>","<?=url_title($row1->name,"dash",true)?>","<?=url_title($participants->name,"dash",true)?>","<?=$participants->id ?>");' class="tr-first no-service-info cursor stage-finished pointer show_id_<?=$participants->rank?> <?=$game.'_event_'.$row1->id.'_1'?>  "  <?php if($displayCounter > 10){ ?>style="display:none;" <?php } ?> >
							  <td class="cell_ib icons left"></td>
							  <td class="cell_ad time"><?=$participants->rank ?></td>
							  <td colspan="5" class="cell_ib icons left"><?=$participants->name ?></td>
							  <td colspan="5" class="cell_ad time"><?=$participants->duration ?></td>
							  
							</tr>
							<?php  $displayCounter++; endforeach; if(!empty($row1->participants)){ ?>
							<tr id="" class="hide_class tr-first no-service-info stage-finished">
							  <td colspan="12" class="cell_ad time" style="text-align:center"><a class="show_more" style="color:#fff;" href="javascript:void(0);" onclick="loadMore(<?=count($row1->participants)?>,<?=$row1->id?>)"><?php echo mb_convert_encoding("Daha Encounters yükle", "UTF-8");?> <span class="arrow"></span></a></td>
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
										  <?php } ?>	




<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
										  





<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
										  
                              </div>
							  
							
							  
							  
                           </div>
						   

								<!-----Tab Content-5---->
							 <div id="tab-5" style="<?php if($this->uri->segment('4') == 'takimlar' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>" class="fs-table tab-content">
							 
							 <div id="tournament-page-participants" class="fs-table tournament-page-participants">
							 <table>
							 <thead><tr class="league"><td>Takimlar</td></tr></thead>
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
                           <ul id="my-leagues-list2" class="menu">
                     
                              <?php $i=0; foreach ($relatedLeagues as $row1) { if($i<9){ ?>
                              <li> <span class=" flag  flag-<?=strtolower($row1->flag)?>"></span><a href="<?php echo base_url().$game.'/'.url_title($row1->country_name,"dash",true).'/'.url_title($row1->name,"dash",true)?>"><?=$row1->name?></a></li>
                              <?php }else{break;} $i++;}                $otherTot = (count($relatedLeagues)-9);               if($otherTot > 0){                ?>
                             <li class="show-more">
                                <a href="javascript:void(0)" class="arww_img">
                                <font class="">Other (<?=count($relatedLeagues)-9?>)</font>
                                <span class="more-arrow"></span></a>
                                <ul class="hidden-templates2">
                                 <?php $i=0;  foreach ($relatedLeagues as $row1) { if($i>8){ ?>
                                 <li> <span class=" flag flag-<?=strtolower($row1->flag)?>"></span><a href="<?php echo base_url().$game.'/'.url_title($row1->country_name,"dash",true)."/".url_title($row1->name,"dash",true)?>"><?=$row1->name?></a></li>
                                 <?php } $i++; } ?>
                                </ul>
                              </li>               <?php } ?>
 
                       
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
                              <li style="display:none;"> <span  class=" flag flag-<?=strtolower($row->flag)?>"></span> <span class="toggleMyLeague active "   ></span><a title="<?php echo ucwords($row->country_name).': '.ucwords($row->name) ?>" href="<?php echo base_url($game.'/').url_title($row->country_name,'dash',true).'/'.url_title($row->name,'dash',true)?>"><?=$row->name?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->

                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>                 
    <?php $this->load->view("cycling/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>
			    </div>


<?php $this->load->view("common/footer"); ?>

<script> 
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});

// function for detais pop
function detailPopup(eid,event,pname,pid){
   link = "<?php echo base_url() .$game.'/';?>"+event+'-'+eid+'/player/'+pname+'-'+pid;
  //console.log(link);
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

/* This function is used to open tabs view */
		function goTo(path)
		{
			path = path.replace(" ",'-');
			fullpath = "<?=$pathUrl.'/'?>"+path;
			window.location = fullpath;
		}
		
		/*Global varibale to show the match list   */
var displayCounter = 11;	
		function loadMore(total,pid){
			for(i = 1; i <= 10; i++){	
				if(displayCounter <= total){
				$(".show_parent_"+pid+" .show_id_"+displayCounter).removeAttr('style');
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

