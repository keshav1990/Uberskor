<div class="spacer10"></div>
<div class="mbox0px l-brd">
<span class="side_mobile_bx">Mevcut yarislar</span>
   <ul class="menu country-list my-leagues"> 
   <li class="head">Mevcut yarislar</li>
   <?php
   foreach($cur_races as $cr) :
   ?>
      <li><span class=" flag flag-<?=strtolower($cr->flag)?>"></span>
         <a class="a_sub_tg" href="<?php echo base_url().$game.'/'.url_title($cr->country_name,"dash",true).'/'.url_title($cr->name,"dash",true)?>"><?=$cr->name?></a>
      </li>	
	  <?php endforeach; ?>
   </ul>
</div>
<!--<div class="spacer10"></div>
<div class="mbox0px l-brd">
   <ul class="menu country-list my-leagues"> 
   <li class="head">Otomobil yarislari</li>
   <?php
   foreach($tournament_template as $tt) :
   ?>
      <li>
         <a class="a_sub_tg" href="<?php echo base_url().$game.'/tournament/'.url_title($tt->name,"dash",true)?>"><?=$tt->name?></a>
      </li>	
	  <?php endforeach; ?>
   </ul>
</div>
-->

<div class="spacer10"></div>

<img style="width:140px; height:93px;" src="<?php echo base_url().'uploads/banners/'.$banners[5]->image;?>" alt="Uberskor.com" >

<div class="spacer10"></div>
<?php $this->load->view("common/partners");?>
</div>