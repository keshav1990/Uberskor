<?php
// echo "<pre>";
$top_banner = $banners[0]->image;
$mid_banner = $banners[1]->image;
$right_banner = $banners[2]->image;
$leftside_banner = $banners[3]->image;
$logo = $banners[4]->image;
$setColor = json_decode(json_encode($clrschemes[0]), true);
$body_clr = $setColor["body_color"];
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
if (!$theHTMLResponse = $this->cache->file->get($game . '-header')) {
  $theHTMLResponse = $this->load->view("common/header", null, TRUE);
/* $theHTMLResponse    =  minifyHtml($theHTMLResponse); */
/* Save into the cache for 24 HOURS minutes */
  $this->cache->file->save($game . '-header', $theHTMLResponse, 86400);
}
echo $theHTMLResponse;
?>
<style>
#def-form-table td input, textarea { padding: 4px 4px; margin-bottom: 8px;border-radius: 2px; }	 #def-form-table td textarea {resize: none; }	 #def-form-table td select  { width:159px;padding: 4px 4px;margin-bottom: 8px;border-radius: 2px;}
   .soccer #header > .content {
    background-image: url(<?php echo base_url() . 'uploads/banners/' . $top_banner; ?>) !important;
    background-repeat: no-repeat;

}
   /*for body color and font color*/
      body{
         background : <?= $body_clr ?>;
         color : <?= $footer_font_color ?>;
      }
   /*for footer color and font color*/
      #footer,#footer a {
         background : <?= $footer_color ?>;
         color : <?= $innerbody_font_color ?>;
      }
      /*for top head section*/
      div#control-panel{
         background : <?= $tophead_color ?>;
      }
      /*for inner body color*/
      body div.container > div.content {
         background : <?= $inner_body_color ?>;
      }
      /*for side menu color and font- color*/
      .menu.country-list ul li, .menu ul li{
         background : <?= $sidebar_color ?>;
         color : <?= $sidebar_font_color ?>;
      }
      /*for table th color*/
      .fs-table tr.league {
         background : <?= $tbl_head_color ?>;
         color : <?= $tbl_font_color ?>;
      }
      /*for table tr color*/
      .fs-table tr.even {
          background : <?= $tbl_row_color ?>;
          color : <?= $tbl_font_color ?>;
      }
      /*for first footer*/
      #e-content {
         background : <?= $subfooter_color ?>;
         color : <?= $subfooter_font_color ?>;
      }
      /*for sidemenu list 2*/
      .soccer ul.country-list li{
         background : <?= $sidebar_bottomlist_color ?>;
         color : <?= $sidebar_bottomlist_font_color ?>;
      }
      /*for last sidemenu for partners*/
      ul.partner li {
         background: <?= $last_list_color ?>;;
         color: <?= $last_list_font_color ?>;;
      }
	  .display_none{display:none;}
   </style>
         <div class="adsclear"></div>
         <div id="header">
            <div class="top">
               <h1>
            <?php
            $ci = & get_instance();
            $ci->load->model("Common_model");
            $subheader = $ci->Common_model->get_all_orderby('sub_header_content', 'id ASC');
            echo $subheader[0]->sub_header_content;
            ?>
            </h1>
            </div>
            <div class="content">
               <a href="<?php echo base_url(); ?>" id="logo"><img src="<?php echo base_url() . 'uploads/banners/' . $logo ?>" alt="Uberskor.com" style="width:210px;height:37px;"></a>
               <div id="project-debug"></div>
			   <span class="toggle_img"><img src="<?php echo base_url() . 'assets/images/show-menu-icon.png'; ?>" alt=""></span>
               <div id="menu" class="menu-top">
				<?php
				/* first assigning cache to variable to check it is availabel in cache or not*/
				if (!$theHTMLResponse = $this->cache->file->get($game . '-topmenu')) {
				  $theHTMLResponse = $this->load->view("common/topmenu", null, TRUE);
				/* $theHTMLResponse    =  minifyHtml($theHTMLResponse); */
				/* Save into the cache for 24 HOURS minutes */
				  $this->cache->file->save($game . '-topmenu', $theHTMLResponse, 86400);
				}
				echo $theHTMLResponse;
				?>
                  <div class="menu-border"></div>
               </div>
            </div>
         </div>
         <div class="content soccer_inner">

            <div id="main">
               <div id="rc-top">
                  <div id="rccontent">

				<!-----Google Add iframe------>
					<img src="<?php echo base_url() . 'uploads/banners/' . $right_banner; ?>" alt="Right Banner" style="width:100%;" >
					
					<img src="<?php echo base_url() . 'assets/img/banner-right-2.jpg'; ?>" alt="Right Banner" style="width:100%;" >
 


                  </div>
               </div>
               <div id="tc">
               <div id="lc">
                     <div class="mbox0px l-brd flag_side">
					   <span class="side_mobile_bx">Liglerim</span>
                        <ul class="menu country-list my-leagues" title="">
                           <li class="head"><span class="toggleMyLeague"></span> Liglerim </li>
							<ul id="my-leagues-list" class="menu" >
                               <?php foreach ($leagues as $row) { ?>
                              <li style="display:none;">
							  <span class=" flag flag-<?=strtolower($row->flag )?>"></span>
							  <span class="toggleMyLeague active "></span><a title="<?php echo ucwords($row->country_name) . ': ' . ucwords($row->name) ?>" href="<?php echo base_url($game . '/') . url_title($row->country_name, "dash", true) . '/' . str_replace('error','.',url_title(str_replace('.','error',$row->name), "dash", true))  ?>"><?= $row->name ?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->

                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url() . 'uploads/banners/' . $leftside_banner; ?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                        <!--- - -Irame BOx- - - - - -->
                           </ul>
                        </ul>

                     </div>

	<?php
	$this->load->view("motorsport/sidebar");
	?>

                  <div class="iedivfix"></div>
               </div>

               <div id="mc" class="sport_page">


				  <!---==== Table layout Preloader ===---->
					<?php $this->load->view('common/preloader'); ?>
				  <!---===Table layout Preloader END===---->

                    <!----- ------>
					<div class="inner_banner">
					<img src="<?php echo base_url() . 'uploads/banners/' . $mid_banner; ?>" alt="Middel Banner" style="width:100%;height:278px;">
					<div class="silder_content_orl">
					 <h1>Bet £10 on NFL<br> Get £30 in Free Bets</h1>
					 <p>New customers only! Qualifying bets must<br> be placed at odds 1/10 or greater...</p>
					 <div class="hemen_btton"><button>HEMEN AL</button> <span class="silder_dot">...</span> </div>
					 </div>
					</div>

					 <div id="mchtml">
					     <?php echo $getContent->getContent(); ?>
					 </div>



                  </div>



<?php
/* first assigning cache to variable to check it is availabel in cache or not*/
$this->load->view("common/footer");
?>

<script> 
// function for detais pop
function detailPopup(url){
	var link = "<?php echo base_url() .$game. '/player';?>" ;
	var url = link+'/'+url;
}


$(document).ready(function() {
   loadContent();   
});
var mycheccounter = 1;
function showLiveEvent()
{
	 url = "<?php echo  base_url().$game.'/showLiveEvent'?>"
	 date = "<?php echo $this->uri->segment('3')?>";
	 tdHtml = '';
	 $.getJSON(url , {date:date}, function( data ) {
		jQuery.parseJSON(JSON.stringify(data));
		$.each(data,function(e,v){
				/* getting parent tr  id */
			var pid = $(".<?=$game?>_event_"+v.id).attr("id");
			var strVar="";
			strVar += "<td colspan=\"5\">Current Lap : "+isNull(v.current_lap)+"<\/td>";
			strVar += "<td colspan=\"7\">Fastest Lap Time : "+isNull(v.fastest_lap_time)+"<\/td>";
			strVar += "<td colspan=\"7\">Fastest Lap Participant : "+isNull(v.fastest_lap_participant)+"<\/td>";

			$("#"+v.id).html(strVar);
			mycheccounter = mycheccounter+1;
		});
	 });
}

function loadContent()
{
	 url = "<?php echo  base_url().$game.'/getContent'?>"
	 date = "<?php echo $this->uri->segment('3')?>";
	  $.ajax({
			url:url,
			method:"POST",
			dataType :"html",
			data:{date:date},
			beforeSend:function(){
				/* $('#preloader').show('fast'); */
			},
			success:function(res){
				/* $("#mchtml").html(res); */
			},
			complete:function(){
				/* $('#preloader').hide('fast'); */
				getMyLeagues();
				countMyleague();
				showLiveStar();
				/* This function is used to refresh live content  */
				   setInterval(function(){
					cdate = "<?php echo date('Y-m-d');?>";
					date = "<?php echo $this->uri->segment('3')?>";
					if(date!=''){
						if(date==cdate){
							showLiveEvent();
						}
					}else{
						showLiveEvent();
					}
				   }, 10000);
			}
		});
}
/* function to load content and show my leagues end's */
/* content load end */
</script>	


	  
   </body>
</html>

