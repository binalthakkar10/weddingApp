<!--<main class="ng-scope accommodations-view">-->
       <!--admin-content-->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<style>
a.acc-address {
word-wrap: break-word;
}
</style>	   
<div id="admin-content">
		<!--admin-main-->
		<div class="admin-main">
			<!--admin-main-container -->
			<div class="admin-main-container">
				<!--Accommodations-->
				<div class="accommodations">
					<!--admin-white-head-->
					<section class="admin-white-head">
						<h1><i class="fa fa-building"></i><span>Your Accommodations</span></h1>
					</section>
					<!--admin-white-head-->
					<!--text-content-->
						<h3 class="acc-head">Let your guests know where to stay for your wedding.</h3>
						<span class="mng-line"></span>
						
					<!--text-content-->
					<!--add-new-btn-->
					<div class="accommodation-list">
					  <?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
						<a href="javascript:;" onclick="addaccommodation();" class="addnew" id="add_button"><i class="fa fa-plus"></i>add new</a>
						<?php } elseif(isset($invite) && ($invite==0)) {  ?>
						<a href="javascript:;" onclick="addaccommodation();" class="addnew" id="add_button"><i class="fa fa-plus"></i>add new</a>
						<?php } ?>
					
					</div>
				   						
						<!--add-new-btn-->
					<!--acc-form-div-->
					<div class="acc-form-div" >
						<form id="frmAccommodations" style="display:none;" name="frmAccommodations"  method="post" enctype="application/x-www-form-urlencoded">
							<br /><br />
							<ul>
								<li class="acc-xs">
									<!--<div class="acc-side">-->
										<!--<a href="" class="sidebtn">Enter and address to view map</a>-->
										<div class="map-div map_canvas acc-side" id="map_canvas">
                                        	<span id="map_canvas">Enter and address to view map</span>
                                        </div>
									<!--</div>-->
											
								</li>
								<li class="acc-small">
									<input type="text" placeholder="Name" name="txtName" id="txtName" class="acc-txt-bx" /></li>                                   <li class="acc-small">          
									<textarea placeholder="Address" name="txtAddress" id="txtAddress" ></textarea>
							
								 </li>
								<li>
									<input type="text" name="txtWebsiteUrl" id="txtWebsiteUrl" placeholder="Accommodation Website URL" class="acc-txt-bx" value=""/>
								</li>
								<li>
									<textarea placeholder="Description" name="txtAccommodationDescription" id="txtAccommodationDescription"></textarea>
								</li>
							</ul>
							<input type="button" onclick="showbutton()"  class="acc-btns" value="CANCEL" />
							<input type="button" id="btnAccommodationSave" class="acc-btns" value="save" />
						</form>
					</div>
					<!--acc-form-div-->
					
					
				
				<!--Accommodations-->
				<!--Accommodation-list-->
				<?php if(!empty($accommodation)) { 
					   foreach($accommodation as $key) {
					   
							?>
				<div class="accommodation-list removeform<?php echo $key->accomodation_id; ?>">
						
						<div class="acc-list-div">
							<!--location-->
							<div class="location">
								<!--acc-listimg-->
								<div class="acc-listimg">                                        
									<img class="ac-list-img" src="<?php echo Yii::app()->getBaseUrl(false)."/images/".$key->field1; ?>"/>
								</div>
								<!--acc-listimg-->
								<!--acc-ldiv-->
								<div class="acc-ldiv">
									<h3 class="acc-locationhead"><?php echo $key->accom_name; ?></h3>
									<a href="" class="acc-address"><i class="fa fa-map-marker"></i><?php echo $key->accom_address; ?></a>
									 <div class="clearfix"></div>
									<?php if(!empty($key->accom_web_url)) { ?><a href="<?php echo $key->accom_web_url; ?>" target="_blank" class="acc-address"><i class="fa fa-globe"></i><?php echo $key->accom_web_url; ?></a> <?php } ?>	
									<ul>
										<?php if(!empty($key->accom_desc)) { ?><li><?php echo $key->accom_desc; ?></li> <?php } ?>
							
									</ul>
									<?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
									<a href="javascript:;" id="<?php echo $key->accomodation_id; ?>" class="acc-editicon Edit"><i class="fa fa-pencil"></i></a>
									<?php } elseif(isset($invite) && ($invite==0)) {  ?>
									<a href="javascript:;" id="<?php echo $key->accomodation_id; ?>" class="acc-editicon Edit"><i class="fa fa-pencil"></i></a>
									<?php } ?>
								</div>
								<!--acc-ldiv-->
							</div>
							
							<!--location-->
							
						</div>
						<!--acc-list-div-->
						<!-- hidden form-->
				<div class="acc-form-div" >
						<form id="frmAccommodations<?php echo $key->accomodation_id;  ?>" style="display:none;" name="frmAccommodations"  method="post" enctype="application/x-www-form-urlencoded">
							<br /><br />
							<input type="hidden" name="txtid" value="<?php echo $key->accomodation_id; ?>" />
							<ul>
								<li class="acc-xs">
									<!--<div class="acc-side">
										<a href="" class="sidebtn">Enter and address to view map</a>
									</div>-->
									<div class="acc-side map-div map_canvas<?php echo $key->accomodation_id;  ?>" id="map_canvas<?php echo $key->accomodation_id;  ?>">
                                        	<span>Enter and address to view map</span>
                                        </div>
								</li>
								
								<li class="acc-small">
									<input type="text" placeholder="Name" name="txtName<?php echo $key->accomodation_id;  ?>" id="txtName<?php echo $key->accomodation_id;  ?>" value="<?php echo $key->accom_name; ?>" class="acc-txt-bx" />                                             
									
									<textarea placeholder="Address"  name="txtAddress<?php echo $key->accomodation_id; ?>" id="txtAddress<?php echo $key->accomodation_id; ?>" ><?php echo $key->accom_address; ?></textarea>
                                    	
										<!--<div class="map-div acc-side" id="map_canvas<?php echo $key->accomodation_id; ?>">
										<span class="map_canvas">Enter and address to view map</span>
									</div>	-->						
								</li>
								<li>
									<input type="text" name="txtWebsiteUrl" <?php if(isset($key->accom_web_url) && !empty($key->accom_web_url)) { ?> value="<?php echo $key->accom_web_url; ?>" <?php } ?> id="txtWebsiteUrl" placeholder="Accommodation Website URL" class="acc-txt-bx" />
								</li>
								<li>
									<textarea placeholder="Description" name="txtAccommodationDescription" id="txtAccommodationDescription"><?php if(isset($key->accom_desc) && !empty($key->accom_desc)) { echo $key->accom_desc; } ?></textarea>
								</li>
							</ul>
							<input type="button" id="btnAccommodationDelete" onclick="deleteAccommodation(<?php echo $key->accomodation_id;  ?>)" class="acc-btns" value="Remove" />
							<input type="button"  onclick="hideform(<?php echo $key->accomodation_id;  ?>)"  class="acc-btns" value="CANCEL" />
							<input type="button" id="btnAccommodationSave" onclick="editAccommodation(<?php echo $key->accomodation_id;  ?>)" class="acc-btns" value="save" />
							
						</form>
					</div>
                <!-- hidden form-->
				</div>
				<?php } } ?>				
			</div>
			<!--Accommodation-list-->
		</div>
		<!--admin-main-container -->
	</div>	
		<!--admin-main-->
