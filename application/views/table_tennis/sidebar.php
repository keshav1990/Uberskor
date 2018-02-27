<div class="spacer10"></div>


<div class="spacer10"></div>
<div class="mbox0px l-brd">
<span class="side_mobile_bx">Mevcut turnuvala</span>
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

</div>