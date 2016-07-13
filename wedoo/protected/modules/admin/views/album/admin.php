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
	$.fn.yiiGridView.update('album-grid', {
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
)); */?>
<!--</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'album-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'album_id',
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
		array(
				'name'=>'album_category_id',
				'header' => 'Album Category',
				'value'=>'GxHtml::valueEx($data->albumCategory)',
				'filter'=>GxHtml::listDataEx(AlbumCategory::model()->findAllAttributes(null, true)),
				),
				array(
                    'name'  => 'status',
					'filter'=> array('1'=>'Active','0'=>'Inactive'),			
                    'value'=> '($data->status == 1)?CHtml::link(Active, "javascript:;", array("class"=>"statusupdate","id"=>$data->album_id)):CHtml::link(InActive, "javascript:;", array("class"=>"statusupdate","id"=>$data->album_id))',
                    'type'  => 'raw',
                 ),

		'created_at',
		'updated_at',
		/*
		'status',
		'position',
		'is_delete',
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
			var album_id = $(this).attr('id');
			$.ajax({
				"url":'<?php echo Yii::app()->createUrl('admin/Album/statusUpdate');?>',
				"type":"POST",
				"data":{"album_id":album_id},
				"success":function(data){
					$.fn.yiiGridView.update('album-grid');
					//window.location.reload();
				},
			});
			return;
		}
	});
});
</script>