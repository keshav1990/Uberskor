<?php 

   $body_clr ="#".$_GET["body_color"];
   $inner_body_color = "#".$_GET["inner_body_color"];
   $innerbody_font_color = "#".$_GET["innerbody_font_color"];

   $footer_color = "#".$_GET["footer_color"];
   $footer_font_color = "#".$_GET["footer_font_color"];
   
   $tbl_head_color = "#".$_GET["tbl_head_color"];
   $tbl_row_color = "#".$_GET["tbl_row_color"];
   $tbl_font_color = "#".$_GET["tbl_font_color"];
   
   $sidebar_font_color = "#".$_GET["sidebar_font_color"];
   $sidebar_color = "#".$_GET["sidebar_color"];
   
   $subfooter_color = "#".$_GET["subfooter_color"];
   $subfooter_font_color = "#".$_GET["subfooter_font_color"];

   $tophead_color = "#".$_GET["tophead_color"];
   
   $sidebar_bottomlist_color = "#".$_GET["sidebar_bottomlist_color"];
   $sidebar_bottomlist_font_color = "#".$_GET["sidebar_bottomlist_font_color"];
   
   $last_list_color = "#".$_GET["last_list_color"];
   $last_list_font_color = "#".$_GET["last_list_font_color"];
   



?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <title>Preview</title>
   
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
   
   <style>
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

   </head>
   <body class="soccer v3" >
      <div id="control-panel-bg">
   <div id="control-panel">
      <div id="control-panel-content">

         <!---div id="control-panel-left">

            <span class="control-panel-icon-2">
               <a href="#" target="_blank" class="control-panel-icon-android" >Android</a>
            </span>

            <span class="control-panel-icon-2">
               <a href="#" target="_blank" class="control-panel-icon-apple" >iPhone/iPad</a>
            </span>


         </div -->

         <div id="control-panel-right">

            <div id="lsid-box">
               <span id="lsid">
               <div id="lsid-content"><div class="buttons">
            
               <div id="signIn" class="lsid-rounded-box black">Giriş</div><div id="registration" class="lsid-rounded-box">KAYIT</div></div></div></span>

               <span class="control-panel-icon">
                  <a href="#" class="control-panel-icon-setting" title="Ayarlar" ></a>
               </span>

               <span class="control-panel-icon control-panel-icon-last" title="Arama">
                  <a href="#" class="control-panel-icon-search"></a>
               </span>
            </div>

         </div>
      </div>
   </div>
</div>
     
      <div class="container">
     
     
         <!---div class="adsenvelope adstextvpad banx-top" id="lsadvert-zid-75" style="width: 970px;">
            <div style="height: 90px;">
               <div class="adscontent" id="lsadvert-top"><iframe id="lsadvert-zid-75-iframe" name="banx-top" frameborder="0" scrolling="no" style="width: 970px; height: 90px;" src="./index_files/saved_resource.html"></iframe></div>
               <div class="adsgraphvert">
                  <div class="adsgvert atv-tr"></div>
               </div>
            </div>
         </div -->
       
       

<?php 
// echo "<pre>";
$top_banner = $banners[0]->image;
$mid_banner = $banners[1]->image;
$right_banner = $banners[2]->image;
$left_banner = $banners[3]->image;
$logo = $banners[4]->image;

