<!--css -->
<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/development.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />

<!--js -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-1.10.2"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-ui.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/html5.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.geocomplete.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/js/angular.min.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap-select.min.js"></script>

<!--main -->
<div class="main">
    <!-- wedding-setup -->
    <div class="wedding-setup">
    	<a href="javascript:;" id="logout" class="logout">LOGOUT</a>
		<?php if((isset($count) && ($count!=0)) || (isset($invite) && ($invite>0))) { ?>
    	<a href="javascript:;" id="goback" class="logout goback">Go Back</a>
		<?php } ?>
    	<!--container -->
        <div class="container">
        
            <!--wedding-part-left-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wedding-part-left">
            	<div class="setup-left">
                	<div class="setup-mid">
						<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/cupple-logo.png" />		
                        <span class="setuptext">"Lorem ipsum dolor sit amet, consectetur<br /> adipiscing elit, sed do</span>
                        <a href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/weddinglogo.png" class="weddinglogo"/></a>
                    </div>
                </div>
                
            </div>
            <!--wedding-part-left -->
            <!--wedding-part-right-->
            <?php $model = new Wedding();?>
			<?php $form = $this->beginWidget('GxActiveForm', array(
				'id' => 'wedding-form',
				'enableAjaxValidation' => true,
				'action' => array( '/wedding/Wedding/create' ),
			));
			?>
			<?php 
			 session_start();
			if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
				$userID = $_SESSION['uid']; 
			}else{
				$userID = " ";
			}
			//echo "akshfkashfkashfakhhfasg".$userID;exit;
			?>
			<?php echo $form->hiddenField($model, 'user_id',array('value'=>$userID)); ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wedding-part-right">
            	<!--wedding-white -->
                <div class="wedding-white">
                	<!--wedding-vector -->
                    <div class="wedding-vector">
                        <span>Wedoo Wedding Setup</span>
                    </div>
                    <!--wedding-vector -->
                    <!--fields-wedding-->
                    <ul class="fields-wedding">
                        <li>
	                        <span class="name"><span id="name_value">Bride</span>'s First Name</span>
                            <label class="drowp-name">
                            	<select class="selectpicker drop-name" id="selectValue">
                                	<option value="Bride">Bride</option>
                                	<option value="Groom">Groom</option>
                                	<option value="Partner">Partner</option>
                                </select>
                                <div id="bride" style="display:block;">
                            		<?php echo $form->textField($model, 'to_bride_name', array('minlength' => 3,'maxlength' => 15,'placeholder'=>'Bride Firstname','class'=>'weding-tx-bx fromUser')); ?>
									<?php echo $form->error($model,'to_bride_name'); ?>
								</div>
                            	<div id="groom" style="display:none;">
									<?php echo $form->textField($model, 'to_groom_name', array('minlength' => 3,'maxlength' => 15,'placeholder'=>'Groom Firstname','class'=>'weding-tx-bx fromUser')); ?>
									<?php echo $form->error($model,'to_groom_name'); ?>
								</div>
								<div id="partner" style="display:none;">
									<?php echo $form->textField($model, 'to_partner_name', array('minlength' => 3,'maxlength' => 15,'placeholder'=>'Partner Firstname','class'=>'weding-tx-bx fromUser')); ?>
									<?php echo $form->error($model,'to_partner_name'); ?>
								</div>
                            </label>
                        </li>
                        <li>
	                        <span class="name"><span id="name_value1">Bride</span>'s First Name</span>
                            <label class="drowp-name">
                            	<select class="selectpicker drop-name" id="selectValue1">
                                	<option value="Bride">Bride</option>
                                	<option value="Groom">Groom</option>
                                	<option value="Partner">Partner</option>
                                </select>
                                <div id="bride1" style="display:block;">
									<?php echo $form->textField($model, 'from_bride_name', array('minlength' => 3,'maxlength' => 15,'placeholder'=>'Bride Firstname','class'=>'weding-tx-bx fromUser')); ?>
									<?php echo $form->error($model,'from_bride_name'); ?>
								</div>
								<div id="groom1" style="display:none;">
									<?php echo $form->textField($model, 'from_groom_name', array('minlength' => 3,'maxlength' => 15,'placeholder'=>'Groom Firstname','class'=>'weding-tx-bx fromUser')); ?>
									<?php echo $form->error($model,'from_groom_name'); ?>
								</div>
								<div id="partner1" style="display:none;">
									<?php echo $form->textField($model, 'from_partner_name', array('minlength' => 3,'maxlength' => 15,'placeholder'=>'Partner Firstname','class'=>'weding-tx-bx fromUser')); ?>
									<?php echo $form->error($model,'from_partner_name'); ?>
								</div>
                            </label>
                        </li>
                        <li>
	                        <span class="name">Wedding Date</span>
                            <label>
	                            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDatePicker');
									  $this->widget('CJuiDateTimePicker',array(
										  'model'=>$model, //Model object
										  'attribute'=>'wedding_date', //attribute name
										  'language'=>'',
										  'mode'=>'date', //use "time","date" or "datetime" (default)
										  'htmlOptions'=>array(
										  			'readonly'=>"readonly",
										  			'placeholder'=>'Wedding Date',
										  			'class'=>'weding-tx-bx',
									  	  ),
										  'options'=>array(
											  'regional'=>'en_us',
											  'minDate' => 'today', // to allow selection of dates upto today only
											  'dateFormat' => 'dd/mm/yy',
											   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
									         'changeMonth'=>true,
      										  'changeYear'=>true,
										   ) // jquery plugin options
				
								)); ?>
								<?php echo $form->error($model,'wedding_date'); ?>
                                <i class="fa fa-calendar"></i>
                                <p class="pull-right">*Can edit later</p>
                            </label>
                        </li>
                        <li>
	                        <span class="name">Wedding Location</span>
                            <label>
                            	<?php echo $form->textField($model, 'wedding_location', array('maxlength' => 100,'placeholder'=>'City, State','id'=>'autocomplete','class'=>'weding-tx-bx')); ?>
								<?php echo $form->error($model,'wedding_location'); ?>
                                <i class="fa fa-map-marker"></i>
                                <p class="pull-right">*Can edit later</p>
                            </label>
                        </li>
                         <li>
	                        <span class="name">Street Address</span>
                            <label>
                            	<?php echo $form->textArea($model, 'street_address', array('maxlength' => 200,'placeholder'=>'Street Address','class'=>'weding-tx-bx')); ?>
								<?php echo $form->error($model,'street_address'); ?>
                                <p class="pull-right">*Can edit later</p>
                            </label>
                        </li>
                        <li>
                        <li>
	                        <span class="name">Wedding ID</span>
                            <label>
                            	<p>This is how guests will join your Wedding!</p>
                            	<?php echo $form->textField($model, 'wedding_uniq_id', array('minlength' => 6,'maxlength' => 16,'placeholder'=>'Wedding ID','class'=>'weding-tx-bx fullpad','id'=>'Wedding_wedding_uniq_id')); ?>
								<?php echo $form->error($model,'wedding_uniq_id'); ?>
                                <p>*6 to 16 Alphanumeric characters only</p>
                            </label>
                        </li>
                        <li>
                        	<label>
                        	<?php echo GxHtml::submitButton(Yii::t('app', 'Finish'),array('class'=>'finish-but','onclick'=>"formValid();"));?>
                        	</label>
                        </li>
                    </ul>
                    <!-- fields-wedding -->
                </div>
                <!--wedding-white -->
                 </form>
            </div>
           <?php
				$this->endWidget();
			?>
            <!--wedding-part-right-->
        <div class="clearfix"></div>
        </div>
        <!--container -->
    </div>
    <!-- wedding-setup -->
