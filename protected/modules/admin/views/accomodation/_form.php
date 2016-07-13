<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'accomodation-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<!--<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div>--><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'accom_name'); ?>
		<?php echo $form->textField($model, 'accom_name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'accom_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'accom_address'); ?>
		<?php echo $form->textArea($model, 'accom_address'); ?>
		<?php echo $form->error($model,'accom_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'accom_web_url'); ?>
		<?php echo $form->textField($model, 'accom_web_url', array('maxlength' => 350)); ?>
		<?php echo $form->error($model,'accom_web_url'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'accom_desc'); ?>
		<?php echo $form->textArea($model, 'accom_desc'); ?>
		<?php echo $form->error($model,'accom_desc'); ?>
		</div><!-- row -->
		<!--<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div>--><!-- row -->
		<!--<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div>--><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 1)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<!--<div class="row">
		<?php echo $form->labelEx($model,'field1'); ?>
		<?php echo $form->textField($model, 'field1', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'field1'); ?>
		</div>--><!-- row -->
		<!--<div class="row">
		<?php echo $form->labelEx($model,'field2'); ?>
		<?php echo $form->textField($model, 'field2', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'field2'); ?>
		</div>--><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->