<!--<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.geocomplete.js"></script> -->  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>		
		<div id="admin-content">
                	<!--admin-main -->
                	<div class="admin-main">
                    	
                        <!--edit-wedoo-info-main -->
						<div class="edit-wedoo-info">
                        	<section class="admin-white-head">
                                <h1><span>Edit Wedoo Info</span></h1>
                            </section>
                            <?php //p($weddingData); ?>
                            <form class="edit-wedoo-form" id="frmEditWedooInfo" method="post">
								<input type="hidden" id="txtWeddingHidden" name="txtWeddingHidden" value="<?php echo $weddingData->wedding_id; ?>">
                                <div class="side-edite-img">
                                	<input type="file" id="txtEditweddingImage" name="txtEditweddingImage" style="opacity:0; position:absolute; width: 0.1%;">
                                	<a href="javascript:" class="edit-img"><i class="fa fa-pencil"></i></a>
                                    <div class="image-main">
										<?php if(!isset($weddingData->image) || $weddingData->image == "") { ?>
                                    	<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/edite-weddoimg.jpg">
										<?php } else { ?>
										<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/upload/wedding/<?php echo $weddingData->image; ?>">
										<?php } ?>
                                    </div>
                                	<span class="edit-head">Edit Wedding Cover Photo </span>
                                    <p>Your Wedoo Album URL
									<a href="#">wedoo.com/wedding/NDc4Mzc</a></p>
                                </div>
								
								<?php 	
									($weddingData->to_bride_name == "") ? ($weddingData->to_groom_name == "") ? ($weddingData->to_partner_name == "") ? ($to_name = "") : ($to_name = $weddingData->to_partner_name)  : ($to_name = $weddingData->to_groom_name) :  ($to_name = $weddingData->to_bride_name);
									($weddingData->from_bride_name == "") ? ($weddingData->from_groom_name == "") ? ($weddingData->from_partner_name == "") ? ($from_name = "") : ($from_name = $weddingData->from_partner_name)  : ($from_name = $weddingData->from_groom_name) :  ($from_name = $weddingData->from_bride_name);
								?>		
                                
                            	<ul class="side-form">
									
                                	<li><input type="text" id="txtEditBride" name="txtEditBride" value="<?php echo ucfirst($to_name); ?>" placeholder="Bride or Groom Name" title="Bride or Groom Name" class="edit-txbx" /></li>
                                	<li><input type="text" id="txtEditGroom" name="txtEditGroom" value="<?php echo ucfirst($from_name); ?>" placeholder="Fiance(e)'s Name" title="Fiance(e)'s Name" class="edit-txbx" /></li>
                                	<li><input type="text" id="txtEditweddingDate" name="txtEditweddingDate" value="<?php echo date('d/m/Y',strtotime($weddingData->wedding_date)); ?>" placeholder="Wedding Date" title="Wedding Date" class="edit-txbx datepicker" /></li>
                                    <li>
                                        <input type="text" id="txtEditweddingId" name="txtEditweddingId" value="<?php echo $weddingData->wedding_uniq_id; ?>" readonly placeholder="Wedding ID" title="Wedding ID" class="edit-txbx" />
                                    	<!--<input type="button" class="create-but save-small" value="save">-->
                                    </li>
                                </ul>

                                <ul class="full-form"> 
                                    <li>
                                        <input type="text" id="txtEditweddingLocation" name="txtEditweddingLocation" value="<?php echo $weddingData->wedding_location; ?>" placeholder="Wedding Location" title="Wedding Location" class="edit-txbx autocomplete" autocomplete="off">
                                    </li>
									<li>
									     <textarea  placeholder="Street Address" name="street_address" id="street_address" class="edit-txbx"><?php if(isset($weddingData->street_address) && !empty($weddingData->street_address)) { echo $weddingData->street_address; } ?></textarea>
									</li>
                                    <li>
                                        <textarea value="" placeholder="Wedding Biography" name="biography" class="edit-txbx"><?php if(isset($weddingData->biography) && !empty($weddingData->biography)) { echo $weddingData->biography; } ?></textarea>
                                        <label class="label_check">
	                                        <input name="sample-checkbox-01" id="checkbox-01" <?php if(isset($weddingData['share_social']) && ($weddingData['share_social']=='1') ) { ?> checked <?php } ?> value="1" type="checkbox" >
                                            <i class="fa fa-square-o"></i>
                                        	<span>Allow Guests to Share to Other Social Networks</span>
                                        </label>
                                        <label class="label_check" for="checkbox-02">
	                                        <input name="sample-checkbox-02" id="checkbox-02"  <?php if(isset($weddingData['is_private']) && ($weddingData['is_private']=='1') ) { ?> checked <?php } ?> value="1" type="checkbox" >
                                            <i class="fa fa-square-o"></i>
                                        	<span>Make My Wedding Private</span>
                                        </label>
                                        <p>Enabling this will prevent people from viewing your album on the web if they don't have your wedding ID.</p>
                                    </li>
                                    
                                    <li>
                                    	<input type="button" class="create-but" value="CANCEL">
                                    	<input type="button" class="create-but" value="save" id="save-btn">
                                    </li>
                                    
                                    
                                </ul>
                            </form>

                            <div id="select-event" class="custom-pop">
                                <div class="overlay"></div>                                        
                                <section class="custom-pop-inner">
	                                <a id="pop-close" href="#"><img src="images/pop-login-clos.png"></a>

                                    <!--admin-white-head-->
                                    <section class="admin-white-head">
                                    	<h1><span>Select an Event Album</span></h1>
                                    </section>
                                    
                                    <!--inner-part-->
                                    <section class="inner-part uploded-pics-box">
                                        <!--uplodpic-box-->
                                        <div class="uplodpic-box">
                                            <div class="mbox ">
                                                <img class="mngimg" src="images/mng-album-honeymoon.png"/>
                                                <img class="mng-h" src="images/mng-album-honeymoon-h.png"/>
                                                <span>Honeymoon</span>
                                            </div>
                                            <div class="mbox ">
                                                <img class="mngimg" src="images/mng-album-reception.png"/>
                                                <img class="mng-h" src="images/mng-album-reception-h.png"/>
                                                <span>reception</span>
                                                
                                            </div>
                                            <div class="mbox ">
                                                <img class="mngimg" src="images/mng-album-ceremony.png"/>
                                                <img class="mng-h" src="images/mng-album-ceremony-h.png"/>
                                                <span>ceremony</span>
                                            </div>
                                            <div class="mbox ">
                                                <img class="mngimg" src="images/mng-album-ange.png"/>
                                                <img class="mng-h" src="images/mng-album-ange-h.png"/>
                                                <span>Engagement</span>
                                            </div>
                                        </div>
                                        <!--uplodpic-box-->
                                    </section>
                                    <!--inner-part-->
                                    <!--note-->
                                    <div class="create-album-main">
                                    	<span class="or">OR</span>
                                        <a href="#">Create your own album</a>
                                    </div>
                                    <!--note-->                                            
                                    <!--Choose Files-btn-->
                                    <input type="button" value="Select Album" class="select-album">
                                    <!--Choose Files-btn-->
                                </section>
                            </div>

                        </div>	
                        <!--edit-wedoo-info-main -->
                    </div>    
                    <!--admin-main -->
                </div>
            	<!--admin-content -->
            </div>
            <!--admin-main-page -->
			
			<script> <!-- Purvesh Patel 31-3-2015 -->
			
			$(document).on("click",".edit-img",function(){
				$("#txtEditweddingImage").click();
			});
			
			$(document).on("change","#txtEditweddingImage",function(){
				// alert($(this).val());
				var image = this.files[0];
				//console.log(image);
				$(".image-main img").attr("src",window.URL.createObjectURL(image));
				$(".side-prfl-img img").attr("src",window.URL.createObjectURL(image));
				
				//window.URL.createObjectURL(image);
			});
			
	
		$(document).ready(function(){
			
			jQuery.validator.addMethod("lettersonly", function(value, element) {
					return this.optional(element) || value == value.match(/^[a-zA-Z_ ]+$/);
			},"Please enter only alphabetic value.");
			
			$("#frmEditWedooInfo").validate({
				ignore: [],
				debug: false,
				rules: {
				
					txtEditBride:{
						required: true,
						lettersonly: true,
						minlength:3,
						maxlength:20,
					},
					street_address:{
						required: true,
					},
					txtEditGroom:{
						required: true,
						lettersonly: true,
						minlength:3,
						maxlength:20,
					},
					txtEditweddingId:{
						required: true,
						//rangelength:[8,15],
						required: true
					},
					txtEditweddingLocation: {
							required: true
					},
					txtEditweddingDate: {
							required: true
					}
				},
				errorPlacement: function (error, element) {
					
					if(element.attr('id') == 'txtEditBride') {
						error.insertAfter($("#txtEditBride"));
					}
					if(element.attr('id') == 'txtEditGroom') {
						error.insertAfter($("#txtEditGroom"));
					}
					if(element.attr('id') == 'txtEditweddingId') {
						error.insertAfter($("#txtEditweddingId"));
					}
					if(element.attr('id') == 'txtEditweddingLocation') {
						error.insertAfter($("#txtEditweddingLocation"));
					}
					if(element.attr('id') == 'txtEditweddingDate') {
						error.insertAfter($("#txtEditweddingDate"));
					}
					if(element.attr('id') == 'street_address') {
						error.insertAfter($("#street_address"));
					}
				},
				messages:{
					
					txtEditBride:{
						required: ' Please enter Bride or Groom\' Name',
						lettersonly: ' Please enter characters only',
						minlength: 'Minimum 3 characters required',
						maxlength: 'Maximum 20 characters are allowed'
					},
					txtEditGroom:{
						required: ' Please enter Fiance(e)\'s Name',
						lettersonly: ' Please enter characters only',
						minlength: 'Minimum 3 characters required',
						maxlength: 'Maximum 20 characters are allowed'
					},
					txtEditweddingId:{
						required: ' Please enter Your Unique wedding id',
						rangelength:' Weddin ID size should be between 8 to 15 characters',
						required: ''
					},
					txtEditweddingDate:{
						required: ' Please enter wedding date'
					},
					txtEditweddingLocation:{
						required: 'Please enter wedding location'
					},
					street_address:{
						required: 'Please enter street_address'
					}
					
				}
			});
		
		// var placeSearch, autocomplete;
	// var componentForm = {
	  // street_number: 'short_name',
	  // route: 'long_name',
	  // locality: 'long_name',
	  // administrative_area_level_1: 'short_name',
	  // country: 'long_name',
	  // postal_code: 'short_name'
	// };
	
	 $(document).ready(function(){
	 // $(function(){
	    $("#txtEditweddingLocation").geocomplete();
		//});
	 });
	// $(document).ready(function(){
	// $("#txtEditweddingLocation").keypress(function(){
          // $("#txtEditweddingLocation").trigger("geocode");
	// }); 
	// });
	

	
		
    $(document).ready(function(){
	//$("#txtEditweddingDate").datepicker();
	$( "#txtEditweddingDate" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:'dd/mm/yy',
			minDate: new Date()
        });
	});
			
			$("#save-btn").click(function(){
				
				if($("#frmEditWedooInfo").valid())
				{
	
					var formData = new FormData($("#frmEditWedooInfo")[0]);

					var dataString = formData;
					$.ajax({
						type: 'POST',
						url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/EditAlbum',
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
											
										 }else{	toastr.options.showMethod = 'slideDown'; 
											toastr.options.closeButton = true;
											toastr.options.positionClass = 'toast-bottom-left';
											toastr.options.timeOut= '10000';
											toastr.error('Sorry, unable to Update. Try again later..!!');
											}
									} 
					});
				
				}
				
			});    
		});
					
			</script> 
<script>
 $(window).load(function() {
         $("#activevisitpage").addClass("active");
         });
</script>  			
