<?php
//---- Instagram----
require 'src/Instagram.php';
use MetzWeb\Instagram\Instagram;
// initialize class
$instagram = new Instagram(array(
	  		'apiKey'      => 'ddcbda4ee59f4ecbbf7fbe6a3a317062',
	  		'apiSecret'   => '34c79769fe8a4c71832f52c7919d464a',
	  		'apiCallback' => Yii::app()->getBaseUrl(true).'/Login/InstagramSuccess' // must point to success.php
));
// create login URL
$loginUrl = $instagram->getLoginUrl();
session_start();	
$curpage = Yii::app()->getController()->getAction()->controller->id;
$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
?>
<div id="st-container" class="st-container main animsition" data-animsition-in="fadeIn" data-animsition-out="fadeOut">	
    <nav class="st-menu st-effect-12" id="menu-12">
        <a class="menu-logo" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/logo-w.png"></a>
        <ul>
            <li><a class="icon icon-data" href="#">Home</a></li>
            <li><a class="icon icon-location" href="#">About</a></li>
            <li><a class="icon icon-location" href="#">Services</a></li>
            <li><a class="icon icon-study" href="#">Products</a></li>
            <li><a class="icon icon-photo" href="#">Career</a></li>
            <li><a class="icon icon-wallet" href="#" id="contact">Contact Us</a></li>
        </ul>
    </nav>
	<!--st-pusher -->
    <div class="st-pusher">
    	<!--st-content -->
        <div class="st-content"><!-- this is the wrapper for the content -->
        	<!--st-content-inner -->
            <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
        
                <!--banner -->
                <section class="banner story" data-speed="4" data-type="background">    	
                	<div class="banner-image"></div>
                    <div id="st-trigger-effects" class="menu">
                        <button data-effect="st-effect-12"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/menu.png"></button>
                    </div>
        
                    <!--header -->
                    <header class="active">
                            
                            <div class="logo">
                                <a href="index.html"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/logo.png" /></a>            
                            </div>
                            
                            <span class="header-tag">Lorem ipsum dolor sit amet,<br>
                            do dolore magna aliqua.</span>
        
                            <span class="sub-head">The photo-sharing app <br>
                            made specifically for your <span>wedding.</span></span>
                            <?php if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ ?>
                            	<a href="<?php echo Yii::app()->getBaseUrl(true)?>/wedding/Wedding/Wedding_Signup" class="dark-but">I'M A BRIDE/GROOM</a>
                            <?php }else{?>
                            	<a href="#" class="dark-but cust-pop-trigger" data-cuspop="register">I'M A BRIDE/GROOM</a>
                            <?php } ?>
							 <?php if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ ?>
                             <a href="<?php echo Yii::app()->getBaseUrl(true)?>/wedding/Wedding/Wedding_Signup" class="dark-but" data-cuspop="register"> I'M A GUEST</a>
							 <?php } else { ?>
							     <a href="#" class="dark-but cust-pop-trigger" data-cuspop="register"> I'M A GUEST</a>
							 <?php } ?>
                              <span class="member">Already a Member? 
                              
                             	<?php if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ ?>
                             		<a class="login cust-pop-trigger" id="Logout" href="#">LOGOUT</a>
                             		   <br>
									<a class="login cust-pop-trigger choosewedding"  href="#">Choose Wedding</a>
                             	<?php }else{?>
                             		<a class="login cust-pop-trigger" data-cuspop="login" href="#">LOGIN</a>	
                             	<?php }  ?> 
                             </span>
                             <a href="#" class="app-store"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/app-store-1.png" /></a> 
                             <a href="#" class="app-store"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/app-store-2.png" /></a> 
                            
                    </header>
                    <!--header -->
                </section>
