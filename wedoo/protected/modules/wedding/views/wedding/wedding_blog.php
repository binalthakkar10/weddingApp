<style>
.fixed { position:fixed; top:50%; right:0; background:red; color:#fff; padding:6px; z-index:9999;}
</style>

<!--main -->
 <div id="st-container" class="st-container main animsition" data-animsition-in="fadeIn" data-animsition-out="fadeOut">	
    <nav class="st-menu st-effect-12" id="menu-12">
        <a class="menu-logo" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/logo-w.png"></a>
        <ul>
            <li><a class="icon icon-data" href="#">Home</a></li>
            <li><a class="icon icon-location" href="#">About</a></li>
            <li><a class="icon icon-location" href="#">Services</a></li>
            <li><a class="icon icon-study" href="#">Products</a></li>
            <li><a class="icon icon-photo" href="#">Career</a></li>
            <li><a class="icon icon-wallet" href="#">Contact Us</a></li>
        </ul>
    </nav>
	<!--st-pusher -->
    <div class="st-pusher">
    	<!--st-content -->
        <div class="st-content"><!-- this is the wrapper for the content -->
        	<!--st-content-inner -->
            <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
        
                <!--banner -->
                <section class="banner blog-banner story" data-speed="4" data-type="background">    	
                	<div class="banner-image"></div>
                    <div id="st-trigger-effects" class="menu">
                        <button data-effect="st-effect-12"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/menu.png"></button>
                    </div>
        
                    <!--header -->
                    <div class="blog-middle-slider-section">
                        <img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/Features.png" />
                    </div>
                    <!--header -->
                </section>
                <!--banner -->
               
                <div class="clearfix"></div>
               	<!--row -->
                <div class="row">
                    <!--blog-main -->
                    <div class="blog-main"> 
                        <!--container -->
                        <div class="container">
                            <!-- blog-upper-text-->
                            <div class="blog-upper-text">
                                <span class="blog-head-text">How to Add Geeky Touches to Your Wedding</span>
                                <p class="blog-sub-text">Whether you and your significant other have binged watched the extended
                                versions of LOTR, or can’t get enough of the wizarding world of HP, are
                                connected by an XBOX controller, or secretly hope for a zombie apocalypse… you can give your geeky sides little moments at your wedding. Or dress your groomsmen as stormtroopers, whatever lights your saber.</p>
                            </div>
                            <!-- blog-upper-text-->
                            <!--trending -->
                            <div class="trending">
	                            <img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/trending.png" class="trendingimg"/>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="trendimg"><a href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/bridemaid.jpg"></a></div>
                                    <div class="overlay-box">The 6 Types of Bridesmaids<br> (know any?)</div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="trendimg"><a href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/bride-white.jpg"></a></div>
                                    <div class="overlay-box">13 Things All Brides Will Eventually Discover</div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="trendimg"><a href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/candels.jpg"></a></div>
                                    <div class="overlay-box">DIY Centerpiece – Water Balloon Luminaries</div>
                                </div>
                                <div class="clearfix"></div>
                                <a class="get-started-btn" href="#">Get Started</a>
                            </div>  
                            <!-- trending-->
                            
                            <!--video-main -->	
                            <section class="video-blog">    	
                                <img class="video" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/blogvideo.png" />
                                <img class="dot-line" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/dottedline.png" />
                            </section>
                            <!--video-main -->
                            <!--blog-bottom-main -->	
                            <div class="blog-bottom-main">
                            	<!--row -->
                                <div class="row">
                                    <!-- invitations -->
                                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                                    	<!--invitation-block -->
                                        <div class="invitation-block">
                                            <h2 class="invitation-heading">Invitations/Save the Dates</h2>
                                            <img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/owlgream.png" />
                                            <p class="invitation-text">Get your geek on with clever wedding invitations or save the dates. Your guests will appreciate the personality..and it gives them a heads up that two geeks have fallen in love and you should be on the look out for touches of nerdiness at their wedding.</p>
                                            <a class="read_more_blog" href="#">Read More...</a>
                                        </div>
                                        <!--invitation-block -->
                                        <!--invitation-block -->
                                        <div class="invitation-block">
                                            <h2 class="invitation-heading">16 Stages of Wedding Planning Explained by Adorable Dogs</h2>
                                            <img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/doggy.png" />
                                            <p class="invitation-text">The blogs, the boards, the bridesmaids…planning a wedding is pretty all-consuming, but also pretty ah-may-zing. And, what better way to spend a piece of it looking at dogs who are going through similar emotions? Here are the stages of planning your dream wedding as explained by four-legged goofballs. You’re welcome, brides.</p>
                                            <a class="read_more_blog" href="#">Read More...</a>
                                        </div>
                                        <!--invitation-block -->
                                    
                                    </div>
                                    <!-- invitations -->
                                    
                                    <!-- wedding goodness -->
                                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    
                                        <h2 class="goodness-heading">Wedding Goodness</h2>
										<div class="clearfix"></div>	
                                        <div class="goodness-block">
                                            <img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/wedding1.jpg" />
                                            <p class="goodness-text">How to Add Geeky Touches to Your Wedding.</p>
                                            <a href="#" class="read_more_goodness">Read More</a>
                                        </div>

                                        <div class="goodness-block">
                                            <img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/wedding2.jpg" />
                                            <p class="goodness-text">16 Stages of Wedding Planning explained by Adorable Dogs</p>
                                            <a href="#" class="read_more_goodness">Read More</a>
                                        </div>

                                        <div class="goodness-block">
                                            <img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/wedding3.jpg" />
                                            <p class="goodness-text">22 Signs You Must <br>Have At Your Wedding</p>
                                            <a href="#" class="read_more_goodness">Read More</a>
                                        </div>
                                    
                                    </div>
                                    <!-- wedding goodness -->
                                </div>
                                <!--row -->
                            </div>
                            <!--blog-bottom-main -->	
                        </div>
                        <!--container -->
                        <div class="clearfix"></div>
                        <!--footer -->	
                            <a class="footer-blog" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/footer-down-icon.png" class="footer-down-icon"/></a>
                        <!--footer -->

                    </div>
                    <!--blog-main -->
                </div>
                <!--row -->
                
                
            </div>
            <!--st-content-inner -->
        </div>
        <!--st-content -->
    </div>
    <!--st-pusher -->


 </div> 
 <!--main -->

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