?>

         <div class="adsclear"></div>
         <div id="header">
            <div class="top">
               <h1>İddaa, Canlı Futbol Maç Skorları - İddaa Sonuçları, Canlı iddaa maç sonuçları</h1>
            </div>
            <div class="content">
               <a href="<?php echo base_url();?>" id="logo"><img src="<?php echo base_url().'uploads/banners/'.$logo?>" alt="Uberskor.com"></a>
               <div id="project-debug"></div>
               <div id="menu" class="menu-top">
			     <span class="toggle_img"><img src="<?php echo base_url().'assets/images/show-menu-icon.png';?>" alt=""></span>
                  <ul class="menu_tggle">
                     <li class="active"><a href="index.php?sportFK=1">Futbol</a></li>
                     <li><a href="basketbol.html">Basketbol</a></li>
                     <li><a href="tenis.html">Tenis</a></li>
                     <li><a href="voleybol.html">Voleybol</a></li>
                     <li><a href="hentbol.html">Hentbol</a></li>
                     <li><a href="hokey.html">Hokey</a></li>
                     <li><a href="beyzbol.html">Beyzbol</a></li>
                     <li><a href="amerikan-futbolu.html">Amerikan Fut.</a></li>
                     <li><a href="rugby.html">Rugby</a></li>
                     <li>
                        <span class="corner-left"></span>
						<span class="content"><a class="other" href="#" ><span class="sport-icon minority"></span>Diğer<span class="arrow"></span></a></span><span class="corner-right"></span>
                        <ul id="menumin">
                           <li><a href="#"><span class="sport-icon horse-racing s35" ></span>At yarışı <span class="sportcount">140</span></a></li>
                           <li onmouseover="menumin_fix()"><a href="#"><span class="sport-icon winter-sports s37 rt"></span>Kış Sporları <span class="sportcount">3</span></a></li>
                           <li><a href="#"><span class="sport-icon aussie-rules s18"></span>Avustralya Fut. <span class="sportcount">2</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon mma s28 rt"></span>MMA</a></li>
						   
                           <li><a href="#"><span class="sport-icon badminton s21" ></span>Badminton <span class="sportcount">20</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon table-tennis s25 rt"></span>Masa tenisi</a></li>
						   
                           <li><a href="#"><span class="sport-icon bandy s10"></span>Bandy <span class="sportcount">12</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon motorsport s31 rt" ></span>Motor Sporları <span class="sportcount">1</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon cycling s34"></span>Bisiklet</a></li>
						   
                           <li><a href="#"><span class="sport-icon netball s29 rt" ></span>Netball <span class="sportcount">2</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon boxing s16"></span>Boks</a></li>
						   
                           <li><a href="#"><span class="sport-icon pesapallo s30 rt"></span>Pesäpallo</a></li>
						   
                           <li><a href="#"><span class="sport-icon darts s14"></span>Dart <span class="sportcount">43</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon beach-soccer s26 rt"></span>Plaj futbolu</a></li>
						   
                           <li><a href="#"><span class="sport-icon esports s36" ></span>E-sporlar <span class="sportcount">40</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon beach-volleyball s17 rt"></span>Plaj voleybolu</a></li>
						   
                           <li><a href="#"><span class="sport-icon floorball s9"></span>Floorball <span class="sportcount">6</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon rugby-league s19 rt"></span>Rugby Ligi <span class="sportcount">7</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon futsal s11" title="Günün maçları: 24"></span>Futsal <span class="sportcount">24</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon snooker s15 rt" ></span>Snooker <span class="sportcount">32</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon golf s23"></span>Golf <span class="sportcount">3</span></a></li>
						   
						   
                           <li><a href="#"><span class="sport-icon water-polo s22 rt"></span>Su topu <span class="sportcount">6</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon cricket s13 last"></span>Kriket <span class="sportcount">5</span></a></li>
						   
                           <li><a href="#"><span class="sport-icon field-hockey s24 last rt"></span>Çim hokeyi</a></li>
                        </ul>
                     </li>
                  </ul>
                  <div class="menu-border"></div>
               </div>
            </div>
         </div>
         <div class="content">
            <div id="main">
               <div id="rc-top">
                  <div id="rccontent">
                    
					<!-----Google Add iframe------>
					<img src="<?php echo base_url().'uploads/banners/'.$right_banner;?>" alt="Right Banner" >
                    
                    
                  </div>
               </div>
               <div id="tc">
                  <div id="mc" class="sport_page">
				  
                    <!----- ------>
					<div class="inner_banner">
					<img src="<?php echo base_url().'uploads/banners/'.$mid_banner;?>" alt="Middel Banner">
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
         <table class="soccer odds" colgroup="" id="parent_<?=$row1->id?>" width="100%">
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
                                    <tr class="league l_1_WbuOhZRa ">

                                       <td colspan="1" class="head_aa ">
                                          <div class="dicons">
                                             <span class="icons left">
                                                <span id="latomyg_1_WbuOhZRa" class="tomyg">
                        <input type="checkbox" id="select_all" onchange='mygames("parent_<?=$row1->id?>");' class="parent_<?=$row1->id?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>

                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag  left-odds" title=""></span><span class="name"><span class="country_part">Demo Country: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
                                       </td>

                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                                 
                              
                              <?php  } ?>
                                    <tr id="g_1_hf9ayLs3 trID_<?=$row1->id?> child_<?=$parentID?>" onclick='detailPopup("<?=$row1->id?>,<?=$row1->stage_id?>");' title="Demo-Title" class="tr-first even stage-scheduled" style="cursor:pointer;">
                                       
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$parentID?>");'  class="checkbox child_<?=$parentID?>" >
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
                              <table class="soccer odds" id="parent_<?=$row1->id?>"  colgroup="" width="100%">
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
                        <input type="checkbox" id="select_all" onchange='mygames("parent_<?=$row1->id?>");' class="parent_<?=$row1->id?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag fl_81 left-odds" title="<"></span><span class="name"><span class="country_part">Demo Country: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
                                       </td>
                                      
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr id="g_1_hf9ayLs3 trID_<?=$row1->id?>" onclick='detailPopup("<?=$row1->id?>,<?=$row1->stage_id?>");' title="Demo-Title" class="tr-first even stage-scheduled" style="cursor:pointer;">
                                       <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$parentID?>");'  class="checkbox child_<?=$parentID?>" >
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
                              <table class="soccer odds" id="parent_<?=$row1->id?>"  colgroup=""  width="100%">
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
                        <input type="checkbox" id="select_all" onchange='mygames("parent_<?=$row1->id?>");' class="parent_<?=$row1->id?>" >
                                                </span>
                                             </span>
                                          </div>
                                       </td>
                                       <td colspan="5" class="head_ab left project-bonus-border "><span class="country left"><span class="flag fl_81 left-odds" title=""></span><span class="name"><span class="country_part">Demo Country: </span><span class="tournament_part"> <?=$row1->stage_name?> </span></span></span>
                                       </td>
                                     
                                    </tr>
                 
                              </thead>
                              
                              <tbody>
                               <?php  } ?>
                                    <tr id="g_1_hf9ayLs3 trID_<?=$row1->id?>" onclick='detailPopup("<?=$row1->id?>,<?=$row1->stage_id?>");' title="Demo-Title" class="tr-first even stage-scheduled" style="cursor:pointer;">
                                     <td class="cell_ib icons left ">
                                          <span class="icons left">
                                             <span class="tomyg icon0">
               <input type="checkbox" onchange='mygames("child_<?=$parentID?>");'  class="checkbox child_<?=$parentID?>" >
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
				  <br><br>

                  <div id="lc">
                     <div class="mbox0px l-brd">
                        <ul class="menu country-list my-leagues" title="">
                           <li class="head">Liglerim </li>
                           <ul id="my-leagues-list" class="menu" >
                               <?php  foreach ($leagues as $row) { ?>
                              <li><a href="<?php echo base_url('home/leagueMatch/').$row->id?>"><?=$row->name?></a></li>
                              <?php } ?>
                       <!-- - - -Irame BOx- - - - - -->
                       
                              <li class="banner last-item-banner">
                                <img src="<?php echo base_url().'uploads/banners/'.$left_banner;?>" alt="Left Banner" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
                       
                       
                           </ul>
                        </ul>
                       
                     </div>
                     <div class="spacer10"></div>
                     <div class="mbox0px l-brd">
                        <ul class="menu country-list my-teams">
                           <li class="head"><span class="toggleMyTeam"></span>Takımlarım <span class="count">(0)</span></li>
                           <ul id="my-teams-list" class="menu">
                              <li class="last myTeamInfo">Takımlarınızı seçmek için takım isimlerinin yanında bulunan <span class="toggleMyTeam"></span> simgesine tıklayınız.</li>
                           </ul>
                        </ul>
                     </div>
                     <div class="spacer10"></div>
                   
                     <div class="mbox0px l-brd">
                        <ul class="menu country-list">
                           <li class="head">Ülkeler</li>
                           <li>
                              <a href="#">ABD</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">MLS</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Almanya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Bundesliga</a></li>
                                 <li><a href="#">2. Bundesliga</a></li>
                                 <li><a href="#">3. Liga</a></li>
                                 <li><a href="#">DFB Pokal</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Andorra</a></li>
                           <li>
                              <a href="#">Angola</a>
                              <ul class="submenu hidden">
                                 <li class="last"><a href="#">Girabola League</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Arjantin</a>
                              <ul class="submenu hidden">
                                 <li class=""><a href="#">Primera División</a></li>
                                 <li class="last"><a href="#">Torneos De Verano</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Arnavutluk</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Süper Lig</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Avustralya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">A-Ligi</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Avusturya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Tipico Bundesliga</a></li>
                                 <li><a href="#">Erste Liga</a></li>
                                 <li class="last"><a href="#">ÖFB Kupası</a></li>
                              </ul>
                           </li>
                           
                           <li>
                              <a href="#">BAE</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">1nci Küme</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                
                <!-  -  -  -iframe css - -->
                     <div class="spacer10"></div>
                     <!--div class="adsenvelope adstextpad banx-left_menu_2" id="lsadvert-zid-201" style="width: 120px;">
                        <div style="height: 240px;">
                           <div class="adscontent" id="lsadvert-left_menu_2"><iframe id="lsadvert-zid-201-iframe" name="banx-left_menu_2" frameborder="0" scrolling="no" style="width: 120px; height: 240px;" src="./index_files/saved_resource(4).html"></iframe></div>
                           <div class="adsgraphhori">
                              <div class="adsghori ath-tr" style="display: block;"></div>
                           </div>
                        </div>
                     </div- -->
                <img style="width:100%;" src="images/cool-shose.jpg" alt="">
                 <!-- - -//iframe css- - -->
                
                
                     <div class="mbox0px l-brd">
                        <ul class="menu country-list">
                           <li><a href="#">Bahreyn</a></li>
                           <li><a href="#">Bangladeş</a></li>
                           <li>
                              <a href="#">Belçika</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Jupiler Ligi</a></li>
                                 <li><a href="#">Proximus League</a></li>
                                 <li><a href="#">Kupa</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Benin</a></li>
                           <li><a href="#">Bermuda</a></li>
                           <li>
                              <a href="#">Beyaz Rusya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Vysshaya Liga</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Bolivya</a>
                              <ul class="submenu hidden" >
                                 <li class="last" ><a href="">Futbol Pro Ligi</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Bosna Hersek</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Premier Lig</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Botswana</a></li>
                           <li>
                              <a href="#">Brezilya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Série A</a></li>
                                 <li><a href="#">Copa do Brasil</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                     <div class="spacer10"></div>
                     <!---div class="adsenvelope adstextpad banx-left_menu_3" id="lsadvert-zid-2734" style="width: 120px;">
                        <div style="height: 240px;">
                           
                           <div class="adscontent" id="lsadvert-left_menu_3"><iframe id="lsadvert-zid-2734-iframe" name="banx-left_menu_3" frameborder="0" scrolling="no" style="width: 120px; height: 240px;" src="./index_files/saved_resource(5).html"></iframe></div>
                           <div class="adsgraphhori">
                              <div class="adsghori ath-tr" style="display: block;"></div>
                           </div>
                        </div>
                     </div- -->
                
                
                
                     <div class="mbox0px">
                        <ul class="menu country-list">
                           <li><a href="#">Kazakistan</a></li>
                           <li><a href="#"</li>
                           <li><a href="#">Kongo DC</a></li>
                           <li><a href="#">Kosova</a></li>
                           <li>
                              <a href="#">Kosta Rika</a>
                              <ul class="submenu hidden" data-ajax="true">
                                 <li><a href="#">Primera Division</a></li>
                              </ul>
                           </li>
                           <li><a href="#" >Kuveyt</a></li>
                           <li>
                              <a href="#">Kuzey İrlanda</a>
                              <ul class="submenu hidden">
                                 <li class=""><a href="#">NIFL Premiership</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Lesotho</a></li>
                           <li>
                              <a href="#">Letonya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">SynotTip Virslīga</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Liberya</a></li>
                           <li><a href="#">Libya</a></li>
                           <li><a href="#">Liechtenstein</a></li>
                           <li>
                              <a href="#">Litvanya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">A Lyga</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Lübnan</a></li>
                           <li><a href="#">Lüksemburg</a></li>
                           <li>
                              <a href="#">Macaristan</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">OTP Bank Liga</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Makedonya Cumhuriyeti</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Prva Ligi</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Malawi</a></li>
                           <li>
                              <a href="#">Malezya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Süper Lig</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Mali</a></li>
                           <li>
                              <a href="#">Malta</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Premier Lig</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Mauritius</a></li>
                           <li>
                              <a href="#">Meksika</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Primera División</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_69">
                              <a href="#">Mısır</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Premier Lig</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Moldova</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Ulusal Lig</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Moritanya</a></li>
                           <li><a href="#">Mozambik</a></li>
                           <li><a href="#">Myanmar</a></li>
                           <li><a href="#">Namibia</a></li>
                           <li><a href="#">Niger</a></li>
                           <li><a href="#">Nijerya</a></li>
                           <li><a href="#">Nikaragua</a></li>
                           <li>
                              <a href="#">Norveç</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Eliteserien</a></li>
                                 <li><a href="#">OBOS-ligaen</a></li>
                                 <li><a href="#">NM Kupası</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Oman</a></li>
                           <li><a href="#">Özbekistan</a></li>
                           <li><a href="#">Pakistan</a></li>
                           <li><a href="#">Panama</a></li>
                           <li>
                              <a href="#">Paraguay</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Primer Küme</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Peru</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Primera División</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_154">
                              <a href="#">Polonya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Ekstraklasa</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Portekiz</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Primeira Liga</a></li>
                                 <li><a href="#">Segunda Liga</a></li>
                                 <li ><a href="#">Taça de Portugal</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Romanya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Liga 1</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Ruanda</a></li>
                           <li>
                              <a href="#">Rusya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Premier Ligi</a></li>
                              </ul>
                           </li>
                           <li><a href="#">San Marino</a></li>
                           <li><a href="#">Senegal</a></li>
                           <li><a href="#">Seyşel Adaları</a></li>
                           <li>
                              <a href="#">Sırbistan</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Super Liga</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Sierra Leone</a></li>
                           <li>
                              <a href="#">Singapur</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">S.League</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Slovakya</a>
                              <ul class="submenu hidden">
                                 <li class=""><a href="#">Fortuna liga</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Slovenya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Prva Liga</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Somali</a></li>
                           <li><a href="#">Sri Lanka</a></li>
                           <li><a href="#">Sudan</a></li>
                           <li><a href="#">Suriye</a></li>
                           <li><a href="#">Suudi Arabistan</a></li>
                           <li><a href="#">Swaziland</a></li>
                           <li>
                              <a href="#">Şili</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Primera División</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Tacikistan</a></li>
                           <li><a href="#">Tanzanya</a></li>
                           <li><a href="#">Tayland</a></li>
                           <li><a href="#">Togo</a></li>
                           <li><a href="#">Trinidad ve Tobago</a></li>
                           <li>
                              <a href="#">Tunus</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">1. Profesyonel Ligi</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_191">
                              <a href="#">Türkiye</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Spor Toto Süper Lig</a></li>
                                 <li><a href="#">TFF 1. Lig</a></li>
                                 <li><a href="#">Türkiye Kupası</a></li>
                              </ul>
                           </li>
                           <l><a href="#">Türkmenistan</a></li>
                           <li><a href="#">Uganda</a></li>
                           <li>
                              <a href="#">Ukrayna</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Pari-Match League</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#">Uruguay</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Primera Division</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Ürdün</a></li>
                           <li><a href="#">Venezuela</a></li>
                           <li><a href="#">Vietnam</a></li>
                           <li><a href="#">Yemen</a></li>
                           <li><a href="#">Yeni Zelanda</a></li>
                           <li><a href="#">Yeşilburun</a></li>
                           <li>
                              <a href="#">Yunanistan</a>
                              <ul class="submenu hidden" data-ajax="true">
                                 <li><a href="#">Super Ligi</a></li>
                              </ul>
                           </li>
                           <li><a href="#">Zambiya</a></li>
                           <li><a href="#">Zimbabwe</a></li>
                           <li class="head">Diğer Karşılaşmalar</li>
                           <li id="lmenu_1">
                              <a href="#">Afrika</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Afrika Uluslar Kupası</a></li>
                                 <li><a href="#">CAF Şampiyonlar Ligi</a></li>
                                 <li><a href="#">Dünya Kupası</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_5">
                              <a href="#">Asya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Asya Kupası</a></li>
                                 <li><a href="#">AFC Şampiyonlar Ligi</a></li>
                                 <li><a href="#">Dünya Kupası</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_6">
                              <a href="#">Avrupa</a>
                              <ul class="submenu hidden" data-ajax="true">
                                 <li><a href="#">Euro</a></li>
                                 <li><a href="#">Şampiyonlar Ligi</a></li>
                                 <li><a href="#">Avrupa Ligi</a></li>
                                 <li><a href="#">UEFA Süper Kupası</a></li>
                                 <li><a href="#">European U21 Şampiyonası</a></li>
                                 <li><a href="#">Dünya Kupası</a></li>
                                 <li><a href="#">European U19 Şampiyonası</a></li>
                                 <li><a href="#">European U17 Şampiyonası</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_7">
                              <a href="#">Avustralya &amp; Okyanusya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Dünya Kupası</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_8">
                              <a href="#">Dünya</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Dünya Kupası</a></li>
                                 <li><a href="#">Uluslararası Dostluk Maçı</a></li>
                                 <li><a href="#">Kulüpler Arası Dostluk Maçı</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_3">
                              <a href="#">Güney Amerika</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Copa America</a></li>
                                 <li><a href="#">Copa Libertadores</a></li>
                                 <li><a href="#">Copa Sudamericana</a></li>
                                 <li><a href="#">Dünya Kupası</a></li>
                              </ul>
                           </li>
                           <li id="lmenu_2">
                              <a href="#">Kuzey &amp; Orta Amerika</a>
                              <ul class="submenu hidden">
                                 <li><a href="#">Altın Kupa</a></li>
                                 <li><a href="#">CONCACAF Şampiyonlar Ligi</a></li>
                                 <li><a href="#">Dünya Kupası</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                     <div class="spacer10"></div>
                     <div class="mbox">
                        <ul class="menu partner">
                           <li class="head">Partnerler</li>
                           <li><a href="#"><span class="elink">Soccer stats</span></a></li>
                           <li><a href="#"><span class="elink">Livescore.in</span></a></li>
                           <li class="rd"><a href="#">Tavsiye edilen siteler</a></li>
                        </ul>
                     </div>
                   
                    
                  </div>
                  <div class="iedivfix"></div>
               </div>


               <div id="e-content">
                  <div class="page-block"><b>Yardım:</b> Canlı Skor tarafından sunulan canlı futbol skorları hizmeti 1000'den fazla futbol ligi, kupa ve turnuvasından futbol canlı maç sonuçları ve canlı skor bilgisiyle birlikte, puan durumu, gol atan oyuncular, futbol ilk yarı sonuçları, kırmızı kartlar, sarı kartlar, gol bildirimleri ve diğer iddaa canlı skor bilgilerini sunar. Sesli uyarılardan yararlanın, kendi maç seçiminizi yapın, futbol maç sonuçlarını ve futbol canlı skorlarını öğrenin. İddaa canlı maç sonuçları hizmeti gerçek zamanlı olduğundan sayfayı yenilemeniz gerekmez. CanliSkor.com’da İngiliz Premier League canlı skor, Serie A canlı maç sonuçları, Bundesliga sonuçları, MLS, <a href="#">Türkiye Süper Ligi</a>, ve Avustralya futbol veya Mısır Premier League’den canlı maç sonuçlarını ve iddaa sonuçlarını bulabilirsiniz. 
                     <br><strong>Süper Lig canlı skorları</strong> CanliSkor.com sayfalarında! Süper Lig fikstür: 03.03. Trabzonspor - Karabükspor, 04.03. Bursaspor - Gaziantepspor, Beşiktaş - Rizespor, 05.03. Başakşehir - Alanyaspor, Adanaspor - Konyaspor, Fenerbahçe - Osmanlıspor, Kayserispor - Kasımpaşa, 06.03. Gençlerbirliği - Akhisar Belediyespor, Antalyaspor - Galatasaray.
                     <br>CanliSkor.com'un diğer canlı skor hizmetlerinden daha iyi olmasının ardındaki <a href="#">10 nedeni</a> okuyun.
                  </div>
               </div>
            </div>
         </div>
         <div id="footer">
            <div>
            
               <div class="footercls-1">
                  <div class="footer-label">Spor</div>
                  <ul class="footer-sport">
                     <li><a href="#">Futbol</a></li>
                     <li><a href="#">Basketbol</a></li>
                     <li><a href="#">Tenis</a></li>
                     <li><a href="#">Voleybol</a></li>
                     <li><a href="#">Hentbol</a></li>
                     <li><a href="#">Hokey</a></li>
                     <li><a href="#">Beyzbol</a></li>
                     <li><a href="#">Amerikan Futbolu</a></li>
                     <li><a href="#">Rugby</a></li>
                     <li><a href="#">Rugby Ligi</a></li>
                     <li><a href="#">Floorball</a></li>
                  </ul>
                  <ul class="footer-sport">
                     <li><a href="#">Bandy</a></li>
                     <li><a href="#">Futsal</a></li>
                     <li><a href="#">Avustralya Futbolu</a></li>
                     <li><a href="#">Kriket</a></li>
                     <li><a href="#">Dart</a></li>
                     <li><a href="#">Snooker</a></li>
                     <li><a href="#">Boks</a></li>
                     <li><a href="#">Plaj voleybolu</a></li>
                     <li><a href="#">Badminton</a></li>
                     <li><a href="#">Su topu</a></li>
                     <li><a href="#">Golf</a></li>
                  </ul>
                  <ul class="footer-sport last">
                     <li><a href="#">Çim hokeyi</a></li>
                     <li><a href="#">Masa tenisi</a></li>
                     <li><a href="#">Plaj futbolu</a></li>
                     <li><a href="#">MMA</a></li>
                     <li><a href="#">Netball</a></li>
                     <li><a href="#">Pesäpallo</a></li>
                     <li><a href="#">Motor Sporları</a></li>
                     <li><a href="#">Bisiklet</a></li>
                     <li><a href="#">At yarışı</a></li>
                     <li><a href="#">E-sporlar</a></li>
                     <li><a href="#">Kış Sporları</a></li>
                  </ul>
                  <div class="cleaner"></div>
               </div>
               
               <div class="footercls-2">
                  <div class="footer-left-spacer">
                     <div class="footer-label">Bizi takip edin</div>
                     <div class="footer-social-buttons">
                        <a class="facebook" href="#" title="Facebook" target="_blank"></a>
                        <a class="google-plus" href="#" title="Google+" target="_blank"></a>
                        <a class="twitter" href="#" title="Twitter" target="_blank"></a>
                        <div class="cleaner"></div>
                     </div>
                     <div class="footer-label"><a href="#">Mobil</a></div>
                     <div class="footer-mobile-buttons">
                        <a class="app-store" href="#" title="iPhone/iPad uygulaması" target="_blank"></a>
                        <a class="google-play" href="#" title="Android uygulaması" target="_blank"></a>
                        <div class="cleaner"></div>
                     </div>
                     <ul>
                        <li><a href="#" target="_blank"> Touch versiyon</a></li>
                        <li><a href="#" target="_blank"> Mobil versiyon</a></li>
                     </ul>
                  </div>
               </div>
               
               <div class="footercls-3">
                  <div class="footer-left-spacer">
                     <div class="footer-label">CanliSkor.com</div>
                     <ul>
                        <li><a href="#">Kullanım Şartları</a></li>
                        <li><a href="#">Reklam</a></li>
                        <li><a href="#">İletişim</a></li>
                     </ul>
                     <br>
                     <ul>
                        <li><a href="#">Mobil</a></li>
                        <li><a href="#">Livescore</a></li>
                        <li><a href="#">Online Bahis</a></li>
                     </ul>
                  </div>
               </div>
               
               
               <div class="cleaner"></div>
            </div>
            <div id="footer-copyright">Copyright © 2006-17 CanliSkor.com</div>
         </div>
         <div id="scroll-to-top" style="display:block;"><span>Yukarı</span></div>
      </div>
      
      
    <!------popup-html------>
  <div class="pop_overlay Overpop1">
     <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close" ></a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents">
            <div class="login selected">
               <h1>Giriş</h1>
               <div class="content" id="login-content">
                  <div class="form">
                     <form id="login-form" method="post" action="">
                        <div class="social-buttons border-bottom">
                           <a id="#login-fb" class="fb_clse" href="#fb">
                              <div class="facebook">
                                 <span class="icon"></span>FACEBOOK
                              </div>
                           </a>
                           <a id="#login-google" href="#google">
                              <div class="google"><span class="icon"></span>GOOGLE+</div>
                           </a>
                           <a id="#login-twitter" href="#twiter">
                              <div class="twitter"><span class="icon"></span>TWITTER</div>
                           </a>
                        </div>
                        <div class="email-form-element border-bottom"><input type="text" style="display: none;"><input type="text" id="email" name="email" tabindex="1" placeholder="Eposta"></div>
                        <div class="password-form-element border-bottom"><span class="show">Göster</span><input type="password" id="passwd" name="passwd" tabindex="2" placeholder="Şifre"></div>
                        <div class="password-confirm-form-element"><input type="hidden" id="passwdagain" name="passwdagain"><input type="checkbox" id="persistentlogin" name="persistentlogin" checked="checked" style="visibility: hidden; display: none;"></div>
                        <div class="sign-up-form-element">
                           <input type="submit" value="Giriş" id="login" name="login">
                           <div id="login-log-in-link" class="log-in">
                              <div class="content">veya <a href="#[lsid:registration]">kaydol</a></div>
                           </div>
                           <div class="terms"><a href="/#[lsid:forgottenPassword]" class="lost-password">Şifrenizi mi unuttunuz?</a></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/popup-html--- --->


