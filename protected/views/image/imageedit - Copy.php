<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/imageEdit/font.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/imageEdit/picedit.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true);?>/css/thumbelina.css" />
<style type="text/css">
            #slider2 {
                position:relative;
                margin-left:26px;
                width:95%;
                height:120px;
                border-top:1px solid #aaa;
                border-bottom:1px solid #aaa;
            }

            #slider3 {
                position:relative;
                margin-top:40px;
                width:93px;
                height:331px;
                border-left:1px solid #aaa;
                border-right:1px solid #aaa;
                margin-bottom:40px;
                margin-left : 5px;
            }
            #image_box{
            	border: 1px solid #000;
            	width:419px;
            	height:318px;
            	margin-left : 145px;
            	float:left;
            	margin-top:49px;
           }
           .column1{
           	    bottom: 90%;
			    float: right;
			    
			    position: relative;
           }
         
</style>
<form name="testform" action="out.php" method="post" enctype="multipart/form-data">
<div style="margin:10% auto 0 auto; display: table;">

<!-- begin_picedit_box -->
<div class="picedit_box">
    <!-- Picedit navigation -->
    <div class="picedit_nav_box picedit_gray_gradient">
    	<div class="picedit_pos_elements"></div>
       <div class="picedit_nav_elements">
			<!-- Picedit button element begin -->
			<div class="picedit_element">
           	 <span class="picedit_control picedit_action ico-picedit-pencil" title="Pen Tool"></span>
             	 <div class="picedit_control_menu">
               	<div class="picedit_control_menu_container picedit_tooltip picedit_elm_3">
                    <label class="picedit_colors">
                      <span title="Black" class="picedit_control picedit_action picedit_black active" data-action="toggle_button" data-variable="pen_color" data-value="black"></span>
                      <span title="Red" class="picedit_control picedit_action picedit_red" data-action="toggle_button" data-variable="pen_color" data-value="red"></span>
                      <span title="Green" class="picedit_control picedit_action picedit_green" data-action="toggle_button" data-variable="pen_color" data-value="green"></span>
                    </label>
                    <label>
                    	<span class="picedit_separator"></span>
                    </label>
                    <label class="picedit_sizes">
                      <span title="Large" class="picedit_control picedit_action picedit_large" data-action="toggle_button" data-variable="pen_size" data-value="16"></span>
                      <span title="Medium" class="picedit_control picedit_action picedit_medium" data-action="toggle_button" data-variable="pen_size" data-value="8"></span>
                      <span title="Small" class="picedit_control picedit_action picedit_small" data-action="toggle_button" data-variable="pen_size" data-value="3"></span>
                    </label>
                  </div>
               </div>
           </div>
           <!-- Picedit button element end -->
			<!-- Picedit button element begin -->
			<div class="picedit_element">
				<span class="picedit_control picedit_action ico-picedit-insertpicture" title="Crop" data-action="crop_open"></span>
           </div>
           <!-- Picedit button element end -->
			<!-- Picedit button element begin -->
			<div class="picedit_element">
           	 <span class="picedit_control picedit_action ico-picedit-redo" title="Rotate"></span>
             	 <div class="picedit_control_menu">
               	<div class="picedit_control_menu_container picedit_tooltip picedit_elm_1">
                    <label>
                      <span>90° CW</span>
                      <span class="picedit_control picedit_action ico-picedit-redo" data-action="rotate_cw"></span>
                    </label>
                    <label>
                      <span>90° CCW</span>
                      <span class="picedit_control picedit_action ico-picedit-undo" data-action="rotate_ccw"></span>
                    </label>
                  </div>
               </div>
           </div>
           <!-- Picedit button element end -->
           <!-- Picedit button element begin -->
            <div class="picedit_element">
           	 <span class="picedit_control picedit_action ico-picedit-arrow-maximise" title="Resize"></span>
             	 <div class="picedit_control_menu">
               	<div class="picedit_control_menu_container picedit_tooltip picedit_elm_2">
                    <label>
						<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="resize_image"></span>
						<span class="picedit_control picedit_action ico-picedit-close" data-action=""></span>
                    </label>
                    <label>
                      <span>Width (px)</span>
                      <input type="text" class="picedit_input" data-variable="resize_width" value="0">
                    </label>
                    <label class="picedit_nomargin">
                    	<span class="picedit_control ico-picedit-link" data-action="toggle_button" data-variable="resize_proportions"></span>
                    </label>
                    <label>
                      <span>Height (px)</span>
                      <input type="text" class="picedit_input" data-variable="resize_height" value="0">
                    </label>
                  </div>
               </div>
           </div>
           <!-- Picedit button element end -->
       </div>
	</div>
	<!-- Picedit canvas element -->
	<div class="picedit_canvas_box">
		<div class="picedit_painter">
			<canvas></canvas>
		</div>
		<div class="picedit_canvas" id="imageContainer">
			<canvas id="imageMap"></canvas>
		</div>
		<div class="picedit_action_btns active">
          <div class="picedit_control ico-picedit-picture" data-action="load_image"></div>
          <div class="center">or copy/paste image here</div>
		</div>
	</div>
	<!-- Picedit Video Box -->
    <!-- Picedit draggable and resizeable div to outline cropping boundaries -->
    <div class="picedit_drag_resize">
    	<div class="picedit_drag_resize_canvas"></div>
		<div class="picedit_drag_resize_box">
			<div class="picedit_drag_resize_box_corner_wrap">
           	<div class="picedit_drag_resize_box_corner"></div>
			</div>
			<div class="picedit_drag_resize_box_elements">
				<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="crop_image"></span>
				<span class="picedit_control picedit_action ico-picedit-close" data-action="crop_close"></span>
			</div>
       </div>
    </div>
