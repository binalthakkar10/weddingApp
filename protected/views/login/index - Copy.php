
  <!-- Start of Crew Login -->
   <div class="contant" id="crewLogin">
            <div class="clear"></div>
            <div class="formdiv">
            	
            	<form id="frmCrewLogin" method="post">
            		 <center><div id="loader"></div></center>	        	
	        <div class="alert" id="msg" style="display:none;">
				<span id="msgData"></span>	
			</div> 
                	<input type="hidden" name="type" id="type" value="crew" />
                	<ul>
                    	<li><input type="text" class="txt-bx bx" placeholder="Email" title="Email" id="txtEmailCrew" name="txtEmailCrew" /></li>
                    	<li><input type="password" class="txt-bx bx1" placeholder="Password" title="Password" id="txtPasswordCrew" name="txtPasswordCrew"/></li>
                    	
                        <li><label class="lbl ff-left"><input type="checkbox" class="ch-bx" id="chkRememberCrew">Remember me</label></li>
                        <li><input type="submit" id="btnCrewLogin" value="Log In" class="read-but cntct-btn" /></li>
                        <li><input type="submit" id="btnfbLogin" name="btnfbLogin" value="Facebook Log-in" class="read-but cntct-btn" /></li>
                        <li><label class="lbl"><a href="javascript:;" id="btnCrewFpPwd">Forgot Password?</a></label></li>
                    </ul>
               		<div class="clear"></div>
                </form>
      
                
            </div>			
        </div>
        
<!-- End of Crew Login -->        
 <!--Crew forgot Password -->       
<div class="contant" id="crewForgotPwd" style="display:none;">
			<h2>Forgot Password</h2>
            <div class="clear"></div>
            <div class="formdiv">
            	<form name="frmCrewForgotPwd" id="frmCrewForgotPwd" method="post" enctype="application/x-www-form-urlencoded">
            			 <center><div id="loader"></div></center>	        	
	        <div class="alert" id="msgCrewForgot" style="display:none;">
				<span id="msgCrewForgotData"></span>	
			</div> 
                	<input type="hidden" name="type" id="type" value="crew" />
                	<ul>
                    	<li><input type="text" class="txt-bx bx" value="" placeholder="Email" name="txtCrewEmail"  id="txtCrewEmail"/></li>
                    	
                        <li><input type="submit" name="btnCrewForgotPwd" id="btnCrewForgotPwd" value="Send" class="read-but cntct-btn" /></li>
                     
                    </ul>
               		<div class="clear"></div>
                </form>
      	</div>			
</div>  
<!--End Crew forgot Password -->          
     
<script type="text/javascript">
$(document).ready(function(){
	
$("#crew").on("click",function(){
	$("#Login").hide();
	$("#crewLogin").show();
	$("#employerLogin").hide();
	$("#ForgotPwd").hide();
	$("#crewForgotPwd").hide();
});
$("#employer").on("click",function(){
	$("#Login").hide();
	$("#employerLogin").show();
	$("#crewLogin").hide();
	$("#ForgotPwd").hide();
	$("#crewForgotPwd").hide();
});	

//show crew forgot password form	
$("#btnCrewFpPwd").on("click",function(){
	$("#ForgotPwd").hide();
	$("#crewForgotPwd").show();
	$("#Login").hide();
	$("#employerLogin").hide();
	$("#crewLogin").hide();
});
//show employer forgot password form
$("#btnEmpFpPwd").on("click",function(){
	$("#ForgotPwd").show();
	$("#crewForgotPwd").hide();
	$("#Login").hide();
	$("#employerLogin").hide();
	$("#crewLogin").hide();
});	
	
	
});
	
</script>
        
<script type='text/javascript'>
var std_height = jQuery('header').height();
var ft_height = jQuery('footer').height();
jQuery(window).load(function () {
	jQuery('.contant').css({
		'height': (($(window).height())) - parseInt(std_height) - parseInt(ft_height) - parseInt(100) + 'px'
		
	});
});
jQuery(window).resize(function () {
	jQuery('.contant').css({
		'height': (($(window).height())) - parseInt(std_height) - parseInt(ft_height) - parseInt(100) + 'px'
		
	});
});
</script>
<script src="<?php echo Yii::app()->getBaseUrl(true).'/site-js/jquery.mCustomScrollbar.concat.min.js'; ?>"></script>
<script>
	$(document).ready(function($){
		$(window).load(function(){ 
			$(".contant").mCustomScrollbar({
				scrollButtons:{  
					enable:true
				}
			});
		});
	});		
	
</script>
 <!-- CLient Side Crew Login Validation -->
<script type="text/javascript">     
  
