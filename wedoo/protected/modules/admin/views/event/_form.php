<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'event-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_name'); ?>
		<?php echo $form->textField($model, 'event_name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'event_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_datetime'); ?>
		<?php echo $form->textField($model, 'event_datetime'); ?>
		<?php echo $form->error($model,'event_datetime'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_location'); ?>
		<?php echo $form->textField($model, 'event_location', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'event_location'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_address'); ?>
		<?php echo $form->textArea($model, 'event_address'); ?>
		<?php echo $form->error($model,'event_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_latitute'); ?>
		<?php echo $form->textField($model, 'event_latitute', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'event_latitute'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_longitude'); ?>
		<?php echo $form->textField($model, 'event_longitude', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'event_longitude'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_description'); ?>
		<?php echo $form->textArea($model, 'event_description'); ?>
		<?php echo $form->error($model,'event_description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'event_link_album_id'); ?>
		<?php echo $form->textField($model, 'event_link_album_id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'event_link_album_id'); ?>
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
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 1)); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'field1'); ?>
		<?php echo $form->textField($model, 'field1', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'field1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'field2'); ?>
		<?php echo $form->textField($model, 'field2', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'field2'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->