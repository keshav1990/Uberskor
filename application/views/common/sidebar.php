<div class="spacer10"></div>
<div class="mbox0px l-brd">
   <ul class="menu country-list my-teams">
      <li class="head"><span class="toggleMyLeague"></span>Takımlarım <span class="count">(0)</span></li>
      <ul id="my-teams-list" class="menu">
         <li class="last myTeamInfo">Takımlarınızı seçmek için takım isimlerinin yanında bulunan simgeyi tıklayınız.</li>
      </ul>
   </ul>
</div>
<div class="spacer10"></div>
<div class="mbox0px l-brd">
   <ul class="menu country-list"> 
   <li class="head side_br_ulk">Ülkeler</li>
   <?php $i=0;$total = count($country);
   foreach($country as $c) :	
   if($i < $total && $i < 10){	?>
      <li>
	 
		<a class="a_sub_tg" href="javascript:void(0)"><?=$c->name?> 	   
		<?php  if(!empty($c->leagues)) { ?> 
	
		<?php } ?>
		</a>
         <ul class="submenu hidden">
		 <?php if(!empty($c->leagues)){ foreach($c->leagues as $league1) :?>
            <li><a href="<?php echo base_url().$game.'/'.str_replace(" ","-",strtolower($c->name))."/".str_replace(" ","-",strtolower($league1->name))?>">
			<?=$league1->name?></a></li>
		 <?php endforeach; }  ?>
         </ul>
      </li>	
	  <?php } $i++; endforeach; ?>
   </ul>
</div>

<div class="spacer10"></div>

<!--img style="width:140px; height:93px;" src="<?php echo base_url().'uploads/banners/'.$banners[5]->image;?>" alt="Uberskor.com" ---->
<!-- - -//iframe css- - -->
<div class="mbox0px l-brd">
   <ul class="menu country-list">
	   <?php $i=0;foreach($country as $c2) :$c = $c2;
	   if($i > 10){	?>  
	   <li>
		<a class="a_sub_tg" href="javascript:void(0)"><?=$c->name?> 	   
		<?php  if(!empty($c->leagues)) { ?> 
		
		<?php } ?>
		</a>
	   <ul class="submenu hidden">	
	   <?php if(!empty($c->leagues)){ foreach($c->leagues as $league2) :?>  
	   <li><a href="<?php echo base_url().$game.'/'.str_replace(" ","-",strtolower($c->name))."/".str_replace(" ","-",strtolower($league2->name))?>"><?=$league2->name?></a></li>
	   <?php endforeach; } ?> 
	   </ul> 
	   </li>	
	   <?php } $i++; endforeach; ?>  
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

<div class="spacer10"></div>
<div class="mbox">
   <ul class="menu partner">
      <li class="head">Partnerler</li>
      <li><a href="javascript:void(0)"><span class="elink">Soccer stats</span></a></li>
      <li><a href="javascript:void(0)"><span class="elink">Livescore.in</span></a></li>
      <li class="rd"><a href="#">Tavsiye edilen siteler</a></li>
   </ul>
</div>
</div>