$(document).ready(function(){
	
	
  document.title = ".:: Yacht Relief Crew | Login ::.";
	
		
	/*$("#frmCrewLogin").tooltip({
		show: false,
		hide: false
	});*/  
	
 
	$("#frmCrewLogin").validate({ 
		
			onfocusout: false,
		    invalidHandler: function(form, validator) {
		        var errors = validator.numberOfInvalids();
		       if (errors) {                    
		            validator.errorList[0].element.focus();
		          }
		    }, 
			ignore: [],
			debug: false,
			rules: {
				txtEmailCrew:{
					required: true,	
					email: true,
				},
				txtPasswordCrew:{
					required: true,
					},
				},
			messages: {	
				txtEmailCrew:{
							required:"Please enter Email",	
							email:"Please enter valid email",					
							
				},	
				txtPasswordCrew:{
							required:"Please enter password"
							
				},
				
			},
							
     });/*End Form validation*/
		
$("#chkRememberCrew").on("click",function(event){
	if($(this).checked)
	{
		$(this).val(1);
	}else
	{
		$(this).val("");
	}
});		

$("#btnCrewLogin").on("click",function(event){
	event.preventDefault();
	if($("#frmCrewLogin").valid()){
		
		var dataString =$("#frmCrewLogin").serialize()+"&action=login";
		
 		$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true); ?>/Login/checkLogin",
					cache:false,
					data:dataString,
					beforeSend: function(data){
						
						$('#loader').html('<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/loading.star.gif"/>');
					},
					success: function(data)
					{
						
						$('#loader').html('');
						if(data == 1)
						{
							
							window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/Crew/Dashboard";		
						}
						else
						{
							$("#msg").show();
							$("#msg").removeClass("alert-success");
							$("#msg").addClass("alert-danger");
							$("#msgData").html("Incorrect email or password");
		
						}	
						
					}
			});	
		}
	});
	


});
</script>  
<!-- CLient Side Employer Login Validation -->
<script type="text/javascript">        
$(document).ready(function(){
	
	
$("#chkRemember").on("click",function(event){
	if($(this).checked)
	{
		$(this).val(1);
	}else
	{
		$(this).val("");
	}
});		

$("#btnfbLogin").on("click",function(event){
event.preventDefault();	
 window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/Login/Facebook";		
});
});
</script>  


<!-- CLient Side Crew Forgot Password -->
<script type="text/javascript">        
$(document).ready(function(){	
	$("#frmCrewForgotPwd").tooltip({
		show: false,
		hide: false
	});  
	$("#frmCrewForgotPwd").validate({ 
			onfocusout: false,
		    invalidHandler: function(form, validator) {
		        var errors = validator.numberOfInvalids();
		        if (errors) {                    
		            validator.errorList[0].element.focus();
		        }
		    }, 
			ignore: [],
			debug: false,
			rules: {
				txtCrewEmail:{
					required: true,	
					email: true,
					remote : {
					            url:"<?php echo Yii::app()->getBaseUrl(true);?>/Crew/EmailCheck",
					            async: true,
					            type: "POST",
					           
					     }
				},
				},
			messages: {	
				txtCrewEmail:{
							required:"Please enter Email",	
							email:"Please enter valid email",		
							remote:' Please enter the correct email address'			
							
				},					
			},
							
     });/*End Form validation*/
$("#btnCrewForgotPwd").on("click",function(event){
	document.title = ".:: Yacht Relief Crew | Forgot Password ::.";
	event.preventDefault();
	if($("#frmCrewForgotPwd").valid()){
		
		var dataString =$("#frmCrewForgotPwd").serialize()+"&action=forgotpwd";
 		$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true); ?>/Login/ForgotPassword",
					cache:false,
					data:dataString,
						beforeSend: function(data){
						
						$('#loader').html('<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/loading.star.gif"/>');
					},
					success: function(data)
					{
						
						$('#loader').html('');
						if(data == 1)
						{
							$("#msgCrewForgot").show();
							$("#msgCrewForgot").addClass("alert-success");
							$("#msgCrewForgot").removeClass("alert-danger");
							$("#msgCrewForgotData").html("An email has been sent to you for your new password");	
							$('#msgCrewForgotData').delay(10000).fadeOut("slow",function(){
								window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/Login/";	
								});	
						}
						else
						{
							$("#msgCrewForgot").show();
							$("#msgCrewForgot").removeClass("alert-success");
							$("#msgCrewForgot").addClass("alert-danger");
							$("#msgCrewForgotData").html("Incorrect E-mail address or please verify your email process");
		
						}	
						
					}
			});	
		}
	});
	


});
</script>  