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
               <div id="menu" class="menu-top">
			     <span class="toggle_img"><img src="<?php echo base_url() . 'assets/images/show-menu-icon.png'; ?>" alt=""></span>
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
					<img src="<?php echo base_url() . 'uploads/banners/' . $right_banner; ?>" alt="Right Banner" style="width:161px; height:500px;" >


                  </div>
               </div>
               <div id="tc">
               <div id="lc">
                     <div class="mbox0px l-brd flag_side">
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
	$this->load->view("futball/sidebar");
	?>

                  <div class="iedivfix"></div>
               </div>

               <div id="mc" class="sport_page">


				  <!---==== Table layout Preloader ===---->
					<?php $this->load->view('common/preloader'); ?>
				  <!---===Table layout Preloader END===---->

                    <!----- ------>
					<div class="inner_banner">
					<img src="<?php echo base_url() . 'uploads/banners/' . $mid_banner; ?>" alt="Middel Banner" style="width:661px;height:278px;">
					</div>

					 <div id="mchtml">
					     <?php echo $getContent->getContent($date); ?>
					 </div>



                  </div>



<?php
/* first assigning cache to variable to check it is availabel in cache or not*/
$this->load->view("common/footer");
?>

<script>
/* function for detais pop*/
function detailPopup(id){
   var link = "<?php echo base_url() . $game . '/match-detail'; ?>" ;
   var url = link+'/'+id;

   window.open(url,'_blank',width=400,height=200);
}

function mygames(id)
{
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
		 $(".parentRwckShow_"+pid).removeClass("display_none");
		 $(".parentRwckShow_"+pid).addClass("display_tbl_row");
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

		 $(".childRwckHide_"+pid).removeClass("display_none");
		 $(".childRwckHide_"+pid).addClass("display_tbl_row");
      }
      if($(atrchild). prop("checked")  == false){
         if ($(atrP_child+":checked").length > 0) {}
         else{
			 if($(".childRwckHide_"+pid).length ==0 ){
				$(".parent_show"+ParentId).addClass("display_none");
				$("#parent_"+ParentId)[0].checked = false;
			 }

         }
      }
   }
}


/* function to load content and show my leagues start's */
function changeDate()
{
	var date = $("#datechange").val();
	window.location = "<?php echo base_url() . $game ?>/eventof/"+date;
}


$(document).ready(function() {
   loadContent();
});

var mycheccounter = 1;
function showLiveEvent()
{
	 url = "<?php echo base_url() . $game . '/showLiveEvent' ?>"
	 date = "<?php echo $this->uri->segment('3') ?>";
	 tdHtml = '';
	 $.getJSON(url , {date:date}, function( data ) {
		jQuery.parseJSON(JSON.stringify(data));
		$.each(data,function(e,v){
			/* getting parent tr  id */
			var pid = $(".<?= $game ?>_event_"+v.id).attr("id");
				var trHtml="";
				trHtml += "<td class=\"cell_ib icons left \">";
				trHtml += "<span class=\"icons left\">";
				trHtml += "<span class=\"tomyg icon0\">";
				trHtml += "<input type=\"checkbox\" onchange='mygames(\"child_"+v.id+","+pid+"\");'  class=\"checkbox parent_"+v.id+"  child_"+pid+"\" >";
				trHtml += "<\/span>";
				trHtml += "<\/span>";
				trHtml += "<\/td>";
				trHtml += "<td class=\"cell_ad time \">"+v.starttime+"<\/td>";
				trHtml += "<td class=\"cell_ad time \">"+v.status_text+"<\/td>";
				trHtml += "<td  class=\"cell_ab team-home \"><span class=\"padl ";
				if(v.home_score > v.away_score){
						trHtml += "bold ";
				}
				trHtml +=  "\" >";
				trHtml += v.home_team+"<\/span><\/td>";
				trHtml += "<td  class=\"cell_sa score \">"+v.home_score+" - "+v.away_score+"<\/td>";
				trHtml += "<td  class=\"cell_ac team-away \"><span class=\"padl ";
				if(v.home_score < v.away_score){
						trHtml += "bold ";
				}
				trHtml +=  "\" >";
				trHtml += v.away_team+"<\/span><\/td>";
				trHtml += "<td>";
				trHtml += "<span class=\"live-centre-inr\"><\/span>";
				trHtml += "<\/td>";

		$(".<?= $game ?>_event_"+v.id).html(trHtml);
		trHtml='';
		mycheccounter = mycheccounter+1;
		});
	 });
}
function getMyLeagues()
{
	/* This my leagues in tabs */
	$.each(localStorage, function(key, value){
		/* function to show myleague by game only */
	  length = 	"<?= $game ?>".length;
	  if(key.substring(0,length) == "<?= $game ?>_event_"){
		$("#parent_show"+value).removeClass('display_none');
		$("#parent_show"+value).addClass('display_show');
		$(".showme"+value).addClass('toggleMyLeague_icn');
	  }
	});
	/* For sidebar menu */

}

function countMyleague()
{
	var total_counter=	$(".display_show").length;
	$("#mygames-count").text(total_counter);
}

function loadContent()
{
	 url = "<?php echo base_url() . $game . '/getContent' ?>"
	 date = "<?php echo $this->uri->segment('3') ?>";
	  $.ajax({
			url:url,
			method:"POST",
			dataType :"html",
			data:{date:date},
			beforeSend:function(){
			   //	$('#preloader').show('fast');
			},
			success:function(res){
			   //	console.log(res);
				//$("#mchtml").html(res);
			},
			complete:function(){
			   //	$('#preloader').hide('fast');
				getMyLeagues();
				countMyleague();
				showLiveEvent();
				showLiveStar();
				/* This function is used to refresh live content  */
				   setInterval(function(){
					cdate = "<?php echo date('Y-m-d'); ?>";
					date = "<?php echo $this->uri->segment('3') ?>";
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


</script>

   </body>
</html>

