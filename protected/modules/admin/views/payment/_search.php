<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'payment_id'); ?>
		<?php echo $form->textField($model, 'payment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'order_id'); ?>
		<?php echo $form->textField($model, 'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'wedding_id'); ?>
		<?php echo $form->textField($model, 'wedding_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'album_id'); ?>
		<?php echo $form->textField($model, 'album_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'transaction_id'); ?>
		<?php echo $form->textField($model, 'transaction_id', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'payment_amount'); ?>
		<?php echo $form->textField($model, 'payment_amount', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currency_type'); ?>
		<?php echo $form->textField($model, 'currency_type', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'payment_mode'); ?>
		<?php echo $form->textField($model, 'payment_mode', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'payment_status'); ?>
		<?php echo $form->textField($model, 'payment_status', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'payment_message'); ?>
		<?php echo $form->textField($model, 'payment_message', array('maxlength' => 255)); ?>
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
