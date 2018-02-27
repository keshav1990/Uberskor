<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <title><?php echo $event[0]->name .' - '.$event[0]->stage_name?> </title>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
	        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/mac.css" media="screen">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/score_details.css" media="screen">
	   <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>countries.css" media="screen">
   </head>
   <body id="top" class="detailbody">
      <div id="detail" class="sport-soccer srt_profiles popup_ft_main">
	  
	  <style>
	  .profile_bg { width: auto !important ;text-align: left;margin-left: 12px;}
	  .profile_bg {}
	  .profile_bg .profile_img { float:left; margin-right: 12px;}
	  .profile_bg .tname-participant {text-align: left !important;}
	  
	  </style>
	  
	  <table class="detail">
			<thead>
			<tr>
				<th class="header">
					<div class="fleft">
						<span class=""></span><?=$event[0]->stage_name?>: <a href="#" ><?=$event[0]->name?> (<?=$event[0]->country?>)</a>
					</div>
				</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="hclean"></td>
			</tr>
			</tbody>
		</table>
	  
<table class="team profile_bg">
   <tbody>
      <tr>
         <td rowspan="3" class="tname-home face-enable tname-participant">
		    <a class="profile_img" href="#">
			   <!-- <img width="42" height="50" src="images/profile_img.jpeg" alt="Hoffman C." title="Profili göster"> -->
			</a>
		 
		 
            <span class="tname"><a href="#"><?=$event[0]->player_name?> (<?=$event[0]->player_country?>)</a></span>
            <div class="info">
               Doğum tarihi: <?=$profile[0]->date_of_birth?>
            </div>
         </td>
      </tr>
   </tbody>
</table>
	  
	  
	  
         <div id="sportstats">
            <div class="inner">
             
               <div id="glib-stats" class="glib-stats-content">
                  <div id="glib-stats-menu" class="stats-shared-menu">
				  
                     <ul class="ifmenu live-menu" style="background:#fff;" >
                        <li class="selected"><a href="#tab-1">Score Status</a></li>
                     </ul>

					 <!-----===Tab 1===------>
				<div id="tab-1" class="tab-content" style="display:block;">
				
				  
				  <div id="tab-01" class="tab-content2" style=" display:block;">
                  <div id="glib-stats-data" class="glib-stats-data">
                     <div id="box-table-type-1" class="glib-stats-box-table-overall">
                        <div class="stats-table-container">
                           <table id="table-type-1" class="stats-table stats-main table-1">
                              <thead>
                                 <tr class="main">									
									<th colspan="1" class="matches gTableSort-switch">Oyuncu</th>
									  <th colspan="1" class="matches gTableSort-switch">Par</th>
									  <th colspan="1" class="matches gTableSort-switch">Delik</th>
									  <th colspan="1" class="matches gTableSort-switch">Bugün</th>
									  <th colspan="1" class="matches gTableSort-switch">1</th>
									  <th colspan="1" class="matches gTableSort-switch">2</th>
									  <th colspan="1" class="matches gTableSort-switch">3</th>
									  <th colspan="1" class="matches gTableSort-switch">4</th>
									  <th colspan="1" class="matches gTableSort-switch">Toplam</th>
                                   
                                 </tr>
                              </thead>
                              <tbody>
                                <tr class="odd glib-participant-nVp0wiqd" >
								<td colspan="1" class="matches_played col_matches_played"><?=$event[0]->rank?></td>
								<td colspan="1" class="cell_ad time"><?=$event[0]->par?></td>
								  <td colspan="1" class="cell_ad time"><?=(!empty($event[0]->strokes4)?'F':'')?></td>
								  <td colspan="1" class="cell_ad time"><?=$event[0]->current_hole?></td>
								  <td colspan="1" class="cell_ad time"><?=$event[0]->strokes1?></td>
								  <td colspan="1" class="cell_ad time"><?=$event[0]->strokes2?></td>
								  <td colspan="1" class="cell_ad time"><?=$event[0]->strokes3?></td>
								  <td colspan="1" class="cell_ad time"><?=$event[0]->strokes4?></td>
								  <td colspan="2" class="cell_ad time"><?=$event[0]->strokes1+$event[0]->strokes2+$event[0]->strokes3+$event[0]->strokes4?></td>
                                </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
				  </div>
				   </div>
				  	 </div>
					 <!----===/Tab-1====--->
               </div>
            </div>
            <div class="spacer-block"></div>
         </div>
      
	  
      </div>
	  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
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
			
			$(".live-menu2 li a").click(function(event) {
                event.preventDefault();
                $(this).parent().addClass("selected");
                $(this).parent().siblings().removeClass("selected");
                var tab = $(this).attr("href");
                $(".tab-content2").not(tab).css("display", "none");
                $(tab).fadeIn();
            });
			
			});
      </script>
	  
	  
   </body>
</html>