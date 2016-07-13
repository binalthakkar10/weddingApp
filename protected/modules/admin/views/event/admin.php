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
	$.fn.yiiGridView.update('event-grid', {
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
    
	'id' => 'event-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'event_id',
		// array(
		    // 'class'=>'CCheckBoxColumn',
			// 'header'=>'Delete', 
			// //'value' => '$data["id"]',
			// //'value'=>'CHtml::checkBox("cid[]",null,array("value"=>$id))',
		// ),
		//'event_id',
		'username',
		// array(
				// 'name'=>'user_id',
				// 'value'=>'GxHtml::valueEx($data->user)',
				// 'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
				// ),
		'event_name',
		//'event_datetime',
		'event_location',
		'event_address',
		array(
                    'name'  => 'status',
					'filter'=> array('1'=>'Active','0'=>'Inactive'),			
                    'value'=> '($data->status == 1)?CHtml::link(Active, "javascript:;", array("class"=>"statusupdate","id"=>$data->event_id)):CHtml::link(InActive, "javascript:;", array("class"=>"statusupdate","id"=>$data->event_id))',
                    'type'  => 'raw',
                 ),
		/* array(
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
			    	},),*/

		/*
		'event_latitute',
		'event_longitude',
		'event_description',
		'event_link_album_id',
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
<script>
$('document').ready(function(){
	$("a.statusupdate").live('click', function(e){
		e.preventDefault();
		if (confirm('Are you sure Change Status?')){
			var event_id = $(this).attr('id');
			$.ajax({
				"url":'<?php echo Yii::app()->createUrl('admin/Event/statusUpdate');?>',
				"type":"POST",
				"data":{"event_id":event_id},
				"success":function(data){
					$.fn.yiiGridView.update('event-grid');
					//window.location.reload();
				},
			});
			return;
		}
	});
});
</script>