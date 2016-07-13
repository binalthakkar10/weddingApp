<div class="row">
	<div class="col-md-12">
		<div class="portlet-body">
		<?php if(isset($_GET['id']) && !empty($_GET['id'])) { ?>
		<div class="col-md-12 col-lg-12 col-sm-12">
		<div class="col-md-4 col-lg-4 col-sm-4 pull-left" style="width:27%">
			<h1>Wedding Detail</h1>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-4 pull-left" style="margin-top:3%">
			<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name'=>'wedding_uniq_id',
					'source'=>$this->createUrl('wedding/autocompleteTest'),
					// additional javascript options for the autocomplete plugin
					'options'=>array(
							'showAnim'=>'fold',
							'select'=>"js:function(event, ui) {
										  document.location.href = window.location.pathname+'?id='+ui.item.id;
                                        }",
					),
					'htmlOptions'=>array('placeholder'=>'Search','onClick' => 'document.getElementById("wedding_uniq_id").value=""'),
				));
			?>
		</div>
		</div>
		<?php } ?>
		  <!--<select>-->
		<?php //foreach($weddingData as $key) { /*p($key->wedding_uniq_id);*/ /*p($key->wedding_id);*/  ?>
			 <!--<option><?php echo $key->wedding_uniq_id; ?> </option>-->
		<?php //} ?>
		<!--</select>-->
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-lg">
					<li class="active">
						<a href="#tab_1" data-toggle="tab">
							 Wedding
						</a>
					</li>
					<li>
						<a href="#tab_2" data-toggle="tab">
							Wedding Users
						</a>
					</li>
					<li>
						<a href="#tab_3" data-toggle="tab">
							 Albums
						</a>
					</li>
					<li>
						<a href="#tab_4" data-toggle="tab">
							 Event
						</a>
					</li>
						<li>
						<a href="#tab_5" data-toggle="tab">
							 Accomodations
						</a>
					</li>
						<li>
						<a href="#tab_6" data-toggle="tab">
							 Orders
						</a>
					   </li>
					   <li>
						<a href="#tab_7" data-toggle="tab">
							 Payment
						</a>
					   </li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<div class="table-container">
							<?php

							Yii::app()->clientScript->registerScript('weddingsearch', "
							$('.search-button').click(function(){
								$('.search-form').toggle();
								return false;
							});
							$('.search-form form').submit(function(){
								$.fn.yiiGridView.update('wedding-grid', {
									data: $(this).serialize()
								});
								return false;
							});
							");

							 $this->widget('zii.widgets.grid.CGridView', array(
								'id' => 'wedding-grid',
								'dataProvider' => $wedding->weddingsearch(),
								'filter' => $wedding,
								'columns' => array(
									
									array(	
											'name'=>'wedding_id',
											'header'=>'Theme',
											'filter'=>'',
											'type' => 'html',
											'value'=>'CHtml::tag("div",  array("style"=>"text-align: center; background: linear-gradient(#59abe3 50%, #990e49 60%); margin:10px auto; width: 50px; height:50px;"))',
											),
									array(
											'name'=>'image',
											'header'=>'Image',
											'filter'=>'',
											'type' => 'html',
											'value'=> 'CHtml::tag("div",  array("style"=>"text-align: center") , CHtml::tag("img", array("height"=>"50","width"=>"50","src" => "http://letsnurture.co.uk/demo/wedoo/upload/wedding/images.png","class" => "wedding_image")))',
										),
									array(
											'name'=>'to_bride_name',
											'header'=>'Bride',
										),
									array(
											'name'=>'from_groom_name',
											'header'=>'Groom',
										),
									array(
											'name'=>'wedding_location',
											'header'=>'Location',
										),
									'wedding_date',
									array(
										'name'  => 'wedding_id',
										'header' => 'Share By Guest?',
										'value' => 'CHtml::tag("a",array("href"=>"#"),"Yes")',
										'type' => 'html',
									 ),
									
									array(
										'name'  => 'wedding_id',
										'header' => 'Private / Public?',
										'value' => 'CHtml::tag("a",array("href"=>"#"),"Public")',
										'type' => 'html',
									 ),

									array(
											'class' => 'CButtonColumn',
											'header'=>'Action', 
											'template'=>'{update} {view} {delete}',
										),
								),
							)); ?>
						</div>
					</div>
									
					<div class="tab-pane" id="tab_2">
						 <div class="table-container">
							<?php
								$weddingData = Wedding::model()->find("wedding_id = '".$_REQUEST['id']."'");
								$userData = UserDetail::model()->find("user_id = '".$weddingData['user_id']."'");
								
								Yii::app()->clientScript->registerScript('usersearch', "
								$('.search-button').click(function(){
									$('.search-form').toggle();
									return false;
								});
								$('.search-form form').submit(function(){
									$.fn.yiiGridView.update('wedding-grid', {
										data: $(this).serialize()
									});
									return false;
								});
								");
								
								$this->widget('zii.widgets.grid.CGridView', array(
									'id' => 'user-detail-grid',
									'dataProvider' => $userData->search(),
									'filter' => $userData,
									'columns' => array(
										//'user_id',
										//'cityID',
										//'stateID',
										//'countryID',
										//'auth_id',
										array(
											'name'=>'image',
											'header'=>'Image',
											'filter'=>'',
											'type' => 'html',
											'value'=> 'CHtml::tag("div",  array("style"=>"text-align: center" ) , CHtml::tag("img", array("height"=>"50px","width"=>"50px","src" => UtilityHtml::getImageDisplay(GxHtml::valueEx($data,\'image\')))))',
										),
										//'username',
										array(
											'name'=>'username',
											'header' => 'Username',
											'value'=>'CHtml::link($data->username,array("userDetail/view", "id"=>$data->user_id))',
											'type' => 'html',
											'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
											),
										'user_type',
										//'auth_provider',
										'email',
										 array(
													'name'  => 'status',
													'filter'=> array('1'=>'Active','0'=>'Inactive'),			
													'value'=> '($data->status == 1)?CHtml::link(Active, "javascript:;", array("class"=>"statusupdate","id"=>$data->user_id)):CHtml::link(InActive, "javascript:;", array("class"=>"statusupdate","id"=>$data->user_id))',
													'type'  => 'raw',
												 ),

										
										/*
										'fullname',
										'password',
										'image',
										'phone',
										'mobile',
										'address',
										'address1',
										'device_type',
										'device_token',
										'created_date',
										'updated_date',
										'status',
										'field1',
										'field2',
										*/
										// array('class'=>'CButtonColumn',
											   // 'header'=>'Action',
											   // 'template'=>'{update} {view} {delete}',
											   // 'buttons'=>array (
											   // 'update'=> array(
														// 'label'=>'',
														// 'imageUrl'=>'',
														// 'options'=>array( 'class'=>'icon-edit','title'=>'Edit' ),
												// ),
											   // 'view'=>array(
														// 'label'=>'',
														// 'imageUrl'=>'',
														// 'options'=>array( 'class'=>'icon-search','title'=>'View' ),
												// ),
												// 'delete'=>array(
														// 'label'=>'',
														// 'imageUrl'=>'',
														// 'options'=>array( 'class'=>'icon-trash','title'=>'Delete' ),
												// ),
											// ),
										// ),
										array(
											'class' => 'CButtonColumn',
											'header'=>'Action', 
											'template'=>'{view} {delete}',
										),
									),
								)); 
								
								
							?>
							
							<table>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="tab_3">
						<div class="table-container">
							<?php

							$this->breadcrumbs = array(
								$model->label(2) => array('admin'),
								Yii::t('app', 'Manage'),
							);

							$this->menu = array(
									//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
									//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
								);

							Yii::app()->clientScript->registerScript('albumsearch', "
							$('.search-button').click(function(){
								$('.search-form').toggle();
								return false;
							});
							$('.search-form form').submit(function(){
								$.fn.yiiGridView.update('album-grid', {
									data: $(this).serialize()
								});
								return false;
							});
							");
							

							 $this->widget('zii.widgets.grid.CGridView', array(
								'id' => 'album-grid',
								'dataProvider' => $model->albumsearch(),
								'filter' => $model,
								'columns' => array(
									//'album_id',
									// array(
											// 'name'=>'user_id',
											// 'header' => 'Username',
											// 'value'=>'GxHtml::valueEx($data->user)',
											// 'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
											// ),
									array(
											'name'=>'wedding_id',
											'value'=>'GxHtml::valueEx($data->wedding)',
											'filter'=>GxHtml::listDataEx(Wedding::model()->findAllAttributes(null, true)),
											),
									array(
											'name'=>'album_category_id',
											'header' => 'Album Category',
											'value'=>'GxHtml::valueEx($data->albumCategory)',
											'filter'=>GxHtml::listDataEx(AlbumCategory::model()->findAllAttributes(null, true)),
											),
									'created_at',
									'updated_at',
									array(
											'name'=>'album_id',
											'header' => 'Gallery View',
											'value'=>'CHtml::link(CHtml::tag("i",array("class"=>"fa fa-chain fa-lg")),"#",array("data-toggle"=>"modal", "data-target"=>"#album-gallery"))',
											'type' => 'raw',
											'filter'=>GxHtml::listDataEx(Album::model()->findAllAttributes(null, true)),
											),
								),
							)); ?>
						</div>
						
						<div>
							<div id="album-gallery" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Album Gallery</h4>
								  </div>
								  <div class="modal-body">
										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											  <!-- Indicators -->
											  <ol class="carousel-indicators">
												<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												<li data-target="#myCarousel" data-slide-to="1"></li>
												<li data-target="#myCarousel" data-slide-to="2"></li>
												<li data-target="#myCarousel" data-slide-to="3"></li>
											  </ol>

											  <!-- Wrapper for slides -->
											  <div class="carousel-inner" role="listbox">
												<div class="item active">
												  <img src="<?php echo Yii::app()->baseUrl; ?>/upload/album_image/images.jpg" alt="Chania">
												</div>

												<div class="item">
												  <img src="<?php echo Yii::app()->baseUrl; ?>/upload/album_image/images.jpg" alt="Chania">
												</div>

												<div class="item">
												  <img src="<?php echo Yii::app()->baseUrl; ?>/upload/album_image/images.jpg" alt="Chania">
												</div>

												<div class="item">
												<img src="<?php echo Yii::app()->baseUrl; ?>/upload/album_image/images.jpg" alt="Chania">
												</div>
											  </div>

											  <!-- Left and right controls -->
											  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
												<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											  </a>
											  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
												<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											  </a>
											</div>
										</div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Delete This</button>
								  </div>
								</div>

							  </div>
							</div>
						
					</div>
					
					<div class="tab-pane" id="tab_4">
						<div class="table-container">
							<?php

							Yii::app()->clientScript->registerScript('eventsearch', "
							$('.search-button').click(function(){
								$('.search-form').toggle();
								return false;
							});
							$('.search-form form').submit(function(){
								$.fn.yiiGridView.update('event-grid', {
									data: $(this).serialize()
								});
								return false;
							});
							");
							?>

							<?php $this->widget('zii.widgets.grid.CGridView', array(
								
								'id' => 'event-grid',
								'dataProvider' => $event->eventsearch(),
								'filter' => $event,
								'columns' => array(
						
									'event_name',
									array(
											'name'=>'event_datetime',
											'header'=>'Event Date & Time',
										),
									// 'event_datetime',
									'event_location',
									'event_address',
									array(
										'name'=>'user_id',
										'header' => 'Created By',
										'value'=>'CHtml::link($data->user,array("userDetail/view", "id"=>$data->user_id))',
										'type' => 'html',
										),
									array(
										'name'=>'event_link_album_id',
										'header' => 'Associated Album',
										//'value'=>'CHtml::link($data->album_category,array("album/view", "id"=>$data->album_id))',
										'type' => 'html',
										),
								),
							)); ?>
						</div>
					</div>
					
					<div class="tab-pane" id="tab_5">
						<div class="table-container">
							<?php

							$this->breadcrumbs = array(
								$accomodation->label(2) => array('admin'),
								Yii::t('app', 'Manage'),
							);

						

							Yii::app()->clientScript->registerScript('accomsearch', "
							$('.search-button').click(function(){
								$('.search-form').toggle();
								return false;
							});
							$('.search-form form').submit(function(){
								$.fn.yiiGridView.update('accomodation-grid', {
									data: $(this).serialize()
								});
								return false;
							});
							");
							?>
							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id' => 'accomodation-grid',
								'dataProvider' => $accomodation->accomsearch(),
								'filter' => $accomodation,
								'columns' => array(
									//'accomodation_id',
									// array(
										// 'header'=>'Username',
										// 'name'=>'user_id',
										// 'value'=>'UserDetail::getUsername($data->user_id)'
									// ),
									'accom_name',
									'accom_address',
									'accom_web_url',
									'accom_desc',
									 
								),
							)); ?>
						</div>
					</div>
					
					<div class="tab-pane" id="tab_6">
						<div class="table-container">
						</div>
					</div>
					
					<div class="tab-pane" id="tab_7">
						<div class="table-container">
							<?php

							Yii::app()->clientScript->registerScript('paymentsearch', "
							$('.search-button').click(function(){
								$('.search-form').toggle();
								return false;
							});
							$('.search-form form').submit(function(){
								$.fn.yiiGridView.update('payment-grid', {
									data: $(this).serialize()
								});
								return false;
							});
							");
							 $this->widget('zii.widgets.grid.CGridView', array(
								'id' => 'payment-grid',
								'dataProvider' => $payment->paymentsearch(),
								'filter' => $payment,
								'columns' => array(
								
									
									// array(
											// 'name'=>'user_id',
											// 'header'=>'User Name',
											// 'value'=>'GxHtml::valueEx($data->user)',
											// 'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
											// ),
									//'order_id',
									array(
											'name'=>'order_id',
											'header'=>'Order Id',
											),
									
										array(
											'name'=>'transaction_id',
											'header'=>'Transaction Id',
											),
								
								),
							)); ?>
						
						</div>
					</div>		
									
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$(".wedding_image")
	.mouseenter(function(){
		var image = $(this).attr("src");
		var image_offset = $(this).position();
		var image_width = $(this).outerWidth();
		$("#tab_1").append("<div style='display:block; position:absolute;"+
		"left:"+((image_offset.left + image_width))+"px; top:"+(image_offset.top-150)+"px;"+ 
		"'class='full_image'></div>"
		);
		$(".full_image").html("<img src='"+image+"' style='height:"+($(window).height()*50)/100+"px;'>");
	})
	.mouseleave(function(){
		$(".full_image").remove();
	});
	
</script>
	