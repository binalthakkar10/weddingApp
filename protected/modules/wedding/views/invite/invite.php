<?php
$appID='341270709343143';
$appSecret='2409b1178117ff8183c5bc83e442b568';
$clientid	=	'184063824516-71gkj2rlps362875khh4b1d9putvvmev.apps.googleusercontent.com';
$clientsecret	=	'6fNsryVv9orKXuAi3zS1QQnI';
$redirecturi	=	'http://www.letsnurture.co.uk/demo/wedoo/wedding/invite/Invite_guest'; //Add your redirect URl	
$maxresults	=	 50; 

//session_start();
?>
<!--- invite content--->
                <div id="admin-content">
                	<!--admin-main -->
                	<div class="admin-main">
                    	<!--invite-guest-main -->
						<div class="invite-guest-main">
                        	<!--invite-guest -->
                        	<section class="invite-guest pull-left">
                            	<!--admin-white-head -->
                            	<section class="admin-white-head">
	                                <h1><i class="fa fa-user-plus"></i><span>Invite Guests</span></h1>
	                            </section>
                                <!--admin-white-head -->
                                <!--invite-guset-inner -->
								<?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
                                <div class="invite-guset-inner">
                                	<span class="invite-head">Click to import icons</span>
                                    <ul class="invite-social">
                                    	<li><a href="javascript:;" class="envelope"><i class="fa fa-envelope-o"></i></a></li>
                                    	<li>
                                    	<a class="google-plus" href="https://accounts.google.com/o/oauth2/auth?client_id=<?php print $clientid; ?>&redirect_uri=<?php print $redirecturi; ?>&scope=https://www.google.com/m8/feeds/&response_type=code"><i class="fa fa-google"></i></a></li>
                                    	<li><a href="javascript:" class="btnTwitterLogin" id="twitter" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    	<li><a href="#" id="facebook" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                    
                                    <form class="invite-form" id="form1">
                                    	<div class="invite-add-main">
                                        	<input type="text" value="" id="email" placeholder="Guest’s Email Address" class="invite-email-txbx" />
                                            <button class="add-button button1"><i class="fa fa-plus"></i></button>

                                        <p>Add a comma-separated list of emails</p>
										<p class="message"></p>
                                        
                                        <input type="button" value="Preview Email" class="email-but pull-left">
                                        <input type="button" value="Invite" class="email-but pull-right insert_email">
										<p class="add"></p>
										</div>
                                    </form>
                                    <!---- Fb friends --->
									<div class="allFbFriends">
									</div>
									<!-- End of fbfriends --->
									<div class="allFbFriends1" id="allFbFriends1">
								 </div>
                                </div>
								<?php } elseif(isset($invite) && ($invite==0)) {  ?>
								   <div class="invite-guset-inner">
                                	<span class="invite-head">Click to import CONTACTS</span>
                                    <ul class="invite-social">
									     <li><a href="#" id="facebook" class="facebook"><i class="fa fa-facebook"></i></a></li>
										 <li><a href="javascript:" class="btnTwitterLogin twitter" id="twitter"><i class="fa fa-twitter"></i></a></li>
                                    	<li>
                                    	<a class="google-plus" href="https://accounts.google.com/o/oauth2/auth?client_id=<?php print $clientid; ?>&redirect_uri=<?php print $redirecturi; ?>&scope=https://www.google.com/m8/feeds/&response_type=code"><i class="fa fa-google-plus"></i></a></li>
                                         <li><a href="javascript:;" class="customEmail envelope"><i class="fa fa-envelope-o"></i></a></li>										
                                    </ul>
                                    
                                    <form class="invite-form" id="form1">
                                    	<div class="invite-add-main">
                                        	<input type="text" value="" id="email" placeholder="Guest’s Email Address" class="invite-email-txbx" />
                                            <button class="add-button button1"><i class="fa fa-plus"></i></button>
                                                
									  
                                        
                                        <p>Add a comma-separated list of emails</p>
										<p class="message"></p>
                                        
                                        <input type="button" value="Preview Email" class="email-but pull-left">
                                        <input type="button" value="Invite" class="email-but pull-right insert_email">
										<p class="add"></p>
										</div>
                                    </form>
                                    <!---- Fb friends --->
									<div class="allFbFriends">
									</div>
									<!-- End of fbfriends --->
									<div class="allFbFriends1" id="allFbFriends1">
								 </div>
                                </div>
								<?php } ?>
                                <!--invite-guset-inner -->
                            </section>
                            <!--invite-guest -->
                            <!--guset-list -->
                            <section class="guset-list pull-right">
                            	<!--admin-white-head -->
                            	<section class="admin-white-head">
	                                <h1><i class="fa fa-users"></i><span>Your Guest List</span></h1>
									<span class="count alluser"><?php $result=!empty($total_guest)?$total_guest:0; echo $result; ?></span>
	                            </section>
                            	<!--admin-white-head -->
								<!--invite-list-inner -->		
                                <div class="invite-list-inner">
                                	<!--list-main -->
                                	<div class="list-main">
                                        <!--table -->
                                    	<table class="man">
                                        	<thead>
                                            	<tr>
                                                	<th width="40%"><span class="invite-head">ADMINS</span><span class="circle admin"><?php $result=!empty($admin)?$admin:0; echo $result; ?></span></th>
                                                    <th>Make Admin</th>
                                                    <th><!--Block-->Remove User</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php foreach($data as $key) {  ?>      
                                            	<tr class="<?php echo $key['invite_id'];  ?>">
                                                	<td width="40%">
                                                    	<!--<span class="list-name">Brandon J. Daniels</span>-->
                                                        <a class="list-mail-id" href="#"><?php echo $key['invite_email']; ?><!--BrandonJDaniels@dayrep.com--></a>
                                                    </td>
													<?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
                                                    <td>
                                                        <label class="label_radio <?php if($key['make_admin']=='Yes') { ?> r_on <?php } ?>" for="radio-<?php echo $key['invite_id']; ?>">
                                                        	<i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>" id="radio-<?php echo $key['invite_id']; ?>" <?php if($key['invite_email']!=$_SESSION['email']) { ?> onclick="saveadmin(<?php echo $key['invite_id']; ?>,'<?php echo $key['make_admin']; ?>');" <?php } ?>  value="<?php echo $key['make_admin']; ?>" type="radio" <?php if($key['make_admin']=='Yes') { ?> checked <?php } ?>>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="label_radio" >
	                                                        <i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>"  <?php if($key['invite_email']!=$_SESSION['email']) { ?> onclick="deleteadmin(<?php echo $key['invite_id']; ?>);" <?php } ?> value="<?php echo $key['invite_id']; ?>" type="radio">
                                                        </label>
                                                    </td>
													<?php } elseif(isset($invite) && ($invite==0)) {  ?>
													 <td>
                                                        <label class="label_radio <?php if($key['make_admin']=='Yes') { ?> r_on <?php } ?>" for="radio-<?php echo $key['invite_id']; ?>">
                                                        	<i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>" id="radio-<?php echo $key['invite_id']; ?>" onclick="saveadmin(<?php echo $key['invite_id']; ?>,'<?php echo $key['make_admin']; ?>');"  value="<?php echo $key['make_admin']; ?>" type="radio" <?php if($key['make_admin']=='Yes') { ?> checked <?php } ?>>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="label_radio" >
	                                                        <i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>"   onclick="deleteadmin(<?php echo $key['invite_id']; ?>);" value="<?php echo $key['invite_id']; ?>" type="radio">
                                                        </label>
                                                    </td>
													<?php } ?>
                                                </tr>
												<?php } ?>
                                            	
                                            </tbody>
                                        </table>
                                        <!--table -->
                                        <!--table -->
                                    	<table class="register">
                                        	<thead>
                                            	<tr>
                                                	<th width="40%"><span class="invite-head">Registered Guests</span><span class="circle total1"><?php $result=!empty($total_register)?$total_register:0; echo $result; ?></span></th>
                                                    <th>Make Admin</th>
                                                    <th>Block User</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											       <?php foreach($register as $key) {  ?>      
                                            	<tr class="<?php echo $key['invite_id'];  ?>">
                                                	<td width="40%">
                                                    	<!--<span class="list-name">Brandon J. Daniels</span>-->
                                                        <a class="list-mail-id" href="#"><?php echo $key['invite_email']; ?><!--BrandonJDaniels@dayrep.com--></a>
                                                    </td>
													<?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) {  
													?>
                                                    <td>
                                                        <label class="label_radio <?php if($key['make_admin']=='Yes') { ?> r_on <?php } ?>" for="radio-<?php echo $key['invite_id']; ?>">
                                                        	<i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>" id="radio-<?php echo $key['invite_id']; ?>" <?php if($key['invite_email']!=$_SESSION['email']) { ?> onclick="saveadmin1(<?php echo $key['invite_id']; ?>,'<?php echo $key['make_admin']; ?>');" <?php } ?>  value="<?php echo $key['make_admin']; ?>" type="radio" <?php if($key['make_admin']=='Yes') { ?> checked <?php } ?>>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="label_radio" >
	                                                        <i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>" <?php if($key['invite_email']!=$_SESSION['email']) { ?>  onclick="blockuser(<?php echo $key['invite_id']; ?>,'<?php echo $key['is_block']; ?>');" <?php } ?> value="<?php echo $key['invite_id']; ?>" type="radio">
                                                        </label>
                                                    </td>
													<?php  } elseif(isset($invite) && ($invite==0)) {  ?>
													 <td>
                                                        <label class="label_radio <?php if($key['make_admin']=='Yes') { ?> r_on <?php } ?>" for="radio-<?php echo $key['invite_id']; ?>">
                                                        	<i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>" id="radio-<?php echo $key['invite_id']; ?>" onclick="saveadmin1(<?php echo $key['invite_id']; ?>,'<?php echo $key['make_admin']; ?>');"  value="<?php echo $key['make_admin']; ?>" type="radio" <?php if($key['make_admin']=='Yes') { ?> checked <?php } ?>>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="label_radio" >
	                                                        <i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>"   onclick="blockuser(<?php echo $key['invite_id']; ?>,'<?php echo $key['is_block']; ?>');" value="<?php echo $key['invite_id']; ?>" type="radio">
                                                        </label>
                                                    </td>
													<?php } ?>
                                                </tr>
												<?php } ?>
                                            	
                                            </tbody>
                                        </table>
                                        <!--table -->
                                        <!--table -->
                                    	<table class="block">
                                        	<thead>
                                            	<tr>
                                                	<th width="40%"><span class="invite-head">Blocked User</span><span class="circle block1"><?php $result=!empty($total_blocked)?$total_blocked:0; echo $result; ?></span></th>
                                                    <!--<th>Make Admin</th>-->
                                                    <th>UNBlock User</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											          <?php foreach($blocked as $key) {  ?>      
                                            	<tr class="<?php echo $key['invite_id'];  ?>">
                                                	<td width="40%">
                                                    	<!--<span class="list-name">Brandon J. Daniels</span>-->
                                                        <a class="list-mail-id" href="#"><?php echo $key['invite_email']; ?><!--BrandonJDaniels@dayrep.com--></a>
                                                    </td>
                                                    <?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
                                                    <td>
                                                        <label class="label_radio">
	                                                        <i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>"   onclick="unblockuser(<?php echo $key['invite_id']; ?>,'<?php echo $key['is_block']; ?>');" value="<?php echo $key['invite_id']; ?>" type="radio">
                                                        </label>
                                                    </td>
													<?php } elseif(isset($invite) && ($invite==0)) {  ?>
													   <td>
                                                        <label class="label_radio">
	                                                        <i class="fa fa-check-square-o"></i>
                                                        	<input name="sample-radio-<?php echo $key['invite_id']; ?>"   onclick="unblockuser(<?php echo $key['invite_id']; ?>,'<?php echo $key['is_block']; ?>');" value="<?php echo $key['invite_id']; ?>" type="radio">
                                                        </label>
                                                       </td>
													
													<?php } ?>
                                                </tr>
												<?php } ?>
                                            	
                                            </tbody>
                                        </table>
                                        <!--table -->
                                    </div>
                                    <!--list-main -->
                                </div>
                                <!--invite-list-inner -->
                            </section>
                            <!--guset-list -->
                        </div>
                        <!--invite-guest-main -->
                    </div>    
                    <!--admin-main -->
                </div>
            	<!--admin-content -->
            </div>
