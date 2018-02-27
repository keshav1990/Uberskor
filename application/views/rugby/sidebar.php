
<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-1">
 <span class="side_mobile_bx">Takimlarim</span>
   <ul class="menu country-list my-teams">
      <li class="head"><span class="toggleMyLeague"></span>Takimlarim </li>
      <ul id="my-teams-list" class="menu">
         <li class="last myTeamInfo">  
		 <?php 
			$value = "Takimlarinizi seçmek için takim isimlerinin yaninda blunan simgeyi tiklayiniz.";
			echo $value;
		?> 
		</li>
      </ul>
   </ul>
</div>
<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-2">
<span class="side_mobile_bx">Ülkeler</span>
   <ul class="menu country-list">
   <li class="head side_br_ulk">Ülkeler</li>
   <?php $i=0;$total = count($country);
   foreach($country as $c) :
   if($i < $total && $i < 10){	?>
      <li>
		<a class="a_sub_tg" href="javascript:void(0)">

		<?=$c->name?>
		<?php  if(!empty($c->leagues)) { ?>
			<img src="<?=base_url('uploads/drp-arrow.png')?>" alt="" />
		<?php } ?>
		</a>
         <ul class="submenu hidden">
		 <?php if(!empty($c->leagues)){ foreach($c->leagues as $league1) :?>
            <li><a title="<?php echo ucwords($c->name).': '.ucwords($league1->name) ?>" href="<?php echo base_url().$game.'/'.url_title($c->name,"dash",true).'/'.url_title($league1->name,"dash",true)?>">
			<?=$league1->name?></a></li>
		 <?php endforeach; }  ?>
         </ul>
      </li>
	  <?php } $i++; endforeach; ?>
   </ul>
</div>

<div class="spacer10"></div>

<img style="width:140px; height:93px;" src="<?php echo base_url().'uploads/banners/'.$banners[5]->image;?>" alt="Uberskor.com" >
<!-- - -//iframe css- - -->
<div class="mbox0px l-brd flag_side last-none">
   <ul class="menu country-list">
	   <?php $i=0;foreach($country as $c2) :$c = $c2;
	   if($i > 10){	?>
	   <li>
		<a class="a_sub_tg" href="javascript:void(0)">

		<?=$c->name?>
		<?php  if(!empty($c->leagues)) { ?>
		 <img src="<?=base_url('uploads/drp-arrow.png')?>" alt="" />
		<?php } ?>
		</a>
	   <ul class="submenu hidden">
	   <?php if(!empty($c->leagues)){ foreach($c->leagues as $league2) :?>
	   <li><a title="<?php echo ucwords($c->name).': '.ucwords($league2->name) ?>" href="<?php echo base_url().$game.'/'.url_title($c->name,"dash",true).'/'.url_title($league2->name,"dash",true)?>">
			<?=$league2->name?></a></li>
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
<?php $this->load->view("common/partners");?>

</div>