</div>
<!--main --> 
<script>

 $(document).ready(function(){
	    $(".fromUser").focusout(function(){
		    if($("#Wedding_to_bride_name").val()!=""){
			var textValue = $("#Wedding_to_bride_name").val();
			}
			if($("#Wedding_to_groom_name").val()!=""){
				var textValue = $("#Wedding_to_groom_name").val();
			}
			if($("#Wedding_to_partner_name").val()!=""){
				var textValue = $("#Wedding_to_partner_name").val();
			}
			var variable = textValue.substring(0, 3);
			
			if($("#Wedding_from_bride_name").val()!=""){
				var textValue1 = $("#Wedding_from_bride_name").val();	
			}
			if($("#Wedding_from_groom_name").val()!=""){
				var textValue1 = $("#Wedding_from_groom_name").val();
			}
			if($("#Wedding_from_partner_name").val()!=""){
				var textValue1 = $("#Wedding_from_partner_name").val();
			}
			var variable1 = textValue1.substring(0, 3);
			var rollDie = myFunction();
			$("#Wedding_wedding_uniq_id").val(variable + variable1 +rollDie);
		});
	  });
	  
	 $(document).ready(function(){
	 $("select#selectValue").change(function(){
		  var selectedValue = $(this).val();
		  $("#name_value").html(selectedValue);
		  if(selectedValue == 'Bride'){
			  $("#bride").css("display","block");
			  $("#groom").css("display","none");
			  $("#groom input").val("");
			  $("#partner").css("display","none");
			  $("#partner input").val("");
		  }
		  if(selectedValue == 'Groom'){
			  $("#bride").css("display","none");
			  $("#bride input").val("");
			  $("#groom").css("display","block");
			  $("#partner").css("display","none");
			  $("#partner input").val("");
		  }
		  if(selectedValue == 'Partner'){
			  $("#bride").css("display","none");
			  $("#bride input").val("");
			  $("#groom").css("display","none");
			  $("#groom input").val("");
			  $("#partner").css("display","block");
		  }
	  });
	 }); 
	 
	 $(document).ready(function(){
	  $("select#selectValue1").change(function(){
		  var selectedValue = $(this).val();
		  $("#name_value1").html(selectedValue);
		  if(selectedValue == 'Bride'){
			  $("#bride1").css("display","block");
			  $("#groom1").css("display","none");
			  $("#groom1 input").val("");
			  $("#partner1").css("display","none");
			  $("#partner1 input").val("");
		  }
		  if(selectedValue == 'Groom'){
			  $("#bride1").css("display","none");
			  $("#bride1 input").val("");
			  $("#groom1").css("display","block");
			  $("#partner1").css("display","none");
			  $("#partner1 input").val("");
		  }
		  if(selectedValue == 'Partner'){
			  $("#bride1").css("display","none");
			  $("#bride1 input").val("");
			  $("#groom1").css("display","none");
			  $("#groom1 input").val("");
			  $("#partner1").css("display","block");
		  }
	  });
	 });
	  
		jQuery.validator.addMethod("lettersonly", function(value, element) {
					return this.optional(element) || value == value.match(/^[a-zA-Z_ ]+$/);
			},"Please enter only alphabetic value.");
			
		jQuery.validator.addMethod("alphanumericonly", function(value, element) {
					return this.optional(element) || value == value.match(/^[a-zA-Z0-9_ ]+$/);
			},"Please enter only alphabetic & numeric value.");
	  
	  $("#wedding-form").validate({
			ignore:[],
			debug: false,
			rules: {
				
				"Wedding[to_bride_name]":{
					required: true,
					lettersonly: true,
					required:function(){
							return $('#Wedding_to_groom_name').val()=='' && $('#Wedding_to_partner_name').val()==''
						},
				},
				"Wedding[to_groom_name]":{
					lettersonly: true,
					required:function(){
							return $('#Wedding_to_partner_name').val()=='' && $('#Wedding_to_bride_name').val()==''
						},
				},	
				"Wedding[to_partner_name]":{
					lettersonly: true,
					required:function(){
							return $('#Wedding_to_groom_name').val()=='' && $('#Wedding_to_bride_name').val()==''
						},
				},	
				"Wedding[from_bride_name]":{
					lettersonly: true,
					required:function(){
							return $('#Wedding_from_groom_name').val()=='' && $('#Wedding_from_partner_name').val()==''
						},
				},
				"Wedding[from_groom_name]":{
					lettersonly: true,
					required:function(){
							return $('#Wedding_from_bride_name').val()=='' && $('#Wedding_from_partner_name').val()==''
						},
				},	
				"Wedding[from_partner_name]":{
					lettersonly: true,
					required:function(){
							return $('#Wedding_from_bride_name').val()=='' && $('#Wedding_from_groom_name').val()==''
						},
				},	
				"Wedding[wedding_date]":{
					required: true,
				},	
				"Wedding[wedding_location]":{
					required: true,
				},	
				"Wedding[street_address]":{
					required: true,
				},
				"Wedding[wedding_uniq_id]":{
					required: true,
					alphanumericonly: true,
					remote : {
					            url:"<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/UniqueIdExist",
					            async: false,
					            type: "POST",
					           
					     }
				},	
			},
			errorPlacement: function (error, element) {
				if(element.attr('id') == 'Wedding_to_groom_name') {
					error.insertAfter($("#Wedding_to_groom_name"));
				}
				if(element.attr('id') == 'Wedding_to_partner_name') {
					error.insertAfter($("#Wedding_to_partner_name"));
				}
				if(element.attr('id') == 'Wedding_to_bride_name') {
					error.insertAfter($("#Wedding_to_bride_name"));
				}
				if(element.attr('id') == 'Wedding_from_groom_name') {
					error.insertAfter($("#Wedding_from_groom_name"));
				}
				if(element.attr('id') == 'Wedding_from_bride_name') {
					error.insertAfter($("#Wedding_from_bride_name"));
				}
				if(element.attr('id') == 'Wedding_from_partner_name') {
					error.insertAfter($("#Wedding_from_partner_name"));
				}
				if(element.attr('id') == 'Wedding_wedding_date') {
					error.insertAfter($("#Wedding_wedding_date"));
				}
				if(element.attr('id') == 'Wedding_street_address') {
					error.insertAfter($("#Wedding_street_address"));
				}
				if(element.attr('id') == 'Wedding_wedding_uniq_id') {
					error.insertAfter($("#Wedding_wedding_uniq_id"));
				}
				if(element.attr('id') == 'autocomplete') {
					error.insertAfter($("#autocomplete"));
				}
				

			},
			messages:{
				"Wedding[to_bride_name]":{
					required: 'Missing Bride name',
					lettersonly: 'Enter only characters',
				},
				"Wedding[to_groom_name]":{
					required: 'Missing Groom name.',
					lettersonly: 'Enter only characters',
				},	
				"Wedding[to_partner_name]":{
					required: 'Missing Partner name.',	
					lettersonly: 'Enter only characters',
				},	
				"Wedding[from_bride_name]":{
					required: 'Missing Bride name',
					lettersonly: 'Enter only characters',
				},
				"Wedding[from_groom_name]":{
					required: 'Missing Groom name.',
					lettersonly: 'Enter only characters',					
				},	
				"Wedding[from_partner_name]":{
					required: 'Missing Partner name.',
					lettersonly: 'Enter only characters',
				},	
				"Wedding[wedding_date]":{
					required: 'Enter Your Wedding Date',
				},
				"Wedding[wedding_location]":{
					required: 'Wedding Location is required',					
				},
				"Wedding[street_address]":{
					required: 'Wedding Street Address is required',					
				},
				"Wedding[wedding_uniq_id]":{
					required: 'Wedding id is required',
					alphanumericonly: 'Please enter only alphabetic & numeric value.',
					remote : 'Wedding id already exist',
				},				
			}
		});	
	  
	var placeSearch, autocomplete;
	var componentForm = {
	  street_number: 'short_name',
	  route: 'long_name',
	  locality: 'long_name',
	  administrative_area_level_1: 'short_name',
	  country: 'long_name',
	  postal_code: 'short_name'
	};
	
	$(function(){
	        $("#autocomplete").geocomplete();
	}); 
		/*$(document).ready(function(){
		   var today = new Date();
	      $( "#Wedding_wedding_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			minDate: new Date(),
        }).regional[ "en" ];
		});*/
	$(document).ready(function() {
		 $('.selectpicker').selectpicker();
	});
	$("body").on("click","#logout",function(event){
		event.preventDefault();
		$.ajax({
						type: "POST",
						url:"<?php echo Yii::app()->getBaseUrl(true);?>/Login/Logout",
						cache:false,
						data:'action=Logout',
						success: function(data){	
							window.location.href="<?php echo Yii::app()->getBaseUrl(true);?>/";
						}
		});		
	});
	$("body").on("click","#goback",function(event){
		window.location.href="<?php echo Yii::app()->getBaseUrl(true);?>/";
	});
</script>
<script>
	$(document).ready(function() {
			
		var wedleftHeight = $(".wedding-part-right").height();
		$(".setup-mid").height(wedleftHeight);
	});
	function formValid(){
		if($("#wedding-form").valid()){
		return false; 
		}
	}
	function myFunction() {
	    var x = Math.floor((Math.random() * 1000) + 3);
	    return x;
	}
</script>