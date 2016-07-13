<?php session_start(); ?>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<!--admin-content-->
                <div id="admin-content">
                	<div class="admin-main">
                        
                        <div class="create-event-list">
                            <section class="admin-white-head">
                                <h1><i class="fa fa-calendar"></i><span>Your Events</span></h1>
                            </section>
                            <span class="creat-sub-head">Let your guests know when your important wedding events are happening.</span>
                            <p class="creat-sub-text">Add your wedding events to WeDoo, attach an album, and gather the memories from your entire wedding experience!</p>

                            <div class="clearfix"></div> <?php //echo $_SESSION['make_admin'];exit; ?>
					<?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>		
                            <a href="javascript:;" class="addnew" id="add_button" onclick="addevent();"><i class="fa fa-plus"></i>add new</a>
                        <?php } elseif(isset($invite) && ($invite==0)) {  ?>
						<a href="javascript:;" class="addnew" id="add_button" onclick="addevent();"><i class="fa fa-plus"></i>add new</a>
						<?php } ?>
<!--------- start of New Form ------------------------->
                        	<div class="create-event-main">
                             <form class="create-event-form frmEvent" name="frmEvent" id="frmEvent" method="post" style="display: none;"  enctype="application/x-www-form-urlencoded">
                            	<ul>
                                	<li>
                                    	<select class="selectpicker" name="txtEventName" id="txtEventName">
                                        	<option value="0" selected>Event Name</option>
												<?php foreach($albumCatEvent as $album){ ?>
												<option value="<?php echo $album['album_cate_id']; ?>"><?php echo $album['album_cate_name']; ?></option>
												<?php } ?>
                                        </select>
                                    </li>
                                    
                                    <li>
                                    	<label class="date">
                                        	<input type="text" placeholder="Date & Time" class="creat-txbx" name="txtEventTime" id="txtEventTime" value="<?php echo date('m/d/y');?>" readonly />
                                            <button type="button" value="" class="date-but"><i class="fa fa-calendar"></i></button>
                                        </label>
                                        <label class="time">
                                            <select class="selectpicker" id="txtAmPm" name="txtAmPm">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </label>
                                        <label class="time">
                                            <select class="selectpicker" id="minutes" name="minutes">
                                                <option value="00">00</option>
                                                <option value="05">05</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                                <option value="30">30</option>
                                                <option value="35">35</option>
                                                <option value="40">40</option>
                                                <option value="45">45</option>
                                                <option value="50">50</option>
                                                <option value="55">55</option>
                                            </select>
                                        </label>

                                        <label class="time">
                                            <select class="selectpicker" name="hours" id="hours">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </label>

                                    </li>
                                    <li>
                                    	<label class="location">
                                        	<input type="text" name="txtEventLocation" id="txtEventLocation" placeholder="Location Name" class="creat-txbx">
                                        </label>
                                    	<label class="location">
                                        	<textarea  placeholder="Address" class="creat-txbx" name="txtEventAddress" id="txtEventAddress" class="txtEventAddress" autocomplete="off"></textarea>
                                        </label>
                                        <div class="map-div">
                                        	<span class="map_canvas" id="map_canvas">Enter and address to view map</span>
                                        </div>
                                    </li>
                                    <li>
                                        <textarea name="txtEventDescription" id="txtEventDescription" placeholder="Description" class="creat-txbx"></textarea>
                                        <label class="label_check" for="albumCheck">
	                                        <input name="sample-checkbox-01" id="albumCheck" name="albumCheck" value="1" type="checkbox" checked="">
                                            <i class="fa fa-square-o"></i>
                                        	<span>Link this event to a photo album</span>
                                        	<div id="albumCategory">
                                            <em><span class="albumpackage" id="" name="albumpackage">None Selected </span> <a href="#" class="cust-pop-trigger" data-cuspop="select-event">edit</a></em>
                                       		</div>
                                       </label>
                                    </li>
                                    
                                    <li>
                                    	<input type="button" class="create-but" id="btnEventCancel" value="CANCEL">
                                    	<input type="button" class="create-but" id="btnEventSave" value="save">
                                    </li>
                                    
                                    
                                </ul>
                            </form>
							</div>
<!------------- End of New Form ----------------------->
<!----start Edit Pop-UP form---------->
<form name="frmEventEditing" id="frmEventEditing" method="post" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="hdnSearchID" id="" class="hdnSearchID" />
   <div id="select-event" class="custom-pop">
