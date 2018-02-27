
<?php 
	$menuAry = array('at-yarisi','beyzbol','otomobil-yarisi','e-sport','snooker','snowboard','masa-tenisi','boks','kriket','rugby-ligi');
?>                    
                  <div class="over_lay">
                  <ul class="menu_tggle">
                     <li class="soccer <?php  echo  ($this->uri->Segment('1') == 'futbol' || $this->uri->Segment('1') == '' )?'active':''; ?>"><a href="<?php echo base_url();?>"> <div class="inner_contnt"><span class="sport-icon soccer"></span></div> <b>Futbol</b></a></li>
                     <!--li class="hockey <?php  echo  (str_replace('-',' ',$this->uri->Segment('1')) == 'buz hokeyi')?'active':''; ?>" ><a href="<?php echo base_url().strtolower(str_replace(' ','-','Buz hokeyi'));?>"><div class="inner_contnt"><span class="sport-icon hockey"></span></div> <b>Buz Hokeyi</b></a></li-->
                     <li class="basketball <?php  echo  ($this->uri->Segment('1') == 'basketball')?'active':''; ?>"><a href="<?php echo base_url('basketball/');?>" ><div class="inner_contnt"><span class="sport-icon basketball"></span></div><b> Basketbol</b></a></li>
					 <li class="tennis <?php  echo  ($this->uri->Segment('1') == 'tenis')?'active':''; ?>"><a href="<?php echo base_url('tenis/');?>" ><div class="inner_contnt"><span class="sport-icon tennis"></span></div> <b>Tenis</b></a></li>
                     <li class="volleyball <?php  echo  ($this->uri->Segment('1') == 'voleybol')?'active':''; ?>"><a href="<?php echo base_url('voleybol/');?>"><div class="inner_contnt"><span class="sport-icon volleyball"></span></div> <b>Voleybol</b></a></li>
					 
					   <li class=" <?php  echo  ($this->uri->Segment('1') == 'beyzbol')?'active':''; ?>" ><a href="<?php echo base_url('beyzbol/');?>">
						    <div class="inner_contnt"><span class="sport-icon baseball"></span></div>
						  <b>Beyzbol</b> </a></li>
					 
					 <!--li class="handball <?php  echo  ($this->uri->Segment('1') == 'hentbol')?'active':''; ?>"><a href="<?php echo base_url('hentbol/');?>"><div class="inner_contnt"><span class="sport-icon handball"></span></div> <b>Hentbol</b></a></li--->
					 
                  <?php if(2==1){ ?>
                    <!--li class="rugby-union <?php  echo  ($this->uri->Segment('1') == 'ragbi')?'active':''; ?>" ><a href="<?php echo base_url('ragbi/');?>"><div class="inner_contnt"><span class="sport-icon rugby-union"></span></div> <b>Ragbi</b></a></li>
					 
                     
                     
                     <li class=" minority last before-search <?php if(in_array($this->uri->Segment('1'),$menuAry)){echo 'active';}?>">
                        <span class="corner-left"></span>
						<span class="content"><a class="other" href="#" ><span class="sport-icon minority"></span>Diğer<span class="arrow"></span></a></span><span class="corner-right"></span>
                        <ul id="menumin" data-simplebar>
						
						  <li  class="rugby-union <?php  echo  ($this->uri->Segment('1') == 'bisiklet')?'active':''; ?>" ><a href="<?php echo base_url('bisiklet/');?>"><div class="inner_contnt"><span class="sport-icon cycling s34"></span></div> <b>Bisiklet</b></a></li>
                     
                     <li class="golf <?php  echo  ($this->uri->Segment('1') == 'golf')?'active':''; ?>"><a href="<?php echo base_url('golf');?>"><div class="inner_contnt"><span class="sport-icon golf s23" title="Today's matches: 6"></span></div> <b>Golf</b></a></li>
						
                           <li class="horse-racing <?php  echo  ($this->uri->Segment('1') == 'at-yarisi')?'active':''; ?>" ><a href="<?php echo base_url('at-yarisi/');?>">
						   <div class="inner_contnt"><span class="sport-icon horse-racing s35"></span></div>
						   <b>At yarışı</b> </a></li>
							
                         
						   
                           <li class="motorsport <?php  echo  ($this->uri->Segment('1') == 'otomobil-yarisi')?'active':''; ?>" ><a href="<?php echo base_url('otomobil-yarisi/');?>">  <div class="inner_contnt"><span class="sport-icon motorsport s31 rt"></span></div><b>Otomobil Yarışı</b></a></li>
						  
						   <li class="esports <?php  echo  ($this->uri->Segment('1') == 'e-sport')?'active':''; ?>"><a href="<?php echo base_url('e-sport/');?>">
						    <div class="inner_contnt"><span class="sport-icon esports s36"></span></div>
						   <b>E-sporlar</b></span></a></li>
						   
                           <li class="snooker <?php  echo  ($this->uri->Segment('1') == 'snooker')?'active':''; ?>"><a href="<?php echo base_url('snooker/');?>">
						    <div class="inner_contnt"><span class="sport-icon snooker s15 rt"></span></div><b>Snooker</b> </a></li>
						   
                           <li class="mma <?php  echo  ($this->uri->Segment('1') == 'snowboard')?'active':''; ?>"><a href="<?php echo base_url('snowboard/');?>">
						    <div class="inner_contnt"><span class="sport-icon mma s28 rt"></span></div><b>Snowboard</b></a></li>
						   
                           <li class="table-tennis <?php  echo  ($this->uri->Segment('1') == 'masa-tenisi')?'active':''; ?>" ><a href="<?php echo base_url('masa-tenisi/');?>"> <div class="inner_contnt"><span class="sport-icon table-tennis s25 rt"></span></div><b>Masa Tenisi</b></a></li>
                           
						   <li class="boxing <?php  echo  ($this->uri->Segment('1') == 'boks')?'active':''; ?>"><a href="<?php echo base_url('boks/');?>"> <div class="inner_contnt"><span class="sport-icon boxing s16"></span></div> <b>Boks</b></a></li>
						    
							<li class="cricket <?php  echo  ($this->uri->Segment('1') == 'kriket')?'active':''; ?>"><a href="<?php echo base_url('kriket/');?>"> <div class="inner_contnt"><span class="sport-icon cricket s13 last" title="Today's matches: 12"></span></div><b>Kriket</b></a></li>
						   
						   <li class="rugby-league <?php  echo  ($this->uri->Segment('1') == 'rugby-ligi')?'active':''; ?>"><a href="<?php echo base_url('rugby-ligi/');?>"> <div class="inner_contnt"> <span class="sport-icon rugby-league s19 rt"></span></div><b>Rugby Ligi</b></a></li>
						    
							
						   
						   
                          
                        </ul>
                     </li-->
                     <?php } ?>
                  </ul>
				  </div>
				  
