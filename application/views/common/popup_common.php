<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

	  <!--script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>fancy-box/jquery.fancybox-1.3.4.css" media="screen" /-->

<script>
	jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
         $(document).ready(function() {
	/* This function is used to set height of chart according to the players */
	var numItems = $('div.field-wrap .players-row').length;
	var fixedHeight = 708;
	var minHeight = 708/numItems;
		$('div.field-wrap .players-row').each(function( index) {
			$(this).css("height",minHeight);
		});  
	/* FUNCTION END	 */
	
            $(".ifmu li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         $(".ifmu2 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content2").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
           $(".ifmu3 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content3").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         $(".ifmu4 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content4").not(tab).css("display", "none");
         
                $(tab).fadeIn();
         
            }); 
         
         
         
         $(".ifmu5 li a").click(function(event) {
         
                event.preventDefault();
         
                $(this).parent().addClass("selected");
         
                $(this).parent().siblings().removeClass("selected");
         
                var tab = $(this).attr("href");
         
                $(".tab-content5").not(tab).css("display", "none");
         
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
		 
		 




if(isMobile()){
	$('.side_mobile_bx').click(function(){
		$(this).next().slideToggle();
	}); 
	$('.selected-mob').click(function(){
		$(this).next().slideToggle();
	}) ;
	$(".ifmenu li a").click(function() {
		var value = $(this).text();
		var input = $('.selected-mob');
		input.text(value);
		return false;
	});
}
		
		
        $(document).ready(function () { 
		   $("#closeIframe").click(function(){
			if(isMobile()){
			 window.open("<?=$url?>", '_blank');
			}else{ 
			 window.parent.openLeague("<?=$url?>"); 
			}
		   });
		}); 
		function isMobile()
		{
		   $.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
		   return $.browser.device;
		} 
        function openTeams(url)
		{
			return;
			if(isMobile()){
			 window.open(url, '_blank');
			}else{ 
			 window.parent.openLeague(url); 
			}
		}
 
      </script>