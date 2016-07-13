<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'album-form',
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
		<?php echo $form->labelEx($model,'wedding_id'); ?>
		<?php echo $form->dropDownList($model, 'wedding_id', GxHtml::listDataEx(Wedding::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'wedding_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'album_category_id'); ?>
		<?php echo $form->dropDownList($model, 'album_category_id', GxHtml::listDataEx(AlbumCategory::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'album_category_id'); ?>
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
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model, 'position'); ?>
		<?php echo $form->error($model,'position'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'is_delete'); ?>
		<?php echo $form->textField($model, 'is_delete', array('maxlength' => 1)); ?>
		<?php echo $form->error($model,'is_delete'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('comments')); ?></label>
		<?php echo $form->checkBoxList($model, 'comments', GxHtml::encodeEx(GxHtml::listDataEx(Comment::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->