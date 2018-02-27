<div class="spacer10"></div>

<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-1">
<span class="side_mobile_bx">Tour Type</span>
   <ul class="menu country-list mob_lst-cnt"> 
   <li class="head"><span class="toggleMyLeague"></span> Tour Type</li>
   <?php
   foreach($tour as $t) :
   ?>
      <li>
         <a class="a_sub_tg" href="<?php echo base_url().$game.'/tour/'.url_title($t->value,"dash",true)?>"><?=$t->value?></a>
      </li>	
	  <?php endforeach; ?>
   </ul>
</div>
<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-2">
<span class="side_mobile_bx">Mevcut turnuvalar</span>
   <ul class="menu country-list"> 
   <li class="head">Mevcut turnuvalar</li>
   <?php
   foreach($cur_tournament as $ct) :
   ?>
      <li>
         <a class="a_sub_tg" href="<?php echo base_url().$game.'/'.url_title($ct->country_name,"dash",true).'/'.url_title($ct->name,"dash",true)?>"><?=$ct->name?></a>
      </li>	
	  <?php endforeach; ?>
   </ul>
</div>

<div class="spacer10"></div>

<img style="width:140px; height:93px;" src="<?php echo base_url().'uploads/banners/'.$banners[5]->image;?>" alt="Uberskor.com" >

<div class="spacer10"></div>


<div class="spacer10"></div>
<?php $this->load->view("common/partners");?>

<div class="spacer10" style="height: 109px;display: inline-block !important;"></div>

<!----======Language option for mobile========---->		
<div  style="display:none;" class="control_pnel" id="language_on">  
<span class="Language-toggle"><img src="<?=base_url('assets/images/mob-Lang.png')?>" alt="">  Language Preferences</span>
               <ul class="cntrl_main_mob">
			     <li><span class="flg_bx">
					<a href="<?=base_url()?>"> <img src="<?=base_url('assets/images/mob-TR.png')?>" alt="">Turkish</a>
				</span></li>
                 <li><span class="flg_bx">
					<a href="<?=base_url("en")?>"  class="" ><img src="<?=base_url('assets/images/mob-en.png')?>" alt=""> English</a>
				</span></li>
				</ul>
			</div>
			<!----=======/Language option for mobile=========---->

</div>