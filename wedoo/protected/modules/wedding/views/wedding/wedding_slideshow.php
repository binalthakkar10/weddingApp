<div id="slider">
<script type="text/javascript">
	jQuery(function($){
		$.supersized({
			// Functionality
			slideshow               :   1,			// Slideshow on/off
			autoplay				:	1,			// Slideshow starts playing automatically
			start_slide             :   1,			// Start slide (0 is random)
			stop_loop				:	0,			// Pauses slideshow on last slide
			random					: 	0,			// Randomize slide order (Ignores start slide)
			slide_interval          :   3000,		// Length between transitions
			transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed		:	1000,		// Speed of transition
			new_window				:	1,			// Image links open in new window/tab
			pause_hover             :   0,			// Pause slideshow on hover
			keyboard_nav            :   1,			// Keyboard navigation on/off
			performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
			image_protect			:	1,			// Disables image dragging and right click with Javascript
													   
			// Size & Position						   
			min_width		        :   0,			// Min width allowed (in pixels)
			min_height		        :   0,			// Min height allowed (in pixels)
			vertical_center         :   1,			// Vertically center background
			horizontal_center       :   1,			// Horizontally center background
			fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
			fit_portrait         	:   1,			// Portrait images will not exceed browser height
			fit_landscape			:   0,			// Landscape images will not exceed browser width
													   
			// Components							
			slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
			thumb_links				:	1,			// Individual thumb links for each slide
			thumbnail_navigation    :   0,			// Thumbnail navigation
			slides 					:  	[			// Slideshow Images
												{image : '<?php echo Yii::app()->getBaseUrl(false)?>/images/slider_image_one.png', title : 'Engagement Celebration one', thumb : '', url : ''},
												{image : '<?php echo Yii::app()->getBaseUrl(false)?>/images/slider_image_one.png', title : 'Engagement Celebration two', thumb : '', url : ''},  
												{image : '<?php echo Yii::app()->getBaseUrl(false)?>/images/slider_image_one.png', title : 'Engagement Celebration three', thumb : '', url : ''},
												{image : '<?php echo Yii::app()->getBaseUrl(false)?>/images/slider_image_one.png', title : 'Engagement Celebration four', thumb : '', url : ''},
												{image : '<?php echo Yii::app()->getBaseUrl(false)?>/images/slider_image_one.png', title : 'Engagement Celebration five', thumb : '', url : ''}
											   
										],
										
			// Theme Options			   
			progress_bar			:	1,			// Timer for each slide							
			mouse_scrub				:	0
			
		});
	});
</script>
			
<!--Tab menu Options-->
<div class="slider_control">
    <a class="play_button">
        <img id="pauseplay" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/pause.png"/>
    </a>

    <a class="buttons_control" data-popId="box">
        <i class="fa  fa-camera"></i>
    </a>

    <a class="buttons_control" data-popId="setting"><i class="fa fa-cog"></i></a>
    <a class="buttons_control" data-popId="comment"><i class="fa fa-comments"></i></a>

    <div class="fs" align="center">
        <a class="buttons_control" href="javascript:void(0)" onclick="javascript:toggleFullScreen()"><i class="fa  fa-arrows-alt"></i></a>
    </div>
        
    <div class="rs" align="center">
        <a class="buttons_control" href="javascript:void(0)" onclick="javascript:toggleFullScreen()"><i class="fa fa-compress"></i></a>
    </div>  

    <a class="buttons_control close_button" data-popId="close_popup" > <i class="fa fa-undo"></i></a>
</div>
<!--Tab menu Options -->