<div class="overlay"></div>                                        
<section class="custom-pop-inner">
<a id="pop-close" href="#"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/pop-login-clos.png"></a>

<!--admin-white-head-->
<section class="admin-white-head">
<h1><span>Select an Event Album</span></h1>
</section>

<!--inner-part-->
<section class="inner-part uploded-pics-box">
<!--uplodpic-box-->
<div class="uplodpic-box">
	<?php foreach($albumCat as $album){
				 if($album['album_cate_name']=='HONEYMOON'){ 
						$srcAlbum = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon.png'; 
						$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon-h.png';
		     	}elseif($album['album_cate_name']=='RECEPTION'){ 
		     			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-reception.png'; 
		     			$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-reception-h.png';
		     	}elseif($album['album_cate_name']=='CEREMONY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony-h.png';
		     	}elseif($album['album_cate_name']=='FIRST ANNIVERSARY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/first_anniversary.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/first_anniversary_white.png'; 	
		     	}elseif($album['album_cate_name']=='ENGAGEMENT'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/engagement.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/engagement_white.png';
		    	}elseif($album['album_cate_name']=='MEMORY LANE'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/memory_lane.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/memory_lane_white.png';
		  		}elseif($album['album_cate_name']=='BACHELOR PARTY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelor_party.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelor_party_white.png';
		   		}elseif($album['album_cate_name']=='BACHELORETTE PARTY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelorette_party.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelorette_party_white.png';
		   		}elseif($album['album_cate_name']=='WEDDING SHOWER'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/wedding_shower.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/wedding_shower_white.png';
		     	}elseif($album['album_cate_name']=='PLANNING'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/planning.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/planning_white.png';
		    	}elseif($album['album_cate_name']=='REHEARSAL DINNER'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner_white.png';
		     	}else{ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/custom_album.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/custom_album_white.png';
		    	 } ?>		
	
<label for="<?php echo $album['album_cate_id']; ?>" class="label_radio mbox">
<img class="mngimg" src="<?php echo $srcAlbum;?>" />
<img class="mng-h" src="<?php echo $scrHover; ?>"/>
<span><?php echo $album['album_cate_name']; ?></span>
<input type="radio" value="<?php echo $album['album_cate_id']; ?>" id="<?php echo $album['album_cate_id']; ?>" name="albumcatID">
</label>
<?php } ?>   
</div>
<!--uplodpic-box-->
</section>
<!--inner-part-->
<!--note-->
<div class="create-album-main">
<span class="or">OR</span>
<a class="creat-album-but" href="#">Create your own album</a>
<div class="create-album">
<label for="albumcatID" class="label_radio mbox">
<i class="fa fa-square-o"></i>
<span>New Album</span>
<input type="radio"  id="albumcatID" name="albumcatID" value="<?php echo $albumCatcount; ?>">
</label>
<input type="text" class="new-albm-txbx" id="albumcatName" name="albumcatName">
</div>
</div>
<!--note-->                                            
<!--Choose Files-btn-->
<input type="button" value="Select Album" class="select-album btnSaveAlbum" id="btnSaveAlbum">
<!--Choose Files-btn-->
</section>
</div>
</form>
                      
<!--- End of form pop-up-->
   <div class="loading_image" style="display:none; background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5); bottom: 0; height: 100%; left: 0; margin: auto; position: fixed; right: 0; top: 0; width: 100%;">
