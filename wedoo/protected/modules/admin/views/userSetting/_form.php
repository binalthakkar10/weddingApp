<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-setting-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'wedding_id'); ?>
		<?php echo $form->textField($model, 'wedding_id'); ?>
		<?php echo $form->error($model,'wedding_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'push_notification'); ?>
		<?php echo $form->textField($model, 'push_notification', array('maxlength' => 3)); ?>
		<?php echo $form->error($model,'push_notification'); ?>
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