<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		 // array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index'))
		// array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accomodation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<!--<div class="search-form">-->
<?php /*$this->renderPartial('_search', array(
	'model' => $model,
));*/ ?>
<!--</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'accomodation-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'accomodation_id',
		array(
			'header'=>'Username',
			'name'=>'user_id',
			'value'=>'UserDetail::getUsername($data->user_id)'
		),
		'accom_name',
		'accom_address',
		'accom_web_url',
		'accom_desc',
		 array(
                    'name'  => 'status',
					'filter'=> array('1'=>'Active','0'=>'Inactive'),			
                    'value'=> '($data->status == 1)?CHtml::link(Active, "javascript:;", array("class"=>"statusupdate","id"=>$data->accomodation_id)):CHtml::link(InActive, "javascript:;", array("class"=>"statusupdate","id"=>$data->accomodation_id))',
                    'type'  => 'raw',
                 ),

		/*
		'created_at',
		'updated_at',
		'status',
		'field1',
		'field2',
		*/
		// array(
			// 'class' => 'CButtonColumn',
			// 'header'=>'Action', 
			// 'template'=>'{view} {delete}',
		// ),
		array('class'=>'CButtonColumn',
			  'header'=>'Action',
    		  'template'=>'{view} {delete}',
    		 
    		 ),
	),
)); ?>

<script>
$('document').ready(function(){
	$("a.statusupdate").live('click', function(e){
		e.preventDefault();
		if (confirm('Are you sure Change Status?')){
			var accomodation_id = $(this).attr('id');
			$.ajax({
				"url":'<?php echo Yii::app()->createUrl('admin/Accomodation/statusUpdate');?>',
				"type":"POST",
				"data":{"accomodation_id":accomodation_id},
				"success":function(data){
					$.fn.yiiGridView.update('accomodation-grid');
					//window.location.reload();
				},
			});
			return;
		}
	});
});
</script>