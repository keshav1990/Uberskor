<style>
.Overpop7 .email-form-element .input_bx{
height: 19px !important;
    width: 249px !important;
    margin: 0;
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid #B0B0B0 !important;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1) !important;
    color: inherit;
	display: inline-block !important;
	}
	.forgottenPassword .form .sign-up-form-element #sends{

float: left;
    padding: 15px 15px;
    height: auto;
    font-size: 15px;
    font-weight: bold;
    text-shadow: none;
    background: #7f8fa4;
    color: #ffffff;
    border: 0px;
    border-bottom: 0px solid #2f6e0b;
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    cursor: pointer;
    text-decoration: none;
    margin: 0 10px 0 0;
    width: 100%;
}
.Overpop7 #lsid-window #lsid-main-dialog{
    width: 720px !important;
}
.Overpop7 #lsid-window {
    padding-top: 0px;
    padding-bottom: 0px;
}
.Overpop7 #lsid-window {
    top: 20%;
}
#lsid-window.registration .contents .forgottenPassword .form #txt_name{
    height: 40px;
    width: 100%;
	padding: 0 15px;
}
#lsid-window.registration .contents .forgottenPassword .form .sign-up-form-element #sends:hover{
    background-color: #2ea2f8;
    text-decoration: underline;
}
#lsid-window.registration .contents .forgottenPassword .form #txt_name{
height: 40px !important;
    width: 100% !important;
	padding: 0 15px !important;
	margin-bottom: 14px !IMPORTANT;
}

#lsid-window.registration .contents .forgottenPassword .form #txt_email{
height: 40px !important;
    width: 100% !important;
	padding: 0 15px !important;
	margin-bottom: 14px !IMPORTANT;
}

#lsid-window.registration .contents .forgottenPassword .form #txt_password{
height: 40px !important;
    width: 89% !important;
	padding: 0 15px !important;
	margin-bottom: 14px !IMPORTANT;
	border-radius: 7px !important;
}

#lsid-window.registration .contents .forgottenPassword .form #txt_conf_password{
height: 40px !important;
    width: 89% !important;
	padding: 0 15px !important;
	margin-bottom: 14px !IMPORTANT;
	border-radius: 7px !important;
}
</style>  
  <div class="container">
               <div id="e-content">
                  <div class="page-block">
<?php
$ci = & get_instance();
$footerContent = $ci->Common_model->get_all_orderby('footer_content','id ASC');
echo html_entity_decode($footerContent[0]->top_footer_content);
?>

                  </div>
               </div>
            </div>
         </div>
         <div id="footer">
			 <div>

            <div class="footercls-2">
               <?php echo html_entity_decode($footerContent[0]->footer_one);?>
            </div>
            <div class="footercls-2">
               <?php echo str_replace("src=\"http:","src=\"", html_entity_decode($footerContent[0]->footer_two));?>
            </div>
            <div class="footercls-3">
               <?php echo html_entity_decode($footerContent[0]->footer_three);?>
            </div>
           </div>
            <div id="footer-copyright" style="text-align:center;">
			<!-- <div class="footer_social">
         <a class="facebook" href="#" title="Facebook" target="_blank">
                                    <img src="<?php echo base_url('assets/images/'); ?>fb-art.png" alt="facebook" class="img-responsive" style="width:32px;height:32px;border-radius: 4px;">
                                 </a>
                                 <a class="google-plus" href="#" title="Google+" target="_blank">
                                    <img src="<?php echo base_url('assets/images/'); ?>gmail.png" alt="Google Plus" class="img-responsive" style="width:32px;height:32px;">
                                 </a>
                                 <a class="twitter" href="#" title="Twitter" target="_blank">
                                    <img src="<?php echo base_url('assets/images/'); ?>twitter3.png" alt="Twitter" class="img-responsive" style="width:32px;height:32px;">
                                 </a></div> -->
			Copyright © <?php echo trim($footerContent[0]->txt_copyright);?>
			</div>
         </div> 
		 </div>
         <div id="scroll-to-top" style="display:block;"><span>Yukarı</span></div>
      </div>


    <!------popup-html------>
  <div class="pop_overlay Overpop1">
  <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close" ></a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents">
            <div class="login selected">
               <h1>Giriş</h1>
               <div class="content" id="login-content">
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
                           <input type="text" id="emails" name="txt_email" tabindex="1" placeholder="Eposta">
                        </div>
                        <div class="password-form-element border-bottom">
                           <span class="show">Göster</span>
                           <input type="password" id="passwds" name="txt_password" tabindex="2" placeholder="Şifre" required>
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
<!------/popup-html--- --->


<!------popup-forgot password-html------>
      <!---div class="pop_overlay Overpop5">
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
</div--->
<!------/popup-forgot password-html------>

