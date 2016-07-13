<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/rotate.js"></script>
<div id="admin-content">
	<div class="admin-main">
    	<div class="admin-main-container">
            <section class="admin-white-head">
                <h1><i class="fa fa-photo"></i><span>All photos</span></h1>
            </section>
<!-------- No pictures available ---->              
<div class="Nophotos">           
            <span class="admin-tag">No photos or videos in this album yet.<br>
			start uploading now!</span>
            
            <div class="clearfix"></div>
         <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo Yii::app()->getBaseUrl(true)?>/wedding/Album/ImageSave'>
         	<input type="hidden" name="hiddenALbumId" value="<?php echo $albumDetails['album_id']; ?>">
            <label class="admin-upload-image">   	
                <input type="file" name="photoimg" id="photoimg" placeholder="">
            </label>
          </form> 
               <!-- <div id="preview">
			</div>   -->
            <div class="admin-or-line">
                <span>OR</span>
            </div>
            
            <div class="clearfix"></div>

          	<ul class="admin-bot-nav">
            	<li>
                	<a href="#">
                    	<i class="fa fa-user-plus"></i>
                        <span>Invite Guests</span>
                    </a>
                </li>
            	<li>
                	<a href="#">
                    	<i class="fa fa-square"></i>
                        <span>Order App Cards</span>
                    </a>
                </li>
            </ul>  
	<div>  
            </div>
</div>
<!--- end of no pictures--->

