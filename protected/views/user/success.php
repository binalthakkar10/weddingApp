<div class="thanx-signup">
        <div class="middle-thanx">
            <div class="logo-tx">
	            <a href="#"><img class="" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/logo.png" /></a>
            </div>
             <div class="thanxtxt">
	            <p style="color: #567E3A;font-weight: bold;">Your email has been successfully verified.</p>
            </div>   
            <div class="btnthanx">
	            <a href="#" class="btnLogin">Continue to Login</a>
            </div>      
	        <div class="clearfix"></div>
        </div>	
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