<!------popup-forgot password-html------>
<!------popup-login-html------>
      <div class="pop_overlay Overpop5">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp5" >KAPAT</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login reg_login-lg">

		   <div class="forgottenPassword selected register fr-a">
			<h1>Üye değilim</h1>
			<p> Hızlı ve kolay bir şekilde üyelik oluşturabilir ve sitemizi size özel şekilde kullanabilirsiniz.</p><br> 
			<div class="content">
			<div class="form">
			<div class="sign-up-form-element"><input type="submit"  value="Kayıt ol" id="send" class="snd-bx" name="send"></div>
			<div class="scil_content signup">
			 <a class="fb_sign" href="<?php echo base_url('social/session/facebook')?>"><i class="fa fa-facebook-f"></i>Facebook ile kayıt ol</a>
			 <a class="ggle_sign" href="<?php echo base_url('social/session/google')?>"><i class=""><img src="<?php echo base_url() . 'assets/images/google-icn.png'; ?>" alt=""></i>Google ile kayıt ol</a>
			</div>
			</div>
			</div>
			</div>

            <div class="forgottenPassword selected fr-b">
			<h1>Giriş</h1>
			<p> Lütfen hesabınıza giriş yapın</p><br>
			<div class="content">
			<div class="form">
			<form id="forgotten-password-form1" method="post" action="<?php echo base_url('login/adminLogin') ?>">
			<div class="email-form-element border-bottom">
			<input type="email" class="input_bx"  tabindex="1" id="email" name="txt_email" tabindex="1" placeholder="E-posta"></div>
			<div class="email-form-element border-bottom">
			<input type="password" id="passwd" name="txt_password" tabindex="2" placeholder="Şifre"></div>
			
			<div class="email-form-element border-bottom chk-bx">
			<input type="checkbox" > <p>Beni hatırla</p>
			<a class="forgot_psswrd" href="#">Şifrenizi mi unuttunuz?</a></div>

			<div class="sign-up-form-element"><input type="submit" value="Giriş yap" name="login" id="send3" ></div>
			</form>
			
			<div class="scil_content">
			 <a class="fb_sign" href="<?php echo base_url('social/session/facebook')?>"><i class="fa fa-facebook-f"></i>Facebook ile giriş</a>
			 <a class="ggle_sign" href="<?php echo base_url('social/session/google')?>"><i class=""><img src="<?php echo base_url() . 'assets/images/google-icn.png'; ?>" alt=""></i>Google ile giriş</a>
			</div>
			
			</div>
			</div>
			</div> 
			
			<div style="display:none;" class="mob_imnw">
			<h1>I'm New Here</h1>
			<p> Creating an account quick and easy. </p><br>
			<div class="content">
			<div class="form">
			<div class="sign-up-form-element"><input type="submit" value="Sign Up" id="send2" class="snd-bx" name="send"></div>
			
			</div>
			</div>
			</div>
			
			
			
         </div>
      </div>
   </div>
</div>
</div>
<!------/popup-login-html------>


<!------Account Details -html------>
      <div class="pop_overlay Overpop3">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp3" >KAPAT</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login sinup_login">
            <div class="forgottenPassword selected fr-b">
			<h1>Hesap Detayları</h1>
			<?php  $name = explode(' ',$this->session->userdata('name'));?>
			<div class="content">
			<form id="userinfoform" action="<?php echo  base_url('login/updateinfo'); ?>" method="post">
			<div class="form">
			<ul class="account-details">
			<li><span>İsim</span><input type="text" name="user_name" id="user_name" value="<?php if($name && $name[0]!=''){ echo $name[0];} ?>" > </li>
			<li><span>Soyisim</span> <input type="text" name="user_surname" id="user_surname" value="<?php if($name && $name[1]!=''){ echo $name[1];} ?>" > </li>
			<li><span>Email</span><input type="text" name="user_email" id="user_email" value="<?php echo $this->session->userdata('user_email');?>" >  </li>
			</ul>
			</div>
			<a class="changes_password" href="#">Şifre değiştir</a>
			<div class="form">
			<div class="chk-bx details-pge">
			<input type="checkbox" > <p>Reklamlardan haberdar olmak istiyorum!</p></div>
			</div>
			
			<div class="sign-up-form-element login_updated">
			<input type="button" onclick="userinfoform()" value="Güncelle" name="login">
			<a href="#">Vazgeç</a> 
			</div>
			</form>
			</div>
			</div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/Account Details html------>




<!------/popup-forgot password-html------>
<!------Forgot Password -html------>
      <div class="pop_overlay Overpop4">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp8" >KAPAT</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login sinup_login">
		 
            <div class="forgottenPassword selected fr-b">
			<div class="message"></div>
			<h1>Parolanızı mı unuttunuz</h1>
			
			<div class="content entr_bttm">
			<div class="form">
			<p>E-postanızı giriniz</p><br>
			<form id="forgotten-password-form3" method="post" action="">
			<div class="email-form-element border-bottom">
			<input type="email" class="input_bx"  tabindex="1" id="forgotpass_email" name="forgotpass_email" tabindex="1" placeholder="Email"></div>

			<div class="sign-up-form-element"><input type="button" onclick="forgot_password()" value="Sign up" name="login" id="send"></div>
			</form>
		
			</div>
			</div>
			</div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/Forgot Password html------>

<!------change Password -html------>
      <div class="pop_overlay Overpop8">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp4" >KAPAT</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login sinup_login">
            <div class="forgottenPassword selected fr-b">
			<h1>Şifre değiştir</h1>
			
			<div class="content entr_bttm">
			<div class="form">
			<p>Yeni Şifre Gir</p><br>
			<form id="change-password-form3" method="post" action="<?php echo  base_url().'login/update_password'; ?>">
			<div class="email-form-element border-bottom">
			<input type="password" class="input_bx"  tabindex="1" id="old_password" name="old_password" tabindex="1" placeholder="Eski Şifreyi Gir"></div>
			<div class="email-form-element border-bottom">
			<input type="password" class="input_bx"  tabindex="1" id="ch_password" name="ch_password" tabindex="1" placeholder="şifre"></div>
             
			 <div class="email-form-element border-bottom">
			<input type="password" class="input_bx"  tabindex="1" id="conf_password" name="conf_password" tabindex="1" placeholder="şifre"></div>
			
			<div class="sign-up-form-element"><input type="button" onclick="change_passform()" value="Güncelleştirme" name="update_password" id="update_password"></div>
			</form>
		
			</div>
			</div>
			</div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/reset Password html------>

      <div class="pop_overlay Overpop9">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp9" >KAPAT</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login sinup_login">
            <div class="forgottenPassword selected fr-b">
			<h1>Şifreyi yenile</h1>
			
			<div class="content entr_bttm">
			<div class="form">
			<p>Yeni Şifre Gir</p><br>
			<form id="reset-password-form3" method="post" action="<?php echo  base_url().'forgotpassword/save_password'; ?>">
			<div class="email-form-element border-bottom">
			
			<div class="email-form-element border-bottom">
			<input type="password" class="input_bx"  tabindex="1" id="new_pass" name="new_pass" tabindex="1" placeholder="şifre"></div>
             
			 <div class="email-form-element border-bottom">
			<input type="password" class="input_bx"  tabindex="1" id="confpassword" name="confpassword" tabindex="1" placeholder="şifre"></div>
			<input type="hidden" name="user_id" id="user_id"value="<?=$_GET['change_password'] ?>">
			<div class="sign-up-form-element"><input type="button" onclick="reset_passform()" value="Güncelleştirme" name="update_password" id="update_password"></div>
			</form>
		
			</div>
			</div>
			</div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/change Password html------>
