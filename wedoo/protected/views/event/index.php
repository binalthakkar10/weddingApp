<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<style type="text/css">
form.frmEvent{
	 background-color: #ebebeb;
    border: 1px solid #e0e0e0;
    margin: 1em 0;
    max-width: 36em;
    padding: 1em;
    left: 33%;
    position:relative;
}	
 .map_canvas { float: left; 
   width: 200px; 
  height: 220px;
  float:right; 
  margin: 10px 20px 10px 0;
 }

</style>
<div class="">
	<h1>Your Events</h1>
	<h2>Let your guests know when your important wedding events are happening.</h2>
	<h3>Add your wedding events to WedPics, attach an album, and gather the memories from your entire wedding experience!</h3>
	</div>
	
<!--- Event form--->

	
<form id="frmEvent" name="frmEvent" class="frmEvent" method="post" enctype="application/x-www-form-urlencoded">
	<h2>Create A New Event</h2>
	<div label="Event Name">
		<div class="field-header">
			<label >Event Name</label><span></span>
		</div>
		<div class="field-controls">
				<select  name="txtEventName" id="txtEventName">
					<option selected="selected"></option>
					<?php foreach($albumCatEvent as $album){ ?> 	
					<option value="<?php echo $album['album_cate_id']; ?>"><?php echo $album['album_cate_name']; ?></option>
					<?php } ?>
				</select>

		</div>
	</div>
		<div class="field-header">
			<label>Date &amp; Time</label><span></span>
		
		<div class="field-controls">
		<input type="text" name="txtEventTime" id="txtEventTime" value="<?php echo date('m/d/y h:m');?>" class="txt-bx datepicker" data-min="01/15/2013" data-max="today" data-close="false" readonly/>
		</div></div>
	<div class="location-container">
		<div class="location-fields">
			<div label="Location Name">
				<div class="field-header">
					<label >Location Name</label>
					<span></span>
				</div>
				<div class="field-controls">
					<input type="text" name="txtEventLocation" id="txtEventLocation">
				</div>
			</div>
			<div label="Address">
				<div class="field-header">
					<label >Address</label>
				</div>
				<div class="field-controls">
					<div class="map_canvas" id="map_canvas"></div>
					<textarea placeholder="Address" name="txtEventAddress" id="txtEventAddress" class="txtEventAddress" autocomplete="off"></textarea>
					</div>
					
					</div>

		</div>
	</div>
	<div label="Description">
		<div >
			<label >Description</label>
		</div>
		<div class="field-controls">
			<textarea name="txtEventDescription" id="txtEventDescription"></textarea>
</div>	</div>
	<div>
	
		<div class="field-controls">
			<input type="checkbox" id="albumCheck" name="albumCheck" checked>
			<label>Link this event to a photo album</label><!-- ngIf: values.linkedToAlbum -->
			<div id="albumCategory">
				<span class="albumpackage" id="" name="albumpackage">None Selected</span>
				<a id="edit"><span >edit</span></a>
			</div><!-- end ngIf: values.linkedToAlbum -->
		</div>
	</div>
	<div class="button-group">
		<input type="button" value="Save" id="btnEventSave">
		<input type="button" value="Cancel" id"btnEventCancel">
	</div>
	
</form>

<!--- Fancy Box--->
 <div class='positiontab paymentcm' style="display:none;">
 						<img class="close-edit-popup" src="close-icon.png"  />
                            <h4>Select an Event Album</h4>
                            <form name="frmEventEditing" id="frmEventEditing" method="post" enctype="application/x-www-form-urlencoded">
                            <input type="hidden" name="hdnSearchID" id=""  class="hdnSearchID"/>
                    		<div  style="overflow-x: hidden; margin-right: -17px;">
                    			<div role="listbox">
                    			<?php foreach($albumCat as $album){ ?> 	
                    			<div role="option">
                    				<label for="<?php echo $album['album_cate_id']; ?>"><input type="radio" id="albumcatID" class="albumcatID" name="albumcatID" value='<?php echo $album['album_cate_id']; ?>' /><?php echo $album['album_cate_name']; ?></label>
                    				</div>
                    			<?php 
								} ?>
									</div>	
                    				</div>
                    		<div class="custom-album">
                    			<input type="radio"id="albumcatID" name="albumcatID" value="<?php echo $albumCatcount; ?>">
                    			<label >New Album</label>
                    			<input type="text" placeholder="Album Name" id="albumcatName" name="albumcatName">
                    			</div>
                             <input type="button" name="btnCancel" id="btnCancel" class="savebtn btnCancel" value="Cancel">
                             <input type="button" name="btnSaveAlbum" id="btnSaveAlbum" class="savebtn btnSaveAlbum" value="Save Album" />
                             
                             </form>
                        </div>