<div class="allPhotoesView">                        
                        <div class="view-album pull-right">
                        	<div class="list-view pull-left"><a  data-popId="photo-comment" class="active" href="#"><i class="fa  fa-th"></i></a></div>
                            <div class="grid-view pull-right"><a  data-popId="grid-view" href="#"><i class="fa  fa-th-list"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="photo-commnet-wrapper" id="profile-name-wrapper">
                        	<div  class="Guest_person pull-left">
                            	<div class="guest_person_image">
                                	<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/Guest_person.png" >
                                </div>
                                <div class="guest_person_name">
                                	<h2>John Travolta</h2>
                                </div>      
                            </div>
                            <div id="photo-comment" class="photo-comment view-content pull-left appendSlide" >
                        <?php if(!empty($photoGallalbumModel)){ foreach ($photoGallalbumModel as $photoGall){ ?> 
                                <div class="photo_box pull-left">
                                    <div class="comment_part_photobox caption_box" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                        <div class="Comment_detail pull-right">
                                            <div class="caption">
                                                 <h2><?php if(isset($photoGall['caption'])){ echo $photoGall['caption']; } ?></h2>
                                            </div>
                                            <div class="caption video-camera">
                                                 <a href="javascript:" class="slideshow-link"><i class="fa  fa-file-video-o"></i></a>
                                            </div>
                                            <div class="image-comment-photo preview">
                                                <img src="<?php echo Yii::app()->getBaseUrl(true).'/upload/album_image/'.$photoGall['photo_image'];?>" >
                                            </div>
                                        </div>
                                        <div class="comment_part">
                    <div class="person_image pull-left">
                        <img src="<?php if(isset($photoGall['user_image'])){ echo $photoGall['user_image']; } ?>" >
                    </div>
                                            <div class="Comment_detail Comment_detail_desc pull-right">
                                            
                                                <div class="comment_title">
                                                    <div class="commentPerson_name pull-left">
                                                    
                                                        <a class="profile-name" href="#"> <h3><?php if(isset($photoGall['username'])){ echo $photoGall['username']; } ?></h3></a>
                                                        <div class="tag_icon pull-left"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/party_icon.png" ></div>
                                                   
                                                        <div class="comment_time pull-right">
                                                        	<p>Posted 2 hours ago</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                     </div>
                                    <div class="comment_tab pull-right slider_control">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="likes" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                    	<i class="fa fa-heart likeHeart" <?php if(isset($photoGall['likeCount']) && !empty($photoGall['likeCount'])){ ?>  style="color:#D26B79;" <?php  } ?>></i>
                                                    </div>
                                                    <div class="Count totallikes"><?php if(isset($photoGall['likeCount'])){echo $photoGall['likeCount'];}else{ echo 0;} ?></div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="all-photo-tab" href="#" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                    <div class="Comments"><i class="fa fa-comments"></i></div>
                                                    <div class="Count">102</div>
                                                </a>
                                                <div  class="comment_section pull-left" >
                                                    <div class="title">
                                                        <h2>Comments</h2>
                                                        <span class="line_title"></span>
                                                    </div>
                                                    <div class="comment_part">
                                                        <div class="person_image pull-left">
                                                            <img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/comment_person.png" >
                                                        </div>
                                                        <div class="Comment_detail pull-right">
                                                            <div class="comment_title">
                                                                <div class="commentPerson_name pull-left">
                                                                     <a class="profile-name" href="#"><h3>John</h3></a>
                                                                     <div class="comment_time pull-right">
                                                                     <p>Posted 2 hours ago</p>
                                                                </div> 
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="comment_desc pull-left">
                                                                <p>Hi there!</p>
                                                            </div>
                                                        </div>
                                                     </div>
                                                    <div class="leave_comment">
                                                        <div class="comment_input">
                                                            <textarea placeholder="Leave a comment..."></textarea>
                                                        </div>
                                                        <div class="Add_comment">
                                                            <input type="submit" value="Add Comment" >
                                                        </div>
                                                     </div>
                                                    <div class="back-button" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>"><a href="#"><i class="fa   fa-chevron-circle-left"></i></a> </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="" href="#">
                                                    <div class="print"><i class="fa fa-print"></i></div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="all-photo-tab" href="#" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                    <div class="share"><i class="fa fa-share-alt"></i></div>
                                                </a>
                                                <div class="comment_section  share-media pull-left" >
                                                    <div class="Social_share_part">
                                                        <div class="title">
                                                            <h2>Share We Doo</h2>
                                                            <span class="line_title"></span>
                                                        </div>
                                                        <div class="comment_part socil_media_part ">
                                                            <div class="Social-media-icons">
                                                                <div class="caption_title">
                                                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                                                    <a class="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                                                    <a class="Pintrest" href="#"><i class="fa fa-pinterest-p"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="download_button_media">
                                                                <button><i class="fa fa-download"></i> &nbsp;&nbsp;Download image</button>    
                                                            </div>
                                                        </div>
                                                        <div class="Link-of-website">
                                                            <h2>Link</h2>
                                                            <span class="line"></span><br >
                                                            <span class="Site_url">https://www.wedoo.com</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="back-button" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>"><a href="#"><i class="fa   fa-chevron-circle-left"></i></a> </div>
                                            </li>
                                            <li>
                                                <a class="all-photo-tab" href="#" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                    <div class="setting"><i class="fa fa-cog"></i></div>
                                                </a>
<!------ Start Edit Image------------->  

	                                                <div class="comment_section Photo-edit pull-left">
                                                	<div class="back-button" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>"><a href="#"><i class="fa   fa-chevron-circle-left"></i></a> </div>
                                                    <!--Photobox_inner_part -->
                                                    <div class="Photobox_inner_part content">
                                                        <!--Edit Section title -->
                                                        <div class="title">
                                                            <h2>Edit</h2>
                                                            <span class="line_title"></span>
                                                        </div>
                                                      
                                                        <div class="comment_part edit_part">
                                                            <div class="caption">
                                                                <div class="caption_title">
                                                                    <span class="title_cap">
                                                                        Caption
                                                                    </span>
                                                                </div>
                                                                <div class="caption_input">
                                                                    <input type="text" placeholder="Add Your Caption" value="<?php if(isset($photoGall['caption'])){ echo $photoGall['caption']; } ?>" class="txtcaption" name="txtcaption" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>" >
                                                                </div>
                                                            </div>
                                                            <div class="Album-slider">
                                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                                  <ol class="carousel-indicators">
                                                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                                  </ol>
                                                                  <div class="carousel-inner" role="listbox">
                                                                    <div class="item active preview rotateimgPreview">
                                                                      <img id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>" src="<?php echo Yii::app()->getBaseUrl(true).'/upload/album_image/'.$photoGall['photo_image'];?>" name="<?php echo $photoGall['photo_image']; ?>" >
                                                                    </div>
                                                                  </div>
                                                                <input type="hidden" class="txtdegree" name="txtdegree" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                                  <a class="left carousel-control rotateimg" href="#carousel-example-generic" role="button" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>" data-slide="prev" name="anticlockwise">
                                                                    <i class="fa fa-undo"></i>
                                                                    <span class="sr-only">Previous</span>
                                                                  </a>
                                                                  <a class="right carousel-control rotateimg" href="#carousel-example-generic" role="button" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>" data-slide="next" name="clockwise">
                                                                   <i class="fa fa-repeat"></i>
                                                                    <span class="sr-only">Next</span>
                                                                  </a>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <div class="caption_title">
                                                                    <span class="title_cap">
                                                                        Albums
                                                                    </span>
                                                                </div>
                                                                <div class="caption_input">
                                                                    <div class="Album_list">
                                                                        <div class="Album_box pull-left"></div>
                                                                        <div class="Album_box pull-left"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       </div>
                                                 
                                                    </div>
                                                    <div class="leave_comment Edit_control">
                                                         <div class="edit_button">   	
                                                            <div class="Add_comment pull-left">
                                                                <input type="submit" value="Delete Image" class="btndeleteimg" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                            </div>
                                                            <div class="Add_comment pull-right">
                                                                <input type="submit" value="Save Changes" class="btnsaveimg" id="<?php if(isset($photoGall['album_photo_id'])){ echo $photoGall['album_photo_id']; } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                               </div>
	
<!-- end of Edit image -->	
	
                                             
                                            </li>
                                        </ul>
                                    </div>
                                </div> 	
                           <?php }} ?> 
                            </div>
                        	<div id="grid-view" class="grid-view-content view-content" style="display:none" >
                                <div class="image-box pull-left">
                                    <img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/list-image-one.png" >
                                </div>
                            </div>
                    	</div>

