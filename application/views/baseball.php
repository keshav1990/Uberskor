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


function change_acent12($str) {
   $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë','İ', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','ğ','ı','Ğ','Ş') ;
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E','I', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', 'a', '?', 'e', '?', '?', 'O', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','g','i','G','S') ;
  return str_replace($a, $b, $str) ;
}
function url_converter12($str, $separator = 'dash', $lowercase = TRUE, $en_val) {
  $CI = & get_instance() ;
//$str = remove_accents($str);
  $str = change_acent12($str) ;
//return $str;
//exit;
  $replace = ($separator == 'dash') ? '-' : '_' ;
  $trans = array('&\#\d+?;' => '', '&\S+?;' => '', '\s+' => $replace, '[^a-z0-9\-\._]' => '', $replace . '+' => $replace, $replace . '$' => $replace, '^' . $replace => $replace, '\.+$' => '') ;
  $str = strip_tags($str) ;
  foreach ($trans as $key => $val) {
    $str = preg_replace("#" . $key . "#i", $val, $str) ;
  }
  if ($lowercase === TRUE) {
    if (function_exists('mb_convert_case')) {
      $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8") ;
    }
    else {
      $str = strtolower($str) ;
    }
  }
  $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str) ;

  return trim(stripslashes($str)) ;
}
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
               <a href="<?php echo base_url(); ?>" id="logo"><img src="<?php echo base_url() . 'uploads/banners/' . $logo ?>" alt="Uberskor.com" style="width:315px;"></a>
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
					<img src="<?php echo base_url() . 'uploads/banners/' . $right_banner; ?>" alt="Right Banner" style="100%;" >
					<img src="<?php echo base_url() . 'assets/img/banner-right-2.jpg'; ?>" alt="Right Banner" style="width:100%;" >



                  </div>
               </div>
               <div id="tc">
               <div id="lc">
                     <div class="mbox0px l-brd flag_side">
                        <ul class="menu country-list my-leagues" title="">
                           <li class="head"><span class="toggleMyLeague"></span> Liglerim </li>
                           <ul id="my-leagues-list" class="menu" >
                               <?php foreach ($leagues as $row) { 
							   $URL = $row->name ;
                               $countryURI = url_converter12($row->country_name, "dash", TRUE, $row->cname) ;
                               $URL = url_converter12($URL, "dash", TRUE, $row->urlname) ;
							   ?>
                              <li style="display:none;">
							  <span class=" flag flag-<?=strtolower($row->flag )?>"></span>
							  <a title="<?php echo ucwords($row->country_name) . ': ' . ucwords($row->name) ?>" href="<?php echo base_url($game . '/') . $countryURI. '/' .$URL?>"><?= $row->name ?></a><span class="toggleMyLeague active "></span></li>
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
	$this->load->view("baseball/sidebar");
	?>

                  <div class="iedivfix"></div>
               </div>

               <div id="mc" class="sport_page">


				  <!---==== Table layout Preloader ===---->
					<?php $this->load->view('common/preloader'); ?>
				  <!---===Table layout Preloader END===---->

                    <!----- ------>
					<div class="inner_banner">
					<img src="<?php echo base_url() . 'uploads/banners/' . $mid_banner; ?>" alt="Middel Banner" style="width:100%;">
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
function detailPopup(id){
	var link = "<?php echo base_url() .$game. '/match-detail';?>" ;
	var url = link+'/'+id;
    openLeague(url);
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
				var trHtml1="";
				trHtml1 += " <td rowspan=\"2\" colspan=\"1\" class=\"cell_ib icons left\">    <input type=\"checkbox\" onchange='mygames(\"child_"+v.id+","+pid+"\");'  class=\"checkbox parent_"+pid+" child_"+v.id+"\" ><\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" rowspan=\"2\"  colspan=\"2\" class=\"cell_ad time\">"+v.starttime+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" rowspan=\"2\"  colspan=\"3\" class=\"cell_aa timer\"><span>"+v.status_text+"<\/span><\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_ad time\"><\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"8\" class=\"cell_ab team-home ";
				if(v.home_score > v.away_score){
					trHtml1 += "bold ";
				}
				trHtml1 +=  "\" ><span class=\"padl\">";
				trHtml1 += v.home_team;
				trHtml1 += "<span style=\"display:none;\" class=\"mobile_only_score1\">"+isNull(v.home_score)+"</span><\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_ab score-home ";
				if(v.home_score > v.away_score){
					trHtml1 += "bold ";
				}
				trHtml1 +=  "\" >";
				trHtml1 += isNull(v.home_score);
				trHtml1 += "<\/span><\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning1)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning2)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning3)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning4)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning5)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning6)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning7)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning8)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.home_result[0].inning9)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_se part-bottom\">"+isNull(v.home_result[0].extra_inning)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_se part-bottom\">"+isNull(v.home_result[0].hits)+"<\/td>";
				trHtml1 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_se part-bottom\">"+isNull(v.home_result[0].errors)+"<\/td>";
				trHtml1 += "<td  onclick=\"detailPopup('"+v.id+"')\" colspan=\"2\" rowspan=\"2\" class=\"cell_oq comparison live_icon_data\">";
				trHtml1 += "<span style=\"\" class=\"live-centre-inr\"><\/span>";
				trHtml1 += " <\/td>";



				var trHtml2="";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sc time\"><\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"8\"  class=\"cell_sc team-away ";
				if(v.home_score < v.away_score){
					trHtml2 += "bold ";
				}
				trHtml2 +=  "\" ><span class=\"padl\">";
				trHtml2 += v.away_team;
				trHtml2 += "<span style=\"display:none;\" class=\"mobile_only_score2\">"+isNull(v.away_score)+"</span><\/span><\/td>";
				
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\"  colspan=\"1\" class=\"cell_ab score-away padl ";
				if(v.home_score < v.away_score){
					trHtml2 += "bold ";
				}
				trHtml2 +=  "\" >";
				trHtml2 += isNull(v.away_score);
				trHtml2 += "<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning1)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning2)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning3)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\"  colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning4)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning5)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning6)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning7)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\"colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning8)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_sd part-bottom\">"+isNull(v.away_result[0].inning9)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_se part-bottom\">"+isNull(v.away_result[0].extra_inning)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_se part-bottom\">"+isNull(v.away_result[0].hits)+"<\/td>";
				trHtml2 += "<td onclick=\"detailPopup('"+v.id+"')\" colspan=\"1\" class=\"cell_se part-bottom\">"+isNull(v.away_result[0].errors)+"<\/td>";

		//trHtml1 = "<?php str_replace("null",'@','"trHtml1+"')?>";
		$(".<?=$game?>_event_"+v.id+"_1").html(trHtml1);
		$(".<?=$game?>_event_"+v.id+"_2").html(trHtml2);
		
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
				//$('#preloader').show('fast');
			},
			success:function(res){
				//$("#mchtml").html(res);
			},
			complete:function(){
				//$('#preloader').hide('fast');
				getMyLeagues();
				countMyleague();
				showLiveEvent();
				showLiveStar();
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