<!-- Fancy Box--->    
<!-- Edit Data--->
<?php
if($eventAllData){
$i=1;	
 foreach($eventAllData as $eventRecord){?>
<div class="eventImage">
	

<ul>
	<img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image.png" style="width: 50px; height: 50px;">
	<li><h3><?php if(isset($eventRecord['event_name']) && !empty($eventRecord['event_name'])){echo $eventRecord['event_name'];}else{ echo 'N/A';} ?></h3></li>
	<li><h4><?php if(isset($eventRecord['event_datetime']) && !empty($eventRecord['event_datetime'])){echo date('g:i A l,F jS',strtotime($eventRecord['event_datetime']));}else{ echo 'N/A';} ?></h4></li>
	<li><h3><?php if(isset($eventRecord['event_location']) && !empty($eventRecord['event_location'])){echo $eventRecord['event_location'];}else{ echo 'N/A';} ?></h3></li>
	<li><h3><?php if(isset($eventRecord['event_description']) && !empty($eventRecord['event_description'])){echo $eventRecord['event_description'];}else{ echo 'N/A';} ?></h3></li>
	<li><td><input type="button" class="button Edit"  value="edit" id="<?php echo $i; ?>" /></td></li>
</ul>
</div>
<!---Hdden form -->
<form id="frmEvent<?php echo $i ?>" name="frmEvent" class="frmEvent EditEvent" method="post" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="hiddenId" value="<?php echo $eventRecord['event_id']; ?>">	
	<h2>Create A New Event</h2>
	<div label="Event Name">
		<div class="field-header">
			<label >Event Name</label><span></span>
		</div>
		<div class="field-controls">
				<select  name="txtEventName" id="txtEventName<?php echo $i; ?>">
					<option selected="selected"></option>
					<?php foreach($albumCatEvent as $album){ ?> 	
					<option value="<?php echo $album['album_cate_id']; ?>" <?php if($album['album_cate_name']==$eventRecord['event_name']){ echo "selected=selected" ;} ?>><?php echo $album['album_cate_name']; ?></option>
					<?php } ?>
				</select>

		</div>
	</div>
		<div class="field-header">
			<label>Date &amp; Time</label><span></span>
		
		<div class="field-controls">
		<input type="text" name="txtEventTime" id="txtEventTime<?php echo $i; ?>" value="<?php echo date('m/d/y h:m',strtotime($eventRecord['event_datetime']));?>" class="txt-bx datepicker" data-min="01/15/2013" data-max="today" data-close="false" readonly/>
		</div></div>
	<div class="location-container">
		<div class="location-fields">
			<div label="Location Name">
				<div class="field-header">
					<label >Location Name</label>
					<span></span>
				</div>
				<div class="field-controls">
					<input type="text" name="txtEventLocation" id="txtEventLocation<?php echo $i; ?>" value="<?php if(isset($eventRecord['event_location']) && !empty($eventRecord['event_location'])){echo $eventRecord['event_location'];} ?>" >
				</div>
			</div>
			<div label="Address">
				<div class="field-header">
					<label >Address</label>
				</div>
				<div class="field-controls">
					<div class="map_canvas" id="map_canvas<?php echo $i; ?>"></div>
					<textarea placeholder="Address" name="txtEventAddress"  id="txtEventAddress<?php echo $i; ?>"  class="txtEventAddress" autocomplete="off"><?php if(isset($eventRecord['event_address']) && !empty($eventRecord['event_address'])){echo $eventRecord['event_address'];} ?></textarea>
					</div>
					
					</div>

		</div>
	</div>
	<div label="Description">
		<div >
			<label >Description</label>
		</div>
		<div class="field-controls">
			<textarea name="txtEventDescription" id="txtEventDescription<?php echo $i; ?>"><?php if(isset($eventRecord['event_description']) && !empty($eventRecord['event_description'])){echo $eventRecord['event_description'];} ?></textarea>
</div>	</div>
	<div>
	
		<div class="field-controls">
			<input type="checkbox" id="albumCheck<?php echo $i; ?>" name="albumCheck" checked>
			<label>Link this event to a photo album</label><!-- ngIf: values.linkedToAlbum -->
			<div id="albumCategory<?php echo $i; ?>">
				<span class="albumpackage<?php echo $i; ?>" id="<?php if(isset($eventRecord['album_cate_id']) && !empty($eventRecord['album_cate_id'])){echo $eventRecord['album_cate_id'];}else{echo "";} ?>" name="albumpackage"><?php if(isset($eventRecord['album_cate_name']) && !empty($eventRecord['album_cate_name'])){echo $eventRecord['album_cate_name'];}else{echo 'None Selected';} ?></span>
				<a id="edit<?php echo $i; ?>"><span >edit</span></a>
			</div><!-- end ngIf: values.linkedToAlbum -->
		</div>
	</div>
	<div class="button-group">
		<input type="button" value="Save" id="btnEventSave<?php echo $i; ?>">
		<input type="button" value="Cancel" id"btnEventCancel">
	</div>
	
</form>
<!--- Hidden Fancybox code -->
<!--- Fancy Box--->

 <div id='positiontabEdit<?php echo $i?>' style="display:none;">
                            <h4>Select an Event Album</h4>
                            <form name="frmEventEditing" id="frmEventEditing<?php echo $i; ?>" method="post" enctype="application/x-www-form-urlencoded">
                            <input type="hidden" name="hdnSearchID" id=""  class="hdnSearchID"/>
                    		<div  style="overflow-x: hidden; margin-right: -17px;">
                    			<div role="listbox">
                    			<?php foreach($albumCat as $album){ 
                    				$categoryID = $album['album_cate_id'];	
                    			?> 	
                    			<div role="option">
                    				<label id="albumlabelId<?php echo $i; ?>" for="<?php echo $album['album_cate_id']; ?>">
                    					<input type="radio" id="albumcatID<?php echo $i; ?>" class="albumcatID" <?php if(isset($categoryID) && ($categoryID == $eventRecord['event_link_album_id'])){ echo "checked"; } ?> name="albumcatID<?php echo $i; ?>" value="<?php echo $album['album_cate_id']; ?>" />
                    					<?php echo $album['album_cate_name']; ?>
                    					</label>
                    				</div>
                    			<?php 
								} ?>
									</div>	
                    				</div>
                    		<div class="custom-album">
                    			<input type="radio"id="albumcatID<?php echo $i; ?>" name="albumcatID<?php echo $i; ?>"  value="<?php echo $albumCatcount; ?>">
                    			<label >New Album</label>
                    			<input type="text" placeholder="Album Name" id="albumcatName<?php echo $i; ?>" name="albumcatName">
                    			</div>
                             <input type="button" name="btnCancel" id="btnCancel" class="savebtn btnCancel" value="Cancel">
                             <input type="button" name="btnSaveAlbum" id="btnSaveAlbum<?php echo $i; ?>" class="savebtn btnSaveAlbum" value="Save Album" />
                             
                             </form>
                        </div>
<!-- Fancy Box--->  
<!-- End of Hidden fancy box-->
<script>
 $("input#<?php echo $i?>").click(function(){
	var map="";
	var obj = $("#txtEventAddress<?php echo $i; ?>");
    setTimeout(function(){
      map=   obj.geocomplete({
          map: "#map_canvas<?php echo $i; ?>",
          details: "form",
          location: "<?php echo $eventRecord['event_address']; ?>",
          
          mapOptions: {
              zoom: 20,
        },
          types: ["geocode", "establishment"],
          
        });
        $("#txtEventAddress<?php echo $i; ?>").change(function(){
          $("#txtEventAddress<?php echo $i; ?>").trigger("geocode");
          
        });

},2000);
        	
});
$("body").on("click","#albumCheck<?php echo $i; ?>",function(){
	if($(this).prop( "checked" )==true){
		$("#albumCategory<?php echo $i; ?>").show();
	}else{
		$("#albumCategory<?php echo $i; ?>").hide();
	}
});

	$('body').on('click','#edit<?php echo $i; ?>',function(){
		var eventID=$("#txtEventName<?php echo $i; ?> option:selected").val();
		if(eventID!=""){
			$('input:radio[name=albumcatID]').removeAttr('checked');
			var checkRadioBtn1=(parseInt(eventID) - 1);
			$('input:radio[name=albumcatID]:nth("'+checkRadioBtn1+'")').attr('checked',true);
		}else{
			$('input:radio[name=albumcatID]').removeAttr('checked');
			var lastradio="<?php echo $albumCatcount; ?>";
			var checkRadioBtn=(parseInt(lastradio) - 1);
			$('input:radio[name=albumcatID]:nth("'+checkRadioBtn+'")').attr('checked',true);	
		}
		
		
		var save_search = $('#positiontabEdit<?php echo $i?>').html();
		$.fancybox({
		content: $('#positiontabEdit<?php echo $i?>').html(save_search),
   });
   
   
}); 

$('body').on('click','#btnSaveAlbum<?php echo $i?>',function(){
	var albumId= $("input[name=albumcatID<?php echo $i?>]:checked").val();
	if(albumId=='<?php echo $albumCatcount; ?>'){
		var albumName=$('#albumcatName<?php echo $i; ?>').attr('value');
	}else{	
		var albumName= $("label#albumlabelId<?php echo $i; ?>[for='"+albumId+"']").text();
	}	
$('.albumpackage<?php echo $i; ?>').text(albumName);
$('.albumpackage<?php echo $i; ?>').attr('id',albumId);
	
	
	$.fancybox.close();
}) 

$('body').on('click','#btnEventSave<?php echo $i; ?>',function(){
	if($("#frmEvent<?php echo $i; ?>").valid()){
	var eventName=$("#txtEventName<?php echo $i; ?> option:selected").text();	
	var albumId=$(".albumpackage<?php echo $i; ?>").attr('id');
	var albumName=$(".albumpackage<?php echo $i; ?>").html();
	var datastring= $("#frmEvent<?php echo $i; ?>").serialize()+'&albumId='+albumId+'&albumName='+albumName+'&eventName='+eventName;
	alert('hii');
			$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/Event/EditEvent',
			data: datastring,
			cache:false,
			async:true,
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
				},
			
			success: function(data)
                        {
                        	$("div.loading_image").css("display","none");
                             if(data == 1)
                             {
                             	toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.success('Successfully Event Created');
								location.reload();
								
                             }else{	
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to create Event. Try again later..!!');
                             } 
                        },
                        
                });
	}
});