<!--- end of invite content--->
<?php  ?>

<?php if(isset($_GET["code"])){ ?>
<script> 
$(document).ready(function(){
	var code = '<?php echo $_GET['code']; ?>'; 
	$.ajax({
			type: 'GET',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/invite_google',
			data: {code:code},
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
			},
			success:function(data)
                     {
                     	$('.allFbFriends').html(data);
                     	$("div.loading_image").css("display","none");
                     	   if(data == 0){       	
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to delete mail. Try again later!!');
					 }
					}
	});
});	
</script>
<?php }?>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.oauthpopup.js"></script>
<script>

$(document).on("click",".invite-social a",function(){
	$(".invite-social a").removeClass("social-on");
	$(this).addClass("social-on");
});

$(document).ready(function(){
	$('.invite-add-main').hide();
	$('.allFbFriends1').hide();
});
$('body').on('click','.customEmail',function(){
    $('.allFbFriends').empty();
	//$('.allFbFriends').hide();
	$('.invite-add-main').show();
	$('.allFbFriends1').hide();
});
function yahooinvitefriend(){
	window.location.href = "<?php echo CController::createUrl('/invite/invite_yahoo') ?>";
}
function googleinvitefriend(){
	window.location.href = "<?php echo CController::createUrl('/invite/invite_google') ?>";
}
$(document).ready(function(){
$("#facebook").click(function(){
   $('.invite-add-main').hide();
   $('.allFbFriends').show();
   $('.allFbFriends1').hide();
});
});
</script>
<script type="text/javascript">
  window.fbAsyncInit = function() {
     FB.init({ 
       appId:'<?php  echo $appID; ?>', cookie:true, 
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
	  	
	  	$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/facebook_invite',
			data: "",
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
			},
			success:function(data)
                     {
                     	$('.allFbFriends').html(data);
                     	$("div.loading_image").css("display","none");
                     	   if(data == 0){       	
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to delete mail. Try again later!!');
					 }
					}
		});
	  }
 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
});

 $("#twitter").oauthpopup({
 	path:'<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/TwitterAunthentication',
 	callback: function(){
      $.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/twitter_invite',
			data: "",
			dataType: 'html',
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
			},
			success:function(data)
                     {
                     	//alert(data);
                     	$('.allFbFriends').show();
                     	$('.allFbFriends').html(data);
                     	$("div.loading_image").css("display","none");
					}
		});
}
});
//twitter insert

  function send_twitter(id,name)
{  
	 $.ajax({
				 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/insert_twitter',
				//data: $("#twitterinsert").serialize(),
				data:{id:id,name:name},
				 type: 'POST',
				 dataType: 'json',
				 success: function(data){
					 var totalLength = data.length;
                          for(i=0;i<totalLength;i++){
						   $("table.man").append(data[i]['body']);
						   $(".alluser").html(data[i]['datacount']);
						   $(".admin").html(data[i]['admin']);
						   //alert(data[i]['admin']);
						   $("."+id).removeAttr("onclick");
						   $("."+id).css("background","blue");
						   //alert(data[i]['class']);
                       }
					    // $('.chk:checked').each(function() {
        
					// $('.chk:checked').prop("disabled",true);
					// $('.chk:checked').prop("checked",false);
						// });
				      }
				
			});
  }

