<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'users-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'firstname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'lastname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->textField($model, 'user_type', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'user_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 250)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 150)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'logdate'); ?>
		<?php echo $form->textField($model, 'logdate'); ?>
		<?php echo $form->error($model,'logdate'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lognum'); ?>
		<?php echo $form->textField($model, 'lognum', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'lognum'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model, 'is_active', array('maxlength' => 1)); ?>
		<?php echo $form->error($model,'is_active'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'categories_id'); ?>
		<?php echo $form->textField($model, 'categories_id', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'categories_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->textField($model, 'city_id', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'city_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_roles'); ?>
		<?php echo $form->textField($model, 'user_roles', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'user_roles'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'extra'); ?>
		<?php echo $form->textArea($model, 'extra'); ?>
		<?php echo $form->error($model,'extra'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->