<img class="loading_images" style="bottom: 0; left: 0; margin: auto; position: absolute; right: 0; top: 0;" src="<?php echo Yii::app()->getBaseUrl(true);?>/images/loader.gif" alt="images"/>
</div>	                 
<!-- Edit & listing  Data---------------> 
<?php
if($eventAllData){
$i=1;	
foreach($eventAllData as $eventRecord){ 
 $eventDate = date('m/d/Y',strtotime($eventRecord['event_datetime']));
 $eventHours = date('h',strtotime($eventRecord['event_datetime']));
 $eventMinutes= date('i',strtotime($eventRecord['event_datetime']));
 $eventAmPm =date('A',strtotime($eventRecord['event_datetime']));	

 ?>
 <div class="event-list-div <?php echo $eventRecord['event_id']; ?>">
        <div class="location">
            <div class="acc-listimg">                                        
                <img class="ac-list-img" src="<?php echo Yii::app()->getBaseUrl(true)?>/images/create-event-list-1.jpg"/>
                <a class="view-album" href="#">
                	<i class="fa fa-image"></i>
                    <span>View Album (1)</span>
                </a>
            </div>
            <div class="acc-ldiv">
                <h3 class="acc-locationhead"><?php if(isset($eventRecord['event_name']) && !empty($eventRecord['event_name'])){echo $eventRecord['event_name'];}else{ echo 'N/A';} ?></h3>
                <a href="javascript:;" class="acc-address"><i class="fa fa-calendar"></i><?php if(isset($eventRecord['event_datetime']) && !empty($eventRecord['event_datetime'])){echo date('g:i A \o\n l, F jS Y',strtotime($eventRecord['event_datetime']));}else{ echo 'N/A';} ?></a>
                <div class="clearfix"></div>
                <a href="javascript:;" class="acc-address"><i class="fa fa-map-marker"></i>at <?php if(isset($eventRecord['event_location']) && !empty($eventRecord['event_location'])){echo $eventRecord['event_location'];}else{ echo 'N/A';} ?></a>
                <div class="clearfix"></div>
                <a href="javascript:;" class="acc-address"><i class="fa fa-map-marker"></i><?php if(isset($eventRecord['event_address']) && !empty($eventRecord['event_address'])){echo $eventRecord['event_address'];}else{ echo 'N/A';} ?></a>
				<p><?php if(isset($eventRecord['event_description']) && !empty($eventRecord['event_description'])){echo $eventRecord['event_description'];} ?></p>
                <?php if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']) && ($_SESSION['make_admin']=="Yes")) { ?>
				<a href="javascript:;" id="<?php echo $i; ?>" class="acc-editicon Edit"><i class="fa fa-pencil"></i></a>
				<?php } elseif(isset($invite) && ($invite==0)) {  ?>
						<a href="javascript:;" id="<?php echo $i; ?>" class="acc-editicon Edit"><i class="fa fa-pencil"></i></a>
						<?php } ?>
            </div>
            <!--acc-ldiv-->
        </div>
        <!--location-->
    </div>
            
<!---Hdden form -->
<div class="create-event-main">
<form class="create-event-form frmEvent EditEvent <?php echo $eventRecord['event_id']; ?>" id="frmEvent<?php echo $i ?>" name="frmEvent"  method="post" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="hiddenId" value="<?php echo $eventRecord['event_id']; ?>">	
	
	<ul>
    	<li>
        	<select class="selectpicker"  name="txtEventName" id="txtEventName<?php echo $i; ?>">
        		<option value="0"></option>
            	<?php foreach($albumCatEvent as $album){ ?>
				<option value="<?php echo $album['album_cate_id']; ?>"
				<?php if($album['album_cate_name']==$eventRecord['event_name']){ echo "selected=selected" ;} ?>><?php echo $album['album_cate_name']; ?></option>
				<?php } ?>
            </select>
        </li>
        
        <li>
        	<label class="date">
            	<input type="text" name="txtEventTime" id="txtEventTime<?php echo $i; ?>" value="<?php echo $eventDate;?>" class="creat-txbx datepicker" />
                <button type="button" value="" class="date-but"><i class="fa fa-calendar"></i></button>
            </label>
            <label class="time">
                <select class="selectpicker" id="txtAmPm" name="txtAmPm">
                   <option value="AM" <?php if($eventAmPm == 'AM'){ echo 'selected=selected';} ?>>AM</option>
                   <option value="PM" <?php if($eventAmPm == 'PM'){ echo 'selected=selected';} ?>>PM</option>
                </select>
            </label>
            <label class="time">
                <select class="selectpicker" id="minutes" name="minutes">
                    <option value="00" <?php if($eventMinutes == '00'){ echo 'selected=selected';} ?>>00</option>
                    <option value="05" <?php if($eventMinutes == '05'){ echo 'selected=selected';} ?>>05</option>
                    <option value="10" <?php if($eventMinutes == '10'){ echo 'selected=selected';} ?>>10</option>
                    <option value="15" <?php if($eventMinutes == '15'){ echo 'selected=selected';} ?>>15</option>
                    <option value="20" <?php if($eventMinutes == '20'){ echo 'selected=selected';} ?>>20</option>
                    <option value="25" <?php if($eventMinutes == '25'){ echo 'selected=selected';} ?>>25</option>
                    <option value="30" <?php if($eventMinutes == '30'){ echo 'selected=selected';} ?>>30</option>
                    <option value="35" <?php if($eventMinutes == '35'){ echo 'selected=selected';} ?>>35</option>
                    <option value="40" <?php if($eventMinutes == '40'){ echo 'selected=selected';} ?>>40</option>
                    <option value="45" <?php if($eventMinutes == '45'){ echo 'selected=selected';} ?>>45</option>
                    <option value="50" <?php if($eventMinutes == '50'){ echo 'selected=selected';} ?>>50</option>
                    <option value="55" <?php if($eventMinutes == '55'){ echo 'selected=selected';} ?>>55</option>
                </select>
            </label>

            <label class="time">
                <select class="selectpicker" name="hours" id="hours">
                        <option value="1" <?php if($eventHours == '1'){ echo 'selected=selected';} ?>>1</option>
                        <option value="2" <?php if($eventHours == '2'){ echo 'selected=selected';} ?>>2</option>
                        <option value="3" <?php if($eventHours == '3'){ echo 'selected=selected';} ?>>3</option>
                        <option value="4" <?php if($eventHours == '4'){ echo 'selected=selected';} ?>>4</option>
                        <option value="5" <?php if($eventHours == '5'){ echo 'selected=selected';} ?>>5</option>
                        <option value="6" <?php if($eventHours == '6'){ echo 'selected=selected';} ?>>6</option>
                        <option value="7" <?php if($eventHours == '7'){ echo 'selected=selected';} ?>>7</option>
                        <option value="8" <?php if($eventHours == '8'){ echo 'selected=selected';} ?>>8</option>
                        <option value="9" <?php if($eventHours == '9'){ echo 'selected=selected';} ?>>9</option>
                        <option value="10" <?php if($eventHours == '10'){ echo 'selected=selected';} ?>>10</option>
                        <option value="11" <?php if($eventHours == '11'){ echo 'selected=selected';} ?>>11</option>
                        <option value="12" <?php if($eventHours == '12'){ echo 'selected=selected';} ?>>12</option>
                </select>
            </label>

        </li>
        <li>
        	<label class="location">
            	<input type="text" name="txtEventLocation" id="txtEventLocation<?php echo $i; ?>" value="<?php if(isset($eventRecord['event_location']) && !empty($eventRecord['event_location'])){echo $eventRecord['event_location'];} ?>" placeholder="Location Name" class="creat-txbx">
            </label>
        	<label class="location">
            	<textarea  placeholder="Address" class="creat-txbx txtEventAddress" name="txtEventAddress" id="txtEventAddress<?php echo $i; ?>" autocomplete="off">
            		<?php if(isset($eventRecord['event_address']) && !empty($eventRecord['event_address'])){echo $eventRecord['event_address'];} ?>
            	</textarea>
            </label>
            <div class="map-div">
            	<span id="map_canvas<?php echo $i; ?>" class="map_canvas">Enter and address to view map</span>
            </div>
        </li>
        <li>
            <textarea  placeholder="Description" class="creat-txbx" name="txtEventDescription" id="txtEventDescription<?php echo $i; ?>"><?php if(isset($eventRecord['event_description']) && !empty($eventRecord['event_description'])){echo $eventRecord['event_description'];} ?></textarea>
            <label class="label_check" for="albumCheck<?php echo $i; ?>">
                <input name="sample-checkbox-01"  value="1" type="checkbox" id="albumCheck<?php echo $i; ?>" name="albumCheck" <?php if(isset($eventRecord['event_link_album_id']) && !empty($eventRecord['event_link_album_id'])){echo 'checked';}?> >
                <i class="fa fa-square-o"></i>
                <span>Link this event to a photo album</span>
                <div id="albumCategory<?php echo $i; ?>">
                <em>
               <span class="albumpackage<?php echo $i; ?>" id="<?php if(isset($eventRecord['album_cate_id']) && !empty($eventRecord['album_cate_id'])){echo $eventRecord['album_cate_id'];}else{echo "";} ?>" name="albumpackage"><?php if(isset($eventRecord['album_cate_name']) && !empty($eventRecord['album_cate_name'])){echo $eventRecord['album_cate_name'];}else{echo 'None Selected';} ?></span>
                	<a href="javascript:;" class="cust-pop-trigger"  data-cuspop="select-event<?php echo $i;?>">edit</a>
                	</em>
                </div>
            </label>
        </li>
        
        <li>
		    <input type="button" class="create-but" value="Remove" onclick="deleteevent(<?php echo $eventRecord['event_id']; ?>)" >
        	<input type="button" class="create-but" value="CANCEL" id="btnEventCancel<?php echo $i;?>">
        	<input type="button" class="create-but" value="save" id="btnEventSave<?php echo $i; ?>">
        </li>
        
        
    </ul>
</form>
</div>
<!--- End of hidden form --->
<!----Start Edit poopup ------------------------>
<form name="frmEventEditing" id="frmEventEditing<?php echo $i; ?>" method="post" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="hdnSearchID" id="" class="hdnSearchID" />
<div id="select-event" class="custom-pop select-event<?php echo $i; ?>">
<div class="overlay"></div>                                        
<section class="custom-pop-inner">
<a id="pop-close" href="javascript:;"><img src="<?php echo Yii::app()->getBaseUrl(true)?>/images/pop-login-clos.png"></a>

<section class="admin-white-head">
<h1><span>Select an Event Album</span></h1>
</section>


<section class="inner-part uploded-pics-box">

<div class="uplodpic-box">
	<?php $autoID = 1; foreach($albumCat as $album){
			$categoryID = $album['album_cate_id'];	
				 if($album['album_cate_name']=='HONEYMOON'){ 
						$srcAlbum = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon.png'; 
						$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon-h.png';
		     	}elseif($album['album_cate_name']=='RECEPTION'){ 
		     			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-reception.png'; 
		     			$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-reception-h.png';
		     	}elseif($album['album_cate_name']=='CEREMONY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony-h.png';
		     	}elseif($album['album_cate_name']=='FIRST ANNIVERSARY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/first_anniversary.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/first_anniversary_white.png'; 	
		     	}elseif($album['album_cate_name']=='ENGAGEMENT'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/engagement.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/engagement_white.png';
		    	}elseif($album['album_cate_name']=='MEMORY LANE'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/memory_lane.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/memory_lane_white.png';
		  		}elseif($album['album_cate_name']=='BACHELOR PARTY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelor_party.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelor_party_white.png';
		   		}elseif($album['album_cate_name']=='BACHELORETTE PARTY'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelorette_party.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelorette_party_white.png';
		   		}elseif($album['album_cate_name']=='WEDDING SHOWER'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/wedding_shower.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/wedding_shower_white.png';
		     	}elseif($album['album_cate_name']=='PLANNING'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/planning.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/planning_white.png';
		    	}elseif($album['album_cate_name']=='REHEARSAL DINNER'){ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner_white.png';
		     	}else{ 
		    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/custom_album.png'; 	
						$scrHover = Yii::app()->getBaseUrl(true).'/images/custom_album_white.png';
		    	 } ?>		
	
<label id="albumlabelId<?php echo $i; ?>" for="albumlabelID<?php echo $autoID; ?>" class="label_radio mbox">
<img class="mngimg" src="<?php echo $srcAlbum;?>" />
<img class="mng-h" src="<?php echo $scrHover; ?>"/>
<span><?php echo $album['album_cate_name']; ?></span>
<input type="radio" id="albumlabelID<?php echo $autoID; ?>" class="albumcatID" <?php if(isset($categoryID) && ($categoryID == $eventRecord['event_link_album_id'])){ echo "checked"; } ?>
	name="albumcatID<?php echo $i; ?>"
	value="<?php echo $categoryID; ?>" >
</label>
<?php $autoID++; } ?>   
</div>

</section>

<div class="create-album-main">
<span class="or">OR</span>
<a class="creat-album-but" href="#">Create your own album</a>
<div class="create-album">
<label for="albumcatID<?php echo $i; ?>" class="label_radio mbox">
<i class="fa fa-square-o"></i>
<span>New Album</span>
<input type="radio"  id="albumcatID<?php echo $i; ?>" name="albumcatID<?php echo $i; ?>" value="<?php echo $albumCatcount; ?>">
</label>
<input type="text" class="new-albm-txbx" id="albumcatName<?php echo $i; ?>" name="albumcatName<?php echo $i; ?>">
</div>
</div>
<input type="button" value="Select Album" class="select-album btnSaveAlbum" id="btnSaveAlbum<?php echo $i; ?>">
  
</section>
</div>
</form>
 <!---- End of Edit popup------------------------>
<script>
/* Custom po-up script */
$(document).ready(function(){
$(".cust-pop-trigger").click(function(){
		var pop = $(this).attr("data-cuspop");
		$('.' + pop).fadeIn();
		$(".overlay, #pop-close").click(function(){
			$('.' + pop).fadeOut();
		});
	});
});	
/* end of custom pop-up */
 $("body").on("click",".Edit",function(){
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
/* Close Edit form on cancel button */
$("body").on("click","#btnEventCancel<?php echo $i; ?>",function(){
	$("#frmEvent<?php echo $i; ?>").hide();
});
/*end of close edit form on cancel button */
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
	var labelForID = $("input[name=albumcatID<?php echo $i?>]:checked").attr('id');
	if(albumId=='<?php echo $albumCatcount; ?>'){
		var albumName=$('#albumcatName<?php echo $i; ?>').val();
	}else{	
		var albumName= $("label#albumlabelId<?php echo $i; ?>[for='"+labelForID+"']").find("span").text();
		//var albumName= $("label#albumlabelId<?php echo $i; ?>").find("span").text();
	}	
$('.albumpackage<?php echo $i; ?>').text(albumName);
$('.albumpackage<?php echo $i; ?>').attr('id',albumId);
$('.select-event<?php echo $i; ?>').fadeOut();
}) 

$('body').on('click','#btnEventSave<?php echo $i; ?>',function(){
	if($("#frmEvent<?php echo $i; ?>").valid()){
	var eventName = $("#txtEventName<?php echo $i; ?> option:selected").text();	
	var albumId = $(".albumpackage<?php echo $i; ?>").attr('id');
	var albumName = $(".albumpackage<?php echo $i; ?>").html();
	var datastring = $("#frmEvent<?php echo $i; ?>").serialize()+'&albumId='+albumId+'&albumName='+albumName+'&eventName='+eventName;
			$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Event/EditEvent',
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
$("#txtEventTime<?php echo $i; ?>").datepicker({
            changeMonth: true,
            changeYear: true,
});
// $("#txtEventTime<?php echo $i; ?>").datetimepicker();
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
</script> <?php $i++;} } ?>

    <!--acc-list-div-->
                        </div>
                        <!--create-event-list-->                        
                    </div>
                    <!--admin-main-->
                </div>
                <!--admin-content-->
            </div>
<!-- Existing Events list -->

<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 110,
        itemMargin: 0,
        minItems: 2,
        maxItems: 4,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
$(document).ready(function(){
$("#txtEventTime").datepicker({
            changeMonth: true,
            changeYear: true,
			//minDate: new Date(),
});
$('.selectpicker').selectpicker();		
$(".EditEvent").hide();
$(".creat-album-but").show();
$(".create-album").hide();
   $(".creat-album-but").click(function(){
			$(this).hide();
			$(".create-album").show();
		});

	$(".inner-part").click(function(){
			$(".creat-album-but").show();
			$(".create-album").hide();
		});
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
			$('.albumpackage').html(eventName);
		}
}
});

