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
      <div class="pop_overlay Overpop6">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp6" >x Close</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login">

		   <div class="forgottenPassword selected register fr-a">
			<h1>I'm New Here</h1>
			<p> Creating an account quick and easy. You can also store multiple shipping addresses, gain access to your order history, and much more.</p><br>
			<div class="content">
			<div class="form">
			<div class="sign-up-form-element"><input type="submit" value="Sign Up" id="send" name="send"></div>
			<div class="scil_content">
			 <a href="<?php echo base_url('social/session/facebook')?>"><i class="fa fa-facebook-f">Sign in with Facebook</i></a>
			 <a href="<?php echo base_url('social/session/google')?>"><i class="fa fa-google">Sign in with Google</i></a>
			</div>
			</div>
			</div>
			</div>

            <div class="forgottenPassword selected fr-b">
			<h1>I'm Already Registered</h1>
			<p> Please login to your account</p><br>
			<div class="content">
			<div class="form">
			<form id="forgotten-password-form" method="post" action="<?php echo base_url('login/adminLogin') ?>">
			<div class="email-form-element border-bottom">
			<input type="email" class="input_bx"  tabindex="1" id="email" name="txt_email" tabindex="1" placeholder="Eposta"></div>
			<div class="email-form-element border-bottom">
			<input type="password" id="passwd" name="txt_password" tabindex="2" placeholder="Şifre" required ></div>

			<div class="sign-up-form-element"><input type="submit" value="Giriş" name="login" id="send" ></div>
			</form>
			</div>
			</div>
			</div>
         </div>
      </div>
   </div>
</div>
</div>
<!------/popup-forgot password-html------>
<!--- / registration form--->
 <div class="pop_overlay Overpop7">
	 <div id="lsid-window" class="registration">
   <a id="lsid-window-close" class="close clsepp7" >x Close</a>
   <div class="content-wrap">
      <div id="lsid-main-dialog">
         <div class="contents sng_login">

		   <div class="forgottenPassword selected register fr-a">
			<h1>I'm New Here</h1>
			<p> Creating an account quick and easy. You can also store multiple shipping addresses, gain access to your order history, and much more.</p><br>
			<div class="content">
			<div class="form">
			<div class="sign-up-form-element"><input type="submit" value="Sign Up" id="send" name="send"></div>
			<div class="scil_content">
			 <a href="<?php echo base_url('social/session/facebook')?>"><i class="fa fa-facebook-f">Sign in with Facebook</i></a>
			 <a href="<?php echo base_url('social/session/google')?>"><i class="fa fa-google">Sign in with Google</i></a>
			</div>
			</div>
			</div>
			</div>

            <div class="forgottenPassword selected fr-b">
			<h1>I'm Already Registered</h1>
			<p> Please login to your account</p><br>
			<div class="content">
			<div class="form">
			<form id="registrationForm" name="registrationForm" method="post" action="<?php echo base_url('login/userRegistration') ?>">
			<div class="email-form-element border-bottom">
			<input type="text" class="input_bx"  tabindex="1" id="txt_name" name="txt_name" tabindex="1" placeholder="isim"></div>
			<div class="email-form-element border-bottom">
			<input type="email" class="input_bx"  tabindex="1" id="txt_email" name="txt_email" tabindex="1" placeholder="Eposta"></div>
			<div class="email-form-element border-bottom">
			<input type="password" id="txt_password" name="txt_password" tabindex="2" placeholder="Şifre" required ></div>
			<div class="email-form-element border-bottom">
            <input type="password" id="txt_conf_password" name="txt_conf_password" tabindex="2" placeholder="Şifre" required /></div>
			<div class="sign-up-form-element">
			<input type="button" value="Giriş" name="login" id="sends" onclick="validateform();"/>
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
<!-- registration  form popup end    -->

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


<!--- ---Pop3-html----- -->
<!-- <div class="pop_overlay Overpop3">
<div id="lsid-window">
   <a id="lsid-window-close" class="close clsepp3" href="#" title="Pencereyı kapat"></a>
   <div class="content-wrap">
      <div id="livescore-settings">
         <ul class="tabs-menu">
            <li class="li0 settings selected"><span><a class="settings unclickable" href="#" onclick="return false;">Ayarlar</a></span></li>
         </ul>
         <div class="contents">
            <div class="settings selected">
               <form id="livescore-settings-form" method="post" action="/">
                  <div class="header">Genel ayarlar</div>
                  <div class="content">
                     <div class="error-box" style="display: none;"><span class="err-msg">Bu özelliği kullanabilmak için hesabınıza giriş yapmış olmalısınız. <a href="#">Hesabınıza buradan giriş yapabilirsiniz!</a></span></div>
                     <div class="sortby-form-element">
                        <strong>Sıralama ölçütü:</strong>
                        <div class="options">
                           <label><input type="radio" name="sortby" value="ts.name">Lig adı</label><br>
                           <label><input type="radio" name="sortby" value="e.startdate">Başlangıç zamanı</label>
                        </div>
                     </div>

                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>-->
