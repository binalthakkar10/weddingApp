<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

// $this->menu = array(
		// array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		// array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php //echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<!--<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php /*$this->renderPartial('_search', array(
	'model' => $model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'order-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
	    array(
		'name'=>'order_id',
		'header'=>'Order Id',
		),
		array(
				'name'=>'user_id',
				'header'=>'User Name',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
				),
		'pattern_id',
		'fullname',
		'location_name',
		'street_address',
		array(
	    'name' => 'status',
	    'type' => 'raw',
	    'header' => 'Status',
		 'value'=>function($model){
			        if ($model->status  == 1){
			            $class = 'Complete';
			        }
			        else{
			            $class = 'Pending';
			        }
			        return $class;
			    	},),
		/*
		'address2',
		'city',
		'state',
		'country',
		'zipcode',
		'color_type',
		'no_of_quantity',
		'created_at',
		'updated_at',
		'status',
		'field1',
		'field2',
		*/
		array(
			'class' => 'CButtonColumn',
			'header'=>'Action', 
			'template'=>'{view} {delete}',
		),
	),
)); ?>