</div>                        

</div>	
</div>
<script type="text/javascript">
$(document).ready(function(){
	<?php
	if(!empty($photoGallalbumModel)){ ?> 
		$('.allPhotoesView').show();
		$('.Nophotos').hide();
		<?php }else{ ?>
		$('.Nophotos').show();	
		$('.allPhotoesView').hide();
	<?php } ?>
	$('.back-button').hide();
    $(".all-photo-tab").click(function(){
    	var ID = $(this).attr('id');
            $(".all-photo-tab").removeClass('active');
            $(this).addClass('active');
            $('#'+ID+'.caption_box').hide();
			$('#'+ID+'.back-button').show();
			$('#'+ID+'.all-photo-tab').next().hide();
            $(this).next().show();
    });
     $(".back-button").click(function(){		
     		var ID = $(this).attr('id');
            $(".all-photo-tab").removeClass('active');
            $(this).addClass('active');
            $('#'+ID+'.caption_box').show();
			$('#'+ID+'.back-button').hide();
    });
    $('#photoimg').on('change', function(){
    			$('.allPhotoesView').show();
    			$('.Nophotos').hide();
			    $(".appendSlide").html('');
			    $(".appendSlide").html('<img src="<?php echo Yii::app()->getBaseUrl(true)?>/site-images/image_loader.gif" alt="Uploading...."/>');
				$("#imageform").ajaxForm({
					target: '.appendSlide',
					success: function () {
            			$('.back-button').hide();
				    $(".all-photo-tab").click(function(){
				    	var ID = $(this).attr('id');
				            $(".all-photo-tab").removeClass('active');
				            $(this).addClass('active');
				            $('#'+ID+'.caption_box').hide();
							$('#'+ID+'.back-button').show();
							$('#'+ID+'.all-photo-tab').next().hide();
				            $(this).next().show();
				    });
				     $(".back-button").click(function(){		
				     		var ID = $(this).attr('id');
				            $(".all-photo-tab").removeClass('active');
				            $(this).addClass('active');
				            $('#'+ID+'.caption_box').show();
							$('#'+ID+'.back-button').hide();
				    });
				    	var d = 0;
				        $('.rotateimg').click(function(){
					    var ID = $(this).attr('id');	
					    var a = $('.rotateimgPreview').find('img#'+ID).getRotateAngle();
					    //var d = Math.abs(90);
					    
					    if($(this).attr('name') == 'anticlockwise'){
					         d -= 90;
					    }else{d += 90;}
					    $('#'+ID+'.txtdegree').val(d);
					    $('.rotateimgPreview').find('img#'+ID).rotate({animateTo:d});
					});
					
					$('.btnsaveimg').click(function(event){
						event.preventDefault();		
					var ID = $(this).attr('id');	
					var imgcaption = $('#'+ID+'.txtcaption').val();
					var imgName = $('.rotateimgPreview').find('img#'+ID).attr('name');
					var imgDegree = $('#'+ID+'.txtdegree').val();
					
					var dataString = 'caption='+imgcaption+'&imgname='+imgName+'&degree='+imgDegree;
					$.ajax({
								type: 'POST',
								url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Album/RotateImageSave',
								data: dataString,
								cache:false,
								async:true,
								beforeSend: function(data){},
								success: function(data){
								 location.reload(true);
					          }
					        }); 
						
					});
        			}
					}).submit();	
	});
	var d = 0;
    $('.rotateimg').click(function(){
    var ID = $(this).attr('id');	
    var a = $('.rotateimgPreview').find('img#'+ID).getRotateAngle();
   // var d = Math.abs(90);
    
    if($(this).attr('name') == 'anticlockwise'){
         d -= 90;
    }else{d += 90;}
    $('#'+ID+'.txtdegree').val(d);
    $('.rotateimgPreview').find('img#'+ID).rotate({animateTo:d});
});
$('.btnsaveimg').click(function(event){
	event.preventDefault();		
var ID = $(this).attr('id');	
var imgcaption = $('#'+ID+'.txtcaption').val();
var imgName = $('.rotateimgPreview').find('img#'+ID).attr('name');
var imgDegree = $('#'+ID+'.txtdegree').val();

var dataString = 'caption='+imgcaption+'&imgname='+imgName+'&degree='+imgDegree+'&album_gallery_id='+ID;
$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Album/RotateImageSave',
			data: dataString,
			cache:false,
			async:true,
			beforeSend: function(data){},
			success: function(data){
			 location.reload(true);
                       // $('.preview').html(data);	
                        }
        }); 
	
});
});
</script> 
<!--Guest person profile adjust-->
<script type="text/javascript">
    $(document).ready(function() {
        $(".profile-name").click(function() {
            var slideMenu = $(this).attr("data-popId");
            if ($(this).hasClass("active")){
                $(this).removeClass('active');
                $(".Guest_person").css("display","block");
                $(".photo-comment").css("width","65%");
            }
            else {
                $(".profile-name").removeClass('active');
                $(this).addClass('active');
                $(".Guest_person").css("display","none");
                $(".photo-comment").css("width","100%");
            }
        });
    });