</div>
<!--admin-content-->
            <!--</div>-->
            <!--custom-pop -->
<!--</main>-->
<script>


$(document).ready(function(){
  $("#txtAddress").keypress(function(){
	   	var map="";
	var obj = $("#txtAddress");
    setTimeout(function(){
      map=   obj.geocomplete({
          map: "#map_canvas",
          details: "form",
          
          mapOptions: {
              zoom: 20,
        },
          types: ["geocode", "establishment"],
          
        });
        $("#txtAddress").change(function(){
          $("#txtAddress").trigger("geocode");
          
        });

},10);
});
});

$('body').on('click','#btnAccommodationSave',function(){
   
	 if($("#frmAccommodations").valid()){
			$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Accommodation/CreateAccommodation',
			data: $("#frmAccommodations").serialize(),
			dataType: 'html',
			type: 'POST',
			//cache:false,
			//async:true,
			// beforeSend: function(data){
				// $("div.loading_image").css("display","block");
				// },
			
			success: function(data)
                        {
                        	//alert(data);
                        	$("div.loading_image").css("display","none");
                             if(data == 1)
                             {
                             	toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.success('Successfully Accommodation Created');
								location.reload();
								
                             }else{	
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to create Accommodation. Try again later..!!');
                             } 
                        },
                        
                });
	 }
});

//$(document).ready(function(){
$("#frmAccommodations").validate({
			ignore:[],
			debug: false,
			rules: {
				
				txtName:{
					required: true,
				},
				txtAddress:{
					required: true,
				},	
				// txtEventAddress:{
					// required: true,
				// },	
			},
			errorPlacement: function (error, element) {
				if(element.attr('id') == 'txtName') {
					error.insertAfter($("#txtName"));
				}
				if(element.attr('id') == 'txtAddress') {
					error.insertAfter($("#txtAddress"));
				}
				// if(element.attr('id') == 'txtEventAddress') {
					// error.insertAfter($("#txtEventAddress"));
				// }

			},
			messages:{
				txtName:{
					required: 'Name cannot be blank',
				},
				txtAddress:{
					required: 'Address cannot be blank.',					
				},	
				// txtEventAddress:{
					// required: 'Address cannot be blank.',					
				// },		
			}
			
		});