<!--Tab Content -->
<div class="menu_section">
    	<div id="box" class="menu option_one">
        	<!--Album Tab Content -->
        	<div class="Albums">
            	<!--Tab Title -->
            	<div class="title">
                	<h2>Select Photos</h2>
                    <span class="line_title"></span>
                </div>
                <!--Tab Title -->
                
                <!--Tag Line -->
                <!--<div class="tag_line">
                	<p>Which albums do you want to include in the slideshow?</p>
                </div> -->
                <!--Tag Line -->
                
                <!--Functions category -->
                <div class="category_function">
                	<!--Honey moon Box -->
                	<div class="honeymoon category pull-left">
                    	<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/select-photo-one.png" >
                    	<!--<span class="count pull-right">1</span>
                        <div class="clearfix"></div>
                        <div class="image">
                        	<img class="main_img" src="images/honeymoon.png" ><img class="hover" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/honeymoon_hover.png"  />
                        </div>
                        <div class="title_category">
                        	Honeymoon
                        </div> -->
                    </div>
                    <!--Honey moon Box -->
                    
                    <!--Receptio Box -->
                    <div class="reception category pull-left">
                    	<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/select-photo-two.png" >
                    	<!--<span class="count pull-right">1</span>
                        <div class="clearfix"></div>
                        <div class="image">
                       		<img class="main_img" src="images/reception.png" ><img class="hover" src="images/reception_hover.png"  />
                        </div>
                        <div class="title_category">
                        	reception
                        </div> -->
                    </div>
                    <!--Receptio Box -->
                    
                    <!--Ceramany Box -->
                    <div class="ceraymany category pull-left">
                    	<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/select-photo-three.png" >
                    	<!--<span class="count pull-right">1</span>
                        <div class="clearfix"></div>
                        <div class="image">
                        	<img class="main_img" src="images/cerymoney.png" ><img class="hover" src="images/ceremany_image_hover.png"  />
                        </div>
                        <div class="title_category">
                        	ceremony
                        </div> -->
                    </div>
                    <!--ceramany Box -->
                </div>
                <!--Function Category -->
                <div class="suggest-text">
                	<div class="tag-line pull-left">
                    	<div class="tag-icon-text pull-left">
                        	<i class="fa  fa-caret-square-o-right"></i>
                        </div>
                        <div class="tag-title-text pull-right">
                        	The slideshow will resume when you close the photos panel.
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="selected-photos pull-right">
                	1 Photo Selected
                </div>
            <!--Album Tab Content -->
        </div>
        <!--Settins Tab Content -->
        <div id="setting" class="menu option_two">
        	<!--Settins Tab Content -->
       		<div class="Albums">
            	<!--Tab Title -->
            	<div class="title">
                	<h2>Slideshow Settings</h2>
                    <span class="line_title"></span>
                </div>
                <!--Tab Title -->
                
                <!--Settins Form -->
                <div class="category_function Setting_tab ">
                	<!--Seed Of Animarion -->
                    <div class="option one pull-left">
                    	<div class="title_option">Speed</div>
                        <div class="input_option">
                       <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
                        </div>
                    </div>
                    <!--Speed of Animation -->
                    
                    <!--Caption Select -->
                    <div class="option two pull-left">
                    	<div class="title_option">Caption</div>
                        <div class="input_option">
                        	<select class="selectpicker">
                            	<option>Show at top</option>
                            </select>
                        </div>
                    </div>
                    <!--Caption Select -->
                    
                    <!--Play Automatically -->
                    <div class="option three pull-left">
                    	<div class="title_option">Videos</div>
                        <div class="input_option">
                        	<select class="selectpicker">
                            	<option>Play Automatically</option>
                            </select>
                        </div>
                    </div>
                    <!--Play Automatically-->
                    
                    <!--Orders-->
                    <div class="option four pull-left">
                    	<div class="title_option">Orders</div>
                        <div class="input_option">
                        	<select class="selectpicker">
                            	<option>Top To Bottom</option>
                            </select>
                        </div>
                    </div>
                    <!--Orders-->
                </div>
                <!--Settins Form -->
				
				<!--footer -->
                <div class="suggest-text">
                	<div class="tag-line pull-left">
                    	<div class="tag-icon-text pull-left">
                        	<i class="fa  fa-caret-square-o-right"></i>
                        </div>
                        <div class="tag-title-text pull-right">
                        	The slideshow will resume when you close the photos panel.
                        </div>
                    </div>
                </div>
                <!--footer -->
				
            </div>
            <!--Settins Tab Content -->
       </div>
       	<!--Settins Tab Content -->
        
        <!--Comment Tab Content -->
        <div id="comment" class="menu option_three">
        	<!--Tab Content Inner Div -->
         	<div class="Albums">
            	<!--Tab Title -->
            	<div class="title">
                	<h2>Comments</h2>
                    <span class="line_title"></span>
                </div>
                <!--Tab Title -->
                
                <!--Comments Tab Part -->
                <div class="category_function Comment_tab ">
                	<!--Comment Box -->
                	<div class="comment_part">
                    	<!--Person Of Commnet -->
                    	<div class="person_image pull-left">
                        	<img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/comment_person.png" >
                        </div>
                        <!--Person Of Commnet -->
                        
                        <!--Comment Description -->
                        <div class="Comment_detail pull-right">
                        	<!--About Comment -->
                        	<div class="comment_title">
                                <div class="commentPerson_name pull-left">
                                    <h3>John</h3>
                                </div>
                                <div class="comment_time pull-right">
                                    <p>Posted 2 hours ago</p>
                                </div>
                            </div>
                            <!--About Comment -->
                            <div class="clearfix"></div>
                            <!--Comment Content -->
                            <div class="comment_desc pull-left">
                        		<p>Hi there!</p>
                        	</div>
                            <!--Comment Content -->
                        </div>
                        <!--Comment Description -->
                    </div>
                    <!--Comment Box -->
					
					<!--Write comment -->
                    <div class="write-comment pull-left">
                    	<textarea placeholder="Leave a Comment"></textarea>
                        <a class="pull-left" href="#"><i class="fa fa-heart"></i></a>
                        <input class="pull-right" type="submit" value="ADD COMMENT" >
                    </div>
                    <!--Write comment -->
					
                </div>
                <!--Comments Tab Part -->
            </div>
            <!--Tab Content Inner Div -->
         </div>
         <!--Comment Tab Content --> 
</div>
<!--Tab Content -->
 
<!--Slide Title -->    
<span class="close"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/pop_up_close.png" /></span><br /></span></li>
<!--Slide Title --> 

<!--Arrow Navigation-->
<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>

<!--Arrow Navigation-->
<div id="slidecaption"> </div> 
<!--<ul id="slide-list"></ul> -->


<!--Js -->
<script type='text/javascript' src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap-slider.js"></script>
<script type='text/javascript'>
var $ = jQuery.noConflict();
    	$(document).ready(function() {
    		$('#ex1').slider({
	          	formatter: function(value) {
	            	return 'Current value: ' + value;
	          	}
	        });
    	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".buttons_control").click(function() {
			var slideMenu = $(this).attr("data-popId");
			var leftPsosi = $(".slider_control").width();
			if ($(this).hasClass("active")){
				$(this).removeClass('active');
				$(".menu").css("left","-700px");
			}
			else {
				$(".buttons_control").removeClass('active');
				$(this).addClass('active');
				$(".menu").css("left","-600px");
				$('#' + slideMenu).css("left",leftPsosi+'px');
			}
		});
		$("#close_popup").click(function(){
			$(".menu").css("left","-600px");
			$(this).removeClass('active');
			//$(".buttons_control").removeClass('active');
		})
	});
</script>
<script>
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		 $('.selectpicker').selectpicker();
	});
</script>
<!--Js -->
</div>