<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- atul -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<!-- atul -->
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
<!-- BEGIN:File Upload Plugin CSS files-->
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END:File Upload Plugin CSS files-->
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/pages/inbox.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/theme/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::app()->request->baseUrl;?>/css/custom_admin.css" rel="stylesheet" type="text/css"/>
<!--<link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> -->

<!-- END THEME STYLES -->
<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-images/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-footer-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/theme/img/wedoo.png" style="width:100px; height:35px;"alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/theme/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="<?php echo Yii::app()->request->baseUrl;?>/theme/img/avatar1.png"/>
					<span class="username">
						 <?php echo ucfirst(Yii::app()->admin->name);?>
					</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo Yii::app()->baseUrl.'/admin/index/logout';?>">
							<i class="fa fa-key"></i> Log Out
						</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li id="dashboard" class="active" >
					<a href="<?php echo Yii::app()->baseUrl.'/admin/index/index'?>">
						<i class="fa fa-home"></i>
						<span class="title">
							Dashboard
						</span>
						<span class="selected">
						</span>
						<span class="arrow open">
						</span>
					</a>
				</li>
				<li id="users">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/UserDetail/admin'?>">
						<i class="fa fa-user"></i>
						<span class="title">
							Users
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<!--<li id="guests">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/UserDetail/guestadmin' ?>">
						<i class="fa fa-user"></i>
						<span class="title">
							Guest
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="typeadmins">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/UserDetail/typeadmin' ?>">
						<i class="fa fa-th"></i>
						<span class="title">
							Admin
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>-->
				<li id="weddings">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Wedding/admin'?>">
						<i class="fa fa-gift"></i>
						<span class="title">
							Weddings
						</span>
						<span class="arrow">
						</span>
					</a>
				</li>
				<li id="albums">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Album/admin'?>">
						<i class="fa fa-cogs"></i>
						<span class="title">
							Albums
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="events" >
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Event/admin' ?>">
						<i class="fa fa-bookmark-o"></i>
						<span class="title">
							Events
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="accomodations" >
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Accomodation/admin' ?>">
						<i class="fa fa-bookmark-o"></i>
						<span class="title">
							Accomodations
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="order">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Order/admin' ?>">
						<i class="fa fa-puzzle-piece"></i>
						<span class="title">
							Orders
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="payment">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Payment/admin' ?>">
						<i class="fa fa-table"></i>
						<span class="title">
							Payments	
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<!--<li>
					<a href="javascript:;">
						<i class="fa fa-envelope-o"></i>
						<span class="title">
							Highlights
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>-->
				<li id="feeds">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/Feedback/admin' ?>">
						<i class="fa fa-sitemap"></i>
						<span class="title">
							Feeds
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="push">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/PushNotification/admin' ?>">
						<i class="fa fa-gift"></i>
						<span class="title">
							Pushnotification
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				<li id="usersetting">
					<a href="<?php echo Yii::app()->baseUrl.'/admin/UserSetting/admin' ?>">
						<i class="fa fa-folder-open"></i>
						<span class="title">
							User Settings
						</span>
						<span class="arrow ">
						</span>
					</a>
				</li>
				
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<?php 
			$controller = Yii::app()->controller->id;
			$action = Yii::app()->controller->action->id;
			if($controller == 'index' && $action == "index"){
		?>
			<div class="page-content" style="min-height:1255px !important; ">
		<?php }else{ ?>
			<div class="page-content">
		<?php } ?>
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			 <?php 
			 	$controller = Yii::app()->controller->id;
			 	$action = Yii::app()->controller->action->id;
			 	if($controller != 'index' && $action != 'index'){ ?>
				 <div class="breadcrumb" style="width:300px;">
					<?php  $this->widget('application.extensions.inx.AdminBreadcrumbs', array(
						'links'=>$this->breadcrumbs));?>
				 </div>
			 <?php } ?>
			 <div class="content_left">
				 <div id="sidebar">
			        <?php
						$this->beginWidget('zii.widgets.CPortlet', array(
						));
						$this->widget('zii.widgets.CMenu', array(
							'items'=>$this->menu,
							'htmlOptions'=>array('class'=>'operations'),
						));
						$this->endWidget();
					?>
			      </div>
		      </div>
			<?php echo $content; ?>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 Copyright &copy; 2015 Wedoo. All screenshots &copy;  design and developed by letsnurture.com.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-ui.js" type="text/javascript"></script> -->
