  <div class="thanx-signup">
    <!-- middle-thanx-->
        <div class="middle-thanx">
            <!--logo-tx -->
            <div class="logo-tx">
	            <a href="#"><img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/logo.png" /></a>
            </div>
            <!--logo-tx -->
    
            <!-- thanxtxt -->
            <div class="thanxtxt">
	            <p style="color: #cd0000;font-weight: bold;">Sorry your email is not verified.</p>
            </div>      

                
            <!-- social -->   

            <!-- btnthanx-->
            <div class="btnthanx">
	            <a href="#" class="btnLogin">Continue to Sign-up</a>
            </div>      
            <!-- btnthanx --> 

	        <div class="clearfix"></div>
        </div>
        <!-- middle-thanx-->		
    </div>
    <script>
	$(window).on("load resize",function(){
		var winWidth = $(window).width();
		
		if(winWidth >= 1280 && winWidth <= 641){	 	
			$(".thanx-signup").height($(window).height()).css("padding","0");
		}
	});
$('body').on('click','.btnLogin',function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/";	
});	
</script>