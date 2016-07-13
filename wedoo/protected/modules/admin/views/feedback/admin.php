<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('feedback-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php //echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<!--<div class="search-form"> -->
<?php /*$this->renderPartial('_search', array(
	'model' => $model,
)); */ ?>
<!--</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'feedback-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'feedback_id',
		array(
				'name'=>'user_id',
				'header' => 'Username',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'wedding_id',
				'value'=>'GxHtml::valueEx($data->wedding)',
				'filter'=>GxHtml::listDataEx(Wedding::model()->findAllAttributes(null, true)),
				),
		'rating',
		'created_at',
		'updated_at',
		 array(
	    'name' => 'status',
	    'type' => 'raw',
	    'header' => 'Status',
		 'value'=>function($model){
			        if ($model->status  == 1){
			            $class = 'Active';
			        }
			        else{
			            $class = 'Inactive';
			        }
			        return $class;
			    	},),

		/*
		'status',
		'feedback',
		'field2',
		*/
		// array(
			// 'class' => 'CButtonColumn',
		// ),
		array(
			'class' => 'CButtonColumn',
			'header'=>'Action', 
			'template'=>'{view} {delete}',
		),
	),
)); ?>