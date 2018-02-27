<?php
	$this->load->view("common/header"); 		
?>

         <div class="content">
            <div id="main">
               <div id="tc">
			   
                 <div id="mc" class="sport_page">
 
				   <h2 class="tournament">
				   <span class="flag flag-<?=strtolower($detail[0]->flag)?>"></span>
				    <?=$detail[0]->country?>  &raquo; <?=$detail[0]->name?> 
				   </h2>
				   
				   
				   <div class="team-header">
					<div class="team-logo" ></div>
					
					<div class="team-name"><?=$detail[0]->name?></div>
				   </div>
				  
                  
                     <div id="fsbody" class="flashscore">
                        <div id="fsi"></div>
                        <div id="fscon">
						<?php
							//$pathUrl = base_url().$game.'/'.$this->uri->segment('2').'/'.$this->uri->segment('3').'/'.$this->uri->segment('4');
						?>
							<ul class="ifmenu live-menu">
								<?php if(!empty($players)){ ?>
								<li class="selected" ><a href="javascript:void(0)"  ><?php echo mb_convert_encoding("Kadro", "UTF-8");?></a></li>
								<?php } ?>
							</ul>
						   
						   <!-----Tab Content-2---->
						   <?php if(!empty($players)){?>
						    <div id="tab-2"  style="display:block;"  class="fs-table tab-content">
							
								<div class="table_takim">
									  <table class="soccer od_table_mx">
									  <thead class="no-border-bottom">
										   <tr class="league l_1_ljIBgFCg primary-top">
											  <td colspan="1" class="head_aa "></td>
											  <td colspan="6" class="head_ab ">
											  <span class="country left">
											  <span class="flag flag-<?=strtolower($detail[0]->flag)?>" title=""></span>
											  <span class="name"><span class="country_part"><?=$detail[0]->country?>: </span>
											  <span class="tournament_part"><?=$detail[0]->name?></span></span></span>
											 </td>
										   </tr>
									  </thead>
									  
										<tbody>
										<tr class=" darkbg">
											  <td colspan="3" class="cell_ad time ">Oyuncu</td>
											  <td colspan="" class="cell_ad time ">
											  D.O.B
											 </td>
											 <td colspan="" class="cell_ad time ">
											 Yükseklik
											 </td>
											 <td colspan="" class="cell_ad time ">
											  Agirlik
											 </td>
											 <td colspan="" class="cell_ad time ">
											  Aktif
											 </td>
										  </tr>
										<?php $i = 0;foreach ($players as $p){ $class = ($i%2 ==0 )? "even":"odd" ;?>
										<tr id="" class="<?=$class?> stage-finished cursor " >
										   <td colspan="3" class="cell_ad time" style="text-align:left;padding-left:5%;" ><span class="flag flag-<?=strtolower($p->flag)?>"></span><?=$p->name?></td>
										   <td colspan="" class="cell_ad time" ><?=$p->gen[0]->date_of_birth?></td>
										   <td colspan="" class="cell_ad time" ><?=$p->gen[0]->height?>cm</td>
										   <td colspan="" class="cell_ad time" ><?=$p->gen[0]->weight?>Kg</td>
										   <td colspan="" class="cell_ad time" >Evet</td>
										</tr>
										  <?php $i++; } ?>
										</tbody>  
									  </table>
            					</div>
							</div>
						   <?php } ?>
							

							 

                        </div>
                
                     </div>
					 
                  </div>
				

                
  
                  <div id="lc">         
             
                     
                  <div class="iedivfix"></div>
               </div>



<script> 
$(".show-more").click(function(){
    $(".hidden-templates2").addClass("intro");
   $(".arww_img").addClass("intro_bk");
});
</script>   


     
   </body>
</html>