<!-- Login Modal -->
<!--Custom Registration PopUp -->
                    <div id="register" class="custom-pop">
                    	<div class="overlay"></div>
                        <section class="custom-pop-inner">
                        	<a id="pop-close" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/pop-login-clos.png"></a>
                            <div class="login-head"><span>Connect With</span></div>
                            <div class="clearfix"></div>
							<ul class="social">
                            	<li><a href="javascript:;" class="btnfbLogin" ><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/connect-s1.png"></a></li>
                            	<li><a href="javascript:;" class="btnTwitterLogin"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/connect-s4.png"></a></li>
                            	<li><a href="javascript:;" id="btnInstagram" onclick="location.href='<?php echo $loginUrl; ?>';"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/connect-s3.png"></a></li>
                            </ul>
                            <div class="clearfix"></div>
                            
                            <div class="login-head"><span>or signup with email</span></div>
                            <form id="frmRegister" method="post">
                            	<ul>
                                	<li><input type="text" id="textFullname" name="textFullname" placeholder="Full Name" class="login-txbx" /> </li>
                                	<li><input type="text" id="textEmail" name="textEmail" placeholder="Email" class="login-txbx" /></li>
                                	<li><input type="password" id="txtRegisterPassword" name="txtRegisterPassword" placeholder="Create Password" class="login-txbx" /> </li>
                                	<li><input type="password" id="txtRegisterConfirmPassword" name="txtRegisterConfirmPassword" placeholder="Confirm Password" class="login-txbx" /></li>
                                	<li>
                                    	<input type="button" id="btnSubmit" value="Continue" class="login-txbt" />
                                    </li>
                                </ul>
                            </form>
                        </section>
                    </div>
<!--Custom Registration PopUp -->
<!-- Custom Login PopUp -->
 					<div id="login" class="custom-pop">
                    	<div class="overlay"></div>
                        
                        <section class="custom-pop-inner">
                        	<a id="pop-close" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/pop-login-clos.png"></a>

                            <div class="login-head"><span>Connect With</span></div>

                        	<!--<a class="login-with-fb" href="#"><img src="images/login-fb.png">Connect With Facebook</a>	 -->
                            <div class="clearfix"></div>
							<ul class="social">
                            	<li><a href="javascript:;" class="btnfbLogin"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/connect-s1.png"></a></li>
                            	<li><a href="javascript:;" class="btnTwitterLogin"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/connect-s4.png"></a></li>
                            	<li><a href="javascript:;" id="btnInstagram" onclick="location.href='<?php echo $loginUrl; ?>';"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/connect-s3.png"></a></li>
                            </ul>
                            <div class="clearfix"></div>

                            
                            <div class="login-head"><span>or login with email</span></div>
                             <form id="frmLogin" method="post">
                            	<ul>
                                	<li><input type="text" id="txtEmail" name="txtEmail" placeholder="Email" class="login-txbx" /> </li>
                                	<li><input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="login-txbx" /></li>
                                	<li>
                                        <a class="forgot" href="#">Forgot Password?</a>
                                        <div class="clearfix"></div>
                                    	<input type="button" id="btnLogin" value="Login" placeholder="" class="login-txbt" />
                                    </li>
                                </ul>
                            </form>
                        </section>
                    </div>
<!-- End Custom Code -->
<!--container-fluid -->  
<script type="text/javascript">
$(document).ready(function(){
jQuery.validator.addMethod("lettersonly", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z_ ]+$/);
},"Please enter only alphabetic value.");
//----- Facebook------	
$(".btnfbLogin").on("click",function(event){
event.preventDefault();	
 window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/Login/Facebook";		
});
//--- Twitter -----
$(".btnTwitterLogin").on("click",function(event){
event.preventDefault();	
 window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/Login/Twitter";
 	$(".login_without_media").hide();
		$(".login_media").hide();
				
});
$("#frmLogin").validate({ 
			ignore: [],
			debug: false,
			rules: {
				txtEmail:{
					required: true,	
					email: true,
				},
				txtPassword:{
					required: true,
					},
				},
			messages: {	
				txtEmail:{
					required:"Please enter Email",	
					email:"Please enter valid email",												
				},	
				txtPassword:{
					required:"Please enter password"
				},
				
			},
							
});/*End Form validation*/		
$("#chkRemember").on("click",function(event){
	if($(this).checked)
	{
		$(this).val(1);
	}else
	{
		$(this).val("");
	}
});	

$(".login-txbx").keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		//alert('You pressed a "enter" key in textbox');
		$("#btnLogin").trigger("click");
	}
});		

$("#btnLogin").on("click",function(event){
	event.preventDefault();
	if($("#frmLogin").valid()){
		
		var dataString =$("#frmLogin").serialize()+"&action=login";
 		$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true); ?>/Login/checkLogin",
					cache:false,
					data:dataString,
					beforeSend: function(data){
						$("div.loading_image").css("display","block");
					},
					success: function(data){
						$("div.loading_image").css("display","none");
						//alert(data);
						if(data == 1){
							//alert("assggag");
							window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/";		
						}
						if (data==2)
						{
						   window.location.href = "<?php echo Yii::app()->getBaseUrl() ?>/wedding/Wedding/Wedding_Signup";
						}
						if(data==0){
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to Login. Try again later..!!');
						}	
						
					}
			});	
		}
	});	
