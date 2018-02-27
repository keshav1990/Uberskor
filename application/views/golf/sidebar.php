<div class="spacer10"></div>
<div class="mbox0px l-brd last-none">
  <span class="side_mobile_bx">Takımlarım</span>
   <ul class="menu country-list my-teams">
      <li class="head"><span class="toggleMyTeam"></span>Takımlarım </li>
      <ul id="my-teams-list" class="menu">
         <li class="last myTeamInfo">Takımlarınızı seçmek için takım isimlerinin yanında bulunan <span class="toggleMyTeam"></span> simgesine tıklayınız.</li>
      </ul>
   </ul>
</div>
<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-2">
  <span class="side_mobile_bx">Mevcut turnuvalar</span>
   <ul class="menu country-list  mob_lst-cnt"> 
   <li class="head">Mevcut turnuvalar</li>
   <?php
   foreach($cur_tournament as $ct) :
   ?>
      <li>
         <a class="a_sub_tg" href="<?php echo base_url().$game.'/'.url_title($ct->country,"dash",true).'/'.url_title($ct->name,"dash",true)?>"><?=$ct->name?></a>
      </li>	
	  <?php endforeach; ?>
   </ul>
</div>

 
<div class="spacer10"></div>

<img style="width:140px; height:93px;" src="<?php echo base_url().'uploads/banners/'.$banners[5]->image;?>" alt="Uberskor.com" >
<!-- - -//iframe css- - -->
<div class="mbox0px l-brd mobile-bx-2"> 
   <ul class="menu country-list">
	   <?php $i=0;foreach($country as $c2) :$c = $c2;
	   if($i > 10){	?>  
	   <li>  
	   <a class="a_sub_tg" href="#"><?=$c->name?> <img src="<?=base_url('uploads/drp-arrow.png')?>" alt="" /> </a>  
	   <ul class="submenu hidden">	
	   <?php foreach($c->leagues as $league2) :?>  
	   <li><a href="<?php echo base_url().$game.'/'.url_title($c->name,"dash",true)."/".url_title($league2->name,"dash",true)?>"><?=$league2->name?></a></li>	<?php endforeach; ?> 
	   </ul> 
	   </li>	
	   <?php } $i++; endforeach; ?>  
   </ul>
</div>

<div class="spacer10"></div>
<?php $this->load->view("common/partners");?>

</div>