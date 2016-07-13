<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.form.js"></script>
<?php 
session_start();
$weddingData= Wedding::model()->find("wedding_id='".$_SESSION['wedding_id']."'");?>
	<aside id="side-bar-menu" class="col-lg-2 col-md-3 col-sm-4">
            	<div class="logo">
                	<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin-logo.png"></a>
                </div>
                <div class="icon-bar">
                	<ul class="noti-nav">
                    	<li><a href="#"><i class="fa fa-upload"></i></a></li>
                    	<li><a href="javascript:" class="orderprint"><i class="fa fa-print"></i></a></li>
                    	<li><a data-dropid="#notification" href="#"><i class="fa fa-bell"></i><span>2</span></a></li>
                    	<li><a data-dropid="#settings" href="#"><i class="fa fa-gear"></i></a></li>
                    </ul>

                    <ul id="notification" class="noti-drop">
                    	<li><a href="#">Notification 1</a></li>
                    	<li><a href="#">Notification 2</a></li>
                    	<li><a href="#">Notification 3</a></li>
                    	<li><a href="#">Notification 4</a></li>
                    	<li><a href="#">Notification 5</a></li>
                    	<li><a href="#">Notification 6</a></li>
                    </ul>
                    <ul id="settings" class="noti-drop">
                    	<li>
                        	<a href="javascript:" class="viewuserprofile">
                            	<i class="fa fa-user"></i>
                                <span>View User profile</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" class="ediusertprofile">
                            	<i class="fa fa-pencil ediusertprofile" ></i>
                            	<span>edit user profile</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="#">
                            	<i class="fa fa-info-circle"></i>
	                            <span>past orders</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="#" id="choose-wedding">
                            	<i class="fa fa-toggle-on"></i>
    	                        <span>switch weddings</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" class="createnewwedding">
                            	<i class="fa fa-plus-circle"></i>
        	                    <span>create a new wedding</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" class="faq">
                            	<i class="fa fa-question-circle"></i>
            	                <span>faq</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" id="logout">
                            	<i class="fa fa-home"></i>
                	            <span>go to wedoo.com</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" id="logout">
                            	<i class="fa fa-sign-out"></i>
                    	        <span>logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--icon-bar -->
                <!--side-prfl-img -->
                <div class="side-prfl-img">
                	<span class="cut-crnr"></span>
					<?php if(!isset($weddingData['image']) || $weddingData['image'] == "") {	?>
						<img class="pro-img" src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/side-bar-image.jpg">
					<?php } else { ?>
						<img class="pro-img" src="<?php echo Yii::app()->getBaseUrl(true); ?>/upload/wedding/<?php echo $weddingData['image']; ?>">
					
					<?php } ?>
                    <a class="edit editprofile" href="javascript:"><i class="fa fa-pencil"></i></a>
                </div>
                <!--side-prfl-img -->
                <!--wedng-id -->
                <span class="wedng-id">
                	Wedding ID: <span>
                		<?php if (isset($weddingData['wedding_uniq_id']) && !empty($weddingData['wedding_uniq_id'])) { echo $weddingData['wedding_uniq_id'];$_SESSION['wedding_uniq_id']=$weddingData['wedding_uniq_id']; } 
						$checkInvite=InviteFriend::model()->find("wedding_uniq_id = '".$_SESSION['wedding_uniq_id']."'  AND invite_email='".$_SESSION['email']."'");
						if(isset($checkInvite) && !empty($checkInvite))
						{
						    $_SESSION['make_admin']=$checkInvite['make_admin']; 
		                    $_SESSION['is_block']=$checkInvite['is_block'];
						}
						?>
                	</span>
                </span>
                <!--wedng-id -->
                <!--wding-day-counter -->
                <div class="wding-day-counter">
                    <i class="fa fa-calendar-o"></i>
                    <ul class="counnter">
                    	<li>0</li>
                    	<li>0</li>
                    	<li>1</li>
                    	<li><span>Day to go</span></li>
                    </ul>
                </div>
                <!--wding-day-counter -->
                <!--sidebar-nav -->
                <nav id="sidebar-nav">
                	<ul>
                    	<li>
                        	<a href="javascript:" class="inviteGuests" id="activeinviteguests">
                                <i class="fa fa-user-plus"></i>
                            	<span>Invite Guests</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" class="photoalbum" id="activephotoalbum">
                                <i class="fa fa-photo"></i>
                            	<span>photo albums</span>
                            </a>
                            <span class="side-submenu"><i class="fa fa-arrow-circle-o-down"></i></span>
                            <!--side-submenu -->
                            <ul id="side-submenu">
                            	<li>
                                	<a href="javascript:" class="ManageAlbum" id="activemanagealbum">
		                                <i class="fa fa-gears"></i>
                                        <span>Manage albums</span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="#">
		                                <i class="fa fa-cloud-download"></i>
                                        <span>Download</span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="#">
		                                <i class="fa fa-facebook-square"></i>
                                        <span>push to facebook</span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="javascript:" class="slideshow-link" id="activeslideshow">
		                                <i class="fa fa-play-circle"></i>
                                        <span>slideshow</span>
                                    </a>
                                    <span class="line"></span>
                                </li>
                            	<li>
                                	<a href="#">
		                                <i class="fa fa-photo"></i>
                                        <span>all photos</span>
                                    </a>
                                    <span class="notifi">2</span>
                                </li>
                                	<div class="manageAllAlbum">
						            <?php 
									session_start();
										$album = (Yii::app()->db->createCommand("SELECT album.*,album_category.album_cate_name,album_category.album_cover_image,album_category.user_id as albumCatuserid FROM album 
																					JOIN album_category ON album.album_category_id=album_category.album_cate_id WHERE 
																					 album.wedding_id='".$_SESSION['wedding_id']."' AND album.is_delete='0'  ORDER BY album.position ASC  " ));
										$model = $album->queryAll();
										if($model){
										foreach($model as $albumModel){ 
									?>
									<li>
										<a href="#" id="<?php echo $albumModel['album_cate_name']; ?>" class="userCustomAlbums"> 	
                                		<?php if($albumModel['album_cate_name']=='HONEYMOON'){ ?>
		                                <i class="fa fa-heart"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='RECEPTION'){ ?>
		                                 <i class="fa fa-glass"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='CEREMONY'){ ?>
		                                <i class="fa fa-diamond"></i>	
		                                <?php }elseif($albumModel['album_cate_name']=='FIRST ANNIVERSARY'){ ?>
		                                <i class="fa fa-slideshare"></i>	
		                                <?php }elseif($albumModel['album_cate_name']=='ENGAGEMENT'){ ?>
		                                <i class="fa fa-venus-mars"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='MEMORY LANE'){ ?>
		                                <i class="fa fa-child"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='BACHELOR PARTY'){ ?>
		                                <i class="fa fa-users"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='BACHELORETTE PARTY'){ ?>
		                                <i class="fa fa-street-view"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='WEDDING SHOWER'){ ?>
		                                <i class="fa fa-heartbeat"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='PLANNING'){ ?>
		                                <i class="fa fa-indent"></i>
		                                <?php }elseif($albumModel['album_cate_name']=='REHEARSAL DINNER'){ ?>
		                                <i class="fa fa-cutlery"></i>
		                                <?php }else{ ?>
		                                	<i class="fa fa-photo"></i>
		                                <?php } ?>	
		                               							
                                        <span id="<?php echo $albumModel['album_id']; ?>" class="first-anniversary-icon"><?php echo $albumModel['album_cate_name']; ?></span>
                                    </a>
                                    <span class="notifi">2</span>
                                     </li>
                                    <?php }} ?>
                               </div>
                            </ul>
                            <!--side-submenu -->
                        </li>
                    	<li>
                        	<a href="javascript:" class="eventInfo" id="activeevent">
                                <i class="fa fa-calendar"></i>
                            	<span>Events</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" class="accommodations" id="activeaccomodations">
                                <i class="fa fa-building"></i>
                            	<span>accomModations</span>
                            </a>
                        </li>
                    	<li>
                        	<a href="javascript:" class="orderprint" id="activeorderprint">
                                <i class="fa fa-print"></i>
                            	<span>order prints</span>
                            </a>
                        </li>
						<?php $invite=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND invite_email='".$_SESSION['email']."' AND is_block='0'")); 
						      if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) {
						?>
                    	<li>
                        	<a href="javascript:" class="ordercard" id="activeordercard">
                                <i class="fa fa-square-o"></i>
                            	<span>order app cards</span>
                            </a>
                            <span class="side-submenu"><i class="fa fa-arrow-circle-o-down"></i></span>
                            <!--side-submenu -->
                            <ul id="side-submenu">
                            	<li>
                                	<a href="javascript:" class="printOwn" id="activeprintown">
		                                <i class="fa fa-gears"></i>
                                        <span>PRINT YOUR OWN</span>
                                    </a>
                                </li>
                                
                            </ul>
                            <!--side-submenu -->
                        </li>
						<?php } elseif(isset($invite) && ($invite==0)) {  ?>
						   <li>
                        	<a href="javascript:" class="ordercard" id="activeordercard">
                                <i class="fa fa-square-o"></i>
                            	<span>order app cards</span>
                            </a>
                            <span class="side-submenu"><i class="fa fa-arrow-circle-o-down"></i></span>
                            <!--side-submenu -->
                            <ul id="side-submenu">
                            	<li>
                                	<a href="javascript:" class="printOwn" id="activeprintown">
		                                <i class="fa fa-gears"></i>
                                        <span>PRINT YOUR OWN</span>
                                    </a>
                                </li>
                                
                            </ul>
                            <!--side-submenu -->
                        </li>
						<?php } ?>
						<?php 
						   
						if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
                    	<li>
                        	<a href="javascript:" >
                                <i class="fa fa-pencil"></i>
                            	<span>Edit wedding info</span>
                            </a>
                            <span class="side-submenu"><i class="fa fa-arrow-circle-o-down"></i></span>
                            <!--side-submenu -->
                            <ul id="side-submenu">
                            	<li>
                                	<a href="javascript:" class="visitpage" id="activevisitpage">
		                                <i class="fa fa-gears"></i>
                                        <span>EDIT WEDOO INFO</span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="javascript:" class="coloredit" id="activecoloredit">
		                                <i class="fa fa-cloud-download"></i>
                                        <span>EDIT COLOR SCHEME </span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="javascript:" class="site" id="activesite">
		                                <i class="fa fa-facebook-square"></i>
                                        <span>ADD WEDOO TO SITE</span>
                                    </a>
                                </li>
                            	
                            </ul>
                            <!--side-submenu -->
                        </li>
						<?php } elseif(isset($invite) && ($invite==0)) {  ?>
						
						    <li>
                        	<a href="javascript:" >
                                <i class="fa fa-pencil"></i>
                            	<span>Edit wedding info</span>
                            </a>
                            <span class="side-submenu"><i class="fa fa-arrow-circle-o-down"></i></span>
                            <!--side-submenu -->
                            <ul id="side-submenu">
                            	<li>
                                	<a href="javascript:" class="visitpage" id="activevisitpage">
		                                <i class="fa fa-gears"></i>
                                        <span>EDIT WEDOO INFO</span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="javascript:" class="coloredit" id="activecoloredit">
		                                <i class="fa fa-cloud-download"></i>
                                        <span>EDIT COLOR SCHEME </span>
                                    </a>
                                </li>
                            	<li>
                                	<a href="javascript:" class="site" id="activesite">
		                                <i class="fa fa-facebook-square"></i>
                                        <span>ADD WEDOO TO SITE</span>
                                    </a>
                                </li>
                            	
                            </ul>
                            <!--side-submenu -->
                        </li>
						<?php } ?>
                    	<li>
                        	<a href="#">
                                <i class="fa fa-leanpub"></i>
                            	<span>Booklet Management</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--sidebar-nav -->
                <!--side-ft -->	
                <div class="side-ft">
                	<ul>
                    	<li><a href="#">TERMS OF SERVICE</a></li>
                        <li><a href="#">PRIVACY POLICY</a></li>
                    </ul>
                    <span>© 2015 Wedoo Inc.</span>
                </div>
                <!--side-ft -->
               
            </aside>
