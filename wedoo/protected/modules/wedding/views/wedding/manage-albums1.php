<div id="admin-content">
	<!--admin-main-->
	<div class="admin-main">
		<!--manage-albums-->
		<div class="manage-albums">
			<!--admin-white-head-->
			<section class="admin-white-head">
				<h1><i class="fa fa-gears"></i><span>Manage your photo albums</span></h1>
			</section>
			<!--admin-white-head-->
			<!--text-content-->
			<h3 class="mng-head">current wedding albums</h3>
			<span class="mng-line"></span>
			<p class="mang-txt">
				* Drag and drop to rearrange albums.
			</p>
			<!--text-content-->
			<!--mange-cntntbox-->
			<div id="contentLeft" class="contentLeft">
					<ul class="mange-cntntbox gridly">
							<?php  if($model){ foreach($model as $albumModel){  
									if($albumModel['album_cate_name']=='HONEYMOON'){ 
											$srcAlbum = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon.png'; 
											$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-honeymoon-h.png';
							     	}elseif($albumModel['album_cate_name']=='RECEPTION'){ 
							     			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-reception.png'; 
							     			$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-reception-h.png';
							     	}elseif($albumModel['album_cate_name']=='CEREMONY'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/mng-album-ceremony-h.png';
							     	}elseif($albumModel['album_cate_name']=='FIRST ANNIVERSARY'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/first_anniversary.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/first_anniversary_white.png'; 	
							     	}elseif($albumModel['album_cate_name']=='ENGAGEMENT'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/engagement.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/engagement_white.png';
							    	}elseif($albumModel['album_cate_name']=='MEMORY LANE'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/memory_lane.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/memory_lane_white.png';
							  		}elseif($albumModel['album_cate_name']=='BACHELOR PARTY'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelor_party.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelor_party_white.png';
							   		}elseif($albumModel['album_cate_name']=='BACHELORETTE PARTY'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/Bachelorette_party.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/Bachelorette_party_white.png';
							   		}elseif($albumModel['album_cate_name']=='WEDDING SHOWER'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/wedding_shower.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/wedding_shower_white.png';
							     	}elseif($albumModel['album_cate_name']=='PLANNING'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/planning.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/planning_white.png';
							    	}elseif($albumModel['album_cate_name']=='REHEARSAL DINNER'){ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/rehearsal_dinner_white.png';
							     	}else{ 
							    			$srcAlbum=Yii::app()->getBaseUrl(true).'/images/custom_album.png'; 	
											$scrHover = Yii::app()->getBaseUrl(true).'/images/custom_album_white.png';
							    	 }  ?>
                                <!--honeymoon-->
                                <li class="mbox brick" id="recordsArray_<?php echo  $albumModel['album_id']; ?>">
                                    <img class="mngimg" src="<?php echo $srcAlbum; ?>"/>
                                    <img class="mng-h" src="<?php echo $scrHover; ?>"/>
                                    <span><?php echo  $albumModel['album_cate_name']; ?></span>
                                    <?php if($albumModel['albumCatuserid']!='0'){ ?>
                                    		<a href="javascript:;" class="mng-closebtn temporary"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/close-icon.png"/></a>
                                    <?php }else{ ?> 
                                    	<a href="javascript:;" class="mng-closebtn delete"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/close-icon.png"/></a>
                                    	<?php } ?>
                                </li>
                                <?php }} ?>
                            </ul>
                           </div>
			<!--mange-cntntbox-->
			<!--create-ur-album-->
			<div class="create-ur-album">
				<form>
					<input type="text" placeholder="Create your own album" class="txt-bx" value=""  id="custom_album_input"/>
					<a href="#" class="brows" name="addAlbum" id="addAlbum"></a>
				</form>
			</div>
			<!--create-ur-album-->
			<div class="clearfix"></div>
			<!--suggest-wed-album-->
			<div class="suggest-wed-album">
				<!--suggest-txt-->
				<div class="suggest-txt">
					<h1>Suggested
					<br>
					Wedding Albums</h1>
				</div>
				<!--suggest-txt-->
				<!--slider-->
				<section class="slider">
					<div id="slider" class="flexslider carousel">
						<!--slides-->
						<ul class="slides delgridly">
							  	<?php  if($modelSuggested){ foreach($modelSuggested as $albumSuggestedModel){
							  		  if($albumSuggestedModel['album_cate_name']=='HONEYMOON'){ 
													$src=Yii::app()->getBaseUrl(true).'/images/honeymoon_50x50.png'; 
		                                 	}elseif($albumSuggestedModel['album_cate_name']=='RECEPTION'){ 
		                                 			$src=Yii::app()->getBaseUrl(true).'/images/reception_50x50.png'; 
		                                 	}elseif($albumSuggestedModel['album_cate_name']=='CEREMONY'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/ceremony_50x50.png'; 	
		                                 	}elseif($albumSuggestedModel['album_cate_name']=='FIRST ANNIVERSARY'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/first_anniversary_50x50.png'; 	
		                                 	}elseif($albumSuggestedModel['album_cate_name']=='ENGAGEMENT'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/mng-slide-1.png'; 
		                                	}elseif($albumSuggestedModel['album_cate_name']=='MEMORY LANE'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/memory_lane_50x50.png'; 
		                              		}elseif($albumSuggestedModel['album_cate_name']=='BACHELOR PARTY'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/mng-slide-2.png'; 
		                               		}elseif($albumSuggestedModel['album_cate_name']=='BACHELORETTE PARTY'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/mng-slide-3.png'; 
		                               		}elseif($albumSuggestedModel['album_cate_name']=='WEDDING SHOWER'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/wedding_shower_50x50.png'; 
		                                 	}elseif($albumSuggestedModel['album_cate_name']=='PLANNING'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/planning_50x50.png'; 
		                                	}elseif($albumSuggestedModel['album_cate_name']=='REHEARSAL DINNER'){ 
		                                			$src=Yii::app()->getBaseUrl(true).'/images/mng-slide-4.png'; 
		                                 	}else{ 
		                                		$src=Yii::app()->getBaseUrl(true).'/images/custom_album_50x50.png'; 
		                                 	} ?>
		                         <li class="brick" id="recordsArray_<?php echo  $albumSuggestedModel['album_id']; ?>">
								<div class="mbox1 ">    
									<img class="mngimg" src="<?php echo $src; ?>"/>
									<span>
										<?php echo $albumSuggestedModel['album_cate_name']; ?>
									</span>
									<a href="javascript:;" class="mng-closebtn add"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/slider-pluse-btn.png"/></a>
								</div>
							</li>		
						<?php }} ?>
						</ul>
						<!--slides-->
					</div>
				</section>
				<!--slider-->
			</div>
			<!--suggest-wed-album-->
		</div>
		<!--manage-albums-->
	</div>
	<!--admin-main-->
