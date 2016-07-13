<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'order-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model, 'order_id'); ?>
		<?php echo $form->error($model,'order_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pattern_id'); ?>
		<?php echo $form->textField($model, 'pattern_id'); ?>
		<?php echo $form->error($model,'pattern_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model, 'fullname', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'fullname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'location_name'); ?>
		<?php echo $form->textField($model, 'location_name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'location_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'street_address'); ?>
		<?php echo $form->textArea($model, 'street_address'); ?>
		<?php echo $form->error($model,'street_address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textArea($model, 'address2'); ?>
		<?php echo $form->error($model,'address2'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'city'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model, 'state', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'state'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'country'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'zipcode'); ?>
		<?php echo $form->textField($model, 'zipcode', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'zipcode'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'color_type'); ?>
		<?php echo $form->textField($model, 'color_type', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'color_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'no_of_quantity'); ?>
		<?php echo $form->textField($model, 'no_of_quantity'); ?>
		<?php echo $form->error($model,'no_of_quantity'); ?>
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