<!---- --Pop4-html----- -->


<!--div class="pop_overlay Overpop4">
<div id="ls-search-window" class="ls-manager-window">
   <a id="ls-search-window-close" class="close clsepp4" href="#" title="closeWindow"></a>
   <div class="content-wrap">
      <ul class="tabs-menu">
         <li class="li0 selected">
            <span><a class="unclickable" href="#" onclick="return false;">Arama</a></span>
         </li>
      </ul>
      <div class="contents">
         <div class="content">
            <form id="search-form" onsubmit="return false;">
               <div>
                  <div class="search-form-label-wrapper">
                     <div id="search-input-wrapper" class="">
                        <div class="search-input-submit" id="search-form-submit-button">
                           Ara
                        </div>
                        <span class="search-input-sport-wrapper">
                           <span class="search-input-sport-selected">
                           Tüm spor dalları
                           </span>
                           <span class="search-input-sport-downarrow"></span>
                             <select id="search-form-select" name="game">
								<option value='1+soccer' selected>Futbol</option><option value='5+ice-hockey'>Buz hokeyi</option><option value='20+handball'>Hentbol</option><option value='23+basketball'>Basketbol</option><option value='26+baseball'>Beyzbol</option><option value='29+rugby'>Ragbi</option><option value='51+volleyball'>Voleybol</option><option value='73+cricket'>Kriket</option><option value='80+rugby-league'>Rugby ligi</option>
							 </select>
                        </span>
                        <div class="search-input-outer">
                           <div class="search-input-inner">
                              <input id="search-form-query" type="text" name="term" placeholder="Aramak istediğiniz sözcüğü yazın" autofocus="true">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <div id="search-results">Lütfen en az 3 karakter yazınız. Sonuçlar anında görüntülenecektir.</div>
            <div id="search-results-history">
               <div class="search-result-wrapper"></div>
            </div>
            <div id="search-results-project-history">

            </div>
         </div>
      </div>
   </div>
</div>
</div-->


<!---div id="preloader" class="over-laybox_pre">
<img src="//uberskor.com/beta/assets/images/preloader2.gif" alt="Pleaese Wait" title="Please Wait">
</div--->
<div class="pop_overlay2">
<img src="//uberskor.com/beta/assets/images/preloader2.gif" alt="Pleaese Wait" title="Please Wait">
</div>

<script>
var baseurl = "<?php echo base_url();?>";
</script>


<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.validate.js"></script>

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
			'width' : 760,
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

        $(".tab-content "+tab+", .tab-content table"+tab+" thead tr").show();
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

/*****pop-2 *****/


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
});

/*****forgot_pass-6 *****/
$(".Login").click(function(){
    $(".Overpop6").fadeIn();
});

