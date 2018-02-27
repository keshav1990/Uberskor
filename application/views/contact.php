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

<?php $this->load->view("common/header"); ?><style>	 #def-form-table td input, textarea { padding: 4px 4px; margin-bottom: 8px;border-radius: 2px; }	 #def-form-table td textarea {resize: none; }	 #def-form-table td select  { width:159px;padding: 4px 4px;margin-bottom: 8px;border-radius: 2px;}
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
               <?php $this->load->view("common/topmenu"); ?>
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
                  <div id="mc" class="sport_page">
					<div class="page-content-line">
      <h2><font><font>
         Contact
         </font></font>
      </h2>
      <p><font><font>
         If you have an opinion about the services offered by CanliSkor.com, please send us an e-mail message using the form below. </font>
         </font></font>
      </p>
   </div>
   <div id="ContactFormDiv">
      <form action="<?php echo base_url('contact/getContact') ?>" name="contact" id="Contact" method="post">
         
         
            <ul class="listng_contfrm">
				   <li>
				   <label> Your Name</label>
				  <input type="text" name="txt_name" id="Name" value="" maxlength="50" class="text-field">
				  </li>
				  
				   <li>
				   <label> Last Name</label>
				  <input type="text" name="txt_lname" id="Name" value="" maxlength="50" class="text-field">
				  </li>
				  
				   <li>
				   <label> E-mail</label>
				   <input type="text" name="txt_email" id="Email" value="" maxlength="255" class="text-field">
                   </li>
                   
				   <li>
				     <label>Topic:</label>
                     <select name="txt_topic" required id="Type" onchange="contact_form_type_change(this.value)">
                        <option value="">(Select one)</option>
                        <option>General inquiry</option>
                        <option>Error in live score data</option>
                        <option>Registration problem</option>
                        <option>IPhone app</option>
                        <option>Android app</option>
                        <option>Mobile version</option>
                        <option>Link change request</option>
                        <option>Data sales</option>
                     </select>
                  </li>
				  
				  
                 <li>
                  <label>Text:</label>
                 
                  <textarea name="txt_message" id="Text" rows="10" cols="40"></textarea>
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



	  
   </body>
</html>