<!------popup-Sign up-html------>
      <div class="pop_overlay Overpop6">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp6" >KAPAT</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login sinup_login">

            <div class="forgottenPassword selected fr-b">
			<h1>Kayıt Ol</h1>
			
			<div class="content">
			<div class="form">
			<p>Kayıt olmak için lütfen aşağıdaki bilgileri girin.</p><br>
			<form id="registrationForm" method="post" action="<?php echo base_url('login/userRegistration') ?>">
			<div class="email-form-element border-bottom">
			<input type="text" class="input_bx"  tabindex="1" id="txt_name" name="txt_name" tabindex="1" placeholder="Ad soyad"></div>
			<div class="email-form-element border-bottom">
			<input type="email" class="input_bx"  tabindex="1" id="txt_email" name="txt_email" tabindex="1" placeholder="E-posta"></div>
			<div class="email-form-element border-bottom">
			<input type="password" class="input_bx"  name="txt_password" id="txt_password" tabindex="2" placeholder="Şifre" required ></div>
			
			<div class="email-form-element border-bottom">
			<input type="password" class="input_bx" name="txt_conf_password" id="txt_conf_password" tabindex="2" placeholder="Şifreyi tekrar girin " required ></div>
			
			<div class="email-form-element border-bottom chk-bx">
			<input type="checkbox" > <p>Şartlar ve koşulları kabul ediyorum.</p></div>

			<div class="sign-up-form-element"><input type="button" onclick="validateform()" value="Kayıt Ol" name="login" id=""></div>
			</form>
			
			
			<div class="scil_content">
			 <a class="fb_sign" href="<?php echo base_url('social/session/facebook')?>"><i class="fa fa-facebook-f"></i>Facebook ile kayıt ol</a>
			 <a class="ggle_sign" href="<?php echo base_url('social/session/google')?>"><i class=""><img src="<?php echo base_url() . 'assets/images/google-icn.png'; ?>" alt=""></i>Google ile kayıt ol</a>
			</div>
			 <span class="login_account">Hesabınız varsa giriş yapmak <a class="login_signup" href="#"> buraya tıklayın.</a></span>
			
			
			</div>
			</div>
			</div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/popup-Sign up-html------>



<!------Win Up TO 50%------>
      <div class="pop_overlay wn_up_ftp">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp-win" >X CLOSE</a>
   <a href="#"><img style="width: 710px;" src="<?php echo base_url() . 'assets/img/win-up.jpg'; ?>" alt="" ></a>
</div>
</div>
<!------Win Up TO 50%------>


<!------Pop2-html----- -->

<!------Pop2-html------->






<!---div id="preloader" class="over-laybox_pre">
<img src="//uberskor.com/beta/assets/images/preloader2.gif" alt="Pleaese Wait" title="Please Wait">
</div--->
<div class="pop_overlay2">
<img src="//uberskor.com/beta/assets/images/preloader2.gif" alt="Pleaese Wait" title="Please Wait">
</div>

<script>
var baseurl = "<?php echo base_url();?>";
</script>

<?php if(!empty($my_events)){ $eventdata = json_encode($my_events);} else { $eventdata ='';} ?>
<?php if(!empty($my_teams)){ $teamdata = trim($my_teams);} else { $teamdata ='{}';} 
?>
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.validate.js"></script>
<?php if(isset($_GET['change_password']) && $_GET['change_password']!='') {?>
<script type="text/javascript">
 $(".Overpop9").fadeIn();
</script>
<?php } ?>
<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();

function openLeague(url) {
	if(isMobile()){
		window.open(url, '_blank');
	}else{
		/* window.open(url,'_blank',"width=500,height=500"); */
		$.fancybox({
			'href' : url ,
			'width' : 650,
			'height' : 660,
			'type':'iframe',
			'padding' : 0,
			'closeClick'  : false,
			'onStart' : function(){ jQuery.fancybox.showActivity(); $(".pop_overlay2").fadeIn(); },
			'onComplete' : function(){ jQuery.fancybox.hideActivity(); $(".pop_overlay2").fadeOut();}
		});
	}

}


