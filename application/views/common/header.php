<?php
	header('Content-Type: text/html; charset=utf-8');
	$ci = & get_instance();
    $ci->load->model("Common_model");
    $link = $ci->Common_model->get_all_orderby('external_link','id ASC');
	//$font = $ci->Common_model->get_all_orderby("font_size","id ASC");
	$font = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">

   <head>

	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

      <meta name="description" content="">

      <meta name="author" content="">

	   <meta name="keywords" content="">

      <title>Uberskor |
	  <?php
		if($this->uri->segment('1')==''){
			echo ucwords("Futbol");
		}else{
			echo ucwords(str_replace("-"," ",$this->uri->segment('1')));
		}
	  ?>
	  </title>
       <link rel="icon" href="<?=base_url('assets/images/fv_icn.png')?>" type="image/x-icon">


      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/custom.css" media="screen">

	  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/top_nav.css" media="screen">
	  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>countries.css" media="screen">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/table-dg.css" media="screen">
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.min.js"></script>


<style>

.email_error,.error{

   color:#f00!important;

   font-size: 12px!important;

   text-align: left!important;

}

#lsid-content .user .icon {

background-image: url(<?php echo base_url().'assets/images/icon-user.png'; ?>) !important;

}

	/* for body font size*/

	body{font-size: <?=$font[0]->body_size?>px!important;}

      /*for sidebar font size */

      div #lc a,#lc li{font-size: <?=$font[0]->sidebar_size?>px!important;}
	  div #lc a,#lc li{font-size:16px! important;}

      /*for mid Body font size */

      #fsbody{font-size: <?=$font[0]->midbody_size?>px!important;}

      /*for Subfooter font size*/

      #e-conten{font-size: <?=$font[0]->footer_size?>px!important;}

      /*for menu's font size*/
	  Body #menu ul a  {font-size: 17px !important;}
      #menu ul a{font-size: <?=$font[0]->menu_size?>px!important;}



.odd{background:#f0f0f0;}
 .display_none{display:none;}
 .display_tbl_row{display:table-row;}
 .flg_bx  a {padding-left: 3px !important;padding-right: 10px !important;line-height: 0px;display: inline-block;vertical-align: middle; }
.flg_bx img {width: 24px;     display: inline-block;
    vertical-align: middle;}

</style>



   </head>
<?php
/* this is used to make color combination according to the games  */
$mainClass = (empty($this->uri->segment('1'))?'futball':"futball");
?>
   <body class="v3 <?=$mainClass?> " >
<?php if($this->uri->segment("2")!='iframe' && $this->uri->segment("2")!='takim'){ ?>
      <div id="control-panel-bg">
	 
 <!----Login for mobile--->
	  <span class="base_userimg">
	  <img src="<?php echo base_url().'assets/images/user.png'; ?>" alt="">
	  </span>
	   <!----/Login for mobile--->
	<div id="control-panel">

		<div id="control-panel-content">

             

			<div class="control_pnel" id="control-panel-left">
               <ul class="cntrl_main">
			     <li class="tr">
				<span class="control-panel-icon-2 flg_bx">
					<!---img src="<?=base_url('assets/tr.png')?>" alt="Turkish" ---->
					<a href="<?=base_url()?>">TR</a><span class="lang_icn_png"><img style="width: 11px;" src="<?=base_url('assets/img/lang_icn.png')?>" alt=""></span>
				</span></li>
                 <li class="en" style="display:none;">
				<span class="control-panel-icon-2 flg_bx">
					<!---img src="<?=base_url('assets/en.png')?>" alt="Turkish" /---->
					<a href="<?=base_url("en")?>"  class="" >EN</a>
				</span></li>
				</ul>
			</div>
			<div class="reglogin_tab" id="login_header"></div>

			<div id="control-panel-right">
				<div id="lsid-box">

					<span id="lsid">
						<div id="lsid-content">
						<div class="buttons"> 

							<?php //foreach ($link as $link) : ?>
							<!---div class="lsid-rounded-box" style="background:<?//=$link->bgcolor?>!important;border:0px!important;height:23px;line-height:23px;margin-top:6px;">

								<a href="<?//=$link->url?>" alt="<?//=ucwords($link->tr_alt)?>" title="<?//=ucwords($link->tr_title)?>" target="_alt" style="color:<?//=$link->text_color?>!important;font-size:13px;">

								<?//=ucwords(htmlspecialchars($link->tr_name))?>

								</a>

							</div--->

						<?php //endforeach; ?>

						<?php //if($this->session->userdata('logged_in') != 1){ ?>

							<!--<div id="signIn" class="lsid-rounded-box black">Giriş</div>

							<div id="registration" class="lsid-rounded-box">KAYIT</div> -->

						<?php //} ?>

						</div> 



							<?php //if($this->session->userdata('logged_in') == 1){ ?>

							<!----div class="user lsid-rounded-box black">

								<span class="icon" style="margin-top:1px;">



								</span>

								<span class="email" style="line-height:16px;"><?php //echo ucwords($this->session->userdata('name')); ?></span>

								<span class="buttons">

								<span class="wrapper">

									<img src="<?php //echo base_url().'assets/images/lock.png'; ?>" class=" img-responsive" alt="" title="Şifre değiştir">

								</span>

								<span class="wrapper">

									<a href="<?php //echo base_url('logout'); ?>">

										<img src="<?php //echo base_url().'assets/images/icon-logout-gray.png'; ?>" class=" img-responsive" title="Çıkış">

									</a>

								</span>

								</span>

							</div--->

							<?php //} ?>

						</div>

					</span>


<!--
					<span class="control-panel-icon">

						<a href="#" class="control-panel-icon-setting" title="Ayarlar" ></a>

					</span>
-->


					<!---span class="control-panel-icon control-panel-icon-last" title="Arama">

						<a href="#" class="control-panel-icon-search"></a>

					</span--->

				</div>



			</div>

		</div>

	</div>

</div>
<?php }


 ?>



      <div class="container">





         <!---div class="adsenvelope adstextvpad banx-top" id="lsadvert-zid-75" style="width: 970px;">

            <div style="height: 90px;">

               <div class="adscontent" id="lsadvert-top"><iframe id="lsadvert-zid-75-iframe" name="banx-top" frameborder="0" scrolling="no" style="width: 970px; height: 90px;" src="./index_files/saved_resource.html"></iframe></div>

               <div class="adsgraphvert">

                  <div class="adsgvert atv-tr"></div>

               </div>

            </div>

         </div -->



