<!--admin-content -->
                <div id="admin-content">
                	<!--admin-main -->
                	<div class="admin-main">
                    	
                        <!--edit-wedoo-info-main -->
                        <!--edit-wedoo-info-main -->
						<div class="edit-wedoo-info">
                        	<section class="admin-white-head">
                                <h1><i class="fa fa-pencil"></i><span>Edit User Profile</span></h1>
                            </section>
                            
                            <form class="edit-wedoo-form edit-info" id="frmEditProfile">
                                <div class="side-edite-img pull-left">
                                	<input type="file" id="txtEditweddingImage" name="txtEditweddingImage" style="opacity:0; position:absolute; width: 0.1%;">
                                	<a href="#" class="edit-img"><i class="fa fa-pencil"></i></a>
                                    <div class="image-main">
                                    	<?php if(!empty($user->image)) {?>
                                    	    <img src="<?php echo Yii::app()->getBaseUrl(true)?>/upload/user_image/<?php echo $user->image;  ?>">	
                                    	<?php } else { ?>
                                    	<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/edite-weddoimg.jpg">
                                    	<?php } ?>
                                    </div>
                                	<span class="edit-head">Edit Profile Image </span>
                                </div>
                                
                            	<ul class="side-form  pull-right">
                            		<input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>"  />
                                	<li><input type="text" name="username" id="username" value="<?php echo $user->username; ?>" placeholder="Change Display Name" class="edit-txbx" /></li>
                                	<li><input type="text" name="email" id="email" value="<?php echo $user->email; ?>"  placeholder="Change Email" class="edit-txbx" /></li>
                                	<li></li>
								<?php if(!isset($_SESSION['authid']) && empty($_SESSION['authid'])) { ?>
                                	<li><input type="password" name="old_password" id="old_password" value="" placeholder="Old Password" class="edit-txbx" /></li>
                                	<li><input type="password" maxlength="20" name="new_password" id="new_password" value="" placeholder="New Password" class="edit-txbx" /></li>
                                	<li><input type="password" maxlength="20" name="confirm_password" id="confirm_password" value="" placeholder="Retype Password" class="edit-txbx" /></li>
                                <?php } ?>
								</ul>

                                <ul class="full-form">
                                    
                                    
                                    <li>
                                    	<input type="button" class="create-but" value="CANCEL">
                                    	<input type="button" class="create-but create-but1" value="save">
                                    </li>
                                    
                                    
                                </ul>
                            </form>

                            
                        </div>	
                        <!--edit-wedoo-info-main -->
                        <!--edit-user-info-main -->
                    </div>    
                    <!--admin-main -->
                </div>
            	<!--admin-content -->
            </div>
            <!--admin-main-page -->
        </div>
        <!--row -->
    </div>
    <!--container-fluid -->

<script src="js/script.js"></script>
<!--[if lt IE 7 ]>
    <script src="js/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");
<![endif]-->

<!-- animsition js -->
<script src="js/jquery.animsition.js"></script>
<script src="js/jquery.mCustomScrollbar.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script>
	$(document).ready(function() {
		 $('.selectpicker').selectpicker();
	});
</script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script> 
<script>
	$(document).ready(function() {
		$( "#datepicker" ).datepicker();
	});
</script>

<script>
			$(document).ready(function(){
			
			jQuery.validator.addMethod("lettersonly", function(value, element) {
					return this.optional(element) || value == value.match(/^[a-zA-Z_ ]+$/);
			},"Please enter only alphabetic value.");
			
			$("#frmEditProfile").validate({
				ignore: [],
				debug: false,
				rules: {
				
					email:{
						required: true,
						email: true,
					},
					old_password:{
						required: true,

					},
					new_password:{
						minlength:8,

					},
					confirm_password:{
						equalTo: "#new_password",

					},
					username:{
						required: true,
						
					},
					/*txtEditweddingLocation: {
							required: true
					},
					txtEditweddingDate: {
							required: true
					}*/
				},
				errorPlacement: function (error, element) {
					
					if(element.attr('id') == 'email') {
						error.insertBefore($("#email"));
					}
					if(element.attr('id') == 'confirm_password') {
						error.insertAfter($("#confirm_password"));
					}
					if(element.attr('id') == 'old_password') {
						error.insertAfter($("#old_password"));
					}
					if(element.attr('id') == 'new_password') {
						error.insertAfter($("#new_password"));
					}
					if(element.attr('id') == 'username') {
						error.insertAfter($("#username"));
					}
				},
				messages:{
					
					email:{
						required: ' Please enter email',
						email:'Please enter valid email',
					},
					old_password:{
						required: ' Please enter old password',
						
					},
					new_password:{
						minlength: 'Minimum 8 characters required',
					},
					confirm_password:{
						equalTo: ' Please enter same password',
					},
					username:{
						required: ' Please enter display name',
					},
					/*txtEditweddingDate:{
						required: ' Please enter wedding date'
					},
					txtEditweddingLocation:{
						required: 'Please enter wedding location'
					}*/
					
				}
			});
		
	
			$(".create-but1").click(function(){
				
				if($("#frmEditProfile").valid())
				{
	
					var formData = new FormData($("#frmEditProfile")[0]);

					var dataString = formData;
					$.ajax({
						type: 'POST',
						url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/EditUser',
						data: dataString,
						cache:false,
						async:true,
						processData: false,
						contentType: false,
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
											toastr.success('Successfully Updated.!!');
											location.reload();
											//setTimeout(function(){window.location.href = "<?php echo Yii::app()->getBaseUrl() ?>/index";},3000);
											
										 }
										 if(data == 0){	toastr.options.showMethod = 'slideDown'; 
											toastr.options.closeButton = true;
											toastr.options.positionClass = 'toast-bottom-left';
											toastr.options.timeOut= '10000';
											toastr.error('Your old password does not match');
											}
											
									} 
					});
				
				}
				
			});    
		});
	
</script>
<script>
	
	$(document).on("click",".edit-img",function(){
				$("#txtEditweddingImage").click();
			});
			
			$(document).on("change","#txtEditweddingImage",function(){
				// alert($(this).val());
				var image = this.files[0];
				//console.log(image);
				$(".image-main img").attr("src",window.URL.createObjectURL(image));
				
				//window.URL.createObjectURL(image);
			});

</script>
