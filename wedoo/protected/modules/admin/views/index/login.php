<script>
$(document).ready(function(){
	setTimeout(function(){ $(".flash-error").hide(); },3000);
});
</script>
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>
<!-- <div class="repairersreg"><h1><a href="Repairersreg/create"> Repairer Registration </a></h1></div> -->
<h3 class="form-title">Login to your account</h3>
<div class="login_box">
<div class="form">
<!--<p>Please fill out the following form with your login credentials:</p>-->
		


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
    'clientOptions' => array(
		      'validateOnSubmit'=>true,
		      //'validateOnChange'=>true,
		      //'validateOnType'=>true,
    ),
	'htmlOptions'=>array(
        'class'=>'login-form',
    ),
)); ?>
	
	<p>
	   <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>
	</p>
	<?php
	    foreach(Yii::app()->admin->getFlashes() as $key => $message) {
	        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	    }
	?>
	<?php Yii::app()->clientScript->registerScript(null,'$("#AdminLoginForm_username").focus();') ?>
	<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
			<i class="fa fa-user"></i>
			 <?php echo $form->textField($model,'username',array('class'=>"form-control placeholder-no-fix",'placeholder'=>'Username')); ?>
		    </div>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
			<i class="fa fa-lock"></i>
			  <?php echo $form->passwordField($model,'password',array('class'=>"form-control placeholder-no-fix",'placeholder'=>'Password')); ?>
			</div>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-actions">
		<button type="submit" class="btn blue pull-right" name="yt0">
				Login <i class="m-icon-swapright m-icon-white"></i>
		</button>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

</div>