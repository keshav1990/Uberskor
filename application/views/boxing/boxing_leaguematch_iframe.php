<?php
$this->load->view("common/header");
?>

         <div class="content iframe_pop_bx">
            <div id="main">

               <div id="tc">
			   
                 <div id="mc" class="sport_page">
   

				   
				   <div class="team-header">
					<div class="team-logo" ></div>
					
					<div class="team-name"><?=$tlist[0]->league_name?> - <?=ucwords($tlist[0]->gender)?></div>
				   </div>
				  
                  
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
						<?php
							$pathUrl = base_url().$game.'/'.$this->uri->segment('3').'/'.$this->uri->segment('4');
						?>
                            <ul class="ifmenu live-menu">
                              <li class="selected" ><a href="javascript:void(0)" onclick="goTo('puan durumu')">Puan Durumu</a></li>
							  
                           </ul>
						   
             
							<!-----Tab Content-4---->
							 <div id="tab-4"  style="display:none" class="fs-table tab-content">
							
								<div class="table_takim">

							  <table class="soccer od_table_mx programlar_bg tble_ntert" style="border-top:1px solid #ccc;">
							  
							  <thead style=" background:#000;">
							   <tr class="main">
								  <th class="rank col_rank gTableSort-switch" title="Rank"><a href="#" class="gTableSort-asc gTableSort-on"><span class="txt">#</span><span class="arrow"></span></a></th>
								  
								  <th class="participant_name col_name gTableSort-switch" title="Takim"><a href="#" class="gTableSort-off"><span class="txt">Takim</span><span class="arrow"></span></a></th>
								  
								  <th class="matches gTableSort-switch" title="Oynadigi ma�lar"><a href="#" class="gTableSort-off"><span class="txt">O</span><span class="arrow"></span></a></th>
								  
								  <th class="wins gTableSort-switch" title="Galibiyet"><a href="#" class="gTableSort-off"><span class="txt">G</span><span class="arrow"></span></a></th>
								  
								  <th class="draws gTableSort-switch" title="Beraberlik"><a href="#" class="gTableSort-off"><span class="txt">B</span><span class="arrow"></span></a></th>
								  
								  <th class="losses gTableSort-switch" title="Maglubiyet"><a href="#" class="gTableSort-off"><span class="txt">M</span><span class="arrow"></span></a></th>
								  
								  <th class="goals gTableSort-switch" title="Goller"><a href="#" class="gTableSort-off"><span class="txt">G</span><span class="arrow"></span></a></th>
								  
								  <th class="points gTableSort-switch" title="Puan">
								  <a href="#" class="gTableSort-off"><span class="txt">P</span><span class="arrow"></span></a></th>
								  
								  <th class="form" title="Son 5 Ma�" style="width:130px;">Form</th>
							   </tr>
		   
		   
		   
		   