$(document).ready(function() {

$('.en').hide();

$('.lang_icn_png').click(function(e){
    e.stopPropagation();
    $('.en').fadeToggle(200);
});
$('.lang_icn_png').click(function(e){
    e.stopPropagation();
});
$(document).click(function(){
     $('.en').fadeOut(200);
});

$(document).click(function(){
    $('.selected-mob').addClass('current');
	$(this).removeClass('current');
});


    $(".live-menu li a:not(.onetab)").click(function(event) {
            $(".tab-content").removeClass('current_working_tab');
        event.preventDefault();
        $(this).parent().addClass("selected");
        $(this).parent().siblings().removeClass("selected");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
        $(tab).addClass('current_working_tab');
    });
    $(".onetab").click(function(event){
     event.preventDefault();
      $(this).parent().addClass("selected");
        $(this).parent().siblings().removeClass("selected");
         var tab = $(this).attr("data-target");
         $(".tab-content").show();
        $(".tab-content .odds-content table, .tab-content .odds-content tr").hide();
        if(tab!='.mygames'){
        $(".tab-content "+tab+", .tab-content table"+tab+" thead tr").show();
    }else{
        tab = ".myControll";
      $(".tab-content "+tab+", .tab-content table"+tab+" thead tr").show();
    }
  });

     $(".tab-content:eq(0)").addClass('current_working_tab');


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
    // $(".mobile-bx-2").toggle();
	// $("#menu").toggleClass("menu_top");
	// $("#fsbody").toggleClass("top-gp");
	$("body").toggleClass('left_fix_header');
});


/*****pop-1 *****/


$("#lsid-window-close").click(function(){
    $(".Overpop1").fadeOut();
});

/*****pop-3 *****/
$(".accnt_details").click(function(){
    $(".Overpop3").fadeIn();
});

$(".clsepp3").click(function(){
    $(".Overpop3").fadeOut();
});
$(".clsepp9").click(function(){
    $(".Overpop9").fadeOut();
});
$(".login_updated a").click(function(){
    $(".Overpop3").fadeOut();
});

$(".clsepp2").click(function(){
    $(".Overpop2").fadeOut();
});

$(".clsepp4").click(function(){
    $(".Overpop8").fadeOut();
});
$(".clsepp8").click(function(){
    $(".Overpop4").fadeOut();
});
/*****forgot_pass-4 *****/
$(".forgt").click(function(){
    $(".Overpop5").fadeIn();
	$(".Overpop1").fadeOut();
});

$(".clsepp5").click(function(){
    $(".Overpop5").fadeOut();
});

/*****forgot_pass-6 *****/
$(".Login").click(function(){
    $(".Overpop6").fadeIn();
});

$(".changes_password").click(function(){
    $(".Overpop8").fadeIn();
    $(".Overpop3").fadeOut();
});
$(".clsepp6").click(function(){
    $(".Overpop6").fadeOut();
});
$(".clsepp7").click(function(){
    $(".Overpop7").fadeOut();
});
$(".a_sub_tg").on('click', function() {
  location.href = "javascript:void(0);";
});

/*****forgot_pass-4 *****/
$(".hemen_btton button").click(function(){
    $(".wn_up_ftp").fadeIn();
});

$(".clsepp-win").click(function(){
    $(".wn_up_ftp").fadeOut();
});


 function removeLeague(elemefnt){
     //console.log(.data-stage_id);
   //  $(elemefnt).toggleClass('toggleMyLeague_icn');
     $("#tab-1 span[data-parentid='"+$(elemefnt).attr('data-parentid')+"']").click();
 }


$('.my-leagues li span.toggleMyLeague').on("click",function(){
		$(this).parent('li').remove();
	});
	
	
$(document).ready(function() {
	var eventdata = '<?php echo $eventdata;?>';
	if(eventdata !=''){
    eventdata = jQuery.parseJSON(eventdata); 
		$.each(eventdata,function(e,v){			
        $(".child_"+v.events_fk).prop('checked', true);
		$(".child_"+v.events_fk).closest("table").find("tr:first-child").find('input[type="checkbox"]').prop('checked', true);
		 $(".childRwckShow_"+v.events_fk).addClass("myControll").addClass("childControll");
        $("#"+v.events_fk).addClass("myControllCount");
        $("#"+v.events_fk).closest("table").addClass("myControll");
		});
		countMyleague();
	}
$.get("/Login/check_status_header",function(response){
   $("#login_header").html(response); 
});
//$("#login_header")


	/* This function is used to clear the console on load */
	if (typeof console._commandLineAPI !== 'undefined') {
	console.API = console._commandLineAPI;
	} else if (typeof console._inspectorCommandLineAPI !== 'undefined') {
	console.API = console._inspectorCommandLineAPI;	} else if (typeof console.clear !== 'undefined') {
	console.API = console;    }
//console.API.clear();

	  //e-content
	   var mainH = $("#main").offset().top+20;
	   var topContentAA = $("#e-content").offset().top;
	   var topContentAAH = $("#rccontent").height();

    window.onscroll = function() {
		spos = $(window).scrollTop();
        if ( spos < (topContentAA-topContentAAH) && mainH< spos) {
		 $('#rccontent').addClass('fixed_rgt');
        }
        else {
            $('#rccontent').removeClass('fixed_rgt');
			$('#e-content').removeClass('fixed_rgt');
        }

    };


});


// Table Star show and Hide function

function showMe(id) {
	if(localStorage.getItem("<?=$game.'_event_'?>"+id)){
			localStorage.removeItem("<?=$game.'_event_'?>"+id);
			$("#parent_show"+id).removeClass('display_show');
			$("#parent_show"+id).addClass('display_none');
			$(".showme"+id).addClass('toggleMyLeague_icn');
		}else{
			$("#parent_show"+id).removeClass('display_none');
			localStorage.setItem("<?=$game.'_event_'?>"+id,id);
			$("#parent_show"+id).addClass('display_show');
			$(".showme"+id).removeClass('toggleMyLeague_icn');
		}
		countMyleague();
}

function hide_me(id) {
	$("#parent_show"+id).hide();
	$(".showme"+id).removeClass('toggleMyLeague_icn');
	localStorage.removeItem("<?=$game.'_event_'?>"+id);
	$("#parent_show"+id).removeClass('display_show');
	countMyleague();
}

