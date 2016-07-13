<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'wedding-form',
	'enableAjaxValidation' => false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
        'validateOnChange'=>true,
		'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'to_bride_name'); ?>
		<?php echo $form->textField($model, 'to_bride_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'to_bride_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'to_groom_name'); ?>
		<?php echo $form->textField($model, 'to_groom_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'to_groom_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'to_partner_name'); ?>
		<?php echo $form->textField($model, 'to_partner_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'to_partner_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from_bride_name'); ?>
		<?php echo $form->textField($model, 'from_bride_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'from_bride_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from_groom_name'); ?>
		<?php echo $form->textField($model, 'from_groom_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'from_groom_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'from_partner_name'); ?>
		<?php echo $form->textField($model, 'from_partner_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'from_partner_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php 
			if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					if(isset($model->image) && !empty($model->image)){
						$img = $baseUrl.'/upload/wedding_cover_image/'.$model->image;
					}else{
						$img = $baseUrl.'/upload/wedding_cover_image/images.jpg';
					} ?>
					<?php if(isset($model->image) && !empty($model->image)){  ?>
				    	<?php if($img!='' && file_exists(Yii::app()->request->baseUrl.'/upload/wedding_cover_image/').$img) { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/wedding_cover_image/".$model->image; ?>" height="25px" width="25px" />
								 <input type="hidden" id="Wedding_image" name="Wedding[image]" value="<?php echo $model->image;?>" />
						<?php }else { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/wedding_cover_image/images.jpg";?>" height="25px" width="25px" />
						<?php } ?>
				    <?php }else{ ?>
				    	<?php if($img!='' && file_exists(Yii::app()->request->baseUrl.'/upload/wedding_cover_image/').$img) { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/wedding_cover_image/".$model->image; ?>" height="25px" width="25px" />
								 <input type="hidden" id="Wedding_image" name="Wedding[image]" value="<?php echo $model->image;?>" />
						<?php }else { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/wedding_cover_image/images.jpg";?>" height="25px" width="25px" />
						<?php } ?>
				    <?php } ?>	
		<?php }?>
		<?php echo $form->error($model,'image'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'wedding_date'); ?>
		
		<?php 
			$this->widget('application.extensions.EJuiDateTimePicker.EJuiDateTimePicker',array(
			    'model'=>$model,
			    'attribute'=>'wedding_date',
			    'options'=>array(
			        'changeMonth' => true,
			        'changeYear' => false,
			 		'language' => '',
			        ),
			    ));  
		?>
		<?php echo $form->error($model,'wedding_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'wedding_location'); ?>
		<?php echo $form->textField($model, 'wedding_location', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'wedding_location'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'wedding_uniq_id'); ?>
		<?php echo $form->textField($model, 'wedding_uniq_id', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'wedding_uniq_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', array('1'=>Yii::t('app','Active'),'0'=>Yii::t('app','Inactive'))); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<?php /* ?>
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
		<?php echo $form->labelEx($model,'field2'); ?>
		<?php echo $form->textField($model, 'field2', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'field2'); ?>
		</div><!-- row -->
		<?php */ ?>
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->