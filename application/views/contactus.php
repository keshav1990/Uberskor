<?php
// echo "<pre>";
$top_banner = $banners[0]->image;
$mid_banner = $banners[1]->image;
$right_banner = $banners[2]->image;
$leftside_banner = $banners[3]->image;
$logo = $banners[4]->image;
$setColor = json_decode(json_encode($clrschemes[0]),true);
	$body_clr =$setColor["body_color"];
   $inner_body_color = $setColor["inner_body_color"];
   $innerbody_font_color = $setColor["innerbody_font_color"];

   $footer_color = $setColor["footer_color"];
   $footer_font_color = $setColor["footer_font_color"];

   $tbl_head_color = $setColor["table_head_color"];
   $tbl_row_color = $setColor["table_row_color"];
   $tbl_font_color = $setColor["table_font_color"];

   $sidebar_font_color = $setColor["sidebar_font_color"];
   $sidebar_color = $setColor["sidebar_color"];

   $subfooter_color = $setColor["subfooter_color"];
   $subfooter_font_color = $setColor["subfooter_font_color"];

   $tophead_color = $setColor["tophead_color"];

   $sidebar_bottomlist_color = $setColor["sidebar_bottomlist_color"];
   $sidebar_bottomlist_font_color = $setColor["sidebar_bottomlist_font_color"];

   $last_list_color = $setColor["last_list_color"];
   $last_list_font_color = $setColor["last_list_font_color"];

?>

<?php $this->load->view("common/header"); ?><style>
   .soccer #header > .content {
    background-image: url(<?php echo base_url().'uploads/banners/'.$top_banner; ?>) !important; 
    background-repeat: no-repeat;

}

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
         <div class="adsclear"></div>
         <div id="header">
            <div class="top">
               <h1>
            <?php 
            $ci = & get_instance();
            $ci->load->model("Common_model");
            $subheader = $ci->Common_model->get_all_orderby('sub_header_content','id ASC');
            echo $subheader[0]->sub_header_content;
            ?>
            </h1>
            </div>
            <div class="content">
               <a href="<?php echo base_url();?>" id="logo"><img src="<?php echo base_url().'uploads/banners/'.$logo?>" alt="Uberskor.com" style="width:210px;height:37px;"></a>
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
					<img src="<?php echo base_url().'uploads/banners/'.$right_banner;?>" alt="Right Banner" style="width:161px; height:500px;" >
                    
                    
                  </div>
               </div>
               <div id="tc">
                  <div id="mc" class="mc-extended">
   <div class="page-content-line">
      <h2><font><font>
         Contact
         </font></font>
      </h2>
      <p><font><font>
         If you have an opinion about the services offered by CanliSkor.com, please send us an e-mail message using the form below. </font><font>Please use our </font></font><a href="/reklam/"><font><font>ad</font></font></a><font><font> page </font><font>for your </font><a href="/reklam/"><font>ad</font></a><font> questions.
         </font></font>
      </p>
   </div>
   <div id="ContactFormDiv">
      <form action="#" name="contact" id="Contact" method="post" >
         
         
                   <ul class="listng_contfrm">
				   <li>
				   <label> Your Name</label>
				  <input type="text" name="form[name]" id="Name" value="" maxlength="50" class="text-field" required>
				  </li>
				  
				   <li>
				   <label> Last Name</label>
				  <input type="text" name="form[name]" id="Name" value="" maxlength="50" class="text-field" required>
				  </li>
				  
				   <li>
				   <label> E-mail</label>
				   <input type="text" name="form[email]" id="Email" value="" maxlength="255" class="text-field" required>
                   </li>
                   
				   <li>
				  <label>Topic:</label>
                     <select name="form[type]" id="Type" required>
                        <option value="">(Select one)</option>
                        <option value="general_enquiries">General inquiry</option>
                        <option value="error_in_data">Error in live score data</option>
                        <option value="registration_issue">Registration problem</option>
                        <option value="iphone_application">IPhone app</option>
                        <option value="android_application">Android app</option>
                        <option value="mobile_version">Mobile version</option>
                        <option value="link_exchange">Link change request</option>
                        <option value="data_sales">Data sales</option>
                     </select>
                  </li>
				  
				  
                 <li>
                  <label>Text:</label>
                 
                  <textarea name="form[text]" id="Text" rows="10" cols="40"></textarea>
				  </li>
                 
                 </ul>				 
              
			   <div class="field_submit">
                  <input type="submit"  id="Submit" value="Send message" class="submit">
               </div>
           
        
      </form>
   </div>


</div>
			   
				 

                
  
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
                                <img src="<?php echo base_url().'uploads/banners/'.$leftside_banner;?>" alt="Left Banner" style="width:143px;height:214px;" >
                              </li>
                       
                        <!--- - -Irame BOx- - - - - -->
             
                       
                           </ul>
                        </ul>
                       
                     </div>              
    <?php $this->load->view("common/sidebar"); ?>            
                     
                  <div class="iedivfix"></div>
               </div>


<?php $this->load->view("common/footer"); ?>

<script> 
// function for detais pop
function detailPopup(id){
   var link = "<?php echo base_url().'home/matchDetail';?>" ;
   var url = link+'?eventId='+id;
   
   // console.log(url);
   window.open(url,'_blank',width=400,height=200);
}

function mygames(id) {

   var newid = id.split(',');   
   var ParentId = newid[1];
   var arra = newid[0].split('_');
   var atr = arra[0];
   var pid = arra[1];
   var atrparent = "#parent_"+pid; 
   var atrP_child = ".parent_"+pid;  
   var atrchild = ".child_"+pid;
   if(atr == "parent"){
      if($(atrparent). prop("checked")  == true){               
         $(atrP_child).each(function(){ 
         this.checked = true;
         });
      }
      if($(atrparent). prop("checked")  == false){ 
         $(atrP_child).each(function(){ 
         this.checked = false;
         });
      }
   }
   if(atr == "child"){ 
      if($(atrchild).prop("checked")  == true){ 
         $("#parent_"+ParentId)[0].checked = true;   
      }
      if($(atrchild). prop("checked")  == false){ 
         if ($(atrP_child+":checked").length > 0) {}
         else{
            $("#parent_"+ParentId)[0].checked = false;       
         }
      }      
   }
}


// if(localStorage.getItem('mygamesList')) {
//    $('.mygamesTab').html(localStorage.getItem('mygamesList'));
// alert("Item Found In localStorage");
// }
// else{
//    alert("Not In localStorage");
// }

$('#clear').click( function() {
window.localStorage.clear();
location.reload();
return false;
});
</script>	


	  
   </body>
</html>