//});

function addaccommodation(){
	$(".addnew").css("display","none");
	$("#frmAccommodations").css("display","block");
}

function showbutton()
{
  	$(".addnew").show();
	$("#frmAccommodations").css("display","none");
	document.getElementById("frmAccommodations").reset();
}

$('body').on('click','.Edit',function(){
	 var id=$(this).attr('id');
	 
	// alert((id));
	  var value1=$("#txtAddress"+id).val();
	  //alert('"'+value1+'"');
	 // $("#frmAccommodations"+id).show();

	 var map="";
	var obj = $("#txtAddress"+id);
    setTimeout(function(){
      map=   obj.geocomplete({
          map: "#map_canvas"+id,
          details: "form",
		   location: '"'+value1+'"',
		 // location: "'"+value1+"'",
          
          mapOptions: {
              zoom: 20,
        },
          types: ["geocode", "establishment"],
          
        });
        $("#txtAddress"+id).change(function(){
          $("#txtAddress"+id).trigger("geocode");
          
        });
     
},2000);
	 $("#frmAccommodations"+id).show();
	 
}); 

function editAccommodation(id)
{
   //alert("#frmAccommodations"+id);
   
   if($("#frmAccommodations"+id).valid()){ 
   $.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Accommodation/EditAccommodation1',
			data: $("#frmAccommodations"+id).serialize(),
			dataType: 'html',
			type: 'POST',	
		success: function(data)
				{
					//alert(data);
					$("div.loading_image").css("display","none");
					 if(data == 1)
					 {
						toastr.options.showMethod = 'slideDown'; 
						toastr.options.closeButton = true;
						toastr.options.positionClass = 'toast-bottom-left';
						toastr.options.timeOut= '10000';
						toastr.success('Successfully Accommodation Updated');
						location.reload();
						
					 }else{	
						toastr.options.showMethod = 'slideDown'; 
						toastr.options.closeButton = true;
						toastr.options.positionClass = 'toast-bottom-left';
						toastr.options.timeOut= '10000';
						toastr.error('Sorry, unable to update Accommodation. Try again later..!!');
					 } 
				},
	});
	}
}
<?php if(!empty($accommodation)) { 
foreach($accommodation as $key) {
?>
$("#frmAccommodations<?php echo $key->accomodation_id; ?>").validate({

			ignore:[],
			debug: false,
			rules: {
				
				txtName<?php echo $key->accomodation_id; ?>:{
					required: true,
				},
				txtAddress<?php echo $key->accomodation_id; ?>:{
					required: true,
				},	
				// txtEventAddress:{
					// required: true,
				// },	
			},
			errorPlacement: function (error, element) {
				if(element.attr('id') == 'txtName'+<?php echo $key->accomodation_id; ?>) {
					error.insertAfter($("#txtName"+<?php echo $key->accomodation_id; ?>));

				}
				if(element.attr('id') == 'txtAddress'+<?php echo $key->accomodation_id; ?>) {
					error.insertAfter($("#txtAddress"+<?php echo $key->accomodation_id; ?>));
				}
				

			},
			messages:{
				txtName<?php echo $key->accomodation_id; ?>:{
					required: 'Name cannot be blank',
				},
				txtAddress<?php echo $key->accomodation_id; ?>:{
					required: 'Address cannot be blank.',					
				},	
						
			}
			
		});
		

		
<?php } } ?>		
function deleteAccommodation(id)
{
	var txt;
    var r = confirm("Do you want to delete accommodations");
    if (r == true) {
	   $.ajax({
			 url:'<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Accommodation/DeleteAccommodation',
			 data: {id:id},
			 dataType: 'html',
			 type: 'POST',	
			success: function(data)
					{
						//alert(data);
						$("div.loading_image").css("display","none");
						 if(data == 1)
						 {
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-bottom-left';
							toastr.options.timeOut= '10000';
							toastr.success('Successfully Accommodation Deleted');
							$("#frmAccommodations"+id).remove();
							$(".removeform"+id).remove();
							
						 }
					},
	   });
   }
}

function hideform(id){
  $("#frmAccommodations"+id).hide();
}
</script>
<script>
 $(window).load(function() {
         $("#activeaccomodations").addClass("active");
         });
</script>  