//twitter insert

/* Send Facebook friend Invitation */
function send_invitation(fb_frnd_id,name){
     FB.ui({ method: 'apprequests', 
       message: 'Wedoo Project Invitation.',
	   to:fb_frnd_id
	   },
			function(response){
			if (response && !response.error_code) {
				$.ajax({
						 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/insert_facebook',
						 data: {fb_frnd_id:fb_frnd_id,name:name},
						 type: 'POST',
						 dataType: 'json',
						 success: function(data){
							 $("."+fb_frnd_id).removeAttr("onclick");
							 $("."+fb_frnd_id).css("background","blue");
							 $("table.man").append(data[0]);
							 $(".alluser").html(data[1]);
							 $(".admin").html(data[2]);
							
						 }
					});
			}
		  });
	  
}
<!-- manually enter email ajax and jquery code -->
  $(document).ready(function(){
    $(".insert_email").click(function(){
    	if(a==1)
		{
		   $("p.message").html("Please press + sign to insert email");
		}
				$.ajax({
					 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/insert_other',
					 data: $("#form1").serialize(),
					 dataType: 'json',
					 type: 'POST',
					 success: function(data){
					 a=1;
					  var totalLength = data.length;
					// alert(totalLength);
					  //var res = data.split(",");
						  $("p.add").empty();
						  $("p.message").empty();
                          for(i=0;i<totalLength;i++){
						    
						   // $("table.man").append(data[i]['body']);
							if(data[i]['status']==1)
							{
							  
							   $("table.register").append(data[i]['body']);
							   $(".alluser").html(data[i]['datacount']);
			                   $(".total1").html(data[i]['res1']);
							}
							if(data[i]['status']==0)
							{ 
							   $("table.man").append(data[i]['body']);
							   $(".alluser").html(data[i]['datacount']);
							   $(".admin").html(data[i]['admin']);
			                   //$(".total1").html(data[i]['res1']);
							}
						  
                       }
					   
					   
					   
					 }
				});  
	 });
	
});