<!-- Header --->
<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12  admin-main-page">
            	<a id="menu-triger" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/menu-trigger.jpg"></a>
                <div class="side-overlay"></div>
            	<div class="admin-header">
            <div class="admin-logo">
                    	<span>
                    		<?php //p($weddingData);
							if (isset($weddingData['to_bride_name']) && !empty($weddingData['to_bride_name'])) {$brideName = $weddingData['to_bride_name'];
							} elseif (isset($weddingData['to_partner_name']) && !empty($weddingData['to_partner_name'])) {$brideName = $weddingData['to_partner_name'];
							} elseif (isset($weddingData['to_groom_name']) && !empty($weddingData['to_groom_name'])) {$brideName = $weddingData['to_groom_name'];
							}
							echo ucfirst($brideName);
							?>
                    	</span>
                    	<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin-topbar-logo.png">
                    		<span> 
                    		<?php
								if (isset($weddingData['from_groom_name']) && !empty($weddingData['from_groom_name'])) {
									$groomName = $weddingData['from_groom_name'];
								} elseif (isset($weddingData['from_bride_name']) && !empty($weddingData['from_bride_name'])) {
									$groomName = $weddingData['from_bride_name'];
								} elseif (isset($weddingData['from_partner_name']) && !empty($weddingData['from_partner_name'])) {
									$groomName = $weddingData['from_partner_name'];
								}
								// elseif (isset($weddingData['from_bride_name']) && !empty($weddingData['from_bride_name'])) {
									// $groomName = $weddingData['from_bride_name'];
								// }
								
								echo ucfirst($groomName); ?>
								</span>
                    </div>
                    <a id="admin-topmenu-triger" href="javascript:void(0)"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/menu.png"></a>
                    
                         <ul class="admin-top-nav">
                    	<li>
                        	<a href="#" data-cuspop="upload-pic" class="cust-pop-trigger">
                                <i class="fa fa-upload"></i>
                                <span>UpLoad</span>
                            </a>                       
                        </li>
                    	<li>
                        	<a href="#" class="livefeed" >
                                <i class="fa fa-list-alt"></i>
                                <span>Live Feed</span>
                            </a>                       
                        </li>
                    	<li>
                        	<a href="#">
                            	<i class="fa fa-star-o"></i>
                                <span>Rate</span>
                            </a>                       
                        </li>
                    	<li>
                        	<a href="#">
                            	<i class="fa fa-envelope-o"></i>
                                <span>Contact Us</span>
                            </a>                       
                        </li>
                    	<li>
                        	<a href="#">
                            	<i class="fa fa-headphones"></i>
                                <span>Help</span>
                            </a>                       
                        </li>
                    </ul>
               
                </div>
