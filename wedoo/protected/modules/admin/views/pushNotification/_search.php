<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'push_id'); ?>
		<?php echo $form->textField($model, 'push_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'event_id'); ?>
		<?php echo $form->textField($model, 'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'album_id'); ?>
		<?php echo $form->textField($model, 'album_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'wedding_id'); ?>
		<?php echo $form->textField($model, 'wedding_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'push_type'); ?>
		<?php echo $form->textField($model, 'push_type', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'push_message'); ?>
		<?php echo $form->textArea($model, 'push_message'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'push_flag'); ?>
		<?php echo $form->textField($model, 'push_flag', array('maxlength' => 3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'issent'); ?>
		<?php echo $form->textField($model, 'issent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'isread'); ?>
		<?php echo $form->textField($model, 'isread'); ?>
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