<script src=<?php echo Yii::app()->baseUrl."/js_new/jquery-ui-1.10.3.custom.min.js" ?> type="text/javascript"></script>
<?php 
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;

?>
<!--<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> -->
<?php if($controller == 'index' && $action == 'index' || $controller == 'index' && $action == 'Weddingid'){
?>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<?php } ?>

<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN: Page level plugins -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery.yiigridview.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/plugins/jquery.yiiactiveform.js"></script>

<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<!-- END:File Upload Plugin JS files-->
<!-- END: Page level plugins -->
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/scripts/core/app.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/theme/scripts/custom/inbox.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
   Inbox.init();
   var controller = "<?php echo Yii::app()->getController()->getAction()->controller->id; ?>";
   var action = "<?php echo Yii::app()->controller->action->id; ?>";
  // alert(controller);
   if(controller == 'index' && action == 'index'){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#dashboard').attr('id');
			if(span_val == 'dashboard'){
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#weddings").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#dashboard").addClass('active');
			}
		});
   }
   
   if((controller == 'userDetail') && (action == 'admin' || action == 'update' || action == 'view')){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#users').attr('id');
			if(span_val == 'users'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#weddings").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").addClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").addClass('active');
			}
		});
   }
   
   
   if((controller == 'wedding') && (action == 'admin' || action == 'update' || action == 'view')){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#weddings').attr('id');
			if(span_val == 'weddings'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#weddings").addClass('active');
			}
		});
	}
	
	if((controller == 'index') && (action == 'Weddingid')){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#weddings').attr('id');
			if(span_val == 'weddings'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#weddings").addClass('active');
			}
		});
	}
  
   if((controller == 'event') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index')){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#events').attr('id');
			if(span_val == 'events'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#events").addClass('active');
			}
		});
  }
  
   if((controller == 'accomodation') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#accomodations').attr('id');
			if(span_val == 'accomodations'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#accomodations").addClass('active');
			}
		});
  }
  
   if((controller == 'feedback') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#feeds').attr('id');
			if(span_val == 'feeds'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#feeds").addClass('active');
			}
		});
  }
  
   if((controller == 'order') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#order').attr('id');
			if(span_val == 'order'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#order").addClass('active');
			}
		});
  }
  
   if((controller == 'payment') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#payment').attr('id');
			if(span_val == 'payment'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#payment").addClass('active');
			}
		});
  }
  
   if((controller == 'PushNotification') && (action == 'Admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#push').attr('id');
			if(span_val == 'push'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#push").addClass('active');
			}
		});
  }
  
     if((controller == 'userSetting') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#usersetting').attr('id');
			if(span_val == 'usersetting'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#usersetting").addClass('active');
			}
		});
  }
  
   if((controller == 'album') && (action == 'admin' || action == 'update' || action == 'view' || action == 'index' || action=="create")){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#albums').attr('id');
			if(span_val == 'albums'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				//$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#albums").addClass('active');
			}
		});
  }
  
   if((controller == 'userDetail') && (action == 'guestadmin')){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#guests').attr('id');
			if(span_val == 'guests'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#guests").addClass('active');
			}
		});
  }
  
     if((controller == 'userDetail') && (action == 'typeadmin')){
		$("div.page-sidebar-wrapper div ul li").each(function(){
			var span_val = $("div.page-sidebar-wrapper div ul").find('li#typeadmins').attr('id');
			if(span_val == 'typeadmins'){
				$("div.page-sidebar-wrapper div ul li#dashboard").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#users").removeClass('active');
				$("div.page-sidebar-wrapper div ul li#typeadmins").addClass('active');
			}
		});
  }

});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>