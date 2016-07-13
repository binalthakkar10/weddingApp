<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'payment-form',
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
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model, 'order_id'); ?>
		<?php echo $form->error($model,'order_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'wedding_id'); ?>
		<?php echo $form->textField($model, 'wedding_id'); ?>
		<?php echo $form->error($model,'wedding_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'album_id'); ?>
		<?php echo $form->textField($model, 'album_id'); ?>
		<?php echo $form->error($model,'album_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'transaction_id'); ?>
		<?php echo $form->textField($model, 'transaction_id', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'transaction_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'payment_amount'); ?>
		<?php echo $form->textField($model, 'payment_amount', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'payment_amount'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'currency_type'); ?>
		<?php echo $form->textField($model, 'currency_type', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'currency_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'payment_mode'); ?>
		<?php echo $form->textField($model, 'payment_mode', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'payment_mode'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'payment_status'); ?>
		<?php echo $form->textField($model, 'payment_status', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'payment_status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'payment_message'); ?>
		<?php echo $form->textField($model, 'payment_message', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'payment_message'); ?>
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