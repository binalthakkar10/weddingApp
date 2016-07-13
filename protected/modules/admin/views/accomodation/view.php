<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	// array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	// array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	// array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->accomodation_id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->accomodation_id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
//'accomodation_id',
array(
			'header'=>'Username',
			'name'=>'user_id',
			'value'=>UserDetail::getUsername($model->user_id)
		),
'accom_name',
'accom_address',
'accom_web_url',
'accom_desc',
'created_at',
'updated_at',
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

