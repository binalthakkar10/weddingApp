	<!-- jQuery & jQuery-UI's Selectable + Draggable -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true).'/site-css/style.css' ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true);?>/css/thumbelina.css" />
	<style type="text/css">
            #slider2 {
                position:relative;
                margin-left:26px;
                width:95%;
                height:120px;
                border-top:1px solid #aaa;
                border-bottom:1px solid #aaa;
                top: 100%
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
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true);?>/js/thumbelina.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/easel.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/ColorFilter.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/ColorMatrixFilter.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/main.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/ui.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/file.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/tools.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/layer.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/image.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/ConvolutionFilter.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/filters.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/imageEdit/scripts.js"></script>
	<script type="text/javascript">
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
	$('body').on('click',"#button-save",function(e){
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
					 }
	});
	
});	
</script>
	
	<div id="overlay"></div>
	<!-- Crop Layer Element -->
	<div id="overlay"></div>
	<!-- Crop Layer Element -->
	<div id="cropoverlay" class="dialog">
		<div></div>
		<button style="position: absolute; top: -33px;" class="button-ok">Crop</button><button style="position: absolute; top: -33px; left: 50px;"  class="button-cancel">Cancel</button>
	</div>
	<!-- Various Dialogs -->
	<div id="dialog-openurl" class="dialog">
		Please enter url to open:<br>
		<input type="text" style="width: 350px;"/>
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-scale" class="dialog">
		Set scale:<br>
		<input class="input-scaleX" name="input-scaleX" type="range" min=0 max=100 value=0>%
		<input class="input-scaleY" name="input-scaleY" type="range" min=0 max=100 value=0>%
		<!-- X: <input class="input-scaleX" type="text" style="width: 50px; text-align: right;" value="100"/>% 
		Y: <input class="input-scaleY" type="text" style="width: 50px; text-align: right;" value="100"/>% --> 
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-rotate" class="dialog">
		Rotate:<br>
		<input  type="range" min=0 max=360 value=0>°
		<!-- <input type="text" style="width: 50px; text-align: right;" value="0"/>°  -->
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-skew" class="dialog">
		Skew:<br>
		<input class="input-skewX" type="range" min=0 max=100 value=0>°
		<input class="input-skewY" type="range" min=0 max=100 value=0>°
		<!-- X: <input class="input-skewX" type="text" style="width: 50px; text-align: right;" value="100"/>° 
		Y: <input class="input-skewY" type="text" style="width: 50px; text-align: right;" value="100"/>° --> 
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-layerrename" class="dialog">
		Rename layer:<br>
		<input type="text" style="width: 350px;"/>
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-tooltext" class="dialog">
		Add text layer:<br>
		Font: 
		<select>
			<option value="Calibri">Calibri</option>
			<option value="Times New Roman">Times New Roman</option>
			<option value="Courier New">Courier New</option>
		</select> 
		Size: <input type="text" class="input-size" style="width: 50px" value="12px"/>
		Color: <input type="text" class="input-color" style="width: 70px; background: black; color: silver;" value="black"/><br>
		<input type="text" class="input-text" style="width: 318px"/>
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-filterbrightness" class="dialog">
		Set brightness:<br>
		<input type="range" min=0 max=100 value=100>%
		<!-- <input type="text" style="width: 50px;"/>%  -->
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-filterblur" class="dialog">
		Blur radius:<br>
		<input type="range" min=0 max=2 value=0>px 
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-filtercolorify" class="dialog">
		Colorify:<br>
		R: <input class="r" type="range" min=0 max=100 value=0>
		G: <input class="g" type="range" min=0 max=100 value=0>
		B: <input class="b" type="range" min=0 max=100 value=0>
		A: <input class="a" type="range" min=0 max=100 value=0>
		
		<!-- R: <input class="r" type="text" style="width: 30px;"/> 
		G: <input class="g" type="text" style="width: 30px;"/> 
		B: <input class="b" type="text" style="width: 30px;"/> 
		A: <input class="a" type="text" style="width: 30px;"/> --> 
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-filtergaussianblur" class="dialog">
		Blur radius:<br>
		<input type="radio" class="3" name="radius"/> 3px 
		<input type="radio" class="2" name="radius"/> 2px 
		<input type="radio" class="1" name="radius"/> 1px &nbsp;
		<button class="button-ok">Ok</button><button class="button-cancel">Cancel</button>
	</div>
	<div id="dialog-executescript" class="dialog">
		Execute script:<br>
		<textarea style="width: 350px; height: 200px;"></textarea><br>
		<button class="button-ok">Execute</button><button class="button-cancel">Cancel</button>
	</div>
	<!-- Main Menu -->
	<div>
	<ul id="mainmenu">
		<li>
			<input id="button-openfile" type="file"/>
		</li>
		<li>
			<button>File</button>
			<ul class="submenu">
				<!-- <li><button id="button-openfile"><input type="file"/><span style="margin-top: -32px; display: block;">Open File</span></button></li> -->
				<li><button id="button-openurl">Open URL</button></li>
				<li><hr/></li>
				<li><button id="button-importfile"><input type="file" multiple="true"/><span style="margin-top: -32px; display: block;">Import File</span></button></li>
				<li><button id="button-importurl">Import URL</button></li>
				<li><hr/></li>
				<li><button id="button-save">Save</button></li>
				<li><button id="button-print">Print</button></li>
			</ul>
		</li>
		<li>
			<button>Edit</button>
			<ul class="submenu">
				<li><button id="button-undo">Undo</button></li>
				<li><button id="button-redo">Redo</button></li>
			</ul>
		</li>
		<li>
			<button>Layer</button>
			<ul class="submenu">
				<li><button id="button-layercrop">Crop</button></li>
				<li><button id="button-layerscale">Scale</button></li>
				<li><hr/></li>
				<li><button id="button-layerrotate">Rotate</button></li>
				<li><button id="button-layerskew">Skew</button></li>
				<li><button id="button-layerflipv">Flip Vertically</button></li>
				<li><button id="button-layerfliph">Flip Horizontally</button></li>
			</ul>
		</li>
		<li>
			<button>Image</button>
			<ul class="submenu">
				<li><button id="button-imagescale">Scale</button></li>
				<li><hr/></li>
				<li><button id="button-imagerotate">Rotate</button></li>
				<li><button id="button-imageskew">Skew</button></li>
				<li><button id="button-imageflipv">Flip Vertically</button></li>
				<li><button id="button-imagefliph">Flip Horizontally</button></li>
			</ul>
		</li>
		<li>
			<button>Filters</button>
			<ul class="submenu">
				<li><button id="button-filterbrightness">Brigtness</button></li>
				<li><button id="button-filtercolorify">Colorify</button></li>
				<li><button id="button-filterdesaturation">Desaturation</button></li>
				<li><hr/></li>
				<li><button id="button-filterblur">Blur</button></li>
				<li><button id="button-filtergaussianblur">Gaussian Blur</button></li>
				<li><button id="button-filteredgedetection">Edge Detection</button></li>
				<li><button id="button-filteredgeenhance">Edge Enhance</button></li>
				<li><button id="button-filteremboss">Emboss</button></li>
				<li><button id="button-filtersharpen">Sharpen</button></li>
			</ul>
		</li>
		<li>
			<button id="button-executescript">Execute Script</button>
		</li>
		<li><button id="button-text"/>add text</li>
		<li><button id="button-move"/>move</li>
		<!-- <li><button id="button-select" class="active"/></li> -->
	</ul>

	<!-- Right Layer Panel -->
	<ul id="layers"></ul>
	<!-- Canvas for Drawing -->
	<canvas/>
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