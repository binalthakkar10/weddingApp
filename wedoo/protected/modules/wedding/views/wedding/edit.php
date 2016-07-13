<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image.js"></script>
<!-- <script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-ios.js"></script> -->
<!-- <script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-orientation.js"></script> -->
<script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-meta.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-exif.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-exif-map.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/jquery.Jcrop.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/demo.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true);?>/css/vendor/jquery.Jcrop.css">  
<style>
#Sidebar {
    background-color: #fff;
    border-right: 1px solid #ccc;
    bottom: 0;
    font: 200 100%/1.5 "Open Sans Condensed",sans-serif;
    left: 0;
    min-height: 100%;
    position: fixed;
    top: 0;
    white-space: nowrap;
    width: 240px;
    z-index: 2;
    margin-top: 45;
}
.wedding-names {   
	height: 3rem;
    left: 0;
    line-height: 3rem;
    position: absolute;
    right: -1px;
    text-align: center;}

#Sidebar .scrollview {
    bottom: 0;
    left: 0;
    position: absolute;
    top: 6rem;
    width: 100%;
}    
#Sidebar .profile-pic.should-edit{
    color: #fff;
    content: "";
    font: 600%/180px "Weddings";
    height: 100%;
    left: 0;
    opacity: 0.4;
    position: absolute;
    text-align: center;
    top: 0;
    width: 240px;
}
#Sidebar .sidebar-day {
    font-family: "Edwardian Script";
    font-size: 32px;
    line-height: 40px;
}
form.frmWeddingEdit{
	 background-color: #ebebeb;
    border: 1px solid #e0e0e0;
    margin: 1em 0;
    max-width: 36em;
    padding: 1em;
    left: 33%;
    position:relative;
}	
</style>
<div  id="Sidebar" class="Sidebar"> 
	<div class="wedding-names" id="wedding_names" style="font-size: 29px;">
		<span class="name ng-binding">
			<?php if(isset($weddingData['to_bride_name']) && !empty($weddingData['to_bride_name'])){$brideName=$weddingData['to_bride_name'];}elseif(isset($weddingData['to_partner_name']) && !empty($weddingData['to_partner_name'])){$brideName=$weddingData['to_partner_name'];}elseif(isset($weddingData['from_bride_name'])&& !empty($weddingData['from_bride_name'])){$brideName=$weddingData['from_bride_name'];} 
			echo ucfirst($brideName);
			?>
			</span>
		<span class="ampersand">&amp;</span>
		<span class="name ng-binding">
			<?php if(isset($weddingData['to_groom_name']) && !empty($weddingData['to_groom_name'])){
				$groomName=$weddingData['to_groom_name'];}
				elseif(isset($weddingData['from_groom_name']) && !empty($weddingData['from_groom_name'])){
				$groomName=$weddingData['from_groom_name'];}
				elseif(isset($weddingData['from_partner_name']) && !empty($weddingData['from_partner_name'])){
					$groomName=$weddingData['from_partner_name'];} 
			echo ucfirst($groomName);
			?>
		</span>
		<div class="scrollview" restrict="vertical">	
		<a title="Edit Wedding Info"  class="profile-pic should-edit" href="javascript:;" >
			<img width="240" id="previewImage" height="NaN" src="<?php echo Yii::app()->getBaseUrl() ?>/site-images/defaultwedding.jpg">
			</a>
		<div class="sidebar-day"><?php echo date('l',strtotime($weddingData['wedding_date']));?></div>
		<time><?php echo date('F t,Y',strtotime($weddingData['wedding_date']));?></time>	
		</div>	
		<div class="access-code">WEDDING ID: <span class="access-code-text"><?php if(isset($weddingData['wedding_uniq_id']) && !empty($weddingData['wedding_uniq_id'])){ echo $weddingData['wedding_uniq_id'];} ?></span></div>
	</div>
</div>	

<!-- Main Content -->
<div class="main-content">
<form id="frmWeddingEdit" name="frmWeddingEdit" class="frmWeddingEdit" method="post" enctype="multipart/form-data">
<input type="hidden" id="txtWeddingHidden" value="<?php if(isset($weddingData['wedding_id']) && !empty($weddingData['wedding_id'])){ echo $weddingData['wedding_id'];} ?>" name="txtWeddingHidden">	
	<div class="field">
		<div class="field-header">
			<label>Bride or Groom Name</label>
			</div>
			<div class="field-controls">
				<input type="text" maxlength="30" name="txtEditBride" value="<?php echo ucfirst($brideName); ?>">
				</div>
				</div>
	<div class="field">
		<div class="field-header">
			<label>Fiance's Name</label>
			</div>
			<div class="field-controls">
				<input type="text" maxlength="30" name="txtEditGroom" value="<?php echo ucfirst($groomName); ?>">
				</div>
				</div>
	<div class="field">
		<div class="field-header">
			<label>Wedding Date</label>
			</div>
			<div class="field-controls">
				<input type="text" maxlength="30" name="txtEditweddingDate" value="<?php echo date('F t,Y',strtotime($weddingData['wedding_date']));?>">
				</div>
				</div>	
	<div class="field">
		<div class="field-header"><label>Wedding ID</label></div>
		<div class="field-controls">
			<input type="text" name="txtEditweddingId" value="<?php if(isset($weddingData['wedding_uniq_id']) && !empty($weddingData['wedding_uniq_id'])){ echo $weddingData['wedding_uniq_id'];} ?>" ><a  role="button" class="save-weddingid" onclick="changeAccessCode()">
				<span>SAVE</span></a>
				</div>	
			</div>		
	<div class="flex-cover">
		<div class="field photo-field">
		<label upload-drop-zone="" role="button" profile="wedding">
		<span>
		<div class="form-photo">
		<img src="<?php echo Yii::app()->getBaseUrl() ?>/site-images/defaultwedding.jpg"></div>
		<div> Edit Wedding Cover Photo </div>
		</span>
		<input type="file" id="file-input" name="txtEditweddingImage"  class="prodctImage"   accept="image/*">
		</label></div>
		<div class="field"><div class="field-header form-url">
			<label>Your Wedpics Album URL</label>
			</div>
			</div>									
			<div class="field-header">
			<label>Wedding Location</label></div>
			<div class="field-controls">
					<input type="text" class="location-address" name="txtEditweddingLocation" placeholder="Enter a location" value="<?php if(isset($weddingData['wedding_location']) && !empty($weddingData['wedding_location'])){ echo $weddingData['wedding_location'];} ?>">
				</div>
	</div>
