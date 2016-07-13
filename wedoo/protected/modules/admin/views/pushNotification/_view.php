<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('push_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->push_id), array('view', 'id' => $data->push_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_id')); ?>:
	<?php echo GxHtml::encode($data->event_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('album_id')); ?>:
	<?php echo GxHtml::encode($data->album_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_id')); ?>:
	<?php echo GxHtml::encode($data->wedding_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('push_type')); ?>:
	<?php echo GxHtml::encode($data->push_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('push_message')); ?>:
	<?php echo GxHtml::encode($data->push_message); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('push_flag')); ?>:
	<?php echo GxHtml::encode($data->push_flag); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('issent')); ?>:
	<?php echo GxHtml::encode($data->issent); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('isread')); ?>:
	<?php echo GxHtml::encode($data->isread); ?>
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
	<?php echo GxHtml::encode($data->getAttributeLabel('field1')); ?>:
	<?php echo GxHtml::encode($data->field1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field2')); ?>:
	<?php echo GxHtml::encode($data->field2); ?>
	<br />
	*/ ?>

</div>