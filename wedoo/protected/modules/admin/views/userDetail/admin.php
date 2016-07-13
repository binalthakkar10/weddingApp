<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		// array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-detail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php 
$height = '25px';
$width = '25px';
?>
<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<?php /* ?>
<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->
<?php */ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'user-detail-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'user_id',
		//'cityID',
		//'stateID',
		//'countryID',
		//'auth_id',
		array(
			'name'=>'image',
			'header'=>'Image',
			'filter'=>'',
			'type' => 'html',
			'value'=> 'CHtml::tag("div",  array("style"=>"text-align: center" ) , CHtml::tag("img", array("height"=>\''.$height.'\',\'width\'=>\''.$width.'\',"src" => UtilityHtml::getImageDisplay(GxHtml::valueEx($data,\'image\')))))',
		),
		'username',
		//'auth_provider',
		'email',
		 array(
                    'name'  => 'status',
					'filter'=> array('1'=>'Active','0'=>'Inactive'),			
                    'value'=> '($data->status == 1)?CHtml::link(Active, "javascript:;", array("class"=>"statusupdate","id"=>$data->user_id)):CHtml::link(InActive, "javascript:;", array("class"=>"statusupdate","id"=>$data->user_id))',
                    'type'  => 'raw',
                 ),

		/*
		'user_type',
		'fullname',
		'password',
		'image',
		'phone',
		'mobile',
		'address',
		'address1',
		'device_type',
		'device_token',
		'created_date',
		'updated_date',
		'status',
		'field1',
		'field2',
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
			'template'=>'{update} {view} {delete}',
		),
	),
)); ?>

<script>
$('document').ready(function(){
	$("a.statusupdate").live('click', function(e){
		e.preventDefault();
		if (confirm('Are you sure Change Status?')){
			var user_id = $(this).attr('id');
			$.ajax({
				"url":'<?php echo Yii::app()->createUrl('admin/UserDetail/statusUpdate');?>',
				"type":"POST",
				"data":{"user_id":user_id},
				"success":function(data){
					$.fn.yiiGridView.update('user-detail-grid');
					//window.location.reload();
				},
			});
			return;
		}
	});
});
</script>