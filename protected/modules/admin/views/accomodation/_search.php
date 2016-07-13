<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'accomodation_id'); ?>
		<?php echo $form->textField($model, 'accomodation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accom_name'); ?>
		<?php echo $form->textField($model, 'accom_name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accom_address'); ?>
		<?php echo $form->textArea($model, 'accom_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accom_web_url'); ?>
		<?php echo $form->textField($model, 'accom_web_url', array('maxlength' => 350)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accom_desc'); ?>
		<?php echo $form->textArea($model, 'accom_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'field1'); ?>
		<?php echo $form->textField($model, 'field1', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'field2'); ?>
		<?php echo $form->textField($model, 'field2', array('maxlength' => 100)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