<!------Pop2-html----- -->
 <div class="pop_overlay Overpop2">
<div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp2" href="#" title="Pencereyı kapat"></a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents">
            <div class="registration selected">
               <h1>Ücretsiz kaydolun</h1>
               <div class="content">
                  <div class="form">
                     <form id="registration-form" method="post" action="">
                        <div class="social-buttons border-bottom">
                           <a href="#fb">
                              <div id="#registration-fb" class="facebook"><span class="icon"></span>FACEBOOK</div>
                           </a>
                           <a href="#google">
                              <div id="#registration-google" class="google"><span class="icon"></span>GOOGLE+</div>
                           </a>
                           <a href="#twiter">
                              <div id="#registration-twitter" class="twitter"><span class="icon"></span>TWITTER</div>
                           </a>
                        </div>
                        
                        <!----input feild box--- -->
                        <div class="email-form-element border-bottom"><input type="text" style="display: none;"><input type="text" id="email" name="email" tabindex="1" placeholder="Eposta"></div>
                        
                        <!----input feild box--- -->
                        <div class="password-form-element border-bottom"><span class="show">Göster</span><input type="password" id="passwd" name="passwd" tabindex="2" placeholder="Şifre"></div>
                        
                        <!----input feild box--- -->
                        <div class="password-confirm-form-element"><input type="hidden" id="passwdagain" name="passwdagain"><input type="checkbox" id="termsofservice" name="termsofservice" checked="checked" style="visibility: hidden; display: none;"></div>
                        
                        <!----captcha iframe box--- -->
                        <div class="captcha">
                           <div id="recaptcha_response_field" class="g-recaptcha captcha-preload" style="display: block; transform: scale(0.78); transform-origin: 0px 0px 0px;">
                              <div style="width: 304px; height: 78px;">
                                 <div><iframe src="https://www.google.com/recaptcha/api2/anchor?k=6LdnlAoTAAAAAIzaLLR8ezPKKnLeM2LozP6OQKj_&amp;co=aHR0cDovL3d3dy5jYW5saXNrb3IuY29tOjgw&amp;hl=tr&amp;v=r20170228102020&amp;size=normal&amp;cb=1pnp00wqzk5c" title="recaptcha widget'ı" width="304" height="78" frameborder="0" scrolling="no" name="undefined"></iframe></div>
                                 <textarea id="g-recaptcha-response-1" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                              </div>
                           </div>
                        </div>
                        
                        <!----Submit box--- -->
                        <div class="sign-up-form-element">
                           <input type="submit" value="Kaydol" id="registration" name="registration">
                           <div id="registration-log-in-link" class="log-in">
                              <div class="content">veya <a href="#">giriş yap</a></div>
                           </div>
                           <div id="terms-link" class="terms">Hesap açarak <a href="#" target="_blank">Kullanım Şartlarımızı</a> kabul etmiş sayılırsınız</div>
                        </div>
                        
                        
                     </form>
                  </div>
                  <div id="benefits-link" class="benefits">
                     <ul>
                        <li><span class="sync"></span><span class="content">Tüm cihazlarınızda senkronizasyon</span></li>
                        <li><span class="favorite"></span><span class="content">Favori lig &amp; takımlarınızı daha kolay takip edin</span></li>
                        <li><span class="features"></span><span class="content">Tüm yeni özellikleri takip edin</span></li>
                     </ul>
                  </div>
                  <div class="devices"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!- - ----Pop2-html----- -->


