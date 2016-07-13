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
	$.fn.yiiGridView.update('payment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php /*$this->renderPartial('_search', array(
	'model' => $model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'payment-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'payment_id',
		// array(
				// 'name'=>'payment_id',
				// 'header'=>'Payment Id',
				// ),
		
		array(
				'name'=>'user_id',
				'header'=>'User Name',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
				),
		//'order_id',
		array(
				'name'=>'order_id',
				'header'=>'Order Id',
				),
		//'wedding_id',
				// array(
				// 'name'=>'wedding_id',
				// 'header'=>'Wedding Id',
				// ),
		//'album_id',
			// array(
				// 'name'=>'album_id',
				// 'header'=>'Album Id',
				// ),
		//'transaction_id',
			array(
				'name'=>'transaction_id',
				'header'=>'Transaction Id',
				),
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
		'payment_amount',
		'currency_type',
		'payment_mode',
		'payment_status',
		'payment_message',
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