var a=1;
			$(document).ready(function(){
			  $(".button1").click(function(event){
			   event.preventDefault();
                 event.stopPropagation();

			     var v=$("#email").val();
				 if(v.trim()!='')
				 {
				   
				 var v1=v.split(",");
				 var len=v1.length;
					 for(i=0;i<len;i++)
					 {
					    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v1[i]))
						{
						 $("p.add").append("<div id='"+a+"'><input onclick='del("+a+")'  type='button'  value='Delete'><input type='hidden' value='"+v1[i]+"' name='user_email[]' >"+v1[i]+"<br /></div>");
						 a=a+1;
						 $("#email").val("");
						 $("p.message").empty();
					    }
						else
						{
							$("p.message").html("Please enter valid email");
						}
					 }
			    }
                else
                {
					 $("p.message").html("Please enter email");
					 b=0;
                }				
			  });
			});
			
			function del(b)
			{
			    $("#"+b).remove();
			}
<!-- manually enter email ajax and jquery code -->			
	<!-- make admin ajax call -->		
function saveadmin(id,admin)
{
     $.ajax({ 
	          url:'<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/updateadmin',
			  data:{id:id,admin:admin},
			  dataType:'json',
			  type:'POST',
			  success: function(data) {
				 $("."+id).empty();
			      $("."+id).html(data);
			  }
	 });
}