$(".base_userimg").click(function(){
    $(".Overpop6").fadeIn();
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


$('#my-leagues-list li span.toggleMyLeague').on("click",function(){
		$(this).parent('li').remove();
	});
$(document).ready(function() {

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
   if(localStorage.getItem('<?=$game?>Games')){
	var myfutballGames =  localStorage.getItem('<?=$game?>Games');
	myfutballGames = JSON.parse(myfutballGames);
	$.each(myfutballGames,function(result){
		tsid = myfutballGames[result].tsid;
		set_featuerd_leage_(myfutballGames[result]);
	});
	}else{
		$('ul#my-leagues-list > li').show();
	}
});

function removeLi(id){
	$(".rshowme"+id).trigger("click");
	 $("#my-leagues-list li#sidebarfav"+id).remove();
}
function set_featuerd_leage_(myfutballGames)
{
    flag = myfutballGames.flag;
    country = myfutballGames.country;
    tsid = myfutballGames.tsid;
    tsName = myfutballGames.tsName;
    pid = myfutballGames.pid;;
	countrySlug = country.toLowerCase().replace(/\ /g,'-');
	tsSlug = tsName.toLowerCase().replace(/\ /g,'-');
	link = "<?php echo base_url($game.'/')?>"+countrySlug+'/'+tsSlug;
	myfavId = 'sidebarfav'+pid;
    if($("#"+myfavId).length){}else{
    $('span[data-parentid="'+pid+'"]').addClass('toggleMyLeague_icn');
	ulId = "#my-leagues-list";
	li = '';
	li += '<li id="'+myfavId+'"><span class=\"flag flag-'+flag+'\"></span><a title=\"'+country+': '+tsName+'\" href=\"'+link+'\">'+tsName+'</a><span class=\"toggleMyLeague active\" onclick=\"removeLi('+pid+')\"></span></li>';
	$("ul "+ ulId).prepend(li);
    var temp=  $("#tab-1 #_show"+pid).detach();
	temp.insertBefore("#tab-1 .odds-content");
	$("#tab-1 .showme"+pid).addClass('toggleMyLeague_icn');
	$("#tab-6 .showme"+pid).addClass('toggleMyLeague_icn');
    }
}


var  MyFootballGame = [];
function pushLeague(current)
{
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
	myfavId =  'sidebarfav'+pid;
    var	li = '';

   var object = {};


	ulId = "#my-teams-list";

	if($(current).hasClass('toggleMyLeague_icn')){
		$(current).removeClass('toggleMyLeague_icn');
        add = false;
        $("#"+myfavId).remove();
        $("#tab-1 .pushLeague_in"+pid).removeClass('mypushed').insertAfter("#tab-1 .mypushed:last");
		//return false;
	}else{
	      li += '<li id="'+myfavId+'" class="last myTeamInfo"><span class=\"flag flag-'+flag+'\"></span><a title=\"'+country+': '+tsName+'\" href=\"'+link+'\">'+tsName+'</a><span class=\"toggleMyLeague active\" onclick=\"removeLi('+pid+')\"></span></li>';
        object = {'flag':flag,'country':country,'tsid':tsid,'tsName':tsName,'pid':pid,'countrySlug':countrySlug,'link':link};

       add = true;
		$(current).addClass('toggleMyLeague_icn');
        	$("#tab-1 .pushLeague_in"+pid).insertBefore("#tab-1 .LeaguePushID_in:eq(0)").addClass("mypushed");

	}
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
		
		$(window).load(function(){
  $('#menu .active').focus();
});
		
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
			$("#tab-6 #parent_"+pid).prop('checked', true);
	   	if(!$("#parent_show"+pid).hasClass('display_show')){
				$("#parent_show"+pid).removeClass('display_none').addClass('display_show');

			}
			$(".child_"+attr2).prop('checked', true);
			$("#tab-6").find(".childRwckHide_"+attr2).removeClass("display_none").addClass("display_tbl_row");
            ///this code is used for adding the events in the leauge


}
/* function mygames(id)
{
	if()
	{
		
	}
    var MyFootballGame =[];
	val = id.split(',');

	first = val[0];
	second = val[1];
    	pid = second;
	attr = first.split('_');	
	if(attr[0] == "parent")
	{
		attr1 = attr[0];
		attr2 = attr[1];
	}
	else
	{
	  attr1 = attr[0];
	  attr2 = attr[1];	
	}
	url = "<?php echo base_url() .'login/my_leagues' ?>"
	 
		$.ajax({
			url:url,
			method:"POST",
			dataType :"html",
			data:{sportFK:'<?php echo $sportFK; ?>',events_fk:attr2},
			
			success:function(res){
				
			}
			
		});
	
} */
function mygames(id)
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
			/* for table show
			if(!$("#parent_show"+pid).hasClass('display_none')){
				$("#parent_show"+pid).removeClass('display_none');
				$("#parent_show"+pid).addClass('display_show');
			}*/
			if(!$("#parent_show"+pid).hasClass('display_show')){
				$("#parent_show"+pid).removeClass('display_none').addClass('display_show');
			  //	$("#parent_show"+pid);
			}
			$("#tab-6").find(".child_"+attr2).prop('checked', true);
			$("#tab-6").find(".childRwckHide_"+attr2).removeClass("display_none").addClass("display_tbl_row");
            ///this code is used for adding the events in the leauge
                 var totalCounter = 0;
                // $.each(myfGames,function(e,result){   console.log(result); if(result[0] == attr1){totalCounter = totalCounter+1;}        });
            	//console.log(totalCounter)

                 ///this code is used for checking if that already exist or not
                 if(totalCounter==0){
                 	myfGames.push(val);
		        	MyFootballGame1 = JSON.stringify(myfGames) ;
		        	localStorage.setItem("<?=$game?>MYGames",MyFootballGame1);
                 }

		  //	$("#tab-6").find(".childRwckHide_"+attr2);
		}else{
			if($(".parent_"+pid).filter(":checked").length > 1){
				/*do nothing*/
               //   var	add = false;
				$("#tab-6").find(".childRwckHide_"+attr2).addClass("display_none").removeClass("display_tbl_row").prop('checked', false);
			  ///	$("#tab-6").find(".childRwckHide_"+attr2);
			   //	$("#tab-6").find(".child_"+attr2);
			}else{
				$("#parent_"+pid).prop('checked', false);
				$("#parent_show"+pid).addClass('display_none').removeClass('display_show');
			   //	$("#parent_show"+pid);
              //  var	add = true;
				$("#tab-6").find(".parentRwckShow"+pid).addClass("display_none").removeClass("display_tbl_row");
			   //	$("#tab-6").find(".childRwckHide_"+attr2).removeClass("display_tbl_row");
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

}

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
	var total_counter=	$(".display_show").length;
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
  function validateform() {
	event.preventDefault();
        var validator = $("#registrationForm").validate({
            rules: {
                txt_name: "required",
                txt_email: "required",
                txt_password: "required",
                txt_conf_password: {
                    equalTo: "#txt_password"
                }
            },
            messages: {
                txt_name: " Enter name",
                txt_email: " Enter email",
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
			$("#registrationForm").submit();
            //alert('Sucess');
        }
    }
  </script>


<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.css" media="screen" />
	
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" media="screen" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	