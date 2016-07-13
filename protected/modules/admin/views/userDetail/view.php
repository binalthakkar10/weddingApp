<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	//array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->user_id)),
	//array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->user_id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
//'user_id',
//'cityID',
//'stateID',
//'countryID',
array(
			'name'=>'image',
			'header'=>'Image',
			'filter'=>'',
			'type' => 'html',
			'value'=> CHtml::tag("div",  array("style"=>"text-align: left" ) , CHtml::tag("img", array("height"=>'25px','width'=>'25px',"src" => UtilityHtml::getImageDisplay(GxHtml::valueEx($model,'image'))))),
),
//'auth_id',
'auth_provider',
'user_type',
'fullname',
'username',
//'password',
'email',
'phone',
'mobile',
'address',
'address1',
//'device_type',
//'device_token',
//'created_date',
//'updated_date',
 array(
	    'name' => 'status',
	    'type' => 'raw',
	    'header' => 'status',
		 'value'=>function($model){
			        if ($model->status  == 1){
			            $class = 'Active';
			        }
			        else{
			            $class = 'Inactive';
			        }
			        return $class;
			    	},),

//'field1',
//'field2',
	),
)); ?>