<div class="loaderdiv"></div>                  
<div id="choos-wed" class="custom-pop">
                    	<div class="overlay"></div>
                        <!--custom-pop-inner -->
                        <section class="custom-pop-inner">
                        	<a id="pop-close" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/choos-close.png"></a>

							<span class="choos-pop-head">CHOOSE A WEDDING</span>
                            <!--choos-cont -->	
                            <div class="choos-cont">
                                <form id="frmChooseWedding" name="frmChooseWedding" method="post">
                                    <input type="text" name="txtWeddingId" id="txtWeddingId" placeholder="NEW WEDDING ID" class="choos-txbx">
                                    <input type="button" id="btnChooseWedding" name="btnChooseWedding" class="choos-txbt">
                                </form>
                                
                                <section class="wed-lits">
                                    <ul>
                                    	<?php if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ ?>
                                    		<?php $getWeddingList = Wedding::model()->findAll("user_id = '".$_SESSION['uid']."'");
											$inviteData=InviteFriend::model()->findAll("invite_email = '".$_SESSION['email']."' AND is_block='0'");
											?>
                                    		<?php if($getWeddingList){?>
                                    		<?php foreach ($getWeddingList as $weddingList){?>
                                    		<a href="javascript:;" class="wedding_choose_click" id="<?php echo $weddingList['wedding_uniq_id']; ?>" onClick="choosewedding(this);">
		                                    	<li>
		                                    		<?php 
		                                    			if(isset($weddingList['to_bride_name']) && !empty($weddingList['to_bride_name'])){
		                                    				$firstName = $weddingList['to_bride_name'];
		                                    			}
	                                    				if(isset($weddingList['to_groom_name']) && !empty($weddingList['to_groom_name'])){
		                                    				$firstName = $weddingList['to_groom_name'];
		                                    			}
	                                    				if(isset($weddingList['to_partner_name']) && !empty($weddingList['to_partner_name'])){
		                                    				$firstName = $weddingList['to_partner_name'];
		                                    			}
	                                    				if(isset($weddingList['from_bride_name']) && !empty($weddingList['from_bride_name'])){
		                                    				$secondName = $weddingList['from_bride_name'];
		                                    			}
	                                    				if(isset($weddingList['from_groom_name']) && !empty($weddingList['from_groom_name'])){
		                                    				$secondName = $weddingList['from_groom_name'];
		                                    			}
	                                    				if(isset($weddingList['from_partner_name']) && !empty($weddingList['from_partner_name'])){
		                                    				$secondName = $weddingList['from_partner_name'];
		                                    			}
		                                    			
		                                    		?>
		                                            <span class="list-head"><?php echo ucfirst($firstName); ?> & <?php echo ucfirst($secondName); ?></span>
		                                            <span class="list-id">wedding id: <?php if(isset($weddingList['wedding_uniq_id']) && !empty($weddingList['wedding_uniq_id'])){ echo $weddingList['wedding_uniq_id']; } else {}?></span>
		                                            <a class="list-delete" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/wed-choos-cls.png"></a>
		                                        </li>
	                                        </a>
                                    	<?php }}}else{ ?>
                                    	<?php } ?>
										
										   <?php foreach($inviteData as $key) { //p($key['wedding_uniq_id']); 
										                  $weddingList = Wedding::model()->find("wedding_uniq_id = '".$key['wedding_uniq_id']."'");
                                                         // echo ($getWeddingList['wedding_id']);										              
													  ?>
													     <a href="javascript:;" class="wedding_choose_click" id="<?php echo $weddingList['wedding_uniq_id']; ?>" onClick="choosewedding(this);">
		                                    	<li>
		                                    		<?php 
		                                    			if(isset($weddingList['to_bride_name']) && !empty($weddingList['to_bride_name'])){
		                                    				$firstName = $weddingList['to_bride_name'];
		                                    			}
	                                    				if(isset($weddingList['to_groom_name']) && !empty($weddingList['to_groom_name'])){
		                                    				$firstName = $weddingList['to_groom_name'];
		                                    			}
	                                    				if(isset($weddingList['to_partner_name']) && !empty($weddingList['to_partner_name'])){
		                                    				$firstName = $weddingList['to_partner_name'];
		                                    			}
	                                    				if(isset($weddingList['from_bride_name']) && !empty($weddingList['from_bride_name'])){
		                                    				$secondName = $weddingList['from_bride_name'];
		                                    			}
	                                    				if(isset($weddingList['from_groom_name']) && !empty($weddingList['from_groom_name'])){
		                                    				$secondName = $weddingList['from_groom_name'];
		                                    			}
	                                    				if(isset($weddingList['from_partner_name']) && !empty($weddingList['from_partner_name'])){
		                                    				$secondName = $weddingList['from_partner_name'];
		                                    			}
		                                    			
		                                    		?>
		                                            <span class="list-head"><?php echo ucfirst($firstName); ?> & <?php echo ucfirst($secondName); ?></span>
		                                            <span class="list-id">wedding id: <?php if(isset($weddingList['wedding_uniq_id']) && !empty($weddingList['wedding_uniq_id'])){ echo $weddingList['wedding_uniq_id']; } else {}?></span>
		                                            <a class="list-delete" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/wed-choos-cls.png"></a>
		                                        </li>
	                                        </a>
										              <?php } ?>
                                    </ul>
                                
                                </section>
                            </div>
                            <!--choos-cont -->
                        </section>
                        <!--custom-pop-inner -->
                    </div>
            <div id="upload-pic" class="custom-pop">
                        <div class="overlay"></div>                                        
                        <section class="custom-pop-inner">
                            <a id="pop-close" href="#"><img src="images/pop-login-clos.png"></a>
                            <section class="admin-white-head">
                                <h1><i class="fa fa-cloud-upload"></i><span>Upload photos</span></h1>
                            </section>
                        <section class="inner-part uploded-pics-box">
