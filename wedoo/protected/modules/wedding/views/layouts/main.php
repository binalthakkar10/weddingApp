<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>.:: weDoo ::.</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
		<meta name="description" content="Sidebar Transitions: Transition effects for off-canvas views" />
		<meta name="keywords" content="transition, off-canvas, navigation, effect, 3d, css3, smooth" />
		<meta name="author" content="Codrops" />

	<!-- <title><?php echo CHtml::encode($this->pageTitle); ?></title> -->
	<!---css-->
		<?php 
			$controller = Yii::app()->controller->id;
			$action = Yii::app()->controller->action->id;
		?>
		<?php if($controller == 'wedding' && $action == 'Wedding_Signup' || 
					$controller == 'wedding' && $action == 'blog' || 
					$controller == 'wedding' && $action == 'SlideShow' || 
					$controller == 'wedding' && $action == 'photoalbum' || 
					$controller == 'wedding' && $action == 'ViewProfile' || 
					$controller == 'wedding' && $action == 'createnewwedding'){?>
		<?php }else{ ?>
		<!--<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" /> -->
        <link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery.mCustomScrollbar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/flexslider.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
			
		<!-- Purvesh Patel - FAQ 25/3/2015 -->
			<?php if($controller == 'wedding' && $action == 'faq'){?>
			<?php }else{ ?>
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
			<?php } ?>
		<!-- END Purvesh Patel - FAQ 25/3/2015 -->
		<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />-->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/development.css" />
		<!--- Binal custom css 3/5/2015 -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/toastr.css" />
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery-ui-1.10.2.custom.css" /> -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery.fancybox.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/vendor/jquery.Jcrop.css">  
		
		<!-- slider css-->
		<?php if($controller == 'wedding' && $action == 'SlideShow'){?>
		<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/res.css">		
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap.css">-->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap-select.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/bootstrap-slider.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/slider_main.css">
		<?php } ?>
		<!-- slider css-->
		
		<!-- End of Custom css -->
	
	
	<!--js -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/html5.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/js/angular.min.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/modernizr.custom.js"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true).'/site-js/toastr.js'; ?>"></script>
	    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true).'/site-js/jquery.fancybox.js'; ?>"></script>
	    <!-- <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-ui-timepicker-addon.js"></script>   -->
	    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/load-image.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-ios.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true);?>/js/vendor/load-image-orientation.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/load-image-meta.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/load-image-exif.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/load-image-exif-map.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/jquery.Jcrop.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/vendor/demo.js"></script>
		<script defer type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.flexslider.js"></script>
		
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.geocomplete.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/script.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.animsition.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.mCustomScrollbar.js"></script>
		<?php if(!($controller == 'wedding' && $action == 'ColorEdit')){ ?>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/custom.js"></script>
		<?php } ?>
		<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap-select.min.js"></script>
			
		<?php } ?>
		
	<!-- Purvesh Patel - SlideShow 24/3/2015 -->
	<?php if($controller == 'wedding' && $action == 'SlideShow'){?>
		<!-- CSS -->
			<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-select.css">
			<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-slider.css" >
			<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/slider_main.css" type="text/css" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
		<!-- END CSS -->
		
		<!-- JS -->
		
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/fullscreen.js"></script>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap-select.min.js"></script>
			<script type="text/javascript" src="js/html5.js"></script>
			<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.easing.min.js"></script>
			<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/supersized.3.2.7.js"></script>
			<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/supersized.shutter.js"></script>
			<script type='text/javascript' src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap-slider.js"></script>
		
		<!-- END JS -->
	<?php } ?>
	<!-- END Purvesh Patel - SlideShow 24/3/2015 -->
	
	<!-- Purvesh Patel - FAQ 25/3/2015 -->
	<?php if($controller == 'wedding' && $action == 'faq'){?>
		<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bs_leftnavi.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
		<!-- END CSS -->
		
		<!-- JS -->
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bs_leftnavi.js"></script>
		<!-- END JS -->
	<?php } ?>
	<!-- END Purvesh Patel - FAQ 25/3/2015 -->
	
	<!-- Purvesh Patel - BLOG 25/3/2015 -->
	<?php if($controller == 'wedding' && $action == 'blog'){?>
		<!-- CSS -->
			<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/flexslider.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery.mCustomScrollbar.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/animsition.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/nav.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
		<!-- END CSS -->
		
		<!-- JS -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/modernizr.custom.js"></script>
			<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/html5.js"></script>
		<!-- END JS -->
	<?php } ?>
	<!-- END Purvesh Patel - BLOG 25/3/2015 -->
	
	<!-- Purvesh Patel - PHOTO ALBUM 26/3/2015 -->
	<?php if($controller == 'wedding' && $action == 'photoalbum' || $controller == 'wedding' && $action == 'ViewProfile'){?>
		<!-- CSS -->
			<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
			<link href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery.mCustomScrollbar.css" rel="stylesheet" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
			<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/falguni.css" />-->
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/font-awesome.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/font-awesome.min.css" />
			<?php if($controller == 'wedding' && $action == 'ViewProfile') { ?>
				<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/development.css" />
			<?php } ?>
		<!-- END CSS -->
		
		<!-- JS -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/bootstrap.js"></script>
			<script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.mCustomScrollbar.js"></script> 
			<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/html5.js"></script>
		<!-- END JS -->
	<?php } ?>
	<!-- END Purvesh Patel - PHOTO ALBUM 26/3/2015 -->
	
	<!-- Purvesh Patel - CREATE NEW WEDDING 26/3/2015 -->
	<?php if($controller == 'wedding' && $action == 'createnewwedding'){?>
		<!-- CSS -->
			<link rel="icon" type="icon/ico" href="<?php echo Yii::app()->getBaseUrl(true)?>/images/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/fonts.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/jquery-ui.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/bootstrap-select.css">
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/style.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true)?>/site-css/res.css" />
		<!-- END CSS -->
		
		<!-- JS -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/html5.js"></script>
	


		<!-- END JS -->
	<?php } ?>
	
	<!-- END Purvesh Patel - CREATE NEW WEDDING 26/3/2015 -->
	

	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<!-- <script src="<?php echo Yii::app()->getBaseUrl(true)?>/site-js/jquery.min.js"></script> -->
	<!-- <script src="<?php echo Yii::app()->getBaseUrl(true)?>/js_new/jquery-ui-1.10.3.custom.min.js"></script> -->
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script> -->
	
