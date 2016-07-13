<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'order_id'); ?>
		<?php echo $form->textField($model, 'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pattern_id'); ?>
		<?php echo $form->textField($model, 'pattern_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fullname'); ?>
		<?php echo $form->textField($model, 'fullname', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'location_name'); ?>
		<?php echo $form->textField($model, 'location_name', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'street_address'); ?>
		<?php echo $form->textArea($model, 'street_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address2'); ?>
		<?php echo $form->textArea($model, 'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'zipcode'); ?>
		<?php echo $form->textField($model, 'zipcode', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'color_type'); ?>
		<?php echo $form->textField($model, 'color_type', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'no_of_quantity'); ?>
		<?php echo $form->textField($model, 'no_of_quantity'); ?>
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
