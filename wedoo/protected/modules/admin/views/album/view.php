<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	//array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->album_id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->album_id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
//'album_id',
array(
			'name' => 'user',
			'type' => 'raw',
			'value' => $model->user !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->user)), array('userDetail/view', 'id' => GxActiveRecord::extractPkValue($model->user, true))) : null,
			),
array(
			'name' => 'wedding',
			'type' => 'raw',
			'value' => $model->wedding !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->wedding)), array('wedding/view', 'id' => GxActiveRecord::extractPkValue($model->wedding, true))) : null,
			),
array(
			'name' => 'albumCategory',
			'type' => 'raw',
			'value' => $model->albumCategory !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->albumCategory)), array('albumCategory/view', 'id' => GxActiveRecord::extractPkValue($model->albumCategory, true))) : null,
			),
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

//'position',
//'is_delete',
	),
)); ?>