<!--uplodpic-box-->

<div class="uplodpic-box">
	<?php 
	foreach($model as $choosealbum){
				 if($choosealbum['album_cate_name']=='HONEYMOON'){ 
						$srcAlbum = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon.png'; 
						$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon-h.png';
		     	}elseif($choosealbum['album_cate_name']=='RECEPTION'){ 
		     			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-reception.png'; 
		     			$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-reception-h.png';
		     	}elseif($choosealbum['album_cate_name']=='CEREMONY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony-h.png';
		     	}elseif($choosealbum['album_cate_name']=='FIRST ANNIVERSARY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/first_anniversary.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/first_anniversary_white.png'; 	
		     	}elseif($choosealbum['album_cate_name']=='ENGAGEMENT'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/engagement.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/engagement_white.png';
		    	}elseif($choosealbum['album_cate_name']=='MEMORY LANE'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/memory_lane.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/memory_lane_white.png';
		  		}elseif($choosealbum['album_cate_name']=='BACHELOR PARTY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelor_party.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelor_party_white.png';
		   		}elseif($choosealbum['album_cate_name']=='BACHELORETTE PARTY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelorette_party.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelorette_party_white.png';
		   		}elseif($choosealbum['album_cate_name']=='WEDDING SHOWER'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/wedding_shower.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/wedding_shower_white.png';
		     	}elseif($choosealbum['album_cate_name']=='PLANNING'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/planning.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/planning_white.png';
		    	}elseif($choosealbum['album_cate_name']=='REHEARSAL DINNER'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner_white.png';
		     	}else{ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/custom_album.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/custom_album_white.png';
		    	 } ?>		

<label for="album_<?php echo $choosealbum['album_id']; ?>" class="label_radio mbox">
<img class="mngimg" src="<?php echo $srcAlbum;?>" />
<img class="mng-h" src="<?php echo $scrHover; ?>"/>
<span class="albumCatName"><?php echo $choosealbum['album_cate_name']; ?></span>
<input type="radio" value="<?php echo $choosealbum['album_id']; ?>" id="album_<?php echo $choosealbum['album_id']; ?>" name="choosealbumcatID">
</label>
<?php } ?>   
</div>
<!--uplodpic-box-->
</section>

                            <div class="note">
                                <p><span>Note:</span> 
                                Uploading too many photos at the same time may slow down or even freeze your computer.
                                We recommend uploading at most 20 photos at a time.</p>
                            </div>
                            <form name="frmchoosealbum" method="post" id="frmchoosealbum" enctype="multipart/form-data" action='<?php echo Yii::app()->getBaseUrl(true)?>/wedding/Album/ImageSave'>
                            	<input type="hidden" name="hiddenALbumId" id="hiddenALbumId">	
                            <label class="choose-file"><input type="file" class="chooseAlbum"  name="photoimg">Choose Files</label>
                            </form>
                        </section>
                    </div>        
                          
