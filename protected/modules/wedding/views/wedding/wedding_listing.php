<style>
.wedding_table {border: 2px solid #000;}
.quick-button{border:1px solid #ddd;margin-bottom:-1px;padding:27px 0 9px 0;font-size:14px;background-color:#efefef;background-image:-webkit-gradient(linear,left top,left bottom,from( #fafafa),to( #efefef));background-image:-webkit-linear-gradient(top, #fafafa, #efefef);background-image:-moz-linear-gradient(top, #fafafa, #efefef);background-image:-o-linear-gradient(top, #fafafa, #efefef);background-image:-ms-linear-gradient(top, #fafafa, #efefef);background-image:linear-gradient(top, #fafafa, #efefef);-webkit-box-shadow:0 1px 0 rgba(255,255,255,.8);-moz-box-shadow:0 1px 0 rgba(255,255,255,.8);box-shadow:0 1px 0 rgba(255,255,255,.8);-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;display:block;text-align:center;cursor:pointer;position:relative;-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-ms-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease}
.quick-button i {font-size: 32px;}
a {color: #383e4b; text-decoration:none;}
.span2 {width: 170px;}
.quick-button:hover {text-decoration: none; border-color: #a5a5a5; color: #444; text-shadow: 0 1px 0 #fff; -webkit-box-shadow: 0 0 3px rgba(0,0,0,.25); -moz-box-shadow: 0 0 3px rgba(0,0,0,.25); box-shadow: 0 0 3px rgba(0,0,0,.25);}
[class^="icon-"], [class*=" icon-"] { width: auto; height: auto; line-height: normal; vertical-align: baseline; background-image: none; background-position: 0 0; background-repeat: repeat; margin-top: 0; font-family: FontAwesome; font-weight: normal; font-style: normal; text-decoration: inherit; -webkit-font-smoothing: antialiased; }
a [class^="icon-"], a [class*=" icon-"], a [class^="icon-"]:before, a [class*=" icon-"]:before { display: inline; }
[class^="icon-"]:before, [class*=" icon-"]:before {text-decoration: inherit; display: inline-block; speak: none; }
p { margin: 8px 0 10px; }
.span10 { width: 950px !important; }
</style>
<?php $wedding_listing = Wedding::model()->findAll(); ?>
	<h3>Wedding Listing</h3>
	<table class="wedding_table">
	<tr style="border: 1px solid #000 !important;">
		<th style="border: 1px solid #000 !important;">Wedding ID</th>
		<th style="border: 1px solid #000 !important;">Wedding Location</th>
		<th style="border: 1px solid #000 !important;">Wedding Date</th>
		<th style="border: 1px solid #000 !important;">Action</th>
		<th style="border: 1px solid #000 !important;">visit</th>
	</tr>		
	<?php foreach($wedding_listing as $weddings){ ?>
	<tr>				
		<td style="border: 1px solid #000 !important;"><?php echo $weddings['wedding_uniq_id']; ?></td>
		<td style="border: 1px solid #000 !important;"><?php echo $weddings['wedding_location']; ?></td>
		<td style="border: 1px solid #000 !important;"><?php echo $weddings['wedding_date']; ?></td>
		<td style="border: 1px solid #000 !important;"><a href="" class="upload_photo"><img src="<?php echo Yii::app()->getBaseUrl() ?>/images/iPhoto.png" alt="upload" /></a></td>
		<td style="border: 1px solid #000 !important;"><a href="VisitPage?id=<?php echo $weddings['wedding_id']; ?>" >visit</a></td>
	</tr>
	<?php } ?>
</table>
<div id="content" class="span10" style="display:none;">
	<h1><b>Upload Photos</b></h1><br />
	<div class="box-content">
		<?php $album_category = AlbumCategory::model()->findAll();
		  foreach($album_category as $albumcategory){ ?>
		<a class="album_category quick-button span2" href="javascript:;" onclick="getCategory('<?php echo $albumcategory['album_cate_id']; ?>');">
			<i class="fa fa-user"></i>
			<p><?php echo $albumcategory['album_cate_name']; ?></p>
		</a>
		<?php } ?>
		<form method="post" action="">
			<input type="text" name="album_category_id" value="" id="album_category_id" />
			<input type="button" name="cancel_button" value="Cancel" id="cancel_button" />	
			<input type="file" name="upload_album"  id="upload_album" />	
		</form>
	</div>
<div class="clearfix"></div>
<script>
function getCategory(categoryName){
	$("#album_category_id").val(categoryName);
}
$(document).ready(function(){
var uploadphoto = $('#content').html();
$(".upload_photo").fancybox({
		 content: $('#content').html(uploadphoto),
		 afterClose: function(){
        	//$('#cv').html(cv);
    },
 });	
});
</script>