function isNull(str)
{
	if(str != null){
		return str;
	}else{
		return '';
	}
}



/* This function is used to  push leagues into sidemenus */

$(document).ready(function() {
/* This function is used to check and show sidebar my leagues */
var my_teams =<?php echo $teamdata;?>;
if(my_teams!='')
{
 set_featuerd_leage_(my_teams);	
}
   if(localStorage.getItem('<?=$game?>Games')){
	var myfutballGames =  localStorage.getItem('<?=$game?>Games');
	myfutballGames = JSON.parse(myfutballGames);
	$.each(myfutballGames,function(result){
		tsid = myfutballGames[result].tsid;
		//set_featuerd_leage_(myfutballGames[result]);
	});
	}else{
		$('ul#my-leagues-list > li').show();
	}
});

function removeLi(id){
	$(".rshowme"+id).trigger("click");
	 $("#my-leagues-list li#sidebarfav"+id).remove();
}
function set_featuerd_leage_(teamdata)
{ 
    $('.myTeamInfo').hide();
	myfutballGames = JSON.stringify(teamdata);
	myfutballGames = jQuery.parseJSON(myfutballGames);
	$.each(myfutballGames,function(e,v){
	$.each(v,function(s,result){
	result = jQuery.parseJSON(result);
    flag = result.flag;
    countryname = result.country;
    tsid = result.tsid;
    tsName = result.tsName;
    pid = result.pid;
	countrySlug = result.country.toLowerCase().replace(/\ /g,'-');
	tsSlug = result.tsName.toLowerCase().replace(/\ /g,'-');
	link = "<?php echo base_url($game.'/')?>"+countrySlug+'/'+tsSlug;
	myfavId = 'sidebarfav'+result.pid;
    if($("#"+myfavId).length){}else{
    $('span[data-parentid="'+pid+'"]').addClass('toggleMyLeague_icn');
	ulId = "#my-teams-list";
	
	li = '<li id="'+myfavId+'"><span class=\"flag flag-'+flag+'\"></span><a title=\"'+countryname+': '+tsName+'\" href=\"'+link+'\">'+tsName+'</a><span class=\"toggleMyLeague active\" onclick=\"removeLi('+pid+')\"></span></li>';
	$("ul "+ ulId).prepend(li);
    var temp=  $("#tab-1 #_show"+pid).detach();
	temp.insertBefore("#tab-1 .odds-content");
	$("#tab-1 .showme"+pid).addClass('toggleMyLeague_icn');
	$("#tab-6 .showme"+pid).addClass('toggleMyLeague_icn');
    }
	}); 
	}); 
}

function make_team(event,link,isdelete,alldata){
    	url = "<?php echo base_url() .'login/my_team' ?>"
		$.ajax({
			url:url,
			method:"POST",
			dataType :"html",
			data:{sportFK:'<?php echo $sportFK; ?>',events_fk:event,url:link,is_delete:isdelete,alldata:alldata},

			success:function(res){
			//countMyleague();
			}

		});
}
var  MyFootballGame = [];
function pushLeague(current)
{
	var userid = '<?php echo $this->session->userdata('user_id');?>';
	if(userid=='')
	{
		return false;
	}
    flag = $(current).data('flag');
	flag = flag.toString().toLowerCase();
    country = $(current).data('country');
    tsid = $(current).data('stage_id');
    tsName = $(current).data('stage_name');
    pid = $(current).data('parentid');
	countrySlug = country.toLowerCase().replace(/\ /g,'-');
	tsSlug = tsName.toLowerCase().replace(/\ - /g,'+');
	tsSlug = tsName.toLowerCase().replace(/\-/g,'+');
	tsSlug = tsSlug.toLowerCase().replace(/\ /g,'-');
	link = "<?php echo base_url($game.'/')?>"+countrySlug+'/'+tsSlug;
	link2 = "<?php echo $game.'/';?>"+countrySlug+'/'+tsSlug;
	myfavId =  'sidebarfav'+pid;
    var	li = '';

   var object = {};


	ulId = "#my-teams-list";
alldata = {flag:flag,country:country,tsid:tsid,tsName:tsName,pid:pid,countrySlug:countrySlug,tsSlug:tsSlug,link:link2};
	if($(current).hasClass('toggleMyLeague_icn')){
		$(current).removeClass('toggleMyLeague_icn');
        add = false;
        $("#"+myfavId).remove();
        $("#tab-1 .pushLeague_in"+pid).removeClass('mypushed').insertAfter("#tab-1 .mypushed:last");
		var is_delete='delete';
		//return false;
	}else{
	      li += '<li id="'+myfavId+'" class="last myTeamInfo"><span class=\"flag flag-'+flag+'\"></span><a title=\"'+country+': '+tsName+'\" href=\"'+link+'\">'+tsName+'</a><span class=\"toggleMyLeague active\" onclick=\"removeLi('+pid+')\"></span></li>';
        object = {'flag':flag,'country':country,'tsid':tsid,'tsName':tsName,'pid':pid,'countrySlug':countrySlug,'link':link};

       add = true;
		$(current).addClass('toggleMyLeague_icn');
        	$("#tab-1 .pushLeague_in"+pid).insertBefore("#tab-1 .LeaguePushID_in:eq(0)").addClass("mypushed");
    var is_delete='';
	}
	make_team(tsid,link2,is_delete,alldata);
    add__remove_game(pid,object,1,ulId,li,add);
  //	$("#tab-6 .showme"+pid).toggleClass('toggleMyLeague_icn');
}

