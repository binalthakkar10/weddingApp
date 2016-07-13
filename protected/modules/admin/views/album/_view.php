<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('album_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->album_id), array('view', 'id' => $data->album_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->wedding)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('album_category_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->albumCategory)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('position')); ?>:
	<?php echo GxHtml::encode($data->position); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('is_delete')); ?>:
	<?php echo GxHtml::encode($data->is_delete); ?>
	<br />
	*/ ?>

</div>