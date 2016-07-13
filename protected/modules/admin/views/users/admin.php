<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'users-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'firstname',
		'lastname',
		'user_type',
		'email',
		'username',
		/*
		'password',
		'created_at',
		'updated_at',
		'logdate',
		'lognum',
		'is_active',
		'categories_id',
		'city_id',
		'user_roles',
		'extra',
		*/
		 // array('class'=>'CButtonColumn',
		 	   // 'header'=>'Action',
    		   // 'template'=>'{update} {view} {delete}',
    		   // 'buttons'=>array (
        	   // 'update'=> array(
               			// 'label'=>'',
            			// 'imageUrl'=>'',
            			// 'options'=>array( 'class'=>'icon-edit','title'=>'Edit' ),
        		// ),
        	   // 'view'=>array(
            			// 'label'=>'',
            			// 'imageUrl'=>'',
            			// 'options'=>array( 'class'=>'icon-search','title'=>'View' ),
        		// ),
                // 'delete'=>array(
            			// 'label'=>'',
            			// 'imageUrl'=>'',
            			// 'options'=>array( 'class'=>'icon-trash','title'=>'Delete' ),
        		// ),
			// ),
		// ),
		array(
			'class' => 'CButtonColumn',
			'header'=>'Action', 
			'template'=>'{view} {delete}',
		),
	),
)); ?>