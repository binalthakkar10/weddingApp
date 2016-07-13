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
	$.fn.yiiGridView.update('wedding-grid', {
		data: $(this).serialize()
	});
	return false;
});
");


?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'wedding-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		//'wedding_id',
		
		array(	
				'name'=>'wedding_id',
				'header'=>'Theme',
				'filter'=>'',
				'type' => 'html',
				'value'=>'CHtml::tag("div",  array("style"=>"text-align: center; background-color:red; margin:10px auto; width: 25px; height:25px;"))',
				),
		
		array(
				'name'=>'wedding_uniq_id',
				'header' => 'Wedding ID',
				'value'=>'CHtml::link($data->wedding_uniq_id,array("Index/Weddingid", "id"=>$data->wedding_id))',
				'type' => 'html',
				'filter'=>GxHtml::listDataEx(Wedding::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'user_id',
				'header' => 'Username',
				'value'=>'CHtml::link($data->user,array("userDetail/view", "id"=>$data->user_id))',
				'type' => 'html',
				'filter'=>GxHtml::listDataEx(UserDetail::model()->findAllAttributes(null, true)),
				),
		
		array(
				'name'=>'to_bride_name',
				'header' => 'BrideName',
				),
		array(
				'name'=>'from_groom_name',
				'header' => 'GroomName',
				),
		'wedding_location',
		'wedding_date',
		 array(
                    'name'  => 'status',
					'filter'=> array('1'=>'Active','0'=>'Inactive'),			
                    'value'=> '($data->status == 1)?CHtml::link(Active, "javascript:;", array("class"=>"statusupdate","id"=>$data->wedding_id)):CHtml::link(InActive, "javascript:;", array("class"=>"statusupdate","id"=>$data->wedding_id))',
                    'type'  => 'raw',
                 ),

		//'to_bride_name',
		//'to_groom_name',
		//'to_partner_name',
		//'from_bride_name',
		/*
		'from_groom_name',
		'from_partner_name',
		'created_at',
		'updated_at',
		'status',
		'image',
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
		array(	'class'=>'CButtonColumn',
				'header'=>'Action',
				'template'=>'{view} {delete}',
    		),
		array(	'class'=>'CButtonColumn',
				'header'=>'Details',
				'template'=>'{wedding}',
				'buttons'=>array (
					'wedding'=> array(
						'label'=>'',
						'imageUrl'=>'',
						'url'=>'Yii::app()->createUrl(\'admin/Index/Weddingid\', array(\'id\'=>$data->wedding_id))',
						'options'=>array( 'class'=>'fa fa-gift','title'=>'Wedding Detail' ),
					),
				),
    		),
		
			 			
	),
)); ?>

<script>
$('document').ready(function(){
	$("a.statusupdate").live('click', function(e){
		e.preventDefault();
		if (confirm('Are you sure Change Status?')){
			var wedding_id = $(this).attr('id');
			$.ajax({
				"url":'<?php echo Yii::app()->createUrl('admin/wedding/statusUpdate');?>',
				"type":"POST",
				"data":{"wedding_id":wedding_id},
				"success":function(data){
					$.fn.yiiGridView.update('wedding-grid');
					//window.location.reload();
				},
			});
			return;
		}
	});
	
});
</script>