// $("#txtEventTime").datetimepicker();	
			});	
  $('body').on('keypress','#txtEventAddress',function(){
  	var map="";
	var obj = $("#txtEventAddress");
    setTimeout(function(){
      map=   obj.geocomplete({
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

},10);
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
		var albumName=$("#albumcatName").val();
	}else{	
		var albumName= $("label[for='"+albumId+"'] span").text();
	}
$('.hdnSearchID').attr('id',<?php echo $_SESSION['uid'] ?>);
$('.albumpackage').html(albumName);
$('.albumpackage').attr('id',albumId);

$('#select-event').fadeOut();
}); 


$('body').on('click','#btnEventSave',function(){
	if($("#frmEvent").valid()){
	var eventName=$("#txtEventName option:selected").text();	
	var albumId=$(".albumpackage").attr('id');
	var albumName=$(".albumpackage").html();
	var datastring= $("#frmEvent").serialize()+'&albumId='+albumId+'&albumName='+albumName+'&eventName='+eventName;
			$.ajax({
			type: 'POST',
			url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Event/CreateEvent',
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
      
$('body').on('click','.Edit',function(){
	var id=$(this).attr('id');
	$("#frmEvent"+id).show();
}); 
$("body").on("click","#btnEventCancel",function(){
	$("#frmEvent").hide();
	$("#add_button").show();
	document.getElementById("frmEvent").reset();
});
function addevent(){
	$("#add_button").css("display","none");
	$("#frmEvent").css("display","block");
}

function deleteevent(id)
{
	var txt;
    var r = confirm("Do you want to delete event");
    if (r == true) {
    	  $.ajax({
		 url:'<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Event/DeleteEvent',
		 data: {id:id},
		 dataType: 'html',
		 type: 'POST',	
		success: function(data)
				{
					//alert(data);
					//$("div.loading_image").css("display","none");
					 if(data == 1)
					 {
						$("."+id).remove();
					 }
				},
        });
    } 
    
}
</script>   
<script>
 $(window).load(function() {
         $("#activeevent").addClass("active");
         });
</script>  