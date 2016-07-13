<!-- Load widget code -->
<script type="text/javascript" src="http://feather.aviary.com/imaging/v1/editor.js"></script>
<link type="text/css" src="<?php echo Yii::app()->getBaseUrl(true);?>/magicscroll/editor.css"/>
<style>
.avpw .avpw_powered_text, .avpw .avpw_powered_text a {display:none !important;}a.search-button { background: #F8F8F8; border: 1px solid #CCCCCC; padding:5px 10px; text-decoration:none; font-weight:bold; display:inline-block; margin: 11px 0px 0px 271px; }
</style>
<!-- Instantiate the widget -->
<script type="text/javascript">
    var featherEditor = new Aviary.Feather({
		apiKey: '4a0cac02b5cd1318', 
		//tools: ['draw', 'stickers', 'brightness', 'crop'],
        onSave: function(imageID, newURL) {
			var img = document.getElementById(imageID);
            img.src = newURL;
            $('#editableimage1').attr('src', img.src);
			featherEditor.close();
		}    
	});    
	function launchEditor(id, src) {
		var src = $("#editableimage1").attr("src");
        featherEditor.launch({
				image: id,
				url: src
		});
        return false;
	}
	</script>
	<!-- Add an edit button, passing the HTML id of the image    and the public URL to the image -->
	<a href="#" class="search-button" onclick="return launchEditor('editableimage1',     '<?php echo Yii::app()->getBaseUrl(true) ?>/images/noimage.png');">Edit!</a>
	<div class="File_upload pull-right">
		<label class="left_part">Upload
			<input type="file" id="file-input" name="prodctImage" class="prodctImage" onchange="showimagepreview(this);">
		</label>
	</div>
	<!-- original line of HTML here: --><!-- link to magicscroll.css file -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true);?>/magicscroll/magicscroll.css" media="screen"/>
	<!--<link rel="stylesheet" type="text/css" href="editor.css" media="screen"/>-->
	<!-- link to magicscroll.js file -->
	<script src="<?php echo Yii::app()->getBaseUrl(true);?>/magicscroll/magicscroll.js" type="text/javascript"></script>
	<style>
		.MagicScroll{left: 263px !important;}
		.File_upload { position: relative; width: 65%; right:139px;}
		.left_part{ background: #F8F8F8; border: 1px solid #CCCCCC; color: #428bca; font-size: 14px; font-weight: bold !important; cursor: pointer; font-weight: normal; padding: 6px 44px 4px 16px; position: absolute; text-align: center; top: 11px; width: 85px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif}
		.File_upload input[type=file] { position: absolute; top: -9999px; left: -9999px;}
	</style>
	<script type="text/javascript">
	MagicScroll.options = {
		'height'  :  200,
		'width'  :  1060,
		'items'  :  7,
		'speed'  :  3000,
		'step' : 1,
	}
	function showimagepreview(input) {
		if (input.files && input.files[0]) {
			var filerdr = new FileReader();
			filerdr.onload = function(e) {
				$('#editableimage1').attr('src', e.target.result);
			}		
			filerdr.readAsDataURL(input.files[0]);
		}}
		$(document).ready(function(){
			$('body').on('click','.imageupload',function(){
				var image_url = $(this).attr("src");
				$('#editableimage1').attr("src",image_url);
		});
		$('body').on('click',"#avpw_save_button",function(e){
			e.preventDefault();
			var Pic = document.getElementById("avpw_canvas_element").toDataURL();
			$.ajax({
				type: 'POST',
				url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Album/ImageUpload',
				data: {imgBase64: Pic},
				success:function(data){
				
				}
			});
		});
		});
		</script>
		<html>
			<body>
				<div style="padding-left:513px;">
					<img id="editableimage1" src="<?php echo Yii::app()->getBaseUrl(true) ?>/images/noimage.png" width="500px;" height="300px;"/>
				</div>
				<div class="MagicScroll">
					<?php
						$path	= 	YiiBase::getPathOfAlias('webroot').'/upload/album_image/';	
						if ($handle = opendir($path)) {
							$i = 1;    
							while ($entry = readdir($handle)) {
								if ($entry != "." && $entry != "..") { ?>
									<a href="javascript:;"><img class="imageupload" style="padding: 15px;" src="<?php echo Yii::app()->getBaseUrl(true).'/upload/album_image/'.$entry;?>" />Img <?php echo $i; ?></a>
					<?php $i++;}}}?>
				</div>
			</body>
		</html>