</div>
<!--admin-content-->
</div>
<script type="text/javascript">
function ChangeAlbumNameForDefault(data,albumID){
	var sideLength=$('.manageAllAlbum li span.first-anniversary-icon').length;
		for(var i=0;i<=sideLength;i++){
			if(i<sideLength){
				$('.manageAllAlbum li i:eq( '+[i]+' )').attr('class',getClassName);
				$('.manageAllAlbum li span.first-anniversary-icon:eq( '+[i]+' )').html(data[i]);
			}else{
				var getClassName =  iconClass(data[i]);
				getClassName = getClassName.replace("fa",'');
				$('.manageAllAlbum').append("<li><a href='javascript:;'><i class='fa "+getClassName+"'></i><span id="+albumID+" class='first-anniversary-icon'>"+data[i]+" </span></a> <span class='notifi'>2</span></li>");
			}
		}		
}
function ChangeAlbumName(data){
	var sideLength=$('.manageAllAlbum li span.first-anniversary-icon').length;
		for(var i=0;i<sideLength;i++){
			if(data[i]!=""){
				var getClassName =  iconClass(data[i]);
				$('.manageAllAlbum li i:eq( '+[i]+' )').attr('class',getClassName);
				$('.manageAllAlbum li span.first-anniversary-icon:eq( '+[i]+' )').html(data[i]);
			}else{
				var imageIcon = $('.manageAllAlbum li:eq( '+[i]+' )').remove();
				//$('.manageAllAlbum li span.first-anniversary-icon:eq( '+[i]+' )').html("");
				//$('.manageAllAlbum li span.notifi:eq( '+[i]+' )').html("");
			}
		}		
}

function iconClass(albumName){
	var className=''; 
		 if(albumName=='HONEYMOON'){
		    className="fa fa-heart";
		    }else if(albumName=='RECEPTION'){ 
		    className = "fa fa-glass";
		    }else if(albumName=='CEREMONY'){ 
		   		 className = "fa fa-diamond";	
		    }else if(albumName=='FIRST ANNIVERSARY'){ 
		           className = "fa fa-slideshare";	
		    }else if(albumName=='ENGAGEMENT'){ 
		           className = "fa fa-venus-mars";
		    }else if(albumName=='MEMORY LANE'){ 
		           className = "fa fa-child";
		    }else if(albumName=='BACHELOR PARTY'){ 
		           className = "fa fa-users";
		    }else if(albumName=='BACHELORETTE PARTY'){ 
		          className = "fa fa-street-view";
		    }else if(albumName=='WEDDING SHOWER'){ 
		          className = "fa fa-heartbeat";
		    }else if(albumName=='PLANNING'){ 
		          className = "fa fa-indent";
		    }else if(albumName=='REHEARSAL DINNER'){ 
		           className = "fa fa-cutlery";
		   }else{ 
		        className = "fa fa-photo";
		        } 
	return 	className;      
}

