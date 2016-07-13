<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'push-notification-form',
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
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model, 'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'album_id'); ?>
		<?php echo $form->textField($model, 'album_id'); ?>
		<?php echo $form->error($model,'album_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'wedding_id'); ?>
		<?php echo $form->textField($model, 'wedding_id'); ?>
		<?php echo $form->error($model,'wedding_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'push_type'); ?>
		<?php echo $form->textField($model, 'push_type', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'push_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'push_message'); ?>
		<?php echo $form->textArea($model, 'push_message'); ?>
		<?php echo $form->error($model,'push_message'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'push_flag'); ?>
		<?php echo $form->textField($model, 'push_flag', array('maxlength' => 3)); ?>
		<?php echo $form->error($model,'push_flag'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'issent'); ?>
		<?php echo $form->textField($model, 'issent'); ?>
		<?php echo $form->error($model,'issent'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'isread'); ?>
		<?php echo $form->textField($model, 'isread'); ?>
		<?php echo $form->error($model,'isread'); ?>
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