function add__remove_game(pid,object,action,ulId,li,add)
{
	/* Checking storage item us available or not */
	if(localStorage.getItem("<?=$game?>Games")){
		fItem = localStorage.getItem("<?=$game?>Games");
		myfGames = JSON.parse(fItem);


		if(add==true){
			$("ul "+ ulId).prepend(li);
			myfGames.push(object);
			MyFootballGame1 = JSON.stringify(myfGames) ;
			localStorage.setItem("<?=$game?>Games",MyFootballGame1);
		}else{
		     myfGames = $.grep( myfGames, function( i ) {
				  if(i.pid != pid){return i;}
				});
				if(myfGames.length !==0){
					MyFootballGame1 = JSON.stringify(myfGames) ;
					localStorage.setItem("<?=$game?>Games",MyFootballGame1);
				}else{
					localStorage.removeItem("<?=$game?>Games");
				}

		}
	}else{
		$("ul "+ ulId).prepend(li);
		MyFootballGame.push(object);
		MyFootballGame1 = JSON.stringify(MyFootballGame) ;
		localStorage.setItem("<?=$game?>Games",MyFootballGame1);
	}
}
function showLiveStar()
{
	if(localStorage.getItem('<?=$game?>Games')){
	var myfutballGames =  localStorage.getItem('<?=$game?>Games');
	myfutballGames = JSON.parse(myfutballGames);
	$.each(myfutballGames,function(result){
		pid = myfutballGames[result].pid;
		$(".showme"+pid).addClass("toggleMyLeague_icn");
	});
	}
}

/* Function for search  */
$("#search-form").on("submit",function(){
	val = $("#search-form-query").val();
	length = val.length;
	url = "<?php echo base_url('search')?>";
 	if(length > 2){
		game = $("#search-form-select").val();
		gameName = game.split('+');
		$.post(url,{term:val,sport:gameName[0],game:gameName[1]},function(res){
			$("#search-results-project-history").html(res);
		});
	}
});

$("#search-form-submit-button").on("click",function(){
	val = $("#search-form-query").val();
	length = val.length;
	url = "<?php echo base_url('search')?>";
 	if(length > 2){
		game = $("#search-form-select").val();
		gameName = game.split('+');
		$.post(url,{term:val,sport:gameName[0],game:gameName[1]},function(res){
			$("#search-results-project-history").html(res);
		});
	}
}); 


//Sider Bar Drop Down Function
// $('.country-list li').on('click', function() {
  // $('.submenu').hide();
   // $('.a_sub_tg').addClass('active');
  // $(this).find('.submenu').show(10);
// });


$(document).ready(function() {

	$('.a_sub_tg').click(function() {
		$('.a_sub_tg').removeClass('on');
	 	$('.submenu').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('on');
			$(this).next().slideDown('normal');
		}

	 });


	$('.a_sub_tg').mouseover(function() {
		$(this).addClass('over');

	}).mouseout(function() {
		$(this).removeClass('over');
	});

	$('.submenu').hide();
	


});

/****country Side Bar List ***/
if(isMobile()){
		$('.side_mobile_bx').click(function(){
		$(".mob_lst-cnt").toggleClass("spanner_mv");
		});

		$('.selected-mob').click(function(){
		$(this).next().slideToggle();
		})

		$(".ifmenu li a").click(function() {
			var value = $(this).text();
			var input = $('.selected-mob');
			input.text(value);
			return false;
		});

		// $(".top_nav-mb li a").click(function() {
			// $(".ifmenu").css("display", "none");
		// });


}
$('.a_sub_tg').click(function() {
		$('.a_sub_tg').removeClass('on');
});
function set_data_leauges(id){
     var MyFootballGame =[];
	val = id.split(',');

	first = val[0];
	second = val[1];
    	pid = second;
	attr = first.split('_');
   	pid = second;
		attr1 = attr[0];
		attr2 = attr[1];

			$("#parent_"+pid).prop('checked', true);
		   //	$("#tab-6 #parent_"+pid).prop('checked', true);

			$(".child_"+attr2).prop('checked', true);
		 //	$("#tab-6").find(".childRwckHide_"+attr2).removeClass("display_none").addClass("display_tbl_row");
            ///this code is used for adding the events in the leauge


}