</script>
<!--Guest person profile adjust -->

<!--hide guest person profile from grid view -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".grid-view ").click(function() {
            var slideMenu = $(this).attr("data-popId");
            if ($(this).hasClass("active")){
                $(this).removeClass('active');
                $(".Guest_person").css("display","none");
                $(".photo-comment").css("width","100%");
            }
            else {
                $(".grid-view").removeClass('active');
                $(this).addClass('active');
                $(".Guest_person").css("display","none");
                $(".photo-comment").css("width","100%");
            }
        });
    });
</script>
<script>
$("#photo-comment").mCustomScrollbar({
    horizontalScroll:true,
    theme:"rounded-dots",
    advanced:{
        autoExpandHorizontalScroll:true
    }
});
$(".Photobox_inner_part").mCustomScrollbar({
        scrollInertia:150
    });
    $(".vertical-scroll-menu").mCustomScrollbar({
        set_height:"85%",
        mouseWheel:false
});
$(window).on("laod resize",function(){
var winWidth = $(window).width();
    if( winWidth <= 980){
    $("#photo-comment").addClass("vertical-scroll-menu").removeClass("photo-comment");				
}else {
    $("#photo-comment").addClass("photo-comment").removeClass("vertical-scroll-menu");				
    
}
});
</script>
<!-- <script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/custom.js"></script> -->
<script>
$(".slideshow-link").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/SlideShow";	
});
</script>
<script type="text/javascript">
$(".likes").click(function(event){
event.preventDefault();
var albumID = $(this).attr('id');
var totalLikesCount =  $(this).next('.totallikes');
var likeHeartColor = $(this).find('.likeHeart');
likeHeartColor.addClass('fa-heart').removeClass('fa-heart-o');
 		$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Album/AlbumLike",
					cache:false,
					data:{id:albumID},
					dataType:"json",
					success: function(data){
						totalLikesCount.html(data[2]);
						if(data){
							if(data[0]==true){
								likeHeartColor.css('color','');
							}else if(data[1]== true){
									likeHeartColor.css('color','#D26B79');	
							}
									
						}
						
					}
			});
});	
</script>