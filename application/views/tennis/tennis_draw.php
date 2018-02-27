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
				   <h2 class="tournament">
				   <?=$game?> »
				    <a href="javascript:void(0)"><?=$tournament[0]->country?>  </a> »  <a href="javascript:void(0)"> <?=$tournament[0]->tour?> </a> » <?=$tournament[0]->stage_name?>
				   </h2>
				   
				   <div class="team-header">
					<div class="team-logo" style="background-image: url(images/xYyYmWA7-GUnlo0l7.png)"></div>
					<div class="team-name"><?=$tournament[0]->tour?></div>
				   </div>
				  
                  
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
						<?php
							$pathUrl = base_url().$game.'/'.$this->uri->segment('2').'/'.$this->uri->segment('3').'/'.$this->uri->segment('4');
						?>
                           
						   
							<div class="fs-table tab-content" style="<?php if($this->uri->segment('5') == '' ){ echo 'display:block;';}else{ echo 'display:none;';} ?>">
                              <div class="odds-content">
            							  <ul class="ifmenu live-menu02">
            							  <?php for($n=0;$n<count($draw);$n++) { ?>
										  <li class="draw_name <?php if($n==0){?>selected<?php } ?>"><a href="#tab-1<?=$n?>"><strong><?=$draw[$n]->round_results[0]->draw_name?></strong></a></li>
										  <?php } ?>
            							  </ul>
            							  <div class="ifmenu-border"></div>
            							  <?php for($n=0;$n<count($draw);$n++) { ?>
										  
            							  <div class="table_takim tens_drw" id="tab-1<?=$n?>" class="fs-table tab-content">
            							  <table class="soccer od_table_mx">
                                          <thead class="no-border-bottom">
                                          	   <tr class="league l_1_ljIBgFCg primary-top">
                                          		  <td colspan="1" class="head_aa "></td>
                                          		  <td colspan="4" class="head_ab "> 
                                          		  <span class="stats-link link-tables"><span class="stats" title="Puan Durumu">-</span></span>
                                          		  <span class="country left">
                                          		  <span class="flag small small-<?=$tournament[0]->flag?>" title="<?=$tournament[0]->country?>"></span>
                                          		  <span class="name"><span class="country_part"><?=$tournament[0]->country?>: </span>
                                          		  <span class="tournament_part"><?=$tournament[0]->stage_name?></span></span></span></td>
                                          	   </tr>
                                          </thead>							  

											<tbody>
											<?php if(!empty($draw[$n]->round_results)){
												$i = 0;$j = 1; $diff_month = '';
											foreach ($draw[$n]->round_results as $val){
											$class = ($i%2 ==0 )? "even":"odd" ;
											if($diff_month != $val->round_typeFK || $diff_month == ''){ ?>
											<tr class="event_round  darkbg parent_<?=str_replace(" ","_",$val->draw_name).$j?>" style="display:none;"  >
											   <td colspan="5" style="text-align:left"><span id="counter_<?=$i?>" class="counter"></span><?=$val->round_name?></td>
											</tr>
											<?php $j++; } ?>
											<tr onclick='detailPopup("<?=$val->eventid?>");' title="<?=$val->event_name?>" class="<?=$class?> stage-finished cursor child_<?=str_replace(" ","_",$val->draw_name).($j-1)?>" style="display:none;" >
											   <td class="cell_ib icons left" ></td>
											   <td class="cell_ad time" ><?=$val->starttime?> <?=$val->startdate?></td>
											   <td class="cell_ab team-home <?php if($val->home_score > $val->away_score){echo "bold";} ?>" ><span class="padr"><?=$val->home_team?></span></td>
											   <td class="cell_ac team-away <?php if($val->home_score < $val->away_score){echo "bold";} ?>" ><span class="padl"><?=$val->away_team?></span></td>
											   <td class="cell_sa score  bold" ><?=$val->home_score?>&nbsp;:&nbsp;<?=$val->away_score?></td>
											</tr>
											
											<?php $i++; $diff_month = $val->round_typeFK; } } ?>
											<tr class="event_round" style="background:#cacaca!important;" >
											<td colspan="5" style="text-align:center:"><a href="javascript:void(0)" style="color:#fff!important;" onclick="loadMore('<?=str_replace(" ","_",$val->draw_name)?>')">Daha fazla karşılaşma göster</a></td>  
											</tr>
											
											</tbody>
											
											  <script type="text/javascript">
												$(document).ready(function(){
													//alert("<?=$n?>");
													loadMore("<?=str_replace(" ","_",$val->draw_name)?>");	
												});
											  </script>
            							  </table>
										 	 
										<?php if(!empty($draw[$n]->round_results)){ ?>	
										<!-- slider starts here-->	
										<table class="parts" style="margin-top:20px;background:#e2001a;color:#fff;">		  
													 <tbody>
													  <tr>
														 <td colspan="<?=count($draw[$n]->round_types)?>" style="text-align:center;"><?=$tournament[0]->stage_name.'-'.$val->draw_name?></td>
													  </tr>	
												   </tbody>
											</table>
											
											<div class="lft_scrll">
										<div class="scroll-right scrll_bttm"> </div>
										<div class="scroll-right scrll_left"> </div>
										</div>
											
										<div class="org_bg" id="tab-1<?=$n?>" >
											
											<table class="parts" style=" margin-top:0px;">	
												<tr>
												<?php 
												for($d=0;$d<count($draw[$n]->round_types);$d++){
												?>
													<td colspan="0" class="h-part"><?=$draw[$n]->round_types[$d]->round_name?></td>
												<?php } ?>
												</tr>
											</table>												
										<div class="overview" >
											<?php foreach($draw[$n]->round_types as $rtype){ ?>
												<div class="round first-round">
													<?php foreach($draw[$n]->round_results as $rresult){ 
														switch($rresult->round_typeFK){
															case ($rtype->round_typeFK): 
													?>
													<div title="<?=$rresult->event_name?>" class="matches" onclick='detailPopup("<?=$rresult->eventid?>");'>
													 <div class="relation">
														<div class="match has-events match-ryOIZkz9">
														   <span class="participant home winner glib-participant-KYD9hVEm">
														   <span class="name <?php if($rresult->winner=='a'){echo 'bold';}?>" style="width: 179px;">
														   <?=$rresult->home_team?><span class="codebook"> </span>
														   </span>
														   <span class="score"><?=$rresult->home_score?></span>
														   </span>
														   
														   <span class="participant away glib-participant-bPjc49q0">
														   <span class="name <?php if($rresult->winner=='b'){echo 'bold';}?>" style="width: 179px;">
														   <?=$rresult->away_team?> <span class="codebook"> </span>
														   </span>
														   <span class="score">
														   <span class="s"><?=$rresult->away_score?></span></span></span>
														</div>
													 </div>
													</div>
													<span class="cleaner"></span>
													<?php 
															break;
														default:
															break;
														}
													}
													?>
												</div>
											<?php } ?>
											
										</div>
										
										</div>
										
										
										
										<!-- slider ends here-->
										<?php }  ?>
										
            							  </div>
										  
										  <?php } ?>										  
											
									
									

										  
                              </div>
							  		
									<!-- slider start-->
												
	
									
								<!-- Slider end-->

                           </div>
						   
						   
							

                        </div>
					
						
						
						
						
                
                     </div>
                  </div>
             

                
  
                  <div id="lc">
                     <div class="mbox0px l-brd">
                        <ul class="menu country-list my-leagues" title="">
                           <li class="head">Standings </li>
                           <ul id="my-leagues-list" class="menu" >
                              <?php
							  if(!empty($type)){
							   foreach($type as $s) :
							   ?>
								  <li>
									 <a class="a_sub_tg" href="<?php echo base_url().$game.'/type/'.str_replace(" ","-",strtolower($s->name))?>"><?=$s->name?></a>
								  </li>	
							  <?php endforeach; } ?>
                       <!-- - - -Irame BOx- - - - - -->
                       
                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>              
    <?php $this->load->view("tennis/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>


<?php $this->load->view("common/footer"); ?>



<script>
//Tennis Scroll Effect
function detailPopup(id){
  var link = "<?php echo base_url() .$game. '/match-detail';?>" ;
  var url = link+'/'+id;
  window.open(url,'_blank',width=400,height=200);
}
$(document).ready(function(){
    $(".scrll_bttm").click(function(e){
        e.preventDefault();
        $('.org_bg').animate({scrollLeft:'+=550'}, 500);
    });
	
	 $(".scrll_left").click(function(e){
        e.preventDefault();
        $('.org_bg').animate({scrollLeft:'-=550'}, 500);
    });
	
});

//Tennis Scroll Effect End



$(".live-menu02 li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("selected");
        $(this).parent().siblings().removeClass("selected");
        var tab = $(this).attr("href");
        $(".tens_drw").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

  
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});


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

/* This function is used to load more matches */
	/*Global varibale to show the match list   */
var displayCounter = 1;
/* calling function to load first two records of matches */

         
		function loadMore(cls){
			//alert(".parent_"+cls+displayCounter);
			/* Checking if the class is exist or not */
			if($(".parent_"+cls+displayCounter).length > 0){
				$(".parent_"+cls+displayCounter).removeAttr('style');	
				$(".child_"+cls+displayCounter).removeAttr('style');
			}
			/* Checking if the class is exist or not */
			if($(".parent_"+cls+displayCounter).length > 0){
				/* incrementing displayCounter to show next match's */
				displayCounter = displayCounter+1;
				$(".parent_"+cls+displayCounter).removeAttr('style');
				$(".child_"+cls+displayCounter).removeAttr('style');
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