function make_count_leauges(attr2,checked){
    	url = "<?php echo base_url() .'login/my_leagues' ?>"

		$.ajax({
			url:url,
			method:"POST",
			dataType :"html",
			data:{sportFK:'<?php echo $sportFK; ?>',events_fk:attr2,checked_val:checked},

			success:function(res){
			countMyleague();
			}

		});
}

 function mygames(check,id)
{
	var userid = '<?php echo $this->session->userdata('user_id');?>';

    var MyFootballGame =[],val = id.split(','),

	first = val[0],
	second = val[1];
    	pid = second;
	attr = first.split('_');
	if(attr[0] == "parent")
	{
		
		attr1 = attr[0];
		attr2 = attr[1];
		//var checked = $("#"+attr1+"_"+attr2).is(':checked');
		var checked = $(check).is(':checked');
		//var checked = $("#"+attr1+"_"+attr2).prop('checked');
		
          checked = checked ? true : false;
          
		   $(check).closest("table").find("tr").find('input[type="checkbox"]').prop('checked', checked);
        if(checked){
            //$("#"+attr1+"_"+attr2).closest("table").find("tr").addClass("myControll").addClass('childControll').addClass('myControllCount');
            $(check).closest("table").find("tr").addClass("myControll").addClass('childControll').addClass('myControllCount');
             //$("#"+attr1+"_"+attr2).closest("table").addClass("myControll").removeClass("childControll").removeClass('myControllCount');
             $(check).closest("table").addClass("myControll").removeClass("childControll").removeClass('myControllCount');

     }else{
         //$("#"+attr1+"_"+attr2).closest("table").removeClass("myControll").removeClass("childControll").removeClass('myControllCount');
         $(check).closest("table").removeClass("myControll").removeClass("childControll").removeClass('myControllCount');
         //$("#"+attr1+"_"+attr2).closest("table").find("tr").removeClass("myControll").removeClass("childControll").removeClass('myControllCount');
         $(check).closest("table").find("tr").removeClass("myControll").removeClass("childControll").removeClass('myControllCount');
        }
        	countMyleague();
   if(userid =='')
	{
	 //	alert("Please Login");
	 return false;
	}
     /* $('input:checkbox.parent_'+attr2).each(function () {  make_count_leauges($(this).val(),checked) ;     }); */
	 $($(check).closest("table").find("tr").find('input[type="checkbox"]')).each(function () {  make_count_leauges($(this).val(),checked) ;     });
	}
	else
	{
	  attr1 = attr[0];
	  attr2 = attr[1];
	  //checked = $("."+attr1+"_"+attr2).is(':checked');
	  var checked = $(check).is(':checked');
      checked = checked ? true : false;
      if(checked){
	   //	checked = true;
	   $(check).closest("table").find("tr:first-child").find('input[type="checkbox"]').prop('checked', checked);
        //$("#parent_"+second).prop('checked',checked);
        $(".childRwckShow_"+attr2).addClass("myControll").addClass("childControll");
        $("#"+attr2).addClass("myControllCount");
        $("#"+attr2).closest("table").addClass("myControll");
	  }else{
	      $(".childRwckShow_"+attr2).removeClass("myControll").removeClass("childControll");
           $("#"+attr2).removeClass("myControllCount");
              totalChecked =     $(".parent_"+second+':checked').length;
            //  console.log(totalChecked);
              if(totalChecked==0){
               //$("#parent_"+second).prop('checked',checked);
               $(check).closest("table").find("tr:first-child").find('input[type="checkbox"]').prop('checked', checked);
                $("#"+attr2).closest("table").removeClass("myControll");
              }
	  }

 	countMyleague();
   if(userid =='')
	{
	 //	alert("Please Login");
	 return false;
	}
   make_count_leauges(attr2,checked) ;
}


}
/* function mygames(id)
{

      var MyFootballGame =[];
	val = id.split(',');

	first = val[0];
	second = val[1];
    	pid = second;
	attr = first.split('_');
	if(attr[0] == "parent"){
		attr1 = attr[0];
		attr2 = attr[1];
		var checked = $("#"+attr1+"_"+attr2).is(':checked');
          checked = checked ? false : true;
		$("tbody tr."+attr2).find('input:checkbox').prop('checked', checked).click();

		$("#tab-6").find("thead tr input:checkbox").prop('checked', checked);

	}else{
		pid = second;
		attr1 = attr[0];
		attr2 = attr[1];
        if(localStorage.getItem("<?=$game?>MYGames")){


        fItem = localStorage.getItem("<?=$game?>MYGames");
	  //  fItem = localStorage.getItem("futbolMYGames");
		myfGames = JSON.parse(fItem);
         }  else{
           myfGames = [];
         }
		if($("."+attr1+"_"+attr2).prop('checked') == true){
			$("#parent_"+pid).prop('checked', true);
		
			if(!$("#parent_show"+pid).hasClass('display_show')){
				$("#parent_show"+pid).removeClass('display_none').addClass('display_show');
			}
			$("#tab-6").find(".child_"+attr2).prop('checked', true);
			$("#tab-6").find(".childRwckHide_"+attr2).removeClass("display_none").addClass("display_tbl_row");
                 var totalCounter = 0;
                 if(totalCounter==0){
                 	myfGames.push(val);
		        	MyFootballGame1 = JSON.stringify(myfGames) ;
		        	localStorage.setItem("<?=$game?>MYGames",MyFootballGame1);
                 }
		}else{
			if($(".parent_"+pid).filter(":checked").length > 1){
				$("#tab-6").find(".childRwckHide_"+attr2).addClass("display_none").removeClass("display_tbl_row").prop('checked', false);
			}else{
				$("#parent_"+pid).prop('checked', false);
				$("#parent_show"+pid).addClass('display_none').removeClass('display_show');
				$("#tab-6").find(".parentRwckShow"+pid).addClass("display_none").removeClass("display_tbl_row");
			}
    	myfGames = $.grep( myfGames, function( i ) {
				  if(i[1] != pid){return i;}
				});
				if(myfGames.length !==0){
					MyFootballGame1 = JSON.stringify(myfGames) ;
					localStorage.setItem("<?=$game?>MYGames",MyFootballGame1);
				}else{
					localStorage.removeItem("<?=$game?>MYGames");
				}

    }



}
	countMyleague();

} */

function set_my_games(){
  if(localStorage.getItem("<?=$game?>MYGames")){
 fItem = localStorage.getItem("<?=$game?>MYGames");
 myfGames = JSON.parse(fItem);
// console.log(myfGames);
//localStorage.removeItem("<?=$game?>MYGames");
$.each(myfGames,function(e,result){  set_data_leauges(result[0]+','+result[1]);       });
}
}