</thead>
							  
							  <tbody>
							  <?php foreach($league_standing as $lst ): ?>
								<tr class="glib-participant-nVp0wiqd odd" data-def-order="0" title="">
							   <td class="rank col_rank no q1 col_sorted" title=""><?=$lst->rank?>.</td>
							   
							   <td class="participant_name col_participant_name col_name" title=""><span class="team-logo team-logo-258" style="background: transparent url(images/m-ljIBgFCg-OQGDrVDa.png) 0 0px no-repeat"></span><span class="team_name_span" style="width: 266px;"><a ><?=$lst->name?></a></span><span  class="dw-icon ico">&nbsp;</span></td>
							   
							   
							   <td class="matches_played col_matches_played"><?=$lst->played?></td>
							   <td class="wins col_wins"><?=$lst->wins?></td>
							   <td class="draws col_draws"><?=$lst->draws?></td>
							   <td class="losses col_losses"><?=$lst->defeits?></td>
							   <td class="goals col_goals"><?=$lst->goalsfor?>:<?=$lst->goalsagainst?></td>
							   <td class="goals col_goals"><?=$lst->points?></td>
							   <td class="form col_form">
								  <div class="matches-5 ">
									<a class="form-bg form-s" title="">&nbsp;</a>
								<?php if(!empty($lst->matches)) { ?>
								<?php $i=0;$imgClass=""; foreach($lst->matches as $match){
								if($match->win==1){$imgClass="form-w";}elseif($match->tie==1){$imgClass="form-d";}else{$imgClass="form-l";}
								if($i>4){break;}
								?>
								<a onclick='detailPopup("<?=$match->id?>");'  class="form-bg <?=$imgClass?>" title="[b]<?=$match->home_score.':'.$match->away_score?>&amp;nbsp;(<?=$match->home_team.' - '.$match->away_team?>)
								<?=$match->startdate?>">&nbsp;</a>
								<?php $i++;} } ?>
									</div>
							   </td>
							</tr>
								<?php endforeach; ?>


														  
														
														
							  </tbody>
							  </table>

							  </div>
							</div>
 
							 							 
							<div id="tab-6" style="display:block;" class="fs-table tab-content">
								
							<?php if(!empty($programMatch)){ ?>
							  <div class="odds-content">
							  <ul class="ifmenu tAB-1">
							  <li class="selected"><strong>Programlar</strong></li>
							  </ul>
							  <div class="ifmenu-border"></div>
							  
							  <div class="table_takim">
							  <table class="soccer od_table_mx programlar_bg">
							  
								<thead class="no-border-bottom" title="">
								   <tr class="league l_1_ljIBgFCg primary-top" title="">
									  <td colspan="1" class="head_aa ">
										 <!--<input type="checkbox" value="" name="">-->
									  </td>
									  <td colspan="3" class="head_ab " title=""> <span class="stats-link link-tables"></span><span class="country left"><span class="flag flag-<?=strtolower($programMatch[0]->flag)?> left" title="<?=$programMatch[0]->country?>"></span><span class="name"><span class="tournament_part"><?=$programMatch[0]->league_name?></span></span></span></td>
								   </tr>
								</thead>
								<tbody>
                                    <?php $i = 0; $date_diff = ''; foreach ($programMatch as $val2): $class = ($i%2 ==0 )? "even":"odd" ;?>
                                    <tr  title="<?=$programMatch->eventname?>"  class="<?=$class?> stage-finished" style="cursor: pointer;">
                                       <td class="cell_ib icons left" title=""></td>
                                       <td class="cell_ad time" ><?=$val2->startdate?> <?=$val2->starttime?></td>
                                       <td class="cell_ab team-home" ><span class="padr"><?=$val2->home_team?></span></td>
                                       <td class="cell_ac team-away" ><span class="padl"><?=$val2->away_team?></span></td>
                                    </tr>
                                    <?php $i++; $date_diff = $val2->date_diff; endforeach ?>
									<tr><td colspan="4">&nbsp;</td></tr>
                                 	</tbody>
							  </table>
							  </div>							 
                              </div>
							<?php } ?>
							
							</div>
							 

                        </div>
                
                     </div>
                  </div>
				

                
  
                  <div id="lc">


                  <div class="iedivfix"></div>
               </div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.css" media="screen" />

<script> 
jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});
function detailPopup(id){
   var link = "<?php echo base_url() .$game. '/match-detail';?>" ;
   var url = link+'/'+id;
   openLeague(url);
}
function openLeague(url) {
	if(isMobile()){
		window.open(url, '_blank');
	}else{
		/* window.open(url,'_blank',"width=500,height=500"); */
		$.fancybox({
			'href' : url ,
			'width' : 760,
			'height' : 660,
			'type':'iframe',
			'padding' : 0,
			'closeClick'  : false,
			'onStart' : function(){ jQuery.fancybox.showActivity(); $(".pop_overlay2").fadeIn(); }, 
			'onComplete' : function(){ jQuery.fancybox.hideActivity(); $(".pop_overlay2").fadeOut();}
		});
	}
  
}

function isNull(str)
{
	if(str != null){
		return str;
	}else{
		return '';
	}
}

function isMobile()
{
	$.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
	return $.browser.device;
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
</script>   


     
   </body>
</html>

