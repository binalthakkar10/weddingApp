<?php /*$curpage = Yii::app()->getController()->getAction()->controller->id;
$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
if($curpage=="index/index" || $curpage=="page/TermsConditions" || $curpage=="page/TermsAndConditions")
{*/	 
?>           
                <!--footer -->	
                <section class="footer story" data-speed="8" data-type="background" data-offsetY="750"> 
                    <!--container -->
                    <div class="container">
                        <h1 class="animated" data-revert="bounceOutRight" data-animation="bounceInRight">Contact Us</h1>
                    	<footer id="contact-footer">
                        	<div class="row">
                            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-text-main animated" data-revert="fadeOutLeft" data-animation="fadeInLeft">
                                	<span class="footer-icon"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/footer-icon.png" /></span>
                                    <em class="footer-text">We are always here to help! <br>
									( just ask our <span>app reviews</span> )</em>
                                    
                                </div>
                            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 animated footer-form" data-revert="fadeOutRight" data-animation="fadeInRight">
                                	<form>
                                    	<div class="row">
                                    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" value="" placeholder="Name" class="footer-textbx" /></div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" value="" placeholder="Email" class="footer-textbx" /></div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><textarea placeholder="Message" class="footer-textbx"></textarea></div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><input type="button" value="Send" placeholder="Name" class="footer-textbt" /></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </footer>
                        
                        <div class="copy">
                        	<ul>
                            	<li><a href="#">TERMS OF SERVICE</a></li>
                            	<li>|</li>
                            	<li><a href="#">PRIVACY POLICY</a></li>
                            </ul>
							<span>© 2015 Wedoo Inc.</span>
                        </div>
                    </div>
                    <!--container -->
                </section>
                <!--footer -->
            </div>
            <!--st-content-inner -->
        </div>
        <!--st-content -->
    </div>
    <!--st-pusher -->
 <script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/script.js"></script>
<!--[if lt IE 7 ]>
    <script src="js/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");
<![endif]-->

 
<!--menu js -->
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/classie.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/sidebarEffects.js"></script>
<!--menu js -->

<!-- animsition js -->
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.animsition.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

	  $(".animsition").animsition();
  }); 
</script>
<!-- custom Scroll -->
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.mCustomScrollbar.js"></script>
<script>
	(function($){
		$(window).load(function(){
			
			/* 
			get snap amount programmatically or just set it directly (e.g. "273") 
			in this example, the snap amount is list item's (li) outer-width (width+margins)
			*/
			var amount=Math.max.apply(Math,$("#any-thing-thumb li").map(function(){return $(this).outerWidth(true);}).get());
			
			$("#any-thing-thumb").mCustomScrollbar({
				axis:"x",
				theme:"rounded-dots",
				advanced:{
					autoExpandHorizontalScroll:true
				},
				scrollButtons:{
					enable:true,
					scrollType:"stepped"
				},
				keyboard:{scrollType:"stepped"},
				snapAmount:amount,
				mouseWheel:{scrollAmount:amount, enable:false }
			});
			


		});
		
	})(jQuery);
</script>
<!-- custom Scroll -->
<!--flex slider -->
<script defer src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(window).load(function(){
  $('.flexslider').flexslider({
	animation: "slide",
	start: function(slider){
	  $('body').removeClass('loading');
	}
  });
});

</script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.easing.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.mousewheel.js"></script>
<!--flex slider -->


<script>
$(window).load(function(){
	$(".st-pusher").trigger("click");
});
$(document).ready(function() {
		
	$("#st-trigger-effects button").click(function(){
		//alert ("afafaf");
		$("html, body, .st-container, .st-pusher, .st-content.body").css("height","100%").css("overflow","hidden");	
	});
	$('.st-pusher').click(function() {
	  setTimeout(function() {
		 // Do timeout action...
		$("html, body, .st-container, .st-pusher, .st-content.body").css("height","inherit").css("overflow-y","visible"); 
	  }, 490);
	});
	

});
</script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/custom.js"></script>


<script type='text/javascript' src='<?php echo Yii::app()->getBaseUrl(true)?>/site-js/waypoints.min.js'></script>
<script type='text/javascript' src='<?php echo Yii::app()->getBaseUrl(true)?>/site-js/main.js'></script>
</body>


</html>