<!--- ---Pop3-html----- -->
 <div class="pop_overlay Overpop3">
<div id="lsid-window">
   <a id="lsid-window-close" class="close clsepp3" href="#" title="Pencereyı kapat"></a>
   <div class="content-wrap">
      <div id="livescore-settings">
         <ul class="tabs-menu">
            <li class="li0 settings selected"><span><a class="settings unclickable" href="#" onclick="return false;">Ayarlar</a></span></li>
         </ul>
         <div class="contents">
            <div class="settings selected">
               <form id="livescore-settings-form" method="post" action="/">
                  <div class="header">Genel ayarlar</div>
                  <div class="content">
                     <div class="error-box" style="display: none;"><span class="err-msg">Bu özelliği kullanabilmak için hesabınıza giriş yapmış olmalısınız. <a href="#">Hesabınıza buradan giriş yapabilirsiniz!</a></span></div>
                     <div class="sortby-form-element">
                        <strong>Sıralama ölçütü:</strong>
                        <div class="options">
                           <label><input type="radio" name="sortby" value="league">Lig adı</label><br>
                           <label><input type="radio" name="sortby" value="time">Başlangıç zamanı</label>
                        </div>
                     </div>
                     <div class="topfirst-form-element">
                        <strong>Liglerimi yukarıda göster:</strong>
                        <div class="options">
                           <label><input type="radio" name="topfirst" value="true" checked="checked">Evet</label><br>
                           <label><input type="radio" name="topfirst" value="false">Hayır</label>
                        </div>
                     </div>
                  </div>
                  <div class="header">Oyunlarım  </div>
                  <div class="content">
                     <div class="mggroups-form-element">
                        <strong>Gruplara ayırmayı etkinleştir:</strong>
                        <div class="options">
                           <label><input type="radio" name="mggroups" value="true">Evet</label><br>
                           <label><input type="radio" name="mggroups" value="false" checked="checked">Hayır</label>
                        </div>
                     </div>
                     <div class="mgnotifications-form-element">
                        <strong>Bildirimleri ekranın sol alt köşesinde görüntüle:</strong>
                        <div class="options">
                           <label><input type="radio" name="mgnotifications" value="yessound">Evet, ses efektiyle birlikte</label><br>
                           <label><input type="radio" name="mgnotifications" value="yessilent" checked="checked">Evet, ses efekti olmadan</label><br>
                           <label><input type="radio" name="mgnotifications" value="no">Hayır</label>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!- - ----Pop4-html----- -->