</head>
<body>
 <?php if($controller == 'wedding' && $action == 'blog'){?>
<?php echo $content; ?>
<?php }else{ ?>

<div id="wrapper">

<?php 
	function code_converter($code,$type)
	{
		function hex2rgb($hex) {
		   $hex = str_replace("#", "", $hex);

		   if(strlen($hex) == 3) {
			  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
			  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
			  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
			  $r = hexdec(substr($hex,0,2));
			  $g = hexdec(substr($hex,2,2));
			  $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);
		   //return implode(",", $rgb); // returns the rgb values separated by commas
		   return $rgb; // returns an array with the rgb values
		}
		
		function rgb_explode($code)
		{
			$code = str_replace("rgb(","",$code);
			$code = str_replace(")","",$code);
			return explode(",",$code);
		}
		
		if($type == "hex") $rgb_array = hex2rgb($code);
		else if($type == "rgb") $rgb_array = rgb_explode($code);
		$rgb = implode(",",$rgb_array);
		return "rgba(".$rgb.",0.2)";
	}
?>

<?php 	if(isset($_SESSION['wedding_id']) && $_SESSION['wedding_id'] != "") 
		{ 
			$colorTheme = ColorTheme::model()->find("wedding_id ='".$_SESSION['wedding_id']."'");
			if($colorTheme)
			{
			?>
				<style>
					/* primary color */ 
						.admin-white-head h1 { border-color: <?php echo $colorTheme['main_color_code']; ?>;}
						.admin-bot-nav li a i,
						#side-bar-menu .logo ,
						#side-bar-menu .side-prfl-img .edit,
						.admin-header .admin-top-nav li a:hover,
						#side-bar-menu .icon-bar ul.noti-nav li span,
						#side-bar-menu .icon-bar::before,
						#side-bar-menu #sidebar-nav ul li a:hover,
						#side-bar-menu .icon-bar ul.noti-drop li a.active,
						#side-bar-menu .icon-bar ul.noti-drop li a:hover,
						#side-bar-menu .icon-bar ul.noti-nav li a.active,
						#side-bar-menu .icon-bar ul.noti-nav li a:hover { background-color: <?php echo $colorTheme['main_color_code']; ?>;}

						.admin-white-head h1,
						#side-bar-menu .wding-day-counter .counnter li { color: <?php echo $colorTheme['main_color_code']; ?>;}
						
						.admin-header { background-color:<?php echo code_converter($colorTheme['main_color_code'],"rgb"); ?>; }
						
				</style>
				<style>
					/* secondry color */

						#side-bar-menu .wedng-id,
						.admin-header .admin-logo span,
						.admin-header .admin-top-nav li a i,
						#side-bar-menu #sidebar-nav ul li i,
						#side-bar-menu #sidebar-nav ul li i,
						#side-bar-menu #sidebar-nav ul li a,
						#side-bar-menu .wding-day-counter i { color:<?php echo $colorTheme['accent_color_code']; ?>;}
						.admin-or-line span,
						.admin-white-head .count,
						#side-bar-menu .icon-bar::after,
						#side-bar-menu .side-prfl-img,
						#side-bar-menu .icon-bar{ background-color:<?php echo $colorTheme['accent_color_code']; ?>;}
						#side-bar-menu .icon-bar .noti-drop li { border-bottom:1px solid <?php echo $colorTheme['accent_color_code']; ?>; }
						
				</style>
	<?php 	} 
		else{ ?>
				<style></style>
				<style></style>
	<?php 	} ?>
<?php 	} ?>
		
	
    <?php 
    $curpage = Yii::app()->getController()->getAction()->controller->id;
	$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
    ?>
	<!-- <div id="contentarea" class="col2-layout"> -->
		<!-- <div class="content"> -->
			<!-- <div class="sidebar-left"> -->
			
			<?php if($controller == 'wedding' && $action == 'Wedding_Signup' || $controller == 'wedding' && $action == 'SlideShow' || $controller == 'wedding' && $action == 'faq' || $controller == 'wedding' && $action == 'createnewwedding'){?>
			<?php }else{ ?>
				<?php $this->renderPartial('/layouts/left_sidebar');?>
			<?php } ?>
			<!-- </div> -->
			 <!-- <div class="sidebar-right"> -->
				<?php echo $content; ?>
			<!-- </div> -->
		<!-- </div>
	</div> -->
</div>
<?php } ?>

</body>
</html>