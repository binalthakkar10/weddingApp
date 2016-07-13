<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>.:: weDoo ::.</title>
		
	<?php 
		$controller = Yii::app()->controller->id;
		$action = Yii::app()->controller->action->id;
	?>
	
    <!--meta -->
   	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
    <meta name="description" content="Sidebar Transitions: Transition effects for off-canvas views" />
    <meta name="keywords" content="transition, off-canvas, navigation, effect, 3d, css3, smooth" />
    <meta name="author" content="Codrops" />
	<!--css -->

    <link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/flexslider.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/animsition.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/nav.css" />
   	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
   	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/development.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/toastr.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery.fancybox.css" />
    
	<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-ui.js"></script>
    <?php if($controller == 'page' && $action == 'Features') { ?>
	<?php } else { ?>
    <!--js -->
	<script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/js/angular.min.js";></script>
	<script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.js"></script>
	<script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.min.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/modernizr.custom.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/html5.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/toastr.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.fancybox.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.geocomplete.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/script.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/classie.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/sidebarEffects.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.animsition.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.flexslider.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.easing.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.mousewheel.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/custom.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/waypoints.min.js"></script>
    <script type="text/javascript"  src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/main.js"></script>
	<?php } ?>
</head>

<body>
    <?php $curpage = Yii::app()->getController()->getAction()->controller->id;
	$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id; 
	if( $curpage!="user/Emailverify"){
		if($controller == 'page' && $action == 'Features'){}
		else
		{
			echo $this->renderPartial('/layouts/header'); 
		}
	} 
 		echo $content; 
	if( $curpage!="user/Emailverify"){
		if($controller == 'page' && $action == 'Features'){}
		else
		{
			echo $this->renderPartial('/layouts/footer');
		}
	}
 ?>