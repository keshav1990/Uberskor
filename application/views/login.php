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



<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
	   <meta name="keywords" content="">
      <title>Uberskor | Home</title>
      
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   

   </head>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>Uberskor | Home</title>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/');?>css/style.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
    .showerrorbox{
	background: #f00;
	padding:7px;
	margin:10px;
    }
        .email_error,
        .error {
            color: #f00!important;
            font-size: 12px!important;
            text-align: left!important;
        }
        #lsid-content .user .icon {
            background-image: url(<?php echo base_url().'assets/images/icon-user.png';
            ?>) !important;
        }
   

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

</head>

<body class="soccer v3">
    

    <div class="container">

	    <!------popup-html------>
			  <div class="pop_overlay Overpop1" style="display:block;left: 0px;padding-left: 0px;padding-right: 0px;">
			    
			    <div id="lsid-window" class="registration">
			   
			   <div class="content-wrap">
			      <div id="lsid-main-dialog">
			         <div class="contents">
			            <div class="login selected">
			               <h1>Giriş</h1>
			               <div class="content" id="login-content">
			                 <?php if ($this->session->userdata("status") == "danger"): ?>
			                 	<div class="showerrorbox">
			                 		<p>abjd error</p>
			                 	</div>	
			                 <?php endif ?>
			                 
			                  <div class="form">
			                     <form id="login-form" method="post" action="<?php echo base_url('login/adminLogin') ?>">
			                        <div class="social-buttons border-bottom">
			                           <a id="#login-fb" class="fb_clse" href="<?php echo base_url('social/session/facebook')?>">
			                              <div class="facebook" style="width:150px;">
			                                 <span class="icon"></span>FACEBOOK
			                              </div>
			                           </a>
			                           <a id="#login-google" href="<?php echo base_url('social/session/google')?>">
			                              <div class="google" style="width:150px;">
			                                 <span class="icon"></span>GOOGLE+
			                              </div>
			                           </a>
			                        </div>
			                        <div class="email-form-element border-bottom">
			                           <input type="text" id="email" name="txt_email" tabindex="1" placeholder="Eposta">
			                        </div>
			                        <div class="password-form-element border-bottom">
			                           <span class="show">Göster</span>
			                           <input type="password" id="passwd" name="txt_password" tabindex="2" placeholder="Şifre" required>
			                        </div>
			                        <div class="password-confirm-form-element">
			                           <input type="checkbox" id="persistentlogin" name="persistentlogin" checked="checked" style="visibility: hidden; display: none;" required>
			                        </div>
			                        <div class="sign-up-form-element">
			                           <input type="submit" value="Giriş" id="login" name="login">
			                           <div id="login-log-in-link" class="log-in">
			                              <div class="content">veya <a href="#[lsid:registration]">kaydol</a></div>
			                           </div>
			                           <div class="terms forgt"><a href="javascript:void(0)" class="lost-password">Şifrenizi mi unuttunuz?</a></div>
									   
									    <div class="terms forgt2" style="display:none;"><a href="javascript:void(0)" class="lost-password">Password Change</a></div>

			                        </div>
			                     </form>
			                  </div>
			               </div>
			            </div>
			         </div>
			      </div>
			   </div>
			</div>
			</div>



			<!------popup-forgot password-html------>
      <div class="pop_overlay Overpop5" style="left: 0px;padding-left: 0px;padding-right: 0px;">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp5" ></a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents">
            <div class="forgottenPassword selected"><h1>Şifreyi sıfırla</h1><div class="content"><div class="text">Endişelenmeyin. Eposta adresinizi aşağıya girerseniz size şifre sıfırlama ile ilgili talimatları göndereceğiz. </div><div class="form"><form id="forgotten-password-form" method="post" action=""><div class="email-form-element border-bottom"><input type="text" style="display: none;"><input type="text" id="email" name="email" tabindex="1" placeholder="Eposta"></div><div class="sign-up-form-element"><input type="submit" value="Gönder" id="send" name="send"></div></form></div></div></div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/popup-forgot password-html------>
				

    </div>


<script>
var baseurl = "<?php echo base_url();?>";
</script>	  
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/formvalidation.js"></script>

<script>
   $(document).ready(function() {
    $(".live-menu li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("selected");
        $(this).parent().siblings().removeClass("selected");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});


$(document).ready(function () {

   $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll-to-top').fadeIn();
        } else {
            $('#scroll-to-top').fadeOut();
        }
    });

   $('#scroll-to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
   });
});



$(".toggle_img").click(function(){
    $(".menu_tggle").toggle();
});

/*****pop-1 *****/
$("#signIn").click(function(){
    $(".Overpop1").fadeIn();
});

$("#lsid-window-close").click(function(){
    $(".Overpop1").fadeOut();
});

/*****pop-2 *****/
$("#registration").click(function(){
    $(".Overpop2").fadeIn();
});

$(".clsepp2").click(function(){
    $(".Overpop2").fadeOut();
});

/*****pop-3 *****/
$(".control-panel-icon-setting").click(function(){
    $(".Overpop3").fadeIn();
});

$(".clsepp3").click(function(){
    $(".Overpop3").fadeOut();
});

/*****pop-4 *****/
$(".control-panel-icon-search").click(function(){
    $(".Overpop4").fadeIn();
});

$(".clsepp4").click(function(){
    $(".Overpop4").fadeOut();
});


/*****forgot_pass-4 *****/
$(".forgt").click(function(){
    $(".Overpop5").fadeIn();
	$(".Overpop1").fadeOut();
});

$(".clsepp5").click(function(){
    $(".Overpop5").fadeOut();
    $(".Overpop1").fadeIn();
});

/*****forgot_pass-6 *****/
$(".forgt2").click(function(){
    $(".Overpop6").fadeIn();
	$(".Overpop1").fadeOut();
});

$(".clsepp6").click(function(){
    $(".Overpop6").fadeOut();
});

</script>  

<script>

var num = 250; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('#rccontent').addClass('fixed_rgt');
    } 
	
	else {
        $('#rccontent').removeClass('fixed_rgt');
    }
})
</script>
</body>
</html>
		 