<!--End Choos Wedding-->	
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.min.js"></script>			  
<script>
<?php session_start(); if(isset($_SESSION['uid'])){?>
$('#choose-wedding').click(function(){
   	$('#choos-wed').fadeIn();
	$(".overlay, #pop-close").click(function(){
		$('#choos-wed').fadeOut();
	});
});
<?php } ?>
$(document).ready(function(){
	$("input[name=choosealbumcatID]:radio").change(function () { 
		var albumID = $("input[name=choosealbumcatID]:checked").val();
		$('#hiddenALbumId').val(albumID);
		});
	$('.chooseAlbum').change(function(){
		var albumName= $("input[name=choosealbumcatID]:checked").parent().find('span').html();
		    $(".loaderdiv").html('');
			    $(".loaderdiv").html('<img src="<?php echo Yii::app()->getBaseUrl(true)?>/site-images/loader.gif" alt="Uploading...."/>');
				$("#frmchoosealbum").ajaxForm({
					//target: '.loaderdiv',
					success: function () {
						window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Album/UploadAlbum?albumName="+albumName;
					},
				}).submit();
					
	});
		$("#frmChooseWedding").validate({
			ignore: [],
			debug: false,
			rules: {
				txtWeddingId:{
					required: true,
					remote :{
					            url:"<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Wedding/CheckWeddingId",
					            type: "POST",
					                     data: {
						                        json: JSON.stringify(true),
						                        delay: 3
						                   },
					      }
				},
				},
			messages: {	
				txtWeddingId:{
					required: 'Please Enter Wedding ID',
					remote:'Invalid Wedding ID',
				},
			},
							
     });/*End Form validation*/
	$("#btnChooseWedding").on("click",function(event){
		event.preventDefault();
		if($("#frmChooseWedding").valid()){
			var dataString =$("#frmChooseWedding").serialize();
			alert(dataString);
				$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Wedding/Wedding_Listing",
					cache:false,
					data:dataString,
					beforeSend: function(data){
					},
					success: function(data){
						if(data == 1){
							window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/VisitPage";		
						}else{
								toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '10000';
						}	
						
					}
			});
		}
	});
});
function choosewedding(obj){
		var dataString = $(obj).attr('id');
			$.ajax({
				type: "POST",
				url:"<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Wedding/Wedding_Listing",
				cache:false,
				data:{"txtWeddingId":dataString},
				beforeSend: function(data){
				},
				success: function(data){
					if(data == 1){
						window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/VisitPage";		
					}else{
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-bottom-left';
							toastr.options.timeOut= '10000';
					}	
					
				}
		});
}
</script>

            
<script>
$(".eventInfo").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Event/Index";	
});
$(".ManageAlbum").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/ManageAlbums";	
});
$(".coloredit").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/ColorEdit";	
});
$(".site").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/AddSite";	
});
$(".visitpage").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/VisitPage";	
});
<?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
$(".editprofile").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/VisitPage";	
});
<?php } elseif(isset($invite) && ($invite==0)) { ?>
       $(".editprofile").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/VisitPage";	
});
<?php } ?>
$(".ediusertprofile").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/EditProfile";	
});
$(".viewuserprofile").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/ViewProfile";	
});
$(".livefeed").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/LiveFeed";	
});
$(".orderprint").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/OrderPrint";	
});
$(".slideshow-link").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/SlideShow";	
});
$(".inviteGuests").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Invite/Invite_guest";	
});
//$(".first-anniversary-icon").click(function(){
	//var album_id = $(this).attr('id');
	//window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Album/Manage_ablum?album_id="+ album_id;
//});
$(".printOwn").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/printown";	
});
$(".accommodations").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Accommodation/Addaccommodation";	
});
$(".ordercard").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/OrderAppCard";	
});
$(".faq").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/faq";	
});
$(".photoalbum").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/photoalbum";	
});
$(".createnewwedding").click(function(){
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/Wedding_Signup";	
});
$(".userCustomAlbums").click(function(){
	var albumID = $(this).attr('id');
	window.location.href = "<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Album/UploadAlbum?albumName="+albumID;
});
$("body").on("click","#logout",function(event){	
	event.preventDefault();
	$.ajax({
					type: "POST",
					url:"<?php echo Yii::app()->getBaseUrl(true);?>/Login/Logout",
					cache:false,
					data:'action=Logout',
					success: function(data)
					{	
						
						window.location.href="<?php echo Yii::app()->getBaseUrl(true);?>/index.php/index";
					}
	});		
});	
</script>