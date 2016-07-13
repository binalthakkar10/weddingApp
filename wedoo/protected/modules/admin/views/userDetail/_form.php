<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-detail-form',
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
		<?php /* ?>
		<div class="row">
		<?php echo $form->labelEx($model,'cityID'); ?>
		<?php echo $form->textField($model, 'cityID'); ?>
		<?php echo $form->error($model,'cityID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'stateID'); ?>
		<?php echo $form->textField($model, 'stateID'); ?>
		<?php echo $form->error($model,'stateID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'countryID'); ?>
		<?php echo $form->textField($model, 'countryID'); ?>
		<?php echo $form->error($model,'countryID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'auth_id'); ?>
		<?php echo $form->textField($model, 'auth_id', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'auth_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'auth_provider'); ?>
		<?php echo $form->textField($model, 'auth_provider', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'auth_provider'); ?>
		</div><!-- row -->
		<?php */ ?>
		<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->textField($model, 'user_type', array('maxlength' => 5)); ?>
		<?php echo $form->error($model,'user_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model, 'fullname', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'fullname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model, 'username', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div><!-- row -->
		<?php /* ?>
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div><!-- row -->
		<?php */ ?>
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php $path = YiiBase::getPathOfAlias('webroot');?>
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php 
			if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
					if(isset($model->image) && !empty($model->image)){
						$img = $baseUrl.'/upload/user_image/'.$model->image;
					}else{
						$img = $baseUrl.'/upload/user_image/images.jpg';
					} ?>
					<?php if(isset($model->image) && !empty($model->image)){  ?>
				    	<?php if($img!='' && file_exists(Yii::app()->request->baseUrl.'/upload/user_image/').$img) { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/user_image/".$model->image; ?>" height="25px" width="25px" />
								 <input type="hidden" id="UserDetail_image" name="UserDetail[image]" value="<?php echo $model->image;?>" />
						<?php }else { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/user_image/images.jpg";?>" height="25px" width="25px" />
						<?php } ?>
				    <?php }else{ ?>
				    	<?php if($img!='' && file_exists(Yii::app()->request->baseUrl.'/upload/user_image/').$img) { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/user_image/".$model->image; ?>" height="25px" width="25px" />
								 <input type="hidden" id="UserDetail_image" name="UserDetail[image]" value="<?php echo $model->image;?>" />
						<?php }else { ?>
								 <img src="<?php echo Yii::app()->request->baseUrl."/upload/user_image/images.jpg";?>" height="25px" width="25px" />
						<?php } ?>
				    <?php } ?>	
		<?php }?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model, 'phone', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model, 'mobile', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'mobile'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model, 'address', array('style'=>'width: 249px')); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textArea($model, 'address1', array('style'=>'width: 249px')); ?>
		<?php echo $form->error($model,'address1'); ?>
		</div><!-- row -->
		<?php /* ?>
		<div class="row">
		<?php echo $form->labelEx($model,'device_type'); ?>
		<?php echo $form->textField($model, 'device_type'); ?>
		<?php echo $form->error($model,'device_type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'device_token'); ?>
		<?php echo $form->textField($model, 'device_token', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'device_token'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model, 'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_date'); ?>
		<?php echo $form->textField($model, 'updated_date'); ?>
		<?php echo $form->error($model,'updated_date'); ?>
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
		<?php */ ?>
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', array('1'=>Yii::t('app','Active'),'0'=>Yii::t('app','Inactive'))); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->