<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cityID'); ?>
		<?php echo $form->textField($model, 'cityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'stateID'); ?>
		<?php echo $form->textField($model, 'stateID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'countryID'); ?>
		<?php echo $form->textField($model, 'countryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'auth_id'); ?>
		<?php echo $form->textField($model, 'auth_id', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'auth_provider'); ?>
		<?php echo $form->textField($model, 'auth_provider', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_type'); ?>
		<?php echo $form->textField($model, 'user_type', array('maxlength' => 5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fullname'); ?>
		<?php echo $form->textField($model, 'fullname', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'image'); ?>
		<?php echo $form->textField($model, 'image', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mobile'); ?>
		<?php echo $form->textField($model, 'mobile', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address'); ?>
		<?php echo $form->textArea($model, 'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address1'); ?>
		<?php echo $form->textArea($model, 'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'device_type'); ?>
		<?php echo $form->textField($model, 'device_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'device_token'); ?>
		<?php echo $form->textField($model, 'device_token', array('maxlength' => 500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_date'); ?>
		<?php echo $form->textField($model, 'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'updated_date'); ?>
		<?php echo $form->textField($model, 'updated_date'); ?>
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