<div class="field">
	<div class="field-header">
		<label>Wedding Biography</label>
		</div>
		<div class="field-controls">
			<textarea>Welcome to our wedding album! Thanks for sharing our special day with us and helping us remember it through all of your wonderful pictures that you are sure to take.</textarea>
			</div>
			</div>	
<div class="field">
<div class="field-controls">
<input type="checkbox"  checked="checked">
<label>Allow Guests to Share to Other Social Networks</label></div></div>	

<div class="field">
<div class="field-controls">
<input type="checkbox">
<label>Make My Wedding Private</label></div></div>
<div class="sub-label">Enabling this will prevent people from viewing your album on the web if they don't have your wedding ID.</div>	
	<div class="button-group">
		<input type="button" value="Save" id="btnAlbumSave">
		<input type="button" value="Cancel" id"btnAlbumCancel">
	</div>
	
</form>
</div>


<!-- Fancy Box--->
    <div class='positiontab' style="display:none;">
     <h4>Crop Your Photo</h4>
     <div style='margin: auto; width: 600px;'>
     <div id="result" class="result">
	<p>This demo works only in browsers with support for the <a href="https://developer.mozilla.org/en/DOM/window.URL">URL</a> API.</p>
	</div>
    
    </div>
   </div>
<!-- End Fancy Box-->   
<script>
$(document).ready(function(){
$("#frmWeddingEdit").hide();

$(".should-edit").click(function(){
	$("#frmWeddingEdit").show();
});

$('body').on('click',"#crop",function(e){
	e.preventDefault();
	$("#result").children().find('canvas').attr("id","imageMap");

	 var Pic=	document.getElementById("imageMap").toDataURL();

            $.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/Wedding/ImageUpload',
			data: { 
			imgBase64: Pic
			},
			beforeSend: function(data){
				parent.$.fancybox.showLoading();
			},
			success:function(data)
                     {
                     	parent.$.fancybox.hideLoading();
                     	$('#imageTag').show();	
                     	$(".form-photo").html('<img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/wedding/'+data+'" id="imageMap" width="249" height="191"/>');
                     	$("#previewImage").attr("src","<?php echo Yii::app()->getBaseUrl(true);?>/upload/wedding/"+data);
                     	$("#file-input").attr("tabindex",data);
                     	$.fancybox.close();
					 }
		});
	
});	
$('body').on('click',"#imageMap",function(e){    

        var image_left = $(this).offset().left;
        var click_left = e.pageX;
        var left_distance = click_left - image_left;

        var image_top = $(this).offset().top;
        var click_top = e.pageY;
        var top_distance = click_top - image_top;

        var mapper_width = $('#mapper').width();
        var imagemap_width = $('#imageMap').width();

        var mapper_height = $('#mapper').height();
        var imagemap_height = $('#imageMap').height();

        if((top_distance + mapper_height > imagemap_height) && (left_distance + mapper_width > imagemap_width)){
            $('#mapper').css("left", (click_left - mapper_width - image_left  ))
            .css("top",(click_top - mapper_height - image_top  ))
            .css("width","100px")
            .css("height","100px")
            .show();
        }
        else if(left_distance + mapper_width > imagemap_width){


            $('#mapper').css("left", (click_left - mapper_width - image_left  ))
            .css("top",top_distance)
            .css("width","100px")
            .css("height","100px")
            .show();

        }
        else if(top_distance + mapper_height > imagemap_height){
            $('#mapper').css("left", left_distance)
            .css("top",(click_top - mapper_height - image_top  ))
            .css("width","100px")
            .css("height","100px")
            .show();
        }
        else{


            $('#mapper').css("left",left_distance)
            .css("top",top_distance)
            .css("width","100px")
            .css("height","100px")
            .show();
        }


        $("#mapper").resizable({ containment: "parent" });
        $("#mapper").draggable({ containment: "parent" });
        
    });
    	
});	
  $(".location-address").geocomplete({
          details: "form",
          mapOptions: {
              zoom: 20,
        },
          types: ["geocode", "establishment"],
        });

        $(".location-address").change(function(){
          $(".location-address").trigger("geocode");
        });
$('body').on('click','#btnAlbumSave',function(){
	if($("#frmWeddingEdit").valid()){
	var datastring= $("#frmWeddingEdit").serialize()+"&txtEditweddingImage="+$("#file-input").attr("tabindex");
			$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/Wedding/EditAlbum',
			data: datastring, 
			cache:false,
			async:false,
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
				},
			
			success: function(data)
                        {
                        	alert(data);
                        	$("div.loading_image").css("display","none");
                             if(data == 1)
                             {
                             	toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
								toastr.success('Successfully Album Updated');
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
</script>