<div class="pop_overlay Overpop4">
<div id="ls-search-window" class="ls-manager-window">
   <a id="ls-search-window-close" class="close clsepp4" href="#" title="closeWindow"></a>
   <div class="content-wrap">
      <ul class="tabs-menu">
         <li class="li0 selected">
            <span><a class="unclickable" href="#" onclick="return false;">Arama</a></span>
         </li>
      </ul>
      <div class="contents">
         <div class="content">
            <form id="search-form" onsubmit="return false;">
               <div>
                  <div class="search-form-label-wrapper">
                     <div id="search-input-wrapper" class="">
                        <div class="search-input-submit" id="search-form-submit-button">
                           Ara
                        </div>
                        <span class="search-input-sport-wrapper">
                           <span class="search-input-sport-selected">
                           Tüm spor dalları
                           </span>
                           <span class="search-input-sport-downarrow"></span>
                           <select id="search-form-select">
                              <option value="0" selected="selected">Tüm spor dalları</option>
                              <option value="39">Alp Disiplini</option>
                              <option value="5">Amerikan Futbolu</option>
                              <option value="35">At yarışı</option>
                              <option value="18">Avustralya Futbolu</option>
                              <option value="21">Badminton</option>
                              <option value="10">Bandy</option>
                              <option value="3">Basketbol</option>
                              <option value="6">Beyzbol</option>
                              <option value="41">Biatlon</option>
                              <option value="34">Bisiklet</option>
                              <option value="16">Boks</option>
                              <option value="24">Çim hokeyi</option>
                              <option value="14">Dart</option>
                              <option value="36">E-sporlar</option>
                              <option value="9">Floorball</option>
                              <option value="1">Futbol</option>
                              <option value="11">Futsal</option>
                              <option value="23">Golf</option>
                              <option value="7">Hentbol</option>
                              <option value="4">Hokey</option>
                              <option value="38">Kayakla Atlama</option>
                              <option value="40">Kayaklı Koşu</option>
                              <option value="37">Kış Sporları</option>
                              <option value="13">Kriket</option>
                              <option value="25">Masa tenisi</option>
                              <option value="28">MMA</option>
                              <option value="31">Motor Sporları</option>
                              <option value="29">Netball</option>
                              <option value="30">Pesäpallo</option>
                              <option value="26">Plaj futbolu</option>
                              <option value="17">Plaj voleybolu</option>
                              <option value="8">Rugby</option>
                              <option value="19">Rugby Ligi</option>
                              <option value="15">Snooker</option>
                              <option value="22">Su topu</option>
                              <option value="2">Tenis</option>
                              <option value="12">Voleybol</option>
                           </select>
                        </span>
                        <div class="search-input-outer">
                           <div class="search-input-inner">
                              <input id="search-form-query" type="text" placeholder="Aramak istediğiniz sözcüğü yazın" autofocus="true">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <div id="search-results">Lütfen en az 3 karakter yazınız. Sonuçlar anında görüntülenecektir.</div>
            <div id="search-results-history">
               <div class="search-result-wrapper"></div>
            </div>
            <div id="search-results-project-history">
               <div class="search-result-wrapper">
                  <table>
                     <thead>
                        <tr>
                           <th>Popüler aramalar:</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <a href="http://www.canliskor.com/?r=3:MsbmracL" onclick="cjs.dic.get('SearchWindow').linkClickCB('P_0');"><span style="background-image: url(/res/image/data/rg7iqu8r-pYv0m7YC.png)" class="team-logo"></span><span>Fenerbahçe (Türkiye)</span> </a>
                              <div class="tomyteams"><span class="toggleMyTeam 1_MsbmracL" title="Takımlarıma ekle!" onclick="tt.hide(this); cjs.myTeams.toggle('1_MsbmracL', function() { cjs.dic.get('SearchWindow').showNoLoggedInMessage(); });cjs.dic.get('SearchWindow').linkClickCB('P_0'); event.stopPropagation();"></span></div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <a href="#"><span style="background-image: url(/res/image/data/YkfODYAa-OtVFVbZp.png)" class="team-logo"></span><span>Benfica (Portekiz)</span> </a>
                              <div class="tomyteams"><span class="toggleMyTeam 1_zBkyuyRI" title="Takımlarıma ekle!"></span></div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <a href="#"><span style="background-image: url(/res/image/data/O0tS7Gll-tKlvjWfC.png)" class="team-logo"></span><span>Basel (İsviçre)</span> </a>
                              <div class="tomyteams"><span class="toggleMyTeam 1_S8MBgwuo"></span></div>
                           </td>
                        </tr>
                        
                       
                       
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
     
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.min.js"></script>
     
     <script>
   $(document).ready(function() {
    $(".live-menu li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("selected");
        $(this).parent().siblings().removeClass("selected");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});


$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll-to-top').fadeIn();
        } else {
            $('#scroll-to-top').fadeOut();
        }
    });

    $('#scroll-to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });





});