function showMe(id) {
	if(localStorage.getItem("<?=$game.'_event_'?>"+id)){
		localStorage.removeItem("<?=$game.'_event_'?>"+id);
		$("#parent_show"+id).removeClass('display_show');
		$("#parent_show"+id).addClass('display_none');
		$(".showme"+id).addClass('toggleMyLeague_icn');
	}else{
		$("#parent_show"+id).removeClass('display_none');
		localStorage.setItem("<?=$game.'_event_'?>"+id,id);
		$("#parent_show"+id).addClass('display_show');
		$(".showme"+id).removeClass('toggleMyLeague_icn');
	}
	countMyleague();
}
function closeFrame(url)
{
	jQuery.fancybox.close();
}
function isMobile()
{
	$.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
	return $.browser.device;
}
function getMyLeagues()
{
	$.each(localStorage, function(key, value){
		//console.log(key);
		/* function to show myleague by game only */
	  length = 	"<?=$game?>".length;
	  if(key.substring(0,length) == "<?=$game?>_event_"){
		$("#parent_show"+value).removeClass('display_none');
		$("#parent_show"+value).addClass('display_show');
		$(".showme"+value).addClass('toggleMyLeague_icn');
	  }
	});

}

function countMyleague()
{
	var total_counter=	$(".myControllCount").length;
	$("#mygames-count").text(total_counter);
}
/* function to load content and show my leagues start's */
function changeDate()
{
	var date = $("#datechange").val();
	window.location = "<?php echo base_url().$game?>/eventof/"+date;
}

</script>

<script>
  $( function() {
    $( "#speed" ).selectmenu();

    $( "#files" ).selectmenu();

    $( "#number" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );

    $( "#salutation" ).selectmenu();
     setTimeout(function(){  set_my_games();  },200);
  } );
  
  /*******Language Toggle for mobile********/
  $(".Language-toggle").click(function(){  
    $(".cntrl_main_mob").toggle();
});

$(".base_userimg").click(function(){
    $("#control-panel").toggle();
});
  function validateform() {
	event.preventDefault();
        var validator = $("#registrationForm").validate({
            rules: {
                txt_name: "required",
               // txt_email: "required",
				txt_email: {
				required: true,
				email: true,
					remote: {
						url: "<?php echo base_url() .'login/email_validate' ?>",
						type: "post"
					 }
			    },
                txt_password: "required",
                txt_conf_password: {
                    equalTo: "#txt_password"
                }
            },
            messages: {   
                txt_name: "Adınızı soyadınızı girin",
				 txt_email: { 
					required: "E-posta adresinizi girin",
					email: "Lütfen geçerli bir e-posta adresi girin",
					remote: "E-posta zaten kullanımda!"
				},
                txt_password: "Şifre girin",
                txt_conf_password: "Doğrulama amacıyla şifreyi tekrar girin"
            }
        });
        if (validator.form()) {
			$("#registrationForm").submit();
            //alert('Sucess');
        }
    }
	
	function userinfoform() {
	event.preventDefault();
        var validator = $("#userinfoform").validate({
            rules: {
                user_name: "required",
                //user_surname: "required",
				user_email: {
				required: true,
				email: true,
					/* remote: {
						url: "<?php echo base_url() .'login/email_validate' ?>",
						type: "post"
					 } */
			    }
               
            },
            messages: {   
                user_name: "Adınızı soyadınızı girin",
				 user_email: { 
					required: "E-posta adresinizi girin",
					email: "Lütfen geçerli bir e-posta adresi girin",
				}
            }
        });
        if (validator.form()) {
			$("#userinfoform").submit();
            //alert('Sucess');
        }
    }
	
	function change_passform() {
	event.preventDefault();
        var validator = $("#change-password-form3").validate({
            rules: {
                
                old_password: "required",
                ch_password: "required",
                conf_password: {
                    equalTo: "#ch_password"
                }
            },
            messages: { 
                old_password: "Eski Şifreyi Gir",
                ch_password: "Şifre girin",
                conf_password: "Doğrulama amacıyla şifreyi tekrar girin"
            }
        });
        if (validator.form()) {
			$("#change-password-form3").submit();
          
        }
    }
	function reset_passform() {
	event.preventDefault();
        var validator = $("#reset-password-form3").validate({
            rules: {
                new_pass: "required",
                confpassword: {
                    equalTo: "#new_pass"
                }
            },
            messages: { 
                new_pass: "Şifre girin",
                confpassword: "Doğrulama amacıyla şifreyi tekrar girin"
            }
        });
        if (validator.form()) {
			$("#reset-password-form3").submit();
          
        }
    }
	function forgot_password() {
	event.preventDefault();
        var validator = $("#forgotten-password-form3").validate({
            rules: {
				forgotpass_email: {
				required: true,
				email: true,
					 remote: {
						url: "<?php echo base_url() .'login/check_email' ?>",
						type: "post"
					 } 
			    }
               
            },
            messages: {   
				 forgotpass_email: { 
					required: "E-posta adresinizi girin",
					email: "Lütfen geçerli bir e-posta adresi girin",
					remote: "Bu e-posta mevcut değil"
				}
            }
        });
        if (validator.form()) {
			var url = '<?php echo base_url().'forgotpassword/send_mail';?>';
			var email = $('#forgotpass_email').val();
            $.ajax({
			url:url,
			method:"POST",
			dataType :"json",
			data:{forgotpass_email:email},

			success:function(res){
			$('.message').html(res.message);
			}

		});
        }
    }
$(".Login").on('click touchstart',function(){
    $(".Overpop5").fadeIn();
});


$(".clsepp5").on('click touchstart',function(){
    $(".Overpop5").fadeOut();
});



$(".forgot_psswrd").on('click touchstart',function(){
    $(".Overpop4").fadeIn();
	$(".Overpop5").fadeOut();
});

$(".snd-bx").on('click touchstart',function(){
    $(".Overpop6").fadeIn();
	$(".Overpop5").fadeOut();
});

$(".login_signup").on('click touchstart',function(){
    $(".Overpop5").fadeIn();
	$(".Overpop6").fadeOut();
});




  </script>


<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.css" media="screen" />
	
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" media="screen" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	