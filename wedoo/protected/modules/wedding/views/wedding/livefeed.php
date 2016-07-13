 <!--admin-content -->
<div id="admin-content">
<!--admin-main -->
	<div class="admin-main">
		<!--live-feed-main -->
		<div class="live-feed-main">
			<!--feed header-->
			<section class="admin-white-head">
				<h1><span>Live Feed</span></h1>
			</section> 
			<!--feed header-->
			<!--feed -->
			<div class="feed">
				<!--feed-list-main -->
				<div class="feed-list-main">
					<!--feed-list -->
					<div class="feed-list">
						<!--feed-sub-list -->
						<ul class="feed-sub-list">
							<!-- user 1 -->
							<li class="feed-sub-list-li">
							<!-- main div -->
									<!-- img div-->
									<div class="feed-user-pic">
										<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-user-1.png" />
									</div>
									 <!-- img div-->
									<!-- info div -->
									<div class="feed-info">
										<div class="feed-user-name">
											Jerry E. Guzman
										</div>
										<p class="feed-desc">
											Lorem ipsum dolor sit amet, consectetur a eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,dipiscing elit, sed do eiusmod tempor 
										</p>
										<div class="feed-btns">
											<ul>
												<li><a href="#"><i class="fa fa-reply"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- info div-->
							</li>
							<!-- user 1 -->
							<!-- user 2 -->
							<li class="feed-sub-list-li">
							<!-- main div -->
									<!-- img div-->
									<div class="feed-user-pic">
										<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-user-2.png" />
									</div>
									<!-- info div -->
									<div class="feed-info">
										<div class="feed-user-name">
											Arlene D. McCants
										</div>
										<p class="feed-desc">
											Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,                                                    </p>
										<div class="feed-btns">
											<ul>
												<li><a href="#"><i class="fa fa-reply"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- info div-->
							</li>
							<!-- user 2 -->
							<!-- user 3 -->
							<li class="feed-sub-list-li">
							<!-- main div -->
									<!-- img div-->
									<div class="feed-user-pic">
										<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-user-3.png" />
									</div>
									<!-- info div -->
									<div class="feed-info">
										<div class="feed-user-name">
											Maria J. Gonzalez
										</div>
										<p class="feed-desc">
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.                                                    </p>
										<div class="feed-btns">
											<ul>
												<li><a href="#"><i class="fa fa-reply"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- info div-->
							</li>
							<!-- user 3 -->
							<!-- user 4 with photo -->
							<li class="feed-sub-list-li">
							<!-- main div -->
									<!-- img div-->
									<div class="feed-user-pic">
										<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-user-4.png" />
									</div>
									<!-- img div-->
									<!-- info div -->
									<div class="feed-info">
										<div class="feed-user-name">
											Robert D. Murray
										</div>
										<p class="feed-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
										<ul class="inner-image-feed">
											<li class="first-inner-div">
												<div class="large-feed-img">
													<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-large1.png" />
												</div>
											</li>
											<li>
												<div class="small-feed-img"><img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-small1.png" /></div>
												<div class="small-feed-img"><img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-small2.png" /></div>
											</li>
										</ul>
										<div class="feed-btns">
											<ul>
												<li><span class="inner-feed-pic-view"><a href="#">View photo</a></span></li>
												<li><a href="#"><i class="fa fa-reply"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- info div-->
							</li>
							<!-- user 4 -->
							<!-- user 5 -->
							<li class="feed-sub-list-li">
									<!-- img div-->
									<div class="feed-user-pic">
										<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-user-5.png" />
									</div>
									<!-- info div -->
									<div class="feed-info">
										<div class="feed-user-name">
											Beverly R. Gibson
										</div>
										<p class="feed-desc">
											Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,                                                    </p>
										<div class="feed-btns">
											<ul>
												<li><a href="#"><i class="fa fa-reply"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</div>
									</div>
									<!-- info div-->
							</li>
							<!-- user 5 -->
						</ul>
						<!--feed-sub-list -->
					</div>
					<!--feed-list -->
				</div>
				<!--feed-list-main -->
				
				<div class="live5feed"><a href="#">View 5 Live feed</a></div>
				<!-- comment -->
				<div class="comment-feed-box">
					<div class="comment-user-pic">
						<img src="<?php echo Yii::app()->getBaseUrl(false); ?>/images/feed-comment-pic.png" width="45" height="45"/>
					</div>
					
					<div class="input-group pull-left send-comment-feed">
							 <input type="text" aria-label="Text input with segmented button dropdown" class="form-control textbox-feed">
							<div class="input-group-btn grp-feed">
								<button class="btn send-feed" type="button">Send</button>
								<button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle planebtn" type="button">
									<i class="fa fa-send-o"></i>
							  </button>
						 </div>
					</div>
					
					<div class="addvideophoto">
						<label class=""><i class="fa fa-camera"></i><span>Add Photo</span><input type="file" class="upload_img"></label>
						<label class=""><i class="fa fa-video-camera"></i><span>Add Video</span><input type="file" class="upload_img"></label>
					</div>
					
			   </div>
			   <div class="clearfix"></div>
			   <span class="feed-char">140</span>
				<!-- comment -->
			 </div>
			<!--feed -->
		</div>
		<!--live-feed-main -->
	</div>    
	<!--admin-main -->
</div>
<!--admin-content -->