$(".toggle_img").click(function(){
    $(".menu_tggle").toggle();
});

/*****pop-1 *****/
$("#signIn").click(function(){
    $(".Overpop1").fadeIn();
});

$("#lsid-window-close").click(function(){
    $(".Overpop1").fadeOut();
});

/*****pop-2 *****/
$("#registration").click(function(){
    $(".Overpop2").fadeIn();
});

$(".clsepp2").click(function(){
    $(".Overpop2").fadeOut();
});

/*****pop-3 *****/
$(".control-panel-icon-setting").click(function(){
    $(".Overpop3").fadeIn();
});

$(".clsepp3").click(function(){
    $(".Overpop3").fadeOut();
});

/*****pop-4 *****/
$(".control-panel-icon-search").click(function(){
    $(".Overpop4").fadeIn();
});

$(".clsepp4").click(function(){
    $(".Overpop4").fadeOut();
});

</script>  


<script> 
function mygames(id) {
   var arra = id.split('_');
   var atr = arra[0];
   var pid = arra[1];
   var atrparent = ".parent_"+pid; 
   var atrchild = ".child_"+pid;  
   var status = this.checked; // "select all" checked status

   if(atr == "parent"){
            if($(atrparent). prop("checked")  == true){ 
               $(atrchild).each(function(){ 
               this.checked = true;
               });
            }
            if($(atrparent). prop("checked")  == false){ 
               $(atrchild).each(function(){ 
               this.checked = false;
               });
            }
   }
   
   if(atr == "child"){ 
            if($(atrchild). prop("checked")  == true){ 
               $(atrparent)[0].checked = true;   
               $("#parent_"+pid).clone().appendTo( ".mygamesTab" );
            }
            if($(atrchild). prop("checked")  == false){ 
               $(atrparent)[0].checked = false;    

            }      
   }
    
}
</script>	
	  
   </body>
</html>