$("#txtEventTime<?php echo $i; ?>").datetimepicker();
	$("#frmEvent<?php echo $i; ?>").validate({ 
			ignore:[],
			debug: false,
			rules: {
				
				txtEventName:{
					required: true,
				},
				txtEventLocation:{
					required: true,
				},	
				txtEventAddress:{
					required: true,
				},	
			},
			errorPlacement: function (error, element) {
				if(element.attr('id') == 'txtEventName<?php echo $i; ?>') {
					error.insertAfter($("#txtEventName<?php echo $i; ?>"));
				}
				if(element.attr('id') == 'txtEventLocation<?php echo $i; ?>') {
					error.insertAfter($("#txtEventLocation<?php echo $i; ?>"));
				}
				if(element.attr('id') == 'txtEventAddress<?php echo $i; ?>') {
					error.insertAfter($("#txtEventAddress<?php echo $i; ?>"));
				}

			},
			messages:{
				txtEventName:{
					required: 'Event Name cannot be blank',
				},
				txtEventLocation:{
					required: ' Location Name cannot be blank.',					
				},	
				txtEventAddress:{
					required: 'Address cannot be blank.',					
				},		
			}
			
		});
</script>

<?php $i++;} } ?>           
<script>
$(document).ready(function(){
$(".EditEvent").hide();

  	$("#frmEvent").validate({ 
			ignore:[],
			debug: false,
			rules: {
				
				txtEventName:{
					required: true,
				},
				txtEventLocation:{
					required: true,
				},	
				txtEventAddress:{
					required: true,
				},	
			},
			errorPlacement: function (error, element) {
				if(element.attr('id') == 'txtEventName') {
					error.insertAfter($("#txtEventName"));
				}
				if(element.attr('id') == 'txtEventLocation') {
					error.insertAfter($("#txtEventLocation"));
				}
				if(element.attr('id') == 'txtEventAddress') {
					error.insertAfter($("#txtEventAddress"));
				}

			},
			messages:{
				txtEventName:{
					required: 'Event Name cannot be blank',
				},
				txtEventLocation:{
					required: ' Location Name cannot be blank.',					
				},	
				txtEventAddress:{
					required: 'Address cannot be blank.',					
				},		
			}
			
		});
$("body").on("click","#albumCheck",function(){
	if($(this).prop( "checked" )==true){
		$("#albumCategory").show();
	}else{
		$("#albumCategory").hide();
	}
});
$("body").on("change","#txtEventName",function(){
	var albumText=$('.hdnSearchID').attr('id');
	if(albumText==""){
		var eventName=$("#txtEventName option:selected").text();
		if(eventName){
			$('.albumpackage').attr("id",$("#txtEventName").val());
			$('.albumpackage').text(eventName);
		}
}
});

$("#txtEventTime").datetimepicker();	
			});	
  $(function(){
        $("#txtEventAddress").geocomplete({
          map: "#map_canvas",
          details: "form",
          mapOptions: {
              zoom: 20,
        },
          types: ["geocode", "establishment"],
        });

        $("#txtEventAddress").change(function(){
          $("#txtEventAddress").trigger("geocode");
        });
	$('body').on('click','#edit',function(){
		var eventID=$("#txtEventName option:selected").val();
		if(eventID!=""){
			$('input:radio[name=albumcatID]').removeAttr('checked');
			var checkRadioBtn1=(parseInt(eventID) - 1);
			$('input:radio[name=albumcatID]:nth("'+checkRadioBtn1+'")').attr('checked',true);
		}else{
			$('input:radio[name=albumcatID]').removeAttr('checked');
			var lastradio="<?php echo $albumCatcount; ?>";
			var checkRadioBtn=(parseInt(lastradio) - 1);
			$('input:radio[name=albumcatID]:nth("'+checkRadioBtn+'")').attr('checked',true);	
		}
		
		
		var save_search = $('.positiontab').html();
		$.fancybox({
		content: $('.positiontab').html(save_search),
		afterShow:function(){
			$("#selName").val('test');
		},
		afterLoad:function(){
		
		},
   });
   
   
});   

$('body').on('click','#btnSaveAlbum',function(){
	var albumId= $("input[name=albumcatID]:checked").val();
	if(albumId=='<?php echo $albumCatcount; ?>'){
		var albumName=$('#albumcatName').attr('value');
	}else{	
		var albumName= $("label[for='"+albumId+"']").text();
	}
$('.hdnSearchID').attr('id',<?php echo $_SESSION['uid'] ?>);	
$('.albumpackage').text(albumName);
$('.albumpackage').attr('id',albumId);
	
	
	$.fancybox.close();
}) 
$('body').on('click','#btnCancel',function(){
	$.fancybox.close();
})
$('body').on('click','#btnEventSave',function(){
	if($("#frmEvent").valid()){
	var eventName=$("#txtEventName option:selected").text();	
	var albumId=$(".albumpackage").attr('id');
	var albumName=$(".albumpackage").html();
	var datastring= $("#frmEvent").serialize()+'&albumId='+albumId+'&albumName='+albumName+'&eventName='+eventName;
			$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/Event/CreateEvent',
			data: datastring,
			cache:false,
			async:true,
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
				},
			
			success: function(data)
                        {
                        	$("div.loading_image").css("display","none");
                             if(data == 1)
                             {
                             	toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.success('Successfully Event Created');
								location.reload();
								
                             }else{	
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.error('Sorry, unable to create Event. Try again later..!!');
                             } 
                        },
                        
                });
	}
});     
      });
$('body').on('click','.Edit',function(){
	var id=$(this).attr('id');
	$("#frmEvent"+id).show();
});      			
</script>