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

/* first assigning cache to variable to check it is availabel in cache or not*/
	if ( ! $theHTMLResponse = $this->cache->file->get($game.'-header') )
	{
		$theHTMLResponse    = $this->load->view("common/header", null, TRUE);
		/* $theHTMLResponse    =  minifyHtml($theHTMLResponse); */
		/* Save into the cache for 24 HOURS minutes */
		$this->cache->file->save($game.'-header', $theHTMLResponse, 86400);
	}
	echo $theHTMLResponse; 		
?>

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
                             <?php 
/* first assigning cache to variable to check it is availabel in cache or not*/
	if ( ! $theHTMLResponse = $this->cache->file->get($game.'-topmenu') )
	{
		$theHTMLResponse    = $this->load->view("common/topmenu", null, TRUE);
		/* $theHTMLResponse    =  minifyHtml($theHTMLResponse); */
		/* Save into the cache for 24 HOURS minutes */
		$this->cache->file->save($game.'-topmenu', $theHTMLResponse, 86400);
	}
	echo $theHTMLResponse; 		
?>
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
 
				   <h2 class="tournament">
				   <?=$detail[0]->sport?> &raquo;<span class="flag flag-<?=strtolower($detail[0]->flag)?>"></span>
				    <?=$detail[0]->country?>  &raquo; <?=$detail[0]->name?> 
				   </h2>
				   
				   
				   <div class="team-header">
					<div class="team-logo" ></div>
					
					<div class="team-name"><?=$detail[0]->name?></div>
				   </div>
				  
                  
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
						<?php
							$pathUrl = base_url().$game.'/'.$this->uri->segment('2').'/'.$this->uri->segment('3').'/'.$this->uri->segment('4');
						?>
                           <ul class="ifmenu live-menu">
                              <li class="<?php if($this->uri->segment('5') == '' ){echo "selected";}?>" ><a href="<?php echo $pathUrl;?>" onclick="window.location = '<?=$pathUrl?>'">Genel</a></li>
                                 <?php if(!empty($players)){?>
							  <li class="<?php if($this->uri->segment('5') == 'kadro' ){echo "selected";}?>" ><a href="javascript:void(0)" onclick="goTo('kadro')"  ><?php echo mb_convert_encoding("Kadro", "UTF-8");?></a></li>
								 <?php } ?>
                           </ul>
						   
                           <div class="fs-table tab-content" style="<?php if($this->uri->segment('5') == '' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>">
								
                              <div class="odds-content">
            							  <ul class="ifmenu tAB-1">
            							  <li class="selected"><strong>Son Skorlar</strong></li>
            							  </ul>
            							  <div class="ifmenu-border"></div>
            							  <?php if(empty($list)){
											  $this->load->view("common/nomatch");
										  }else{  ?>
            							  <div class="table_takim">
												  <table class="soccer od_table_mx">
												  <thead class="no-border-bottom">
													   <tr class="league l_1_ljIBgFCg primary-top">
														  <td colspan="1" class="head_aa "></td>
														  <td colspan="4" class="head_ab "> 
														  
														  <span class="country left">
														  <span class="" title=""></span>
														  <span class="name"><span class="flag flag-<?=strtolower($detail[0]->flag)?> left-odds" title=""></span><span class="country_part"><?=$detail[0]->country?>: </span>
														  <span class="tournament_part"><?=$detail[0]->name?></span></span></span>
														  </td>
													   </tr>
												  </thead>							  

													<tbody>
													<?php $i = 0;foreach ($list as $val): $class = ($i%2 ==0 )? "even":"odd" ;?>
													<tr title="<?=$val->eventname?>"  onclick='detailPopup("<?=$val->id?>");' id="" class="<?=$class?> stage-finished cursor " >
													   <td class="cell_ib icons left" title=""></td>
													   <td class="cell_ad time" ><?=$val->startdate?> <?=$val->starttime?></td>
													   <td class="cell_ab team-home <?php if($val->home_score > $val->away_score){echo "bold";} ?>" ><span class="padr"><?=$val->home_team?></span></td>
													   <td class="cell_ac team-away <?php if($val->home_score < $val->away_score){echo "bold";} ?>" ><span class="padl"><?=$val->away_team?></span></td>
													   <td class="cell_sa score  bold" ><?=$val->home_score?>&nbsp;:&nbsp;<?=$val->away_score?></td>
													</tr>
													<?php $i++;endforeach ?>
													
													</tbody>  
												  </table>
            							  </div>
										  <?php } ?>										  
                              </div>
							  
							  
                           </div>
						   
						   <!-----Tab Content-2---->
						   <?php if(!empty($players)){?>
						    <div id="tab-2"  style="<?php if($this->uri->segment('5') == 'kadro' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>"  class="fs-table tab-content">
							
								<div class="table_takim">
									  <table class="soccer od_table_mx">
									  <thead class="no-border-bottom">
										   <tr class="league l_1_ljIBgFCg primary-top">
											  <td colspan="1" class="head_aa "></td>
											  <td colspan="6" class="head_ab ">
											  <span class="country left">
											  <span class="flag flag-<?=strtolower($detail[0]->flag)?>" title=""></span>
											  <span class="name"><span class="country_part"><?=$detail[0]->country?>: </span>
											  <span class="tournament_part"><?=$detail[0]->name?></span></span></span>
											 </td>
										   </tr>
									  </thead>
									  
										<tbody>
										<tr class=" darkbg">
											  <td colspan="3" class="cell_ad time ">Player</td>
											  <td colspan="" class="cell_ad time ">
											  D.O.B
											 </td>
											 <td colspan="" class="cell_ad time ">
											 Height
											 </td>
											 <td colspan="" class="cell_ad time ">
											  Weight
											 </td>
											 <td colspan="" class="cell_ad time ">
											  Active
											 </td>
										  </tr>
										<?php $i = 0;foreach ($players as $p){ $class = ($i%2 ==0 )? "even":"odd" ;?>
										<tr id="" class="<?=$class?> stage-finished cursor " >
										   <td colspan="3" class="cell_ad time" style="text-align:left;padding-left:5%;" ><span class="flag flag-<?=strtolower($p->flag)?>"></span><?=$p->name?></td>
										   <td colspan="" class="cell_ad time" ><?=$p->gen[0]->date_of_birth?></td>
										   <td colspan="" class="cell_ad time" ><?=$p->gen[0]->height?>cm</td>
										   <td colspan="" class="cell_ad time" ><?=$p->gen[0]->weight?>Kg</td>
										   <td colspan="" class="cell_ad time" >Yes</td>
										</tr>
										  <?php $i++; } ?>
										</tbody>  
									  </table>
            					</div>
							</div>
						   <?php } ?>
							

							 

                        </div>
                
                     </div>
					 
                  </div>
				

                
  
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

              <?php 
/* first assigning cache to variable to check it is availabel in cache or not*/
	if ( ! $theHTMLResponse = $this->cache->file->get($game.'-footer') )
	{
		$theHTMLResponse    = $this->load->view("common/footer", null, TRUE);
		/* $theHTMLResponse    =  minifyHtml($theHTMLResponse); */
		/* Save into the cache for 24 HOURS minutes */
		$this->cache->file->save($game.'-footer', $theHTMLResponse, 86400);
	}
	echo $theHTMLResponse; 		
?>

<script> 
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});
function detailPopup(id){
   var link = "<?php echo base_url() .$game. '/match-detail';?>" ;
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
</script>   


     
   </body>
</html>