function setimage(albumName){
	var imageName=''; 
		 if(albumName=='HONEYMOON'){
		    imageName="honeymoon_50x50.png";
		    }else if(albumName=='RECEPTION'){ 
		    imageName = "reception_50x50.png";
		    }else if(albumName=='CEREMONY'){ 
		   		 imageName = "ceremony_50x50.png";	
		    }else if(albumName=='FIRST ANNIVERSARY'){ 
		           imageName = "first_anniversary_50x50.png";	
		    }else if(albumName=='ENGAGEMENT'){ 
		           imageName = "mng-slide-1.png";
		    }else if(albumName=='MEMORY LANE'){ 
		           imageName = "memory_lane_50x50.png";
		    }else if(albumName=='BACHELOR PARTY'){ 
		           imageName = "mng-slide-2.png";
		    }else if(albumName=='BACHELORETTE PARTY'){ 
		          imageName = "mng-slide-3.png";
		    }else if(albumName=='WEDDING SHOWER'){ 
		          imageName = "wedding_shower_50x50.png";
		    }else if(albumName=='PLANNING'){ 
		          imageName = "planning_50x50.png";
		    }else if(albumName=='REHEARSAL DINNER'){ 
		           imageName = "mng-slide-4.png";
		   }else{ 
		        imageName = "custom_album_50x50.png";
		        } 
	return 	imageName;      
}

function setDefaultimage(albumData){
	var albumName = albumData.trim();
	var imageName=""; 
	var imageNameHover = "";
		 if(albumName =='HONEYMOON'){
		   		 imageName = "mng-album-honeymoon.png";
		    	imageNameHover = "mng-album-honeymoon-h.png"; 
		   }else if(albumName =='RECEPTION'){ 
		    	 imageName = "mng-album-reception.png";
		    	imageNameHover = "mng-album-reception-h.png"; 
		   }else if(albumName =='CEREMONY'){ 
		   		  imageName = "mng-album-ceremony.png";
		    		imageNameHover = "mng-album-ceremony-h.png"; 	
		   }else if(albumName =='FIRST ANNIVERSARY'){ 
		            imageName = "first_anniversary.png";
		    		imageNameHover = "first_anniversary_white.png"; 	
		   }else if(albumName=='ENGAGEMENT'){ 
		            imageName = "engagement.png";
		    		imageNameHover = "engagement_white.png"; 
		   }else if(albumName=='MEMORY LANE'){ 
		            imageName = "memory_lane.png";
		    		imageNameHover = "memory_lane_white.png"; 
		   }else if(albumName =='BACHELOR PARTY'){ 
		            imageName = "Bachelor_party.png";
		    		imageNameHover = "Bachelor_party_white.png"; 
		   }else if(albumName =='BACHELORETTE PARTY'){ 
		           imageName = "Bachelorette_party.png";
		    		imageNameHover = "Bachelorette_party_white.png"; 
		   }else if(albumName=='WEDDING SHOWER'){ 
		          imageName = "wedding_shower.png";
		   		 imageNameHover = "wedding_shower_white.png"; 
		   }else if(albumName=='PLANNING'){ 
		          imageName = "planning.png";
		    		imageNameHover = "planning_white.png"; 
		   }else if(albumName=='REHEARSAL DINNER'){ 
		           imageName = "rehearsal_dinner.png";
		   		 imageNameHover = "rehearsal_dinner_white.png"; 
		   }else{ 
		        imageName = "custom_album.png";
		   		 imageNameHover = "custom_album_white.png"; 
		        } 
	return 	[imageName, imageNameHover];         
}