</div>
<!-- end_picedit_box -->

</div>
<!---- Effects --->
    <div class="column1" style="margin-top: -15%;">
            Reset to:<br />
            <input type="button" onclick="resetToColor()" value="Color" />
            <input type="button" onclick="resetToGrayscale()" value="Grayscale" /><hr />
            Effects:<br />
            <input type="button" onclick="resetToBlur()" value="1. Blur" /><br />
            <input type="button" onclick="resetToNoise()" value="2. Add noise" /><br />
            <input type="button" onclick="resetToInvert()" value="3. Invert colors" /><hr />
            Adjustment:<br />
            <input type="button" onclick="changeGrayValue(0.1)" value="Lighter" /><br />
            <input type="button" onclick="changeGrayValue(-0.1)" value="Darker" /><br />
            Red: <input type="button" onclick="changeColorValue('er', 10)" value="More" />
            <input type="button" onclick="changeColorValue('er', -10)" value="Less" /><br />
            Green: <input type="button" onclick="changeColorValue('eg', 10)" value="More" />
            <input type="button" onclick="changeColorValue('eg', -10)" value="Less" /><br />
            Blue: <input type="button" onclick="changeColorValue('eb', 10)" value="More" />
            <input type="button" onclick="changeColorValue('eb', -10)" value="Less" />
            Blur: <input type="button" onclick="changeBlurValue(1)" value="More" />
            <input type="button" onclick="changeBlurValue(-1)" value="Less" /><br />
        </div>

<div style="margin-top:30px; text-align: center;">
    <button type="button" id="crop">Submit</button>
</div>
</form>
<div  id="slider3">
            <div class="thumbelina-but vert top">&#708;</div>
            <ul>
                <li><img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image1.jpg"></li>
                <li><img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image2.jpg"></li>
                <li><img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image3.jpg"></li>
                <li><img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image4.jpg"></li>
                <li><img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image5.jpg"></li>
                <li><img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image6.jpg"></li>
            </ul>
            <div class="thumbelina-but vert bottom">&#709;</div>
        </div>
        
        <div id="slider2">
            <div class="thumbelina-but horiz left">&#706;</div>
            <ul>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image1.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image2.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image3.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image4.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image5.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image6.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image1.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image2.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image3.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image4.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image5.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image6.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image1.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image2.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image3.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image4.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image5.jpg"></li>
                <li><img class="imageupload" src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/image_editor/image6.jpg"></li>
            </ul>
            <div class="thumbelina-but horiz right">&#707;</div>
        </div>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true);?>/js/thumbelina.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/script.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/picedit.js"></script>
<script type="text/javascript">
	$(function() {
		$('.picedit_box').picEdit({
			imageUpdated: function(img){
			},
			formSubmitted: function(){
			},
			redirectUrl: false,
            defaultImage: false
		});
	});
	
$(document).ready(function() {
	
$('body').on('click',"#crop",function(e){
	 var Pic=	document.getElementById("imageMap").toDataURL();
            $.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/Image/ImageUpload',
			data: { 
			imgBase64: Pic
			},
			beforeSend: function(data){
				$("div.loading_image").css("display","block");
			},
			success:function(data)
                     {
                     	$("div.loading_image").css("display","none");
                     	//$('#imageTag').show();	
                     	//$(".image").html('<img src="<?php echo Yii::app()->getBaseUrl(true);?>/upload/productImage/'+data+'" id="imageMap"/>');
                     	//$.fancybox.close();
					 }
		});
	
});	
});	

            $(function(){
                $('#slider2').Thumbelina({
                    $bwdBut:$('#slider2 .left'),    // Selector to left button.
                    $fwdBut:$('#slider2 .right')    // Selector to right button.
                });
                
                $('#slider3').Thumbelina({
                    orientation:'vertical',         // Use vertical mode (default horizontal).
                    $bwdBut:$('#slider3 .top'),     // Selector to top button.
                    $fwdBut:$('#slider3 .bottom')   // Selector to bottom button.
                });
                // $('body').on('click','.imageupload',function(){
				    // var image_url = $(this).attr("src");
					// $('#editableimage1').attr("src",image_url);
			    // });
            })		
</script>