//Logout from site
$("body").on("click","#Logout",function(event){	
	event.preventDefault();
	
	$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true);?>/Login/Logout",
					cache:false,
					data:'action=Logout',
					success: function(data)
					{	
						
						window.location.href="<?php echo Yii::app()->getBaseUrl(true);?>/index.php/index";
					}
			});		
	
	});	
//------ Registration----
$("#frmRegister").validate({
			ignore: [],
			debug: false,
			rules: {
				textFullname:{
					required: true,
					lettersonly: true,
					minlength:3,
					maxlength:20
				},
				textEmail:{
					required: true,
					email: true,
					remote : {
					            url:"<?php echo Yii::app()->getBaseUrl(true);?>/User/EmailExist",
					            async: false,
					            type: "POST",
					         }
				},
				txtRegisterPassword:{
					required: true,
					rangelength:[8,15]
					
				},
				txtRegisterConfirmPassword: {
                        required: true,
					rangelength:[8,15],
                        equalTo: "#txtRegisterPassword"
        	},
			},
			errorPlacement: function (error, element) {
				if(element.attr('id') == 'textFullname') {
					error.insertAfter($("#textFullname"));
				}
				if(element.attr('id') == 'textEmail') {
					error.insertAfter($("#textEmail"));
				}
				if(element.attr('id') == 'txtRegisterPassword') {
					error.insertAfter($("#txtRegisterPassword"));
				}
				if(element.attr('id') == 'txtRegisterConfirmPassword') {
					error.insertAfter($("#txtRegisterConfirmPassword"));
				}
			},
			messages:{
				textFullname:{
					required: ' Please enter fullname',
					lettersonly: 'Please enter only alphabetic value',
					minlength:'Please enter minimum 3 characters',
				},
				textEmail:{
					required: ' Please enter email',
					email: ' Please enter valid email Id',
					remote:' Email already exists'
				
				},
				txtRegisterPassword:{
					required: ' Please enter password',
					rangelength:'Password length should be between {8} to {15} characters',
				},
				txtRegisterConfirmPassword:{
					required: ' Please enter Confirm password',
					rangelength:'Confirm password length should be between {8} to {15} characters',
					equalTo:'The password and confirmation password do not match.',
				},
				
			}
		});
		
$("#btnSubmit").on("click",function(event){
	event.preventDefault();
	if($("#frmRegister").valid())
	{
		 
        var dataString = $("#frmRegister").serialize();
		$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/User/Registration',
			data: dataString,
			cache:false,
			async:true,
			beforeSend: function(data){
				$("div.loader").css("display","block");
			},
			success: function(data)
                        {
                        	$("div.loader").css("display","none");
                             if(data == 1){
                             	toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.success('Successfully Register.Please check your Email for your Account Verification.!!');
								setTimeout(function(){window.location.href = "<?php echo Yii::app()->getBaseUrl() ?>/";},3000);
                             }else{	toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to register. Try again later..!!');
								}
                             } 
                       });
                    }    
                });
	          
	});	
	
//---- SCROLL TO CONTACT - Purvesh Patel 26-3-2015 ----
	
	$("#contact").click(function(){
	
		$('html').css({ 'overflow' : '' });
		$('html').css({ 'overflow-y' : 'visible' });
		$('html').css({ 'overflow-x' : 'hidden' });
		$('html').css({ 'height' : 'inherit' });
		
		$("html, body").animate({
			scrollTop: $('#contact-footer').offset().top 
		}, 2000);
		
		$('body').css({ 'overflow' : '' });
		//$('body').css({ 'height' : 'inherit' });
		$('body').css({ 'overflow-y' : 'visible' });
		$('body').css({ 'overflow-x' : 'hidden' });
		
		$('#st-container').removeClass('st-menu-open');
		$('#st-container').css({ 'overflow' : '' });
		//$('#st-container').css({ 'height' : 'inherit' });
		$('#st-container').css({ 'overflow-y' : 'visible' });
		$('#st-container').css({ 'overflow-x' : 'hidden' });
	});
	
//---- END SCROLL -------------------------------------
</script>              