<?php
$appID='341270709343143';
$appSecret='2409b1178117ff8183c5bc83e442b568';
$clientid	=	'184063824516-71gkj2rlps362875khh4b1d9putvvmev.apps.googleusercontent.com';
$clientsecret	=	'vpt2aqUhnOhcPqcAr1XKeQPY';
$redirecturi	=	'http://www.letsnurture.co.uk/demo/wedoo/invite/invite_google'; //Add your redirect URl	
$maxresults	=	 50; 
?>
<div class="middle" style="padding-left:403px;">
	<h3 style="padding-left:100px;">Click icons to import contacts</h3>
	<div class="social_icons">
		<span>
			<a href="javascript:;"><img src="<?php echo Yii::app()->getBaseUrl();?>/img/pencil-128.png" alt="" /></a>
			<a href="javascript:;" id="facebook" ><img src="<?php echo Yii::app()->getBaseUrl();?>/img/facebook_circle_color-128.png" alt="" /></a>
			<a href="javascript:;" onclick="yahooinvitefriend();"  ><img src="<?php echo Yii::app()->getBaseUrl();?>/img/yahoo-128.png" alt="" /></a>
			<a href="https://accounts.google.com/o/oauth2/auth?client_id=<?php print $clientid; ?>&redirect_uri=<?php print $redirecturi; ?>&scope=https://www.google.com/m8/feeds/&response_type=code" ><img src="<?php echo Yii::app()->getBaseUrl();?>/img/google_circle_color-128.png" alt="" /></a>
		</span>
	</div>
</div>
<script>
function yahooinvitefriend(){
	window.location.href = "<?php echo CController::createUrl('/invite/invite_yahoo') ?>";
}
function googleinvitefriend(){
	window.location.href = "<?php echo CController::createUrl('/invite/invite_google') ?>";
}
</script>
<script type="text/javascript">
  window.fbAsyncInit = function() {
     FB.init({ 
       appId:'<?php echo $appID; ?>', cookie:true, 
       status:true, xfbml:true,oauth : true 
     });
   };
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
 $('#facebook').click(function(e) {
    FB.login(function(response) {
	  if(response.authResponse) {
		  parent.location ='<?php echo CController::createURL('invite/facebook_invite') ?>';
	  }
 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
});
   </script>