$(document).ready(function(){
/* 1-> to rearrange album */	 
$(function() {
	$("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
		var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/UpdateAlbumPosition',
		data: order,
		cache:false,
		async:true,
		dataType:"json",
		beforeSend: function(data){
		},
		success: function(data){ 
				ChangeAlbumName(data);
			},		
			});												 
	}								  
	});
});
/* 2-> delete default album Temporary */	
$(document).on("click", ".delete", function(event) {
  var $this;
  event.preventDefault();
  event.stopPropagation();
  $this = $(this);
  var iD= $this.closest('.brick').attr('id');
  var res = iD.split("_"); 
  var albumID = res[1];
  var addBrick = $this.closest('.brick').find('span').text();
  	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/DeleteAlbumTemporary',
		data: {album_id:albumID},
		cache:false,
		async:true,
		dataType:"json",
		beforeSend: function(data){
		},
		success: function(data1){
				ChangeAlbumName(data1);
				var imageName = setimage(addBrick);
				var div = "<li class='brick' id="+iD+"> <div class='mbox1 '><img class='mngimg' src='<?php echo Yii::app()->getBaseUrl(true);?>/images/"+imageName+"'/><span>"+addBrick+"</span><a href='javascript:;' class='mng-closebtn add'><img src='<?php echo Yii::app()->getBaseUrl(true);?>/images/slider-pluse-btn.png'/></a></div></li>";

				alert($('#slider').data('flexslider'));
  				$('#slider').data('flexslider').addSlide($(div));
  				$this.closest('.brick').remove();
			},		
			});
});
/* 3->add again default album from suggestions */    
$(document).on("click", ".add", function(event) {
  event.preventDefault();
  event.stopPropagation();
  $this = $(this);
  var iD= $this.closest('.brick').attr('id');
    var res = iD.split("_"); 
 	 var albumID=res[1];
    	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/AddAlbumTemporary',
		data: {album_id:albumID},
		cache:false,
		async:true,
		dataType:"json",
		beforeSend: function(data){
		},
		success: function(data){
				var brickText=$this.closest('.brick').find('span').text();
				ChangeAlbumNameForDefault(data,albumID);
				var imageName = setDefaultimage(brickText);
				var simpleImage = imageName[0];
				var hoverImage = imageName[1];
  				$('ul.gridly').append("<li class='mbox brick' id="+iD+"><img class='mngimg' src='<?php echo Yii::app()->getBaseUrl(true);?>/images/"+simpleImage+"'/><img class='mng-h' src='<?php echo Yii::app()->getBaseUrl(true);?>/images/"+hoverImage+"'/><span>"+brickText+"</span><a href='javascript:;' class='mng-closebtn delete'><img src='<?php echo Yii::app()->getBaseUrl(true); ?>/images/close-icon.png'/></a></li>");
 				 $this.closest('.brick').remove();
 				 },		
			});
});    
/* add the custom album*/
  $(document).on("click", "#addAlbum", function(event) {
  	  var customField = $('#custom_album_input').val();
  	  if(customField!=""){
  event.preventDefault();
  event.stopPropagation();
   var totalLength=<?php echo $albumCatcount ?>;

  $('.gridly').append("<li class='mbox brick' id='recordsArray_"+totalLength+"'><img class='mngimg' src='<?php echo Yii::app()->getBaseUrl(true);?>/images/mng-album-honeymoon.png'/><img class='mng-h' src='<?php echo Yii::app()->getBaseUrl(true);?>/images/mng-album-honeymoon-h.png'/><span>"+customField+"</span><a href='javascript:;' class='mng-closebtn temporary'><img src='<?php echo Yii::app()->getBaseUrl(true); ?>/images/close-icon.png'/></a></li>");
  	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/AddNewAlbum',
		data: {customtxt:customField},
		cache:false,
		async:true,
		dataType:"json",
		beforeSend: function(data){
		},
		success: function(data){
			ChangeAlbumNameForDefault(data,totalLength);
			},		
			});	
			}else{
				alert("Value cannot be blank");
			}
  $('#custom_album_input').val("");
});

  $(document).on("click", ".temporary", function(event) {
  event.preventDefault();
  event.stopPropagation();
   $this = $(this);
  var iD= $this.closest('.brick').attr('id');
  var res = iD.split("_"); 
  var albumID=res[1];
  var delBrick=$this.closest('.brick').find('h5').text();
  	$.ajax({
		type: 'POST',
		url: '<?php echo Yii::app()->getBaseUrl(true);?>/wedding/Wedding/DeleteNewAlbum',
		data: {album_id:albumID},
		cache:false,
		async:true,
		dataType:"json",
		beforeSend: function(data){
		},
		success: function(data){
				ChangeAlbumName(data);
				$this.closest('.brick').remove();
			
			},		
			});	
}); 
});	
</script>
<script type="text/javascript">    
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 110,
        itemMargin: 0,
        minItems: 0,
        maxItems: 4,
        slideshow: true,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>