function saveadmin1(id,admin)
{
     $.ajax({ 
	          url:'<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/updateadmin1',
			  data:{id:id,admin:admin},
			  dataType:'json',
			  type:'POST',
			  success: function(data) {
				 $("."+id).empty();
			      $("."+id).html(data);
			  }
	 });
}
<!-- make admin ajax call -->	

<!-- delete admin ajax call -->
function deleteadmin(id)
{ 
    $.ajax({
	        url:'<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/deleteadmin',
			data:{id:id},
			dataType:'json',
			type:'POST',
			success: function(data) {
			//alert(data);
				  if(data[0]==1)
				  {
					var str = "send_gmail("+"'"+data[2]+"'"+","+"'"+data[3]+"'"+")";
				    $("."+data[3]).attr("onclick",str);
					$("."+data[3]).removeAttr( 'style' );
				  }
				   if(data[0]==2)
				  {
				   
					var str = "send_invitation("+"'"+data[3]+"'"+","+"'"+data[2]+"'"+")";
				    $("."+data[3]).attr("onclick",str);
					$("."+data[3]).removeAttr( 'style' );
				  }
				   if(data[0]==3)
				  {
				    //alert(data[3]);
					var str = "send_twitter("+"'"+data[3]+"'"+","+"'"+data[2]+"'"+")";
				    $("."+data[3]).attr("onclick",str);
					$("."+data[3]).removeAttr( 'style' );
					//$("."+data[3]).prop("disabled",false);
					//$('.chk:checked').prop("disabled",true);
				  }
				  $(".alluser").html(data[1]);
				  $(".admin").html(data[4]);
			      $("."+id).remove();
			}
	});
}
<!-- delete admin ajax call -->	

function send_gmail(name,name1)
{

    $.ajax({
			 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/insert_gmail',
			 data: {email:name,name1:name1},
			 dataType: 'json',
			 type: 'POST',
			 success: function(data){
				 if(data[1]==1)
				  {
				  $("table.register").append(data[0]);
				    $(".alluser").html(data[2]);
			        $(".total1").html(data[3]);
				  }
				  if(data[1]==0)
				  {
					  $("table.man").append(data[0]);
					  $(".alluser").html(data[2]);
					  $(".admin").html(data[3]);
				  }
			 
			 $("."+name1).removeAttr("onclick");
			 $("."+name1).css("background","blue");
			 
			 }
		});
}
<!-- delete admin ajax call -->	

<!-- blocker user ajax call -->
function blockuser(id,block)
{
              $.ajax({
			 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/saveblock',
			 data: {id:id,block:block},
			 dataType: 'json',
			 type: 'POST',
			 success: function(data){
			 $("."+id).remove();
			 $(".total1").html(data[1]);
			 $(".block1").html(data[2]);
			 $(".block").append(data[0]);			   
			 }
		});
}
<!-- blocker user ajax call -->

function unblockuser(id,block)
{
              $.ajax({
			 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/saveunblock',
			 data: {id:id,block:block},
			 dataType: 'json',
			 type: 'POST',
			 success: function(data){
					$("."+id).remove();
					$(".total1").html(data[1]);
					$(".block1").html(data[2]);
					$(".register").append(data[0]);
			 }
		});
}
<!-- blocker user ajax call -->		
   </script>
 <script>
 $(window).load(function() {
         $("#activeinviteguests").addClass("active");
         });
</script>  